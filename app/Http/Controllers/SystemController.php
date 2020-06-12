<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use Session;
use Hash;
use DB;

class SystemController extends Controller
{
    private $system;

    public function __construct(System $system)
    {
        $this->system = $system;
    }
    public function index()
    {
        $listSystem = $this->system->all();
        $total_item = DB::raw('count(*) as total');
        $count_item = [];
        // thống kê số lượng sản phẩm
        foreach ($listSystem as $key => $value) {
            $count_item[$value->id] = 0;
            $count_item[$value->id] = DB::table('item')
                                        ->where('item.system_id', '=', $value->id)
                                        ->select( $total_item)
                                        ->groupBy('item.system_id')
                                        ->get();
                                    }
        // dd($count_item);
        return view('admin.system.index', compact('listSystem', 'count_item'));
    }

    public function create()
    {
        return view('admin.system.add');
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // Insert data to user table
            $systemCreate = $this->system->create([
                'system_name' => $request->system_name,
                'system_view' => '0',
            ]);

            Session::flash('success', 'Tạo Thành Công Danh Mục Mới : ' . $request->system_name);
            DB::commit();
            return redirect()->route('system.index');
        } catch (\Exception $exception) {
			Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            return redirect()->route('system.index');
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
}
