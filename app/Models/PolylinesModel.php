<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolylinesModel extends Model
{
    protected $table = 'polyline';
    protected $guarded = ['id'];

    public function geojson_polyline()
    {
        $polyline = $this->select(DB::raw('polyline.id, st_asgeojson(polyline.geom) as geom, polyline.name, polyline.description,
        st_length(polyline.geom, true) as length_m, st_length(polyline.geom, true)/1000 as length_km, polyline.created_at, polyline.updated_at, polyline.user_id, users.name as user_created, images'))
        ->LeftJoin('users', 'polyline.user_id', '=', 'users.id')
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polyline as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id'=> $p->id,
                    'name' => $p->name,
                    'length_km' => $p->length_km,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'images' => $p ->images,
                    'user_id' => $p->user_id,
                    'username' => $p->user_created
                ],
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;
    }

    public function geojson_polylin($id)
    {
        $polyline = $this->select(DB::raw('id, st_asgeojson(geom) as geom, name, description, created_at, updated_at, images'))
        ->where('id', $id)
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polyline as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'images' => $p->images
                ],
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;
    }
}
