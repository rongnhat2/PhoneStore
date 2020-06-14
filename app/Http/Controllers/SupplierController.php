<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Session;
use Hash;
use DB;

class SupplierController extends Controller
{
    private $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }
    public function index()
    {
        $listSupplier = $this->supplier->all();
        $total_item = DB::raw('count(*) as total');
        $count_item = [];
        // thống kê số lượng sản phẩm
        foreach ($listSupplier as $key => $value) {
            $count_item[$value->id] = 0;
            $count_item[$value->id] = DB::table('item')
                                        ->where('item.supplier_id', '=', $value->id)
                                        ->select( $total_item)
                                        ->groupBy('item.supplier_id')
                                        ->get();
                                    }
        // dd($count_item);
        return view('admin.supplier.index', compact('listSupplier', 'count_item'));
    }

    public function create()
    {
        return view('admin.supplier.add');
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // Insert data to user table
            $supplierCreate = $this->supplier->create([
                'supplier_name' => $request->supplier_name,
                'supplier_view' => '0',
                'image_id' => $request->image_id,
            ]);

            Session::flash('success', 'Tạo Thành Nhà Cung Cấp Mới : ' . $request->supplier_name);
            DB::commit();
            return redirect()->route('supplier.index');
        } catch (\Exception $exception) {
			Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            return redirect()->route('supplier.index');
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
        $supplier = DB::table('supplier')
            ->join('image', 'image.id', '=', 'supplier.image_id')
            ->where('supplier.id', '=', $id)
            ->select('supplier.*', 'image.image_url as image_url')
            ->first();
            // dd($supplier);
        return view('admin.supplier.edit', compact('supplier'));
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
            // update supplier tabale
            $this->supplier->where('id', $id)->update([
                'supplier_name' => $request->supplier_name,
                'image_id' => $request->image_id,
            ]);

            Session::flash('success', 'Cập Nhật Thành Công Danh Mục : ' . $request->supplier_name);
            DB::commit();
            return redirect()->route('supplier.index');
        } catch (\Exception $exception) {
			// Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            // return redirect()->route('supplier.index');
            dd($exception);
            DB::rollBack();
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete supplier
            $supplier = $this->supplier->find($id);
            $supplier->delete($id);
            Session::flash('success', 'Đã Xóa Danh Mục : ' . $supplier->supplier_name);

            DB::commit();
            return redirect()->route('supplier.index');
        } catch (\Exception $exception) {
			Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            return redirect()->route('supplier.index');
            // dd($exception);
            // DB::rollBack();
        }

    }
}
