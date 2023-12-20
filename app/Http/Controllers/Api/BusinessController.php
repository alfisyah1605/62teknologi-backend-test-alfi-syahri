<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BusinessRequest;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Get business function
     *
     * @return Illumunate\Http\Response
     */
    public function index(Request $request) {
        $businesses = Business::orderBy('id', 'desc');

        if (!empty($request->term)) {
            $businesses = $businesses->where('name', 'like', '%'.$request->term.'%');
        }

        if (!empty($request->location)) {
            $businesses = $businesses->where(function($query) use ($request) {
                $query->where('location_address1', 'like', '%'.$request->location.'%')
                    ->orWhere('location_address2', 'like', '%'.$request->location.'%')
                    ->orWhere('location_address3', 'like', '%'.$request->location.'%')
                    ->orWhere('location_city', 'like', '%'.$request->location.'%')
                    ->orWhere('location_country', 'like', '%'.$request->location.'%');
            });
        }

        if (!empty($request->price)) {
            // Assuming price value will be $$$ and not in money range
            $businesses = $businesses->where('price', 'like', $request->price);
        }

        $limit = $request->limit ?? 20; // Set default 20 data per page
        $offset = $request->offset ?? 0; // set default first offset to 0
        
        $totalData = (clone $businesses)->count();

        $businesses = $businesses->skip($offset)
                        ->take($limit)
                        ->get();

        return response()->json([
            'error' => false,
            'businesses' => $businesses,
            'total' => $totalData,
        ]);
    }

    /**
     * Store data
     *
     * @return Illuminate\Http\Response
     */
    public function store(BusinessRequest $request) {
        $business = Business::create($request->validated());

        return response()->json([
            'error' => false,
            'message' => 'Business created successfully',
            'business' => $business
        ]);
    }

    /**
     * Update data
     *
     * @param Int $id | Id of the business
     * @return Illuminate\Http\Response
     */
    public function update(BusinessRequest $request, Int $id) {
        $business = Business::where('id', $id)->first();

        if (empty($business)) {
            return response()->json([
                'error' => true,
                'error_message' => "Sorry, cannot find the business"
            ], 404);
        }

        $business->update($request->validated());

        return response()->json([
            'error' => false,
            'message' => 'Business updated successfully'
        ]);
    }

    /**
     * Delete business
     *
     * @param Int $id | Id of the business
     * @return Illuminate\Http\Response
     */
    public function destroy(Int $id) {
        $business = Business::where('id', $id)->first();

        if (empty($business)) {
            return response()->json([
                'error' => true,
                'error_message' => "Sorry, cannot find the business"
            ], 404);
        }

        $business->delete();

        return response()->json([
            'error' => false,
            'message' => 'Business deleted successfully'
        ]);
    }
}
