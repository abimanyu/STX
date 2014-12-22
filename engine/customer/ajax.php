<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     ajax-customer
*/

@include ("../../l0t/render.php");
require_once(c_THEMES."function.php");

if($_GET['p'] == "add") {

	$sql -> db_Insert("customer", "'', '".$_POST['name']."', '".$_POST['corp']."', '".$_POST['telp']."', '".$_POST['email']."', '1', '".$_POST['alamat']."'	");
	$sql -> db_Select("customer", "*", "GROUP BY c_name");

	while($row = $sql-> db_Fetch()){
		echo "
		<tr>
			<td>".$row['c_name']."</td>
			<td>".$row['c_corp']."</td>
			<td>".$row['c_telp']."</td>
			<td>".$row['c_alamat']."</td>
			<td class=\"actions-hover actions-fade\">
				<a href=\"".c_SELF."?action=edit&id=".$row['CID']."\"><i class=\"fa fa-pencil\"></i></a>
				<a href=\"".c_SELF."?action=delete&id=".$row['CID']."\" class=\"delete-row\"><i class=\"fa fa-trash-o\"></i></a>
			</td>
		</tr>";
	}
}
?>
