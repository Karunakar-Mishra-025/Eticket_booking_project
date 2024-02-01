<x-layout>    
@unless(count($users) == 0)
    @foreach ($users as $user)
    @if ($user->id==1)
        @continue
    @endif
    <div class="traincard">
        <h2>
            Name : {{$user->name}}
        </h2>
        <span>Email : {{$user->email}}</span>
            <form action="/users/{{$user->id}}/delete" class="inline" style="float: right;" method="post">
                @csrf
                <button type="submit" value="">Delete</button>
            </form>
    </div>
    @endforeach
    @else
    <div class="error-container">
        <h2>There Are Not Any users</h2>
    </div>
@endunless
<div class="page_links">
    {{$users->links()}}
</div>
</x-layout>