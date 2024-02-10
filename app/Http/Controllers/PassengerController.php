<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PassengerController extends Controller
{
    //
    public function mytrips() {
        return view('passenger.mytrips');
    }
    public function profile() {
        return view('passenger.profile');
    }
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
}
