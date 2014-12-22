<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     category pages
*/

@include ("../../../l0t/render.php");

/**
	Load Component
*/
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, 
				pnotify.custom.css, select2.css, datatables.css, 
				theme.css, default.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				pnotify.custom.js, jquery.maskedinput.js, select2.js, jquery.dataTables.js, datatables.js, 
				theme.js, theme.init.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('html').addClass('sidebar-left-collapsed');
	$('nav li.nav2').addClass('nav-expanded nav-active');
	$('nav li.bj').addClass('nav-active');
});
</script>
<script src=\"../datatables.js\"></script>
<script src=\"custom.js\"></script>
";
/**

*/
$START = (!empty($_POST['start']) ? date("Y-m-d", strtotime($_POST['start'])) : date("Y-m-d") );
$END = date("Y-m-d", strtotime($_POST['end']));

$DISPLAY = ( $END!="1970-01-01" ? 
	"Antara tanggal (".date("d M, Y", strtotime($START)).") s/d (".date("d M, Y", strtotime($END)).")" : 
	($START == date("Y-m-d") ? "Hari Ini" : "Tanggal ".date("d M, Y", strtotime($START))) );

if(($START == $END) OR  ($END=="1970-01-01")) {
	$sql_filter = " G.tgl_sp='".$START."' ";
}else {
	$sql_filter = " (G.tgl_sp BETWEEN '".$START."' AND '".$END."') ";
}
/**

*/
$STATUS_SP = (!empty($_POST['s']) ? $_POST['s'] : $_GET['s']);

include ("../dcms-function.php");
$NAV_STATUS = NAV_STATUS("sbj", $sql_filter, $STATUS_SP);

if(!empty($STATUS_SP)) {
	$sql_filter .= " AND G.`status`='".$STATUS_SP."' ";
	$d_action = array(
				    '1'=>array('Pending'), 
				    '2'=>array('Confirmed'), 
				    '3'=>array('Cancel')
					);
	$DISPLAY .= " &mdash; Status PO: ".$d_action[ $STATUS_SP ][0];
}

/**

*/
if(!empty($_POST['no_sp'])) {
  unset($sql_filter);
  $DISPLAY = "";
  $NO_SP = str_replace("SBJ-", "", $_POST['no_sp']);
  $sql_filter = " G.no_sp='".$NO_SP."' ";
}

/**

*/
$sql -> db_Select("DCMS_sbj G LEFT JOIN customer C ON G.C_ID=C.CID", 
		"G.SBJ_ID, G.tgl_sp, G.no_sp, G.status, G.status_date, C.c_name, C.c_corp", 
		"WHERE ".$sql_filter." ");
$total_items =  $sql->db_Rows();
?>
<section role="main" class="content-body">
<header class="page-header">
	<h2><i class="fa fa-cubes"></i> Pemesanan Beli Jadi  <a href="add" class="mb-xs mt-xs mr-xs btn btn-primary btn-xs"><i class="fa fa-plus"></i> SBJ Baru</a></h2>
	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li><a href="<?php echo c_LANDING;?>"><i class="fa fa-home"></i></a></li>
			<li><span>Beli Jadi</span></li>
		</ol>
		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>

<div class="row"><div class="col-md-9">
	<div class="row"><div class="col-md-12"><?php echo $NAV_STATUS;?></div></div>
	<div class="row"><div class="col-md-12">
		<form id="filter_submit" name="filter_submit" method="post" action="<?php echo c_XELF;?>" class="form-inline">
			<div class="form-group">
				<div class="input-daterange input-group" data-plugin-datepicker>
					<span class="input-group-addon" style="border-left-width: 1px;"><i class="fa fa-calendar"></i></span>
					<input type="text" class="form-control input-sm" name="start">
					<span class="input-group-addon">s/d</span>
					<input type="text" class="form-control input-sm" name="end">
				</div>
				<select name="s" class="form-control input-sm">
					<option value="">Semua</option>
					<option value="2">Process</option>
					<option value="1">Pending</option>
					<option value="3">Canceled</option>
				</select>
				<button type="submit" class="btn btn-sm btn-default">Filter</button>
			</div>
		</form>
	</div></div>
</div><div class="col-md-3">
<div class="row"><div class="col-md-12"><form id="filter_submit" name="filter_submit" method="post" action="<?php echo c_XELF;?>" class="search">
<div class="input-group input-search"><input type="text" class="form-control" name="no_sp" id="no_sp" data-plugin-masked-input data-input-mask="SBJ-9999" placeholder="SBJ-____">
<span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span></div>
</form></div></div>
<div class="row"><div class="col-md-12 text-right"><p></p><em><?php echo $total_items;?> items</em></div></div>
</div></div>

<div class="row"><div class="col-md-12 col-lg-6 col-xl-6">
<section class="panel panel-featured-left panel-featured-primary">
	<div class="panel-body">
		<div class="widget-summary">
			<div class="widget-summary-col widget-summary-col-icon">
				<div class="summary-icon bg-primary"><i class="fa fa-cubes"></i></div>
			</div>
			<div class="widget-summary-col">
				<div class="summary">
					<h4 class="title">Pembelian Barang Jadi</h4>
					<div class="info"><strong class="amount">145 Roll</strong><span class="text-primary">(102 hari ini)</span></div>
				</div>
				<div class="summary-footer"><a class="text-muted text-uppercase">(sudah di proses)</a></div>
			</div>
		</div>
	</div>
</section></div>
<div class="col-md-12 col-lg-6 col-xl-6">
<section class="panel panel-featured-left panel-featured-tertiary">
	<div class="panel-body">
		<div class="widget-summary">
			<div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-tertiary"><i class="fa fa-external-link"></i></div></div>
			<div class="widget-summary-col">
				<div class="summary">
					<h4 class="title">Pending Stok Barang Jadi</h4>
					<div class="info"><strong class="amount">4 SP</strong><span class="text-info">(48 roll)</span></div>								
					<div class="info"><a href="add" class="mb-xs mt-xs mr-xs btn btn-sm btn-warning text-uppercase"><i class="fa fa-plus"></i> Form Beli Jadi</a></div>
				</div>
			</div>
		</div>
	</div>
</section></div>
</div>

<div class="row">
<div class="col-md-12">
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
	<div class="panel-actions"><a href="#" class="fa fa-caret-down"></a></div>
	<h2 class="panel-title">Pemesanan Beli Barang Jadi</h2><em class="panel-subtitle"><?php echo $DISPLAY;?></em>
	</header>
	<div class="panel-body">
		<table class="table table-bordered table-striped mb-none" id="datatable-default">
			<thead>
				<tr>
					<th width="10%" class="text-center">#SP</th>
					<th width="15%">Tanggal SP</th>
					<th width="215px" class="text-center">Status</th>
					<th>Customer</th>
					<th width="150px" class="text-center"></th>
				</tr>
			</thead>
			<tbody id="isi_table">
			<?php
			$action = array(
				    '1'=>array('<a id="confirmed" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Process</a> <a id="canceled" class="btn btn-xs btn-error"><i class="fa fa-times"></i> Cancel</a> '), 
				    '2'=>array('<a class="btn btn-xs btn-success" disabled><i class="fa fa-check"></i> Process</a>'),
				    '3'=>array('<a class="btn btn-xs btn-default" disabled><i class="fa fa-times"></i> Canceled</a>')				    
					);

			while($row = $sql-> db_Fetch()){

				$customer = DISPLAY_CUSTOMER( $row['c_name'], $row['c_corp'] );

				echo "
				<tr>
					<td><strong><a href='./invoice?landing=".$row['SBJ_ID']."'>SBJ-".$row['no_sp']."</a></strong></td>
					<td>".date("d M Y", strtotime($row['tgl_sp']))."</td>
					<td class='text-center'><div id=\"confirm-div\" data-id=\"".$row['SBJ_ID']."\">".$action[ $row['status'] ][0]."
						".($row['status_date'] !='0000-00-00 00:00:00' ? "<small>&mdash;<cite>"._ago($row['status_date'])." yg lalu</cite></small>" : "")."</div>
					</td>
					<td><span class='ellipsis'>".$customer."</span></td>
					<td class='text-center'>
						<a href=\"./print?landing=".$row['SBJ_ID']."\" target=\"_blank\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-print\"></i> Print</a>
						<a href=\"./invoice?landing=".$row['SBJ_ID']."\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-file\"></i> Invoice</a>
					</td>
				</tr>";
			}
			?>
			</tbody>
		</table>
	</div>
</section>
</div>
</div>

</section>
</div>
<?php
@include(AdminFooter);
?>