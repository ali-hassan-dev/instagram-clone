@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-5 offset-3">
                <a href="/post/{{$post->id}}">
                    <img src="{{asset('/storage/'. $post->post_image)}}" alt="" class="w-100">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-5 offset-3">
                <div>
                    <x-profile-info :post="$post">
                        <span class="font-weight-bold">
                            {{ $post->caption }}
                        </span>
                    </x-profile-info>
                </div>
                <hr>
            </div>
        </div>
    @endforeach
</div>

@endsection
