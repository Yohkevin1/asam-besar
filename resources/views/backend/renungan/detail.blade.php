@extends('backend.layout.main')
@section('title', 'SPWPAA | Update Renungan')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA, update renungan, ubah renungan, admin panel')
@section('description', 'Update Renungan - Fitur Mengubah Renungan')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('renungan') }}" class="btn btn-danger">Kembali</a>
            </div>
            <div class="card-body">
                <form id="renunganForm" action="{{ route('renunganUpdate', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required value="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required value="{{ $data->date }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control summernote" id="description" name="description" rows="5" required>{{ $data->description }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="img_header">Image Header</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="selectedImg" name="img_header" required readonly value="{{ $data->img_header }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imgCollectionModal">Select Image</button>
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
                            <label for="location">Status</label>
                            <input type="text" class="form-control mb-3" id="status" name="status" disabled value="{{ $data->status }}">
                            <div class="text-right">
                                <button type="submit" name="status" value="Publish" class="btn btn-primary">Publish</button>
                                <button type="submit" name="status" value="Draft" class="btn btn-secondary">Draft</button>
                            </div>
                        </div>
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
                <h5 class="modal-title" id="imgCollectionModalLabel">Select Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row"> 
                    @foreach($img_collection as $img)
                    <div class="col-md-2 mb-2">
                        <div class="img-option" data-img-id="{{ $img->id }}" style="cursor: pointer;">
                            <img src="{{ asset('img/collection/'.$img->id) }}" alt="{{ $img->name }}" class="img-fluid">
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
