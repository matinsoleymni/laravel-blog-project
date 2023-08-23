<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
@component("components.header")
@endcomponent


<div class="flex mt-24 justify-center">
    <form class="bg-red-100 w-4/6 sm:w-2/6 rounded-3xl px-8 py-5" action="{{route("login.check")}}" method="POST">
        @csrf
        <h2 class="ml-4 mt-3">Email: </h2>
        <input class="w-full p-2 px-4 rounded-full" placeholder="Matinsoleymni@gmail.com" type="email" value="{{old("email")}}" name="email">
        <h2 class="ml-4 mt-3">Password: </h2>
        <input class="w-full p-2 px-4 rounded-full" placeholder="********" type="text" name="password" id="">
        <div class="mt-4 text-xs ml-8 text-cyan-500">
            <a href="{{route("login.create")}}">You Need Account?</a>
        </div>
        <div class="text-center mt-5">
            <button class="bg-green-500 px-5 py-2 rounded-lg text-gray-50">Login</button>
        </div>
    </form>
</div>
</body>
</html>
