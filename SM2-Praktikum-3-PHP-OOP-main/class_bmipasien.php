
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container-fluid" style="max-width:1366px;">    
      <div class="row">
        <div class="col-6">
          <form class="form-horizontal p-5 shadow h-100" style="background-color:#f1f2f6;" method="GET" action="HalamanBMI.php">
            <div class="text-center">
              <h3 class="mb-5 text-primary text-mg">FORM ISIAN INDEXS MASSA TUBUH (BMI)</h3>
            </div>
            <!------------>
              <div class="form-group row">
                <label for="namalengkap" class="col-sm-4 col-form-label"><b>Nama Lengkap</b></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama__lengkap" required>
                </div>
              </div>
              <br>

            <!------------>
              <div class="form-group row">
                <label for="namalengkap" class="col-sm-4 col-form-label"><b>Berat</b></label>
                <div class="col-sm-6">
                  <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" name="berat__" required>
                    <div class="input-group-prepend">
                      <div class="input-group-text">Kg</div>
                    </div>
                  </div>
                </div>
              </div>
              <br>

            <!------------>
              <div class="form-group row">
                <label for="namalengkap" class="col-sm-4 col-form-label"><b>Tinggi Badan</b></label>
                <div class="col-sm-6">
                  <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" name="tinggi__" required>
                    <div class="input-group-prepend">
                      <div class="input-group-text">Cm</div>
                    </div>
                  </div>
                </div>
              </div>
              <br>

            <!------------>
            <div class="form-group row">
                <label for="namalengkap" class="col-sm-4 col-form-label"><b>Umur</b></label>
                <div class="col-sm-6">
                  <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" name="umur__" required>
                    <div class="input-group-prepend">
                      <div class="input-group-text">Thn</div>
                    </div>
                  </div>
                </div>
              </div>
              <br>

            <!------------>
            <div class="row">
              <legend class="col-form-label col-sm-4 pt-0"><b>Jenis Kelamin</b></legend>
              <div class="col-sm-8">

                <div class="form-check mr-auto">
                  <input class="form-check-input" type="radio" id="laki" name="jenis__kelamin" value="Laki-Laki" required>
                  <label class="form-check-label mr-5" for="laki">
                    Laki-Laki
                  </label>
                  <input class="form-check-input" type="radio" id="perempuan" name="jenis__kelamin" value="Perempuan" required>
                  <label class="form-check-label" for="perempuan">
                    Perempuan
                  </label>
                </div>
              </div>  <!---col-->
            </div> <!---row-->
            <br>
            <!------------>
              <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Simpan" name="proses"/>
              </div>
          </form>
        </div> <!--col--->
        <div class="col-6">
          <div class="shadow p-5 h-100" style="background-color:#f1f2f6;">
            
            <h3 class="text-success text-center" >HASIL EVALUASI BMI</h3>
            <h6 class="mb-3 text-info text-center">OUTPUT FORM</h6>
          <?php
          class bmiPasien {
            public $nama,
                   $berat,
                   $tinggi,
                   $umur,
                   $jenisKelamin;
                  
            public function hasilBMI() {
              return "<b>Nama : $this->nama   <br><br>
                      Berat Badan : $this->berat <br><br>                  
                      Tinggi Badan : $this->tinggi <br><br>
                      Umur : $this->umur <br><br>
                      Jenis Kelamin : $this->jenisKelamin</b>"; 
            }
            public function statusBMI() {

            }
          }
          if (isset($_GET["nama__lengkap"])) {
            $bmi = new bmiPasien;
            $bmi->nama = $_GET["nama__lengkap"];
            $bmi->berat = $_GET["berat__"];
            $bmi->tinggi = $_GET["tinggi__"];
            $bmi->umur = $_GET["umur__"];
            $bmi->jenisKelamin = $_GET["jenis__kelamin"];
            echo $bmi->hasilBMI();
          }
          ?>
          </div> <!--box-->
        </div> <!--col--->
      </div> <!--row--->
    

    
  </div> <!---container-->
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>
