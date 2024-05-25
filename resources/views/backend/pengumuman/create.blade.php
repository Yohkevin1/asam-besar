@extends('backend.layout.main')
@section('title', 'SPWPAB | Create Pengumuman')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola pengumuman, tambah pengumuman, admin panel')
@section('description', 'Create Pengumuman - Fitur Menambah Pengumuman Baru')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pengumuman') }}" class="btn btn-danger">Kembali</a>
            </div>
            <div class="card-body">
                <form id="pengumumanForm" action="{{ route('pengumumanStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="post_date">Tanggal Post</label>
                            <input type="datetime-local" class="form-control" id="post_date" name="post_date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_date">Tanggal Berakhir</label>
                            <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control summernote" id="description" name="description" rows="5" required></textarea>
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
                            <label for="id_kegiatan">Kegiatan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="selectedKegiatan" name="selectedKegiatan" required readonly>
                                <input type="hidden" id="id_kegiatan" name="id_kegiatan">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kegiatanModal">Pilih Kegiatan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" name="status" value="Publish" class="btn btn-primary">Publish</button>
                        <button type="submit" name="status" value="Draft" class="btn btn-secondary"> Draft</button>
                    </div>
                </form>
            </div>
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

        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['forecolor', 'backcolor']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['picture']]
            ]
        });
    });
</script>
@endsection
