<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class SqlController extends Controller
{
    public function addCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:customers|email',
            'phone'=> 'required'
        ],['email.unique' => 'This email id is already registerd']);
        $customer = Customer::create([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
        ]);
        if($customer){
            return redirect()->route('customers')->with('success','Customer added successfully..!');
        }else{
            return back()->with('message','Somthing Went Wrong..!');
        }

    }
    public function deleteCustomer($id)
    {
        $id = decrypt($id);
        $customer = Customer::find($id)->delete();
        if($customer){
            return back()->with('success','Customer Deleted Successfully..!');  
        }else{
            return back()->with('error','Something went wrong..!');
        }
    }
    public function updateCustomer(Request $request)
    {
        $id = decrypt($request->id);
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:customers,email,'.$id,
            'phone'=> 'required'
        ],['email.unique' => 'This email id is already registerd']);
        $customer = Customer::find($id);
        $customer->update([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
        ]);
        if($customer){
            return redirect()->route('customers')->with('success','Customer updated successfully..!');
        }else{
            return back()->with('message','Somthing Went Wrong..!');
        }

    }
}
