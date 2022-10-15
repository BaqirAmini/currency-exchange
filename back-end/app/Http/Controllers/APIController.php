<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;

class APIController extends Controller
{
  # register new customer
  public function onCreateCustomer(Request $request)
  {

    # Validate customers' info
    $validator = Validator::make($request->all(), [
      'firstName' => 'required|string|min:3|max:64',
      'lastName' => 'nullable|string|min:3|max:64',
      'fatherName' => 'required|string|min:3|max:64',
      'tazkira_number' => 'required|string|min:13|max:13|unique:customers,tazkira_ID',
      'contact_number' => 'required|string|min:10|max:16|unique:customers,contact_NO',
      'email' => 'nullable|string|email|unique:customers,email',
      'address' => 'required|string|min:16|max:256'
    ]);

    if (!$validator->fails()) {
      $customer = new Customer();
      $customer->first_name = $request->firstName;
      $customer->last_name = $request->lastName;
      $customer->father_name = $request->fatherName;
      $customer->tazkira_ID = $request->tazkira_number;
      $customer->contact_NO = $request->contact_number;
      $customer->photo = $request->photo;
      $customer->email = $request->email;
      $customer->address = $request->address;
      if ($customer->save()) {
        return response()->json(
          ['status' => 200]
        );
      } else {
        return response()->json(['message' => 'fail']);
      }
    } else {
      return response()->json(
        ['validation_err' => $validator->messages(), 'status' => 0]
      );
    }
  }

  public function onGetCustomer()
  {
    $customers = Customer::all();
    if (isset($customers)) {
      return response()->json([
        'customers' => $customers
      ]);
    } else {
      return "not found";
    }
  }


  # Fetch customers' info using his/her ID to update
  public function onEditCustomer($cid)
  {
    $customer = Customer::findOrfail($cid);
    /* $customer->comp_id = $request->compId;
         $customer->cust_name = $request->custName;
         $customer->cust_lastname = $request->custLname;
         $customer->cust_phone = $request->custPhone;
         $customer->cust_email = $request->custEmail;
         $customer->cust_state = $request->custState;
         $customer->cust_addr = $request->custAddress; */

    return response()->json([
      "status" => 200,
      "customer" => $customer,
    ]);
  }

  # Post changes to update a customer
  public function onPostCustInfo(Request $request, $cid)
  {
    $customer = Customer::findOrfail($cid);
    $customer->first_name = $request->firstName;
    $customer->last_name = $request->lastName;
    $customer->father_name = $request->fatherName;
    $customer->tazkira_ID = $request->tazkiraID;
    $customer->contact_NO = $request->contactNO;
    $customer->email = $request->email;
    $customer->address = $request->address;
    $customer->update();
    return response()->json([
      'status' => 200,
      'message' => 'The customer updated successfully!'
    ]);
  }

  # Delete a customer
  public function onDeleteCustomer($cid)
  {
    $customer = Customer::findOrfail($cid);
    $customer->delete();
    return response()->json([
      'status' => 200,
      'message' => 'The customer deleted successfully!'
    ]);
  }
}
