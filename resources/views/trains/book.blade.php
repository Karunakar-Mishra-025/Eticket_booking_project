<x-layout>
    <div class="container-form">
        <form action="/trains/{{ $train->id }}/book/generateTicket" method="post">
            @csrf
            @php
                $var_pnr = rand(1111111111, 9999999999);
            @endphp

            <input type="hidden" name="no_of_passengers" value="{{ $request->no_of_passengers }}">
            @for ($i = 1; $i <= $request->no_of_passengers; $i++)
                <header class="container-form-header">
                    <h2>Passenger {{ $i }} Details</h2>
                </header>
                <input type="text" name="name{{ $i }}" id="name" placeholder="Enter Passenger's Name"
                    required>
                <input type="text" name="age{{ $i }}" id="age" placeholder="Enter Passenger's Age"
                    required>
                <input type="hidden" name="email{{ $i }}" id="email" value="{{ auth()->user()->email }}"
                    placeholder="Enter Passenger's Contact Email" required>
                <input type="number" name="aadhar_no{{ $i }}" placeholder="Enter Your Aadhar No."
                    maxlength="12">



                <input type="hidden" name="total_duration" value="{{ $request->total_duration }}">
                <input type="hidden" name="from_station" value="{{ $request->from_station }}">
                <input type="hidden" name="to_station" value="{{ $request->to_station }}">
                <input type="hidden" name="deparcher" value="{{ $request->deparcher }}">
                <input type="hidden" name="arrival" value="{{ $request->arrival }}">
                <input type="hidden" name="date" value="{{ $request->date }}">
                <input type="hidden" name="arrival" value="{{ $request->arrival }}">
                <input type="hidden" name="pnr" value="{{ $var_pnr }}">
            @endfor
            <a href="/" class="back"><i class="fa-solid fa-arrow-left"></i> Back</a>

            <form action="/trains/{{ $train->id }}/book/generateTicket" method="POST">
            @csrf
            <input type="hidden" name="amount" value="{{ (float) (10001 * (int) $request->no_of_passengers) / 100 }}">

            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_MKR2OHouZHY8S9"
                data-amount="{{ 10001 * (int) $request->no_of_passengers }}" data-currency="INR"
                data-buttontext="Book" data-name="karunakarmishra.in"
                data-description="Rozerpay" data-image="https://realprogrammer.in/wp-content/uploads/2020/10/logo.jpg"
                data-prefill.name="name" data-prefill.email="email" data-theme.color="#003049"></script>
            </form>
                
        </form>
    </div>
</x-layout>
