<?php

namespace App\Http\Controllers;

use App\Models\Categoty;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function Adminindex(){
        if (auth()->user()->role==2||auth()->user()->role=='администратор'){
            return view('admin.home.index');
        }
        else{
            return view('login');
        }
    }

    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('glob');
    }

    public function glob(){
        $category1 = Categoty::orderBy('id','desc')->limit(1)->get();
        $categorys = Categoty::orderBy('id','desc')->limit(5)->get();
        unset($categorys[0]);
        $Product = Product::orderBy('created_at','desc')->where('count','>','0')->limit(4)->get();
        return view('glob',[
            'Product'=>$Product,
            'category1'=>$category1,
            'categorys'=>$categorys,
        ]);
    }
    public function about(){
        $category1 = Categoty::orderBy('id','desc')->limit(1)->get();
        $categorys = Categoty::orderBy('id','desc')->limit(5)->get();
        unset($categorys[0]);
        return view('about',[
            'category1'=>$category1,
            'categorys'=>$categorys,
        ]);
    }
    public function kontak(){
        return view('kontak');
    }
    public function katalog(Request $request){

        $category_id = $request->category_id;
        $products = Product::OrderBy('created_at','desc')->where('count','>','0')->get();
        $CategoryName = 'Все товары';
        $sort_id = $request->Sort_id;

        if($category_id!=0){
            $products = Product::OrderBy('created_at','desc')->where('count','>','0')->where('category_id','=',$category_id)->get();
            $CategoryName = Categoty::select('name')->where('id',$category_id)->get();
        }
        if($sort_id!=0){
            $products = Product::OrderBy($sort_id,'desc')->where('count','>','0')->get();
        }
        return view('katalog',[
            'products'=>$products,
            'category_id'=>$category_id,
            'CategoryName'=>$CategoryName,
            'Categorys'=>Categoty::all(),
        ]);
    }
}
