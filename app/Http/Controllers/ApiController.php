<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use App\Models\PolygonModel;
use Illuminate\Http\Request;
use App\Models\PolylinesModel;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
        $this->polyline = new PolylinesModel();
        $this->polygon = new PolygonModel();
    }

    public function points(){
        $points = $this->points->geojson_points();
        return response()->json($points);
    }

    public function point($id)
    {
        $points = $this->points->geojson_point($id);
        return response()->json($points);
    }

    public function polyline(){
        $polyline = $this->polyline->geojson_polyline();
        return response()->json($polyline, 200, [], JSON_NUMERIC_CHECK);
    }

    public function polylin($id){
        $polyline = $this->polyline->geojson_polylin($id);
        return response()->json($polyline, 200, [], JSON_NUMERIC_CHECK);
    }

    public function polygon(){
        $polygon = $this->polygon->geojson_polygon();
        return response()->json($polygon, 200, [], JSON_NUMERIC_CHECK);
    }

    public function polygo($id){
        $polygon = $this->polygon->geojson_polygo($id);
        return response()->json($polygon, 200, [], JSON_NUMERIC_CHECK);
    }
}
