@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12">
        <div class="p-6 mb-4">
            <h1 class="text-2xl font-medium mb-1"> {{$user->name}} </h1>
            <p> Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</p>
            <p> and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <div>
                    <p>There are no posts yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection