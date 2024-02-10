<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    //
    public function mytrajets()
    {
        return view('driver.mytrajets');
    }
    public function profile(User $user) {
        $driver = DB::table('drivers')->join('users' , 'drivers.user_id' , '=' , 'users.id')->select('drivers.*', 'users.*')->where($user->id)->get();
        return view('driver.profile' , ['driver' => $driver[0]]);
    }
    public function update_img($id , Request $request)
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
    public function update_info(Request $request , $id) {
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
}

