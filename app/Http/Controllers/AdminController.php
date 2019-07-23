<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showMenu()
    {
        $menu['menu'] = DB::table('menu')->get();
        if(count($menu) > 0)
            return view('admin/menu',$menu);
        else return view('admin/menu');
    }


    public function editMenu(Request $request){


        switch($request->submitButton) {
                case 'save': 
                    if(isset($request['itemName']) || isset($request['price'])){
                        $newNames=$request['itemName'];
                        $newPrices=$request['price'];
                        $products= DB::table('menu')->get();
                        $index=0;
                        foreach( $products as $product)
                        {
                            DB::table('menu')->where('id', $product->id)->update([ 'name'=>$newNames[$index], 'price'=>$newPrices[$index] ]);
                            $index=$index+1;
                
                        }
                    }
                   
                break;
            
                default: 
                    DB::table('menu')->where('id', $request->submitButton)->delete();
                break;
            }
        return redirect('/admin/menu');
    }


    public function addMenuItem(){
        return view('admin/addMenuItem');   
    }

    public function addItem(Request $request){
        $this->validate($request, [
            'itemName' => 'required|String',
            'price' => 'required|Integer|min:1',
        ]);
        DB::table('menu')->insert([
            ['name' => $request->itemName, 'price' => $request->price, 'rating' => 1, 'ratingCount'=>1]
            ]);

        return redirect('admin/menu');
        
    }
    
    public function viewOrders(){
        $orders['orders'] = DB::table('orders')->get();
        if(count($orders) > 0)
            return view('admin/orders',$orders);
        else return view('admin/orders');
    }

    public function releaseOrder(Request $request){
        // dd(array_keys($request['submit']));

        foreach($request['submit'] as $key=>$val){
            switch($key){

                case 'pickup':
                DB::table('orders')->where('id',$val)->update(['released'=>2]);
                return redirect('/admin/orders');
                    break;
                case 'release':
                DB::table('orders')->where('id',$val)->update(['released'=>1]);
                return redirect('/admin/orders');
                    break;
    
            }
            
        }
        

    }


    public function viewUsers(){
        $users['users'] = DB::table('users')->where("privilege",0)->get();
        if(count($users) > 0)
            return view('admin/viewUsers',$users);
        else return view('admin/viewUsers');
    }

    public function removeUser(Request $request){
        // dd($request);

        DB::table('users')->where('id', $request->userID)->delete();
        return redirect("/admin/viewUsers");
    }
}
