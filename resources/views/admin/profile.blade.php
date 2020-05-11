@extends('admin.layouts.app', ['page' => ''])

@section('title', 'Profile')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="x_title">
            <h2>Update Profile</h2>
            <div class="clearfix"></div>
        </div>

        <form method="post">
            @csrf

            <div class="box-body">
                <div class="form-group">
                    <label for="name">الإسم</label>
                    <input type="text"
                        name="name"
                        class="form-control"
                        id="name"
                        placeholder="الإسم"
                        value="{{ old('name', $admin->name) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="email">البريد الإلكتروني address</label>
                    <input type="email"
                        name="email"
                        class="form-control"
                        id="email"
                        placeholder="البريد الإلكتروني address"
                        value="{{ old('email', $admin->email) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text"
                        name="username"
                        class="form-control"
                        id="username"
                        placeholder="Username"
                        value="{{ old('username', $admin->username) }}"
                    >
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>

    {{-- Password update --}}
    <div class="col-md-6">
        <div class="x_title">
            <h2>Change Password</h2>
            <div class="clearfix"></div>
        </div>

        <form method="post" action="{{ route('admin.password_update') }}">
            @csrf

            <div class="box-body">
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password"
                        name="current_password"
                        class="form-control"
                        id="current-password"
                        placeholder="Current Password"
                        pattern=".{6,}"
                        title="6 characters minimum"
                    >
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        placeholder="New Password"
                        pattern=".{6,}"
                        title="6 characters minimum"
                    >
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password"
                        name="password_confirmation"
                        class="form-control"
                        id="confirm-password"
                        placeholder="Confirm Password"
                        pattern=".{6,}"
                        title="6 characters minimum"
                    >
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </form>
    </div>
</div>
@endsection