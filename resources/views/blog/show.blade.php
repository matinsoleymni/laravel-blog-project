<!doctype html>
<html lang="en" class="scrollbar scrollbar-thumb-purple-300 scrollbar-track-purple-50 scrollbar-rounded-5">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite('resources/css/app.css')
</head>
<body class="container mx-auto">

    @component("components.header")
    @endcomponent

    @if (session("status"))
        <div class="absolute bg-green-300 p-3 rounded-lg top-20 left-1"><p>{{session("status")}}</p></div>
    @endif
    <main class="flex flex-col mt-4 mb-1">
        <div class="flex mt-6 gap-5 flex-wrap justify-center">
            <div class="bg-amber-200 p-3 rounded-2xl text-center w-6/12">
                @if(!$post->image)
                    <img class="w-1/4 mx-auto" src="{{ asset('images/logo.png') }}" alt="img">
                @else
                    <img class="w-1/4 mx-auto" src="{{asset($post->image)}}" alt="img">
                @endif
                <h1 class="text-xl">{{$post->title}}</h1>
                <h1 class="my-8">{{$post->body}}</h1>
                <h1 class="text-red-600 text-left">{{$post->user->name}}</h1>
                <h1 class="text-left mt-2">{{$post->created_at}}</h1>
                <div class="bg-blue-200 text-left mt-10 rounded-lg py-2 px-5">
                    <h2 class="ml-3 my-4 text-lg text-blue-700">Comments: </h2>

                    @if (count($post->comments))
                        @foreach ($post->comments as $comment)
                        @if ($comment->status)
                            <div class="bg-blue-400 my-3 px-3 py-2 rounded-lg">
                                <p><span class="text-red-600">{{$comment->user->name}}</span> Say: </p>
                                <p class="mt-2 ml-4">{{$comment->body}}</p>
                            </div>
                        @endif
                        @endforeach
                        
                        @else
                            <p class="text-red-600">This post not have Comment</p>
                    @endif
                </div>
                <form method="post" action="{{route('comment.add')}}" class="bg-green-200 flex flex-col mt-5 rounded-xl px-8 py-2">
                    @auth
                        @csrf
                        <input type="hidden" name="postid" value="{{$post->id}}" readonly>
                        <textarea class="p-2 rounded-md" type="text" name="body"></textarea>
                        <button class="bg-green-700 text-gray-50 p-2 rounded-full mt-2">Submit</button>
                    @endauth
                    @guest
                        <p class="text-red-600">You should Login after can write comment :)</p>
                    @endguest
                </form>
                
            </div>
        </div>
    </main>
</body>
</html>
