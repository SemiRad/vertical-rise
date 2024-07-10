<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Shirt;
use App\Models\User;
use App\Models\Order;
use Session;

class UserController extends Controller
{
    public function shirtList(){
        $shirtList = DB::table('Shirts')->get();
        return view('shirts',['shirtList'=>$shirtList]);
    }

    public function showLoginForm()
    {
        return view('plain.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required']);
            $user = User::where('username', '=', $request->username)->first();
            if($user){
                if($request->password == $user->password){
                $request->session()->put('loginID', $user->id);
                return redirect('/home');}
                else{
                return back()->with('fail', 'Invalid Credentials');}}
                else{
                return back()->with('fail', 'Invalid Credentials');}
    }

    public function logout(){
        if(Session::has('loginID')){
            Session::pull('loginID');
           return redirect('/login'); }}

    public function processSignup(Request $request)
    {
        // Validate the user input
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'username.unique' => 'The username has already been taken.',
        ]);

        // Create a new user with the validated data
        $user = User::create($validatedData);

        // Redirect or perform any other action
        return redirect('/login')->with('success', 'SIGN UP SUCCESSFUL!');
    }

    public function showSignupForm()
    {
        return view('plain.signup');
    }

    public function createOrder(Request $request){
        $shirtId = $request->input('shirt_id');
        $orderDate = now();
        $userId = User::where('id', '=', Session::get('loginID'))->first();  

        // Store the order in the database
        Order::create([
            'user_id' => $userId->id,
            'shirt_id' => $shirtId,
            'order_date' => $orderDate,
            'note' => '',
            'order_status' => 'PENDING',
            'fulfilled_at' => null,
            'cancelled_at' => null,
        ]);

        return redirect()->back()->with('success', 'Order created successfully.');
    }

    public function showOrder()
    {
    $userId = User::where('id', '=', Session::get('loginID'))->first();
    $orderList = Order::where('user_id', '=', $userId->id)->get();

    $shirtIds = $orderList->pluck('shirt_id')->toArray();
    $shirtList = Shirt::whereIn('id', $shirtIds)->get();

    return view('plain.order', [
        'orderList' => $orderList, 
        'shirtList' => $shirtList, 
        'userId' => $userId]);
    }

    public function cancelOrder(Request $request, $item, $shirtId){

        $userId = User::where('id', '=', Session::get('loginID'))->first();
        $order = Order::find($item);
        $cancelDate = now();
        $order->user_id = $userId->id;
        $order->shirt_id = $shirtId;
        $order->order_date = $order->order_date;
        $order->note = $request->input('note');
        $order->order_status = 'CANCELLED';
        $order->cancelled_at = $cancelDate;
        
        $order->save();
        return redirect('/order')->with('success', "Order was cancelled!");
    }

    public function accountDet()
    {
    $userId = Session::get('loginID');
    $user = User::find($userId);
    return view('plain.account', compact('user'));
    }

    public function updateUser(Request $r){
        $userId = Session::get('loginID');
        $user = User::find($userId);

        $user->first_name = $r->input('first_name');
        $user->last_name = $r->input('last_name');
        $user->birthday = $r->input('birthday');
        $user->gender = $r->input('gender');
        $user->address = $r->input('address');
        $user->contact = $r->input('contact');
        $user->username = $r->input('username');
        $user->password = $r->input('password');
        $user->is_admin = $user->is_admin;
        $user->save();
        return redirect('account')->with('success', "Account details updated successfully!");
    } 
}
