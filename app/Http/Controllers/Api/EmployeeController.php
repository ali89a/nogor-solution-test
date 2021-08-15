<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = Employee::all();
        if ($data) {
            return send_response('Successfully Retrive.', EmployeeResource::collection($data), 200);
        } else {
            return send_error('Data Not Found!', [], Response::HTTP_NOT_FOUND);
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

//        dump(\Log::info(print_r($request->all(),true)));

        if ($request->image != null) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/image'), $fileName);
        }
        $employee = new Employee;
        $employee->fill($request->except('image', 'skills'));
        $employee->image = '/'.$fileName;
        $employee->skills = $request->skills;
        $employee->save();
        return response('Successfully Save', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'erro' => 'Data Not found'
            ], 404);
        }

        return $employee;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $employee = Employee::find($id);
        if ($request->image != null) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/image'), $fileName);
        }else{
            $fileName = $employee->image;
        }
        
        $employee->fill($request->except('image', 'skills'));
        $employee->image = '/'.$fileName;
        $employee->skills = $request->skills;
        $employee->save();

        return response('Successfully Updated', 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return send_response('Successfully Deleted.', new EmployeeResource($employee), 200);
    }
}
