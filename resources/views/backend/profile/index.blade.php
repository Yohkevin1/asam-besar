@extends('backend.layout.main')
@section('title', 'SPWPAB | Kelola Profile Paroki')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola profile paroki, manajemen infomasi profile paroki, admin panel')
@section('description', 'Kelola Informasi Profile Paroki - Fitur Manajemen Informasi Profile Paroki')
@section('judul', 'Paroki Asam Besar')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page"><strong>Kelola Profile Paroki</strong></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('profileCreate') }}" class="btn btn-primary">Tambah Profile</a>
                    <a href="{{ route('profileTrash') }}" class="btn btn-danger">Tempat Sampah</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-responsive w-auto" id="dataTable">
                    <thead >
                        <tr>
                            <th>List Halaman Profile</th>
                            <th width="10%">Status</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $profile)
                        <tr>
                            <td>
                                <a href="{{ route('profileDetail', encrypt($profile->id)) }}">
                                    <h4><strong>{{ $profile->title }}</strong></h4>
                                    {!! substr(strip_tags($profile->description), 0, 200) !!}...
                                </a>
                                <p style="font-size: 0.8rem; margin-top: 10px">Dibuat pada {{ $profile->created_at }}</p>
                            </td>
                            <td>
                                <p> {{ $profile->status }} </p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $profile->id }}">Delete</button>
                                <!-- Modal konfirmasi delete -->
                                <div class="modal fade" id="deleteModal{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $profile->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $profile->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('profileDelete', encrypt($profile->id)) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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