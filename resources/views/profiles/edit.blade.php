@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row pb-4 text-center">
            <h1>Edit Profile</h1>
        </div>
        <div class="row">
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('URL') }}</label>
                <div class="col-md-6">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="profile_image" class="col-md-4 col-form-label text-md-end">{{ __('Profile Picture') }}</label>
                <div class="col-md-6">
                    <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image') }}" autocomplete="profile_image" autofocus>

                    @error('profile_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row pt-4 d-flex align-items-center justify-content-center">
                <button class="btn btn-primary center w-25">Save Profile</button>
            </div>

        </div>
    </form>
</div>
@endsection