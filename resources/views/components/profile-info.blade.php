@props(['post'])
<div>
    <div class="d-flex align-items-center">
        <div style="padding-right: 5px;">
            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 50px;">
        </div>
        <div>
            <a href="/profile/{{ $post->user->id }}" style="text-decoration: none; margin-right: 10px; ">
                <span>{{ $post->user->username }}</span>
            </a>
            {{$slot}}
        </div>
    </div>
</div>