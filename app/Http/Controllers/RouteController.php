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
        $lat = $request->input("lat");
        $lng = $request->input("lng");
        DB::table('route')->insert(
            ['departureAddress' => $departureAddress, 'arrivalAddress' => $arrivalAddress, 'wayPoint' => $wayPoint, 'lat' => $lat, 'lng' => $lng]
        );
    }

    public function index(Request $request)
    {
        $departureAddress = $request->input("departureAddress");
        $arrivalAddress = $request->input("arrivalAddress");
        $routes = DB::select('select * from route where departureAddress = ?',["東京都八王子市上壱分方町３５３−１１５"]);
        //$routes = DB::table('route')->get();
        return $routes;
    }
}
