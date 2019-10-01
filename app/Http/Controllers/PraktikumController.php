<?php

namespace Firmen\Http\Controllers;

use Illuminate\Http\Request;
use Firmen\Praktikum;
use Validator;
use Config;
use DB;
use Firmen\State;
use Firmen\City;
use Firmen\Status;
use Firmen\Job;
use Firmen\Bdepartment;
use Firmen\CityPraktikum ;
use Firmen\Contact;
use Auth;



class PraktikumController extends Controller
{
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $standort = City::find(Auth::user()->city_id);
        $bundesland = State::find($standort->state_id);
       
        $type = $request->input('type');
        if($type === 'state') {
            $state = City::find(Auth::user()->city_id);
            $praktikum = Praktikum::where('state_id',$state->state_id)->get();
            
        }
        elseif ($type === 'all') {
            $praktikum = Praktikum::all();
        }
        else {
            $praktikums = CityPraktikum::where('city_id',Auth::user()->city_id)->pluck('praktikum_id')->toArray();
            $praktikum = Praktikum::wherein('id',$praktikums)->get();
        }
        
        return view('home',['praktikum'=>$praktikum,'standort'=>$standort,'bundesland'=>$bundesland]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $cities = City::all();
        $statuses = Status::all();
        $jobs = Job::all();
        $bdepartments = Bdepartment::all();
        return view('praktikum-form',['states'=>$states,'cities'=>$cities,'statuses'=>$statuses,'jobs'=>$jobs,'bdepartments'=>$bdepartments]);
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Validator::make($request->all(), [
            'praktikumid'  => 'string|max:255|unique:praktikums',

        ])->validate();
		
        
        $praktikum = new Praktikum();
        $contact = new Contact();
		$praktikum->praktikumid = $request->praktikumid ;
        $contact->contact_id = $request->contact_id ;
        $praktikum->job_id = $request->job_id ;
        $praktikum->state_id = $request->state_id ;
        $praktikum->phone = $request->phone ;
        $praktikum->phone2 = $request->phone2 ;
        $praktikum->phone3 = $request->phone3 ;
        $praktikum->fax = $request->fax ;
        $praktikum->mobile = $request->mobile ;
        $praktikum->privat = $request->privat ;
        $praktikum->zipcode = $request->zipcode ;
        $praktikum->address = $request->address ;
        $praktikum->address2 = $request->address2 ;
        $praktikum->bdepartment_id = $request->bdepartment_id ;
        $praktikum->email = $request->email ;
        $praktikum->email2 = $request->email2 ;
        $praktikum->website = $request->website ;
        $praktikum->status_id = $request->status_id ;
        $praktikum->notes = $request->notes ;
		$praktikum->save();
		
        foreach($request->city_id as $item) {
            $bridge = new CityPraktikum();
            $bridge->praktikum_id = $praktikum->id;
            $bridge->city_id = $item;
            $bridge->save();
        }
		return redirect('home')->with('message','Erfolgreich hinzugefügt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        
        $praktikum = Praktikum::find($id);
        $states = State::all();
        $cities = City::all();
        $statuses = Status::all();
        $jobs = Job::all();
        $bdepartments = Bdepartment::all();
		
		if(!$praktikum)
			return abort(404);
		
        return view('praktikum-form',['praktikum'=>$praktikum,'states'=>$states,'cities'=>$cities,'statuses'=>$statuses,
        'jobs'=>$jobs,'bdepartments'=>$bdepartments]);
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
        Validator::make($request->all(), [
            'praktikumid'  => 'string|max:255|unique:praktikums,praktikumid,'.$id.',id',                        
        ])->validate();
		
		$praktikum = Praktikum::find($id);
		$praktikum->praktikumid = $request->praktikumid ;
        $praktikum->state_id = $request->state_id ;
        $praktikum->phone = $request->phone ;
        $praktikum->phone2 = $request->phone2 ;
        $praktikum->phone3 = $request->phone3 ;
        $praktikum->fax = $request->fax ;
        $praktikum->mobile = $request->mobile ;
        $praktikum->privat = $request->privat ;
        $praktikum->zipcode = $request->zipcode ;
        $praktikum->address = $request->address ;
        $praktikum->address2 = $request->address2 ;
        $praktikum->bdepartment_id = $request->bdepartment_id ;
        $praktikum->email = $request->email ;
        $praktikum->email2 = $request->email2 ;
        $praktikum->website = $request->website ;
        $praktikum->status_id = $request->status_id ;
        $praktikum->notes = $request->notes ;
        
        $praktikum->save();

        CityPraktikum::where('praktikum_id',$id)->delete();
        
        foreach($request->city_id as $item) {
            $bridge = new CityPraktikum();
            $bridge->praktikum_id = $id;
            $bridge->city_id = $item;
            $bridge->save();
        }
		
		return redirect('home')->with('message','Erfolgreich bearbeitet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $praktikum = Praktikum::find($id);		
		$praktikum->delete();
		
		return redirect('home')->with('message','Erfolgreich gelöscht');
		
		
    }
}
