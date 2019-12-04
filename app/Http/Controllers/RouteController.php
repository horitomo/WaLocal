<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    //
    public function create(Request $request)
    {
        $route = new Route;
        $route->departureAddress = $request->departure;
        $route->arrivalAddress = $request->arrival;
        $route->wapPoint = $request->wayPoint;
        $route->save();
        return redirect('/');
    }
}
