
<!DOCTYPE html>
<html>
<head>
	<title> Pendaftaran Beasiswa Fasilkom-TI</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>  
	<div class="container">
		<h1 class="text-center"> Pendaftaran Beasiswa Fasilkom-TI</h1>
			<h2 class="text-center"> Universitas Sumatera Utara</h2>

	<!-- form mahasiswa -->
<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    	Data Mahasiswa
	  </div>

 <div class="card-body">
    <form method="post" action="">
    	<div class="form-group">
    		<label>NIM</label>
    		<input type="text" name="tnim" class="form-control" placeholder="Nomor Induk Mahasiswa" required> 
    	</div>
    	<div class="form-group">
    		<label>Nama Lengkap</label>
    		<input type="text" name="tnama" class="form-control" placeholder="" required> 
    	</div>
    	<div class="form-group">
    		<label>Alamat</label>
    		<textarea class="form-control" name="talamat" class="form-control" placeholder="alamat sekarang"></textarea>
        </div>
            <div class="form-group">
               <label>Program Studi</label>
               <select class="form-control" name="tprodi">
                  <option></option>
                  <option value="SI-ILKOM">Ilmu Komputer</option>
                  <option value="SI-TI">Teknologi Informasi</option>
                        </select>
                    </div>
                </div>
  
            <div class="card-body">
             <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
			<button type="submit" class="btn btn-danger" name="breset">Reset</button>
         </div>
     </div>
    </form>
  </div>
</div>
<!-- form daftara -->
<div class="card mt-5">
  <div class="card-header bg-success text-white">
    	Daftar mahasiswa Yang Mendaftar
	  </div>
 <div class="card-body">
 		<table class="table table-bordered table-strip">
 			<tr>
	 			<th>No.</th>
	 			<th>NIM</th>
	 			<th>Nama Lengkap</th>
	 			<th>Program Studi</th>
	 			<th>edit/hapus</th>
	 		</tr>
	 			<td>
          <a href="home.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning">Edit</a>
          <a href="home.php?>hal=hapus&id=<?$data['id_mhs']?>" onclick="return confirm('apakah ingin menghapus data?')" class="btn btn-danger">Hapus</a>
        </td>
	 			</td>
	 		</tr>
 		</table>
</body>
</html>