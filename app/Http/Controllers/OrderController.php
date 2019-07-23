<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  crocodicstudio\crudbooster\helpers\CRUDBooster;

class OrderController extends Controller
{
   
    //Show the menu to order
    public function showMenu()
    {
       $menu['menu'] = DB::table('menu')->orderBy('name','desc')->get();
       
       $menu['cart']= DB::table('carts')->where('customerID',auth()->user()->id)->get();
       $menu['ids'] = $menu['cart']->pluck('menuItemID')->toArray();
       
    $index = 0;
    $quantity = 0;
       foreach($menu['menu'] as $item){
           if(in_array($item->id, $menu['ids'])){
               $quantity = $menu['cart'][$index]->quantity;
               $index+=1;
           }
           else{
            $quantity = 0;
           }

        $item->quantity = $quantity;
        }

    
        if(count($menu) > 0)
            return view('order',$menu);
        else return view('order');
    }

    //Order 
    public function order(Request $request)
    {   

        $this->validate($request, [
            'cartItems' => 'required|array|min:1',
            'quantity' => 'required|array',
        ]);



        if(isset($request['cartItems']) && isset($request['quantity'])){
                $checkedItems=array_keys($request['cartItems']);
            
            $checkedQuantities=[];
            foreach($request->quantity as $key => $val)
            {
                // $found = $key in:$checkedItems;
                if(in_array($key,$checkedItems)){
                    if($val < 1){
                        // $validation->fails();
                        return back()->withErrors(['quantity' => "You must set quantity greater than 0 for checked items"]);
                    }
                    else{

                        $productFound = DB::table('carts')->where('customerID',auth()->user()->id)->where('menuItemID', $key)->first();
                        if ($productFound) {

                            DB::table('carts')->where('customerID',auth()->user()->id)->where('menuItemID', $key)->update(['quantity'=>$val]);
                        }
                        else{
                           // dd('customerID ', auth()->user()->id , 'menuItemID ', $key, 'quantity ' , $val);
                            DB::table('carts')->insert([
                                ['customerID' => auth()->user()->id , 'menuItemID' => $key, 'quantity' => $val]
                                ]);
                        }
                    }
        
       
                    array_push($checkedQuantities, $key);
                    // $checkedQuantities.append($key,$val);
                }
            };

            DB::table('carts')->where('customerID', auth()->user()->id)->whereNotIn('menuItemID', $checkedItems)->delete();

            if(auth()->user()->id == null)  //if logout
            return redirect('/login');


        }
        else{
            return redirect('order');
        }
        
        return redirect('confirmOrder');
        

    }

}
