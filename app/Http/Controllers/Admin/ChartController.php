<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ChartController extends Controller
{
    public function export_data_quantity(Request $request)
    {
        if ($request->boolen_date == false) {
            toastr()->error('Xuất biểu đồ không thành công , vui lòng kiểm tra lại dữ liệu nhập');
            return false;
        } else {
            $result = DB::select(DB::raw("SELECT p.name ,SUM(b.quantity) as quantity FROM `bills` as b JOIN `customers` as c on b.customer_id=c.id JOIN `products`  as p on b.product_id=p.id WHERE c.status=2 AND b.created_at BETWEEN '" . $request->date_start . "' AND '" . $request->date_finish . "' GROUP BY p.name"));

            $dataFinal_label = [];
            $dataFinal_data = [];

            foreach ($result as $value) {
                $dataFinal_label = array_merge($dataFinal_label, [$value->name]);
                $dataFinal_data = array_merge($dataFinal_data, [$value->quantity]);
            }
            return response()->json([
                'data_res_label' => $dataFinal_label,
                'data_res_data' => $dataFinal_data,
            ]);
        }
    }
    public function export_data_price(Request $request)
    {
        if ($request->boolen_date == false) {
            toastr()->error('Xuất biểu đồ không thành công , vui lòng kiểm tra lại dữ liệu nhập');
            return false;
        } else {
            $result = DB::select(DB::raw("SELECT p.name , (SUM(b.quantity)* p.price) as total FROM `bills` as b JOIN `customers` as c on b.customer_id=c.id JOIN `products`  as p on b.product_id=p.id 
WHERE c.status=2 AND b.created_at BETWEEN '" . $request->date_start . "' AND '" . $request->date_finish . "' GROUP BY p.name,p.price"));

            $dataFinal_label = [];
            $dataFinal_data = [];

            foreach ($result as $value) {
                $dataFinal_label = array_merge($dataFinal_label, [$value->name]);
                $dataFinal_data = array_merge($dataFinal_data, [$value->total]);
            }
            return response()->json([
                'data_res_label' => $dataFinal_label,
                'data_res_data' => $dataFinal_data,
            ]);
        }
    }
    public function index()
    {
        return view('admin.chart.homeChart', [
            'title' => 'Trang thống kê',
        ]);
    }
}
