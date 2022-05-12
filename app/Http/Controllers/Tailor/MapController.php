<?php

namespace App\Http\Controllers\Tailor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function create()
    {
            return view('tailor.map.index');
    }
}
