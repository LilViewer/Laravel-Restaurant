<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index(){
        return view('basket.index');
    }

    public  function add(Request $request, $id){
        $product = Product::find($id);

        $basket = session()->get('basket',[]);
        if (isset($basket[$id])){
            $basket[$id]['countBasket']++;
            $basket[$id]['stoimostBasket']=$basket[$id]['stoimostBasket']*$basket[$id]['price'];
        }
        else{
            $basket[$id]=[
                'user_id'=>auth()->user()->id,
//                'user_id'=>session('IDuser'),
                'product_id'=>$product->id,
                'countBasket'=>1,
                'nameProduct'=>$product->name,
                'price'=>$product->price,
                'image'=>$product->image,
                'KolProduct'=>$product->count,
                'stoimostBasket'=>$product->price*1,
                'nameCategory'=>$product->ProductCategories->catalog,
            ];
        }

        session()->put('basket',$basket);
        $countOrder = $request->session()->put('countOrder',count($basket));
        return redirect()->back();
    }

    public function Deletedbasket(Request $request){
//        dd($request->product_id);
        if ($request->product_id){
            $id = $request->product_id;
            $basket = session('basket');
            unset($basket[$id]);
            session()->put('basket',$basket);
            $countBasket = $request->session()->put('countOrder',count($basket));
        }
        return redirect()->back();
    }
    public function Plusbasket( $id){
        if ($id){
            $id = $id;
            $basket = session('basket');
            $basket[$id]['countBasket']++;
            session()->put('basket',$basket);
        }
        return redirect()->back();
    }
    public function Minusbasket($id){
        if ($id){
            $id = $id;
            $basket = session('basket');
            $basket[$id]['countBasket']--;
            session()->put('basket',$basket);
        }
        return redirect()->back();
    }

    public function OrderProduct(Request $request){
        $IDuser = auth()->user()->id;
        $pasUser = auth()->user()->password;
        $pas = $request->password;
        if (password_verify($pas,$pasUser)){
            return redirect()->back()->withSuccess('Заказ оформлен');
        }
        else{
            return redirect()->back()->withSuccess('Пароль не верен');
        }
    }
}
