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
                <li class="breadcrumb-item text-muted"> System Settings </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-4">
                    <div class="card card-body">
                        <form method="POST" action="{{ route('admin.system.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="input-style-1">
                                        <label for="title">Title:</label>
                                        <input type="text" placeholder="Enter Title" id="title"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ $setting->title ?? '' }}" />
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="input-style-1">
                                        <label for="email">Support Email:</label>
                                        <input type="email" placeholder="Enter Email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $setting->email ?? '' }}" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="input-style-1">
                                        <label for="phone">Support Phone:</label>
                                        <input type="text" placeholder="Enter Phone" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ $setting->phone ?? '' }}" />
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="system_name">System Name:</label>
                                        <input type="text" placeholder="System Name" id="system_name"
                                            class="form-control @error('system_name') is-invalid @enderror" name="system_name"
                                            value="{{ $setting->system_name ?? '' }}" />
                                        @error('system_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="copyright_text">Copy Rights Text:</label>
                                        <input type="text" placeholder="Copy Rights Text" id="copyright_text"
                                            class="form-control @error('copyright_text') is-invalid @enderror"
                                            name="copyright_text" value="{{ $setting->copyright_text ?? '' }}" />
                                        @error('copyright_text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="input-style-1">
                                    <label for="address">Address:</label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="Enter Address">{{ $setting->address ?? '' }}</textarea>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="logo">Logo:</label>
                                        <input type="file" class="dropify @error('logo') is-invalid @enderror" name="logo"
                                            id="logo"
                                            data-default-file="{{ asset($setting->logo ?? 'backend/assets/images/placeholder/image_placeholder.png') }}" />
                                    </div>
                                    @error('logo')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="favicon">Favicon:</label>
                                        <input type="file" class="dropify @error('favicon') is-invalid @enderror"
                                            name="favicon" id="favicon"
                                            data-default-file="{{ asset($setting->favicon ?? 'backend/assets/images/placeholder/image_placeholder.png') }}" />
                                    </div>
                                    @error('favicon')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-4">
                                    <div class="input-style-1">
                                        <label for="description">About System:</label>
                                        <textarea placeholder="Type here..." id="description" name="description"
                                            class="form-control @error('description') is-invalid @enderror">
                                            {{ $setting->description ?? '' }}
                                        </textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger me-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       

    </div>
@endsection

@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush