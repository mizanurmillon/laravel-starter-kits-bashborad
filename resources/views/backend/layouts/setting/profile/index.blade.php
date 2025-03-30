@extends('backend.app')
@section('title', 'Profile')
@push('styles')
    <style>
        .settings-card-1 .profile-info .profile-image {
            max-width: 75px;
            width: 100%;
            height: 75px;
            border-radius: 50%;
            margin-right: 20px;
            position: relative;
            z-index: 1;
        }

        .settings-card-1 .profile-info .profile-image img {
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .settings-card-1 .profile-info .profile-image img {
            width: 100%;
            border-radius: 50%;
        }

        .settings-card-1 .profile-info .profile-image .update-image {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 30px;
            height: 30px;
            background: #efefef;
            border: 2px solid #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            cursor: pointer;
            z-index: 99;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        Home </a>
                </li>

                <li class="breadcrumb-item text-muted"> Setting </li>
                <li class="breadcrumb-item text-muted"> Profile </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-style settings-card-1 mb-30">
                    <div class="title mb-30 d-flex justify-content-between align-items-center">
                        <h4>My Profile</h4>
                    </div>
                    <div class="profile-info">
                        <div class="d-flex align-items-center mb-30">

                            <div class="profile-image">
                                <img id="profile_picture"
                                    src="{{ asset(Auth::user()->avatar ?? 'backend/assets/images/profile.jpeg') }}"
                                    alt="Profile Picture">


                                <div class="update-image">
                                    <input type="file" name="profile_picture" id="profile_picture_input"
                                        style="display: none;">
                                    <label for="profile_picture_input"><i class="fa fa-cloud-upload"></i></label>
                                </div>
                            </div>
                        </div>

                        <div class="card card-body mt-4">
                            <form method="POST" action="{{ route('admin.profile.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <div class="input-style-1">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" value="{{ Auth::user()->name }}"
                                                placeholder="Enter Name" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="input-style-1">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" name="email" id="email"
                                                value="{{ Auth::user()->email }}" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <hr class="mb-30">
                        <div class="mt-30 mb-4">
                            <h3>Update Your Password</h3>
                        </div>

                        <div class="card card-body">
                            <form method="POST" action="{{ route('admin.password.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <div class="input-style-1">
                                            <label for="old_password">Current Password</label>
                                            <input type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                placeholder="Current Password" name="old_password" id="old_password" />
                                            @error('old_password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="input-style-1">
                                            <label for="password">New Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="New Password" name="password" id="password" />
                                            @error('password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="input-style-1">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                placeholder="Confirm Password" name="password_confirmation"
                                                id="password_confirmation" />
                                            @error('password_confirmation')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger me-2">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#profile_picture_input').change(function() {
                const formData = new FormData();
                formData.append('profile_picture', $(this)[0].files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "{{ route('update.profile.picture') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            $('#profile_picture').attr('src', data.image_url);
                            toastr.success('Profile picture updated successfully.');
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function() {
                        toastr.error(data.message);
                    }
                });
            });
        });
    </script>
@endpush