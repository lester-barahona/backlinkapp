<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Domain;
use App\Models\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        return view('domain.create',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required | email',
            'title'=>'required|max:60',
            'url'=>'required|max:255',
            'shortDescription'=>'required|max:150',
        ]);

        $domain=new Domain();
        $domain->title=$request->title;
        $domain->email=$request->email;
        $domain->url=$request->url;
        $domain->shortDescription=$request->shortDescription;
        $domain->description=$request->description;
        $domain->category_id=$request->category_id;
        $domain->subcategory_id=$request->subcategory_id;
        if($request->img){
            $img=$request->img;
            $extension=$img->getClientOriginalExtension();
            $name=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($img));
            $domain->img=$name;
        }else{
            $domain->img='default.jpg';
        }

        $domain->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
