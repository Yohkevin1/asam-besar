<?php

namespace App\Http\Controllers;

use App\Models\IMG_Collection;
use App\Models\Renungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class C_Renungan extends Controller
{
    public function index()
    {
        $data = Renungan::orderBy('created_at', 'desc')->get();
        return view('backend.renungan.index', compact('data'));
    }

    public function createRenungan()
    {
        $img_collection = IMG_Collection::all();
        return view('backend.renungan.create', compact('img_collection'));
    }

    public function storeRenungan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'date' => 'required|date',
            'description' => 'required',
            'img_header' => 'nullable',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $id = $this->generateID();
        Renungan::create([
            'id' => $id,
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);

        return redirect()->back()->with(['message' => 'Renungan created successfully', 'alert-type' => 'success']);
    }

    public function detailRenungan($id)
    {
        $data = Renungan::find($id);
        $img_collection = IMG_Collection::all();
        if (!$data) {
            return back()->with(['message' => 'Renungan not found', 'alert-type' => 'error']);
        }
        return view('backend.renungan.detail', compact('data', 'img_collection'));
    }

    public function updateRenungan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'date' => 'required|date',
            'description' => 'required',
            'img_header' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $data = Renungan::find($id);
        if (!$data) {
            return back()->with(['message' => 'Renungan not found', 'alert-type' => 'error']);
        }
        $data->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'img_header' => $request->img_header ?? 'Logo_Paroki.png',
            'status' => $request->status
        ]);
        return redirect()->back()->with(['message' => 'Renungan updated successfully', 'alert-type' => 'success']);
    }

    public function deleteRenungan($id)
    {
        $data = Renungan::find($id);
        if (!$data) {
            return back()->with(['message' => 'Renungan not found', 'alert-type' => 'error']);
        }
        $data->delete();
        return back()->with(['message' => 'Renungan deleted successfully', 'alert-type' => 'success']);
    }

    public function trash()
    {
        $data = Renungan::onlyTrashed()->get();
        return view('backend.renungan.trash', compact('data'));
    }

    public function restoreRenungan($id)
    {
        $data = Renungan::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Renungan not found', 'alert-type' => 'error']);
        }
        $data->restore();
        return back()->with(['message' => 'Renungan restored successfully', 'alert-type' => 'success']);
    }

    public function forceDeleteRenungan($id)
    {
        $data = Renungan::onlyTrashed()->find($id);
        if (!$data) {
            return back()->with(['message' => 'Renungan not found', 'alert-type' => 'error']);
        }
        $data->forceDelete();
        return back()->with(['message' => 'Renungan deleted permanently', 'alert-type' => 'success']);
    }

    public function generateID()
    {
        $lastRenungan = Renungan::withTrashed()->orderBy('created_at', 'DESC')->first();
        $currentDate = now();
        $formattedDate = $currentDate->format('dmy');
        $no = 1;

        if ($lastRenungan) {
            $formattedLastDate = substr($lastRenungan->id, 3, 6);
            if ($formattedLastDate == $formattedDate) {
                $no = intval(substr($lastRenungan->id, -2)) + 1;
            }
        }

        $idRenungan = "RNG" . $formattedDate . str_pad($no, 2, '0', STR_PAD_LEFT);
        return $idRenungan;
    }
}
