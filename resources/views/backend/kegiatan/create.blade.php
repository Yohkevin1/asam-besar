@extends('backend.layout.main')
@section('title', 'SPWPAB | Create Kegiatan')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola kegiatan, tambah kegiatan, admin panel')
@section('description', 'Create Kegiatan - Fitur Menambah Kegiatan Baru')
@section('judul', 'Paroki Asam Besar')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('kegiatan') }}">Kelola Kegiatan</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: black"><strong>Tambah Kegiatan</strong></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form id="kegiatanForm" action="{{ route('kegiatanStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('kegiatan') }}" class="btn btn-danger">Kembali</a>
                    <div class="d-flex">
                        <button type="submit" name="status" value="Publish" class="btn btn-primary ml-2">Publish</button>
                        <button type="submit" name="status" value="Draft" class="btn btn-secondary ml-2">Draft</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Tanggal</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control summernote" id="description" name="description" rows="5"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="img_header">Gambar Header</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="selectedImg" name="img_header" required readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imgCollectionModal">Pilih Gambar</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('img/img_empty.gif') }}" class="img-thumbnail img-preview mt-2" style="max-height: 200px; height: auto;">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="location">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" name="status" value="Publish" class="btn btn-primary">Publish</button>
                        <button type="submit" name="status" value="Draft" class="btn btn-secondary"> Draft</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Image Collection Modal -->
<div class="modal fade" id="imgCollectionModal" tabindex="-1" role="dialog" aria-labelledby="imgCollectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imgCollectionModalLabel">Pilih Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row"> 
                    @foreach($img_collection as $img)
                    <div class="col-md-2 mb-2">
                        <div class="img-option" data-img-id="{{ $img->id }}" data-img-name="{{ $img->name }}" style="cursor: pointer;">
                            @if ($img->id !== 'Logo_Paroki.png')
                            <img src="{{ asset('img/collection/'.$img->id) }}" alt="{{ $img->name }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.img-option').click(function() {
            var imgId = $(this).data('img-id');
            var imgName = $(this).data('img-name');
            $('#selectedImg').val(imgName);
            $('[name="img_header"]').val(imgId);
            $('.img-preview').attr('src', $(this).find('img').attr('src'));
            $('#imgCollectionModal').modal('hide');
        });
    });
</script>
@endsection
