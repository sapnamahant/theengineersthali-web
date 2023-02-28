<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){
        $this->data['menus'] = Menu::select('menus.*','categories.title as category')->join('categories','categories.id','=','menus.category_id')->get();
        return view('menus.index',$this->data);
    }

    public function addMenu(){
        $this->data['categories'] = Category::where('status',1)->get();
        return view('menus.add',$this->data);
    }

    public function add(Request $request){
        if(!empty($request->id)){
            $menu = Menu::firstwhere('id',$request->id);
            if(!empty($request->image)){
                $imagePath = Storage::disk('public')->put('menus', $request->file('image'));
                $file_type = $_FILES['image']['type'];
            }else{
                $imagePath = $menu->image;
                $file_type = $menu->file_type;
            }
            $menu->title = $request->title;
            $menu->category_id = $request->category;
            $menu->description = $request->description;
            $menu->amount = $request->amount;
            $menu->image = $imagePath;
            $menu->weekly = $request->weekly;
            $menu->fortnight = $request->fortnight;
            $menu->file_type = $file_type;
            $menu->status = $request->status;
            $menu->save();
        }else{
            $imagePath = Storage::disk('public')->put('menus', $request->file('image'));
            $menu = new Menu();
            $menu->title = $request->title;
            $menu->category_id = $request->category;
            $menu->description = $request->description;
            $menu->amount = $request->amount;
            $menu->image = $imagePath;
            $menu->weekly = $request->weekly;
            $menu->fortnight = $request->fortnight;
            $menu->file_type = $_FILES['image']['type'];
            $menu->status = $request->status;
            $menu->save();


        }

        return back()->with('message','Menu updated successfully');
    }

    public function editMenu($id){
        $this->data['menu'] = Menu::where('id',base64_decode($id))->first();
        $this->data['categories'] = Category::where('status',1)->get();
        return view('menus.add',$this->data);
    }

    public function destroy($id){
        Menu::where('id',base64_decode($id))->delete();
        return back()->with('message','menu deleted successfully');
    }
}
