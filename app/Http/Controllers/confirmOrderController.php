<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  crocodicstudio\crudbooster\helpers\CRUDBooster;

class confirmOrderController extends Controller
{
   
    
    public function showCart()
    {  
        $cart['cart']= DB::table('carts')->where('customerID',auth()->user()->id)->get();

        $array=[];
        $total = 0;
        foreach($cart['cart'] as $item){
            // dd(DB::table('menu')->where('id',$item->menuItemID)->get());
                $itemInfo = DB::table('menu')->where('id',$item->menuItemID)->get();
                $item->name =  $itemInfo[0]->name;
                $item->price = $itemInfo[0]->price;
                $total = $total+ ($item->price*$item->quantity);
                // dd($total);
                array_push($array, $item);
            
        }
        $cart['total'] = $total;
        // $cart->total = $total;
        // dd($array);
        if(count($cart) > 0){
            // dd($cart);
            return view('confirmOrder', $cart);

        }
        else return view('confirmOrder');
    }
    

    public function confirmOrder(Request $request)
    { 
        if(isset($request)){

            // dd($request);
            $validator = $this->validate($request, [
                'pickUpTime' => 'required|',
            ]);

            if($request->pickUpTime >= '16:00'){

                return back()->withErrors(['pickUpTime' => "You can pick your order before 4 PM only"]);
            }
            
            switch($request->submitButton) {


            //     pickUpTime');
            // $table->text('released');
            // $table->text('feedback')
                case 'confirm': 
                
                    $cart['cart']= DB::table('carts')->where('customerID',auth()->user()->id)->get();
                    $orderDetails="";
                     foreach($cart['cart'] as $item){
                    
                        $itemInfo = DB::table('menu')->where('id',$item->menuItemID)->get();
                        $orderDetails.= $item->quantity ." ". $itemInfo[0]->name."  ";

                    }
                  
                    
                   DB::table('carts')->where('customerID', auth()->user()->id)->delete();
                    DB::table('orders')->insert([
                        ['customerID' => auth()->user()->id , 'pickUpTime' => $request->pickUpTime, 'released' => 0, 'feedback' => '' ,'details'=>$orderDetails]
                        ]);
                break;
            
                case 'cancel': 
                    DB::table('carts')->where('customerID', auth()->user()->id)->delete();
                break;
            }
        }
       
    
        return redirect('/viewOrders');
    }

    // public function getTotal((Request $request){

    // }

}