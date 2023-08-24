<!doctype html>
<html lang="en" class="scrollbar scrollbar-thumb-purple-300 scrollbar-track-purple-50 scrollbar-rounded-5">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body class="container mx-auto">
    @component("components.headerAdmin")
    @endcomponent

    <main class="flex flex-col mt-4 mb-1">
        <div class="my-2">
            <h1 class="text-2xl sm:text-4xl text-center transition duration-700 ease-in-out hover:duration-700 hover:text-purple-50 hover:transition cursor-default">Welcome to Admin Panel</h1>
        </div>
        <div class="my-2 flex flex-col sm:flex-row gap-5">
            <div class="bg-blue-100 hover:bg-blue-200 hover:transition-all transition-all py-5 basis-1/2 rounded-md">
                <div>
                    <h1 class="text-xl ml-5 my-2 cursor-default text-blue-900">Last 24 Users: </h1>
                </div>
                <div class="flex mt-6 gap-5 flex-wrap justify-center">
                    @foreach($users as $user)
                        <div class="bg-amber-200 p-3 rounded-2xl w-5/12">
                            <h1 class="text-lg text-center mb-3">{{$user->name}}</h1>
                            <h1>{{$user->created_at}}</h1>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <hr><hr><hr><hr><hr><hr><hr><hr><hr>
                </div>
                <div>
                    <h1 class="text-xl ml-5 my-2 cursor-default text-blue-900">Last Posts: </h1>
                </div>
                <div class="flex mt-6 gap-5 flex-wrap justify-center">
                    @foreach($posts as $post)
                        <form method="post" action="{{route("posts.ok" , $post)}}" class="bg-amber-200 p-3 rounded-2xl w-5/12">
                            @csrf
                            <h1 class="text-lg"><span class="text-amber-600">Title: </span>{{$post->title}}</h1>
                            <h1><span class="text-amber-600">Description: </span>{{$post->description}}</h1>
                            <div class="text-center mt-5 text-green-100">
                                <button class="bg-green-500 py-2 px-5 rounded-xl">Vaild & Show</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
            <div class="bg-green-100 transition-all hover:bg-green-200 hover:transition-all rounded-md py-5  basis-1/2">
                
                <div class="mt-2">
                    <h1 class="text-xl ml-5 my-2 cursor-default text-green-900">Last Comments on Blog: </h1>
                </div>
                <div class="flex mt-6 gap-5 flex-wrap justify-center">
                    @foreach($comments as $comment)
                        <form class="bg-amber-200 p-3 text-center rounded-2xl w-5/12" method="post" action="{{route("comment.ok" , $comment)}}">
                            @csrf
                            <h1 class="text-lg"><span class="text-amber-600">User: </span> {{$comment->user->name}}</h1>
                            <h1 class="text-md"><span class="text-amber-600">Text: </span> {{$comment->body}}</h1>
                            <h1 class="text-red-600"><span class="text-amber-600">Post: </span> {{$comment->post->title}}</h1>
                            <h1><span class="text-amber-600">Date: </span> {{$comment->created_at}}</h1>
                            <div class="text-center mt-5 text-green-100">
                                <button class="bg-green-500 py-2 px-5 rounded-xl">Vaild & Show</button>
                            </div>
                        </form>
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
