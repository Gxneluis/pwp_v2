<?php
require_once 'FPDF/fpdf.php';
require_once 'includes/config.php';
$db=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
/* $key=$_POST["key"];
$ObjCode=$_POST["ObjCode"]; */
class PDF extends FPDF{
	function Header(){
		$this->Image('includes/signature/qpmiLogoPng.PNG',85,4,60);
			
		$this->ln();
		$this->Cell(0,5,'',0,0,'C');
		$this->ln();
		$this->Cell(0,5,'',0,0,'C');

		if($this->PageNo()==1)
		{
			$this->SetFont('Arial','',15);

			// $this->SetFillColor(242,242,242);
			$this->SetFillColor(242,242,242);
			$this->ln();
			$this->ln();
			$this->Cell(0,6,'PROJECT WORK PLAN',1,0,'C',true);
			$this->ln();
		}
		else {
			$this->Cell(0,6,'',0,0,'C');
			$this->Ln();
		}
	}
		
	function head(){}
		
	function headerTable(){

		$this->Cell(0,2,'',0,0,'C');
		$this->Ln();
		$this->Ln();

		//First Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'DATE OF PWP:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$_SESSION["PWPDate"],0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'PWP SERIES NO.:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$_SESSION["PWPSeries"],0,0,'L');
		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$this->Line(205.8, $start_x + 4, 149.9, $start_x + 4);
		$this->Ln();
		$this->SetFont('Arial','I',7);
		$this->Cell(139.9,3,'',0,0,'L');
		$this->Cell(55.9,3,'(For Marketing Admin Only)',0,0,'C');
		$this->Ln();

		//Second Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'NAME OF ACCOUNT:',0,0,'L');
		$this->SetFont('Arial','',8);
		$cell_width =55.9;  //define cell width
		$cell_height=5;    //define cell height
		//$this->MultiCell($cell_width,$cell_height,'LTS RETAIL SPECIALISTS, INC. (NCCC)',0);
		$this->Cell(55.9,5,$_SESSION["AccountName"],0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'COST CENTER:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$_SESSION["CostCenter"],0,0,'L');
		//$this->Ln();
		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$this->Line(205.8, $start_x + 4, 149.9, $start_x + 4);
		$this->Ln();	
		$this->Cell(139.9,3,'',0,0,'L');
		$this->SetFont('Arial','I',7);
		$this->Cell(55.9,3,'(For Marketing Admin or Accounting Only)',0,0,'C');
		$this->Ln();

		//THird Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'CHANNEL CLASS:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$_SESSION["ChannelClass"],0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,'',0,0,'L');
		//$this->Ln();
		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$this->Line(205.8, $start_x + 4, 149.9, $start_x + 4);
		$this->Cell(139.9,4,'',0,0,'L');
		$this->SetFont('Arial','I',9);
		$this->Cell(55.9,4,'',0,0,'C');
		$this->Ln();

		//Fourth Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'BRANCH/AREA:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$iterritory,0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'PROMO DURATION:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,'',0,0,'L');
		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$this->Cell(139.9,4,'',0,0,'L');
		$this->SetFont('Arial','I',9);
		$this->Cell(55.9,4,'',0,0,'C');
		$this->Ln();

		//Ffth Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'ACTIVITY TYPE:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$_SESSION["ActivityType"],0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(15.5,5,'From:',0,0,'C');
		$this->SetFont('Arial','',9);
		$this->Cell(32.95,5,$_SESSION["PromoFrom"],0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(15.5,5,'To:',0,0,'C');
		$this->SetFont('Arial','',9);
		$this->Cell(32.95,5,$_SESSION["PromoTo"],0,0,'L');	

		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$this->Line(157, $start_x + 4, 123.9, $start_x + 4);			
		$this->Line(205.8, $start_x + 4, 173, $start_x + 4);		
		
		$this->Cell(139.9,4,'',0,0,'L');
		$this->SetFont('Arial','I',9);
		$this->Cell(55.9,4,'',0,0,'C');
		$this->Ln();			
		$this->Ln();
			
		//Sixth Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'2021 Target',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,number_format($_SESSION["2021Target"],2),0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(61.9,5,'POST PROMO EVALUATION DEADLINE:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(35,5,$_SESSION["PostPromoEval"],0,0,'C');
		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$start_x=$this->Gety();
		$this->Line(173, $start_x + 4, 205.9, $start_x + 4);
		$this->Cell(139.9,4,'',0,0,'L');
		$this->SetFont('Arial','I',9);
		$this->Cell(55.9,4,'',0,0,'C');
		$this->Ln();			

		//7th Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'TRADE DISCOUNT:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$_SESSION["TradeDisc"],0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'YTD 2021 SALES:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,number_format($_SESSION["YTD2021"],2),0,0,'L');

		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$start_x=$this->Gety();
		$this->Line(205.8, $start_x + 4, 149.9, $start_x + 4);			
		$this->Cell(139.9,4,'',0,0,'L');
		$this->SetFont('Arial','I',9);
		$this->Cell(55.9,4,'',0,0,'C');
		$this->Ln();

		//8th Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'DA (IF APPLICABLE):',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,$_SESSION["DA"],0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'YTD 2022 SALES:',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,number_format($_SESSION["YTD2022"],2),0,0,'L');

		$start_x=$this->Gety();
		$this->Line(50, $start_x + 4, 256-150, $start_x + 4);
		$start_x=$this->Gety();
		$this->Line(205.8, $start_x + 4, 149.9, $start_x + 4);
		$this->Cell(139.9,4,'',0,0,'L');
		$this->SetFont('Arial','I',9);
		$this->Cell(55.9,4,'',0,0,'C');
		$this->Ln();

		//9th Row
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(55.9,5,'',0,0,'L');
		$this->Cell(2,5,'',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(41,5,'VARIANCE (PESO VALUE):',0,0,'L');
		$this->SetFont('Arial','',9);
		$this->Cell(38,5,$_SESSION["Variance"],0,0,'C');
		$start_x=$this->Gety();
		$this->Line(185.8, $start_x + 4, 153, $start_x + 4);
		$this->Line(195, $start_x + 4, 206, $start_x + 4);
		$this->Cell(5,4,'%',0,0,'L');
		$this->SetFont('Arial','I',9);
		$this->Cell(13,4,$_SESSION["Prcntge"],0,0,'C');
		$this->Ln();
		$this->Ln();
	}
	function viewTable($db){
		$start_x=$this->GetX(); //initial x (start of column position)

		$cell_width = 154.8;  //define cell width
		$cell_height=4;    //define cell height
		$current_y = $this->GetY();
		$current_x = $this->GetX();

		$this->SetFont('Arial','B',11);
		$this->MultiCell(($cell_width-115.8),$cell_height,'PROJECT BACKGROUND:',0);		
		$this->SetXY($current_x + ($cell_width-115.8),$current_y);
		$this->SetFont('Arial','',9);
		$this->MultiCell($cell_width,$cell_height,$_SESSION["Background"],1); //print one cell value
		$this->Ln();
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$this->SetFont('Arial','B',11);
		$this->MultiCell(($cell_width-115.8),$cell_height,'PROMO TITLE:',0);
		$this->SetXY($current_x + ($cell_width-115.8),$current_y);
		$this->SetFont('Arial','',9);
		$this->MultiCell($cell_width,$cell_height,$_SESSION["Promotitle"],1); //print one cell value
		$this->Ln();
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$query_Objectives='';
		$getPWPObjectives="SELECT * FROM `OPWP` left join `OBJT` on `OBJT`.`DocId`= `OPWP`.`DocId` and `OBJT`.`Document`= `OPWP`.`Document`
			where `OPWP`.`DocId` ='".$_SESSION["key"]."' and `OPWP`.`Document`='".$_SESSION["ObjCode"]."'";
		$rgetPWPObjectives=mysqli_query($db, $getPWPObjectives);
		if(mysqli_num_rows($rgetPWPObjectives)>0) {
			while($rPWPObj = mysqli_fetch_array($rgetPWPObjectives)) {
				$query_Objectives.=($rPWPObj["LineNum"]+1). ". ".  $rPWPObj["Objectives"]."\n";
			}

		}
/* 
		$query_Objectives='';
		for($count = 0; $count<count($txtObjectives); $count++) {
			$txtObjectives_clean = mysqli_real_escape_string($db, $txtObjectives[$count]);
			if($txtObjectives_clean!= '' ) {
				$query_Objectives .= $txtObjectives_clean."\n";
			}
		}
*/

		$this->SetFont('Arial','B',11);
		$this->MultiCell(($cell_width-115.8),$cell_height,'OBJECTIVE:',0);
		$this->SetXY($current_x + ($cell_width-115.8),$current_y);
		$this->SetFont('Arial','',9);
		$this->MultiCell($cell_width,$cell_height,$query_Objectives,1); //print one cell value
		$this->Ln();
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$query_Mechanics='';
		$getPWPDetails2="SELECT * FROM `OPWP` left join `PWP2` on `PWP2`.`DocId`= `OPWP`.`DocId` and `PWP2`.`Document`= `OPWP`.`Document` where `OPWP`.`DocId` ='".$_SESSION["key"]."' and `OPWP`.`Document`='".$_SESSION["ObjCode"]."'";
		$rgetPWPDetails2=mysqli_query($db, $getPWPDetails2);
		if(mysqli_num_rows($rgetPWPDetails2)>0) {
			while($rPWP2 = mysqli_fetch_array($rgetPWPDetails2)) {
				$query_Mechanics .=($rPWP2["LineNum"]+1). ". ".  $rPWP2["Mechanics"]."\n";	
			}
		}

		$this->SetFont('Arial','B',11);
		$this->MultiCell(($cell_width-115.8),$cell_height,'MECHANICS:',0);
		$this->SetXY($current_x + ($cell_width-115.8),$current_y);
		$this->SetFont('Arial','',9);
		$this->MultiCell($cell_width,$cell_height,$query_Mechanics,1); //print one cell value
		$this->Ln();
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$this->SetFont('Arial','B',11);
		$this->MultiCell(($cell_width-115.8),$cell_height,'CONCESSION:',0);
		$this->SetXY($current_x + ($cell_width-115.8),$current_y);
		$this->SetFont('Arial','',9);
		$this->MultiCell($cell_width,$cell_height,$_SESSION["Concession"],1); //print one cell value
		$this->Ln();
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$this->SetFont('Arial','B',11);
		$this->MultiCell(($cell_width),$cell_height,'PROJECTED VOLUME ANALYSIS:',0);
		$current_y = $this->GetY();
		$current_x = $this->GetX();			
		$this->SetFillColor(217,217,217);
		$this->SetFont('Arial','B',11);
		$this->MultiCell(48,12,'CATEGORY / BRAND',1,'C',true);
		$this->SetXY($current_x + 48,$current_y);
		$this->SetFont('Arial','B',10);
		$this->MultiCell(50,$cell_height,"AVERAGE MONTHLY SALES \n (PAST 6 MONTHS) ",1,'C',true);
		$this->SetXY($current_x +48,$current_y+8);
		$this->MultiCell(18,$cell_height,"In Cases",1,'C',true);//print one cell value
		$this->SetXY($current_x + 66,$current_y+8);
		$this->MultiCell(32,$cell_height,"Peso Value",1,'C',true);//print one cell value
		$this->SetXY($current_x + 98,$current_y);
		$this->SetFont('Arial','B',10);
		$this->MultiCell(48,8,"INCREMENTAL",1,'C',true);
		$this->SetXY($current_x +98,$current_y+8);
		$this->MultiCell(17,$cell_height,"In Cases",1,'C',true);//print one cell value
		$this->SetXY($current_x + 115,$current_y+8);
		$this->MultiCell(31,$cell_height,"Peso Value",1,'C',true);//print one cell value		
		$this->SetXY($current_x + 146,$current_y);
		$this->SetFont('Arial','B',10);
		$this->MultiCell(48,$cell_height,"PROJECTED VOLUME\n(Average + Incremental)",1,'C',true);
		$this->SetXY($current_x +146,$current_y+8);
		$this->MultiCell(17,$cell_height,"In Cases",1,'C',true);//print one cell value
		$this->SetXY($current_x + 163,$current_y+8);
		$this->MultiCell(31,$cell_height,"Peso Value",1,'C',true);//print one cell value */
		$H = $this->GetY();
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$txtSKUS=array();
		$txtAMSInCase=array();
		$txtAMSPeso=array();
		$txtTargetInCase=array();
		$txtTargetPeso=array();
		$txtProjectedInCase=array();
		$txtProjectedPeso=array();
		$getPWPDetails3="SELECT * FROM `OPWP` left join `PWP3` on `PWP3`.`DocId`= `OPWP`.`DocId` and `PWP3`.`Document`= `OPWP`.`Document` where `OPWP`.`DocId` ='".$_SESSION["key"]."' and `OPWP`.`Document`='".$_SESSION["ObjCode"]."'";
		$rgetPWPDetails3=mysqli_query($db, $getPWPDetails3);
		if(mysqli_num_rows($rgetPWPDetails3)>0) {
			while($rPWP3 = mysqli_fetch_array($rgetPWPDetails3)) {
				$txtSKUS[]=$rPWP3["ItemCode"];
				$txtAMSInCase[]=$rPWP3["AMSInCase"];
				$txtAMSPeso[]=$rPWP3["AMSPeso"];
				$txtTargetInCase[]=$rPWP3["TSInCase"];
				$txtTargetPeso[]=$rPWP3["TSPeso"];
				$txtProjectedInCase[]=$rPWP3["PVInCase"];
				$txtProjectedPeso[]=$rPWP3["PVPeso"];
			}
		}

		$TotalAMSInCase=0;
		$TotalAMSPeso=0;
		$TotalTargetInCase=0;
		$TotalTargetPeso=0;
		$TotalProjectedInCase=0;
		$TotalProjectedPeso=0;
		$height= $H-$current_y;
		for($count = 0; $count<count($txtTargetPeso); $count++) {
			$txtSKUS_clean 		= mysqli_real_escape_string($db, $txtSKUS[$count]);
			$txtAMSInCase_clean     = mysqli_real_escape_string($db, $txtAMSInCase[$count]);
			$txtAMSPeso_clean     = mysqli_real_escape_string($db, $txtAMSPeso[$count]);
			$txtTargetInCase_clean     = mysqli_real_escape_string($db, $txtTargetInCase[$count]);
			$txtTargetPeso_clean     = mysqli_real_escape_string($db, $txtTargetPeso[$count]);
			$txtProjectedInCase_clean     = mysqli_real_escape_string($db, $txtProjectedInCase[$count]);
			$txtProjectedPeso_clean     = mysqli_real_escape_string($db, $txtProjectedPeso[$count]);
			$this->SetXY($current_x,$current_y);
			$this->SetFont('Arial','',9);
			$this->MultiCell(48,4,$txtSKUS_clean,1,'C');
			$H = $this->GetY();
			$height= $H-$current_y;
			$this->SetXY($current_x +48,$current_y);
			$this->MultiCell(18,$height,number_format($txtAMSInCase_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x + 66,$current_y);
			$this->MultiCell(32,$height,number_format($txtAMSPeso_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x +98,$current_y);
			$this->MultiCell(17,$height,number_format($txtTargetInCase_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x + 115,$current_y);
			$this->MultiCell(31,$height,number_format($txtTargetPeso_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x +146,$current_y);
			$this->MultiCell(17,$height,number_format($txtProjectedInCase_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x + 163,$current_y);
			$this->MultiCell(31,$height,number_format($txtProjectedPeso_clean,2),1,'C');//print one cell value */
			$current_y = $this->GetY();
			$current_x = $this->GetX();
			$TotalAMSInCase = $TotalAMSInCase + $txtAMSInCase_clean;
			$TotalAMSPeso= $TotalAMSPeso+ $txtAMSPeso_clean;
			$TotalTargetInCase= $TotalTargetInCase+ $txtTargetInCase_clean;
			$TotalTargetPeso= $TotalTargetPeso+ $txtTargetPeso_clean;
			$TotalProjectedInCase= $TotalProjectedInCase+ $txtProjectedInCase_clean;
			$TotalProjectedPeso=$TotalProjectedPeso+ $txtProjectedPeso_clean;
		}
		if($TotalAMSInCase==0) {
			$TotalAMSInCase='';
		}
		if($TotalAMSPeso==0) {
			$TotalAMSPeso='';
		}
		if($TotalTargetInCase==0) {
			$TotalTargetInCase='';
		}
		if($TotalTargetPeso==0) {
			$TotalTargetPeso='';
		}
		if($TotalProjectedInCase==0){
			$TotalProjectedInCase='';
		}
		if($TotalProjectedPeso==0){
			$TotalProjectedPeso='';
		}

		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$this->SetFont('Arial','B',10);
		$this->MultiCell(48,4,'TOTAL',1,'C',true);
		$this->SetXY($current_x +48,$current_y);
		$this->MultiCell(18,$cell_height,number_format($TotalAMSInCase,2),1,'C',true);//print one cell value
		$this->SetXY($current_x + 66,$current_y);
		$this->MultiCell(32,$cell_height,number_format($TotalAMSPeso,2),1,'C',true);//print one cell value
		$this->SetXY($current_x +98,$current_y);
		$this->MultiCell(17,$cell_height,number_format($TotalTargetInCase,2),1,'C',true);//print one cell value
		$this->SetXY($current_x + 115,$current_y);
		$this->MultiCell(31,$cell_height,number_format($TotalTargetPeso,2),1,'C',true);//print one cell value
		$this->SetXY($current_x +146,$current_y);
		$this->MultiCell(17,$cell_height,number_format($TotalProjectedInCase,2),1,'C',true);//print one cell value
		$this->SetXY($current_x + 163,$current_y);
		$this->MultiCell(31,$cell_height,number_format($TotalProjectedPeso,2),1,'C',true);//print one cell value */
		$this->ln();
		$this->Cell(0,5,'PROMO COST ESTIMATES',0,0,'C',true);
		$this->ln();
		$this->SetFillColor(242,242,242);
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$this->SetFont('Arial','B',9);
		$this->MultiCell(40,8,'ITEMS DESCRIPTION',1,'C',true);
		$this->SetXY($current_x +40,$current_y);
		$this->MultiCell(14,8,"QTY",1,'C',true);//print one cell value
		$this->SetXY($current_x + 54,$current_y);
		$this->MultiCell(24,8,"UNIT COST",1,'C',true);//print one cell value
		$this->SetXY($current_x +78,$current_y);
		$this->MultiCell(20,$cell_height,"TOTAL AMOUNT",1,'C',true);//print one cell value
		$this->SetXY($current_x +98,$current_y);
		$this->MultiCell(40,8,'EXPENSE DESCRIPTION',1,'C',true);
		$this->SetXY($current_x +138,$current_y);
		$this->MultiCell(14,8,"QTY",1,'C',true);//print one cell value
		$this->SetXY($current_x + 152,$current_y);
		$this->MultiCell(24,8,"UNIT COST",1,'C',true);//print one cell value
		$this->SetXY($current_x +176,$current_y);
		$this->MultiCell(19.5,$cell_height,"TOTAL AMOUNT",1,'C',true);//print one cell value
		$txtPC_Desc=array();
		$txtPC_Qty=array();
		$txtPC_UnitCost=array();
		$txtPC_TotalCost=array();
		$txtPC_ExpsDesc=array();
		$txtPC_ExpQTY=array();
		$txtPC_ExpUnitCost=array();
		$txtPC_ExpTotalCost=array();
		$getPWPDetails4="SELECT * FROM `OPWP` left join `PWP4` on `PWP4`.`DocId`= `OPWP`.`DocId` and `PWP4`.`Document`= `OPWP`.`Document` where `OPWP`.`DocId` ='".$_SESSION["key"]."' and `OPWP`.`Document`='".$_SESSION["ObjCode"]."'";
		$rgetPWPDetails4=mysqli_query($db, $getPWPDetails4);
		if(mysqli_num_rows($rgetPWPDetails4)>0) {
			while($rPWP4= mysqli_fetch_array($rgetPWPDetails4)) {
				$txtPC_Desc[]=$rPWP4["ItemCode"];
				$txtPC_Qty[]=$rPWP4["PCQty"];
				$txtPC_UnitCost[]=$rPWP4["PCUnitCost"];
				$txtPC_TotalCost[]=$rPWP4["PCTotalCost"];
				$txtPC_ExpsDesc[]=$rPWP4["ExpenseDesc"];
				$txtPC_ExpQTY[]=$rPWP4["PCEQty"];
				$txtPC_ExpUnitCost[]=$rPWP4["PCEUnitCode"];
				$txtPC_ExpTotalCost[]=$rPWP4["PCETotalCost"];
			}
		}

		$TotalPC_Qty=0;
		$TotalPC_UnitCost=0;
		$TotalPC_TotalCost=0;
		$TotalPC_ExpQTY=0;
		$TotalPC_ExpUnitCost=0;
		$TotalPC_ExpTotalCost=0;
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		$this->SetFont('Arial','',9);
		for($count = 0; $count<count($txtPC_TotalCost); $count++) {
			$txtPC_Desc_clean = mysqli_real_escape_string($db, $txtPC_Desc[$count]);
			$txtPC_Qty_clean = mysqli_real_escape_string($db, $txtPC_Qty[$count]);
			$txtPC_UnitCost_clean = mysqli_real_escape_string($db, $txtPC_UnitCost[$count]);
			$txtPC_TotalCost_clean = mysqli_real_escape_string($db, $txtPC_TotalCost[$count]);
			$txtPC_ExpsDesc_clean = mysqli_real_escape_string($db, $txtPC_ExpsDesc[$count]);
			$txtPC_ExpQTY_clean = mysqli_real_escape_string($db, $txtPC_ExpQTY[$count]);
			$txtPC_ExpUnitCost_clean = mysqli_real_escape_string($db, $txtPC_ExpUnitCost[$count]);
			$txtPC_ExpTotalCost_clean = mysqli_real_escape_string($db, $txtPC_ExpTotalCost[$count]);
			$this->MultiCell(40,4,$txtPC_Desc_clean,1,'C');
			$H = $this->GetY();
			$height = $H-$current_y;
			$this->SetXY($current_x +40,$current_y);
			$this->MultiCell(14,$height,number_format($txtPC_Qty_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x + 54,$current_y);
			$this->MultiCell(24,$height,number_format($txtPC_UnitCost_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x +78,$current_y);
			$this->MultiCell(20,$height,number_format($txtPC_TotalCost_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x +98,$current_y);
			$this->MultiCell(40,$height,$txtPC_ExpsDesc_clean,1,'C');
			$this->SetXY($current_x +138,$current_y);
			$this->MultiCell(14,( $height),number_format($txtPC_ExpQTY_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x + 152,$current_y);
			$this->MultiCell(24,$height,number_format($txtPC_ExpUnitCost_clean,2),1,'C');//print one cell value
			$this->SetXY($current_x +176,$current_y);
			$this->MultiCell(19.5,$height,number_format($txtPC_ExpTotalCost_clean,2),1,'C');//print one cell value
			$current_y = $this->GetY();
			$current_x = $this->GetX();
			$TotalPC_Qty = $TotalPC_Qty + $txtPC_Qty_clean;
			$TotalPC_UnitCost = $TotalPC_UnitCost + $txtPC_UnitCost_clean;
			$TotalPC_TotalCost = $TotalPC_TotalCost + $txtPC_TotalCost_clean;
			$TotalPC_ExpQTY = $TotalPC_ExpQTY + $txtPC_ExpQTY_clean;
			$TotalPC_ExpUnitCost = $TotalPC_ExpUnitCost + $txtPC_ExpUnitCost_clean;
			$TotalPC_ExpTotalCost = $TotalPC_ExpTotalCost + $txtPC_ExpTotalCost_clean;
		}
		if($TotalPC_Qty==0) {
			$TotalPC_Qty='';
		}
		if($TotalPC_UnitCost==0) {
			$TotalPC_UnitCost='';
		}
		if($TotalPC_TotalCost==0) {
			$TotalPC_TotalCost='';
		}
		if($TotalPC_ExpQTY==0) {
			$TotalPC_ExpQTY='';
		}
		if($TotalPC_ExpUnitCost==0) {
			$TotalPC_ExpUnitCost='';
		}
		if($TotalPC_ExpTotalCost==0) {
			$TotalPC_ExpTotalCost='';
		}
		$this->SetFont('Arial','B',9);
		//SUBTOTAL
		$this->MultiCell(40,4,'SUB-TOTAL',1,'C',true);
		$H = $this->GetY();
		$height= $H-$current_y;
		$this->SetXY($current_x +40,$current_y);
		$this->MultiCell(14,$height,number_format($TotalPC_Qty,2),1,'C',true);//print one cell value
		$this->SetXY($current_x + 54,$current_y);
		$this->MultiCell(24,$height,number_format($TotalPC_UnitCost,2),1,'C',true);//print one cell value
		$this->SetXY($current_x +78,$current_y);
		$this->MultiCell(20,$height,number_format($TotalPC_TotalCost,2),1,'C',true);//print one cell value
		$this->SetXY($current_x +98,$current_y);
		$this->MultiCell(40,$height,'SUB-TOTAL',1,'C',true);
		$this->SetXY($current_x +138,$current_y);
		$this->MultiCell(14,( $height),number_format($TotalPC_ExpQTY,2),1,'C',true);//print one cell value
		$this->SetXY($current_x + 152,$current_y);
		$this->MultiCell(24,$height,number_format($TotalPC_ExpUnitCost,2),1,'C',true);//print one cell value
		$this->SetXY($current_x +176,$current_y);
		$this->MultiCell(19.5,$height,number_format($TotalPC_ExpTotalCost,2),1,'C',true);//print one cell value
		$current_y = $this->GetY();
		$current_x = $this->GetX();
		//TOTAL PROJECT COST
		$this->ln();
		$this->SetFillColor(191,191,191);
		$this->Cell(40,8,'TOTAL PROJECT COST',1,0,'C',true);
		$this->Cell(38,8,number_format($_SESSION["TotProjCost"],2),1,0,'C',true);
	}
	const DPI = 300;
	const MM_IN_INCH = 25.4;
	const A4_HEIGHT = 297;
	const A4_WIDTH = 210;

	public function imageUniformToFill(string $imgPath, int $x = 0, int $y = 0, int $containerWidth = 210, int $containerHeight = 297, string $alignment = 'C') {
		list($width, $height) = $this->resizeToFit($imgPath, $containerWidth, $containerHeight);
		if ($alignment === 'R') {
			$this->Image($imgPath, $x+$containerWidth-$width, $y+($containerHeight-$height)/2, $width, $height);
		}
		else if ($alignment === 'B') {
			$this->Image($imgPath, $x, $y+$containerHeight-$height, $width, $height);
		}
		else if ($alignment === 'C') {
			$this->Image($imgPath, $x+($containerWidth-$width)/2, $y+($containerHeight-$height)/2, $width, $height);
		}
		else {
			$this->Image($imgPath, $x, $y, $width, $height);
		}
	}
	/**
	 * Convertit des pixels en mm
	 *
	 * @param integer $val
	 * @return integer
	 */
	protected function pixelsToMm(int $val) : int
	{
		return (int)(round($val * $this::MM_IN_INCH / $this::DPI));
	}

	/**
	 * Convertit des mm en pixels
	 *
	 * @param integer $val
	 * @return integer
	 */
	protected function mmToPixels(int $val) : int
	{
		return (int)(round($this::DPI * $val / $this::MM_IN_INCH));
	}

	/**
	 * Resize une image
	 *
	 * @param string $imgPath
	 * @param integer $maxWidth en mm
	 * @param integer $maxHeight en mm
	 * @return int[]
	 */
	protected function resizeToFit(string $imgPath, int $maxWidth = 210, int $maxHeight = 297) : array
	{
		list($width, $height) = getimagesize($imgPath);
		$widthScale = $this->mmtopixels($maxWidth) / $width;
		$heightScale = $this->mmToPixels($maxHeight) / $height;
		$scale = min($widthScale, $heightScale);
		return array(
				$this->pixelsToMM($scale * $width),
				$this->pixelsToMM($scale * $height)
		);
	}

	function footerTable(){
		$current_y = $this->GetY()-4;
		$current_x = $this->GetX();			
		$this->SetXY($current_x ,$current_y);
		$this->ln();
		$this->ln();
		$this->SetFillColor(255,255,0);
		$this->Cell(78,4,'TOTAL Cost to Sales Computation',1,0,'C',true);
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(74,4,'Recommending Approval: ',0,0,'L');
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(41,4,'Approved by:',0,0,'L');
		$this->Ln();
		//TOTAL PROJECT COST
		$this->SetFont('Arial','',9);
		$this->Cell(40,4,'Projected Sales',1,0,'L');
		$this->Cell(38,4,number_format($_SESSION["ProjectedSales"],2),1,0,'C');
		$this->Ln();
		$this->Cell(40,4,'Projected cost',1,0,'L');
		$this->Cell(38,4,number_format($_SESSION["ProjectedCost"],2),1,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$C2x=$this->GetX();
		$C2y=$this->GetY();
		$this->Cell(36,4,$_SESSION["checker2"],0,0,'C');			
		$this->Cell(2,4,'',0,0,'C');
		$C3x=$this->GetX();
		$C3y=$this->GetY();
		$this->Cell(36,4,$_SESSION["checker3"],0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$A1x=$this->GetX();
		$A1y=$this->GetY();
		$this->Cell(41,4,$_SESSION["Approver1"],0,0,'C');
		$this->Ln();
		$start_x=$this->Gety();			
		$this->Line(91, $start_x ,  127, $start_x );
		$this->Line(164, $start_x ,  130, $start_x );
		$this->Line(207, $start_x ,  170, $start_x );	
		$this->SetFont('Arial','B',9);
		$this->Cell(40,4,'Cost to Sales Ratio',1,0,'L');
		$this->Cell(38,4,$_SESSION["Ratio"],1,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(36,4,'BDD',0,0,'C');
		$this->Cell(2,4,'',0,0,'C');
		$this->Cell(36,4,'TMM',0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(41,4,'CFO',0,0,'C');
		$this->ln();
		$this->ln();
		$this->ln();
		$this->SetFont('Arial','',9);
		$this->Cell(119,4,'',0,0,'L');
		$this->Cell(36,4,'MARIBEL DACANAY',0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$A2x=$this->GetX();
		$A2y=$this->GetY();
		$this->Cell(41,4,$_SESSION["Approver2"],0,0,'C');
		$this->ln();
		$start_x=$this->Gety();
		$this->Line(164, $start_x ,  130, $start_x );
		$this->Line(207, $start_x ,  170, $start_x );
		$this->SetFont('Arial','',9);
		$this->Cell(40,4,'Prepared by:',0,0,'L');
		$this->Cell(38,4,'Reviewed by: ',0,0,'L');
		$this->SetFont('Arial','B',9);
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(36,4,'',0,0,'C');
		$this->Cell(2,4,'',0,0,'C');
		$this->Cell(36,4,'BCM',0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(41,4,'CAO',0,0,'C');
		$this->ln();
		$this->ln();
		$this->SetFont('Arial','',9);
		$Rx=$this->GetX();
		$Ry=$this->GetY();
		$this->Cell(40,4,$_SESSION["Requestor"],0,0,'C');
		$C1x=$this->GetX();
		$C1y=$this->GetY();
		$this->Cell(38,4,$_SESSION["checker1"],0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(36,4,'',0,0,'C');
		$this->Cell(2,4,'',0,0,'C');
		$this->Cell(36,4,'',0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$A3x=$this->GetX();
		$A3y=$this->GetY();
		$this->Cell(41,4,$_SESSION["Approver3"],0,0,'C');
		$this->ln();
		$start_x=$this->Gety();
		$this->Line(11, $start_x ,  48, $start_x );
		$this->Line(52, $start_x ,  85, $start_x );
		$this->Line(207, $start_x ,  170, $start_x );
		$this->SetFont('Arial','B',9);
		$this->Cell(40,4,'KAS / KAM / BDM ',0,0,'C');
		$this->Cell(38,4,'ASM / ASH ',0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(36,4,'',0,0,'C');
		$this->Cell(2,4,'',0,0,'C');
		$this->Cell(36,4,'',0,0,'C');
		$this->Cell(3,4,'',0,0,'C');
		$this->Cell(41,4,'CEO',0,0,'C');
		$this->ln();
		$this->imageUniformToFill('includes/signature/'.$_SESSION["RequestorID"].".png", $Rx,($Ry-10),40, 20, 'C');
		$this->imageUniformToFill('includes/signature/'.$_SESSION["checker1ID"],$C1x,($C1y-10),38, 20, 'C');
		$this->imageUniformToFill('includes/signature/'.$_SESSION["Approver1ID"],  $A1x,($A1y-10),41, 20, 'C');
		$this->imageUniformToFill('includes/signature/'.$_SESSION["Approver2ID"], $A2x,($A2y-10),41, 20, 'C');
		$this->imageUniformToFill('includes/signature/'.$_SESSION["Approver3ID"], $A3x,($A3y-10),41, 20, 'C');
		$this->imageUniformToFill('includes/signature/'.$_SESSION["checker2ID"], $C2x,($C2y-10),36, 20, 'C');
		$this->imageUniformToFill('includes/signature/'.$_SESSION["checker3ID"],$C3x,($C3y-10),36, 20, 'C');
		$this->ln();
	}
	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',11);
		$this->Cell(0,10,'Page '.$this->PageNo().' of {nb}',0,0,'R');
	}
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Legal',0);
$pdf->head();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->footerTable();
$path='includes/PWP/';
//$pdf->Output($path.'Test.pdf','I');
//$pdf->Output($path.$ObjCode. '_'.$key.'.pdf','D');
$pdf->Output($path.$ObjCode. '_'.$key.'.pdf','F');
$pdf->Output($path.$ObjCode. '_'.$key.'.pdf','D');
/* $pdf->Output($path.$ObjCode. '_'.$key.'.pdf','F');  */
//}
?>
