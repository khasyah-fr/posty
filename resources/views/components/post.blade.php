@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> 
    <span class="text-gray-600 text-sm"> {{ $post->created_at->diffForHumans() }} </span>
    <p class="mb-1"> {{ $post->body }}</p>
    <span class="text-sm mb-1"> {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count())}}</span>
    @auth
    <div class="flex items-center">
        @if(!$post->likedBy(auth()->user()))
            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-4 mb-1">
                @csrf
                <button type="submit" class="text-blue-500 text-sm hover:font-bold">Like</button>
            </form>
        @else
            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-4 mb-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500 text-sm hover:font-bold">Unlike</button>
            </form>
        @endif
    </div>

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post)}}" method="post" class="mr-4 pb-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 text-sm hover:font-bold">Delete</button>
        </form>
    @endcan

    @endauth
</div>