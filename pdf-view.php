<?php

class Database {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "lab_management";
	
	function runQuery($sql) {
		$conn = new mysqli($this->host,$this->user,$this->password,$this->database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $resultset[] = $row;
      }
    }
    $conn->close();

		if(!empty($resultset))
			return $resultset;
	}
}

	$labname = $_GET['l_name'];


$database = new Database();
$result = $database->runQuery("SELECT category_name,details_qty,indent_no,indent_date,book_value,working_qty,non_qty,details_remarks lab_name FROM items_details WHERE lab_name='$labname' ");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='lab_management' 
AND `TABLE_NAME`='items_details'
and `COLUMN_NAME` in ('category_name','details_qty','indent_no','indent_date','book_value','working_qty','non_qty','details_remarks')");

require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

if($result)
{
			foreach($header as $heading)
			 {
				foreach($heading as $column_heading)
				{
					$pdf->Cell(35,8,$column_heading,1);
				}
			}
			foreach($result as $row) {
				$pdf->Ln();
				foreach($row as $column)
					$pdf->Cell(35,8,$column,1);
				}

		$pdf->Output();
}
else
{
	echo "No Data Available ";
}



?>