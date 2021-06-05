<?php
require "koneksi.php";

function query_view($query_view) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query_view);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) 
    {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data_covid){
    global $koneksi;
    //ambil elemen data
	$kode_daerah = htmlspecialchars($data_covid["kode_daerah"]);
    $nama_daerah = htmlspecialchars($data_covid["nama_daerah"]);	
    $nominal = htmlspecialchars($data_covid["nominal"]);
    $nama_lengkap = htmlspecialchars($data_covid["nama_lengkap"]);
    $nomor_hp = htmlspecialchars($data_covid["nomor_hp"]);
    $email = htmlspecialchars($data_covid["email"]);
    $nama_bank = htmlspecialchars($data_covid["nama_bank"]);
    $nomor_rek = htmlspecialchars($data_covid["nomor_rek"]);

    //query
    $query = "INSERT INTO tb_pantauan
                VALUES
                ('','$kode_daerah','$jenis_daerah', '$nominal', '$nama_lengkap', '$nomor_hp', '$email', '$nama_bank', '$nomor_rek')
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id_number){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_pantauan WHERE id_number = $id_number");

    return mysqli_affected_rows($koneksi);
}

function update($data_covid){
    global $koneksi;
    //ambil elemen data
    $id_number = $data_covid["id"];
    $nama_daerah = htmlspecialchars($data_covid["nama_daerah"]);
	$kode_daerah = htmlspecialchars($data_covid["kode_daerah"]);
    $nominal = htmlspecialchars($data_covid["nominal"]);
    $nama_lengkap = htmlspecialchars($data_covid["nama_lengkap"]);
    $nomor_hp = htmlspecialchars($data_covid["nomor_hp"]);
    $email = htmlspecialchars($data_covid["email"]);
    $nama_bank = htmlspecialchars($data_covid["nama_bank"]);
    $nomor_rek = htmlspecialchars($data_covid["nomor_rek"]);

    //query
    $query = "UPDATE tb_pantauan SET
                nama_daerah = '$nama_daerah',
				kode_daerah = '$kode_daerah',
                nominal = '$nominal',
                nama_lengkap = '$nama_lengkap',
                nomor_hp = '$nomor_hp',
                email = '$email',
                nama_bank = '$nama_bank',
                nomor_rek = '$nomor_rek'
            WHERE id_number = $id_number
            ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

?>