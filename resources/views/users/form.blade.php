<x-layout>
    <div class="container-form ">
        @if($form=="login")
        <form action="/users/authenticate" method="post">
            @csrf
            <header class="container-form-header">
                <h2>
                    Log In
                </h2>
                <p>Log in to book Tickets</p>
            </header>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" />
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" />
            @error('password')
                <p class="error" >{{ $message }}</p>
            @enderror
            <p style="margin:5px; color:white;">Don't Have A Account, <a style="text-decoration:none;color:blue;"href="/register">Register</a></p>
            <button type="submit">Log in  <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
        </form>
        @endif
        @if($form=="register")
        
        <form action="/users" method="post" class="container">
            @csrf
            <header class="container-form-header">
                <h2>
                    Register
                </h2>
                <p>Create an account to book Tickets</p>
            </header>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" />
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" />
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" />
            @error('password')
                <p class="error" >{{ $message }}</p>
            @enderror
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" />
            @error('password_confirmation')
                <p class="error">{{ $message }}</p>
            @enderror
            <p style="margin:5px; color:white;">Already Have A Account,<a style="text-decoration:none;color:blue;"href="/login">Login</a></p>
            <button type="submit">Sign Up  <i class="fa-solid fa-user-plus"></i></button>
        </form>
        @endif
        @if ($form=="admin")
        <form action="/users/authenticateAdmin" method="post" style="background: #3e5968;">
            @csrf
            <header class="container-form-header">
                <h2>
                   Admin Log In
                </h2>
            </header>
            <input type="email" name="email" id="email" placeholder="Admin Email" value="{{ old('email') }}" />
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="password" name="password" id="password" placeholder="Admin Password" value="{{ old('password') }}" />
            @error('password')
                <p class="error" >{{ $message }}</p>
            @enderror
            <button type="submit">Log in  <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
        </form>
        @endif
    </div>
</x-layout>