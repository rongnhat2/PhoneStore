<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Carbon\Carbon;

class StatisticalController extends Controller
{

    public function index()
    {
        // Tính tổng theo ngày
        $total_item = DB::raw('count(user_order.updated_at) as total');

        // xử lí thời gian hiện tại
        $nowDate = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $startDate = date("Y-m-01", strtotime($nowDate));
        $endDate = date("Y-m-t", strtotime($nowDate));

        // Đơn hàng tháng này
        $count_ware = DB::table('user_order')
                        ->where('user_order.updated_at', '>', $startDate)
                        ->where('user_order.updated_at', '<', $endDate)
                        ->select('user_order.updated_at', $total_item)
                        ->groupBy('user_order.updated_at')
                        ->get();
        // Đơn hàng tháng thành công
        $count_ware1 = DB::table('user_order')
                        ->where('user_order.status', '=', 1)
                        ->where('user_order.updated_at', '>', $startDate)
                        ->where('user_order.updated_at', '<', $endDate)
                        ->select('user_order.updated_at', $total_item)
                        ->groupBy('user_order.updated_at')
                        ->get();
        // Đơn hàng tháng thất bại
        $count_ware2 = DB::table('user_order')
                        ->where('user_order.status', '=', -1)
                        ->where('user_order.updated_at', '>', $startDate)
                        ->where('user_order.updated_at', '<', $endDate)
                        ->select('user_order.updated_at', $total_item)
                        ->groupBy('user_order.updated_at')
                        ->get();

        // tạo dữ liệu mẫu
        for ($i=0; $i < 32; $i++) { 
            $data[$i] = 0;
            $data1[$i] = 0;
            $data2[$i] = 0;
        }

        // lấy dữ liệu thật
        foreach ($count_ware as $key => $value) {
            $date = (int)substr($value->updated_at, 8, 2);
            $data[$date] = $value->total;
        }
        foreach ($count_ware1 as $key => $value) {
            $date = (int)substr($value->updated_at, 8, 2);
            $data1[$date] = $value->total;
        }
        foreach ($count_ware2 as $key => $value) {
            $date = (int)substr($value->updated_at, 8, 2);
            $data2[$date] = $value->total;
        }
        // dd($count_ware);

        // đơn hàng thành công 
        $order_success = DB::table('user_order')
                        ->where('user_order.status', '=', 1)
                        ->select('user_order.status', DB::raw('count(user_order.status) as total'))
                        ->groupBy('user_order.status')
                        ->first();
        // đơn hàng Hủy
        $order_remove = DB::table('user_order')
                        ->where('user_order.status', '=', -1)
                        ->select('user_order.status', DB::raw('count(user_order.status) as total'))
                        ->groupBy('user_order.status')
                        ->first();

        //  Doanh Thu
        $order_prices = DB::table('user_order')
                        ->where('user_order.status', '=', 1)
                        ->select('user_order.status', DB::raw('sum(user_order.total_price) as total'))
                        ->groupBy('user_order.status')
                        ->first();

        //  Sản Phẩm Bán Ra
        $order_item = DB::table('user_order')
                        ->join('sub_order', 'sub_order.order_id', '=', 'user_order.id')
                        ->where('user_order.status', '=', 1)
                        ->select('user_order.status', DB::raw('sum(sub_order.amounts) as total'))
                        ->groupBy('user_order.status')
                        ->first();
        // dd($order_item);

        return view('admin.statistical.index', compact('data', 'data1', 'data2', 'count_ware', 'count_ware1', 'count_ware2', 'order_success', 'order_remove', 'order_prices', 'order_item'));
    }

}
