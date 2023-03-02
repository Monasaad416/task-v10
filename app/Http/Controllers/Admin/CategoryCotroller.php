<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryCotroller extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:categories-list|categories-create|categories-edit|categories-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:categories-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:categories-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $categories = Category::paginate(15);
        return view('admin.pages.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $request->validate([
                'name_en' => 'required|string',
                'name_ar' => 'required|string',
            ]);
            Category::create([
               'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
            ]);


            return redirect()->route('categories.index')->with('success', 'Category created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
