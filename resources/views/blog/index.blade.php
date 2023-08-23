<!doctype html>
<html lang="en" class="scrollbar scrollbar-thumb-purple-300 scrollbar-track-purple-50 scrollbar-rounded-5">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite('resources/css/app.css')
</head>
<body class="container mx-auto">

    @component("components.header")
    @endcomponent

    <main class="flex flex-col mt-4 mb-1">
        <div class="flex mt-6 gap-5 flex-wrap justify-center">
            @foreach($posts as $post)
                @if($post->status)
                    <div class="bg-amber-200 p-3 rounded-2xl text-center w-4/12">
                        @if(!$post->image)
                            <img class="w-1/4 mx-auto" src="{{ asset('images/logo.png') }}" alt="img">
                        @else
                            <img class="w-1/4 mx-auto" src="{{asset($post->image)}}" alt="img">
                        @endif
                        <h1 class="text-xl">{{$post->title}}</h1>
                        <h1 class="text-md">{{$post->description}}</h1>
                        <h1 class="text-red-600"><span class="text-green-600">Writer: </span>{{$post->user->name}}</h1>
                        <h1>{{$post->created_at}}</h1>
                        <button class="bg-green-500 text-green-50 rounded-full mt-5 py-2 px-5"><a href="{{route("posts.show" , $post)}}">Read More</a></button>
                    </div>
                @endif
            @endforeach
        </div>
    </main>
</body>
</html>
