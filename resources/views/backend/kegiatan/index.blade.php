@extends('backend.layout.main')
@section('title', 'SPWPAA | Kelola Kegiatan')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA, kelola kegiatan, manajemen kegiatan, admin panel')
@section('description', 'Kelola Kegiatan - Fitur Manajemen Kegiatan')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('kegiatanCreate') }}" class="btn btn-primary">Create Kegiatan</a>
                    <a href="{{ route('kegiatanTrash') }}" class="btn btn-danger">Trash</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-responsive w-auto" id="dataTable">
                    <thead >
                        <tr>
                            <th>List Kegiatan</th>
                            <th width="10%">Status</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $kegiatan)
                        <tr>
                            <td>
                                <a href="{{ route('kegiatanDetail', $kegiatan->id) }}">
                                    <h4><strong>{{ $kegiatan->title }}</strong></h4>
                                    {!! substr($kegiatan->description, 0, 1000) !!}
                                </a>
                            </td>
                            <td>
                                <p> {{ $kegiatan->status }} </p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $kegiatan->id }}">Delete</button>
                                <!-- Modal konfirmasi delete -->
                                <div class="modal fade" id="deleteModal{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $kegiatan->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $kegiatan->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('kegiatanDelete', $kegiatan->id) }}" method="POST">
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