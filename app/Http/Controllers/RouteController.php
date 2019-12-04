<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Route;

class RouteController extends Controller
{
    //
    public function create(Request $request)
    {
        $departureAddress = $request->input("departureAddress");
        $arrivalAddress = $request->input("arrivalAddress");
        $wayPoint = $request->input("wayPoint");
        DB::table('route')->insert(
            ['departureAddress' => $departureAddress, 'arrivalAddress' => $arrivalAddress, 'wayPoint' => $wayPoint]
        );
    }
}
