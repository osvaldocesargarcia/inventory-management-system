<?php
$pdf = Yii::createComponent('application.extensions.MPDF52.mpdf');
$html='
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>Datos del área</b></td>
<tr>
<tr class="odd">
<td> <b>Id área</b> </td>
<td> '.$model->id_area.'</td>
</tr>
<tr class="even">
<td> <b>Nombre del área</b> </td>
<td> '.$model->nombre_area.'</td>
</tr>
<tr class="odd">
<td> <b>Cantidad de jefes</b> </td>
<td> '.$model->cant_jefes.'</td></tr>
</tr>
</table>';
//$header=$header.'<img src="'.Yii::app()->request->baseUrl.'/images/banner.png"/>';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
//$mpdf->SetHTMLHeader($header);
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|Áreas');
$mpdf->WriteHTML($html);
$mpdf->Output('Ficha-áreas.pdf','D');
exit;
?>
