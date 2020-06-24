<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notifications\RepliedToTread;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\User;
use App\Product;


use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator', ['except' => 'logout']);
    }

    public function index()
    {

        $counts = [
        'user' => \DB::table('users')->count(),
        'product' => \DB::table('product')->count()
    ];
        return view('admin.welcome',['counts' => $counts]);
    }
    
}
