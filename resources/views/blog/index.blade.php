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
                        <h1 class="text-lg">{{$post->title}}</h1>
                        <h1 class="text-md">{{$post->description}}</h1>
                        <h1 class="text-red-600"><span class="text-green-600">Writer: </span>{{$post->user->name}}</h1>
                        <h1>{{$post->created_at}}</h1>
                    </div>
                @endif
            @endforeach
        </div>
    </main>
</body>
</html>
