<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Support\Facades\Validator;

class PatientsController extends Controller
{
	public function __construct()
	{
		$this->patientsModel = new Patients();
	}

	public function index()
	{
		$patients = $this->patientsModel->allData();

		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->patientsModel->responseFail('Data is empty', 200);
		}

		return $this->patientsModel->responseSuccess($patients, 'Get all resource');
	}

	public function store(Request $request)
	{
		if ($request->status_id <= 3) {
			$positive = 1;
			$rules = [
				'name' => 'required',
				'phone' => 'required',
				'address' => 'required',
				'status_id' => 'required',
				'in_date_at' => 'required',
				'out_date_at' => 'required',
			];

			if ($request->status_id !== $positive) {
				return $this->storePatientByRules($request->all(), $rules);
			}
			
			$outDateAt = 5;
			$justRemoveThis = 1;
			array_splice($rules, $outDateAt, $justRemoveThis); // remove out_date_at from rules

			$createData = [
				'name' => $request->name,
				'phone' => $request->phone,
				'address' => $request->address,
				'status_id' => $request->status_id,
				'in_date_at' => $request->in_date_at,
				'out_date_at' => null,
			];

			return $this->storePatientByRules($createData, $rules);
		}

		return $this->patientsModel->responseFail(
			'cannot insert more than 4 value in status_id. Try, 1 = Positive, 2 = Recovered, 3 = Dead.',
			412
		);
	}

	public function show($id)
	{
		$patient = $this->patientsModel->findById($id);
		// $patient = Patients::find($id);
		$patientsNotExist = $patient == null;

		if ($patientsNotExist) {
			return $this->patientsModel->responseFail();
		}

		return $this->patientsModel->responseSuccess($patient, 'Get detail resource');
	}

	public function update(Request $request, $id)
	{
		$patient = Patients::find($id);
		$patientsNotExist = $patient == null;

		if ($patientsNotExist) {
			return $this->patientsModel->responseFail();
		}

		return $this->patientsModel->responseSuccess(
			$patient->update($request->all()),
			'Resource is update successfully'
		);
	}

	public function destroy($id)
	{
		$patient = Patients::find($id);
		$patientNotExist = $patient == null;

		if ($patientNotExist) {
			return $this->patientsModel->responseFail();
		}

		return $this->patientsModel->responseSuccess(
			$patient->delete(), 
			'Resource is delete successfully'
		);
	}   

	public function search($name)
	{
		$patients = $this->patientsModel->findByName($name);
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->patientsModel->responseFail();
		}

		return $this->patientsModel->responseSuccess($patients, 'Searched Resource');
	}

	public function positive() 
	{
		$positive = 1;
		$patients = $this->patientsModel->findByStatus($positive);
		// $patients = Patients::where('status_id', $positive)->get();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->patientsModel->responseFail();
		}

		return $this->patientsModel->responseSuccess($patients, 'Get positive resource');
	}

	public function  recovered()
	{
		$recovered = 2;
		$patients = $this->patientsModel->findByStatus($recovered);
		// $patients = Patients::where('status_id', $recovered)->get();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->patientsModel->responseFail();
		}

		return $this->patientsModel->responseSuccess($patients, 'Get recovered resource');
	}

	public function dead()
	{
		$dead = 3;
		$patients = $this->patientsModel->findByStatus($dead);
		// $patients = Patients::where('status_id', $dead)->get();
		$patientsNotExist = count($patients) == 0;

		if ($patientsNotExist) {
			return $this->patientsModel->responseFail();
		}

		return $this->patientsModel->responseSuccess($patients, 'Get dead resource');
	}

	private function storePatientByRules($data, $rules)
	{
		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return $this->patientsModel->responseFail(
				'name, phone, address, status, in_date_at, out_date_at must be inserted',
				412
			);
		}

		$patient = Patients::create($data);
		return $this->patientsModel->responseSuccess(
			$patient, 
			'Resource is added successfully', 
			201
		);
	}
}
