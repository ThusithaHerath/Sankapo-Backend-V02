<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use File;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'description' => 'required',
            'buy' => 'required',
            'owner' => 'required',
            'mobile' => 'required',
            'landline' => 'required',
            'email' => 'required'
        ]);
        if ($validated) {
            $data = new Products;
            $data->title = $request->input('title');
            $data->category = $request->input('category');
            $data->description = $request->input('description');
            $data->condition = $request->input('condition');
            $data->buy = $request->input('buy');
            $data->mobile = $request->input('mobile');
            $data->landline = $request->input('landline');
            $data->email = $request->input('email');
            $data->province = $request->input('province');
            $data->city = $request->input('city');
            $data->town = $request->input('town');
            $data->sellerName = $request->input('sellerName');
            $data->owner = $request->input('owner');

            $images = $request->file('images');
            $imageArray = [];
            foreach ($images as $imagefile) {
                $randomString = Str::random(5);
                $insertId = $randomString . '' . $request->input('title');
                $imagename = $insertId . '.' . $imagefile->getClientOriginalExtension();
                // $img = Image::make($imagefile->getRealPath());
                // $imageWidth = $img->width();
                // $watermarkSource =  Image::make(public_path('common/watermark.png'));

                // $watermarkSize = round(20 * $imageWidth / 50);
                // $watermarkSource->resize($watermarkSize, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // });

                // $img->insert($watermarkSource, 'center', 0, 0);

                
                // $img->resize(500, 500, function ($const) {
                //     $const->aspectRatio();
                // })->save(public_path('/uploads/products') . '/' . $imagename);

                $imagefile->move('uploads/products', $imagename);
                array_push($imageArray, $imagename);
            }

            $data->images = json_encode($imageArray);
            $data->save();

            return response()->json([
                'message' => 'Congratulations!, your add is up and running',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error while posting add!',
            ], 500);
        }
    }

    public function showAll()
    {
        //status = 0 newly added ads

        //status = 1 approved ads
        //status = 2 declined ads
        $Products = Products::get()->all();
        if ($ads) {
            return response()->json([
                'data' => $Products,
            ], 200);
        } else {
            return response()->json([
                'message' => "Can't find ads",
            ], 500);
        }
    }

    public function approved()
    {
        //status = 0 newly added ads
        //status = 1 approved ads
        //status = 2 declined ads
        $Products = Products::where('isApprove', '1')->get()->all();
        if ($Products) {
            return response()->json([
                'data' => $Products,
            ], 200);
        } else {
            return response()->json([
                'message' => "Can't find approved adds",
            ], 500);
        }
    }

    public function declined()
    {
        //status = 0 newly added ads
        //status = 1 approved ads
        //status = 2 declined ads
        $Products = Products::where('isApprove', '2')->get()->all();
        if ($Products) {
            return response()->json([
                'data' => $Products,
            ], 200);
        } else {
            return response()->json([
                'message' => "Can't find declined adds",
            ], 500);
        }
    }

    public function approveAd(Request $request, $id)
    {
        if (Products::where('id', $id)->exists()) {
            $Product  = Products::find($id);
            $Product->isApprove = '1';
            $Product->update();

            return response()->json([
                'data' => $Product,
                'message' => 'Ad has been approved successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    public function declineAd(Request $request, $id)
    {
        if (Products::where('id', $id)->exists()) {
            $Product  = Products::find($id);

            $Product->isApprove = '2';

            $Product->update();

            return response()->json([
                'data' => $Product,
                'message' => 'Ad has been declined successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    public function search($id)
    {
        if (Products::where('id', $id)->exists()) {
            return response()->json([
                'data' => Products::find($id),
                'message' => 'Ad fetched successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    public function latestAds()
    {
        $latestAds = DB::table('products')->orderBy('created_at', 'desc')->first();
        return response()->json([
            'data' => $latestAds,
            'message' => 'Latest ads fetched successfully!',
        ], 200);
    }

    public function searchbycat(Request $request, $id)
    {
        // dd($request);
        $results = DB::table('products')->where('category', $id)->get();
        return response()->json([
            'data' => $results,
            'message' => 'Search by category ads fetched successfully!',
        ], 200);
    }

}
