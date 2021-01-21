<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::latest()->get();
        return view('customer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('customer.addcustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());exit;
        $validateData = $request->validate([
                'customername' => 'required',
                'email' => 'required|email|unique:customers',               
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'                
             ],[
                'customername.required' => 'CustomerName is required'
            ]
        );
     

        $customer = new Customer;

        //Image upload:
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/customer');        
        $image->move($destinationPath, $imageName);
        //------------------------

        $customer->customerimg = $imageName;
        $customer->imagepath = $destinationPath;
        $customer->customername = $request->get('customername');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->save();
        //return view('customer.index');
        return redirect('allcustomer')->with('success','Customer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {        
        $data = Customer::findOrFail($id);        
        return view('customer.editcustomer', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $validateData = $request->validate(
            [
                'customername' => 'required',
                'email' => 'required|email|unique:customers,email,'.$id,
                'phone' => 'digits:10'
            ],[
                'customername.required' => "Customername is required",
                'phone' => "Mobile number must be 10 digits"
            ]);

        $data = Customer::findOrFail($id);

        //image:
        $image = $request->file('image');

        if($image){ 
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/customer');        
            $image->move($destinationPath, $imageName);
        }

        $data->customerimg = $imageName;
        $data->imagepath = $destinationPath;
        $data->customername = $request->get('customername');
        $data->email = $request->get('email');
        $data->phone = $request->get('phone');
        $data->save();
        //return redirect()->route('customer.index')->with('info','Customer Edited Successfully');
        return redirect('allcustomer')->with('success','Customer edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return redirect('allcustomer')->with('success','Customer deleted successfully');
    }
}
