<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

/**
 * import Models
 */
use App\Products;


class ProductsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('admin.products');
    }

    public function getProduct(){
        $data = Products::all();
        return response()->json($data);
    }

    public function addProduct(Request $request){
        $rules = [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ];

        $messages = [
            'name.required' => 'Product name is required.',
            'quantity.required' => 'Product quantity is required.',
            'price.required' => 'Product price is required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            
            return response()->json(['data' => 
                [
                'error' => true,
                'messages' => $validator->getMessageBag()->all()
                ]
            ]);
        }

        $request->merge([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $data = Products::insert($request->all());
        if($data){
            return response()->json([
                'error' => false, 
                'data' => $data
            ]);
        }
    }

    public function updateProduct(Request $request, $product_id){
        $rules = [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ];

        $messages = [
            'name.required' => 'Product name is required.',
            'quantity.required' => 'Product quantity is required.',
            'price.required' => 'Product price is required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            
            return response()->json([
                'error' => true,
                'messages' => $validator->getMessageBag()->all()
            ]);
        }

        $request->merge([
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $data = Products::where('id', $product_id)
        ->update($request->all());

        return response()->json([
            'error' => false, 
            'data' => $data
        ]);
    
    }

    public function deleteProduct(Request $request, $product_id){
        $data = Products::where('id', $product_id)->delete();
        return response()->json([
            'error' => false, 
            'data' => $data
        ]);
    }

}
