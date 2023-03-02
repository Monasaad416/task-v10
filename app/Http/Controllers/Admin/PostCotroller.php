<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCotroller extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('admin.pages.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts.create');
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
                'title_en' => 'required|string',
                'title_ar' => 'required|string',
                'body_en' => 'required|string',
                'body_ar' => 'required|string',

            ]);

            Post::create([
            'title' => [
               'en' => $request->name_en,
               'ar' => $request->name_ar
            ],
             'body' => [
               'en' => $request->body_en,
               'ar' => $request->body_ar
            ],

            'sub_category_id' => $request->sub_category_id,
            'status' => 'active'
         ]);


            return redirect()->route('posts.index')->with('success', 'Category created successfully');
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



    public function getSubCatsByCat($category_id)
    {
        $listOfSubcats = SubCategory::where('category_id',$category_id)->pluck('name','id');
        return response()->json( $listOfSubcats);

    }
}
