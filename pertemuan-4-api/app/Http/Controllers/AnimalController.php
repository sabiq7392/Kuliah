<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ['Ikan', 'Ayam', 'Kucing'];
    public function index() 
    {
        $data = [
            'data' => $this->animals
        ];
        
        // return respons()
        // foreach($this->animals as $animal) {
        //     echo "$animal <br>";
        // }
        echo "Menampilkan data animals";
    }

    public function store(Request $request) 
    {
        echo "Nama hewan: $request->nama";
        echo "<br>";
        echo "Menambahkan data animals";
    }

    public function update(Request $request, $id) 
    {
        echo "Mengedit data animals id: $id";
        echo "<br>";
        echo "nama hewan: $request->nama";
    }

    public function destroy($id) 
    {
        echo "Menghapus data animals id: $id";
    }
}
