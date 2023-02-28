<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $this->data['products'] = Product::join('categories','categories.id','=','products.category')->select('products.id','products.title','products.description','products.amount','products.status','products.brand','products.color','products.created_at','products.size','products.image','categories.title as category',)->get();
        $this->data['product_images'] = ProductImages::all();
        return view('product.index',$this->data);
    }

    public function addProduct(){
        $this->data['categories'] = Category::where('status',1)->get();
        return view('product.add',$this->data);
    }

    public function add(Request $request){

        if(!empty($request->id)){
            $product = Product::firstwhere('id',$request->id);
            if(!empty($request->image)){
                $imagePath = Storage::disk('public')->put('products', $request->file('image'));
                $file_type = $_FILES['image']['type'];
            }else{
                $imagePath = $product->image;
                $file_type = $product->file_type;
            }
            $product->title = $request->title;
            $product->category = $request->category;
            $product->description = $request->description;
            $product->amount = $request->amount;
            $product->brand = $request->brand;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->image = $imagePath;
            $product->file_type = $file_type;
            $product->save();
        }else{
            $imagePath = Storage::disk('public')->put('products', $request->file('image'));
            $product = new Product();
            $product->title = $request->title;
            $product->category = $request->category;
            $product->description = $request->description;
            $product->amount = $request->amount;
            $product->brand = $request->brand;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->image = $imagePath;
            $product->file_type = $_FILES['image']['type'];
            $product->save();
            
            if(!empty($request->image2)){
                for ($i=0; $i <count($request->image2) ; $i++) { 
                    $imagePath = Storage::disk('public')->put('products', $request->file('image2')[$i]);
                    $file_type = $_FILES['image2']['type'][$i];
                    $productImage = new ProductImages();
                    $productImage->productId = $product->id;
                    $productImage->image = $imagePath;
                    $productImage->file_type = $file_type;
                    $productImage->save();
                }
            }
        }
        
        return back()->with('message','product updated successfully');
    }

    public function editProduct($id){
        $this->data['product'] = Product::where('id',base64_decode($id))->first();
        $this->data['categories'] = Category::where('status',1)->get();
        return view('product.add',$this->data);
    }

    public function destroy($id){
        Product::where('id',base64_decode($id))->delete();
        return back()->with('message','product deleted successfully');
    }
}
