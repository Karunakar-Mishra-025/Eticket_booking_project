<x-layout>    
        <form class="inline back" style="padding: 0px;" action="/add_train" method="post">
            @csrf
            <button type="submit"> + Add Train </button>
        </form>
    @unless(count($trains) == 0)
        @foreach ($trains as $train)
            @include('partials/_train-card-home')
        @endforeach
        @else
        <div class="error-container">
            <h2>There Are Not Any Trains</h2>
        </div>
    @endunless
    <div class="page_links">
        {{$trains->links()}}
    </div>
</x-layout>