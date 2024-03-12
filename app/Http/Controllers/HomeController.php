<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\ChooseUs;
use App\Models\CustomerCounter;
use App\Models\Reservations;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends BaseController
{
    public function index(){
        $whyYummiBlocks = ChooseUs::all();
        $this->data['counter'] = CustomerCounter::all();
        $this->data['testimonials'] = Testimonial::all();
        $this->data['chefs'] = Chef::all();
        return view('home', ["data" => $this->data], ["blocks" => $whyYummiBlocks]);
    }
    public function showFormBookTable(){
        if(Auth::check()){
            return view('components.book-table',['data'=> $this->data]);
        }
        return redirect()->route('login')->with('error-msg', 'Login first or create account to book table!');
    }
    public function bookTable(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'phone' => 'required|min:4',
            'date' => 'required|date',
            'time' => 'required|min:4',
            'people' => 'required|numeric|min:1',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();

        $reservationData = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'peopleNumber' => $request->input('people'),
            'message' => $request->input('message'),
            'user_id' => $user->id,
        ];
        $reservation = Reservations::create($reservationData);

        return response()->json(['success' => 'Your reservation has been successfully booked!'], 200);
    }

}
