<?php

namespace App\Http\Controllers;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class C_Pernikahan extends Controller
{
    public function index()
    {
        $data = Pernikahan::orderBy('created_at', 'desc')->get();
        return view('backend.pernikahan.index', compact('data'));
    }

    public function create()
    {
        return view('backend.pernikahan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()->all(), 'alert-type' => 'error']);
        }

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->move('img/pernikahan/', $imageName);

        Pernikahan::create([
            'id' => $this->generateID(),
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'foto' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->back()->with(['message' => 'Data pernikahan berhasil ditambah', 'alert-type' => 'success']);
    }

    public function detail($id)
    {
        $data = Pernikahan::find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Data pernikahan tidak ditemukan', 'alert-type' => 'error']);
        }
        return view('backend.pernikahan.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()->all(), 'alert-type' => 'error']);
        }

        $data = Pernikahan::find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Data pernikahan tidak ditemukan', 'alert-type' => 'error']);
        }

        $image = $request->file('image');
        if ($image) {
            $imageName = $image->hashName();
            $image->move('img/pernikahan/', $imageName);
            if (File::exists('img/pernikahan/' . $data->foto)) {
                File::delete('img/pernikahan/' . $data->foto);
            }
            $data->update([
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'foto' => $imageName,
                'status' => $request->status,
            ]);
        } else {
            $data->update($request->only(['title', 'date', 'description', 'status']));
        }

        return redirect()->back()->with(['message' => 'Data pernikahan berhasil diupdate', 'alert-type' => 'success']);
    }

    public function delete($id)
    {
        $data = Pernikahan::find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Data pernikahan tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->delete();
        return redirect()->back()->with(['message' => 'Data pernikahan berhasil dihapus', 'alert-type' => 'success']);
    }

    public function trash()
    {
        $data = Pernikahan::onlyTrashed()->get();
        return view('backend.pernikahan.trash', compact('data'));
    }

    public function restore($id)
    {
        $data = Pernikahan::withTrashed()->find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Data pernikahan tidak ditemukan', 'alert-type' => 'error']);
        }
        $data->restore();
        return redirect()->back()->with(['message' => 'Data pernikahan berhasil dipulihkan', 'alert-type' => 'success']);
    }

    public function forceDelete($id)
    {
        $data = Pernikahan::onlyTrashed()->find(decrypt($id));
        if (!$data) {
            return back()->with(['message' => 'Pernikahan tidak ditemukan', 'alert-type' => 'error']);
        }
        if (File::exists('img/pernikahan/' . $data->foto)) {
            File::delete('img/pernikahan/' . $data->foto);
        }
        $data->forceDelete();
        return redirect()->back()->with(['message' => 'Data pernikahan berhasil dihapus permanen', 'alert-type' => 'success']);
    }

    public function generateID()
    {
        $lastPernikahan = Pernikahan::withTrashed()->orderBy('created_at', 'DESC')->first();
        $currentDate = now();
        $formattedDate = $currentDate->format('dmy');
        $no = 1;

        if ($lastPernikahan) {
            $formattedLastDate = substr($lastPernikahan->id, 3, 6);
            if ($formattedLastDate == $formattedDate) {
                $no = intval(substr($lastPernikahan->id, -2)) + 1;
            }
        }

        $idPernikahan = "PNK" . $formattedDate . str_pad($no, 2, '0', STR_PAD_LEFT);
        return $idPernikahan;
    }
}
