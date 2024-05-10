@extends('backend.layout.main')
@section('title', 'SPWPAA | Kelola Renungan')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA, kelola renungan, manajemen renungan, admin panel')
@section('description', 'Kelola Renungan - Fitur Manajemen Renungan')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('renunganTrash') }}" class="btn btn-danger">Trash</a>
                    <a href="{{ route('renunganCreate') }}" class="btn btn-primary">Create Renungan</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead >
                            <tr>
                                <th>List Renungan</th>
                                <th width="10%">Status</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $renungan)
                            <tr>
                                <td>
                                    <a href="{{ route('renunganDetail', $renungan->id) }}">
                                        <h4><strong>{{ $renungan->title }}</strong></h4>
                                        {!! substr($renungan->description, 0, 500) !!}
                                    </a>
                                </td>
                                <td>
                                    <p> {{ $renungan->status }} </p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $renungan->id }}">Delete</button>
                                    <!-- Modal konfirmasi delete -->
                                    <div class="modal fade" id="deleteModal{{ $renungan->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $renungan->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $renungan->id }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="{{ route('renunganDelete', $renungan->id) }}" method="POST">
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
</div>
@endsection