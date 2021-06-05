<?php
include "../template/adm_nav.php";
require "../functions/function_covid.php";

//ambil data url
$id = $_GET["id"];

//data zakat berdasarkan ID
$data_zakat = query_view("SELECT * FROM tb_pantauan WHERE id_number = $id")[0];

//cek tombol submit ditekan/belum
if(isset($_POST["submit"])){
    
    //cek berhasil / tidak update data
    if(update($_POST) > 0 ) {
        echo "
            <script>
                alert('data BERHASIL diupdate');
                document.location.href = '../admin/adm_covid.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('data GAGAL diupdate');
                document.location.href = '../admin/adm_covid.php';
            </script>
        ";
    }
}
?>

<div class="container">
<div class="panel panel-default">
<div class="panel-heading">
    <h3>Update Data</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" action="" method="post">
    <div class="row">
    <div class="col-lg-6">
        <input type="hidden" name="id" value="<?php echo( $data_covid["id_number"]);?>">
        
        <div class="form-group">
            <label class="control-label col-sm-4" for="positif_covid">Jumlah Positif :</label>
            <div class="col-sm-8">
                <input type="text" id="positif_covid" name="positif_covid" class="form-control" required value="<?php echo( $data_covid['$positif_covid']);?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="dirawat">Jumlah Dirawat :</label>
            <div class="col-sm-8">
                <input type="array" class="form-control" name="dirawat" id="dirawat" required value="<?php echo( $data_covid["$dirawatdirawat"]);?>">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
		 <div class="form-group">
            <label class="control-label col-sm-4" for="sembuh">Jumlah Sembuh :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="sembuh" id="sembuh" required value="<?php echo( $data_covid["sembuh"]);?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="meninggal">Jumlah Meninggal :</label>
            <div class="col-sm-8">
                <input type="text" id="meninggal" name="meninggal" class="form-control" required value="<?php echo $data_covid['meninggal'];?>">
            </div>
        </div>
        <hr>
    </div> <!-- col -->
    </div> <!-- row -->
    <hr>
    <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
    <a href="../admin/adm_covid.php" class="btn btn-danger">Batal</a>
</form>
</div> <!--container-->
