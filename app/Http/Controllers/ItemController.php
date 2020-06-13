<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\System;
use App\Item;
use Session;
use Hash;
use DB;

class ItemController extends Controller
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
        // dd($count_item);
        return view('admin.item.index', compact('listItem'));
    }

    public function create()
    {
        $listSystem = $this->system->all();
        $listSupplier = $this->supplier->all();

        return view('admin.item.add', compact('listSystem', 'listSupplier'));
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // Insert data to user table
            $itemCreate = $this->item->create([
                'item_code' => $request->item_code,
                'item_guarantee' =>  $request->item_guarantee,
                'item_name' => $request->item_name,
                'image_id' => $request->image_id,
                'system_id' => $request->system_id,
                'supplier_id' => $request->supplier_id,
                'item_screen' => $request->item_screen,
                'item_bcamera' => $request->item_bcamera,
                'item_fcamera' => $request->item_fcamera,
                'item_cpu' => $request->item_cpu,
                'item_ram' => $request->item_ram,
                'item_memory' => $request->item_memory,
                'item_memorystick' => $request->item_memorystick,
                'item_battery' => $request->item_battery,
                'item_price' => $request->item_price,
                'item_discount' => '0',
                'item_amount' => '0',
                'item_sell' => '0',
                'item_view' => '0',
                'item_description' => $request->item_description,
                'item_detail' => $request->item_detail,
            ]);

            Session::flash('success', 'Tạo Thành Công Sản Phẩm Mới : ' . $request->system_name);
            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
			Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            return redirect()->route('item.index');
            // dd($exception);
            // DB::rollBack();
        }

    }
    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        $system = $this->system->findOrfail($id);
        return view('admin.system.edit', compact('system'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // update system tabale
            $this->system->where('id', $id)->update([
                'system_name' => $request->system_name,
            ]);

            Session::flash('success', 'Cập Nhật Thành Công Danh Mục : ' . $request->system_name);
            DB::commit();
            return redirect()->route('system.index');
        } catch (\Exception $exception) {
			Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            return redirect()->route('system.index');
            // dd($exception);
            // DB::rollBack();
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

    // ajax item
    public function getItem(Request $request)
    {   
        $item = DB::table('item')
            ->select('item.*')
            ->when(!empty($request->value[0]), function ($query) use ($request) {
                return $query->where('item.item_code', 'like', '%'.$request->value[0].'%');
            })
            ->when(!empty($request->value[1]), function ($query) use ($request) {
                return $query->where('item.item_name', 'like', '%'.$request->value[1].'%');
            })
            ->get();
        return $item;
    }
}
