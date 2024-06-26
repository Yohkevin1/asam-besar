<?php

namespace App\Http\Controllers;

use App\Models\IMG_Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class C_ImgCollection extends Controller
{
    public function index()
    {
        $images = IMG_Collection::all();
        return view('backend.imgCollection', compact('images'));
    }

    public function addImages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->move('img/collection/', $imageName);

        IMG_Collection::create([
            'id' => $imageName
        ]);

        return redirect()->back()->with(['message' => 'Image berhasil ditambah', 'alert-type' => 'success']);
    }

    public function deleteImages($id)
    {
        try {
            $image = IMG_Collection::find($id);
            if (!$image) {
                return redirect()->back()->with('error', 'Image tidak ditemukan');
            }

            $image->delete();
            File::delete('img/collection/' . $id);

            return redirect()->back()->with(['message' => 'Image berhasil dihapus', 'alert-type' => 'success']);
        } catch (QueryException $e) {
            return redirect()->back()->with(['message' => 'Image gagal dihapus karena sedang digunakan', 'alert-type' => 'error']);
        }
    }
}
