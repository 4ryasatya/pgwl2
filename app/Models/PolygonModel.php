<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolygonModel extends Model
{
    protected $table = 'polygon';
    protected $guarded = ['id'];

    public function geojson_polygon()
    {
        $polygon = $this->select(DB::raw('
        polygon.id,
        st_asgeojson(polygon.geom) as geom,
        polygon.name,
        polygon.kecamatan_id,
        kecamatan.nama_kecamatan as kec,
        polygon.description,
        st_area(geom, true)/1000000 as luas_km2,
        st_area(polygon.geom, true)/10000 as luas_hektar,
        polygon.created_at,
        polygon.updated_at,
        polygon.user_id,
        users.name as user_created,
        images'))
            ->LeftJoin('users', 'polygon.user_id', '=', 'users.id')
            ->LeftJoin('kecamatan', 'polygon.kecamatan_id', '=', 'kecamatan.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygon as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'kecamatan_id' => $p->kecamatan_id,
                    'nama_kecamatan' => $p->kec,
                    'luas_hektar' => $p->luas_hektar,
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

    public function geojson_polygo($id)
    {
        $polygon = $this->select(DB::raw('
        polygon.id,
        st_asgeojson(geom) as geom,
        name,
        description,
        polygon.kecamatan_id,
        kecamatan.nama_kecamatan as kec,
        created_at,
        updated_at,
        images'))
            ->LeftJoin('kecamatan', 'polygon.kecamatan_id', '=', 'kecamatan.id')
            ->where('polygon.id', $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygon as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'kecamatan_id' => $p->kecamatan_id,
                    'nama_kecamatan' => $p->kec,
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

    public function kecamatan()
    {
        return $this->belongsTo(KecamatanModel::class, 'kecamatan_id');
    }
}
