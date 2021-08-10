@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="flex flex-col w-1/2 my-10">
            <div class="post_wrap flex flex-col bg-gray-100 rounded-xl p-5">
                <p class="text-xl mb-4">{{ $post->title }}</p>
                <p>{{ $post->body }}</p>
            </div>
            <a href="/"
                class="flex font-semibold text-sm justify-center items-center space-x-2 bg-gray-300 w-24 mt-5 hover:bg-gray-200 rounded-xl p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                <p class="flex text-nowrap">Go back</p>
            </a>
        </div>
    </div>
@endsection
