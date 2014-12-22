<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     print bg
*/

@include ("../../../l0t/render.php");

/**
	Load Component
*/
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, 
				theme.css, default.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				theme.js, theme.init.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('html').addClass('sidebar-left-collapsed');
	$('nav li.nav2').addClass('nav-expanded nav-active');
	$('nav li.bg').addClass('nav-active');
});
</script>
";

$ID = $_GET['landing'];
$sql -> db_Select("DCMS_sbg G LEFT JOIN customer C ON G.C_ID=C.CID", 
					"G.SBG_ID, G.tgl_sp, G.no_sp, G.keterangan, C.c_name, C.c_corp, C.c_alamat", 
					"WHERE G.SBG_ID='".$ID."' LIMIT 1");
$result = $sql -> db_Fetch();
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Surat Pemesanan Gray</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Pemesanan</span></li>
				<li><span><a href="./front">Grey</a></span></li>
				<li><span>Invoice</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>


	<section class="panel">
		<div class="panel-body">
			<div class="invoice">
				<header class="clearfix">
					<div class="row">
						<div class="col-sm-6 mt-md">
							<h2 class="h2 mt-none mb-sm text-dark text-bold">SURAT PESANAN GREY</h2>
							<h4 class="h4 m-none text-dark text-bold">#SBG-<?php echo $result['no_sp'];?></h4>
						</div>
						<div class="col-sm-6 text-right mt-md mb-md">
							<address class="ib mr-xlg">
								<?php echo c_ALAMAT;?>
							</address>
							<div class="ib">
								<img src="<?php echo IMAGES;?>invoice-logo.png" alt="<?php echo c_APP;?>" />
							</div>
						</div>
					</div>
				</header>
				<div class="bill-info">
					<div class="row">
						<div class="col-md-6">
							<div class="bill-to">
								<p class="h5 mb-xs">Kepada Yth:</p>
								<address class="h5 mb-xs text-dark text-semibold">
									<?php echo $result['c_name'];?> / <?php echo $result['c_corp'];?><br/>
									<?php echo $result['c_alamat'];?>
								</address>
							</div>
						</div>
						<div class="col-md-6">
							<div class="bill-data text-right">
								<p class="mb-none">
									<span class="text-dark">Tanggal SP:</span>
									<span class="value text-bold text-dark"><?php echo date("d/m/Y", strtotime($result['tgl_sp']));?></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			
				<div class="table-responsive">
					<table class="table invoice-items">
						<thead>
							<tr class="h4 text-dark">
								<th id="cell-id" class="text-semibold">#</th>
								<th id="cell-qty" class="text-semibold">Banyak</th>
								<th id="cell-item" class="text-semibold">Jenis Kain</th>
								<th id="cell-qty" class="text-center text-semibold">Mesin</th>
								<th id="cell-qty" class="text-center text-semibold">Setting</th>
								<th id="cell-qty" class="text-center text-semibold">Gramasi</th>
								<th id="cell-price" class="text-center text-semibold">Harga</th>
								<th id="cell-total" class="text-center text-semibold">SubTotal</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$sql -> db_Select("DCMS_sbg_items I LEFT JOIN DCMS_kain K ON I.KAIN_ID=K.KAIN_ID", 
								"I.*, K.kain", 
								"WHERE I.SBG_ID='".$ID."' GROUP BY I.SBGI_ID");
						
						while($row = $sql-> db_Fetch()){
							
							if(!empty($row['roll'])) {
								$banyak = $row['roll'];
								$banyak_display = $banyak." Roll";}
							elseif(!empty($row['jar'])) {
								$banyak = $row['jar'];
								$banyak_display = $banyak." Jar";}
							else {$banyak = $row['kg'];
								$banyak_display = $banyak." Kg";}

							echo "
							<tr>
								<td><a href='#".$row['SBGI_ID']."'>".$row['SBGI_ID']."</a></td>
								<td class=\"text-center\">".$banyak_display."</td>
								<td class=\"text-semibold text-dark\">".$row['kain']."</td>
								<td class=\"text-center text-uppercase\">".$row['mesin']."</td>
								<td class=\"text-center text-uppercase\">".$row['setting']."</td>
								<td class=\"text-center text-uppercase\">".$row['gramasi']."</td>
								<td class=\"text-right\">Rp. ".duit($row['harga'])."</td>
								<td class=\"text-right\">Rp. ".duit($row['harga'] * $banyak)."</td>
							</tr>";
						}
						?>
						</tbody>
					</table>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="bill-info">
							<div class="bill-to">
								<p class="h5 mb-xs">Catatan:</p>
								<address class="h5 mb-xs text-dark text-semibold">
									<?php echo TEXTAREA( $result['keterangan'] );?>
								</address>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-8">
						<div class="invoice-summary">
							<table class="table h5 text-dark">
								<tbody>
									<tr class="b-top-none">
										<td class="text-center"><span class="value">Jakarta, <?php echo date("d M Y", strtotime($result['tgl_sp']));?></span></td>
									</tr>
									<tr>
										<td>&nbsp;<p>&nbsp;</p></td>
									</tr>
									<tr class="h4">
										<td class="text-center">( S I N A R T E X )</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="text-right mr-lg">
				<a href="./front" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali ke Pemesanan Beli Grey</a>
				<a href="./print?c=<?php echo $result['SBG_ID'];?>" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
			</div>
		</div>
	</section>

</section>
</div>
<?php
@include(AdminFooter);
?>