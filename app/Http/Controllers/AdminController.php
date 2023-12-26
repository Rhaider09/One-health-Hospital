<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;

use Notifications;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;

        $image = $request->file;

        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image = $imagename;

        $doctor->name = $request->name;

        $doctor->phone = $request->number;
        $doctor->room = $request->room;

        $doctor->specialty = $request->speciality;

        $doctor->save();

        return redirect()->back()->with('massage', 'Doctor Added Successfully');
    }

    public function showappointment()
    {

        $data = Appointment::all();

        return view('admin.showappointment', compact('data'));
    }


    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'approved';
        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = Appointment::find($id);
        $data->status = 'canceled';
        $data->save();

        return redirect()->back();
    }

    public function showdoctor()
    {

        $data = Doctor::all();
        return view('admin.showdoctor', compact('data'));
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);

        $data->delete();
        // $data->save();

        return redirect()->back();
    }

    public function updatedoctor($id)
    {

        $data = doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;

        $doctor->phone = $request->phone;

        $doctor->specialty = $request->specialty;

        $doctor->room = $request->room;

        $image = $request->file;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $doctor->image = $imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Details Updated Successfully');
    }


    public function emailview($id)
    {

        $data = appointment::find($id);

        return view('admin.email_view', compact('data'));
    }



}
