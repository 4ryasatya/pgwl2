<?php

namespace App\Http\Controllers;

use App\Models\PolygonModel;
use Illuminate\Http\Request;
use App\Models\KecamatanModel;

class PolygonController extends Controller
{
    public function __construct()
    {
        $this->polygon = new PolygonModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'kecamatan' => KecamatanModel::all(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|',
                'kecamatan_id' => 'required',
                'image' => 'nullable | mimes: jpeg,png,jpg,gif,svg|max:2000'
            ],
            [
                'name.required' => 'Polygon needs to have a name',
                'description.required' => 'Description is required',
                'geom_polygon.required' => 'Geometry is required'
            ],
        );

        // Get image File
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_polygon." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'geom' => $request->geom_polygon,
            'name' => $request->name,
            'kecamatan_id' => $request->kecamatan_id,
            'description' => $request->description,
            'images' => $name_image
        ];

        $this->polygon->create($data);
        return redirect()->route('map')->with('success', 'Data berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Area',
            'id' => $id,
            'polygon' => $this->polygon->find($id),
            'kecamatan' => KecamatanModel::all(),
        ];

        return view('editpolygon', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'kecamatan_id' => 'required',
                'geom_polygon' => 'required',
                'image' => 'nullable | mimes: jpeg,png,jpg,gif,svg|max:2000'
            ],
            [
                'name.required' => 'Markes needs to have a name',
                'description.required' => 'Description is required',
                'geom_polygon.required' => 'Geometry is required'
            ],
        );

        //Crate Images directory (if not exist)
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        //Get old image file
        $old_image = $this->polygon->find($id)->image;

        // Get image File
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_polygon." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);

            //Delete old image file
            if ($old_image !=null) {
                if (file_exists('./storage/images/' . $old_image)) {
                    unlink('./storage/images/' . $old_image);
                }
            }

        } else {
            $name_image = $old_image;
        }

        $data = [
            'geom' => $request->geom_polygon,
            'name' => $request->name,
            'kecamatan_id' => $request->kecamatan_id,
            'description' => $request->description,
            'images' => $name_image
        ];

        // dd($request->all());

        //Update data
        if ($this->polygon->find($id)->update($data)) {
            return redirect()->route('map')->with('success', 'Data berhasil diedit.');
        }

        //Balikin tampilan ke peta
        return redirect()->route('map')->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $imagefile = $this->polygon->find($id)->image;

        if (!$this->polygon->destroy($id)) {
            return redirect()->route('map')->with('error', 'Polygon failed to delete!');
        }

        // Delete image file
        if ($imagefile != null) {
            if (file_exists('./storage/images/' . $imagefile)) {
                unlink('./storage/images/' . $imagefile);
            }
        }

        return redirect()->route('map')->with('success', 'Polygon has been deleted!');
    }
}
