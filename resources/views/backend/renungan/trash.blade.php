@extends('backend.layout.main')
@section('title', 'SPWPAA | Kelola Renungan (Trash)')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA, kelola renungan, manajemen renungan, admin panel')
@section('description', 'Kelola Renungan - Fitur Manajemen Renungan yang Telah Dihapus')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('renungan') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>List Trash</th>
                                <th width="10%">Status</th>
                                <th width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $renungan)
                            <tr>
                                <td>
                                    <h4><strong>{{ $renungan->title }}</strong></h4>
                                    {!! substr($renungan->description, 0, 500) !!}
                                </td>
                                <td>
                                    <p>Deleted</p>
                                </td>
                                <td>
                                    <form action="{{ route('renunganRestore', $renungan->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                    </form>
                                    <form action="{{ route('renunganForceDelete', $renungan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Destroy</button>
                                    </form>
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
