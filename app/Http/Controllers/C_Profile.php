<?php

namespace App\Http\Controllers;

use App\Models\IMG_Collection;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class C_Profile extends Controller
{
    public function index()
    {
        $data = Profile::orderBy('created_at', 'desc')->get();
        return view('backend.profile.index', compact('data'));
    }

    public function create()
    {
        $img_collection = IMG_Collection::all();
        return view('backend.profile.create', compact('img_collection'));
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
        Profile::create([
            'title' => $request->title,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);

        return redirect()->back()->with(['message' => $request->title . ' berhasil ditambah', 'alert-type' => 'success']);
    }

    public function detail($id)
    {
        $id = decrypt($id);
        $data = Profile::find($id);
        $img_collection = IMG_Collection::all();
        if (!$data) {
            return back()->with(['message' => 'Data tidak ditemukan', 'alert-type' => 'error']);
        }
        return view('backend.profile.detail', compact('data', 'img_collection'));
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
        $data = Profile::find($id);
        if (!$data) {
            return back()->with(['message' => 'Data ' . $data->title . ' tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);
        return redirect()->back()->with(['message' => 'Data ' . $data->title . ' berhasil diupdate', 'alert-type' => 'success']);
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $data = Profile::find($id);
        if (!$data) {
            return back()->with(['message' => 'Data ' . $data->title . ' tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->delete();
        return back()->with(['message' => 'Data ' . $data->title . ' berhasil dihapus', 'alert-type' => 'success']);
    }

    public function trash()
    {
        $data = Profile::onlyTrashed()->get();
        return view('backend.profile.trash', compact('data'));
    }

    public function restore($id)
    {
        $id = decrypt($id);
        $data = Profile::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Data tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->restore();
        return back()->with(['message' => 'Data ' . $data->title . ' berhasil dipulihkan', 'alert-type' => 'success']);
    }

    public function forceDelete($id)
    {
        $id = decrypt($id);
        $data = Profile::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Data tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->forceDelete();
        return back()->with(['message' => 'Data ' . $data->title . ' berhasil dihapus permanen', 'alert-type' => 'success']);
    }
}
