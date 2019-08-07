<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestModel;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = TestModel::all();

        return view('user.index', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'contact'=>'required'
        ]);
        $test = new TestModel([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'contact' => $request->get('contact'),
            'designation' => $request->get('designation'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);

        $test->save();
        return redirect('/user')->with('success', 'User saved!');
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
        $test = TestModel::find($id);
        return view('user.edit', compact('test'));        
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'contact'=>'required'
        ]);
        $test = TestModel::find($id);
        $test->first_name =  $request->get('first_name');
        $test->last_name = $request->get('last_name');
        $test->contact = $request->get('contact');
        $test->designation = $request->get('designation');
        $test->city = $request->get('city');
        $test->country = $request->get('country');
        $test->save();


        return redirect('/user')->with('success', 'User updated!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = TestModel::find($id);
        $test->delete();

        return redirect('/user')->with('success', 'User deleted!');
    }
}
