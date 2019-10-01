<?php

namespace Firmen\Http\Controllers;
use Validator;
use Config;
use DB;
use Firmen\Praktikum;
use Firmen\History;
use Firmen\Contact;


use Illuminate\Http\Request;

class HistoryController extends Controller
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
    public function index()
    {
        return view('history');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $history = new History;
        $history->name = $request->name;

        $contact = Contact::find($request->contact_id);
        if ($contact) {
            $history->contact_id = $request->contact_id;
        }
        else {
            $contact = new Contact;
            $contact->name = $request->contact_id;
            $contact->praktikum_id = $request->praktikum_id;
            $contact->save();

            $history->contact_id = $contact->id;
        }
        $history->save();
        
        return back()->with('message','Erfolgreich hinzugefügt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $praktikum = Praktikum::find($id);
        $history = History::where('praktikum_id',$id)->orderby('created_at','desc')->get();


        return view('history');
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
        $history = History::find($id);		
		$$history->delete();
		
		return redirect('history')->with('message','Erfolgreich gelöscht');
    }
}
