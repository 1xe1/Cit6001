<?php
require('./fpdf/fpdf.php');
$pdf = new FPDF();

// เพิ่มฟ้อนต์ภาษาไทยเข้ามา ตัวธรรมดา โดยใช้ไฟล์ angsa.php
$pdf->AddFont('angsana', '', 'angsa.php');

// สร้างหน้าเอกสาร
$pdf->AddPage();

// กำหนดฟ้อนต์ที่จะใช้เป็น 'angsana' ขนาด 14
$pdf->SetFont('angsana', '', 14);

// พิมพ์ข้อความลงเอกสาร โดยแปลงเป็น cp874
$text = iconv('UTF-8', 'cp874', 'ข้อความ');
$pdf->Text(10, 10, $text);

// ส่งเอกสารออก
$pdf->Output();
?>
