<x-layout>

    @unless(count($messages) == 0)
        @foreach ($messages as $message)
            <div class="traincard">
                <h2>
                    Name : {{ $message->name }}
                </h2>
                <span>Email : {{ $message->email }}</span>
                <p>Message : {{ $message->message }}</p>
            </div>
        @endforeach
    @else
        <div class="error-container">
            <h2>There Are Not Any messages</h2>
        </div>
    @endunless
    <div class="page_links">
        {{ $messages->links() }}
    </div>

</x-layout>
