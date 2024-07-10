<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Shirt;
use App\Models\Order;

class AdminController extends Controller
{
    // Method to handle the form submission and add the shirt data
    public function store(Request $request)
    {
        $request->validate([
            'shirt_name' => 'required',
            'shirt_size' => 'required',
            'unit_price' => 'required|numeric',
            'shirt_qty' => 'required|numeric|min:1',
            'shirt_img' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'shirt_color' => 'required',
        ]);

        $imageName = time() . '.' . $request->shirt_img->extension();

        $request->shirt_img->move(public_path('shirtImg'), $imageName);

        $shirt = new Shirt;
        $shirt->shirt_name = $request->shirt_name;
        $shirt->shirt_size = $request->shirt_size;
        $shirt->unit_price = $request->unit_price;
        $shirt->shirt_qty = $request->shirt_qty;
        $shirt->shirt_color = $request->shirt_color;
        $shirt->shirt_img = $imageName;
        $shirt->save();

        return redirect('/admin')->with('success', 'Shirt added successfully.');
    }

    public function shirtList(){
        $shirtList = DB::table('Shirts')->get();
        return view('admin',['shirtList'=>$shirtList]);
    }

    public function search(Request $r){
        $query = $r->input('shirtSearch');
        $shirtList = DB::table('shirts')->where('shirt_name','LIKE','%'.$query.'%')
        ->orwhere('shirt_size','LIKE','%'.$query.'%')
        ->orwhere('shirt_color','LIKE','%'.$query.'%')->get();
        return view('admin',['shirtList'=>$shirtList]);
    }

    public function delete($item){

        $deleteShirt= Shirt::where('id', $item)->first()->delete();
         
             return redirect()->back()->with('success', 'Shirt Successfully deleted!');
    }

    public function update(Request $request, $id){
        $shirt = Shirt::find($id);
        $shirt->shirt_name = $request->input('shirt_name');
        $shirt->shirt_size = $request->input('shirt_size');
        $shirt->unit_price = $request->input('unit_price');
        $shirt->shirt_qty = $request->input('shirt_qty');
        $shirt->shirt_color = $request->input('shirt_color');
        if ($request->hasFile('shirt_img')) {
            $request->validate([
                'shirt_img' => 'image|mimes:jpeg,png,gif|max:2048',
            ]);

            $imageName = time() . '.' . $request->shirt_img->extension();
            $request->shirt_img->move(public_path('shirtImg'), $imageName);
            $shirt->shirt_img = $imageName;
        }
        
        $shirt->save();
        return redirect('/admin')->with('success', "Shirt updated successfully!");
    }
          
    public function edit($id){
        $item = Shirt::find($id);
        return view('adminEdit',compact('item'));
    }

    public function adminShowOrder()
    {
    $userId = DB::table('Users')->get();
    $orderList = DB::table('Orders')->get();

    $shirtIds = $orderList->pluck('shirt_id')->toArray();
    $shirtList = Shirt::whereIn('id', $shirtIds)->get();

    return view('adminOrder', [
        'orderList' => $orderList, 
        'shirtList' => $shirtList, 
        'userId' => $userId]);
    }

    public function cancel($id){
        $order = Order::find($id);
        $Date = now();
        $order->user_id = $order->user_id;
        $order->shirt_id = $order->shirt_id;
        $order->order_date = $order->order_date;
        $order->order_status = 'CANCELLED';
        $order->cancelled_at = $Date;
        
        $order->save();
        return redirect('/adminOrder')->with('success', "Order was cancelled!");
    }

    public function fulfill($id){
        $order = Order::find($id);
        $Date = now();
        $order->user_id = $order->user_id;
        $order->shirt_id = $order->shirt_id;
        $order->order_date = $order->order_date;
        $order->order_status = 'FULFILLED';
        $order->fulfilled_at = $Date;
        
        $order->save();
        return redirect('/adminOrder')->with('success', "Order was fulfilled!");
    }
}
