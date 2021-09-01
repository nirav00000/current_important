<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\crud;
use Illuminate\Http\Request;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = crud::all();
        View::share('data',$data);
        View::share('i','1');
        return View('crud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return route('crud.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title1' => "required",
            'title2' => "required"
        ]);

        crud::create($data);

        return View('crud.index')->with('message','data entered successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        View::share('data',$crud);

        return View('crud.show');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(crud $crud)
    {


        return view('crud.edit',compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud $crud)
    {
        request()->validate([
            'title1' => "required",
            'title2' => "required"
        ]);

        $crud->update($request->all());

        return redirect()->route('crud.index')->with('success','data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud)
    {
        $crud->delete();
        return redirect()->route('crud.index')
        ->with('success','row deleted successfully');
    }
}
