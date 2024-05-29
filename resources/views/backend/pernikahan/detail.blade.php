@extends('backend.layout.main')
@section('title', 'SPWPAB | Update Pengumuman Pernikahan')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola pengumuman pernikahan, update pengumuman pernikahan, admin panel')
@section('description', 'Update Pengumuman Pernikahan - Fitur Menambah Pengumuman Pernikahan Baru')
@section('judul', 'Paroki Asam Besar')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('pernikahan') }}">Kelola Pernikahan</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: black"><strong>Detail Pernikahan</strong></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form id="pernikahanForm" action="{{ route('pernikahanUpdate' , encrypt($data->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('pernikahan') }}" class="btn btn-danger">Kembali</a>
                    <div class="d-flex">
                        <button type="submit" name="status" value="Publish" class="btn btn-primary ml-2">Publish</button>
                        <button type="submit" name="status" value="Draft" class="btn btn-secondary ml-2">Draft</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="d-flex flex-column">
                                <div class="mb-3">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="post_date">Tanggal Post</label>
                                    <input type="datetime-local" class="form-control" id="post_date" name="post_date" value="{{ $data->post_date }}" required>
                                </div>
                                <div>
                                    <label for="end_date">Tanggal Berakhir</label>
                                    <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ $data->end_date }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="d-flex flex-wrap">
                                <div class="form-group col-md-7">
                                    <label for="img_header">Foto Mempelai</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" onchange="previewImage()">
                                        <label class="custom-file-label" for="image">Pilih gambar...</label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <img src="{{ asset('img/pernikahan/' . $data->foto) }}" class="img-thumbnail img-preview" style="max-height: 165px; height: auto;">
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="form-group col-md-5 mt-md-0">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" disabled value="{{ $data->status }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control summernote" id="description" name="description" rows="5" required>{{ $data->description }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
