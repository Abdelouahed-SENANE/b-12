<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Reservation;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Event\Test\Passed;

class PassengerController extends Controller
{
    //
    public function dashboard()
    {
        $user = User::where('id', auth()->user()->id)->get();
        $passenger = Passenger::where('user_id', $user[0]->id)->first();
        $reservationsOfPassenger = Reservation::where('passenger_id', $passenger->id)->get();


        $routesOfPassenger = [];
        foreach ($reservationsOfPassenger as $reservationOfPassenger) {
            $routeOfPassenger = Route::where('id', $reservationOfPassenger->route_id)->first();

            if ($routeOfPassenger) {
                $routesOfPassenger[] = $routeOfPassenger;
            }
        }
        // $collection = array_merge($routesOfPassenger, $reservationsOfPassenger);
        // dd($reservationsOfPassenger, $routesOfPassenger);
        // $modified_reservations = [];
        // foreach ($reservationsOfPassenger  as  $reservation) {
        //     $modified_reservation = [];
        //     foreach ($reservation as $key => $value) {
        //         if ($key === 'created_at') {
        //             $modified_reservation['reserved_at'] = $value;
        //         } else {
        //             $modified_reservation[$key] = $value;
        //         }
        //     }
        //     $modified_reservations[] = $modified_reservation;
        // }
        // dd($modified_reservations);
        $routesModified = [];
        foreach ($routesOfPassenger as $routeOfPasenger) {
            // echo '<pre>';
            // var_dump($routeOfPasenger);
            $routesModified[] = $routeOfPasenger;
        }
        // dd($routesModified);
        $modifiedReservationPassenger = [];
        foreach ($reservationsOfPassenger as $reservation) {
            // Check if $reservation is an object
            if (is_object($reservation)) {
                // Check if the property 'created_at' exists in the object

                if (property_exists($reservation, 'created_at')) {
                    // Assign the value of 'created_at' to 'reservated_at'
                    $reservation->reservated_at = $reservation->created_at;
                    // Unset the old property 'created_at'
                    unset($reservation->created_at);
                    dump($reservation->reservated_at);
                }
                // Dump the value of 'reservated_at' (formerly 'created_at')

            } else {
                dump(false);
            }
        }
        dd($reservationsOfPassenger);
        // dd($modifiedReservationPassenger);
        $collections = [];

        foreach ($routesModified as $route) {
            $collections[] = $route;
        }
        foreach ($reservationsOfPassenger as $reservation) {
            $collections[] = $reservation;
        }

        // die();

        // $passengers_data = array_merge($routesModified, $modified_reservations);
        // dd($passengers_data);
        // foreach ($passengers_data as &$passenger_data) {
        //     if (isset($passenger_data['time_depart']) && isset($passenger_data['time_arrival'])) {
        //         try {
        //             $passenger_data['time_depart'] = Carbon::parse($passenger_data['time_depart']);
        //             $passenger_data['time_arrival'] = Carbon::parse($passenger_data['time_arrival']);
        //         } catch (\Exception $e) {
        //             dd($e->getMessage());
        //         }
        //     }
        // }
        $local_time = Carbon::now();
        $data = [
            'passengers_data' => $collections,
            'local_time' => $local_time
        ];
        return view('passenger.dashboard', $data);
    }
    public function profile()
    {
        return view('passenger.profile');
    }
    public function update_img($id)
    {

        $user = User::find($id);
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/uploads/', $filename);
            $user->picture = $filename;
            $user->save();
        }
        return redirect()->back();
    }
    public function update_info(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return back();
    }
    public function reservation(Request $request)
    {
        $reservation = new Reservation();
        $reservation->driver_id = $request->driver_id;
        $reservation->passenger_id = $request->passenger_id;
        $reservation->route_id = $request->route_id;
        $reservation->save();

        return redirect('/passenger/dashboard');
    }
    public function myReservation()
    {
        $user = User::where('id', auth()->user()->id)->get();

        $passenger = Passenger::where('user_id', $user[0]->id)->first();

        $reservationsOfPassenger = Reservation::where('passenger_id', $passenger->id)->get();

        $routesOfPassenger = [];
        foreach ($reservationsOfPassenger as $reservationOfPassenger) {
            // var_dump($reservationOfPassenger->route_id);
            // $id_route = $reservationOfPassenger->route_id
            $routeOfPassenger = Route::where('id', $reservationOfPassenger->route_id)->first();
            $routesOfPassenger[] = $routeOfPassenger;
        }
        dd($routesOfPassenger);
        // foreach ($passengerWithReservations as $passengerWithReservation) {

        //     var_dump($passengerWithReservation->reservation);
        // }

        // $route_reservation = Route::find()

    }
}
