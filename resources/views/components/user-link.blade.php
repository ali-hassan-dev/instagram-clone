@props(['post','data'])
<div>
    <a href="/profile/{{$post->user->id}}" class="btn btn-primary mb-2">{{$data ?? ''}}</a>
</div>