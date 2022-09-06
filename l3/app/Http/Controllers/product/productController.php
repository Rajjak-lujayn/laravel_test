<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Export;
use App\Exports\ProdcutExport;
use Maatwebsite\Excel\Facades\Excel;


class productController extends Controller
{
    
    public function products()
    {   
        // $product = Product::all();
        $product = Product::select('*')
            ->join('categories', 'categories.id', 'products.prod_cat')->get();
            // dd( $product);
        return view('product.products', compact('product'));
    }

   
    public function addProduct()
    {   
        $category = Category::all();
        return view('product.addProduct', compact('category'));
    }

    
    public function postProduct(Request $request)
    {
        $request->validate([
            'prod_cat' => 'required',
            'prod_title' => 'required',
            'prod_desc' => 'required',
            'prod_image' => 'required'
        ]);

        $product = new Product;
        $product->prod_cat = $request->prod_cat;
        $product->prod_title = $request->prod_title;
        $product->prod_desc = $request->prod_desc;
        if ($file = $request->file('prod_image')) {
            //$destinationPath = 'public/image';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('public/image'), $profileImage);
            $product['prod_image'] = "$profileImage";
        }

        $product->save();
        return redirect()->route('products');
    }

    
    
    public function editProduct($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product.editProduct', compact('product'));
    }

    
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'prod_cat' => 'required',
            'prod_title' => 'required',
            'prod_desc' => 'required',
            'prod_image' => 'required'
        ]);

        $product = Product::where('id', $id)->first();
        $product->prod_cat = $request->prod_cat;
        $product->prod_title = $request->prod_title;
        $product->prod_desc = $request->prod_desc;
        if ($file = $request->file('prod_image')) {
            //$destinationPath = 'public/image';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('public/image'), $profileImage);
            $product['prod_image'] = "$profileImage";
        }

        $product->save();
        return redirect()->route('products');
    }

    
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products');
    }


    public function export() 
    {
        return Excel::download(new ProdcutExport, 'disney.xlsx');
    }
}
