@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row pb-4 text-center">
                <h1>Create Post</h1>
            </div>
            <div class="row">
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label text-md-end">{{ __('Post Caption') }}</label>
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="userId" value="{{$userId}}">
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>
    
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="post_image" class="col-md-4 col-form-label text-md-end">{{ __('Post Image') }}</label>
                    <div class="col-md-6">
                        <input id="post_image" type="file" class="form-control @error('post_image') is-invalid @enderror" name="post_image" value="{{ old('post_image') }}" autocomplete="post_image" autofocus>
    
                        @error('post_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row pt-4 d-flex align-items-center justify-content-center">
                    <button class="btn btn-primary center w-25">Add Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection