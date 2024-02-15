<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Passenger;
use App\Models\Reservation;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function __construct()
    {
    }

    public function dashboard() {
    $user = User::count();
    $driver = Driver::count();
    $passenger = Passenger::count();
    $reservation = Reservation::count();
    $routes = Route::count();
    $current_time = date('H');
    $statistics = [
        'num_users' => $user,
        'num_drivers' => $driver,
        'num_passenger' => $passenger,
        'num_reservation' => $reservation,
        'num_route' => $routes,
        'curr_time' => $current_time
    ];
    return view('admin.dashboard' , $statistics);
    }

    public function profile() {

        return view('admin.profile');
    }
//    update Image
    public function update_img($id)
    {
        $user = User::find($id);
        if (request()->hasFile('image')){
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/uploads/', $filename);
            $user->picture = $filename;
            $user->save();
        }
        return redirect()->back();
    }
//    Update Profile
    public function update_info(Request $request , $id) {
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
    public function reservation() {

    }
    public function reservations()
    {

        return view('admin.reservations');
    }

    public function users()
    {
        $users = User::with(['admin' , 'driver' , 'passenger'])->get();

        $data = [
            'users' => $users
        ];
        return view('admin.users' , $data);
    }
//    ==== Delete User ====
    public function delete_user($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('User Deleted Succefully');
    }

    public function routes()
    {

        return view('admin.routes');
    }



}
