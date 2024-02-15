<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    //
    public function dashboard()
    {


        $driver = Driver::where('user_id', auth()->user()->id)->first();
        $routes = $driver->routes;
        foreach ($routes as $route) {
            $route->time_depart = Carbon::parse($route->time_depart);
            $route->time_arrival = Carbon::parse($route->time_arrival);
        }
        // dd($routes);

        $data = [
            'available' => $driver->available,
            'routes' => $routes
        ];
        // dd($routes, $driver);
        return view('driver.dashboard', $data);
    }
    public function cities()
    {
        $jsonFile = Storage::disk('local')->get('ville.json');

        $routes = json_decode($jsonFile);
        $cities = [];
        foreach ($routes as $city) {
            $cities[] = $city->ville;
        }
        return response()->json(['cities' => $cities]);
    }
    public function profile(User $user)
    {
        $driver = DB::table('drivers')->join('users', 'drivers.user_id', '=', 'users.id')->select('drivers.*', 'users.*')->where($user->id)->get();
        return view('driver.profile', ['driver' => $driver[0]]);
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
            'password' => 'required|min:8',
            'description' => 'required',
            'registration' => 'required',
            'type' => 'required'
        ]);
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        $driver = Driver::where('user_id', $id)->latest()->first();
        $driver->description = $request->description;
        $driver->registration = $request->registration;
        $driver->type_car = $request->type;
        $driver->save();

        return back();
    }
    public function status(Request $request)
    {
        $status = $request->status;
        $driver = Driver::where('user_id', auth()->user()->id)->first();

        if ($driver) {
            if ($status === 'online') {
                $driver->available = $status;
            } else {
                $driver->available = $status;
            }
            $driver->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully', 'available' => $driver->available]);
        } else {
            return response()->json(['success' => false, 'message' => 'Driver not found'], 404);
        }
    }
    public function store_route(Request $request)
    {
        $request->validate([
            'departure' => 'required',
            'destination' => 'required',
            'date_departure' => 'required',
            'date_departure' => 'required',

        ]);

        $newroute = new Route();
        $newroute->Departure = $request->departure;
        $newroute->Destination = $request->destination;
        $newroute->time_depart = $request->date_departure;
        $newroute->time_arrival = $request->date_arrival;
        $newroute->save();

        $newroute->drivers()->attach(auth()->user()->id);
        return back();
    }
}
