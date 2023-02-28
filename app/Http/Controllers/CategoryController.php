<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $this->data['categories'] = Category::all();
        return view('category.index',$this->data);
    }

    public function addCategory(){
        return view('category.add');
    }

    public function add(Request $request){
        if(!empty($request->id)){
            Category::where('id',$request->id)->update(['title'=>$request->title, 'description'=>$request->description, 'status'=>$request->status]);
        }else{
            $category = new Category;
            $category->title = $request->title;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();
        }
        
        return back()->with('message','Category updated successfully');
    }

    public function editCategory($id){
        $this->data['category'] = Category::where('id',base64_decode($id))->first();
        return view('category.add',$this->data);
    }

    public function destroy($id){
        Category::where('id',base64_decode($id))->delete();
        return back()->with('message','category deleted successfully');
    }
}
