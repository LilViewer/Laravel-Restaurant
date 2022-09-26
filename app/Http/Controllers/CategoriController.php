<?php

namespace App\Http\Controllers;

use App\Models\Categoty;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categoty::orderBy('id','desc')->get();
        return view('admin/categories/index',[
            'categories'=>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_category = new Categoty();
        $new_category->name=$request->name;
        $new_category->image=$_FILES['images']['name'];

        $new_directory = $request->directory;

        $request->file('images')->storeAs($new_directory,$_FILES['images']['name'],'test_public');

        $new_category->catalog=$new_directory;

        $new_category->save();
        return redirect()->back()->withSuccess('Категория добавлена');
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
    public function edit(Categoty $category)
    {
//        dd($categoty);
        return view('admin.categories.edit',[
            'category'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoty $category)
    {
        $category->name = $request->name;
        $new_directory = $request->directory;

//        dd($new_directory,$category->catalog);

        if ($category->catalog!=$new_directory){
            Storage::disk('test_public')->makeDirectory($new_directory);
            Storage::disk('test_public')->copy($category->catalog.'/'.$category->image,$new_directory.'/'.$category->image);

            Storage::disk('test_public')->deleteDirectory($category->catalog);
        }
        $category->image=$_FILES['images']['name'];
        $category->catalog = $new_directory;
//        dd($_FILES['images']['name']);
        if ($_FILES['images']['name']!=''){
            $request->file('images')->storeAs($new_directory,$_FILES['images']['name'],'test_public');
        }
        else{
            $category->image=$request->imagesHidden;
        }

        $category->save();

        return redirect()->back()->withSuccess('Категория изменина');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoty $category)
    {
        $category->delete();
        Storage::disk('test_public')->deleteDirectory($category->catalog);
        return redirect()->back()->withSuccess('Категория удалена');
    }
}
