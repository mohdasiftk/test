<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }
    public function home()
    {
        return view('home');
    }
    public function customers()
    {
        $customers = DB::table('customers')->get();
        return view('customers',compact('customers'));
    }
    public function customerCreate()
    {
        return view('create_customer');
    }
    public function customerEdit($id)
    {
        $id = decrypt($id);
        $customer = Customer::find($id);
        return view('edit_customer',compact('customer'));
    }
}
