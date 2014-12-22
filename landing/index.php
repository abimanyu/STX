<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     index pages
*/
@include_once ("../l0t/render.php");

/**
	Load Component
*/
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, bootstrap-multiselect.css, theme.css, default.css, theme-custom.css, modernizr.js";
$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				bootstrap-multiselect.js, jquery.flot.js, jquery.flot.tooltip.js, jquery.flot.categories.js, snap.svg.js, liquid.meter.js, 
				theme.js, theme.init.js, landing.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('html').addClass('sidebar-left-collapsed');
	$('nav li.landing').addClass('nav-active');
});
</script>
";
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Dashboard</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Dashboard</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
<!-- start: page -->
<div class="row">
	<div class="col-md-6 col-lg-12 col-xl-6">
		<section class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
						<div class="chart-data-selector" id="salesSelectorWrapper">
							<h2>
								Reports:
								<strong>
									<select class="form-control" id="salesSelector">
										<option value="Barang Jadi" selected>Barang Jadi</option>
										<option value="Jumlah Roll" >Jumlah Roll</option>
										<option value="Jumlah Kg" >Jumlah Kg</option>
									</select>
								</strong>
							</h2>

							<div id="salesSelectorItems" class="chart-data-selector-items mt-sm">

								<div class="chart chart-sm" data-sales-rel="Barang Jadi" id="flotDashSales1" class="chart-active"></div>
								<script>

									var flotDashSales1Data = [{
									    data: [
									        ["Jan", 140],
									        ["Feb", 240],
									        ["Mar", 190],
									        ["Apr", 140],
									        ["May", 180],
									        ["Jun", 320],
									        ["Jul", 270],
									        ["Aug", 180]
									    ],
									    color: "#ee413c" /* ganti warna */
									}];

								</script>

								<div class="chart chart-sm" data-sales-rel="Jumlah Roll" id="flotDashSales2" class="chart-hidden"></div>
								<script>

									var flotDashSales2Data = [{
									    data: [
									        ["Jan", 240],
									        ["Feb", 240],
									        ["Mar", 290],
									        ["Apr", 540],
									        ["May", 480],
									        ["Jun", 220],
									        ["Jul", 170],
									        ["Aug", 190]
									    ],
									    color: "#2baab1" /* ganti warna */
									}];

								</script>

								<div class="chart chart-sm" data-sales-rel="Jumlah Kg" id="flotDashSales3" class="chart-hidden"></div>
								<script>

									var flotDashSales3Data = [{
									    data: [
									        ["Jan", 840],
									        ["Feb", 740],
									        ["Mar", 690],
									        ["Apr", 940],
									        ["May", 1180],
									        ["Jun", 820],
									        ["Jul", 570],
									        ["Aug", 780]
									    ],
									    color: "#734ba9" /* ganti warna */
									}];
								</script>
							</div>

						</div>
					</div>
					<div class="col-lg-4 text-center">
						<h2 class="panel-title mt-md">Sales Goal</h2>
						<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
							<div class="liquid-meter">
								<meter min="0" max="100" value="35" id="meterSales"></meter>
							</div>
							<div class="liquid-meter-selector" id="meterSalesSel">
								<a href="#" data-val="35" class="active">Monthly Goal</a>
								<a href="#" data-val="62">Annual Goal</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="row">
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel">
				<div class="panel-body bg-primary">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon">
								<i class="fa fa-empire"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Harap Ganti password Anda Secara Berkala</h4>
								<div class="info">
									<strong class="amount">Warning!</strong>
									<span>(password berumur 102 hari)</span>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-uppercase">(Untuk Keamanan Data)</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-primary">
				<div class="panel-body">
					<div class="widget-summary widget-summary-md">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-shopping-cart"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Pesanan Barang Jadi</h4>
								<div class="info">
									<strong class="amount">145 Roll</strong>
									<span class="text-primary">(102 hari ini)</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="panel panel-featured-left panel-featured-tertiary">
				<div class="panel-body">
					<div class="widget-summary widget-summary-md">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-tertiary">
								<i class="fa fa-flag-o"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Pembelian Gray</h4>
								<div class="info">
									<strong class="amount">145 Roll</strong>
									<span class="text-primary">(102 hari ini)</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="panel panel-featured-left panel-featured-quartenary">
				<div class="panel-body">
					<div class="widget-summary widget-summary-md">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-quartenary">
								<i class="fa fa-flask"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Permintaan Pencelupan</h4>
								<div class="info">
									<strong class="amount">145 Roll</strong>
									<span class="text-primary">(102 hari ini)</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="panel panel-featured-left panel-featured-secondary">
				<div class="panel-body">
					<div class="widget-summary widget-summary-md">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-secondary">
								<i class="fa fa-truck"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Surat Jalan</h4>
								<div class="info">
									<strong class="amount">145 SJ</strong>
									<span class="text-primary">(102 hari ini)</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		
	</div>
</section>
</div>

<?php
@include(AdminFooter);
?>