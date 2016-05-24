<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'class/plugin/dompdf-master/autoload.inc.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$surat = new SuratMasuk();
$data = $surat->findSuratMasuk($_GET['id_surat']);
$nm_file = [];
if($data == null){

$html_head = '<!DOCTYPE html>';
$html_head .= '<html>';
$html_head .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
$html_head .= '<head>';
$html_head .= '<title>Cetak Disposisi</title>';
$html_head .= '<style type="text/css">body{font-family:  sans-serif;} .rght{float:right; padding:20px; font-size:20px; border:1px solid #000; background: #ccc; color: #000; text-transform: uppercase;} hr{ border-bottom: 5px double #000; } h2{ text-align: center; margin: 0px; text-transform: uppercase; font-weight: bold; } table.data{ border: 1px solid #000; width: 100%; border-collapse: collapse; margin-top: 20px; } table.data td{ border: 1px solid #000; } table.data th{ border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 5px double #000; } </style>';
$html_head .= '</head>';

}else{
foreach ($data as $key => $value) {
$nm_file[] = $value['no_agenda'];
$html_head = '<!DOCTYPE html>';
$html_head .= '<html>';
$html_head .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
$html_head .= '<head>';
$html_head .= '<title>Cetak Disposisi</title>';
$html_head .= '<style type="text/css">body{font-family:  sans-serif;} h2.rght{text-align:center; position:relative; width:15%; border:1px solid #000; float:right; padding:20px; font-size:25px; background:#ddd;} hr{ border-bottom: 5px double #000; } h2{ text-align: center; margin: 0px; text-transform: uppercase; font-weight: bold; } table.data{ border: 1px solid #000; width: 100%; border-collapse: collapse; margin-top: 20px; } table.data td{ border: 1px solid #000; } table.data th{ border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 5px double #000; } </style>';
$html_head .= '</head>';

$html_body = '<body>';
$html_body .= '<h2 class="rght">'.$value['sifat_surat'].'</h2>';
$html_body .= '<br><br><br><br>';
$html_body .= '<h2>Lembar Disposisi</h2>';
$html_body .= '<hr>';
$html_body .= '<table width="100%">';
$html_body .= '<tr>';
$html_body .= '<td valign="top" width="15%">No./Tgl Surat</td>';
$html_body .= '<td valign="top" width="1%">:</td>';
$html_body .= '<td valign="top">';
$html_body .= $value['no_agenda'].' / '.Lib::dateInd($value['tanggal_diterima'], true);
$html_body .= '</td>';
$html_body .= '</tr>';
$html_body .= '<tr>';
$html_body .= '<td valign="top">Asal Surat</td>';
$html_body .= '<td valign="top">:</td>';
$html_body .= '<td valign="top">';
$html_body .= $value['nama_pengirim']; //VALUE
$html_body .= '</td>';
$html_body .= '</tr>';
$html_body .= '<tr>';
$html_body .= '<td valign="top">Perihal</td>';
$html_body .= '<td valign="top">:</td>';
$html_body .= '<td valign="top">';
$html_body .= $value['perihal'];
$html_body .= '</td>';
$html_body .= '</tr>';
$html_body .= '<tr>';
$html_body .= '<td valign="top">Isi Ringkas</td>';
$html_body .= '<td valign="top">:</td>';
$html_body .= '<td valign="top">';
$html_body .= $value['isi_ringkas'];
$html_body .= '</td>';
$html_body .= '</tr>';
$html_body .= '</table>';
$html_body .= '<table class="data">';
$html_body .= '<tr>';
$html_body .= '<th>Instruksi / Informasi</th>';
$html_body .= '<th>Diteruskan Kepada</th>';
$html_body .= '<th>Paraf</th>';
$html_body .= '</tr>';
$html_body .= '<tr>';
$html_body .= '<td valign="top">';
$html_body .= $value['instruksi'];
$html_body .= '</td>';
$html_body .= '<td valign="top">';
$html_body .= '<ol>';
if(Lib::getListPenerima() == null){
}else{
foreach (Lib::getListPenerima() as $key2 => $value2) {
$zzz = (Lib::selectedPenerima($value['id_surat_masuk'], $value2['id_penerima']) == true) ? '<i style="font-family: DejaVu Sans, sans-serif; font-size:15px; color:red">✔</i>' : '';
$html_body .= '<li>'.$value2['nama'].' '.$zzz.'</li>';
}}
$html_body .= '</ol>';
$html_body .= '</td>';
$html_body .= '<td valign="top" width="100">';
if($value['paraf']){
$html_body .= '<img src="'.dirname(__DIR__).DIRECTORY_SEPARATOR.'public/paraf/'.Lib::getParafKalan($value['id_kalan']).'" width="150" height="120">';
}
$html_body .= '</td>';
$html_body .= '</tr>';
$html_body .= '</table>';

}

$html_body .= '</body>';
$html_body .= '</html>';
$html_body .= '';
}
$html = $html_head.$html_body;

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream(dirname(__DIR__).DIRECTORY_SEPARATOR.'public/asdf', ['Attachment' => 1]);
$pdf_name = (!empty($nm_file)) ? str_replace('/', '_', implode('', $nm_file)) : 'DSP_';
$pdf = $dompdf->output();
$file_location = dirname(__DIR__).DIRECTORY_SEPARATOR."public/lembar_disposisi/".$pdf_name.".pdf";
file_put_contents($file_location,$pdf); 
