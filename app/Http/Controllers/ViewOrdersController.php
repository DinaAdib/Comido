<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  crocodicstudio\crudbooster\helpers\CRUDBooster;

class ViewOrdersController extends Controller
{
   
    public function viewOrders(){
        $orders['orders'] = DB::table('orders')->where('customerID',auth()->user()->id)->get();
        if(count($orders) > 0)
            return view('viewOrders',$orders);
        else return view('viewOrders');
    }


    public function updateFeedback(Request $request)
    {
      #dd($request['feedback']," InsA hn5las ");
      $feedback=$request['feedback']; 
      foreach($feedback as $key=>$val)
      { 
        if ($val ==null)
        {  
         
            $val ="";   
        }
        DB::table('orders')->where('customerID',auth()->user()->id)->where('id',$key)->update(['feedback'=>$val]);

      }
      return redirect('/viewOrders');
    }
    // public function releaseOrder(Request $request){
    //     DB::table('orders')->where('id',$request['release'])->update(['released'=>1]);
    //     return redirect('/admin/orders');

    // }
    
   

}
