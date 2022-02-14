<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EventParticipant;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('home.home',[
            'hasRunningEvent'=>runningEventId(),
        ]);
    }
}
