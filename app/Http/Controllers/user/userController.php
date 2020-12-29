<?php
namespace App\Http\Controllers\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\User;
use App\Address;
use Session;

class userController extends Controller
{
    public function index()
    {
    	$res = Product::all();
        $cat = Category::all();
    	return view('store.index')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('index', 1);
    }
    public function search(Request $r){
    $category ;
    $name ;
    if($r->query("c")){
        $category = $r->query("c");
    }
    if($r->query("n")){
        $name = $r->query("n");
    }
    $res = Product::all();
    $cat = Category::all();

    if(isset($category) && isset($name)){
        $name = strtolower($name);
        $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" ) );
        //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" );
        //$a = 0;
    }
    else if(isset($name)){
        $name = strtolower($name);
        $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%'" ) );
      //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%'" );
       // $a = 1;
    }
    else if(isset($category)){
        $sRes = DB::table('products')
        ->where("category_id" , $category)
        ->get();
        //$a = 2;
    }
    else{
        $sRes = DB::table('products')
        ->get();
       // $a= 3;
    }

    if(!isset($category)) {
        $category = -1;
    }
    //dd($sRes);
    return view('store.search')
        ->with('products', $sRes)
        ->with("cat", $cat)
        ->with("a", $category);
    }
}