<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\System;
use App\Item;
use Session;
use Hash;
use DB;

class FrontController extends Controller
{

    private $supplier;
    private $system;
    private $item;

    public function __construct(Supplier $supplier, System $system, Item $item)
    {
        $this->supplier = $supplier;
        $this->system = $system;
        $this->item = $item;
    }
    public function index()
    {
        $listSystem = $this->system->all();
        $listSupplier = $this->supplier->all();
        $listItem = $this->item->all();

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        // lấy giữ liệu trong item
        if ( count( $listItem) < 4) {
            $carousel_item = DB::table('item')
                			->join('image', 'item.image_id', '=', 'image.id')
                			->select('item.*', 'image.image_url')
            				->get();
        }else{
            $carousel_item =  DB::table('item')
                			->join('image', 'item.image_id', '=', 'image.id')
                			->select('item.*', 'image.image_url')
                			->random(4)
            				->get();
        }

        // danh mục nhiều lượt xem nhất
        $most_Supplier = DB::table('supplier')
    			->join('image', 'supplier.image_id', '=', 'image.id')
    			->select('supplier.*', 'image.image_url')
                ->orderBy('supplier_view', 'desc')
                ->limit(4)
                ->get();

        // sản phẩm nhiều lượt xem nhất
        $most_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->orderBy('item_view', 'desc')
                ->limit(4)
                ->get();

        // sản phẩm gợi ý
        if ( count( $listItem) < 4) {
        	$sugges_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->get();
        }else{
        	$sugges_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->random(4)
                ->get();
        }

        // sản phẩm Giảm Giá
        if ( count( $listItem) < 4) {
        	$discount_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
    			->where('item.item_discount', '<>', 0)
                ->select('item.*', 'image.image_url')
                ->get();
        }else{
        	$discount_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
    			->where('item.item_discount', '<>', 0)
                ->select('item.*', 'image.image_url')
                ->random(4)
                ->get();
        }
        // sản phẩm nhiều lượt mua nhất
        $best_sale_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->orderBy('item_sell', 'desc')
                ->limit(4)
                ->get();

        return view('user.index', compact('listItem', 'listSupplier', 'carousel_item', 'most_Supplier', 'most_Item', 'sugges_Item', 'discount_Item', 'best_sale_Item', 'amount_item'));
    }

    public function all_category(){
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $listSupplier = $this->supplier->all();

        // sản phẩm Giảm Giá nhất
        $most_sell_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->orderBy('item_sell', 'desc')
                ->first();

    	$listItem = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
    			->join('system', 'item.system_id', '=', 'system.id')
    			->join('supplier', 'item.supplier_id', '=', 'supplier.id')
                ->select('item.*', 'image.image_url', 'supplier.supplier_name', 'system.system_name')
                ->get();
        $title = 'Tất cả sản phẩm';

// dd($listItem);
        return view('user.category', compact('most_sell_Item', 'listSupplier', 'listItem', 'title', 'amount_item'));
    }

    public function discount(){
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $listSupplier = $this->supplier->all();

        // sản phẩm Giảm Giá nhất
        $most_sell_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->orderBy('item_sell', 'desc')
                ->first();

    	$listItem = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
    			->join('system', 'item.system_id', '=', 'system.id')
    			->join('supplier', 'item.supplier_id', '=', 'supplier.id')
    			->where('item.item_discount', '<>', 0)
                ->select('item.*', 'image.image_url', 'supplier.supplier_name', 'system.system_name')
                ->get();

        $title = 'Sản Phẩm Giảm Giá';

// dd($listItem);
        return view('user.category', compact('most_sell_Item', 'listSupplier', 'listItem', 'title', 'amount_item'));
    }

    public function category($id){
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $listSupplier = $this->supplier->all();

        // sản phẩm Giảm Giá nhất
        $most_sell_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->orderBy('item_sell', 'desc')
                ->first();

        $this_supplier = DB::table('supplier')
    			->where('supplier.id', $id)
                ->first();

    	$listItem = DB::table('item')
    			->where('supplier.id', $id)
    			->join('image', 'item.image_id', '=', 'image.id')
    			->join('system', 'item.system_id', '=', 'system.id')
    			->join('supplier', 'item.supplier_id', '=', 'supplier.id')
                ->select('item.*', 'image.image_url', 'supplier.supplier_name', 'system.system_name')
                ->get();

        $title = $this_supplier->supplier_name;

        $this_view = $this->supplier->where('id', $id)->first()->supplier_view - -1;
        
	    $this->supplier->where('id', $id)->update([
	        'supplier_view' => $this_view,
	    ]);

// dd($this_supplier);
        return view('user.category', compact('most_sell_Item', 'listSupplier', 'listItem', 'this_supplier' ,'title', 'amount_item'));
    }

    public function item($id){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $listSupplier = $this->supplier->all();

    	// lấy ra sản phẩm
    	$item = DB::table('item')
    			->where('item.id', $id)
    			->join('image', 'item.image_id', '=', 'image.id')
    			->join('system', 'item.system_id', '=', 'system.id')
    			->join('supplier', 'item.supplier_id', '=', 'supplier.id')
                ->select('item.*', 'image.image_url', 'supplier.supplier_name', 'system.system_name')
                ->first();

        // sản phẩm Giảm Giá nhất
        $most_sell_Item = DB::table('item')
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->orderBy('item_sell', 'desc')
                ->first();

        // sản phẩm liên quan
    	$item_same = DB::table('item')
    			->where('item.supplier_id', '=', $item->supplier_id)
    			->where('item.id', '!=', $item->id)
    			->join('image', 'item.image_id', '=', 'image.id')
                ->select('item.*', 'image.image_url')
                ->limit(3)
                ->get();

        $this_view = $this->item->where('id', $id)->first()->item_view - -1;

	    $this->item->where('id', $id)->update([
	        'item_view' => $this_view,
	    ]);
        // biến kiếm tra đã tồn tại sản phẩm trong giỏ hàng
        $has_item = false;
        $value_item = 1;
        // kiểm tra item đã tồn tại trong giỏ hàng hay chưa 
        if (Session('cart')) {
            foreach (Session::get('cart')->items as $key => $value) {
                if ($value['id'] == $item->id) {
                   $has_item = true;
                   $value_item = $value['qty'];
                }
            }
        }

    	// dd($value_item);
        return view('user.item', compact('most_sell_Item', 'listSupplier', 'item', 'item_same', 'has_item', 'value_item', 'amount_item'));
    }

    public function checkout(){


        $listSystem = $this->system->all();
        $listSupplier = $this->supplier->all();
        $listItem = $this->item->all();

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $listSupplier = $this->supplier->all();

        // nếu đã tồn tại giỏ hàng, lấy sản phẩm trong giỏ hàng, hoặc trả về null
        $cart = Session('cart') ? Session::get('cart')->items : null;
        // dd($cart);
        $item = null;
        $total_qty = 0;
        if ($cart != null) {
            foreach ($cart as $key => $value) {
                $item[$key]['data'] = DB::table('item')->where('id', '=', $value['id'])->first();
                $item[$key]['prices'] = $item[$key]['data']->item_price - ($item[$key]['data']->item_price * $item[$key]['data']->item_discount / 100);
                $item[$key]['value'] = $value['qty'];
                $total_qty += $item[$key]['prices'] * $item[$key]['value'];
            }
            // dd($total_qty);
        }
        // dd($cart);
        return view('user.order', compact('listSupplier', 'amount_item', 'item', 'total_qty'));
    }
    public function login(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        $listSystem = $this->system->all();
        $listSupplier = $this->supplier->all();
        $listItem = $this->item->all();

        return view('user.login', compact('listSupplier', 'amount_item'));
    }
    
    public function register(){


        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        $listSystem = $this->system->all();
        $listSupplier = $this->supplier->all();
        $listItem = $this->item->all();

        return view('user.register', compact('listSupplier', 'amount_item'));
    }
}
