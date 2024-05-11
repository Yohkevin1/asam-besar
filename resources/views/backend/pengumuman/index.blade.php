@extends('backend.layout.main')
@section('title', 'SPWPAA | Kelola Pengumuman')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA, kelola pengumuman, manajemen pengumuman, admin panel')
@section('description', 'Kelola Pengumuman - Fitur Manajemen Pengumuman')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('pengumumanCreate') }}" class="btn btn-primary">Create Pengumuman</a>
                    <a href="{{ route('pengumumanTrash') }}" class="btn btn-danger">Trash</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-responsive w-auto" id="dataTable">
                    <thead >
                        <tr>
                            <th>List Pengumuman</th>
                            <th width="10%">Status</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $pengumuman)
                        <tr>
                            <td>
                                <a href="{{ route('pengumumanDetail', $pengumuman->id) }}">
                                    <h4><strong>{{ $pengumuman->title }}</strong></h4>
                                    {!! substr($pengumuman->description, 0, 500) !!}
                                </a>
                            </td>
                            <td>
                                <p> {{ $pengumuman->status }} </p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $pengumuman->id }}">Delete</button>
                                <!-- Modal konfirmasi delete -->
                                <div class="modal fade" id="deleteModal{{ $pengumuman->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $pengumuman->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $pengumuman->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('pengumumanDelete', $pengumuman->id) }}" method="POST">
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