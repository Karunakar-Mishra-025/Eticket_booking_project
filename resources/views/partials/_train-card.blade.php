<div class="traincard">


    <h2>{{ $train->name." - ".$train->trainno}}</h2>
    <?php
    if ($from_stop == 0 && $to_stop == sizeof($stops) - 1) {
        $dateTimeObject1 = date_create($train->date . ' ' . $train->deparcher);
        $dateTimeObject2 = date_create($train->arrival_date . ' ' . $train->arrival);
    } 
    elseif ($from_stop==null) {
        $dateTimeObject1 = date_create($train->date . ' ' . $train->deparcher);
        $dateTimeObject2 = date_create($train->arrival_date . ' ' . $train->arrival);        
    }
    else {
        $dateTimeObject1 = date_create($train->deparcher);
        $dateTimeObject2 = date_create($train->arrival);
    }  
    $difference = date_diff($dateTimeObject1, $dateTimeObject2);
    ?>
    <span><b>{{ $train->deparcher }} |</b></span>
    <span>{{ strtoupper($train->from) }} |</span>
    <span>{{ $train->date }} </span>
    <?php
    if ((int) $difference->format('%d') >= 1) {
        echo '<span> - ' . $difference->format('%d Days %H:%I Hours') . ' - </span>';
    } else {
        echo '<span> - ' . $difference->format('%H:%I Hours') . ' - </span>';
    }
    
    ?>
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
    <br>
    <form action="/trains/{{ $train->id }}/book" method="POST">
        @csrf
        <input type="hidden" value="<?php
        if ((int) $difference->format('%d') >= 1) {
            echo $difference->format('%d Days %H:%I Hours');
        } else {
            echo $difference->format('%H:%I Hours');
        }
        
        ?>" name="total_duration">
        <input type="hidden" name="from_station" value="{{ $train->from_station }}">
        <input type="hidden" name="deparcher" value="{{ $train->deparcher }}">
        <input type="hidden" name="arrival" value="{{ $train->arrival }}">
        <input type="hidden" name="to_station" value="{{ $train->to_station }}">
        <input type="hidden" name="date" value="{{ $train->date }}">
        <div class="buttons">
            <span style="margin-top:25px; margin-right:10px;">Enter No Of Passengers : </span>
            <input type="number" max="10" min="1" placeholder="Enter no of Passengers"
                name="no_of_passengers" value="1" required>
            <button type="submit" class="book">Book Now</button>
        </div>

    </form>

    
</div>
