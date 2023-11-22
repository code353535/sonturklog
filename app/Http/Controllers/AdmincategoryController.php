<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Anacategory;

class AdmincategoryController extends Controller
{
    public function categorylist(){

        $category = Category::all();

        return view('admin.category.categorylist',['category' => $category]);
}

public function categoryadd(){
    $anacategory = Anacategory::all();
    return view('admin.category.categoryadd', ['anacategory' => $anacategory]);
}

public function create(Request $request){

    $request->validate([
         'ad' => ['required'],

     ]);
     Category::create([
         'ad' => $request->ad,
         'slug' => Str::slug( $request->ad),
         'aciklama' => $request->aciklama,
         'anacategory_id' => $request->anacategory_id
     ]);

     return redirect(route('admin.categorylist'));
 }

 public function edit(category $category){
    $anacategory = Anacategory::all();
    return view('admin.category.edit', ['category' => $category, 'anacategory' => $anacategory]);
}

public function update(category $category, Request $request)
{


    $request->validate([
        'ad' =>  ['required', Rule::unique('category')->ignore($category->id)],
        'aciklama' => 'required',
    ]);

    $slug = Str::slug( $request ->ad);

    $kaydet = ([
        'ad' => $request->ad,
        'slug' => Str::slug( $request->ad),
        'aciklama' => $request->aciklama,
        'anacategory_id' => $request->anacategory_id
    ]);

    $category->update($kaydet);



    return redirect(route('admin.categorylist'));

}
public function destroy(category $category, Request $request)
{
    $category->delete();
    return redirect(route('admin.categorylist'));

}
}
