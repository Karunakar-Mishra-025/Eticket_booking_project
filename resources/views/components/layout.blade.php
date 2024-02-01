<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        
    </style>
    <link rel="stylesheet" href="/app.css" />
    <link rel="stylesheet" href="/main.css" />
    <link rel="stylesheet" href="./fontawesome-icons/css/all.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <div class="header">
        <h1>E-ticket booking System</h1>
    </div>
    <nav>
        <div>
            <ul id="nav" class="nav">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li class="nav-icon"><a href="javascript:void(0);" onclick="navbarDropdown()"><i class="fa fa-bars"></i></a></li>
                @auth
                    <li>
                        <a onclick="dropdown_profile()">
                            Welcome <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}  &nbsp;<i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <div id="profile_dropdown" class="profile_dropdown">
                            @if (auth()->user()->name!="admin")
                            <a href="/edit_profile">
                                Edit Profile  &nbsp;<i class="fa-solid fa-pencil"></i>
                            </a>                            
                            @endif
                            <form class="inline" action="/logout" method="post">
                                @csrf
                                <button type="submit">
                                    <i class="fa-solid fa-door-closed"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                    @if (auth()->user()->name!="admin")
                    <li>
                        <a href="/manage_tickets"><i class="fa-solid fa-gear"></i> Booked Tickets</a>
                    </li>
                    @else
                    <li>
                        <a href="/trains">All Trains</a>
                    </li>
                    <li>
                        <a href="/users">Users</a>
                    </li>
                    <li>
                        <a href="/messages">Messages</a>
                    </li>
                    @endif
                @else
                    <li ><a href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Log In</a></li>
                    <li ><a href="/register"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                @endauth
        </div>
        
        </ul>
    </nav>
    {{ $slot }}
    <div class="footer">
        <span>&copy;All Rights Reserved by e-ticket booking System</span>
    </div>
    <x-flash-message />
    <script>
        function dropdown_profile(){
           document.getElementById('profile_dropdown').classList.toggle("active"); 
        }
        function navbarDropdown(){
            var nav=document.getElementById("nav");
            if (nav.className === "nav") {
                nav.className +=" responsive";
            }
            else{
                nav.className="nav";
            }
        }
    </script>
</body>

</html>
