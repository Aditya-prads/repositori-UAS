<?php
require "../koneksi.php";
include "../template/adm_nav.php";
require "../functions/function_covid.php";
$zakat_view = query_view("SELECT * FROM tb_pantauan");
?>

<div class="container">
	<div class="table-responsive">
		<div style="text-align: center">
        <h3>Data COVID 19 <?php echo @$_GET['nama_daerah'];?></h3>
		<?php echo '<h3>'."Per " . date("d M Y H:i:s");
		?>
        <h5>Ahmad Sholikin | 181011401196 </h5>
		</div>
		<div class="row">
             <div class="col-md-12">
            	<div class="h-25">
             	</div>
             </div>
          </div>
        <hr>
        <div style="padding-bottom:25px">
			<div style="float: right">
        <a href="../adm_covid/tambah_covid.php" class="btn btn-primary" title="Tambah data Penyebaran covid"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>
        </div>
			</div>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
    <div class="form-group">
        <label for="sel1">Pilih Daerah:</label>
        <select class="form-control" name="covid" onchange='this.form.submit()'>
            <?php
            require "../koneksi.php";
            //Perintah sql untuk menampilkan semua data pada tabel
            $sql="select * from covid";

            $hasil=mysqli_query($koneksi,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            $ket="";
            if (isset($_GET['covid'])) {
                $covid = trim($_GET['covid']);

                if ($covid==$data['kode_daerah'])
                {
                    $ket="selected";
                }
            }
            ?>
            <option <?php echo $ket; ?> value="<?php echo $data['kode_daerah'];?>"><?php echo $data['nama_daerah'];?></option>
            <?php
	}
  ?>
        </select>
    </div>
    </form>
        <table class="table table-stripped table-hover datatabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Daerah</th>
                <th>Positif</th>
                <th>Dirawat</th>
                <th>Sembuh</th>
                <th>Meninggal</th>
                <th>Action</th>                         
            </tr>
        </thead>  
			<?php


        if (isset($_GET['covid'])) {
            $covid=trim($_GET['covid']);
            $sql="select * from tb_pantauan where kode_daerah='$covid' order by id_number asc";
        }else {
            $sql="select * from tb_pantauan order by id_number asc";
        }


        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;


            
            ?>
        <tbody>
        
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data["kode_daerah"]; ?></td>
                <td><?php echo $data["positif_covid"]; ?></td>
                <td><?php echo $data["dirawat"]; ?></td>
                <td><?php echo $data["sembuh"]; ?></td>
                <td><?php echo $data["meninggal"]; ?></td>
                <td>
                    <a href="../adm_covid/update_covid.php?id=<?php echo $data["id_number"]; ?>" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cog"></span> Update</a>
                    <a href="../adm_covid/hapus_covid.php?id=<?php echo $data["id_number"]; ?>" onclick="return confirm('Yakin MENGHAPUS data ?');" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
        </table>     
		<div style="padding-bottom:25px">
			<div style="float: right">
        <a href="../report.php" class="btn btn-primary" title="Tambah data covid 19"></span> Download</a>
        </div>
				</div>
    </div>
</div> <!--container-->