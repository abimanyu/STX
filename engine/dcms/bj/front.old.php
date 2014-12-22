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
	$('nav li.nav2').addClass('nav-expanded nav-active');
	$('nav li.bj').addClass('nav-active');
});
</script>
<script src=\"datatables.js\"></script>
<script src=\"custom.js\"></script>
";
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Pemesanan Beli Jadi</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Pemesanan</span></li>
				<li><span>Beli Jadi</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>


	<div class="row">
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-primary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-cubes"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Pembelian Barang Jadi</h4>
								<div class="info">
									<strong class="amount">145 Roll</strong>
									<span class="text-primary">(102 hari ini)</span>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-muted text-uppercase">(sudah di proses)</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-tertiary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-tertiary">
								<i class="fa fa-external-link"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Pending Pembelian</h4>
								<div class="info">
									<strong class="amount">4 SP</strong>
									<span class="text-info">(48 roll)</span>
								</div>								
								<div class="info">
									<a href="add" class="mb-xs mt-xs mr-xs btn btn-sm btn-info text-uppercase"><i class="fa fa-plus"></i> Form Beli Jadi</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="toggle panel" data-plugin-toggle>
				<section class="toggle">
					<label>Data Filter</label>
					<div class="toggle-content panel-body">

						<form id="filter_submit" name="filter_submit" method="post" action="<?php echo c_XELF;?>" class="form-inline">
							<div class="form-group">
								<label class="sr-only" for="no_sp">Cari No. SP</label>
								<input name="no_sp" id="no_sp" data-plugin-masked-input data-input-mask="SBJ-9999" placeholder="SBJ-____" class="form-control">
							</div>
							<div class="form-group">
								<label class="sr-only">Kisaran Tanggal SP</label>
								<div class="input-daterange input-group" data-plugin-datepicker>
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="text" class="form-control" name="start">
									<span class="input-group-addon">s/d</span>
									<input type="text" class="form-control" name="end">
								</div>
							</div>

							<div class="visible-sm clearfix mt-sm mb-sm"></div>
							<div class="clearfix visible-xs mb-sm"></div>

							<button type="submit" class="btn btn-primary">Cari</button>
						</form>
					</div>
				</section>
			</div>		
		</div>
	</div>
	
<?php
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

if(!empty($_POST['no_sp'])) {
  unset($sql_filter);
  $DISPLAY = "";
  $NO_SP = str_replace("SBJ-", "", $_POST['no_sp']);
  $sql_filter = " G.no_sp='".$NO_SP."' ";
}
?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>
					<h2 class="panel-title">Pembelian Barang Jadi</h2>
					<p class="panel-subtitle"><?php echo $DISPLAY;?></p>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-details">
						<thead>
							<tr>
								<th>#SP</th>
								<th>Tanggal SP</th>
								<th>Customer</th>
								<th class='hidden'>Alamat Customer</th>
								<th class='hidden'></th>
							</tr>
						</thead>
						<tbody id="isi_table">
						<?php
						include ("../wms-function.php");

						$sql -> db_Select("WMS_sbj G LEFT JOIN customer C ON G.C_ID=C.CID", 
								"G.SBJ_ID, G.tgl_sp, G.no_sp, C.c_name, C.c_corp, C.c_alamat", 
								"WHERE ".$sql_filter." ");

						while($row = $sql-> db_Fetch()){

							$customer = DISPLAY_CUSTOMER( $row['c_name'], $row['c_corp'] );
							echo "
							<tr>
								<td><a href='./printview?landing=".$row['SBJ_ID']."'>SBJ-".$row['no_sp']."</a></td>
								<td>".date("d M Y", strtotime($row['tgl_sp']))."</td>
								<td><span class='ellipsis'>".$customer."</span></td>
								<td class='hidden'>".$row['c_alamat']."</td>
								<td class='text-center hidden'>
									<a href=\"./printview?landing=".$row['SBJ_ID']."\" class=\"mb-xs mt-xs mr-xs btn btn-xs btn-primary text-uppercase\"><i class=\"fa fa-file\"></i> Invoice</a> 
									<a href=\"./print?landing=".$row['SBJ_ID']."\" target=\"_blank\" class=\"mb-xs mt-xs mr-xs btn btn-xs btn-info text-uppercase\"><i class=\"fa fa-print\"></i> Print</a> 
									<a href=\"./printview?landing=".$row['SBJ_ID']."\"><i class=\"fa fa-power-off\"></i></a>
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