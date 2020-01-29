<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function create(Request $request){
        $storeName = $request->input("storeName");
        $storeAddress = $request->input("storeAddress");
        $storeCategory = $request->input("storeCategory");
        $lat = (double)$request->input("lat");
        $lng = (double)$request->input("lng");
        DB::table('store')->insert(
            ['storeName' => $storeName, 'storeAddress' => $storeAddress, 'storeCategory' => $storeCategory, 'lat' => $lat, 'lng' => $lng]
        );
    }

    public function list(Request $request)
    {
        $departureLat = $request->input("departurelat");
        $departureLng = $request->input("departurelng");
        $arrivalLat = $request->input("arrivallat");
        $arrivalLng = $request->input("arrivallng");
        if($departureLat < $arrivalLat){
            $prevLat = $departureLat;
            $nextLat = $arrivalLat;
        }else {
            $prevLat = $arrivalLat;
            $nextLat = $departureLat;
        }

        if($departureLng < $arrivalLng){
            $prevLng = $departureLng;
            $nextLng = $arrivalLng;
        }else {
            $prevLng = $arrivalLng;
            $nextLng = $departureLng;
        }
        $routes = DB::table('store')->whereRaw('lat between ? AND ?',[$prevLat,$nextLat])->whereRaw('lng between ? AND ?',[$prevLng,$nextLng])->get();
        //$routes = DB::select('select * from store where (lat between ? AND ?) AND (lng between ? AND ?)',[$prevLat],[$nextLat],[$prevLng],[$nextLng]);
        return $routes;
    }
}
