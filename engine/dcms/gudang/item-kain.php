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
				select2.js, jquery.dataTables.js, datatables.js, 
				theme.js, theme.init.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('nav li.nav3').addClass('nav-expanded nav-active');
	$('nav li.nav3-2').addClass('nav-expanded');
	$('nav li.ijk').addClass('nav-active');
});
</script>
<script src=\"../datatables.js\"></script>
";
$sql -> db_Select("DCMS_db_kain K", "K.KAIN_ID, K.kain, K.code", "GROUP BY K.kain");
$total_items = $sql -> db_Rows();
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2><i class="fa fa-bars"></i> Daftar Jenis Kain</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Record</span></li>
				<li><span>Jenis Kain</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>


	<div class="row">
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-tertiary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-tertiary">
								<i class="fa fa-bars"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Daftar Jenis Kain</h4>
								<div class="info">
									<strong class="amount"><?php echo $total_items;?> Jenis Kain</strong>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-6">
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>
					<h2 class="panel-title">Daftar Database Jenis Kain</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th>#</th>
								<th>Code Kain</th>
								<th>Jenis Kain Terdaftar</th>
							</tr>
						</thead>
						<tbody id="isi_table">
						<?php
						$i=1;
						while($row = $sql-> db_Fetch()){

							echo "
							<tr>
								<td>".$i++."</td>
								<td>".$row['code']."</td>
								<td>".$row['kain']."</td>
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