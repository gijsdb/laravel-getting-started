<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a class="p-3" href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a class="p-3" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a class="p-3" href="{{ route('posts') }}">Posts</a>
            </li>
        </ul>

        <ul class="flex items-center">
            <!-- Can also use @ auth and @ guest instead of if/else !-->
            @if (auth()->user()) 
                <li>
                <a class="p-3" href="">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <!-- using form to protect against XSR !-->
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a class="p-3" href="{{ route('login') }}">Login</a>
                </li>
                <li>
                <a class="p-3" href="{{ route('register') }}">Register</a>
                </li>
            @endif       
        </ul>
    </nav>
    @yield('content')
</body>
</html>