@extends('backend.layout.main')
@section('title', 'SPWPAB | Update Pengumuman')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola pengumuman, update pengumuman, admin panel')
@section('description', 'Update Pengumuman - Fitur Menambah Pengumuman Baru')
@section('judul', 'Paroki Asam Besar')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('pengumuman') }}">Kelola Pengumuman</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: black"><strong>Detail Pengumuman</strong></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form id="pengumumanForm" action="{{ route('pengumumanUpdate', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('pengumuman') }}" class="btn btn-danger">Kembali</a>
                    <div class="d-flex">
                        <button type="submit" name="status" value="Publish" class="btn btn-primary ml-2">Publish</button>
                        <button type="submit" name="status" value="Draft" class="btn btn-secondary ml-2">Draft</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Judul Pengumuman <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required value="{{ $data->title }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="post_date">Tanggal Mulai Diposting <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" id="post_date" name="post_date" required value="{{ date('Y-m-d\TH:i', strtotime($data->post_date)) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_date">Tanggal Berakhir Diposting <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" id="end_date" name="end_date" required value="{{ date('Y-m-d\TH:i', strtotime($data->end_date)) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control summernote" id="description" name="description" rows="5" required>{{ $data->description }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="img_header">Gambar Header</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="selectedImg" name="img_header" required readonly value="{{ $data->img_header }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imgCollectionModal">Pilih Gambar</button>
                                </div>
                            </div>
                            <div class="form-group">
                                @if ($data->img_header == 'Logo_Paroki.png')
                                <img src="{{ asset('img/' . $data->img_header) }}" class="img-thumbnail img-preview mt-2" style="max-height: 200px; height: auto;">
                                @else
                                <img src="{{ asset('img/collection/' . $data->img_header) }}" class="img-thumbnail img-preview mt-2" style="max-height: 200px; height: auto;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_kegiatan">Kegiatan</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="selectedKegiatan" name="selectedKegiatan" required readonly value="{{ $data->kegiatan->title ?? '' }}">
                                <input type="hidden" id="id_kegiatan" name="id_kegiatan" value="{{ $data->id_kegiatan }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kegiatanModal">Pilih Kegiatan</button>
                                </div>
                            </div>
                            <label for="location">Status</label>
                            <input type="text" class="form-control" id="status" name="status" disabled value="{{ $data->status }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<!-- Kegiatan Modal -->
<div class="modal fade" id="kegiatanModal" tabindex="-1" role="dialog" aria-labelledby="kegiatanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kegiatanModalLabel">Pilih Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    @foreach($kegiatan as $item)
                    <button type="button" class="list-group-item list-group-item-action select-kegiatan" data-kegiatan-id="{{ $item->id }}" data-kegiatan-title="{{ $item->title }}">{{ $item->title }}</button>
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

        // Handle kegiatan selection
        $('.select-kegiatan').click(function() {
            var kegiatanId = $(this).data('kegiatan-id');
            var kegiatanTitle = $(this).data('kegiatan-title');
            $('#selectedKegiatan').val(kegiatanTitle);
            $('#id_kegiatan').val(kegiatanId);
            $('#kegiatanModal').modal('hide');
        });
    });
</script>
@endsection
