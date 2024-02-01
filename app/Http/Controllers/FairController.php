<?php

namespace App\Http\Controllers;

use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Razorpay\Api\Api;
use App\Models\Trains;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;
use Carbon\Traits\Date;

class FairController extends Controller
{

    // Showing Searched Trains


    public function search(Request $request)
    {
        if (auth()->user()!=null) {
            if (auth()->user()->name=="admin") {
            return view('main/index')->with("This Feature Is Only For Users");
        }
        }
        
        return view('trains/search', [
            'trains' => Trains::get(),
            'request' => $request
        ]);
    }

    // inserting trains manually


    public function insert()
    {
        for ($i = 02; $i <= 30; $i += 2) {
            $seats = array("S01" => array(1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "S02" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S03" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S04" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S05" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S06" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S07" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S08" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S09" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"s10" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),);
            $train = new Trains;
            $train->trainno = rand(11111, 99999);
            $train->name = 'ADI Dhuranto';
            $train->av_seats_no = 200;
            $train->available_seats = json_encode($seats);
            $train->from = 'ltt';
            $train->from_station = 'lokmanya tilak terminus';
            $train->to = 'BSB';
            $train->to_station = 'Varansi';
            $stops = array("06:00" => "lokmanya tilak terminus", "06:18" => "tane", "06:37" => "kalyan junction", "09:05" => "nashik road", "10:00" => "surat", "10:20" => "manmad junction", "11:48" => "jalgaon junction", "12:30" => "bhusaval junction", "18:00" => "itarsi junction", "21:30" => "jabalpur", "23:05" => "katni junction", "03:55" => "prayagraj junction", "05:10" => "varansi");
            $train->stops = json_encode($stops);
            if ($i < 10) {
                $train->date = '2023-02-0' . $i;
                $train->arrival_date = '2023-02-0' . $i + 1;
            } else {
                $train->date = '2023-02-' . $i;
                $train->arrival_date = '2023-02-' . $i + 1;
            }
            $train->deparcher = '06:00';
            $train->arrival = '05:10';
            $train->save();
        }



        for ($i = 02; $i <= 30; $i += 2) {
            $seats = array("S01" => array(1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "S02" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S03" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S04" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S05" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S06" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S07" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S08" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S09" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"s10" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),);
            $train = new Trains;
            $train->trainno = rand(11111, 99999);
            $train->name = 'GNC Shatabdi';
            $train->av_seats_no = 200;
            $train->available_seats = json_encode($seats);
            $train->from = 'ltt';
            $train->from_station = 'lokmanya tilak terminus';
            $train->to = 'BSB';
            $train->to_station = 'Varansi';
            $stops = array("04:00" => "lokmanya tilak terminus", "04:18" => "tane", "04:37" => "kalyan junction", "07:05" => "nashik road", "8:00" => "surat", "8:20" => "manmad junction", "9:48" => "jalgaon junction", "1030" => "bhusaval junction", "16:00" => "itarsi junction", "19:30" => "jabalpur", "21:05" => "katni junction", "01:55" => "prayagraj junction", "03:10" => "varansi");
            $train->stops = json_encode($stops);
            if ($i < 10) {
                $train->date = '2023-02-0' . $i;
                $train->arrival_date = '2023-02-0' . $i + 1;
            } else {
                $train->date = '2023-02-' . $i;
                $train->arrival_date = '2023-02-' . $i + 1;
            }
            $train->deparcher = '04:00';
            $train->arrival = '03:10';
            $train->save();
        }


        for ($i = 01; $i <= 30; $i += 2) {
            $seats = array("S01" => array(1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "S02" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S03" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S04" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S05" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S06" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S07" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S08" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S09" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"s10" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),);
            $train = new Trains;
            $train->trainno = rand(11111, 99999);
            $train->name = 'Rajdhani Express';
            $train->av_seats_no = 200;
            $train->available_seats = json_encode($seats);
            $train->from = 'ltt';
            $train->from_station = 'lokmanya tilak terminus';
            $train->to = 'BSB';
            $train->to_station = 'Varansi';
            $stops = array("06:00" => "lokmanya tilak terminus", "06:18" => "tane", "06:37" => "kalyan junction", "09:05" => "nashik road", "10:00" => "surat", "10:20" => "manmad junction", "11:48" => "jalgaon junction", "12:30" => "bhusaval junction", "18:00" => "itarsi junction", "21:30" => "jabalpur", "23:05" => "katni junction", "03:55" => "prayagraj junction", "05:10" => "varansi");
            $train->stops = json_encode($stops);
            if ($i < 10) {
                $train->date = '2023-02-0' . $i;
                $train->arrival_date = '2023-02-0' . $i + 1;
            } else {
                $train->date = '2023-02-' . $i;
                $train->arrival_date = '2023-02-' . $i + 1;
            }
            $train->deparcher = '06:00';
            $train->arrival = '05:10';
            $train->save();
        }



        for ($i = 01; $i <= 30; $i += 2) {
            $seats = array("S01" => array(1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "S02" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S03" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S04" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S05" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S06" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S07" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S08" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"S09" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),"s10" => array(1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),);
            $train = new Trains;
            $train->trainno = rand(11111, 99999);
            $train->name = 'Fextival Special';
            $train->av_seats_no = 200;
            $train->available_seats = json_encode($seats);
            $train->from = 'ltt';
            $train->from_station = 'lokmanya tilak terminus';
            $train->to = 'BSB';
            $train->to_station = 'Varansi';
            $stops = array("04:00" => "lokmanya tilak terminus", "04:18" => "tane", "04:37" => "kalyan junction", "07:05" => "nashik road", "8:00" => "surat", "8:20" => "manmad junction", "9:48" => "jalgaon junction", "1030" => "bhusaval junction", "16:00" => "itarsi junction", "19:30" => "jabalpur", "21:05" => "katni junction", "01:55" => "prayagraj junction", "03:10" => "varansi");
            $train->stops = json_encode($stops);
            if ($i < 10) {
                $train->date = '2023-02-0' . $i;
                $train->arrival_date = '2023-02-0' . $i + 1;
            } else {
                $train->date = '2023-02-' . $i;
                $train->arrival_date = '2023-02-' . $i + 1;
            }
            $train->deparcher = '04:00';
            $train->arrival = '03:10';
            $train->save();
        }

        return 'saved successfully';
    }

    public function read()
    {
        
        return;
    }


    // Showing Booking Form


    public function book(Trains $trains, Request $request)
    {
        return view('trains.book', ['train' => $trains, 'request' => $request]);
    }



    //  Generating Ticket


    public function generateTicket(Request $request, Trains $train)
    {
        for ($i=0; $i < (int)$request->no_of_passengers; $i++) { 
            $available_seats=array();
            $ticket=new Tickets;
            $ticket->train_id=$train->id;
            $ticket->user_id=auth()->user()->id;
            $ticket->pnr=$request->pnr;
            $ticket->amount=$request->amount;
            $ticket->date=$train->date;
            $ticket->transaction_id=$request->razorpay_payment_id;
            $ticket->Passenger_name = $request->{"name" . $i + 1};
            $ticket->Passenger_age = $request->{"age" . $i + 1};
            $ticket->Passenger_email = $request->{"email" . $i + 1};
            $ticket->Passenger_aadhar = $request->{"aadhar_no".$i+1};
            if ((int)$train->av_seats_no<=0) {
                $ticket->status = "Waiting";
                $ticket->seat = "Not Confirmed Yet";
            }
            else{
                $available_seats = (array)json_decode((string)$train->available_seats);
                // dd($train);
                $current_coach = array_keys($available_seats)[sizeof($available_seats) - 1];
                $current_coach_seats = $available_seats[$current_coach];
                if (sizeof($current_coach_seats) == 1) {
                    array_pop($available_seats);
                }
                $current_seat = array_pop($current_coach_seats);
                $ticket->status = "Confirmed";
                $ticket->seat = $current_coach . ' ' . $current_seat;
                $available_seats[$current_coach] = $current_coach_seats;
            }
            $ticket->deparcher = $request->deparcher;
            $ticket->arrival = $train->arrival;
            $ticket->train_name = $train->name;
            $ticket->from = $request->from_station;
            $ticket->to = $request->to_station;
            $ticket->total_journey_time = $request->total_duration;
            $ticket->date=$request->date;
            $ticket->created_at=date_create(date("Y-m-d h:i:s"));
            $ticket->save();
            $train->available_seats = json_encode($available_seats);
            $train->av_seats_no -= 1;
            $train->update();
        }
        
        if ($ticket->status == "Waiting") {
            return redirect('/')->with('message', 'Not Enough Seats Available Booked in Waiting!');
        }
        if ((int)$request->no_of_passengers == 1) {
            return redirect('/')->with('message', 'Ticket Booked!');
        } else {
            return redirect('/')->with('message', 'Tickets Booked!');
        }
    }

    // Showing manage Ticket Form


    public function manageTicket()
    {
        $tickets = Tickets::where('user_id', auth()->id())->get();
        return view('ticket.manage', ['tickets' => $tickets]);
    }

    // Printing Ticket 

    public function printTicket($pnr)
    {
        $tickets=Tickets::where('pnr',$pnr)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('ticket.printableTicket', ['tickets' => $tickets]);
        return $pdf->stream('ticket.pdf');
    }

    // Cancelling Ticket

    public function cancelTicket($pnr)
    {
        $tickets=Tickets::where("pnr",$pnr)->get();
        $all_tickets = Tickets::where("train_id", $tickets[0]->train_id)->get();
        // $date_difference=date_diff(date_create(date("Y-m-d h:i:s")),date_create($tickets[0]->created_at));
        // if((int)$date_difference->format("%i")>12 || (int)$date_difference->format("%h")>0){
            
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $api->payment->fetch($tickets[0]->transaction_id)->refund(array("amount"=>(((int)$tickets[0]->amount/100)*90)*100,"speed"=>"optimum","receipt"=>$tickets[0]->pnr));
        foreach ($tickets as $ticket) {
            if($ticket->status=="waiting"){
                $train = Trains::where('id', $ticket->train_id)->first();
                if ($train->av_seats_no<0) {
                    $train->av_seats_no += 1;  
                }
                dd($train->av_seats_no);
                $train->update();
                $ticket->delete();
                
            return redirect('/manage_tickets')->with('message', 'Ticket Cancelled Successfully!');
            }
            if ($ticket->status == "Confirmed") {
                foreach ($all_tickets as $current_ticket) {
                    if ($current_ticket->status == "Waiting") {
                        $current_ticket->status = "Confirmed";
                        $current_ticket->seat = $ticket->seat;
                        $current_ticket->update();
                        break;
                    }
                }
            }
            
        

            $var = trim($ticket->seat);
            $var = substr_replace($var, "", -1);
            $var = substr_replace($var, "", -1);
            $var = substr_replace($var, "", -1);
            $train = Trains::where('id', $ticket->train_id)->first();
            $seats = (array)json_decode($train->available_seats);
            if ($seats == null) {
                $seats[$var] = array((int)substr($ticket->seat, -1));
            } else {
                $current_coach = array_keys($seats)[sizeof($seats) - 1];
                
                if ($current_coach == $var) {
                    $current_seats = $seats[$var];
                    array_push($current_seats, (int)substr($ticket->seat, -2));
                    $seats[$var]=$current_seats;
                }
            }
            $train->available_seats = json_encode($seats);
            $train->av_seats_no += 1;
            $train->update();
            $ticket->delete();
        }
            return redirect('/manage_tickets')->with('message', 'Ticket Cancelled Successfully!');
        // }
        // else{
        //     return redirect('/manage_tickets')->with('message', 'Tickets Can Be Only Cancelled After 12 Mins Of Booking!');            
        // }
    }

    //Admin controllers

    
    public function trainDelete($id){
        $train=Trains::where("id",$id)->first();
        $train->delete();

        return redirect("/")->with("message","Train Deleted Successfully");
    }

    public function trainEdit($id){
        return view("trains.form")->with(["train"=>Trains::where("id",$id)->first(),"form"=>"edit"]);
    }
    public function trainUpdate($id,Request $request){
        $formFeilds=$request->validate([
            "id"=>"required",
            "trainno"=>"required",
            "name"=>"required",
            "av_seats_no"=>"required",
            "available_seats"=>"required",
            "from_station"=>"required",
            "from"=>"required",
            "to_station"=>"required",
            "to"=>"required",
            "date"=>"required",
            "arrival_date"=>"required",
            "deparcher"=>"required",
            "stops"=>"required",
            "arrival"=>"required"
        ]);
        $train=Trains::where("id",(int)$id)->first();
        $train->update($formFeilds);

        return redirect("/")->with("message","Train Updated Successfully");
    }
    public function trainAdd(){
        return view("trains.form")->with(["train"=>new Trains,"form"=>"add"]);
    }
    public function trainSave(Request $request){
        // dd($request->all());
        $formFeilds=$request->validate([
            "trainno"=>"required",
            "name"=>"required",
            "av_seats_no"=>"required",
            "available_seats"=>"required",
            "from_station"=>"required",
            "from"=>"required",
            "to_station"=>"required",
            "to"=>"required",
            "date"=>"required",
            "arrival_date"=>"required",
            "deparcher"=>"required",
            "stops"=>"required",
            "arrival"=>"required"
        ]);
        
        Trains::create($formFeilds);
        
        return redirect("/")->with("message","Train Added Successfully");
    }

    public function allUsers(){

        return redirect("/")->with("message","Train Deleted Successfully");
    }

    public function userDelete($id){
        $user=User::where("id",$id)->first();
        $user->delete();

        return redirect("/")->with("message","User Deleted Successfully");
    }

}
