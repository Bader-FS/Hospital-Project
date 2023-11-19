<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Latest;




class HomeController extends Controller
{



    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor= doctor::all();
                $latest =latest::all();
                return view('user.home',compact('latest','doctor'));
            }
            else{
                return view('admin.home');
            }
        }

        else{
            return redirect()->back();
        }
    }

    public function index(){

        if(Auth::id()){
            return redirect('home');
        }
        
        else{

        $doctor= doctor::all();
        $latest = latest::all();

        return view('user.home',compact('latest','doctor'));
        }
    }


    public function appointment(Request $request){
        $data = new appointment;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->date = $request->date;

        $data->phone = $request->number;

        $data->message = $request->message;

        $data->doctor = $request->doctor;

        $data->status = "In Progress";

        if(Auth::id()){
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment Request Successfully,We will contact You as soon as possible');

        
    }

    public function myappointment(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $user_id = Auth::user()->id;

                $appoint = appointment::where('user_id',$user_id)->get();
                return view('user.my_appointment',compact('appoint'));
            }
            else{
                return redirect()->back(); 
            }
            

        }
        else{
            return redirect('login');
        }
    }

    public function cancel_appoint($id){
        $data = appointment::find($id);

        $data->delete();

        return redirect()->back()->with('message','Appointment Canceled Successfully');
    }

    public function doctor(){
        $doctor=doctor::all();

        return view('user.doctor',compact('doctor'));
    }

    public function about(){
        $doctor=doctor::all();

        return view('user.about',compact('doctor'));
    }

    public function news(){

        $latest = latest::all();
        return view('user.news',compact('latest'));
    }

    public function contact(){
        return view('user.contact');
    }

    
}
