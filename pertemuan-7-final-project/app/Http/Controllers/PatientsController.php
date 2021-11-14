<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Support\Facades\Validator;

class PatientsController extends Controller
{
	public function index()
	{
		$patients = Patients::all();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->responseFail('Data is empty', 200);
		}

		return $this->responseSuccess($patients, 'Get all resource');
	}

	public function store(Request $request)
	{
		$rules = [
			'name' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'status' => 'required',
			'in_date_at' => 'required',
			'out_date_at' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return $this->responseFail('name, phone, address, status, in_date_at, out_date_at must be inserted');
		}
		
		$patient = Patients::create($request->all());

		return $this->responseSuccess(
			$patient, 
			'Resource is added successfully', 
			201
		);
	}

	public function show($id)
	{
		$patient = Patients::find($id);
		$patientsNotExist = $patient == null;

		if ($patientsNotExist) {
			return $this->responseFail();
		}

		return $this->responseSuccess($patient, 'Get detail resource');
	}

	public function update(Request $request, $id)
	{
		$patient = Patients::find($id);
		$patientsNotExist = $patient == null;

		if ($patientsNotExist) {
			return $this->responseFail();
		}

		return $this->responseSuccess(
			$patient->update($request->all()),
			'Resource is update successfully'
		);
	}

	public function destroy($id)
	{
		$patient = Patients::find($id);
		$patientNotExist = $patient == null;

		if ($patientNotExist) {
			return $this->responseFail();
		}

		return $this->responseSuccess(
			$patient->delete(), 
			'Resource is delete successfully'
		);
	}   

	public function search($name)
	{
		$patients = Patients::where('name', $name)->get();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->responseFail();
		}

		return $this->responseSuccess($patients, 'Searched Resource');
	}

	public function positive() 
	{
		$patients = Patients::where('status', 'positive')->get();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->responseFail();
		}

		return $this->responseSuccess($patients, 'Get positive resource');
	}

	public function  recovered()
	{
		$patients = Patients::where('status', 'recovered')->get();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->responseFail();
		}

		return $this->responseSuccess($patients, 'Get recovered resource');
	}

	public function dead()
	{
		$patients = Patients::where('status', 'dead')->get();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->responseFail();
		}

		return $this->responseSuccess($patients, 'Get dead resource');
	}

	private function responseFail($message = 'Resource not found', $statusCode = 404) 
	{
		$response = [
			'message' => $message,
		];

		return response()->json($response, $statusCode);
	}

	private function responseSuccess($data, $message, $statusCode = 200)
	{
		$response = [
			'message' => $message,
			'data' => $data,
		];
		return response()->json($response, $statusCode);
	}
}
