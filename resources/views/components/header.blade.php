<heade class="flex justify-evenly items-center bg-purple-50 py-2">
    <div>
        <img class="w-20" src="{{asset("images/logo.png")}}" alt="Logo">
    </div>
    <div>
        <ul class="flex gap-5 text-lg items-center">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('blog.index')}}">Blog</a></li>
            @guest
                <li><a href="{{route("login.index")}}">Login</a></li>
            @endguest

            @auth
                <li class="triger">
                    <style>
                        .drop {
                            display: none;
                        }
                        .triger:hover .drop {
                            display: block;
                        }
                    </style>
                    <a href="{{route("panel.user")}}">{{auth()->user()->name}}</a>
                    <ul class="drop absolute bg-purple-50 py-5 px-2 text-center rounded-md">
                        <li class="text-red-600 py-2 px-10 hover:bg-purple-600 hover:text-gray-50 hover:rounded-lg block cursor-pointer"><a href="{{route("auth.logout")}}">LogOut</a></li>
                        <li class="py-2 px-10 hover:bg-purple-600 hover:text-gray-50 hover:rounded-lg block cursor-pointer">App</li>
                        <li class="py-2 px-10 hover:bg-purple-600 hover:text-gray-50 hover:rounded-lg block cursor-pointer">Soon</li>
                    </ul>
                </li>
            @endauth
            <li class="bg-purple-700 text-gray-50 py-2 px-5 rounded-3xl"><a href="{{route("contact")}}">Contact</a></li>
        </ul>
    </div>
</heade>
