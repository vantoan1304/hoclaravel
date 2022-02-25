<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{
    public function index(){
        return view('components.backend.dashboard.index');
    }
}
