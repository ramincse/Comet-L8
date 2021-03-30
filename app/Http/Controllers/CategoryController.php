<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Category::latest()->get();
        return view('admin.post.category.index', compact('all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('category.index')->with('success', 'Category added successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_data = Category::find($id);

        return [
            'id'    => $edit_data->id,
            'name'  => $edit_data->name,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $edit_id = $request ->edit_id;

        $update_data = Category::find($edit_id);
        $update_data -> name = $request -> name;
        $update_data -> slug = Str::slug($request->name);
        $update_data -> update();

        return redirect()->route('category.index')->with('success', 'Category updated successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Category::find($id);
        $delete_data -> delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfull');
    }

    public function statusUpdateInactive($id)
    {
        $status_update = Category::find($id);

        $status_update -> status = false;
        $status_update -> update();
    }

    public function statusUpdateActive($id)
    {
        $status_update = Category::find($id);

        $status_update->status = true;
        $status_update->update();
    }
}
