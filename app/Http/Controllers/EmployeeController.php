<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Employee;
use Illuminate\Support\Facades\Route;
//use App\Http\Resources\EmployeeResource;
//use Grimzy\LaravelMysqlSpatial\Types\Point;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = Request::create('/api/employees', 'GET');
        $response = Route::dispatch($request);
      
        return view('home',compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        Mapper::map(31.040948, 31.378470);
        return view('employees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = Request::create('/api/employees', 'POST');
        $response = Route::dispatch($request);   
        
        $request = Request::create('/api/employees', 'GET');
        $response = Route::dispatch($request);
        return view('home',compact('response'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }
    public function searchByName()
    { 
        $name = request('searchByName');
        $request = Request::create('/api/employees/'.$name, 'GET');
        $response = Route::dispatch($request);
       
        return view('home',compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Mapper::map(31.040948, 31.378470); 
        $data = Employee::find($id);
        return view('employees.update',compact('data'));
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
        $request = Request::create('/api/employees/'.$id, 'PUT');
        $response = Route::dispatch($request);

        $request = Request::create('/api/employees', 'GET');
        $response = Route::dispatch($request);
        return view('home',compact('response'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::create('/api/employees/'.$id, 'DELETE');
        $response = Route::dispatch($request);
        
        $request = Request::create('/api/employees', 'GET');
        $response = Route::dispatch($request);
        return view('home',compact('response'));

    }
}
