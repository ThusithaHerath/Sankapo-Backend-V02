<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        if (Category::where('category','=', $request->input('category'))->exists()) {
			return response()->json([
				'message' => 'Sorry, Category with the provided name is already exists!',
			], 403);
		}else{
            $category = new Category();
            $category->category = $request->input('category');

            $icon = $request->file('icon');
            $iconname=time().'.'.$icon->getClientOriginalExtension();
            $request->icon->move('uploads/icons',$iconname);
            $category->icon=$iconname;

            $category->save();

            return response()->json([
                'message' => 'New category has been addedd successfully!',
                'data' => $category
            ], 200);
        }
    }

    public function show()
    {
        $categories = Category::all();
        if($categories->isEmpty()){
            return response()->json([
                'message' => 'Sorry!, Category table is empty',
            ], 500);
        }else{
            $data = Category::all();
            return response()->json([
                'data'=> $data,
                'message' => 'Categories fetched successfully',
            ], 200);        
        } 
    }

    public function edit($id)
    {
        if (Category::where('id',$id)->exists()) {
            return response()->json([
                'data'=> Category::find($id),
                'message' => 'Category fetched successfully!',
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }
   
}
