<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Passenger;
use App\Models\Route;
use Carbon\Carbon;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function welcome()
    {

        $routes = Route::all();
        $data = [
            'routes' => $routes
        ];
        return view('pages.welcome', $data);
    }
    public function results(Request $request)
    {
        // $routes = DB::table('routes')
        //     ->join('driver_route', 'routes.id', '=', 'driver_route.route_id')
        //     ->join('drivers', 'driver_route.driver_id', '=', 'drivers.id')
        //     ->get();
        // // foreach ($routes as $route) {
        // //     echo '<pre>';
        // //     var_dump($route->driver_id);
        // // };
        $selectRoute = Route::all();

        $departure = $request->input('departure');
        $destination = $request->input('destination');
        if ($departure && $destination) {
            $routes = DB::table('routes')
                ->join('driver_route', 'routes.id', '=', 'driver_route.route_id')
                ->join('drivers', 'driver_route.driver_id', '=', 'drivers.id')
                ->join('users', 'drivers.user_id', '=', 'users.id')
                ->where('Departure', $departure)->where('Destination', $destination)->get();
        }
        foreach ($routes as $route) {
            $route->time_depart = Carbon::parse($route->time_depart);
            $route->time_arrival = Carbon::parse($route->time_arrival);
        }
        if (auth()->user()) {
            $passenger = Passenger::where('user_id', auth()->user()->id)->first();
            $data = [
                'routes' => $routes,
                'selects' => $selectRoute,
                'passenger' => $passenger
            ];
        }else{
            $data = [
                'routes' => $routes,
                'selects' => $selectRoute,
            ];
        }

        return view('pages.results', $data);
    }
}
