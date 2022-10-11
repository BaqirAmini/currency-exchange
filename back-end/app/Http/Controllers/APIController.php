<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class APIController extends Controller
{
      # register new customer
      public function onCreateCustomer(Request $request)
      {
        $customer = new Customer();
          $customer = new Customer();
          $customer->first_name = $request->firstName;
          $customer->last_name = $request->lastName;
          $customer->father_name = $request->fatherName;
          $customer->tazkira_ID = $request->tazkiraID;
          $customer->contact_NO = $request->contactNO;
          $customer->photo = $request->photo;
          $customer->email = $request->email;
          $customer->address = $request->address;
          if ($customer->save()) {
              return response()->json(
                ['message' => 'success']);
          } else {
              return response()->json(['message' => 'fail']);
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
}
