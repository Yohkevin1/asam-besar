<?php

namespace App\Http\Controllers;

use App\Models\IMG_Collection;
use App\Models\Kegiatan;
use App\Models\Pengumuman;
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
        $img_collection = IMG_Collection::where('status', 'header')->get();
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

        return redirect()->back()->with(['message' => 'Data kegiatan ' . $request->title . ' berhasil ditambah', 'alert-type' => 'success']);
    }

    public function detail($id)
    {
        $data = Kegiatan::find(decrypt($id));
        $img_collection = IMG_Collection::where('status', 'header')->get();
        if (!$data) {
            return back()->with(['message' => 'Kegiatan tidak ditemukan', 'alert-type' => 'error']);
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

        $data = Kegiatan::find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Kegiatan tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->update([
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);

        return redirect()->back()->with(['message' => 'Data kegiatan ' . $data->title . ' berhasil diupdate', 'alert-type' => 'success']);
    }

    public function delete($id)
    {
        $data = Kegiatan::find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Kegiatan tidak ditemukan', 'alert-type' => 'error']);
        }
        Pengumuman::where('id_kegiatan', decrypt($id))->update(['id_kegiatan' => null]);
        $data->delete();
        return redirect()->back()->with(['message' => 'Data kegiatan ' . $data->title . ' berhasil dihapus', 'alert-type' => 'success']);
    }

    public function trash()
    {
        $data = Kegiatan::onlyTrashed()->get();
        return view('backend.kegiatan.trash', compact('data'));
    }

    public function restore($id)
    {
        $data = Kegiatan::withTrashed()->find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Kegiatan tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->restore();
        return back()->with(['message' => 'Data kegiatan ' . $data->title . ' berhasil dipulihkan', 'alert-type' => 'success']);
    }

    public function forceDelete($id)
    {
        try {
            $data = Kegiatan::onlyTrashed()->find(decrypt($id));
            if (!$data) {
                return back()->with(['message' => 'Kegiatan tidak ditemukan', 'alert-type' => 'error']);
            }
            $data->forceDelete();
            return back()->with(['message' => 'Data kegiatan ' . $data->title . ' berhasil dihapus permanen', 'alert-type' => 'success']);
        } catch (\Exception) {
            return back()->with(['message' => 'Data kegiatan ' . $data->title . ' tidak dapat dihapus permanen karena terikat dengan data lain', 'alert-type' => 'error']);
        }
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
