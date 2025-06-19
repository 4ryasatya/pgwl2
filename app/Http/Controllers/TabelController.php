<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use App\Models\PolygonModel;
use App\Models\PolylinesModel;
use Illuminate\Http\Request;

class TabelController extends Controller
{

    public function __construct()
    {
        $this->points = new PointsModel();
        $this->polyline = new PolylinesModel();
        $this->polygon = new PolygonModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Tabel',
            'points' => $this->points->all(),
            'polyline' => $this->polyline->all(),
            'polygon' => $this->polygon->all()

        ];

        return view('tabel', $data);
    }
}
