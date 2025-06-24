<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
    )
    {}
    public function index()
    {
        return inertia('Dashboard');
    }
}
