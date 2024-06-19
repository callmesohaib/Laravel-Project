<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create()
    {
        $title = "Registration Form";
        $url = url('/customer');
        $data = compact('title', 'url');
        return view('customer')->with($data);
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required '
        ]);
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->password_confirmation = md5($request['password_confirmation']);
        $customer->save();
        return redirect('/customer/view');
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        // echo $search;
        // die;
        if ($search != "") {
            $customer = Customer::where('name', 'LIKE', "%$search%")->get();

        } else {

            $customer = Customer::get();
            // $customer = Customer::paginate(15);

        }
        $data = compact('customer','search');
        return view('customer-view')->with($data);
    }
    public function trash()
    {
        $customer = Customer::onlyTrashed()->get();
        $data = compact('customer');
        return view('customer-trash')->with($data);
    }
    public function delete($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }

        return redirect('customer/view');
    }
    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->restore();
        }

        return redirect('customer/view');
    }
    public function forceDelete($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }

        return redirect('customer/view');
    }
    public function edit($id)
    {
        $title = "Update Customer";
        $customer = Customer::find($id);
        if (is_null($customer)) {

            return redirect('/customer/view');
        } else {
            $url = url('/customer/update') . "/" . $id;
            $data = compact('customer', 'title', 'url');
            return view('customer')->with($data);

        }
    }
    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->name = $request['name'];
            $customer->email = $request['email'];
            $customer->gender = $request['gender'];
            $customer->dob = $request['dob'];
            $customer->save();
            return redirect('/customer/view');
        }

    }



}
