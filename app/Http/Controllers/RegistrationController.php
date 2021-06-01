<?php

namespace App\Http\Controllers;

use App\State;
use App\City;
use App\User;
use Session;
use Exception;
use App\Cylinder;
use App\SupplierDetail;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(State $state, City $city,User $user,SupplierDetail $supplierDetail,Cylinder $cylinder)
    {
        $this->state = $state;
        $this->city = $city;
        $this->user = $user;
        $this->cylinder = $cylinder;
        $this->supplierDetail = $supplierDetail;
    }


    /**
     * All the Details of Cities by State Id.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getCity($id)
    {

        $cities = $this->city->where('state_id', $id)->orderBy('name')->get();
        return response(['cities' => $cities], 200);
    }

    /**
     * Show the Registration Form for Supplier.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function register()
    {
        $states = $this->state->get();
        return view('register', compact('states'));
    }

    /**
     * Craete New User by Registration Form .
     *
     */
    public function createSupplier(Request $request)
    {
        try {
           
            $extension = $request->file('identity_proof')->getClientOriginalExtension();
            $fileNameToStore =time().'.'.$extension;
           
            $path = $request->file('identity_proof')->storeAs('public/identity_proof', $fileNameToStore);
            $url    = Storage::url($path);

            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email, 
                'password' =>  bcrypt($request->password),
                'gender' => $request->gender,
                'age' => $request->age,
                'aadhar_card_number' => $request->aadhar_card,
                'identity_proof' => $fileNameToStore,
                'address'  => $request->address,
                'phone_number'  => $request->phonenumber,
                'account_type' => '0',
                'state' => $request->state,
                'city' => $request->city
            ])->supplierDetail()->create([
                'business_name' => $request->businessname,
            ]);

            $liters[] = [0=>['ltr'=>5,'item'=>5],1=>['ltr'=>10,'item'=>5],2=>['ltr'=>15,'item'=>5]];
            foreach($liters as $key => $liter){
            //     print($key);
            //   print_r($liter[$key]);
                // $this->cylinder->create([
                //     'user_id' =>1,
                //     'ltr' =>$liter[$key]['ltr'],
                //     'quantity' =>$liter[$key]['item']
                // ]);
              
            }
            // dd('her');

            
       
            return redirect()->back()->with('message', 'IT WORKS!');
           
        } catch (Exception $e) {
            dd($e);
        }


       
    }
}
