<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Route;

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
        $departureB = $request->input("departure");
        $arrivalB = $request->input("arrival");
        $routes = DB::select('select * from route where departureAddress = ?',["東京都八王子市上壱分方町３５３−１１５"]);
        //$routes = DB::table('route')->get();
        $routes[0]->wayPoint = $departureB;
        return $routes;
    }

    public function example(Request $request)
    {
        $departureB = $request->input("departure");
        $arrivalB = $request->input("arrival");
        // $routes = DB::select('select * from route where departureAddress = ? AND arrivalAddress = ?',[$departureB,$arrivalB]);
        $routes = DB::table('route')->join('store','route.wayPoint','=','store.storeAddress')->whereRaw('departureAddress = ?',[$departureB])->whereRaw('arrivalAddress = ?',[$arrivalB])->select('route.*','store.storeName','storeCategory')->get();
        //$routes = DB::table('route')->get();
        return $routes;
    }
}
