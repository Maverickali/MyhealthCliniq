<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use jeremykenedy\LaravelRoles\Models\Role;
use Auth; 
use App\Models\Appointment;
class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $user = User::find($id);      

       return view('pages.appointments.searchby');
    }


    Public function appoint(Request $request, $id)
    {

        $id = [ 'id'=> $id ];
        return view('pages.appointments.create-appointment')->with($id);
        

    }
    public function filter(Request $request )
    {

        if(!$_GET['filter'] ){
            if(!$_GET['keyword'] ){
                $filter = $_GET['filter'];
                $keyword = $_GET['keyword'];
            }
           
        }
        try {
            $items = Profile::where([ 
                [$_GET['filter'], 'LIKE',  $_GET['keyword'] . '%'],
               
            ])->get();
            $role = Role::all();
        } catch (ModelNotFoundException $exception) {
            return view('pages.status')
                ->with('error', 'NOTHING FOUND')
                ->with('error_title', 'NOTHING FOUND');
        }   
       

        foreach( $items as $item)
        {
            $user = User::find($item->id)->get();
            $role = Role::all();
            // $user = User::find($item->id)->where('role' , '=' , 'doctor')->get();
            $data = [
                'items' => $item,
                'users' => $user,
                'roles' => $role,
               
              
            ];
           
        }    
     
          

        return view('pages.appointments.show-doctorsinsearch')->with($data);
           
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        
        $roles = Role::all();

        $data = [
            'roles' => $roles,
        
        ];

        

       // $users = User::find($username); return view('usersmanagement.create-user')
        return view('pages.appointments.create-appointment')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $Appointment = Appointment::create([
            'doctor_id' => $request->input('doctor_id'),
            'appointmentdate' => $request->input('dateinput'),
            'patient_id'=> $request->input('patient_id'),
            'appointmentstatus' => $request->input('appointmentstatus'),
            'appointmentreason' => $request->input('appointmentreason'),
        ]);
        $Appointment->save();
        return view('pages.appointments.confirm');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
