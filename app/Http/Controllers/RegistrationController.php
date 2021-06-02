<?php

namespace App\Http\Controllers;

use App\State;
use App\City;
use App\User;
use Session;
use Exception;
use App\Cylinder;
use Carbon\Carbon;
use App\SupplierDetail;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BookingCylinderRequest;


class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(State $state, City $city, User $user, SupplierDetail $supplierDetail, Cylinder $cylinder)
    {
        $this->state = $state;
        $this->city = $city;
        $this->user = $user;
        $this->cylinder = $cylinder;
        $this->supplierDetail = $supplierDetail;
    }
    /**
     * Show Landing Page.
     *
     * @return void
     */
    public function index()
    {
        $supplier_users = $this->user->where('account_type', '0')->with('supplierDetail', 'cylinder')->get();
        return view('index', compact('supplier_users'));
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
     * Create New User by Registration Form .
     *
     */
    public function createSupplier(SupplierRequest $request)
    {
        try {

            $extension = $request->file('identity_proof')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;

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

            $liters[] = [0 => ['ltr' => 5, 'item' => 5], 1 => ['ltr' => 10, 'item' => 5], 2 => ['ltr' => 15, 'item' => 5]];
            foreach ($liters as $key => $liter) {
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

    /**
     * Shows Booking Form
     *
     */
    public function bookingCylinder($id)
    {
        $supplier_id = base64_decode($id);
        $states = $this->state->get();
        $supplier_details = $this->user->where('id', $supplier_id)->with('supplierDetail', 'cylinder')->first();
        return view('booking_cylider', compact('supplier_details', 'states'));
    }
    /**
     * Create Consumer form by Booking Cylinder  Form .
     *
     */
    public function createConsumerBooking(BookingCylinderRequest $request)
    {
        try {
            $supplier_id = $request->supplier;
            $extension = $request->file('identity_proof')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('identity_proof')->storeAs('public/identity_proof', $fileNameToStore);
            $url    = Storage::url($path);

            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  bcrypt('neosoft'),
                'gender' => $request->gender,
                'age' => $request->age,
                'aadhar_card_number' => $request->aadhar_card,
                'identity_proof' => $fileNameToStore,
                'address'  => $request->address,
                'phone_number'  => $request->phonenumber,
                'account_type' => '1',
                'state' => $request->state,
                'city' => $request->city
            ])->bookingHistory()->create([
                'supplier_id' =>  $supplier_id,
                'covid_19' => $request->covid_19,
                'date_covid_19' => $request->date_covid_19,
                'status' => 'pending',
            ]);
            $total_cylinder = $this->cylinder->where('user_id',$supplier_id)->where('ltr', $request->cylinder)->select('quantity')->first();
           
            $total_cylinder = $this->cylinder->where('user_id',$supplier_id)->where('ltr', $request->cylinder)->update([
                'quantity' => $total_cylinder->quantity - 1,
            ]);


            return redirect('/')->withSuccess('message', 'IT WORKS!');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
