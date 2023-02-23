<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Property;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Banner;
use Hash;

class ActionController extends Controller
{
    public function approveProduct($id){
        if (Products::where('id', $id)->exists()) {
            $Product  = Products::find($id);
            $Product->isApprove = '1';
            $Product->update();

            return redirect()->back()->with('approved','Product has been approved successfully!');
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

            return redirect()->back()->with('declined','Product has been declined successfully!');
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

            return redirect()->back()->with('approved','Property has been approved successfully!');
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

            return redirect()->back()->with('declined','Property has been declined successfully!');
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

        return redirect()->back()->with('removed','Category removed successfully!');
    }


    //admin-user 
    public function removeAdmin($id){
        if (Admin::where('id', $id)->exists()) {
            $admin = Admin::find($id);
            $admin->delete();
           
            return redirect()->back()->with('removed','Admin removed successfully!');
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 401);
        }
    }

    public function approved()
    {
        //status = 0 newly added ads
        //status = 1 approved ads
        //status = 2 declined ads
        $Banner = Banner::where('status', '1')->get()->all();
        if ($Banner) {
            return response()->json([
                'data' => $Banner,
            ], 200);
        } else {
            return response()->json([
                'message' => "Can't find approved adds",
            ], 500);
        }
    }

    public function approveBanner(Request $request, $id)
    {
        if (Banner::where('id', $id)->exists()) {
            $Banner  = Banner::find($id);
            $Banner->status = '1';
            $Banner->update();

            return redirect()->back();
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

}
