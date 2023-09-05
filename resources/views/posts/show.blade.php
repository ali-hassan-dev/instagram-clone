@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-2">
        <div class="mb-3">
            <a href="/profile/{{$post->user->id}}" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <img src="{{asset('/storage/'. $post->post_image)}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <x-profile-info :post="$post">
                        @unless( auth()->id() == $post->user->id )
                            <follow-button style="position: absolute; top: 143px; left: 720px;" user_id="{{ $post->user->id }}" follow_status="{{ $followStatus }}" />
                        @endunless
                </x-profile-info>
                <hr>
                <x-profile-info :post="$post">
                    <span class="font-weight-bold">
                        {{ $post->caption }}
                    </span>
                </x-profile-info>
            </div>
        </div>
    </div>
</div>

@endsection
