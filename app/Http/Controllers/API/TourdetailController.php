<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tourdetail;

class TourdetailController extends Controller
{
    public function index()
    {
        $tourdetails = Tourdetail::with('tourcategory')->latest()->get();
        return response()->json([
            'message' => 'success',
            'tourcategorys' =>  $tourdetails
        ]);
    }

}
