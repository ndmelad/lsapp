<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::paginate(10);
        return view('deals.index')->with('deals', $deals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deals.create');
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
            'deal_location' => 'required',
            'deal_price' => 'required',
            'deal_inclusions' => 'required',
            'deal_startdate' => 'required',
            'deal_enddate' => 'required',
            'deal_img1' => 'image|nullable|max:1999',
            'deal_img2' => 'image|nullable|max:1999',
            'deal_img3' => 'image|nullable|max:1999',
            'deal_img4' => 'image|nullable|max:1999',
            ]);
    
            //Handle File Upload of img1
            if($request->hasFile('deal_img1'))
            {
                //Get filename with extension
                $filenameWithExt = $request->file('deal_img1')->getClientOriginalName();
                //Get filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get extension
                $extension = $request->file('deal_img1')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('deal_img1')->storeAs('public/deal_images', $fileNameToStore);
            } 
            else
            {
                $fileNameToStore = 'noimage.jpg';
            }
            
            //Handle File Upload of img2
            if($request->hasFile('deal_img2'))
            {
                //Get filename with extension
                $filenameWithExt2 = $request->file('deal_img2')->getClientOriginalName();
                //Get filename
                $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
                //Get extension
                $extension2 = $request->file('deal_img2')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
                //Upload Image
                $path = $request->file('deal_img2')->storeAs('public/deal_images', $fileNameToStore2);
            } 
            else
            {
                $fileNameToStore2 = 'noimage.jpg';
            }

            //Handle File Upload of img3
            if($request->hasFile('deal_img3'))
            {
                //Get filename with extension
                $filenameWithExt3 = $request->file('deal_img3')->getClientOriginalName();
                //Get filename
                $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
                //Get extension
                $extension3 = $request->file('deal_img3')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
                //Upload Image
                $path = $request->file('deal_img3')->storeAs('public/deal_images', $fileNameToStore3);
            } 
            else
            {
                $fileNameToStore3 = 'noimage.jpg';
            }

            //Handle File Upload of img4
            if($request->hasFile('deal_img4'))
            {
                //Get filename with extension
                $filenameWithExt4 = $request->file('deal_img4')->getClientOriginalName();
                //Get filename
                $filename4 = pathinfo($filenameWithExt4, PATHINFO_FILENAME);
                //Get extension
                $extension4 = $request->file('deal_img4')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore4 = $filename4.'_'.time().'.'.$extension4;
                //Upload Image
                $path = $request->file('deal_img4')->storeAs('public/deal_images', $fileNameToStore4);
            } 
            else
            {
                $fileNameToStore4 = 'noimage.jpg';
            }

        //Add Deal
        $deal = new Deal;
        $deal->deal_location = $request->input('deal_location');
        $deal->deal_price = $request->input('deal_price');
        $deal->deal_inclusions = $request->input('deal_inclusions');
        $deal->deal_startdate = $request->input('deal_startdate');
        $deal->deal_enddate = $request->input('deal_enddate');
        $deal->deal_img1 = $fileNameToStore;
        $deal->deal_img2 = $fileNameToStore2;
        $deal->deal_img3 = $fileNameToStore3;
        $deal->deal_img4 = $fileNameToStore4;
        $deal->save();

        return redirect('/deals')->with('success', 'Deal Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal = Deal::find($id);
        return view('deals.show')->with('deal', $deal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deal = Deal::find($id);
        return view('deals.edit')->with('deal', $deal);
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
            'deal_location' => 'required',
            'deal_price' => 'required',
            'deal_inclusions' => 'required',
            'deal_startdate' => 'required',
            'deal_enddate' => 'required',
        ]);

        //Edit Deal
        $deal = Deal::find($id);
        $deal->deal_location = $request->input('deal_location');
        $deal->deal_price = $request->input('deal_price');
        $deal->deal_inclusions = $request->input('deal_inclusions');
        $deal->deal_startdate = $request->input('deal_startdate');
        $deal->deal_enddate = $request->input('deal_enddate');
        $deal->save();

        return redirect('/deals')->with('success', 'Deal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal = Deal::find($id);
        $deal->delete();
        return redirect('/deals')->with('success', 'Deal Removed');
    }
}
