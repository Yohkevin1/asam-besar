@extends('backend.layout.main')
@section('title', 'SPWPAA | Kelola Pengguna')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAA, kelola pengguna, manajemen pengguna, admin panel')
@section('description', 'Kelola Pengguna - Fitur Manajemen Pengguna')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Tambah Pengguna
            </div>
            <div class="card-body">
                <form action="{{ route('registerUser') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Konfirmasi Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Daftar Pengguna
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive w-auto" id="dataTable">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama</th>
                            <th width="20%">Email</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#resetPasswordModal{{ $user->id }}">Reset Password</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">Delete</a>
                                </td>
                            </tr>
                            <!-- modal untuk reset password -->
                            <div class="modal fade" id="resetPasswordModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password {{ $user->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form reset password -->
                                            <form action="{{ route('resetPassword', $user->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="new_password">New Password</label>
                                                    <input type="password" name="password" id="new_password" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_new_password">Confirm New Password</label>
                                                    <input type="password" name="confirm_password" id="confirm_new_password" class="form-control" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Reset Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal untuk konfirmasi penghapusan pengguna -->
                            <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus akun <strong>{{ $user->name }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Form delete user -->
                                            <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
