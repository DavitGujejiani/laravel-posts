@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="flex flex-col w-2/3 space-y-5">
            <p class="text-3xl w-full text-center">Posts</p>
            @foreach ($posts as $post)
                <a href="/posts/{{ $post->id }}">
                    <div class="post_wrap flex flex-col bg-gray-100 rounded-xl p-5 hover:bg-gray-200 cursor-pointer">
                        <p class="text-xl mb-4">{{ $post->title }}</p>
                        <p>{{ $post->body }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
