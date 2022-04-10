<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all('name', 'surname', 'birthday', 'email');
        if($customers){
            return response()->json([
                'status' => true,
                'customer' => $customers
            ], 201);
        }
    }
    /**
     * Create and Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'surname' => 'required|string',
            'email' => 'required|string|email|max:100|unique:users',
            'birthday' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }

        $customer = Customer::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Customer successfully created',
            'user' => $customer
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        if($customer){
            return response()->json([
                'status' => true,
                'customer' => $customer->all('name', 'surname', 'birthday', 'email'),
            ], 201);
        }
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return response([
            'status' => true,
            'customer' => $customer->all('name', 'surname', 'birthday', 'email'),
         ], 201);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response([
            'status' => true,
            'message' => 'Deleted'
        ],201);
    }
}
