@extends('backend.layout.main')
@section('title', 'SPWPAB | Kelola Sakramen (Trash)')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB, kelola sakramen, manajemen sakramen, admin panel')
@section('description', 'Kelola Sakramen - Fitur Manajemen Sakramen yang Telah Dihapus')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('sakramen') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-responsive w-auto" id="dataTable">
                    <thead>
                        <tr>
                            <th>List Trash Sakramen</th>
                            <th width="10%">Status</th>
                            <th width="5%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $sakramen)
                        <tr>
                            <td>
                                <h4><strong>{{ $sakramen->title }}</strong></h4>
                            </td>
                            <td>
                                <p>Deleted</p>
                            </td>
                            <td>
                                <form action="{{ route('sakramenRestore', encrypt($sakramen->id)) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                <form action="{{ route('sakramenForceDelete', encrypt($sakramen->id)) }}" method="POST">
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
