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
        return view('terugbelPagina');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'comment' => 'required',
            ]);
            $callbackOrder = new CallbackOrder();
            $name = $request->firstName . " " . $request->firstName;
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
