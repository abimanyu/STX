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
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, pnotify.custom.css, theme.css, default.css, theme-custom.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				pnotify.custom.js, 
				theme.js, theme.custom.js, theme.init.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('nav li.nav3').addClass('nav-expanded nav-active');
	$('nav li.sj').addClass('nav-active');
});
</script>
";
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Surat Jalan</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Pemesanan</span></li>
				<li><span>Surat Jalan</span></li>
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
								<i class="fa fa-tachometer"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Pending SJ</h4>
								<div class="info">
									<strong class="amount">4 SJ</strong>
									<span class="text-info">(48 roll)</span>
								</div>								
								<div class="info">
									<a href="#pp-add" class="mb-xs mt-xs mr-xs btn btn-sm btn-info text-uppercase"><i class="fa fa-plus"></i> Surat Jalan</a> 
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
			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>
					<h2 class="panel-title">Surat Jalan</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#SP</th>
									<th>Tgl SP</th>
									<th>Client</th>
									<th>Jumlah</th>
									<th>Total Harga</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody id="isi_table">

							<?php
							$sql -> db_Select("category", "cat_id, cat_name, cat_count", "WHERE `cat_type`='cat_item' AND `parent_id`='0' GROUP BY cat_id");
							
							while($row = $sql-> db_Fetch()){
								echo "
								<tr>
									<td>".$row['cat_name']."</td>
									<td>".$row['cat_name']."</td>
									<td>".$row['cat_name']."</td>
									<td>".$row['cat_name']."</td>
									<td>".$row['cat_name']."</td>
									<td>".$row['cat_count']."</td>
									<td>
										<a href=\"".c_SELF."?action=edit&id=".$row['cat_id']."\"><i class=\"fa fa-pencil\"></i></a>
										<a href=\"".c_SELF."?action=delete&id=".$row['cat_id']."\" class=\"delete-row\"><i class=\"fa fa-trash-o\"></i></a>
									</td>
								</tr>";
							}
							?>
							</tbody>
						</table>
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