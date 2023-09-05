@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" alt="">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-2">
                        <div class="h4">{{$user->username}}</div>
                        @auth
                            @unless( auth()->id() == $user->id )
                                <follow-button user_id="{{$user->id}}" follow_status="{{ $followStatus }}" />
                            @endunless
                        @endauth
                    </div>
                    @if(auth()->id() == $user->id)
                        <form method="POST" action="{{route('posts.create')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="userId" value="{{$user->id}}">
                            <button type="submit" class="btn btn-primary btn-sm">Add New Post</button>
                        </form>
                    @endif
                    {{-- <a href="{{route('posts.create', $user->id)}}" class="">Add New Post</a>--}}
                </div>
                @can('update', $user->profile)
                        <a href="/profile/{{$user->id}}/edit" class="btn btn-primary btn-sm">Edit Profile</a>
                @endcan
                <div class="d-flex pt-2">
                    <div class="pr-5" style="padding-right: 30px;"><strong>{{ $postsCount }}</strong> Posts</div>
                    <div class="pr-5" style="padding-right: 30px;"><strong>{{ $followers }}</strong> Followers</div>
                    <div class="pr-5" style="padding-right: 30px;"><strong>{{ $following }}</strong> Following</div>
                </div>
                <div class="pt-2">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="{{$user->profile->url}}" class="">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/post/{{$post->id}}" class="">
                        <img src="{{asset('/storage/'. $post->post_image)}}" alt="" class="w-100 p-4">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
