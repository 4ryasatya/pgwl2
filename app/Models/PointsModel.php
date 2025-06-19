<?php

namespace App\Models;

//Import kelas DB, raw query eloquent laravel
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PointsModel extends Model
{
    protected $table = 'points';
    protected $guarded = ['id'];

    public function geojson_points()
    {
        $points = $this
        ->select(DB::raw('points.id, st_asgeojson(points.geom) as geom, points.name, points.description,
        points.created_at, points.updated_at, points.user_id, users.name as user_created, images'))
        ->LeftJoin('users', 'points.user_id', '=', 'users.id')
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($points as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id'=> $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'images' => $p->images,
                    'user_id' => $p->user_id,
                    'username' => $p->user_created
                ],
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;
    }

    public function geojson_point($id)
    {
        $points = $this->select(DB::raw('id, st_asgeojson(geom) as geom, name, description, created_at, updated_at, images'))
        ->where('id', $id)
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($points as $p) {
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
