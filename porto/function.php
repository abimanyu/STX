<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     themes_functions
*/

function ITEM_HEAD ($ITEM_HEAD) {
    $pecah = explode (",", $ITEM_HEAD);

    $base = array (
                    "bootstrap.css"         => "\n<link rel=\"stylesheet\" href=\"".VENDOR."bootstrap/css/bootstrap.css\" />", 
                    "font-awesome.css"      => "\n<link rel=\"stylesheet\" href=\"".VENDOR."font-awesome/css/font-awesome.css\" />",
                    "magnific-popup.css"    => "\n<link rel=\"stylesheet\" href=\"".VENDOR."magnific-popup/magnific-popup.css\" />",
                    "datepicker3.css"       => "\n<link rel=\"stylesheet\" href=\"".VENDOR."bootstrap-datepicker/css/datepicker3.css\" />",

                    "jquery-ui.min.css"    => "\n<link rel=\"stylesheet\" href=\"".VENDOR."jquery-ui/css/ui-lightness/jquery-ui.min.css\" />",
                    "pnotify.custom.css"    => "\n<link rel=\"stylesheet\" href=\"".VENDOR."pnotify/pnotify.custom.css\" />",
                    "morris.css"            => "\n<link rel=\"stylesheet\" href=\"".VENDOR."morris/morris.css\" />",
                    "select2.css"           => "\n<link rel=\"stylesheet\" href=\"".VENDOR."select2/select2.css\" />",
                    "datatables.css"        => "\n<link rel=\"stylesheet\" href=\"".VENDOR."jquery-datatables-bs3/assets/css/datatables.css\" />",
                    "bootstrap-multiselect.css"=> "\n<link rel=\"stylesheet\" href=\"".VENDOR."bootstrap-multiselect/bootstrap-multiselect.css\" />",
                    //"bootstrap-timepicker.css"        => "\n<link rel=\"stylesheet\" href=\"".VENDOR."bootstrap-timepicker/css/bootstrap-timepicker.css\" />",



                    //"dropzone_basic.css"    => "\n<link rel=\"stylesheet\" href=\"".VENDOR."dropzone/css/basic.css\" />",
                    //"dropzone.css"          => "\n<link rel=\"stylesheet\" href=\"".VENDOR."dropzone/css/dropzone.css\" />",

                    "theme.css"             => "\n<link rel=\"stylesheet\" href=\"".CSS."theme.css\" />",
                    "default.css"           => "\n<link rel=\"stylesheet\" href=\"".CSS."skins/default.css\" />",
                    "theme-custom.css"      => "\n<link rel=\"stylesheet\" href=\"".CSS."theme-custom.css\" />",                    
                    //JS
                    "modernizr.js"          => "\n<script src=\"".VENDOR."modernizr/modernizr.js\"></script>"

                );
    foreach($pecah as $k){
        echo $base[trim($k)];
    }
}


function ITEM_FOOT ($ITEM_FOOT) {
    global $ModuleDir;
    $FOOT_EX = explode (",", $ITEM_FOOT);

    $FOOT_base = array (
                    //VENDOR
                    "jquery.js"                 => "\n<script src=\"".VENDOR."jquery/jquery.js\"></script>",
                    "jquery.browser.mobile.js"  => "\n<script src=\"".VENDOR."jquery-browser-mobile/jquery.browser.mobile.js\"></script>",
                    "bootstrap.js"              => "\n<script src=\"".VENDOR."bootstrap/js/bootstrap.js\"></script>",
                    "nanoscroller.js"           => "\n<script src=\"".VENDOR."nanoscroller/nanoscroller.js\"></script>",
                    "bootstrap-datepicker.js"   => "\n<script src=\"".VENDOR."bootstrap-datepicker/js/bootstrap-datepicker.js\"></script>",
                    "magnific-popup.js"         => "\n<script src=\"".VENDOR."magnific-popup/magnific-popup.js\"></script>",
                    "jquery.placeholder.js"     => "\n<script src=\"".VENDOR."jquery-placeholder/jquery.placeholder.js\"></script>",

                    //Tambahan
                    "jquery-ui.min.js"    => "\n<script src=\"".VENDOR."jquery-ui/js/jquery-ui.min.js\"></script>",
                    "jquery.easypiechart.js"    => "\n<script src=\"".VENDOR."jquery-easypiechart/jquery.easypiechart.js\"></script>",
                    "pnotify.custom.js"         => "\n<script src=\"".VENDOR."pnotify/pnotify.custom.js\"></script>",
                    "jquery.maskedinput.js"     => "\n<script src=\"".VENDOR."jquery-maskedinput/jquery.maskedinput.js\"></script>",
                    "select2.js"                => "\n<script src=\"".VENDOR."select2/select2.js\"></script>",
                    "jquery.autosize.js"        => "\n<script src=\"".VENDOR."jquery-autosize/jquery.autosize.js\"></script>",
                    "bootstrap-multiselect.js"  => "\n<script src=\"".VENDOR."bootstrap-multiselect/bootstrap-multiselect.js\"></script>",
                    "jquery.flot.js"            => "\n<script src=\"".VENDOR."flot/jquery.flot.js\"></script>",
                    "jquery.flot.tooltip.js"    => "\n<script src=\"".VENDOR."flot-tooltip/jquery.flot.tooltip.js\"></script>",
                    "jquery.flot.categories.js" => "\n<script src=\"".VENDOR."flot/jquery.flot.categories.js\"></script>",
                    "snap.svg.js"               => "\n<script src=\"".VENDOR."snap-svg/snap.svg.js\"></script>",
                    "liquid.meter.js"           => "\n<script src=\"".VENDOR."liquid-meter/liquid.meter.js\"></script>",
                    "landing.js"                => "\n<script src=\"".c_LANDING."landing.js\"></script>",
                    "customer-custom.js"        => "\n<script src=\"".c_URL.$ModuleDir."customer/customer-custom.js\"></script>",
                    "jquery.dataTables.js"      => "\n<script src=\"".VENDOR."jquery-datatables/media/js/jquery.dataTables.js\"></script>",
                    "dataTables.tableTools.min.js"=> "\n<script src=\"".VENDOR."jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js\"></script>",
                    "datatables.js"             => "\n<script src=\"".VENDOR."jquery-datatables-bs3/assets/js/datatables.js\"></script>",
                    //"bootstrap-timepicker.js"   => "\n<script src=\"".VENDOR."bootstrap-timepicker/js/bootstrap-timepicker.js\"></script>",


                    //"dropzone.js"               => "\n<script src=\"".VENDOR."dropzone/dropzone.js\"></script>",
                    "jquery.appear.js"          => "\n<script src=\"".VENDOR."jquery-appear/jquery.appear.js\"></script>",
                    "jquery.flot.pie.js"        => "\n<script src=\"".VENDOR."flot/jquery.flot.pie.js\"></script>",                    
                    //"jquery.flot.resize.js"     => "\n<script src=\"".VENDOR."flot/jquery.flot.resize.js\"></script>",
                    //"jquery.sparkline.js"       => "\n<script src=\"".VENDOR."jquery-sparkline/jquery.sparkline.js\"></script>",
                    "raphael.js"                => "\n<script src=\"".VENDOR."raphael/raphael.js\"></script>",
                    "morris.js"                 => "\n<script src=\"".VENDOR."morris/morris.js\"></script>",
                    "gauge.js"                  => "\n<script src=\"".VENDOR."gauge/gauge.js\"></script>",
                    
                    
                    //base
                    "theme.js"                  => "\n<script src=\"".JS."theme.js\"></script>",
                    "theme.custom.js"           => "\n<script src=\"".JS."theme.custom.js\"></script>",
                    "theme.init.js"             => "\n<script src=\"".JS."theme.init.js\"></script>",

                    //custom
                    "engine-kategori-pie.js"    => "\n<script src=\"".c_MODULEDIR."produk/engine-kategori-pie.js\"></script>",
                    //"examples.dashboard.js"     => "\n<script src=\"".JS."dashboard/examples.dashboard.js\"></script>",
                    "examples.charts.js"        => "\n<script src=\"".JS."ui-elements/examples.charts.js\"></script>"

                );
    foreach($FOOT_EX as $FOOT){
        echo $FOOT_base[trim($FOOT)];
    }
}

function SCRIPT_FOOT ($SCRIPT_FOOT = "") {
    if (!empty($SCRIPT_FOOT)) {
        echo $SCRIPT_FOOT;
    }else return true;
}

function VIEW_CHILD_CATEGORY($parent="0", $level="0") {
  $sqld = new db;
  $sqld -> db_Select("category", "cat_id, cat_name, cat_count", "WHERE `cat_type`='cat_item' AND `parent_id`='{$parent}' GROUP BY cat_id");

  while ($row = $sqld-> db_Fetch()) {
    echo "
    <tr>
        <td>".str_repeat('—',$level)." ".$row['cat_name']."</td>
        <td>".$row['cat_name']."</td>
        <td>".$row['cat_count']."</td>
        <td class=\"actions-hover actions-fade\">
            <a href=\"".c_SELF."?action=edit&id=".$row['cat_id']."\"><i class=\"fa fa-pencil\"></i></a>
            <a href=\"".c_SELF."?action=delete&id=".$row['cat_id']."\" class=\"delete-row\"><i class=\"fa fa-trash-o\"></i></a>
        </td>
    </tr>
    ";
    VIEW_CHILD_CATEGORY($row['cat_id'], $level+1);
  }
}

function SELECT_CHILD_CATEGORY($parent="0", $level="0") {
  $sqld = new db;
  $sqld -> db_Select("category", "cat_id, cat_name", "WHERE `cat_type`='cat_item' AND `parent_id`='{$parent}' GROUP BY cat_id");
  while ($row = $sqld-> db_Fetch()) {
    echo "<option value=\"{$row['cat_id']}\">".str_repeat('├',$level)." {$row['cat_name']}</option>";
    SELECT_CHILD_CATEGORY($row['cat_id'], $level+1);
  }
}

function CEK_PASSWORD_EXPIRED() {
	if(((OPPWCHANGE+2592000) < time()) && (c_PAGE != "ubah_passwords.php")) {
		echo "
		<!-- Password Expired -->
        <div class=\"nNote nWarning hideit\">
            <p><strong>WARNING: </strong>Untuk keamanan, Silakan ganti password anda secara berkala.</span>
	Password anda telah 30 hari Tidak diGanti. <a href='". c_LANDING ."ubah_passwords.php'>Ubah Password disini</a></p>
        </div>";
    }
}


function GET_AVATAR_IMAGES ( $email ) {
	$email = trim ($email);
	$email = strtolower ($email);
	$email = md5 ( $email );
	return "http://www.gravatar.com/avatar/".$email;
}

/*
 * Statistik bar Admin page
 */
function STATISTIK_BAR(){
}

/*
 * cek available id slug tag, cat
 */
function is_available_id_taxonomy ( $id ) {
    $sql = new db;
    $sql -> db_Select("3E_taxonomy", "taxonomy_id", "taxonomy_id='{$id}'");
    if ($sql->db_Rows()) {
        return TRUE;
    }
    else { return FALSE;}
}

/*
 * SEO url friendly
 */
function create_flag_text ( $text ) {
    $rewrite_text = preg_replace('/\%/',' percentage',$text); 
    $rewrite_text = preg_replace('/\@/',' at ',$rewrite_text); 
    $rewrite_text = preg_replace('/\&/',' and ',$rewrite_text); 
    $rewrite_text = preg_replace('/\s[\s]+/','-',$rewrite_text); // Strip off multiple spaces 
    $rewrite_text = preg_replace('/[\s\W]+/','-',$rewrite_text); // Strip off spaces and non-alpha-numeric 
    $rewrite_text = preg_replace('/^[\-]+/','',$rewrite_text); // Strip off the starting hyphens 
    $rewrite_text = preg_replace('/[\-]+$/','',$rewrite_text); // // Strip off the ending hyphens 
    $rewrite_text = strtolower($rewrite_text);
    return $rewrite_text;
}

/*
 * Duit Format
 */
function duit($xx) {
    if (empty($xx)){ return $xx;}else {
    $x = trim($xx);
    $b = number_format($x, 0, ",", ".");
    return $b;
    }
}

/*
 * tanggal Format
 */
function tanggal($xx) {
    $r = explode("-", $xx);
    return $r[2]."-".$r[1]."-".$r[0];
}
/*
 * Get Count
 */
function get_count($table, $coloumn, $ident=""){
    $sql2 = new db;

    if(empty($ident)) {
        $sql2 -> db_Select($table, $coloumn);
    }
    else {
        $sql2 -> db_Select($table, $coloumn, $ident);
    }

    if ( $sql2->db_Rows() ) { return $sql2->db_Rows();}
    else {return 0;}
}

?>