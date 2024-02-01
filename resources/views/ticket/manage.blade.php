<x-layout>
    <div>
        @unless (count($tickets) == 0)
        @php
            $current_pnr=0;
        @endphp
            @foreach ($tickets as $ticket)
            @if ($current_pnr==$ticket->pnr)
                @continue;
            @endif
                <div class="card" <?php if(date_create(date("Y-m-d h:i:s"))>date_create($ticket->date)){echo "style=\"background:#ff6d6d;\"";}?>>
                    @if($ticket->pnr!=null)
                        <span>PNR:{{$ticket->pnr}}</span>
                    @endif
                    <span>Train Name :{{$ticket->train_name}}</span>
                    <span>From :{{$ticket->from}}</span>
                    <span>To :{{$ticket->to}}</span>
                    @if(date_create(date("Y-m-d h:i:s"))>date_create($ticket->date))
                    <span>Train Departered</span>
                    <span>Date : {{$ticket->date}}</span>
                    @else
                    <div class="buttons">
                        <form action="/{{$ticket->pnr}}/print" method="POST">
                            @csrf
                            <button type="submit" class="book">Print Now  <i class="fa-solid fa-print"></i></button>
                        </form>
                        <form action="/{{$ticket->pnr}}/cancel" method="POST" onsubmit="return confirmCancel()">
                            @csrf
                            <button type="submit" class="cancel" >Cancel  <i class="fa-solid fa-xmark"></i></button>
                        </form>
                    </div>
                    @endif
                </div>
                @php
                    $current_pnr=$ticket->pnr;
                @endphp
            @endforeach
        @else
        <div class="error-container">
            <h2>You Have Not Booked Any Tickets.</h2>
        </div>
        @endunless
        <div>

        </div>
    </div>
    <script>
        function confirmCancel(){
            let text="Are You Sure You Want To Cancel This Ticket.";
            if (confirm(text)==true) {
                return true;
            }else{
                return false;
            }
        }
    </script>
</x-layout>