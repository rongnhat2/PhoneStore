<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use Carbon\Carbon;
use DB;

class CartController extends Controller
{
	public function index(){
        if(Session::has('cart')){
            $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);

        	// Session::flush();
        	// dd($cart);
        	return view('cart', compact('cart'));
        }else{
        	return view('cart');
        }
    }
    public function clear(){
        Session::flush();
        return redirect()->Route('customer.index');
    }

    public function Add_to_cart(Request $request){
        $oldCart    =   Session('cart') ? Session::get('cart') : null;
        $cart       =   new Cart($oldCart);
        $cart->add($request);
        $request->session()->put('cart',$cart);
        // $data_cart = Session::get('cart')->items;
        $data_cart = Session::get('cart')->totalQty;
        
        return $data_cart;
    }
    public function Remove_item(Request $request){

        $price_cart = 0;
        $qty_cart = 0;
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($request->cart_id, $request->cart_amount);

        // reset lại đơn hàng
        if(count($cart->items) > 0){

            // update cart mới
            Session::put('cart', $cart);

            // số lượng sản phẩm
            $qty_cart = Session::get('cart')->totalQty;

            // nếu đã tồn tại giỏ hàng, lấy sản phẩm trong giỏ hàng, hoặc trả về null
            $cart_save = Session('cart') ? Session::get('cart')->items : null;

            // Tính lại giá trị đơn hàng
            if ($cart_save != null) {
                foreach ($cart_save as $key => $value) {
                    $item[$key]['data'] = DB::table('item')->where('id', '=', $value['id'])->first();
                    $item_price = ($item[$key]['data']->item_discount == 0) ? ($item[$key]['data']->item_price) : ($item[$key]['data']->item_price - ($item[$key]['data']->item_price  * $item[$key]['data']->item_discount / 100));
                    $item[$key]['value'] = $value['qty'];
                    $price_cart += $item_price * $item[$key]['value'];
                }
                // dd($total_qty);
            }
        }
        else{
            Session::forget('cart');
        }

        $data['qty_cart'] = $qty_cart;
        $data['price_cart'] = $price_cart;
        return $data;
    }

    public function UpdateAmount(Request $request){
        $oldCart    =   Session('cart') ? Session::get('cart') : null;
        $cart       =   new Cart($oldCart);
        $cart->UpdateAmount($request->cart_id, $request->cart_amount);
        $request->session()->put('cart',$cart);

        $price_cart = 0;
        $qty_cart = 0;

        // số lượng sản phẩm
        $qty_cart = Session::get('cart')->totalQty;

        // nếu đã tồn tại giỏ hàng, lấy sản phẩm trong giỏ hàng, hoặc trả về null
        $cart_save = Session('cart') ? Session::get('cart')->items : null;

        // Tính lại giá trị đơn hàng
        if ($cart_save != null) {
            foreach ($cart_save as $key => $value) {
                $item[$key]['data'] = DB::table('item')->where('id', '=', $value['id'])->first();
                $item_price = ($item[$key]['data']->item_discount == 0) ? ($item[$key]['data']->item_price) : ($item[$key]['data']->item_price - ($item[$key]['data']->item_price  * $item[$key]['data']->item_discount / 100));
                $item[$key]['value'] = $value['qty'];
                $price_cart += $item_price * $item[$key]['value'];
            }
            // dd($total_qty);
        }


        $data['qty_cart'] = $qty_cart;
        $data['price_cart'] = $price_cart;
        
        return $data;
    }


}
