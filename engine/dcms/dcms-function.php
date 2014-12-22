<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     DCMS_functions
*/

function GET_ID_KAIN( $search ){
    global $sql;
    $sql -> db_Select("DCMS_kain","KAIN_ID", "WHERE `kain` like '".$search."' LIMIT 1");
    $result = $sql -> db_Fetch();
    return $result[0];
}

function GET_ID_WARNA( $search ){
    global $sql;
    $sql -> db_Select("DCMS_warna","WARNA_ID", "WHERE `warna` like '".$search."' LIMIT 1");
    $result = $sql -> db_Fetch();
    return $result[0];
}

function GET_ID_STOCK( $type, $KAIN_ID="", $WARNA_ID="" ){
    global $sql;
    $sql -> db_Select("DCMS_stock","STOCK_ID", "WHERE `type`='".$type."' AND `KAIN_ID`='".$KAIN_ID."' AND `WARNA_ID`='".$WARNA_ID."' LIMIT 1");
    $result = $sql -> db_Fetch();
    return $result[0];
}

function UPDATE_STOCK( $STOCK_ID, $plus_roll="0", $plus_jar="0", $plus_kg="0" ){
    global $sql;
    $sql -> db_Select("DCMS_stock","roll, jar, kg", "WHERE `STOCK_ID`='".$STOCK_ID."' LIMIT 1");
    $result = $sql -> db_Fetch();
    $j_roll = $result['roll'] + $plus_roll;
    $j_jar = $result['jar'] + $plus_jar;
    $j_kg = $result['kg'] + $plus_kg;

    $sql -> db_Update("DCMS_stock", "`roll`='".$j_roll."', `jar`='".$j_jar."', `kg`='".$j_kg."' WHERE `STOCK_ID`='".$STOCK_ID."' ");
    return true;
}

function HANYA_ANGKA( $str ) {
    $a = array('Rp.',' ','.',',00');
    $b = array('','','','','');
    return str_replace($a, $b, $str);
}

function DISPLAY_CUSTOMER( $name="", $corp="" ) {
    if($name!="") {
    	$customer = $name;
    	if($corp!="") {$customer .= " - ".$corp;}
    } 
    else {
    	if($corp!="") {
    		$customer = $corp;
    	}
    }
    return $customer;
}

function NAV_STATUS($module, $sql_filter, $current=""){
    $confirm = "Confirmed"; 
    $cancel = "Cancel";

    if($module == "po") {
        $table = "DCMS_po G";
        $field = "PO_ID";
    }elseif($module == "sbg") {
        $table = "DCMS_sbg G";
        $field = "SBG_ID";
        $confirm = "Process";
    }
    
    $count_pending = GET_COUNT($table,$field, "WHERE ".$sql_filter." AND G.`status`='1'");
    $count_confirm = GET_COUNT($table,$field, "WHERE ".$sql_filter." AND G.`status`='2'");
    $count_cancel = GET_COUNT($table,$field, "WHERE ".$sql_filter." AND G.`status`='3'");
    $count_all = GET_COUNT($table,$field, "WHERE ".$sql_filter);
    $nav_aktif = " class='text-bold'";
    $on = "
    <p><a href=\"./front\"".(empty($current) ? $nav_aktif : "").">Semua</a> (".$count_all.") | 
    <a href=\"./front?s=2\"".($current == "2"? $nav_aktif : "").">".$confirm."</a> (".$count_confirm.") | 
    <a href=\"./front?s=1\"".($current == "1"? $nav_aktif : "").">Pending</a> (".$count_pending.") | 
    <a href=\"./front?s=3\"".($current == "3"? $nav_aktif : "").">".$cancel."</a> (".$count_cancel.")</p>
    ";
    return $on;
}
?>