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
        <div class="my-2">
            <h1 class="text-2xl sm:text-4xl text-center transition duration-700 ease-in-out hover:duration-700 hover:text-purple-50 hover:transition cursor-default">Welcome to Matin's Blog</h1>
        </div>
        <div class="my-2 flex flex-col sm:flex-row gap-5">
            <div class="bg-blue-100 hover:bg-blue-200 hover:transition-all transition-all py-5 basis-1/2 rounded-md">
                <h1 class="text-xl ml-5 my-2 cursor-default text-blue-900">This Blog Made With:</h1>
                <div class="flex justify-center gap-5">
                    <img class="w-24 mt-3 border-2 border-blue-300 transition-all hover:border-blue-500 hover:transition-all hover:scale-110 p-2 rounded-md" src="{{asset("images/tailwindcss.svg")}}" alt="TailwindLogo">
                    <img class="w-24 mt-3 border-2 border-blue-300 transition-all hover:border-blue-500 hover:transition-all hover:scale-110 p-2 rounded-md" src="{{asset("images/laravel.svg")}}" alt="TailwindLogo">
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div><h2 class="my-5 text-lg text-cyan-700">My Skills:</h2></div>
                    <div>
                        <img class="p-3" src="{{asset("images/icons.svg")}}" alt="">
                    </div>
                    <a class="mt-5 text-lg hover:text-cyan-400" href="https://github.com/matinsoleymni"><img class="w-12" src="{{asset("images/github.svg")}}" alt="GithubLogo"></a>
                </div>
            </div>
            <div class="bg-green-100 transition-all hover:bg-green-200 hover:transition-all rounded-md py-5  basis-1/2">
                <div>
                    <h1 class="text-xl ml-5 my-2 cursor-default text-green-900">Last Posts on Blog: </h1>
                </div>
                <div class="flex mt-6 gap-5 flex-wrap justify-center">
                    @foreach($posts as $post)
                        @if($post->status)
                            <div class="bg-amber-200 p-3 rounded-2xl w-3/12">
                                <h1 class="text-lg">{{$post->title}}</h1>
                                <h1 class="text-md">{{$post->description}}</h1>
                                <h1 class="text-red-600"><span class="text-green-600">Writer: </span>{{$post->user->name}}</h1>
                                <h1>{{$post->created_at}}</h1>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="mt-10">
                    <h1 class="text-xl ml-5 my-2 cursor-default text-green-900">Last Comments on Blog: </h1>
                </div>
                <div class="flex mt-6 gap-5 flex-wrap justify-center">
                    @foreach($comments as $comment)
                        <div class="bg-amber-200 p-3 rounded-2xl w-3/12">
                            <h1 class="text-lg">{{$comment->user->name}}</h1>
                            <h1 class="text-md">{{$comment->body}}</h1>
                            <h1 class="text-red-600">{{$comment->post->title}}</h1>
                            <h1>{{$comment->created_at}}</h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

    <footer class="bg-red-100 py-4 flex transition-all hover:bg-red-200 hover:transition-all">
        <div class="flex flex-col ml-5 basis-1/2">
            <div>
                <h1>Matin Soleymani</h1>
            </div>
            <div>
                <p class="text-red-600">© ALL OF THE RIGHTS RESERVED</p>
            </div>
        </div>
        <div class="basis-1/2">
            <h3>Made With ❤ in IR</h3>
            <h3>Urmia - Mashad - Freedom Iran</h3>
        </div>
    </footer>

</body>
</html>
