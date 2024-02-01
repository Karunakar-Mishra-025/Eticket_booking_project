<x-layout>
    <div class="edit-container">
        <form action="/update_profile" method="POST">
            @csrf
            <h2>Edit Profile</h2>

            <input type="text" name="name" id="name" placeholder="Name" value="{{auth()->user()->name}}" />
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="email" name="email" id="email" placeholder="Email" value="{{auth()->user()->email}}" />
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
            <input type="submit" value="Save">
            <a href="/" class="back"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </form>
    </div>
</x-layout>