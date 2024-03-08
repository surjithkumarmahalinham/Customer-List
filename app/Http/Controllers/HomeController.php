<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $users = User::all();
        return view('home',compact('users'));
    }
    public function view($id)
    {
        $user = User::find($id);
        return view('view',compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $file = request()->hasfile('profile');
        
        $customer = User::find($id);
        $customer->username = $request->username;
        $customer->phone_number = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        if(!empty($file))
        {
            $filename = time().'.'.request()->profile->getClientOriginalExtension();
            request()->profile->move(public_path('profile'),$filename);
            $customer->photo = $filename;
        }
        $customer->update();
        
        return redirect()->route('home');
    }
    public function delete($id)
    {
        $customer = User::find($id);
        $customer->delete();
        return redirect()->route('home');
    }
}
