@extends('backend.layout.main')
@section('title', 'SPWPAB | Kelola Layanan Sakramen')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola sakrament, manajemen infomasi sakramen, admin panel')
@section('description', 'Kelola Informasi Sakramen - Fitur Manajemen Informasi Sakramen')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('sakramenCreate') }}" class="btn btn-primary">Create sakramen</a>
                    <a href="{{ route('sakramenTrash') }}" class="btn btn-danger">Trash</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-responsive w-auto" id="dataTable">
                    <thead >
                        <tr>
                            <th>List Sakramen</th>
                            <th width="10%">Status</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $sakramen)
                        <tr>
                            <td>
                                <a href="{{ route('sakramenDetail', encrypt($sakramen->id)) }}">
                                    <h4><strong>{{ $sakramen->title }}</strong></h4>
                                </a>
                            </td>
                            <td>
                                <p> {{ $sakramen->status }} </p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $sakramen->id }}">Delete</button>
                                <!-- Modal konfirmasi delete -->
                                <div class="modal fade" id="deleteModal{{ $sakramen->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $sakramen->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $sakramen->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('sakramenDelete', encrypt($sakramen->id)) }}" method="POST">
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