<?php
include "../template/adm_nav.php";
require "../functions/function_covid.php";

//cek tombol submit ditekan/belum
if(isset($_POST["submit"])){
    
    //cek berhasil / tidak tambah data
    if(tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data BERHASIL ditambahkan');
                document.location.href = '../admin/adm_covid.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('data GAGAL ditambahkan');
                document.location.href = '../admin/adm_covid.php';
            </script>
        ";
    }

}
?>

<div class="container">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 align="center">Input Data Pantauan COVID 19</h3>
</div>
<div class="panel-body">
    <form class="form-horizontal" action="" method="post">
        <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama_daerah">Nama Daerah:</label>
                <div class="col-sm-8"><select id="nama_daerah" name="nama_daerah" class="form-control select2" style="width: 100%;">
                    <option value="-" selected="selected">---</option>
                    <option value="JAKARTA"> Jakarta</option>
                    <option value="DEPOK">Depok</option>
                    <option value="JOGJA">Jogja</option>
                </select>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-4" for="kode_daerah">Kode daerah:</label>
                <div class="col-sm-8"><select id="kode_daerah" name="kode_daerah" class="form-control select2" style="width: 100%;">
                    <option value="<?php echo $data_covid["kode_daerah"];?>" selected="selected">---</option>
                    <option value="JKT">JKT</option>
                    <option value="DPK">DPK</option>
                    <option value="DIY">DIY</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="positif_covid">Jumlah Positif :</label>
                <div class="col-sm-8">
                    <input id="positif_covid" name="positif_covid" class="form-control" required>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-4" for="dirawat">Jumlah Dirawat :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="dirawat" id="dirawat" required>
                </div>
            </div>            
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-sm-4" for="sembuh">Jumlah Sembuh :</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="sembuh" id="sembuh" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="meninggal">Jumlah Meninggal :</label>
                <div class="col-sm-8">
                    <input id="nama_bank" name="meninggal" class="form-control" required>
                </div>
            </div>
            </div>
        </div> <!-- col -->
        </div> <!-- row -->
        <hr>
        <button type="submit" name="submit" class="btn btn-primary">Register Data</button>
        <a href="../admin/adm_covid.php" class="btn btn-danger">Batal</a>
    </form>
</div>
</div> <!--container-->
