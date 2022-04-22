<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Modules\Models\Visitor\Visitor;
// use App\Modules\Services\Dashboard\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // protected $dashboard;
    public function __construct()
    {
        // $this->dashboard = $dashboard;
    }

    public function index()
    {
        $visitors = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $chart_data = array();
        foreach ($visitors as $data) {
            array_push($chart_data, array($data->date->format('d.m.Y'), $data->total));
        }

        return view('admin.dashboard.index', compact(['visitors', 'chart_data']));
    }


    public function getTransactionData()
    {
        // return $this->dashboard->getLatestTransaction();
    }
}
