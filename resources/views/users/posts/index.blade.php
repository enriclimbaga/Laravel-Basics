@extends('layouts.app')

@section('laman')
    <div class="flex justify-center">
        <div class="w-8/12">
            
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                 {{-- Str::plural('post', $posts->count()) --}}
                <p>Posts: {{ $posts->count()}} </p>
                <p>Received likes: {{ $user->receivedLikes->count()}} </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                        @foreach ($posts as $post)
                            <x-test :post="$post" />
                        @endforeach
                        
                        {{  $posts->links() }}
                        
                    @else
                        <p>{{ $user->name }} has no posts</p>
                    @endif
            </div>
        </div>
    </div>
@endsection