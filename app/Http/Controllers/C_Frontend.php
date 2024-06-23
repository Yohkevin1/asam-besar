<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Layanan;
use App\Models\Pengumuman;
use App\Models\Profile;
use App\Models\Renungan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class C_Frontend extends Controller
{
    public function index()
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        $pengumuman = Pengumuman::where('status', 'Publish')->where('post_date', '<=', Carbon::now())->where('end_date', '>=', Carbon::now())->orderBy('created_at', 'desc')->get();
        $kegiatan = Kegiatan::where('status', 'Publish')->where('date', '>=', Carbon::today())->orderBy('date', 'asc')->take(10)->get();
        return view('frontend.home', compact('profile', 'layanan', 'pengumuman', 'kegiatan'));
    }

    public function contact()
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        return view('frontend.contact', compact('profile', 'layanan'));
    }

    public function renungan()
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        $renungan = Renungan::whereYear('date', date('Y'))->where('status', 'Publish')->orderBy('date', 'desc')->get();
        return view('frontend.renungan', compact('renungan', 'profile', 'layanan'));
    }

    public function kegiatan()
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        $kegiatan = Kegiatan::whereYear('date', date('Y'))->where('status', 'Publish')->orderBy('date', 'desc')->get();
        return view('frontend.kegiatan', compact('kegiatan', 'profile', 'layanan'));
    }

    public function detailRenungan($id)
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        $data = Renungan::where('id', decrypt($id))->where('status', 'Publish')->first();
        if (!$data)
            abort(404);
        return view('frontend.detailPage', compact('data', 'profile', 'layanan'));
    }

    public function detailKegiatan($id)
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        $data = Kegiatan::where('id', decrypt($id))->where('status', 'Publish')->first();
        if (!$data)
            abort(404);
        return view('frontend.detailPage', compact('data', 'profile', 'layanan'));
    }

    public function profile($slug)
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        $data = Profile::where('title', $slug)->where('status', 'Publish')->first();
        if (!$data)
            abort(404);
        return view('frontend.detailPage', compact('data', 'profile', 'layanan'));
    }

    public function layanan($slug)
    {
        $profile = Profile::where('status', 'Publish')->get();
        $layanan = Layanan::where('status', 'Publish')->get();
        $data = Profile::where('title', $slug)->where('status', 'Publish')->first();
        if (!$data)
            abort(404);
        return view('frontend.detailPage', compact('layanan', 'profile', 'data'));
    }
}
