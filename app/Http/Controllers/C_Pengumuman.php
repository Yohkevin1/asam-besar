<?php

namespace App\Http\Controllers;

use App\Models\IMG_Collection;
use App\Models\Kegiatan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class C_Pengumuman extends Controller
{
    public function index()
    {
        $data = Pengumuman::orderBy('created_at', 'desc')->get();
        return view('backend.pengumuman.index', compact('data'));
    }

    public function create()
    {
        $img_collection = IMG_Collection::all();
        $kegiatan = Kegiatan::where('status', 'Publish')->get();
        return view('backend.pengumuman.create', compact('img_collection', 'kegiatan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'post_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required',
            'id_kegiatan' => 'nullable',
            'img_header' => 'nullable',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()->all(), 'alert-type' => 'error']);
        }
        $id = $this->generateID();
        Pengumuman::create([
            'id' => $id,
            'title' => $request->title,
            'post_date' => $request->post_date,
            'end_date' => $request->end_date,
            'id_kegiatan' => $request->id_kegiatan,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status,
        ]);
        return redirect()->back()->with(['message' => 'Data pengumuman ' . $request->title . ' berhasil ditambah', 'alert-type' => 'success']);
    }

    public function detail($id)
    {
        $data = Pengumuman::find($id);
        $img_collection = IMG_Collection::all();
        $kegiatan = Kegiatan::where('status', 'Publish')->get();
        if (!$data) {
            return back()->with(['message' => 'Data pengumuman tidak ditemukan', 'alert-type' => 'error']);
        }
        return view('backend.pengumuman.detail', compact('data', 'img_collection', 'kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'post_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required',
            'id_kegiatan' => 'nullable',
            'img_header' => 'nullable',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->all(), 'alert-type' => 'error']);
        }

        $data = Pengumuman::find($id);
        if (!$data) {
            return back()->with(['message' => 'Pengumuman tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->update([
            'title' => $request->title,
            'post_date' => $request->post_date,
            'end_date' => $request->end_date,
            'id_kegiatan' => $request->id_kegiatan,
            'description' => $request->description,
            'img_header' => $request->img_header,
            'status' => $request->status,
        ]);
        return redirect()->back()->with(['message' => 'Data pengumuman ' . $data->title . ' berhasil diupdate', 'alert-type' => 'success']);
    }

    public function delete($id)
    {
        $data = Pengumuman::find($id);
        if (!$data) {
            return back()->with(['message' => 'Data pengumuman tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->delete();
        return redirect()->back()->with(['message' => 'Data pengumuman ' . $data->title . ' berhasil dihapus', 'alert-type' => 'success']);
    }

    public function trash()
    {
        $data = Pengumuman::onlyTrashed()->get();
        return view('backend.pengumuman.trash', compact('data'));
    }

    public function restore($id)
    {
        $data = Pengumuman::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Data pengumuman tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->restore();
        return redirect()->back()->with(['message' => 'Data pengumuman ' . $data->title . ' berhasil dipulihkan', 'alert-type' => 'success']);
    }

    public function forceDelete($id)
    {
        $data = Pengumuman::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Data pengumuman tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->forceDelete();
        return redirect()->back()->with(['message' => 'Data pengumuman ' . $data->title . ' berhasil dihapus permanen', 'alert-type' => 'success']);
    }

    public function generateID()
    {
        $lastPengumuman = Pengumuman::withTrashed()->orderBy('created_at', 'DESC')->first();
        $currentDate = now();
        $formattedDate = $currentDate->format('dmy');
        $no = 1;

        if ($lastPengumuman) {
            $formattedLastDate = substr($lastPengumuman->id, 3, 6);
            if ($formattedLastDate == $formattedDate) {
                $no = intval(substr($lastPengumuman->id, -2)) + 1;
            }
        }

        $idRenungan = "PGM" . $formattedDate . str_pad($no, 2, '0', STR_PAD_LEFT);
        return $idRenungan;
    }
}
