@extends('backend.layout.main')
@section('title', 'SPWPAA | Kelola Kegiatan (Trash)')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA, kelola kegiatan, manajemen kegiatan, admin panel')
@section('description', 'Kelola Kegiatan - Fitur Manajemen Kegiatan yang Telah Dihapus')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('kegiatan') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-responsive w-auto" id="dataTable">
                    <thead>
                        <tr>
                            <th>List Trash Kegiatan</th>
                            <th width="10%">Status</th>
                            <th width="5%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $kegiatan)
                        <tr>
                            <td>
                                <h4><strong>{{ $kegiatan->title }}</strong></h4>
                                {!! substr($kegiatan->description, 0, 500) !!}
                            </td>
                            <td>
                                <p>Deleted</p>
                            </td>
                            <td>
                                <form action="{{ route('kegiatanRestore', $kegiatan->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                <form action="{{ route('kegiatanForceDelete', $kegiatan->id) }}" method="POST">
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
@endsection
