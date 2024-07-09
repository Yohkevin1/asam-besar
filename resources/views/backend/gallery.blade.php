@extends('backend.layout.main')
@section('title', 'SPWPAB | Kelola Galeri')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB', 'Galeri', 'Kelola Galeri')
@section('description', 'Sistem Pengelolaan Website Paroki Asam Besar')
@section('judul', 'Paroki Asam Besar')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: black"><strong>Kelola Galeri</strong></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                Upload Gambar atau Video
            </div>
            <div class="card-body text-center">
                <form action="{{ route('addGallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-left">
                        <label for="content-type">Pilih Jenis Konten</label>
                        <select class="form-control" id="content-type" name="content_type" onchange="toggleContentInput()">
                            <option value="image">Gambar</option>
                            <option value="video">Video YouTube</option>
                        </select>
                    </div>
                    <div class="form-group text-left" id="image-input">
                        <label for="image">Pilih Gambar</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="previewImage()">
                        <img src="{{ asset('img/img_empty.gif') }}" class="img-thumbnail img-preview col-lg-12" style="max-height: 250px; height: auto;">
                    </div>
                    <div class="form-group text-left d-none" id="video-input">
                        <label for="video">Masukkan Link YouTube</label>
                        <input type="text" class="form-control" id="video" name="video" placeholder="https://www.youtube.com/watch?v=example">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                Daftar Gambar dan Video Galeri
            </div>
            <div class="card-body" id="contentList" style="display: flex; flex-wrap: wrap;">
                <!-- Daftar Gambar dan Video akan dimuat di sini -->
                @foreach($contents as $content)
                <div class="content-card" id="contentCard-{{ $content->id }}" style="margin-right: 10px; margin-bottom: 10px;">
                    @if (Str::endsWith($content->id, ['.png', '.jpg', '.jpeg']))
                    <img src="{{ asset('img/gallery/'.$content->id) }}" class="card-img-top img-thumbnail" style="max-width: 150px; max-height: 150px;">
                    @else
                    <iframe width="150" height="150" src="https://www.youtube.com/embed/{{ $content->id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                    <div class="card-body">
                        <form class="delete-form" action="{{ route('deleteGallery', $content->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn">Hapus</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
function toggleContentInput() {
    var contentType = document.getElementById('content-type').value;
    var imageInput = document.getElementById('image-input');
    var videoInput = document.getElementById('video-input');
    if (contentType == 'image') {
        imageInput.classList.remove('d-none');
        videoInput.classList.add('d-none');
    } else {
        imageInput.classList.add('d-none');
        videoInput.classList.remove('d-none');
    }
}

function previewImage() {
    var file = document.getElementById('image').files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        document.querySelector('.img-preview').src = reader.result;
    }
    if (file) {
        reader.readAsDataURL(file);
    } else {
        document.querySelector('.img-preview').src = "{{ asset('img/img_empty.gif') }}";
    }
}

$(document).ready(function() {
    // Menghapus gambar atau video menggunakan AJAX
    $(document).on('submit', '.delete-form', function(e) {
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
                    form.closest('.content-card').remove();
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
