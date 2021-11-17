<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Patients extends Model
{
	use HasFactory;

	// kolom table yang dapat bisa diisi
	protected $fillable = [
		'name', 
		'phone', 
		'address', 
		'status_id',
		'in_date_at',
		'out_date_at',
	];

	public function allData()
	{
		// mendapatkan semua data
		return $this->joinData()->get();
	}

	public function findById($id)
	{
		// mencari data berdasarkan id
		return $this->joinData()
								->where('patients.id', $id)
								->first();
	}

	public function findByStatus($id) 
	{
		// mencari data berdasarkan status
		return $this->joinData()
								->where('status_id', $id)
								->get();
	}

	public function findByName($name)
	{
		// mencari data berdasarkan name
		return $this->joinData()
								->where('patients.name', $name)
								->get();
	}

	public function responseFail($message = 'Resource not found', $statusCode = 404) 
	{
		// response ketika gagal
		$response = [
			'message' => $message,
		];

		return response()->json($response, $statusCode);
	}

	public function responseSuccess($data, $message, $statusCode = 200)
	{
		// response ketika success
		$response = [
			'message' => $message,
			'data' => $data,
		];

		return response()->json($response, $statusCode);
	}

	private function joinData()
	{
		// menggabungkan table patients dan status
		return DB::table('patients')
							->select('patients.id', 'patients.name', 'phone', 'address', 'status.name as status', 'in_date_at', 'out_date_at') 
							->join('status', 'status.id', '=', 'patients.status_id');
	}
}
