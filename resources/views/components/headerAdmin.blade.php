<header class="flex justify-evenly items-center bg-purple-50 py-2">
    <div>
        <img class="w-20" src="{{asset("images/logo.png")}}" alt="Logo">
    </div>
    <div>
        <ul class="flex gap-5 text-lg items-center">
            <li><a href="{{route('panel.index')}}">Home</a></li>
            <li><a href="{{route('posts.index')}}">Blog</a></li>
            <li class="triger">
                    <style>
                        .drop {
                            display: none;
                        }
                        .triger:hover .drop {
                            display: block;
                        }
                    </style>
                    <a href="{{route("panel.index")}}">{{auth()->user()->name}}</a>
                    <ul class="drop absolute bg-purple-50 py-5 px-2 text-center rounded-md">
                        <li class="text-red-600 py-2 px-10 hover:bg-purple-600 hover:text-gray-50 hover:rounded-lg block cursor-pointer"><a href="{{route("auth.logout")}}">LogOut</a></li>
                        <li class="py-2 px-10 hover:bg-purple-600 hover:text-gray-50 hover:rounded-lg block cursor-pointer"><a href="{{route("panel.posts")}}">Posts</a></li>
                        <li class="py-2 px-10 hover:bg-purple-600 hover:text-gray-50 hover:rounded-lg block cursor-pointer"><a href="{{route("home")}}">Go Site</a></li>
                    </ul>
                </li>
            <li class="bg-purple-700 text-gray-50 py-2 px-5 rounded-3xl"><a href="{{route("contact")}}">Contact</a></li>
        </ul>
    </div>
</header>