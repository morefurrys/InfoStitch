<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Symfony\Contracts\Service\Attribute\Required;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(Request $request){
        //dd($request);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string'

        ]);

        Customer::create($data);

        return redirect(route('customer.index'))
        ->with('success','Customer added successfully.');
    }

    public function edit(Customer $customer){
        //dd($customer);

        return view('customers.edit',['customer' => $customer] );
    }

    public function update(Customer $customer, Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string'

        ]);
        $customer->update($data);
        return redirect(route('customer.index',))
        ->with('success','Updated successfully');
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect(route('customer.index',))
        ->with('success','Deleted successfully');

    }
}
