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
				jquery-ui.min.css, pnotify.custom.css, select2.css, 
				theme.css, default.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				jquery-ui.min.js, pnotify.custom.js, jquery.appear.js, jquery.maskedinput.js, select2.js, jquery.autosize.js, 
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
<script src=\"custom.js\"></script>
";

/**
	Form Submit
*/
include ("../dcms-function.php");

if(isset($_POST['form_submit'])) {
	$NO_SP = str_replace("SBG-", "", $_POST['no_sp']);
	$TANGGAL_SP = date("Y-m-d", strtotime($_POST['tgl_sp']));
	//$NOW = date("Y-m-d H:i:s");

	//costumer
	if(!empty($_POST['customer_id'])) {
		//update data customer terbaru via form ini
		$sql -> db_Update("customer", "c_name='".$_POST['customer']."', c_corp='".$_POST['corp']."', c_alamat='".$_POST['alamat']."'  
			WHERE CID='".$_POST['customer_id']."' ");
		$CID = $_POST['customer_id'];

	}else { //customer belum ada di database
		if(!empty($_POST['customer']) OR !empty($_POST['corp'])) {
			$CID = $sql -> db_Insert("customer", "'', '".$_POST['customer']."', '".$_POST['corp']."', '','','1','".$_POST['alamat']."'");
		}
	}
	$warehouse_code = get_user_option("U_WAREHOUSE");

	$SBG_ID = $sql -> db_Insert("DCMS_sbg", "'', '".$TANGGAL_SP."', '".$NO_SP."', '".TEXTAREA( htmlentities( $_POST['keterangan']) )."', '".$CID."', '1', '', '".$warehouse_code."','".U_ID."', NOW() ");

	//jika berhasil, update LAST_NO_SP
	if($SBG_ID) {
		$sql -> db_Update("3E_taxonomy", "`value`='".$NO_SP."' WHERE `type`='warehouse' AND `key`='sbg-last' ");
	}

	//Relasi surat
	if(!empty($_POST['relations'])) {
		//$rel_items = explode (",", $_POST['relations']);
		$rel_items = count($_POST['relations']);
		for($r=0; $r < $rel_items; $r++){
			//$TO_ID = str_replace("SJJ-", "", $rel_items[$r]);
			$TO_ID = $_POST['relations'][$r];
			$sql -> db_Insert("DCMS_relations", "'', 'sbg', '".$SBG_ID."', 'po', '".$TO_ID."', NOW(), 'Beli Grey' ");
		}
	}

	//AYO BERMAIN DI STOK :)
	$Dyn = count($_POST['dyn']);
	for($x=0; $x<$Dyn; $x++){
		
		if(!empty($_POST['jeniskain'][$x])) {
			$CEK_ID_KAIN = GET_ID_KAIN( $_POST['jeniskain'][$x] );
			if( $CEK_ID_KAIN ) {//jika ada jenis kain di database
				$KAIN_ID = $CEK_ID_KAIN;
			}
			else {//jika ga ada di database, tambah data kain
				$KAIN_ID = $sql -> db_Insert("DCMS_kain", "'', '".$_POST['jeniskain'][$x]."', '', '' ");
			}

			$ROLL = HANYA_ANGKA( $_POST['roll'][$x] );
			$JAR = HANYA_ANGKA( $_POST['jar'][$x] );
			$KG = HANYA_ANGKA( $_POST['kg'][$x] );
			$HARGA = HANYA_ANGKA( $_POST['harga'][$x] );

			$sql -> db_Insert("DCMS_sbg_items", "'', '".$SBG_ID."', '".$ROLL."', '".$JAR."', '".$KG."', '".$KAIN_ID."', 
						'".$_POST['mesin'][$x]."', '".$_POST['setting'][$x]."', '".$_POST['gramasi'][$x]."', '".$HARGA."' ");
		}

		//add stock
		/*$CEK_ID_STOCK = GET_ID_STOCK("g", $KAIN_ID);
		if( $CEK_ID_STOCK ) {
			$STOCK_ID = $CEK_ID_STOCK;
			UPDATE_STOCK( $STOCK_ID, $ROLL, $JAR, $KG );
		}
		else {
			$STOCK_ID = $sql -> db_Insert("DCMS_stock", "'','g', '".$KAIN_ID."', '', '".$ROLL."', '".$JAR."', '".$KG."', '".$warehouse_code."', NOW() ");
		}
		//add stock log
		$sql -> db_Insert("DCMS_stock_log", "'', '".$STOCK_ID."', 'in', 'g', '".$KAIN_ID."', '', '".$ROLL."', '".$JAR."', '".$KG."', 
					'sbg', '".$SBG_ID."', '".U_ID."', '".$warehouse_code."', NOW() ");
		*/
	}

	return _redirect ( "./invoice?landing=".$SBG_ID );
}

/**
	Load needed
*/
$LAST_NO_SP = get_option("warehouse", "sbg-last");
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Form Pemesanan Beli Grey</h2>
		<?php echo $test;?>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><a href="./front"><span>Pemesanan Beli Grey</span></a></li>
				<li><span>Add</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<div class="row">
		<section class="panel">
			<a href="./front" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali ke Pemesanan Beli Grey</a>
		</section>
	</div>

<form method='post' action='<?php echo c_SELF;?>' class="form-horizontal form-bordered">
	<div class="row">
		<div class="col-md-6">
			<section class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>

					<h2 class="panel-title">Pemesanan Beli Grey</h2>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">No. SP</label>
						<div class="col-md-9">
							<input name="no_sp" data-plugin-masked-input data-input-mask="SBG-9999" placeholder="SBG-____" class="form-control" value="<?php echo $LAST_NO_SP +1;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Tanggal SP</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<input name= "tgl_sp" type="text" data-plugin-datepicker class="form-control" value="<?php echo date("m/d/Y");?>">
							</div>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-md-3 control-label" for="keterangan">Keterangan</label>
						<div class="col-md-9">
							<textarea name="keterangan" id="keterangan" class="form-control" rows="3" data-plugin-textarea-autosize></textarea>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="col-md-6">
			<section class="panel panel-featured panel-featured-primary">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-3 control-label" for="customer">Supplier</label>
						<div class="col-md-9">
							<input name="customer" id="customer" type="text" placeholder="Nama Supplier / Pelanggan" class="form-control">
							<input name="customer_id" id="customer_id" value="" type="hidden">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="corp">Perusahaan</label>
						<div class="col-md-9">
							<input name="corp" id="corp" type="text" placeholder="Nama Perusahaan / Toko Supplier" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="alamat">Alamat</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" name="alamat" id="alamat" data-plugin-textarea-autosize></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">PO Terkait</label>
						<div class="col-md-6">
							<select name="relations[]" multiple data-plugin-selectTwo class="form-control populate">
							<?php
							$sql -> db_Select("DCMS_po G", "G.PO_ID, G.tgl_sp, G.no_sp, G.status, G.status_date", "WHERE G.`status`='2' GROUP BY G.no_sp");
							while($row = $sql-> db_Fetch()){
								echo "<option value=\"".$row['PO_ID']."\">SJJ-".$row['no_sp']."</option>";
							}
							?>
							</select>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<button type="submit" name="form_submit" value="1" class="btn btn-success"><i class="fa fa-paper-plane"></i> Submit </button>
					<button type="reset" class="btn btn-default">Reset</button>
				</footer>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<section id="DynamicSection" class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>

					<h2 class="panel-title"><button type="button" id="TombolDynamic" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Item</button></h2>
					
				</header>
				<div class="panel-body">
					<div id="DynamicInput">
						<div class="row form-group">					
							<div class="col-md-1">
								<input name="dyn[]" type="hidden">
								<input type="text" id="roll" name="roll[]" placeholder="Roll" class="form-control format_angka">
							</div>
							<div class="col-md-1">
								<input type="text" id="jar" name="jar[]" placeholder="Jar" class="form-control format_angka">
							</div>
							<div class="col-md-1">
								<input type="text" id="kg" name="kg[]" placeholder="Kg" class="form-control format_angka">
							</div>
							<div class="col-md-2">
								<input type="text" id="jeniskain" name="jeniskain[]" placeholder="Jenis Kain" class="form-control">
							</div>
							<div class="col-md-1">
								<input type="text" id="mesin" name="mesin[]" placeholder="Mesin" class="form-control" name="baru[]">
							</div>
							<div class="col-md-2">
								<input type="text" id="setting" name="setting[]" placeholder="Setting" class="form-control">
							</div>
							<div class="col-md-2">
								<input type="text" id="gramasi" name="gramasi[]" placeholder="Gramasi" class="form-control">
							</div>
							<div class="col-md-2">
								<input type="text" id="harga" name="harga[]" placeholder="Harga" class="form-control format_duit">
							</div>						
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row form-group">						
							<div class="col-md-1 text-uppercase text-muted">Roll</div>
							<div class="col-md-1 text-uppercase text-muted">Jar</div>
							<div class="col-md-1 text-uppercase text-muted">Kg</div>
							<div class="col-md-2 text-uppercase text-muted">Jenis Kain</div>
							<div class="col-md-1 text-uppercase text-muted">Mesin</div>
							<div class="col-md-2 text-uppercase text-muted">Setting</div>
							<div class="col-md-2 text-uppercase text-muted">Gramasi</div>
							<div id="total" class="col-md-2 text-uppercase text-muted">Harga</div>
					</div>
				</footer>
			</section>
		</div>
	</div>
</form>

</section>
</div>
<?php
@include(AdminFooter);
?>