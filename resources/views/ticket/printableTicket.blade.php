<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            text-transform: capitalize;
        }

        th,
        td {
            padding: 15px;
        }

        h1 {
            font-family: arial;
        }
    </style>
</head>

<body>
    @if (sizeof($tickets) > 1)
        <h1>Passengers Details</h1>
    @else
        <h1>Passenger Details</h1>
    @endif
    <table>
        @foreach ($tickets as $ticket)
            <tr>
                <th>Passenger's Name</td>
                <th>{{ $ticket->Passenger_name }}</td>
            </tr>
            <tr>
                <td>Passenger's Age</td>
                <td>{{ $ticket->Passenger_age }}</td>
            </tr>
            <tr>
                <td>Passenger's Email</td>
                <td>{{ $ticket->Passenger_email }}</td>
            </tr>
            @if ($tickets[0]->status == 'confirmed')
                <tr>
                    <td>Status</td>
                    <td>{{ strtoupper($ticket->status) }}</td>
                </tr>
            @else
                <tr>
                    <td>Seat</td>
                    <td><b>{{ strtoupper($ticket->seat) }}</b></td>
                </tr>
            @endif
        @endforeach
    </table>
    <h1>Fair Details</h1>
    <table>
        <tr>
                <th><b>PNR</b></td>
                <th><b>{{ $tickets[0]->pnr }}</b></td>
        </tr>
        <tr>
                <th><b>Transaction id</b></td>
                <th><b>{{ $tickets[0]->transaction_id}}</b></td>
        </tr>
        <tr>
                <th><b>Amount</b></td>
                <th><b>{{ $tickets[0]->amount}}</b></td>
        </tr>
        <tr>
            <td>Train's Name</td>
            <td>{{ $tickets[0]->train_name }}</td>
        </tr>
        <tr>
            <td>From</td>
            <td>{{ strtoupper($tickets[0]->from) }}</td>
        </tr>
        <tr>
            <td>To</td>
            <td>{{ strtoupper($tickets[0]->to) }}</td>
        </tr>
        <tr>
            <td>Deparcher</td>
            <td>{{ $tickets[0]->deparcher }}</td>
        </tr>
        <tr>
            <td>Arrival</td>
            <td>{{ $tickets[0]->arrival }}</td>
        </tr>
        <tr>
            <td>Total Journey</td>
            <td>{{ $tickets[0]->total_journey_time }}</td>
        </tr>
    </table>
</body>

</html>
