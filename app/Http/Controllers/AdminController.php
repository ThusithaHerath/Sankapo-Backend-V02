<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('AdminAuth')->only(['signin']);
    }
    public function signup(Request $request)
    {

        if (Admin::where('email', '=', $request->input('email'))->exists()) {
            return response()->json([
                'message' => 'Sorry, Admin with the provided email is already exists!',
            ], 403);
        } else {
            $validated = $request->validate([
                'password' => 'required|min:8|max:12',
                'name' => 'required',
                'email' => 'required'
            ]);

            if ($validated) {
                $admin = new Admin();
                $admin->email = $request->input('email');
                $admin->password = Hash::make($request->input('password'));
                $admin->name = $request->input('name');
                $admin->save();

                // return redirect()->back();
                return response()->json([
                    'message' => 'New admin has been added!',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Error while adding admin!',
                ], 500);
            }
        }
    }

    public function signin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        $admin_id = $admin->id;

        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $random_token = Str::random(64);
                $data  = Admin::find($admin_id);
                $data->token = '1';
                $data->update();
                //create temp table
                Schema::create('temp_adminLogin', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('admin_id');
                    $table->string('token');
                    $table->temporary();
                });

                DB::table('temp_adminLogin')->insert(['admin_id' => $admin_id, 'token' => '1']);
                //
                return redirect()->away("http://127.0.0.1:8000/home");
            } else {
                return response()->json([
                    'message' => 'Incorrect Password!',
                ], 403);
            }
        } else {
            return response()->json([
                'user' => $admin,
                'message' => 'Admin not found!',
            ], 401);
        }
    }

    public function showAll()
    {

        $admins = Admin::all();
        if ($admins->isEmpty()) {
            return response()->json([
                'message' => 'Sorry!, Admin table is empty',
            ], 500);
        } else {
            $data = Admin::all();
            return response()->json([
                'data' => $data,
                'message' => 'All the admins are fetched successfully',
            ], 200);
        }
    }

    public function admin($id)
    {

        $admin = Admin::where('id', $id)->exists();

        if ($admin) {
            return response()->json([
                'data' =>  Admin::find($id),
                'message' => 'Selected admin details fetched successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'No record found for this id',
            ], 401);
        }
    }

    public function update(Request $request, $id)
    {

        if (Admin::where('id', $id)->exists()) {

            $admin  = Admin::find($id);
            $admin->email = $request->input('email');
            $admin->password = Hash::make($request->input('password'));
            $admin->name = $request->input('name');
            $admin->save();

            return redirect()->back();

            // return response()->json([
            //     'data'=>  Admin::find($id),
            //     'message' => 'Selected admin details updated successfully',
            // ], 200);  
        } else {
            return response()->json([
                'message' => 'No record found for this id',
            ], 401);
        }
    }

    public function remove($id)
    {

        if (Admin::where('id', $id)->exists()) {
            $admin = Admin::find($id);
            $admin->delete();
            return response()->json([
                'message' => 'Admin removed successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 401);
        }
    }
}