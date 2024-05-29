<?php

namespace App\Http\Controllers;

use App\Models\CallbackOrder;
use Illuminate\Http\Request;

class OrderControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('callback-page');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // validation of the request to make sure the data is correct
            $request->validate([
                'firstName' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/'],
                'lastName' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/'],
                'phone' => ['required', 'string', 'max:255', 'regex:/^[0-9\s]*$/', 'min:10'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'comment' => ['required', 'string', 'max:255'],
            ]);


            $callbackOrder = new CallbackOrder();
            $name = $request->firstName . " " . $request->lastName;
            $callbackOrder->name = $name;
            $callbackOrder->phone = $request->phone;
            $callbackOrder->email = $request->email;
            $callbackOrder->comment = $request->comment;
            $callbackOrder->save();
            return redirect('/success');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CallbackOrder $callbackOrder)
    {
        return $callbackOrder;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CallbackOrder $callbackOrder)
    {
        $callbackOrder->status = $request->status;
        $callbackOrder->department = $request->department;
        $callbackOrder->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CallbackOrder $callbackOrder)
    {
        $callbackOrder->delete();
    }
}
