<?php

namespace App\Http\Controllers;

use App\Models\IMG_Collection;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class C_Kegiatan extends Controller
{
    public function index()
    {
        $data = Kegiatan::orderBy('created_at', 'desc')->get();
        return view('backend.kegiatan.index', compact('data'));
    }

    public function create()
    {
        $img_collection = IMG_Collection::all();
        return view('backend.kegiatan.create', compact('img_collection'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'location' => 'required',
            'date' => 'required|date',
            'description' => 'nullable',
            'img_header' => 'nullable',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $id = $this->generateID();
        Kegiatan::create([
            'id' => $id,
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);

        return redirect()->back()->with(['message' => 'Kegiatan created successfully', 'alert-type' => 'success']);
    }

    public function detail($id)
    {
        $data = Kegiatan::find($id);
        $img_collection = IMG_Collection::all();
        if (!$data) {
            return back()->with(['message' => 'Kegiatan not found', 'alert-type' => 'error']);
        }
        return view('backend.kegiatan.detail', compact('data', 'img_collection'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'location' => 'required',
            'date' => 'required|date',
            'description' => 'nullable',
            'img_header' => 'nullable',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $data = Kegiatan::find($id);
        if (!$data) {
            return back()->with(['message' => 'Kegiatan not found', 'alert-type' => 'error']);
        }
        $data->update([
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);

        return redirect()->back()->with(['message' => 'Kegiatan updated successfully', 'alert-type' => 'success']);
    }

    public function delete($id)
    {
        $data = Kegiatan::find($id);
        if (!$data) {
            return back()->with(['message' => 'Kegiatan not found', 'alert-type' => 'error']);
        }
        $data->delete();
        return redirect()->back()->with(['message' => 'Kegiatan deleted successfully', 'alert-type' => 'success']);
    }

    public function trash()
    {
        $data = Kegiatan::onlyTrashed()->get();
        return view('backend.kegiatan.trash', compact('data'));
    }

    public function restore($id)
    {
        $data = Kegiatan::withTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Kegiatan not found', 'alert-type' => 'error']);
        }
        $data->restore();
        return back()->with(['message' => 'Kegiatan restored successfully', 'alert-type' => 'success']);
    }

    public function forceDelete($id)
    {
        $data = Kegiatan::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Kegiatan not found', 'alert-type' => 'error']);
        }
        $data->forceDelete();
        return back()->with(['message' => 'Kegiatan deleted successfully', 'alert-type' => 'success']);
    }

    public function generateID()
    {
        $lastKegiatan = Kegiatan::withTrashed()->orderBy('created_at', 'DESC')->first();
        $currentDate = now();
        $formattedDate = $currentDate->format('dmy');
        $no = 1;

        if ($lastKegiatan) {
            $formattedLastDate = substr($lastKegiatan->id, 3, 6);
            if ($formattedLastDate == $formattedDate) {
                $no = intval(substr($lastKegiatan->id, -2)) + 1;
            }
        }

        $idRenungan = "KGN" . $formattedDate . str_pad($no, 2, '0', STR_PAD_LEFT);
        return $idRenungan;
    }
}
