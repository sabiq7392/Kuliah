<?php
class Bmi_model extends CI_Model {
    public $berat; /** dalam kg*/
    public $tinggi; /** dalam cm */

    public function nilaiBMI() {
        $tinggi_meter = $this->tinggi / 100;
        $bmi = $this->berat / pow($tinggi_meter,2);
        return $bmi;
    }
    public function statusBMI(){
        if ($this->nilaiBMI() < 18.5){
            return "Kekurangan Berat Badan";
        } 
        else if($this->nilaiBMI() < 25.0){
            return "Normal (Ideal)";
        }
        else if($this->nilaiBMI() < 30.0){
            return "Kelebihan Berat Badan";
        }
        else{
            return "Kegemukan (Obesitas)";
        }
    }
    public function getAll() {
        // selcet * from pasien
        $query = $this->db->get('bmi_pasien');
        return $query;
    }
    public function findById($id) {
        // select * from pasien where id=$id
        $query = $this->db->get_where('bmi_pasien', ['id'=>$id]);
        return $query->row();
    }
}