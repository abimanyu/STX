<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     Module Active
*/

$module_active = [
	'DMCS' => 'dcms',
	'Costumer' => 'customer'
];

foreach ($module_active as $module) {
    include c_MODULE.$module."/menu-admin.php";
}
?>