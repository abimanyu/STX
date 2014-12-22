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
	$('nav li.nav3').addClass('nav-expanded nav-active');
	$('nav li.nav3-1').addClass('nav-expanded');
	$('nav li.gr').addClass('nav-active');
});
</script>
<script src=\"../datatables.js\"></script>
<script src=\"custom.js\"></script>
";
$sql -> db_Select("DCMS_stock S LEFT JOIN DCMS_kain K ON S.KAIN_ID=K.KAIN_ID", 
				"S.STOCK_ID, S.roll, S.jar, S.kg, S.last_update, K.kain", 
				"WHERE `type`='g' GROUP BY S.KAIN_ID");

?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2><i class="fa fa-flag-o"></i> Stock Kain Grey</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Stock</span></li>
				<li><span>Grey</span></li>
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
								<i class="fa fa-flag-o"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Stock Kain Grey</h4>
								<div class="info">
									<strong class="amount">145 Roll</strong>
									<span class="text-primary">(102 hari ini)</span>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-muted text-uppercase">(Tersedia di gudang)</a>
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
								<i class="fa fa-exchange"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Pembelian Kain Grey</h4>
								<div class="info">
									<strong class="amount">4 SBG</strong>
									<span class="text-info">(48 roll)</span>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-muted text-uppercase">(yang sedang di pesan)</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>
					<h2 class="panel-title">Stock Kain Grey</h2>
					<p class="panel-subtitle"><?php echo $DISPLAY;?></p>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th>#</th>
								<th>Jenis Kain</th>
								<th>Jumlah Roll</th>
								<th>Jumlah Jar</th>
								<th>Jumlah Kg</th>
								<th>Last Update</th>
							</tr>
						</thead>
						<tbody id="isi_table">
						<?php

						$i=1;
						while($row = $sql-> db_Fetch()){

							//$customer = DISPLAY_CUSTOMER( $row['c_name'], $row['c_corp'] );
							echo "
							<tr>
								<td>".$i++."</td>
								<td>".$row['kain']."</td>
								<td class='text-center'>".$row['roll']."</td>
								<td class='text-center'>".$row['jar']."</td>
								<td class='text-center'>".$row['kg']."</td>
								<td class='text-center'>"._ago($row['last_update'])." terakhir</td>
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