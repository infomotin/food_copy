<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Client;
use App\Models\Admin\Category;
use App\Models\Admin\Banner;


class ReportController extends Controller
{
    //AdminAllReport
    public function AdminAllReport()
    {
        return view('admin.backend.report.all_report');
    }
}
