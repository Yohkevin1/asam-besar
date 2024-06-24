@extends('backend.layout.main')
@section('title', 'SPWPAB | Kelola Pengumuman Pernikahan (Trash)')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola pengumuman pernikahan, manajemen pengumuman penikahan, admin panel')
@section('description', 'Kelola Pengumuman Pernikahan - Fitur Manajemen Pengumuman Pernikahan yang Telah Dihapus')
@section('judul', 'Paroki Asam Besar')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('pernikahan') }}">Kelola Pernikahan</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: black"><strong>Tempat Sampah</strong></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('pernikahan') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-responsive w-auto" id="dataTable">
                    <thead>
                        <tr>
                            <th>List Sampah Data Pengumuman Pernikahan</th>
                            <th width="10%">Status</th>
                            <th width="5%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $pernikahan)
                        <tr>
                            <td>
                                <h4><strong>{{ $pernikahan->title }}</strong></h4>
                                {{ substr(strip_tags($pernikahan->description), 0, 100) }}...
                                <p style="font-size: 0.8rem; margin-top: 10px">Dihapus pada {{ $pernikahan->deleted_at }}</p>
                            </td>
                            <td>
                                <p>Deleted</p>
                            </td>
                            <td>
                                <form action="{{ route('pernikahanRestore', encrypt($pernikahan->id)) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                <form action="{{ route('pernikahanForceDelete', encrypt($pernikahan->id)) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Destroy</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
