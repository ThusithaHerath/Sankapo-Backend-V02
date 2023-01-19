<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Negotiation;
use App\Models\AuctionWinner;

class AuctionController extends Controller
{
    public function start(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'categoryId' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
            'starting_price' => 'required',
            'end_price' => 'required',

        ]);

        if ($validated) {
            $data = new Auction;
            $data->categoryId = $request->input('categoryId');
            $data->userId = '1';
            $data->start_date = $request->input('start_date');
            $data->start_time = $request->input('start_time');
            $data->end_date = $request->input('end_date');
            $data->end_time = $request->input('end_time');
            $data->starting_price = $request->input('starting_price');
            $data->end_price = $request->input('end_price');


            $data->save();

            return response()->json([
                'message' => 'Congratulations!, your auction is up and running',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error while posting auction!',
            ], 500);
        }
    }

    public function showAllActive()
    {
        $auctions = Auction::where('status', 'active')->get()->all();
        if ($auctions) {
            return response()->json([
                'data' => $auctions,
            ], 200);
        } else {
            return response()->json([
                'message' => "no data found",
            ], 500);
        }
    }

    public function filterAuctions($status)
    {

        if ($status == 'active') {

            $properties = Auction::where('status', 'active')->get()->all();
            if ($properties) {
                return response()->json([
                    'data' => $properties,
                ], 200);
            } else {
                return response()->json([
                    'message' => "Can't find active auctions",
                ], 500);
            }
        } elseif ($status == 'completed') {

            $properties = Auction::where('status', 'completed')->get()->all();
            if ($properties) {
                return response()->json([
                    'data' => $properties,
                ], 200);
            } else {
                return response()->json([
                    'message' => "Can't find completed auctions",
                ], 500);
            }
        } elseif ($status == 'cancelled') {

            $properties = Auction::where('status', 'cancelled')->get()->all();
            if ($properties) {
                return response()->json([
                    'data' => $properties,
                ], 200);
            } else {
                return response()->json([
                    'message' => "Can't find cancelled auctions",
                ], 500);
            }
        }
    }

    public function search($id)
    {
        if (Auction::where('id', $id)->exists()) {
            return response()->json([
                'data' => Auction::find($id),
                'message' => 'Auction fetched successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        if (Auction::where('id', $id)->exists()) {
            $data  = Auction::find($id);

            $data->categoryId = $request->input('categoryId');
            $data->start_date = $request->input('start_date');
            $data->start_time = $request->input('start_time');
            $data->end_date = $request->input('end_date');
            $data->end_time = $request->input('end_time');
            $data->starting_price = $request->input('starting_price');
            $data->end_price = $request->input('end_price');
            $data->status = $request->input('status');

            $data->update();

            return response()->json([
                'data' => $data,
                'message' => 'auction updated successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no record for this auction',
            ], 500);
        }
    }

    
    public function addWinner($id)
    {
        // dd(now());
        if (Auction::where('id', $id)->exists()) {
            $data  = Auction::find($id);


            if ($data->end_date == Carbon::now()->format('Y-m-d') && $data->end_time >= Carbon::now()->format('H-i-s')) {

                $maxPrice = Negotiation::where('auction_id', $id)
                    ->max('negotiation_price');

                $negotiateUser = Negotiation::where('auction_id', $id)
                    ->where('negotiation_price', $maxPrice)
                    ->pluck('bid_user')->first();


                $auctionWinner = new AuctionWinner;
                $auctionWinner->auction_id = $id;
                $auctionWinner->user_id = $negotiateUser;
                $auctionWinner->save();

                return response()->json([
                    'data' => $auctionWinner,
                    'message' => 'auction winner added successfully!',
                ], 200);
            } elseif ($data->end_date >= Carbon::now()->format('Y-m-d')) {
                return response()->json([
                    'message' => 'You cannot add a winner until the auction deadline has been reached',
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'There is no record for this auction',
            ], 500);
        }
    }

    public function destroy($id)
    {
        if (Auction::where('id', $id)->exists()) {
            $category = Auction::find($id);
            $category->delete();
            return response()->json([
                'message' => 'Auction removed successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'There is no record for this id',
            ], 500);
        }
    }
}
