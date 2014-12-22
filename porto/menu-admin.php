<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     Menu Themes
*/
if (SUBADMIN) {
echo "
<div class=\"inner-wrapper\">
<aside id=\"sidebar-left\" class=\"sidebar-left\">
                
<div class=\"sidebar-header\">
<div class=\"sidebar-title\">Navigation</div>
<div class=\"sidebar-toggle hidden-xs\" data-toggle-class=\"sidebar-left-collapsed\" data-target=\"html\" data-fire-event=\"sidebar-left-toggle\"><i class=\"fa fa-bars\" aria-label=\"Toggle sidebar\"></i></div>
</div>

<div class=\"nano\">
<div class=\"nano-content\">
<nav id=\"menu\" class=\"nav-main\" role=\"navigation\">
<ul class=\"nav nav-main\">
<li class=\"landing\"><a href=\"".c_LANDING."\"><i class=\"fa fa-home\" aria-hidden=\"true\"></i><span>Dashboard</span></a></li>";

require_once c_MODULE."module.php";

echo "
<li class=\"st\"><a href=\"#\"><i class=\"fa fa-cogs\" aria-hidden=\"true\"></i><span>Settings <em class=\"not-included\">(Global)</em></span></a></li>
</ul>
</nav>
<hr class=\"separator\" />
<div class=\"sidebar-widget widget-stats\">
<div class=\"sidebar-copyright\">
    <p>&copy;2015 ".c_APP." ".c_APPVER.".</p>
    <p>".c_CLIENT.". All Rights Reserved.</p>
</div>
</div>
</div>
</div>
</aside>
";
}
//CEK_PASSWORD_EXPIRED();
?>