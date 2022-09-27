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
}
