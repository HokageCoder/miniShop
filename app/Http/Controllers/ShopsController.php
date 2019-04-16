<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

/**
 * import Models
 */
use App\Reservations;


class ShopsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('customer.shop');
    }

    public function addReservation(Request $request){
        $request->merge([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'customer_id' => Auth::user()->id
        ]);

        $data = Reservations::insert($request->all());
       
        return response()->json([
            'error' => false, 
            'data' => $data
        ]);
    }

}
