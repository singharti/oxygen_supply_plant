<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BookingHistory;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookingHistory $bookingHistory)
    {
        $this->middleware('auth');
        $this->bookingHistory = $bookingHistory;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $all_listing = $this->bookingHistory->where('supplier_id', $user->id)->with('user')->orderBy('id', 'DESC')->get();
        $pending_listing = $this->bookingHistory->where('supplier_id', $user->id)->where('status', 'pending')->with('user')->orderBy('id', 'DESC')->get();
        $process_listing = $this->bookingHistory->where('supplier_id', $user->id)->where('status', 'process')->with('user')->orderBy('id', 'DESC')->get();
        $deliverred_listing = $this->bookingHistory->where('supplier_id', $user->id)->where('status', 'delivered')->with('user')->orderBy('id', 'DESC')->get();
        return view('dashboard', compact('all_listing', 'pending_listing', 'process_listing', 'deliverred_listing'));
    }

    /**
     * Create Consumer form by Booking Cylinder  Form .
     *
     */
    public function viewBookingDetail($id)
    {
        $consumer_id = base64_decode($id);
        $consumer = $this->bookingHistory->where('consumer_id', $consumer_id)->with('user')->first();
        return view('booking_detail', compact('consumer'));
    }

    /**
     *Edit Consumer form by Booking Cylinder  Form .
     *
     */
    public function editBookingDetail($id)
    {
        $consumer_id = base64_decode($id);
        $consumer = $this->bookingHistory->where('consumer_id', $consumer_id)->with('user')->first();
        return view('booking_detail_edit', compact('consumer'));
    }
    /**
     * Save Status Consumer form by Booking Cylinder  Form .
     *
     */

    public function editConsumerDetail(Request $request)
    {
        try {
            $consumer_id = base64_decode($request->consumer_id);
            // dd($consumer_id);
            $consumer = $this->bookingHistory->where('id', $consumer_id)->update([
                'status' => $request->status,
            ]);
            return redirect()->back()->with('message', 'Successfully Edit Details');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
