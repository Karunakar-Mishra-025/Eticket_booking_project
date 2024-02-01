<x-layout>
    <?php $error=false; ?>

            {{-- Modify Search Panel --}}

    <form action="/search" method="post" class="form modify">
        @csrf
        <header>
            <h2>Modify Search</h2>
        </header>
        <input type="text" name="from" id="from" placeholder="From" value="{{ $request->from }}">
        <input type="text" name="to" id="to" placeholder="To" value="{{ $request->to }}">
        <input type="date" name="date" id="date" min="2022-12-01" max="2022-12-31"  value="{{ $request->date }}"required>
        <button type="submit">Search <i class="fa-solid fa-search"></i></button>
    </form>
    
    @if(date_create($request->date)<date_create(date("Y-m-d")))
        <div class="error-container">
            <h2>Please Enter Valid Date</h2>
        </div>
        <?php $error=true; ?>
    @endif
    
    @if (sizeof($trains->where('date', $request->date)) == 0 && !$error)
    <div class="error-container">
        <h2>No Trains Running On This Date, Chosing An Alternate Date</h2>
    </div>
    <?php $error=true; ?>
    @endif
    @if (!$error)

    {{--Next Page And Previous Page Buttons--}}
    <div class="buttons-next-prev">
        <form action="/search" method="POST">
            @csrf
            <input type="hidden" name="from" value="{{ $request->from }}">
            <input type="hidden" name="to" value="{{ $request->to }}">
            @php
                $varr = new DateTime($request->date);
                $varr->modify('-1 day');
            @endphp
            <input type="hidden" name="date" value="{{ $varr->format('Y-m-d') }}">
            <button type="submit" class="book"><i class="fa-solid fa-arrow-left"></i> Previous
                Date</button>

        </form>
        <form action="/search" method="POST">
            @csrf
            <input type="hidden" name="from" value="{{ $request->from }}">
            <input type="hidden" name="to" value="{{ $request->to }}">
            @php
                $varr = new DateTime($request->date);
                $varr->modify('+1 day');
            @endphp
            <input type="hidden" name="date" value="{{ $varr->format('Y-m-d') }}">
            <button type="submit" class="book next">Next Date <i class="fa-solid fa-arrow-right"></i></button>
        </form>
    </div>

        <div class="container-train">
            <?php $i = 1; ?>
            @unless(count($trains) + 100 == 0)
                @foreach ($trains as $train)
                    <?php $date_now = date_create('2022-10-01');
                    $from = strtolower($train->from) == strtolower($request->from) || strtolower($train->from_station) == strtolower($request->from);
                    $to = strtolower($train->to) == strtolower($request->to) || strtolower($train->to_station) == strtolower($request->to);
                    ?>
                        <?php
                        $stops = (array) json_decode($train->stops);
                        $values = array_values($stops);
                        if ($stops != null) {
                            $to_stop = array_search(strtolower($request->to), $values);
                            $from_stop = array_search(strtolower($request->from), $values);
                        }
                        ?>
                        @if ($stops != null && $to_stop >= 0 && $to_stop != false && $from_stop >= 0 && $train->date == $request->date)
                            <?php
                            $train->to = $values[$to_stop];
                            $train->from = $values[$from_stop];
                            $train->deparcher = array_keys($stops)[$from_stop];
                            $train->arrival = array_keys($stops)[$to_stop];
                            ?>
                            @include('partials/_train-card')
                            @continue
                        @endif
                        @if ($from && $to)
                            @if ($train->date == $request->date)
                            @include('partials/_train-card')
                            @endif
                        @endif
                @endforeach
            @else
            <div class="error-container">
                <h2>No Trains Found</h2>
            </div>
            @endunless
        </div>
    @endif
    
</x-layout>
