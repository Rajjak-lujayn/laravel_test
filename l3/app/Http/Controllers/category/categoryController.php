<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class categoryController extends Controller
{
    
    // public function categories(Request $request)
    // {
    //     $category = category::all();
    //     return view('categories.categories', compact('category'));
        
    // }

    public function categories(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        // echo $search;exit;
        if($search ){
            $category = Category::query()
            ->where('cat_name', 'LIKE', "%{$search}%")
            ->orWhere('cat_desc', 'LIKE', "%{$search}%")
            ->get();
        }else{
            $category = Category::all();
        }
        // Search in the title and body columns from the posts table
        
    
        // Return the search view with the resluts compacted
        return view('categories.categories', compact('category'));
    }

    
    public function addCategory()
    {
        return view('categories.addCategory');
    }

    
    public function postCategory(Request $request)
    {
        $request->validate([
            'cat_name' => 'required',
            'cat_desc' => 'required',
            'cat_image' => 'required'
        ]);

        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        if ($file = $request->file('cat_image')) {
            //$destinationPath = 'public/image';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('public/image'), $profileImage);
            $category['cat_image'] = "$profileImage";
        }

        $category->save();
        return redirect()->route('categories');
    }

    
    public function editCategory($id)
    {
        $category = Category::where('id', $id)->first();
        return view('categories.edit', compact('category'));
    }

    
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required',
            'cat_desc' => 'required',
            'cat_image' => 'required'
        ]);

        $category = Category::where('id', $id)->first();
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        if ($file = $request->file('cat_image')) {
            //$destinationPath = 'public/image';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('public/image'), $profileImage);
            $category['cat_image'] = "$profileImage";
        }

        $category->save();
        return redirect()->route('categories');
    }

    
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories');
    }

    
}
