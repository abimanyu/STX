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
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, theme.css, default.css, theme-custom.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				jquery.autosize.js, 
				theme.js, theme.custom.js, theme.init.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
<script>
$(document).ready(function(){
	$('html').addClass('sidebar-left-collapsed');
	$('nav li.st').addClass('nav-active');
});
</script>
";
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>User Profile</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo c_LANDING;?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span><a href="#setting">Settings</span></a></li>
				<li><span>User Profile</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->

	<div class="row">
		<div class="col-md-4 col-lg-3">

			<section class="panel">
				<div class="panel-body">
					<div class="thumb-info mb-md">
						<img src="<?php echo IMAGES;?>!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
						<div class="thumb-info-title">
							<span class="thumb-info-inner"><?php echo OPNICK;?></span>
							<span class="thumb-info-type"><?php echo OPLEVEL;?></span>
						</div>
					</div>

					<div class="widget-toggle-expand mb-md">
						<div class="widget-header">
							<h6>Profile Completion</h6>
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
								<li class="completed">Update Profile Picture</li>
								<li class="completed">Change Personal Information</li>
								<li>Update Social Media</li>
								<li>Follow Someone</li>
							</ul>
						</div>
					</div>

					<hr class="dotted short">

					<h6 class="text-muted">About</h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vulputate quam. Interdum et malesuada</p>
					<div class="clearfix">
						<a class="text-uppercase text-muted pull-right" href="#">(View All)</a>
					</div>

					<hr class="dotted short">

					<div class="social-icons-list">
						<a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
						<a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
						<a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
					</div>

				</div>
			</section>


			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">
						<span class="label label-primary label-sm text-normal va-middle mr-sm">198</span>
						<span class="va-middle">Friends</span>
					</h2>
				</header>
				<div class="panel-body">
					<div class="content">
						<ul class="simple-user-list">
							<li>
								<figure class="image rounded">
									<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">
								</figure>
								<span class="title">Joseph Doe Junior</span>
								<span class="message truncate">Lorem ipsum dolor sit.</span>
							</li>
							<li>
								<figure class="image rounded">
									<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joseph Junior" class="img-circle">
								</figure>
								<span class="title">Joseph Junior</span>
								<span class="message truncate">Lorem ipsum dolor sit.</span>
							</li>
							<li>
								<figure class="image rounded">
									<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joe Junior" class="img-circle">
								</figure>
								<span class="title">Joe Junior</span>
								<span class="message truncate">Lorem ipsum dolor sit.</span>
							</li>
							<li>
								<figure class="image rounded">
									<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">
								</figure>
								<span class="title">Joseph Doe Junior</span>
								<span class="message truncate">Lorem ipsum dolor sit.</span>
							</li>
						</ul>
						<hr class="dotted short">
						<div class="text-right">
							<a class="text-uppercase text-muted" href="#">(View All)</a>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="input-group input-search">
						<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</div>
			</section>

			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">Popular Posts</h2>
				</header>
				<div class="panel-body">
					<ul class="simple-post-list">
						<li>
							<div class="post-image">
								<div class="img-thumbnail">
									<a href="#">
										<img src="<?php echo IMAGES;?>post-thumb-1.jpg" alt="">
									</a>
								</div>
							</div>
							<div class="post-info">
								<a href="#">Nullam Vitae Nibh Un Odiosters</a>
								<div class="post-meta">
									 Jan 10, 2013
								</div>
							</div>
						</li>
						<li>
							<div class="post-image">
								<div class="img-thumbnail">
									<a href="#">
										<img src="<?php echo IMAGES;?>post-thumb-2.jpg" alt="">
									</a>
								</div>
							</div>
							<div class="post-info">
								<a href="#">Vitae Nibh Un Odiosters</a>
								<div class="post-meta">
									 Jan 10, 2013
								</div>
							</div>
						</li>
						<li>
							<div class="post-image">
								<div class="img-thumbnail">
									<a href="#">
										<img src="<?php echo IMAGES;?>post-thumb-3.jpg" alt="">
									</a>
								</div>
							</div>
							<div class="post-info">
								<a href="#">Odiosters Nullam Vitae</a>
								<div class="post-meta">
									 Jan 10, 2013
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>

		</div>
		<div class="col-md-8 col-lg-6">

			<div class="tabs">
				<ul class="nav nav-tabs tabs-primary">
					<li class="active">
						<a href="#overview" data-toggle="tab">Overview</a>
					</li>
					<li>
						<a href="#edit" data-toggle="tab">Edit</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="overview" class="tab-pane active">
						<h4 class="mb-md">Update Status</h4>

						<section class="simple-compose-box mb-xlg">
							<form method="get" action="/">
								<textarea name="message-text" data-plugin-textarea-autosize placeholder="What's on your mind?" rows="1"></textarea>
							</form>
							<div class="compose-box-footer">
								<ul class="compose-toolbar">
									<li>
										<a href="#"><i class="fa fa-camera"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-map-marker"></i></a>
									</li>
								</ul>
								<ul class="compose-btn">
									<li>
										<a class="btn btn-primary btn-xs">Post</a>
									</li>
								</ul>
							</div>
						</section>

						<h4 class="mb-xlg">Timeline</h4>

						<div class="timeline timeline-simple mt-xlg mb-md">
							<div class="tm-body">
								<div class="tm-title">
									<h3 class="h5 text-uppercase">November 2013</h3>
								</div>
								<ol class="tm-items">
									<li>
										<div class="tm-box">
											<p class="text-muted mb-none">7 months ago.</p>
											<p>
												It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
											</p>
										</div>
									</li>
									<li>
										<div class="tm-box">
											<p class="text-muted mb-none">7 months ago.</p>
											<p>
												What is your biggest developer pain point?
											</p>
										</div>
									</li>
									<li>
										<div class="tm-box">
											<p class="text-muted mb-none">7 months ago.</p>
											<p>
												Checkout! How cool is that!
											</p>
											<div class="thumbnail-gallery">
												<a class="img-thumbnail lightbox" href="<?php echo IMAGES;?>projects/project-4.jpg" data-plugin-options='{ "type":"image" }'>
													<img class="img-responsive" width="215" src="<?php echo IMAGES;?>projects/project-4.jpg">
													<span class="zoom">
														<i class="fa fa-search"></i>
													</span>
												</a>
											</div>
										</div>
									</li>
								</ol>
							</div>
						</div>
					</div>
					<div id="edit" class="tab-pane">

						<form class="form-horizontal" method="get">
							<h4 class="mb-xlg">Personal Information</h4>
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileFirstName">Nama Lengkap</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileFirstName">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileLastName">Nama Panggilan</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileLastName">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileAddress">Alamat</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileAddress">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileCompany">Email</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileCompany">
									</div>
								</div>
							</fieldset>
							<hr class="dotted tall">
							<h4 class="mb-xlg">Sekilas mengenai Anda</h4>
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileBio">About Me</label>
									<div class="col-md-8">
										<textarea class="form-control" rows="3" id="profileBio"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-3 control-label mt-xs pt-none">Public</label>
									<div class="col-md-8">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-xs">
											<input type="checkbox" checked="" id="profilePublic">
											<label for="profilePublic"></label>
										</div>
									</div>
								</div>
							</fieldset>
							<hr class="dotted tall">
							<h4 class="mb-xlg">Social Media</h4>
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileFirstName">Link Facebook</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileFirstName">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileLastName">Link Twitter</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileLastName">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileAddress">Link Linkedin</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileAddress">
									</div>
								</div>
							</fieldset>
							<hr class="dotted tall">
							<h4 class="mb-xlg">Ganti Password</h4>
							<fieldset class="mb-xl">
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileNewPassword">Password Lama</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileNewPassword">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileNewPassword">Password Baru</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileNewPassword">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Ulagi Password Baru</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="profileNewPasswordRepeat">
									</div>
								</div>
							</fieldset>
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-9 col-md-offset-3">
										<button type="submit" class="btn btn-primary">Submit</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</div>
								</div>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-3">

			<h4 class="mb-md">Sale Stats</h4>
			<ul class="simple-card-list mb-xlg">
				<li class="primary">
					<h3>488</h3>
					<p>Nullam quris ris.</p>
				</li>
				<li class="primary">
					<h3>$ 189,000.00</h3>
					<p>Nullam quris ris.</p>
				</li>
				<li class="primary">
					<h3>16</h3>
					<p>Nullam quris ris.</p>
				</li>
			</ul>

			<h4 class="mb-md">Projects</h4>
			<ul class="simple-bullet-list mb-xlg">
				<li class="red">
					<span class="title">Porto Template</span>
					<span class="description truncate">Lorem ipsom dolor sit.</span>
				</li>
				<li class="green">
					<span class="title">Tucson HTML5 Template</span>
					<span class="description truncate">Lorem ipsom dolor sit amet</span>
				</li>
				<li class="blue">
					<span class="title">Porto HTML5 Template</span>
					<span class="description truncate">Lorem ipsom dolor sit.</span>
				</li>
				<li class="orange">
					<span class="title">Tucson Template</span>
					<span class="description truncate">Lorem ipsom dolor sit.</span>
				</li>
			</ul>

			<h4 class="mb-md">Messages</h4>
			<ul class="simple-user-list mb-xlg">
				<li>
					<figure class="image rounded">
						<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">
					</figure>
					<span class="title">Joseph Doe Junior</span>
					<span class="message">Lorem ipsum dolor sit.</span>
				</li>
				<li>
					<figure class="image rounded">
						<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joseph Junior" class="img-circle">
					</figure>
					<span class="title">Joseph Junior</span>
					<span class="message">Lorem ipsum dolor sit.</span>
				</li>
				<li>
					<figure class="image rounded">
						<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joe Junior" class="img-circle">
					</figure>
					<span class="title">Joe Junior</span>
					<span class="message">Lorem ipsum dolor sit.</span>
				</li>
				<li>
					<figure class="image rounded">
						<img src="<?php echo IMAGES;?>!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">
					</figure>
					<span class="title">Joseph Doe Junior</span>
					<span class="message">Lorem ipsum dolor sit.</span>
				</li>
			</ul>
		</div>

	</div>
	<!-- end: page -->
</section>
</div>
<?php
/*$SCRIPT_FOOT = "
<script>
(function( $ ) {
	'use strict';

	$(\"#form_submit\").submit(function(event){
				
		event.preventDefault();
		
		var values = $(this).serialize();
		var stack_bar_bottom = {\"dir1\": \"up\", \"dir2\": \"right\", \"spacing1\": 0, \"spacing2\": 0};
		
		$.ajax({
			url: \"ajax-kategori.php?p=add-cat\",
			type: \"POST\",
			data: values,
			success: function(response){
				var notice = new PNotify({
					title: 'Notification',
					text: 'Penambahan data berhasil di lakukan.',
					type: 'success',
					addclass: 'stack-bar-bottom',
					stack: stack_bar_bottom,
					width: \"60%\"
				});

				$(\"#isi_table\").html(response);

				$(\"#form_submit\")[0].reset();
			}
		 });
	});

	(function() {
		var plot = $.plot('#flotPie', flotPieData, {
			series: {
				pie: {
					show: true,
					combine: {
						color: '#999',
						threshold: 0.1
					}
				}
			},
			legend: {
				show: false
			},
			grid: {
				hoverable: true,
				clickable: true
			}
		});
	})();

}).apply( this, [ jQuery ]);
</script>
";*/
@include(AdminFooter);
?>