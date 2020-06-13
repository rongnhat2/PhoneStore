<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShipController extends Controller
{
    public function index()
    {
        $order = DB::table('user_order')
            ->join('users', 'user_order.user_id', '=', 'users.id')
            ->join('user_detail', 'user_detail.user_id', '=', 'users.id')
            ->where('user_order.status', '=', 0)
            ->select('user_order.*', 'users.name', 'user_detail.telephone', 'user_detail.address')
            ->get();
        // dd($order);
        return view('admin.ship.index', compact('order'));
    }
    public function allshipindex()
    {
        $order = DB::table('user_order')
            ->join('users', 'user_order.user_id', '=', 'users.id')
            ->join('user_detail', 'user_detail.user_id', '=', 'users.id')
            ->select('user_order.*', 'users.name', 'user_detail.telephone', 'user_detail.address')
            ->get();
        // dd($order);
        return view('admin.allship.index', compact('order'));
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        // $items = $this->item->first();
        // dd($items);
        $items = DB::table('sub_order')
            ->join('item', 'sub_order.item_id', '=', 'item.id')
            ->where('sub_order.order_id', $id)
            ->select('sub_order.*', 'item.item_name', 'item.item_amount')
            ->get();
        $check_item = true;
        $total = 0;
        foreach ($items as $key => $value) {
            if ($value->amounts > $value->item_amount) {
                $check_item = false;
            }
            $total += $value->total_price;
        }
        // dd($check_item);
        return view('admin.ship.edit', compact('items', 'id', 'check_item', 'total'));
    }
    /**
     * @param $id
     * show form edit
     */
    public function allshipedit($id)
    {
        // $items = $this->item->first();
        // dd($items);
        $items = DB::table('sub_order')
            ->join('item', 'sub_order.item_id', '=', 'item.id')
            ->where('sub_order.order_id', $id)
            ->select('sub_order.*', 'item.item_name', 'item.item_amount')
            ->get();
        $total = 0;
        foreach ($items as $key => $value) {
            $total += $value->total_price;
        }
        return view('admin.allship.edit', compact('items', 'id', 'total'));
    }

    public function success($id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            $items = DB::table('sub_order')
                ->join('item', 'sub_order.item_id', '=', 'item.id')
                ->where('sub_order.order_id', $id)
                ->select('sub_order.*', 'item.item_name')
                ->get();
            // dd($items[0]);
            DB::table('user_order')->where('id', $id)->update([
                'status' => '1',
            ]);
            for ($i=0; $i < count($items); $i++) { 
                $sellHistory =  DB::table('item')->where('id', $items[0]->item_id)->first()->item_sell;
                $totalHistory =  DB::table('item')->where('id', $items[0]->item_id)->first()->item_amount;
                DB::table('item')->where('id', $items[0]->item_id)->update([
                    'item_sell' => $sellHistory - -$items[0]->amounts,
                    'item_amount' => $totalHistory - $items[0]->amounts,
                ]);
            }
            DB::commit();
            return redirect()->route('ship.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }
    public function remove($id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            DB::table('user_order')->where('id', $id)->update([
                'status' => '-1',
            ]);

            DB::commit();
            return redirect()->route('ship.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    public function getShip(Request $request)
    {	
    	// dd($request);
        $borrow = DB::table('user_order')
            ->join('users', 'user_order.user_id', '=', 'users.id')
            ->join('user_detail', 'user_detail.user_id', '=', 'users.id')
            ->where('user_order.status', '=', 0)
            ->select('user_order.*', 'users.name', 'user_detail.telephone', 'user_detail.address')
        	->when(!empty($request->value[0]), function ($query) use ($request) {
                return $query->where('users.name', 'like', '%'.$request->value[0].'%');
            })
            ->when(!empty($request->value[1]), function ($query) use ($request) {
                return $query->where('users.telephone', 'like', '%'.$request->value[1].'%');
            })
            ->when(!empty($request->value[2]), function ($query) use ($request) {
                return $query->where('users.address', 'like', '%'.$request->value[2].'%');
            })
            ->when(!empty($request->value[3]), function ($query) use ($request) {
                return $query->where('user_order.created_at', 'like', '%'.$request->value[3].'%');
            })
            ->get();
        return $borrow;
    }
}
