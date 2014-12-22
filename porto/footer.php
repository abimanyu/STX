<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     Themes Footer
*/
if (USER) {
echo "
<aside id=\"sidebar-right\" class=\"sidebar-right\">
	<div class=\"nano\">
		<div class=\"nano-content\">
			<a href=\"#\" class=\"mobile-close visible-xs\">
				Collapse <i class=\"fa fa-chevron-right\"></i>
			</a>

			<div class=\"sidebar-right-wrapper\">

				<div class=\"sidebar-widget widget-calendar\">
					<h6>Upcoming Tasks</h6>
					<div data-plugin-datepicker data-plugin-skin=\"dark\" ></div>
				</div>

				<hr class=\"separator\" />

	            <div class=\"sidebar-widget widget-stats\">
	                <div class=\"widget-header\">
	                    <h6>Development Stats</h6>
	                    <div class=\"widget-toggle\">+</div>
	                </div>
	                <div class=\"widget-content\">
	                    <ul>
	                        <li>
	                            <span class=\"stats-title\">Admin Pages</span>
	                            <span class=\"stats-complete\">80%</span>
	                            <div class=\"progress\">
	                                <div class=\"progress-bar progress-bar-primary progress-without-number\" role=\"progressbar\" aria-valuenow=\"80\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 80%;\">
	                                    <span class=\"sr-only\">80% Complete</span>
	                                </div>
	                            </div>
	                        </li>
	                        <li>
	                            <span class=\"stats-title\">Core System</span>
	                            <span class=\"stats-complete\">60%</span>
	                            <div class=\"progress\">
	                                <div class=\"progress-bar progress-bar-primary progress-without-number\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%;\">
	                                    <span class=\"sr-only\">60% Complete</span>
	                                </div>
	                            </div>
	                        </li>
	                        <li>
	                            <span class=\"stats-title\">Apps System</span>
	                            <span class=\"stats-complete\">60%</span>
	                            <div class=\"progress\">
	                                <div class=\"progress-bar progress-bar-primary progress-without-number\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%;\">
	                                    <span class=\"sr-only\">60% Complete</span>
	                                </div>
	                            </div>
	                        </li>
	                    </ul>
	                </div>
	            </div>

	            <hr class=\"separator\" />

				<div class=\"sidebar-widget widget-friends\">
					<h6>OPERATOR</h6>
					<ul>
						<li class=\"status-online\">
							<figure class=\"profile-picture\">
								<img src=\"".IMAGES."!sample-user.jpg\" alt=\"Rini\" class=\"img-circle\">
							</figure>
							<div class=\"profile-info\">
								<span class=\"name\">Rini</span>
								<span class=\"title\">Process Order</span>
							</div>
						</li>
						<li class=\"status-offline\">
							<figure class=\"profile-picture\">
								<img src=\"".IMAGES."!sample-user.jpg\" alt=\"Nurul\" class=\"img-circle\">
							</figure>
							<div class=\"profile-info\">
								<span class=\"name\">Nurul</span>
								<span class=\"title\">Management</span>
							</div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
</aside>
</section>
";
}

ITEM_FOOT($ITEM_FOOT);
SCRIPT_FOOT($SCRIPT_FOOT);
echo "
</body>
</html>
";

if($sql) $sql -> db_Close();
?>