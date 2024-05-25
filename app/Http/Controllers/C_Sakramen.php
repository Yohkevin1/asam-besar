<?php

namespace App\Http\Controllers;

use App\Models\IMG_Collection;
use App\Models\Sakramen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class C_Sakramen extends Controller
{
    public function index()
    {
        $data = Sakramen::orderBy('created_at', 'desc')->get();
        return view('backend.sakramen.index', compact('data'));
    }

    public function create()
    {
        $img_collection = IMG_Collection::all();
        return view('backend.sakramen.create', compact('img_collection'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'description' => 'required',
            'img_header' => 'nullable',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }
        Sakramen::create([
            'title' => $request->title,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);

        return redirect()->back()->with(['message' => 'Sakramen created successfully', 'alert-type' => 'success']);
    }

    public function detail($id)
    {
        $id = decrypt($id);
        $data = Sakramen::find($id);
        $img_collection = IMG_Collection::all();
        if (!$data) {
            return back()->with(['message' => 'Sakramen not found', 'alert-type' => 'error']);
        }
        return view('backend.sakramen.detail', compact('data', 'img_collection'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'description' => 'required',
            'img_header' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $id = decrypt($id);
        $data = Sakramen::find($id);
        if (!$data) {
            return back()->with(['message' => 'Sakramen not found', 'alert-type' => 'error']);
        }
        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);
        return redirect()->back()->with(['message' => 'Sakramen updated successfully', 'alert-type' => 'success']);
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $data = Sakramen::find($id);
        if (!$data) {
            return back()->with(['message' => 'Sakramen not found', 'alert-type' => 'error']);
        }
        $data->delete();
        return back()->with(['message' => 'Sakramen deleted successfully', 'alert-type' => 'success']);
    }

    public function trash()
    {
        $data = Sakramen::onlyTrashed()->get();
        return view('backend.sakramen.trash', compact('data'));
    }

    public function restore($id)
    {
        $id = decrypt($id);
        $data = Sakramen::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Sakramen not found', 'alert-type' => 'error']);
        }
        $data->restore();
        return back()->with(['message' => 'Sakramen restored successfully', 'alert-type' => 'success']);
    }

    public function forceDelete($id)
    {
        $id = decrypt($id);
        $data = Sakramen::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Sakramen not found', 'alert-type' => 'error']);
        }
        $data->forceDelete();
        return back()->with(['message' => 'Sakramen deleted permanently', 'alert-type' => 'success']);
    }
}
