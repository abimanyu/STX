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
@include ("../../../l0t/render.php");

/**
	Load Component
*/
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, theme.css, default.css, theme-custom.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				jquery.autosize.js, maps.js, gmaps.js, 
				theme.js, theme.custom.js, theme.init.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('html').addClass('sidebar-left-collapsed');
	$('nav li.nav2').addClass('nav-expanded nav-active');
	$('nav li.po').addClass('nav-active');
});

(function( $ ) {
	'use strict';
	var initStatic = function() {
		var url = GMaps.staticMapURL({
			size: [300, 300],
			lat: -6.143792,
			lng: 106.799673,
			scale: 1
		});

		$('#gmap-static')
			.css({
				backgroundImage: 'url(' + url + ')',
				backgroundSize: 'cover'
			});
	};
	$(function() {
		initStatic();
	});
}).apply(this, [ jQuery ]);
</script>
";

$ID = $_GET['landing'];
$sql -> db_Select("DCMS_po G LEFT JOIN customer C ON G.C_ID=C.CID LEFT JOIN DCMS_po_items I ON I.POI_ID=G.PO_ID", 
					"G.PO_ID, G.tgl_sp, G.no_sp, G.keterangan, C.c_name, C.c_corp, C.c_alamat, COUNT(distinct I.ITEM_ID) as jumlah_item, SUM(distinct I.harga) as total_tagihan", 
					"WHERE G.PO_ID='".$ID."' GROUP BY G.PO_ID");
$result = $sql -> db_Fetch();
$NO_SP = $result['no_sp'];
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2><i class="fa fa-history"></i> Order Timeline</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><a href="./front"><span>PO</span></a></li>
				<li><span>Timeline</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<div class="row">
		<div class="col-md-8 col-lg-6">

			<div class="tabs">
				<ul class="nav nav-tabs tabs-primary">
					<li class="active">
						<a href="#overview" data-toggle="tab">Timeline</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="overview" class="tab-pane active">

						<h4 class="mb-xlg">Proses Transaksi SJJ-<?php echo $NO_SP;?></h4>

						<div class="timeline timeline-simple mt-xlg mb-md">
							<div class="tm-body">
								<div class="tm-title">
									<h3 class="h5 text-uppercase">NO SP : SJJ-1001</h3>
								</div>
								<ol class="tm-items">
								<?php
								$sql2 = new db;
								$sql2 -> db_Select("DCMS_log L LEFT JOIN 3E_users U ON L.U_ID=U.ID", "L.`log`, L.`desc`, L.`date`, U.`user_nicename`", "WHERE L.`TO`='po' AND L.`TO_ID`='".$ID."' ORDER BY L.`date` DESC");
								
								$ACT = array(
								    'create'=>array('Membuat No PO'), 
								    'decline'=>array('PO di-Tolak oleh Customer'),
								    'approve'=>array('PO di-Setujui oleh Customer'),
								    'cancel'=>array('PO diBatalkan')				    
									);
								while($row2 = $sql2-> db_Fetch()){

									echo "
									<li>
										<div class=\"tm-box\">
											<p class=\"text-muted mb-none\">"._ago($row2['date'])." yg lalu</p>
											<p>".$ACT[ $row2['log'] ][0]." <a class=\"text-primary\">#".$row2['log']."</a></p>
											".(!empty($row2['desc']) ? "<p>".$row2['desc']."</p>" : "")."
											<p class=\"text-muted mb-none\"><small><cite>".date("d M Y H:i", strtotime($row2['date']))." &mdash; ".$row2['user_nicename']."</cite></small></p>
										</div>
									</li>";
								}
								?>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
			<section class="panel">
				<a href="./front" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali ke Purchase Order</a>
			</section>
			</div>
		</div>


		<div class="col-md-4 col-lg-3">

			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">
						<span class="va-middle">Order Status</span>
					</h2>
				</header>
				<div class="panel-body">
					<div class="widget-toggle-expand mb-md">
						<div class="widget-header">
							<h6>Order Completion</h6>
							<div class="widget-toggle">+</div>
						</div>
						<div class="widget-content-collapsed">
							<div class="progress progress-xs light">
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									60%
								</div>
							</div>
						</div>
						<div class="widget-content-expanded">
							<ul class="simple-todo-list">
								<li class="completed">Pengajuan PO</li>
								<li class="completed">PO di-Terima oleh Customer</li>
								<li class="completed">PO di-Setujui oleh Customer</li>
								<li>Persiapan Item Grey</li>
								<li>Proses Pencelupan</li>
								<li>Barang Sampai ke Gudang</li>
								<li>Persiapan Pengiriman ke Customer</li>
								<li>Barang Sampai ke Customer</li>
								<li>Pembuatan Faktur Penjualan</li>
								<li>Pembayaran</li>
							</ul>
						</div>
					</div>

					<hr class="dotted short">

					<h4><?php echo $result['c_name']." &mdash; ".$result['c_corp'];?></h4>
					<p><h6 class="text-muted">
					<?php 
						//Pelajari API google maps
						//https://developers.google.com/maps/documentation/geocoding/?csw=1
						echo $result['c_alamat'];
					?>
					</h6></p>
					<div id="gmap-static" style="height: 300px; width: 100%;"></div>
					<hr class="dotted short">
					<div class="clearfix">
						<a class="text-uppercase text-muted pull-right" target="_blank" href="https://www.google.com/maps/place/<?php echo $result['c_alamat'];?>&amp;sty=c">(View Maps)</a>
					</div>
				</div>
			</section>
		</div>


		<div class="col-md-12 col-lg-3">

			<h4 class="mb-md">PO Info</h4>
			<ul class="simple-card-list mb-xlg">
				<li class="primary">
					<h3><?php echo date("d M Y", strtotime($result['tgl_sp']));?></h3>
					<p>Tanggal PO</p>
				</li>
				<li class="primary">
					<h3>Rp. <?php echo $result['total_tagihan'];?></h3>
					<p>Nilai Tagihan</p>
				</li>
				<li class="primary">
					<h3><?php echo $result['jumlah_item'];?></h3>
					<p>Jumlah Item</p>
				</li>
			</ul>

			<h4 class="mb-md">PO Items</h4>
			<ul class="simple-bullet-list mb-xlg">
			<?php
				$sql2 -> db_Select("DCMS_po_items I LEFT JOIN DCMS_db_items DB ON DB.ITEM_ID=I.ITEM_ID LEFT JOIN DCMS_db_kain K ON DB.KAIN_ID=K.KAIN_ID LEFT JOIN DCMS_db_warna W ON DB.WARNA_ID=W.WARNA_ID", 
									"I.*, DB.WARNA_ID, K.kain, W.warna, W.code", 
									"WHERE I.PO_ID='".$ID."' ");
				while($row2= $sql2-> db_Fetch()){
					if(!empty($row2['code'])) {
						$code_warna = $row2['code']; $border=$code_warna;
					}else {$border="gray";}

					if(!empty($row2['roll'])) {
						$banyak = $row2['roll'];
						$banyak_display = $banyak." Roll";}
					elseif(!empty($row2['jar'])) {
						$banyak = $row2['jar'];
						$banyak_display = $banyak." Jar";}
					else {$banyak = $row2['kg'];
						$banyak_display = $banyak." Kg";}

					echo "
					<style>ul.simple-bullet-list li.warna-".$row2['ITEM_ID'].":before {border-color: ".$border.";}</style>
				<li class=\"warna-".$row2['ITEM_ID']."\">
					<span class=\"title\">".$row2['kain']." &mdash; ".$row2['warna']."</span>
					<span class=\"description truncate\">Jumlah: ".$banyak_display."</span>
					".(!empty($row2['mesin']) ? "<span class=\"description truncate\">Mesin: ".$row2['mesin']."</span>" : "")."
					".(!empty($row2['setting']) ? "<span class=\"description truncate\">Setting: ".$row2['setting']."</span>" : "")."
					".(!empty($row2['gramasi']) ? "<span class=\"description truncate\">Gramasi: ".$row2['gramasi']."</span>" : "")."
				</li>";
				}
			?>
			</ul>

		</div>

	</div>
	<!-- end: page -->
</section>
</div>
<?php
@include(AdminFooter);
?>