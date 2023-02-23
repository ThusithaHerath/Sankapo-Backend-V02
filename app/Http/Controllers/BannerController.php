<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function store(Request $request)
    {
       
        if (Banner::where('title','=', $request->input('title'))->exists()) {
			return response()->json([
				'message' => 'Sorry, Banner with the provided title is already exists!',
			], 403);
		}else{
            $banner = new Banner();
            $banner->title = $request->input('title');

            $image = $request->file('bannerImage');
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->bannerImage->move('uploads/banners',$imagename);
            $banner->bannerImage=$imagename;

            $banner->save();

            return redirect()->back()->with('status','New banner has been added successfully!');

        }
    }





}
