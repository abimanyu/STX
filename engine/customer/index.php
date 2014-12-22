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

@include ("../../l0t/render.php");

/**
	Load Component
*/
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, pnotify.custom.css, datatables.css, theme.css, default.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				pnotify.custom.js, jquery.dataTables.js, dataTables.tableTools.min.js, datatables.js, 
				theme.js, theme.init.js, customer-custom.js";
require_once(c_THEMES."auth.php");
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Daftar Customer</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Customer</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<form id="form_submit" class="form-horizontal form-bordered">
	<div class="row">
		<div class="col-md-6">
			<section class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>

					<h2 class="panel-title">Tambah Customer</h2>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-3 control-label" for="name">Nama</label>
						<div class="col-md-9">
							<input name="name" type="text" class="form-control" id="name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="corp">Toko/Perusahaan</label>
						<div class="col-md-9">
							<input name="corp" type="text" class="form-control" id="corp">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="telp">#Telp</label>
						<div class="col-md-9">
							<input name="telp" type="text" class="form-control" id="telp">
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="col-md-6">
			<section class="panel panel-featured panel-featured-primary">
				
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-3 control-label" for="email">Email</label>
						<div class="col-md-9">
							<input name="email" type="text" class="form-control" id="email">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="alamat">Alamat</label>
						<div class="col-md-9">
							<textarea name="alamat" class="form-control" rows="3" id="alamat" data-plugin-textarea-autosize></textarea>
						</div>
					</div>					
				</div>
				<footer class="panel-footer">
					<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Submit </button>
					<button type="reset" class="btn btn-default">Reset</button>
				</footer>				
			</section>
		</div>
	</div>
	</form>

	<div class="row">
		<div class="col-md-12">

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
			
					<h2 class="panel-title">Customer</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?php echo VENDOR;?>jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Toko / Perusahaan</th>
								<th>Telp</th>
								<th>Alamat</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="isi_table">
						<?php
						$sql -> db_Select("customer", "*", "GROUP BY c_name");
						
						while($row = $sql-> db_Fetch()){
							echo "
								<tr>
									<td>".$row['c_name']."</td>
									<td>".$row['c_corp']."</td>
									<td>".$row['c_telp']."</td>
									<td>".$row['c_alamat']."</td>
									<td class=\"actions-hover actions-fade\">
										<a href=\"".c_SELF."?action=edit&id=".$row['CID']."\"><i class=\"fa fa-pencil\"></i></a>
										<a href=\"".c_SELF."?action=delete&id=".$row['CID']."\" class=\"delete-row\"><i class=\"fa fa-trash-o\"></i></a>
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
$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('nav li.cs').addClass('nav-active');
	$('html').addClass('sidebar-left-collapsed');
});
</script>
";

@include(AdminFooter);
?>