<?php
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;

use App\Http\Controllers\API\APIBaseController as APIBaseController;

use App\Employee;

use Validator;


class EmployeeAPIController extends APIBaseController

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $employees = Employee::all();

        return $this->sendResponse($employees->toArray(), 'Employees retrieved successfully.');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $input = $request->all();


        $validator = Validator::make($input, [

            'firstname' => 'required',

            'lastname' => 'required',

            'image' => 'required'

        ]);


        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }

        $employee = new Employee;
        if($request->hasfile('image'))
        {
            $path = $request->image->store('public');
            $employee->image=$path;
        }
        

        $employee->firstname=request('firstname');
        $employee->secondname=request('lastname');
        $employee->user_id=1;
        $employee->job=request('job');
        $employee->status=request('statusRB');
        //$employee->location=new Point(0, 0);
        $employee->save();

        /*$user = new User;
        $user->username=request('firstname')." ".request('lastname');
        $user->password=request('password');
        $user->save();
        */

        return $this->sendResponse($employee->toArray(), 'employee created successfully.');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($name)
    {
        //$data = Employee::find($name);
        $data = Employee::where('firstname', '=', $name)->get();

        if (is_null($data)) {

            return $this->sendError('Employee not found.');
        }

        return $this->sendResponse($data->toArray(), 'Employee retrieved successfully.');
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

        $input = $request->all();


        $validator = Validator::make($input, [

            'firstname' => 'required',

            'lastname' => 'required',

            'image' => 'required'


        ]);


        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }

        $employee=Employee::find($id);

        if (is_null($employee)) {

            return $this->sendError('employee not found.');

        }

        
        if($request->hasfile('image'))
        {
            $path = $request->image->store('public');
            $employee->image=$path;
        }
        //$employee->firstname = $input['firstname'];
        $employee->firstname=request('firstname');
        $employee->secondname=request('lastname');
        $employee->user_id=$id;
        $employee->job=request('job');
        $employee->status=request('statusRB');
        $employee->save();


        return $this->sendResponse($employee->toArray(), 'Employee updated successfully.');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
        $employee = Employee::find($id);    
        
        if (is_null($employee)) {

            return $this->sendError('Employee not found.');

        }

        $employee->delete();


        return $this->sendResponse($id, 'Employee deleted successfully.');

    }

}