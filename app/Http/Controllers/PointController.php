<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Peta'
        ];

        return view('map', $data);
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
                'name' => 'required|unique:points,name',
                'description' => 'required',
                'geom_point' => 'required',
                'image' => 'nullable | mimes: jpeg,png,jpg,gif,svg|max:2000'
            ],
            [
                'name.required' => 'Markes needs to have a name',
                'name.unique' => 'Marker name already exists',
                'description.required' => 'Description is required',
                'geom_point.required' => 'Geometry is required'
            ],
        );

        //Crate Images directory (if not exist)
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        // Get image File
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'geom' => $request->geom_point,
            'name' => $request->name,
            'description' => $request->description,
            'images' => $name_image,
            'user_id' => auth()->user()->id
        ];

        // dd($request->all());

        //Create data
        if ($this->points->create($data)) {
            return redirect()->route('map')->with('error', 'Error');
        }

        //Balikin tampilan ke peta
        return redirect()->route('map')->with('success', 'Marker has been updated.');
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
        //echo $id;

        $data = [
            'title' => 'Edit Point',
            'id' => $id,
        ];

        return view('editpoint', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($id, $request->all());

        $request->validate(
            [
                'name' => 'required|unique:points,name,' . $id,
                'description' => 'required',
                'geom_point' => 'required',
                'image' => 'nullable | mimes: jpeg,png,jpg,gif,svg|max:2000'
            ],
            [
                'name.required' => 'Markes needs to have a name',
                'name.unique' => 'Marker name already exists',
                'description.required' => 'Description is required',
                'geom_point.required' => 'Geometry is required'
            ],
        );

        //Crate Images directory (if not exist)
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        //Get old image file
        $old_image = $this->points->find($id)->image;

        // Get image File
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);

            // delete old image file
            if ($old_image != null && file_exists('./storage/images/' . $old_image)) {
                unlink('./storage/images/' . $old_image);
            }
        } else {
            $name_image = $old_image;
        }

        $data = [
            'geom' => $request->geom_point,
            'name' => $request->name,
            'description' => $request->description,
            'images' => $name_image
        ];

        // dd($request->all());

        //Update data
        if ($this->points->find($id)->update($data)) {
            return redirect()->route('map')->with('error', 'Error');
        }

        //Balikin tampilan ke peta
        return redirect()->route('map')->with('success', 'Marker has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $imagefile = $this->points->find($id)->image;

        if (!$this->points->destroy($id)) {
            return redirect()->route('map')->with('error', 'Point failed to delete!');
        }

        // Delete image file
        if ($imagefile != null) {
            if (file_exists('./storage/images/' . $imagefile)) {
                unlink('./storage/images/' . $imagefile);
            }
        }
        return redirect()->route('map')->with('success', 'Point has been deleted!');
    }
}
