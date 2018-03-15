<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::paginate(10);
        return view('agencies.index')->with('agencies', $agencies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'agency_name' => 'required',
            'agency_address' => 'required',
            'agency_contact' => 'required',
            'agency_permit' => 'required',
            'agency_info' => 'nullable',
            'agency_url' => 'nullable',
            'agency_logo' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('agency_logo'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('agency_logo')->getClientOriginalName();
            //Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get extension
            $extension = $request->file('agency_logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('agency_logo')->storeAs('public/agency_logos', $fileNameToStore);
        } 
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        
        //Add Agency
        $agency = new Agency;
        $agency->agency_name = $request->input('agency_name');
        $agency->agency_address = $request->input('agency_address');
        $agency->agency_contact = $request->input('agency_contact');
        $agency->agency_permit = $request->input('agency_permit');
        $agency->agency_info = $request->input('agency_info');
        $agency->agency_url = $request->input('agency_url');
        $agency->agency_status = $request->input('agency_status');
        $agency->user_id = auth()->user()->id;
        $agency->agency_logo = $fileNameToStore;
        $agency->save();

        return redirect('/agencies')->with('success', 'Company Profile Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agency = Agency::find($id);
        return view('agencies.show')->with('agency', $agency);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = Agency::find($id);
        return view('agencies.edit')->with('agency', $agency);
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
        $this->validate($request, [
            'agency_name' => 'required',
            'agency_address' => 'required',
            'agency_contact' => 'required',
            'agency_permit' => 'required',
            'agency_info' => 'nullable',
            'agency_url' => 'nullable',
        ]);
        
        //Edit Agency
        $agency = Agency::find($id);
        $agency->agency_status = $request->input('agency_status');
        $agency->agency_name = $request->input('agency_name');
        $agency->agency_address = $request->input('agency_address');
        $agency->agency_contact = $request->input('agency_contact');
        $agency->agency_permit = $request->input('agency_permit');
        $agency->agency_info = $request->input('agency_info');
        $agency->agency_url = $request->input('agency_url');
        $agency->save();

        return redirect('/agencies')->with('success', 'Company Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = Agency::find($id);
        $agency->delete();
        return redirect('/agencies')->with('success', 'Agency Removed');
    }
}
