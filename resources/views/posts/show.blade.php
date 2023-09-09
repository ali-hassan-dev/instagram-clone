@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-2">
        <div class="mb-3">
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <img src="{{asset('/storage/'. $post->post_image)}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <x-profile-info :post="$post" />
                @unless( auth()->id() == $post->user->id )
                    <follow-button user_id="{{ $post->user->id }}" follow_status="{{ $followStatus }}" />
                @endunless
            </div>
            <hr>
            <span class="font-weight-bold">
                {{ $post->caption }}
            </span>
        </div>
    </div>
</div>

@endsection
