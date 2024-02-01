<div class="traincard">

    <h2>{{ $train->name . ' - ' . $train->trainno }}</h2>

    <span><b>{{ $train->deparcher }} |</b></span>
    <span>{{ strtoupper($train->from) }} |</span>
    <span>{{ $train->date }} </span>


    <span><b>{{ $train->arrival }} |</b></span>
    <span>{{ strtoupper($train->to) }} | </span>
    <span>{{ $train->arrival_date }}</span>


    @php
        if ($train->av_seats_no <= 0) {
            echo "<span style=\"color:red;\">" . abs($train->av_seats_no) . ' WL </span>';
        } else {
            echo "<span style=\"color:green;\">$train->av_seats_no Available </span>";
        }
    @endphp
    <div class="buttons">
        <form action="/trains/{{ $train->id }}/edit" method="POST">
            @csrf
            <button type="submit" class="book"> <i class="fa-solid fa-pencil"></i> Edit</button>
        </form>
    
        <form action="/trains/{{ $train->id }}/delete" method="POST">
            @csrf
            <button type="submit" class="book"> <i class="fa-solid fa-bucket"></i> Delete</button>
        </form>
    </div>
    
</div>
