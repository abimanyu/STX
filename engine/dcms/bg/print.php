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
@include (c_THEMES."conf.php");

$ID = $_GET['c'];
$sql -> db_Select("WMS_sbg G LEFT JOIN customer C ON G.C_ID=C.CID", 
					"G.SBG_ID, G.tgl_sp, G.no_sp, G.keterangan, C.c_name, C.c_corp, C.c_alamat", 
					"WHERE G.SBG_ID='".$ID."' LIMIT 1");
$result = $sql -> db_Fetch();
?>
<html>
	<head>
		<title><?php echo c_APP;?></title>
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo VENDOR;?>bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo CSS;?>invoice-print.css" />
	</head>
	<body>
		<div class="invoice">
			<header class="clearfix">
				<div class="row">
					<div class="col-sm-7">
						<h2 class="h3 mt-none mb-sm text-dark text-bold">SURAT PESANAN GREY</h2>
						<h4 class="h4 m-none text-dark text-bold">#SBG-<?php echo $result['no_sp'];?></h4>
						<span class="text-dark">Tgl SP:</span>
						<span class="value text-bold text-dark"><?php echo date("d/m/Y", strtotime($result['tgl_sp']));?></span>
					</div>
					<div class="col-sm-5 text-right">
						<div class="text-right mt-md mb-md">
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
					<div class="col-sm-6 text-right mt-md mb-md">
						<address class="mr-xlg"><?php echo c_ALAMAT;?></address>
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
						$sql -> db_Select("WMS_sbg_items I LEFT JOIN WMS_kain K ON I.KAIN_ID=K.KAIN_ID", 
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
								<td class=\"text-right\">".duit($row['harga'])."</td>
								<td class=\"text-right\">".duit($row['harga'] * $banyak)."</td>
							</tr>";
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="row">
				<div class="col-md-6 mt-md">
					<div class="bill-to">
						<p class="h5 mb-xs">Catatan:</p>
						<address class="h5 mb-xs text-dark text-semibold">
							<?php echo TEXTAREA( $result['keterangan'] );?>
						</address>
					</div>
				</div>
				<div class="col-md-6">
					<div class="invoice-summary text-right col-sm-offset-3">
						<div class="h5 text-center"><span class="value">Jakarta, <?php echo date("d M Y", strtotime($result['tgl_sp']));?></span></div>
						<div class="h1"></div>
						<div class="h4 text-center">( S I N A R T E X )</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			window.print();
		</script>
	</body>
</html>