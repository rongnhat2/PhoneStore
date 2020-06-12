<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;
use Hash;
use DB;

class DiscountController extends Controller
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function index()
    {

        $listItem = $this->item->where('item_discount', '!=', 0)->get();
        // dd($listItem);
        return view('admin.discount.index', compact('listItem'));
    }

    public function create()
    {
        $listItem = $this->item->where('item_discount', '==', 0)->get();

        return view('admin.discount.add', compact('listItem'));
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // Update data to item table
            $this->item->where('id', '=', $request->item_id)->update([
                'item_discount' => $request->item_discount,
            ]);
            
            Session::flash('success', 'Tạo Thành Công Giảm Giá');
            DB::commit();
            return redirect()->route('discount.index');
        } catch (\Exception $exception) {
			// Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            // return redirect()->route('item.index');
            dd($exception);
            DB::rollBack();
        }

    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete system
            $system = $this->system->find($id);
            $system->delete($id);
            Session::flash('success', 'Đã Xóa Danh Mục : ' . $system->system_name);

            DB::commit();
            return redirect()->route('system.index');
        } catch (\Exception $exception) {
			Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            return redirect()->route('system.index');
            // dd($exception);
            // DB::rollBack();
        }

    }
}
