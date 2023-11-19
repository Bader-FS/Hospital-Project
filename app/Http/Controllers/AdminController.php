<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Latest;


class AdminController extends Controller
{
    public function addview(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');
            }
            else{
                return redirect()->back();
            }
        }

        else{
            return redirect('login'); 
        }
        
    }

    public function upload(Request $request){

        $doctor = new doctor;

        $image=$request->image;

        $imagename =time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('doctorimage',$imagename);

        $doctor->image=$imagename;

        $doctor->name=$request->name;

        $doctor->phone=$request->number;

        $doctor->room=$request->room;

        $doctor->speciality=$request->speciality;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointment(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data = appointment::all();
                return view('admin.showappointment',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

        
    }

    public function deleteappoint($id){
        $appoint = appointment::find($id);

        $appoint->delete();

        return redirect()->back()->with('message','Appointment Deleted Successfully');
    }

    public function approved($id){

        $data = appointment::find($id);
        $data->status = 'Approved';

        $data->save();

        return redirect()->back();
    }

    public function canceled($id){

        $data = appointment::find($id);
        $data->status = 'Canceled';

        $data->save();

        return redirect()->back();
    }

    public function showdoctor(){

        $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
    }

    public function deletedoctor($id){

        $data = doctor::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updatedoctor($id){

        $data = doctor::find($id);

        return view('admin.updatedoctor',compact('data'));
    }

    public function editdoctor(Request $request,$id){

        $doctor = doctor::find($id);

        $doctor->name=$request->name;

        $doctor->phone=$request->phone;

        $doctor->speciality=$request->speciality;

        $doctor->room=$request->room;

        $image=$request->image;

        if($image){

        $imagename =time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('doctorimage',$imagename);

        $doctor->image=$imagename;

        }

        $doctor->save();

        return redirect()->back()->with('message','Doctor Details Updated Successfully');


    }

    public function search(Request $request){

        $search= $request->search;

        $data= appointment::where('name','like','%'.$search.'%')->orWhere('doctor','like','%'.$search.'%')->get();

        return view('admin.showappointment',compact('data'));
            
    }

    public function latestview(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_latest');
            }
            else{
                return redirect()->back();
            }
        }

        else{
            return redirect('login'); 
        }
    }

    public function upload_latest(Request $request){

        $latest = new latest;

        $image=$request->image;

        $imagename =time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('latestimage',$imagename);

        $latest->image=$imagename;

        $latest->name=$request->name;

        $latest->title=$request->title;

        $latest->date=$request->date;

        $latest->save();

        return redirect()->back()->with('message','News Added Successfully');
    }

    public function show_latest(){

        $data= latest::all();
        return view('admin.show_latest',compact('data'));
    }

    public function deletelatest($id){

        $data = latest::find($id);
        $data->delete();

        return redirect()->back();

    }

    public function updatelatest($id){

        $data = latest::find($id);

        return view('admin.updatelatest',compact('data'));
    }


    public function editlatest(Request $request,$id){

        $latest = latest::find($id);

        $latest->name=$request->name;

        $latest->title=$request->title;

        $latest->date=$request->date;

        $image=$request->image;

        if($image){

        $imagename =time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('latestimage',$imagename);

        $latest->image=$imagename;

        }

        $latest->save();

        return redirect('show_latest')->with('message','News Details Updated Successfully');


    }
}
