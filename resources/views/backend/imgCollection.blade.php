@extends('backend.layout.main')
@section('title', 'SPWPAA | Upload Image')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA', 'image', 'upload')
@section('description', 'Sistem Pengelolaan Website Paroki Asam Besar')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                Upload Gambar
            </div>
            <div class="card-body text-center">
                 <form action="{{ route('addImages') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-left">
                        <label for="image">Pilih Gambar</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="previewImage()">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('img/img_empty.gif') }}" class="img-thumbnail img-preview col-lg-12" style="max-height: 250px; height: auto;">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                Daftar Gambar
            </div>
            <div class="card-body" id="imageList" style="display: flex; flex-wrap: wrap;">
                <!-- Daftar Gambar akan dimuat di sini -->
                @foreach($images as $image)
                @if ($image->id !== 'Logo_Paroki.png')
                <div class="image-card" id="imageCard-{{ $image->id }}" style="margin-right: 10px;">
                    <img src="{{ asset('storage/img/'.$image->id) }}" class="card-img-top img-thumbnail" style="max-width: 150px; max-height: 150px;">
                    <div class="card-body">
                        <form class="delete-form" action="{{ route('deleteImages', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn">Hapus</button>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Menghapus gambar menggunakan AJAX
    $(document).on('submit', 'form', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        var formData = new FormData(this);
        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.alert-type === 'success') {
                    form.closest('.card').remove();
                }
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });
});

</script>
@endsection