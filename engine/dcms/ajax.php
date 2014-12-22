<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     ajax-DCMS
*/

@include ("../../l0t/render.php");
require_once(c_THEMES."function.php");

//jQuery UI AutoComplete customer
if(trim(strip_tags($_GET['ac'])) == "customer") {
	if (!empty($_GET['term'])) {
		$term = '%'.trim(strip_tags($_GET['term'])).'%';
		$sql -> db_Select("customer", "CID, c_name, c_corp, c_alamat", "WHERE `c_name` LIKE '".$term."' OR `c_corp` LIKE '".$term."' GROUP BY c_name LIMIT 10");
		while ($row = $sql-> db_Fetch()) {
			$item['CID']=(int)$row['CID'];
			$item['nama']=htmlentities(stripslashes($row['c_name']));
			$item['corp']=htmlentities(stripslashes($row['c_corp']));
			$item['alamat']=htmlentities(stripslashes($row['c_alamat']));
			$row_set[] = $item;
		}
		echo json_encode($row_set);
	}
}
//jQuery UI AutoComplete jenis kain
elseif(trim(strip_tags($_GET['ac'])) == "kain") {
	if (!empty($_GET['term'])) {
		$term = '%'.trim(strip_tags($_GET['term'])).'%';
		$sql -> db_Select("DCMS_kain", "kain", "WHERE `kain` LIKE '".$term."' GROUP BY kain LIMIT 10");
		while ($row = $sql-> db_Fetch()) {
			//$item['KAIN_ID']=(int)$row['KAIN_ID'];
			$item['kain']=htmlentities(stripslashes($row['kain']));
			$row_set[] = $item;
		}
		echo json_encode($row_set);
	}
}
//jQuery UI AutoComplete Warna
elseif(trim(strip_tags($_GET['ac'])) == "warna") {
	if (!empty($_GET['term'])) {
		$term = '%'.trim(strip_tags($_GET['term'])).'%';
		$sql -> db_Select("DCMS_warna", "warna", "WHERE `warna` LIKE '".$term."' GROUP BY warna LIMIT 10");
		while ($row = $sql-> db_Fetch()) {
			$item['warna']=htmlentities(stripslashes($row['warna']));
			$row_set[] = $item;
		}
		echo json_encode($row_set);
	}
}
//Corfirmed PO_ID
elseif(trim(strip_tags($_GET['ac'])) == "po_confirm") {
	if (!empty($_POST['po_id'])) {
		$po_id = trim(strip_tags($_POST['po_id']));
		$sql -> db_Update("DCMS_po", "`status`='2', `status_date`=NOW() WHERE `PO_ID`='".$po_id."' ");
		echo "<a class=\"btn btn-xs btn-success text-uppercase\" disabled><i class=\"fa fa-check\"></i> Confirmed</a> <small>&mdash;<cite>baru saja</cite></small>";
	}
}
//Cancel PO_ID
elseif(trim(strip_tags($_GET['ac'])) == "po_cancel") {
	if (!empty($_POST['po_id'])) {
		$po_id = trim(strip_tags($_POST['po_id']));
		$sql -> db_Update("DCMS_po", "`status`='3', `status_date`=NOW() WHERE `PO_ID`='".$po_id."' ");
		echo "<a class=\"btn btn-xs btn-default text-uppercase\" disabled><i class=\"fa fa-times\"></i> Decline</a> <small>&mdash;<cite>baru saja</cite></small>";
	}
}

//Corfirmed SBG_ID
elseif(trim(strip_tags($_GET['ac'])) == "sbg_confirm") {
	if (!empty($_POST['sbg_id'])) {
		$sbg_id = trim(strip_tags($_POST['sbg_id']));
		$sql -> db_Update("DCMS_sbg", "`status`='2', `status_date`=NOW() WHERE `SBG_ID`='".$sbg_id."' ");
		echo "<a class=\"btn btn-xs btn-success text-uppercase\" disabled><i class=\"fa fa-check\"></i> Process</a> <small>&mdash;<cite>baru saja</cite></small>";
	}
}
//Cancel SBG_ID
elseif(trim(strip_tags($_GET['ac'])) == "sbg_cancel") {
	if (!empty($_POST['sbg_id'])) {
		$sbg_id = trim(strip_tags($_POST['sbg_id']));
		$sql -> db_Update("DCMS_sbg", "`status`='3', `status_date`=NOW() WHERE `SBG_ID`='".$sbg_id."' ");
		echo "<a class=\"btn btn-xs btn-default text-uppercase\" disabled><i class=\"fa fa-times\"></i> Canceled</a> <small>&mdash;<cite>baru saja</cite></small>";
	}
}
?>