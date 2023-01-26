<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Property;
use App\Models\Category;
use App\Models\Admin;
use Hash;

class ActionController extends Controller
{
    public function approveProduct($id){
        if (Products::where('id', $id)->exists()) {
            $Product  = Products::find($id);
            $Product->isApprove = '1';
            $Product->update();

            return redirect()->back();
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    public function declineProduct(Request $request, $id)
    {
        if (Products::where('id', $id)->exists()) {
            $Product  = Products::find($id);

            $Product->isApprove = '2';

            $Product->update();

            return redirect()->back();
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    //property

    public function approveProperty($id){
        if (Property::where('id', $id)->exists()) {
            $Property  = Property::find($id);
            $Property->isApprove = '1';
            $Property->update();

            return redirect()->back();
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    public function declineProperty(Request $request, $id)
    {
        if (Property::where('id', $id)->exists()) {
            $Property  = Property::find($id);

            $Property->isApprove = '2';

            $Property->update();

            return redirect()->back();
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    //category

    public function removeCategory($id){
        $data = Category::find($id);
        $icon_path = public_path('uploads/icons/').'/'.$data->icon;
        unlink($icon_path);
        $data->delete();

        return redirect()->back();
    }


    //admin-user 
    public function removeAdmin($id){
        if (Admin::where('id', $id)->exists()) {
            $admin = Admin::find($id);
            $admin->delete();
           
            return redirect()->back();
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 401);
        }
    }


}
