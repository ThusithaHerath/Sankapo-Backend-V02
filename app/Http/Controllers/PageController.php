<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Property;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    public function productsIndex(){
        $data = Products::all();
        return view('admin-template.ad-manager.products',compact('data'));
    }
    public function viewProduct($id){
        $data = Products::find($id);
        return view('admin-template.ad-manager.view-product',compact('data'));
    }
    public function propertiesIndex(){
        $data = Property::all();
        return view('admin-template.ad-manager.properties',compact('data'));
    }
    public function viewProperty($id){
        $data = Property::find($id);
        return view('admin-template.ad-manager.view-property',compact('data'));
    }

    //category 
    public function addCategory(){
        return view('admin-template.category-manager.add');
    }
    public function categories(){
        $data = Category::all();
        return view('admin-template.category-manager.categories',compact('data'));
    }


    //users
    public function users(){
        $data = User::all();
        return view('admin-template.users.users',compact('data'));
    }
    

    //admin-users
    public function adminUsers(){
        $data = Admin::all();
        return view('admin-template.admin-users.users',compact('data'));
    }
    public function editAdmin($id){
        $data = Admin::find($id);
        // $password = Crypt::decryptString($data->password);
        return view('admin-template.admin-users.edit',compact('data'));
    }
    
}
