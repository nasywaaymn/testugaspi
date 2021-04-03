<?php

//database 

	$server   = "localhost";
	$user     = "root";
	$pass	  = "";
	$database = "tugass";
	$koneksi  = mysqli_connect($server, $user , $pass , $database)or die(mysqli_error($koneksi));

	//butoon untuk save

	if(isset($_POST['bsimpan']))
	{
		//untuk data diedit atau disimpan yang baru geng

		if($_GET['hal'] == "edit")
		{
			//untuk edit

			$edit  = mysqli_query($koneksi, "UPDATE tmhs set 
											nim = '$_POST[tnim]',
											nama = '$_POST[tnama]',
											alamat = '$_POST[talamat]',
											prodi  = '$_POST[tprodi]'WHERE id_mhs = '$_GET[id]'
										   ");

		
		if($edit)
		{
			echo "<script>
					alert('Edit Berhasil');
					document.location='home.php';
				</script>";
		}
		else 
		{
			echo "<script>
					alert('Edit Gagal');
					document.location='home.php';
				</script>";
		}

		}else
		{
		}

			//untuk penyimpanan baru

		$simpan  = mysqli_query($koneksi, "INSERT INTO tmhs (nim , nama, alamat, prodi)
										   VALUES ('$_POST[tnim]' , '$_POST[tnama]' , '$_POST[talamat]' , '$_POST[tprodi]')
										   ");

		//keterangan penyimpanan
		if($simpan)
		{
			echo "<script>
					alert('Pendaftaran Berhasil');
					document.location='home.php';
				</script>";
		}
		else 
		{
			echo "<script>
					alert('Pendaftaran Gagal');
					document.location='home.php';
				</script>";
		}
		
	}

    //nguji si button aksi la geng
    if(isset($_GET['hal']))
    {
        //menampilkan sidata yg diedit
        if($_GET['hal'] == "edit")
        {
            $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //misalnya nih dapet datanya terus nanti datanya ada di variabel
             $vnim = $data['nim']; //vnim itu variabel nim ya wakgeng
             $vnama = $data['nama'];
             $valamat = $data ['alamat'];
             $vprodi = $data ['prodi'];
            }
        }
        else if($_GET['hal'] == "hapus")
        {
        	//untuk menghapus data
        	$hapus =mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]");
        	if($hapus) 
        	{
        		echo "<script>
					alert('Data berhasil dihapus');
					document.location='home.php';
				</script>";
        	}
        }
    }
?>


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
    		<input type="text" name="tnim" value="<?=@$vnim?>" class="form-control" placeholder="Nomor Induk Mahasiswa" required> 
    	</div>
    	<div class="form-group">
    		<label>Nama Lengkap</label>
    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="" required> 
    	</div>
    	<div class="form-group">
    		<label>Alamat</label>
    		<textarea class="form-control" name="talamat" class="form-control" placeholder="alamat sekarang"><?=@$valamat?></textarea>
        </div>
            <div class="form-group">
               <label>Program Studi</label>
               <select class="form-control" name="tprodi">
                  <option value="<?=@$vprodi?>"><?=@$vprodi?></option>
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

	 		<?php
	 		 $no = 1;
	 		 $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
	 		while($data = mysqli_fetch_array($tampil)) : 

	 		 ?>

	 		<tr>
	 			<td><?=$no++;?></td>
	 			<td><?=$data['nim']?></td>
	 			<td><?=$data['nama']?></td>
	 			<td><?=$data['prodi']?></td>
	 			<td>
	 				<a href="home.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning">Edit</a>
	 				<a href="home.php?>hal=hapus&id=<?$data['id_mhs']?>" onclick="return confirm('apakah ingin menghapus data?')" class="btn btn-danger">Hapus</a>
	 			</td>
	 		</tr>
 <?php endwhile; ?>

 		</table>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
</body>
</body>
</html>