<x-layout>
    @php
        if ($form=="add") {
            $action="/trains/$train->id/add";
            $form_label="Add Train";
            $trainno=rand(11111, 99999);
            $form_button="Save";
        }
        if ($form=="edit") {
            $action="/trains/$train->id/update";
            $form_label="Edit Train";
            $form_button="Update";
            $trainno=$train->trainno;
        }
    @endphp
    <div class="container-form">        
        <form action="{{$action}}" method="POST">
            @csrf
            <header class="container-form-header">
                <h2>{{$form_label}}</h2>
            </header>
            @if ($form=="edit")
                <h2>Id</h2>
                <input type="text" name="id" value="{{$train->id}}" readonly>
            @endif
            <h2>train no.</h2>
            <input type="text" name="trainno" value="{{$trainno}}" readonly>
            <h2>train name</h2>
            <input type="text" name="name" value="{{$train->name}}" required>
            <h2>available seats no.</h2>
            <input type="number" name="av_seats_no" value="{{$train->av_seats_no}}" required>
            <h2>available seats</h2>
            <textarea name="available_seats" cols="30" rows="10">{{$train->available_seats}}</textarea>
            <h2>from station</h2>
            <input type="text" name="from_station" value="{{$train->from_station}}" required>
            <h2>from station short-form</h2>
            <input type="text" name="from" value="{{$train->from}}" required>
            <h2>to station</h2>
            <input type="text" name="to_station" value="{{$train->to_station}}" required>
            <h2>to station short-form</h2>
            <input type="text" name="to" value="{{$train->to}}" required>

            <h2>date</h2>
            <input type="text" name="date" value="{{$train->date}}" required>
            <h2>arrival date</h2>
            <input type="text" name="arrival_date" value="{{$train->arrival_date}}" required>
            <h2>deparcher</h2>
            <input type="text" name="deparcher" value="{{$train->deparcher}}" required>
            <h2>arrival</h2>
            <input type="text" name="arrival" value="{{$train->arrival}}" required>
            <h2>stops</h2>
            <textarea name="stops" cols="30" rows="10">{{$train->stops}}</textarea>

            <input type="submit" value="{{$form_button}}">
        </form>
    </div>
</x-layout>