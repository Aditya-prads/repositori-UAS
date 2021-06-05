<?php
require "koneksi.php";
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from tb_pantauan");
$html = '<center><h3>Daftar pemantauan Covid 19</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
        <tr>
            	
              
                <th>Positif</th>
                <th>Dirawat</th>
                <th>Sembuh</th>
                <th>Meninggal</th>
           
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
      
        <td>".$row['positif_covid']."</td>
        <td>".$row['dirawat']."</td>
		<td>".$row['sembuh']."</td>
        <td>".$row['meninggal']."</td>
      
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_covid19.pdf');
?>