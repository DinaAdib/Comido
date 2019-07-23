<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  crocodicstudio\crudbooster\helpers\CRUDBooster;

class RateController extends Controller
{
   
    //Show the menu to rate
    public function showMenu()
    {
       $menu['menu'] = DB::table('menu')->orderBy('name','desc')->get();
        if(count($menu) > 0)
            return view('rate',$menu);
        else return view('rate');
    }
    
    //Order of the salad
    public function addRating(Request $request)
    { 
        $ratings=$request['rate'];
        foreach($ratings as $key=>$val)
        {

            $current= DB::table('menu')->where("id",$key)->get();
            $rating=$current[0]->rating;
            $ratingCount=$current[0]->ratingCount;
            $average=round($rating/$ratingCount,0) ;
            if($val!=$average)
            {
            $rating=$current[0]->rating+$val;
            $ratingCount=$current[0]->ratingCount+1;
            DB::table('menu')->where("id",$key)->update(['rating'=>$rating, 'ratingCount'=>$ratingCount]);
            }
        }

        return redirect('/rate');
    }

}
