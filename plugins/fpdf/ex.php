<?php
require('dblink/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'World populations',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','starwars');
mysql_select_db('ocsc_inv');

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
  $sql = "SELECT p.prod_name as name, p.prod_sku as sku, 
(SELECT c.cat_name FROM category c WHERE c.cat_id = p.prod_cat_id) as category, 
(SELECT s.sup_name FROM supplier s WHERE s.sup_id = p.prod_sup_id) as supplier, 
(SELECT co.co_name FROM company co WHERE co.co_id = p.prod_co_id) as company, 
p.prod_var as variant, pv.pv_price as price, pp.pp_qty as qty, (pv.pv_price*pp.pp_qty) as total
FROM product p, product_version pv, purchase_product pp, purchase_order po
WHERE (po.po_id = 'po1656b5296799811') 
AND (pp.pp_po_id = po.po_id) 
AND (pp.pp_prod_id = pv.pv_id) 
AND (pv.pv_prod_id = p.prod_id)
GROUP BY pp.pp_id  ";
$pdf->Table($sql);
$pdf->AddPage();
//Second table: specify 3 columns
/*$pdf->AddCol('rank',20,'','C');
$pdf->AddCol('name',40,'Country');
$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select name, format(pop,0) as pop, rank from country order by rank limit 0,10',$prop);*/
$pdf->Output();
?>
