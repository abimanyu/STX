<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since Release 1.0
* @category     init_user_auth
*/

require_once(c_THEMES."conf.php");

if(USER){
	
	require_once(AdminHeader);
	if(c_QUERY == "keluar"){
		$opdata = (USER === TRUE) ? U_ID.".".U_PASS : "0";
		$sql -> db_Update("3E_meta_users", "meta_value='".time()."' WHERE user_id='".U_ID."' AND meta_key='U_LASTLOG' ");
		$sql -> db_Update("3E_meta_users", "meta_value='".getIP()."' WHERE user_id='".U_ID."' AND meta_key='U_IP' ");
	    
    	if($SITE_CONF_AUTOLOAD['tracking'] == "session"){ session_destroy(); $_SESSION[$SITE_CONF_AUTOLOAD['cookie']] = ""; }
    	isicookie($SITE_CONF_AUTOLOAD['cookie'], "", (time()-2592000));
    	echo "<script type='text/javascript'>document.location.href='".c_XELF."#TakeOff'</script>\n";
    	exit;
	}

}else{
	if(isset($_POST['LoginSubmit'])){
		$objek = new auth;

		$sandiuser = md5(md5(trim($_POST['authsandi'])));

		$row = $authresult = $objek -> authproses($_POST['authnama'], $sandiuser);
		if($row[0] == "salah"){
			echo "<script type='text/javascript'>document.location.href='?x'</script>\n";
		}else{
			$autolog = $_POST['autologin'];

			$cookiepass = md5(trim($_POST['authsandi']));
			$cookieval = $row['ID'].".".$cookiepass;

			$sql -> db_Insert("users_stat_login", "'0', '".$row['ID']."', NOW(), '".getIP()."', '".$_SERVER['HTTP_USER_AGENT']."','' ");
			$sql -> db_Update("3E_meta_users", "meta_value=meta_value+1 WHERE user_id='".$row['ID']."' AND meta_key='U_TOTAL_LOGIN' ");

			if($SITE_CONF_AUTOLOAD['tracking'] == "session"){
				$_SESSION[$SITE_CONF_AUTOLOAD['cookie']] = $cookieval;
				
			}else{
				if($autolog == 1){
						isicookie($SITE_CONF_AUTOLOAD['cookie'], $cookieval, ( time()+3600*24*7)); //7 hari
						
				}else{
					isicookie($SITE_CONF_AUTOLOAD['cookie'], $cookieval, ( time()+3600*24)); //1 hari
					
				}
			}
			// JANGAN_LUPA_FUNCTION_UPDATE_CACHE_STATISTIK()
			// blablabla
			define("USER", TRUE);

			echo "<script type='text/javascript'>document.location.href='".c_XELF."'</script>\n";
		}
	}
	
	$objek = new auth;

	if(c_QUERY == "x"){
		$isiteks = "Oops...";
		$objek -> tampilanlogin($isiteks);
		exit;
	}
	if(c_QUERY == "s"){
		$isiteks = "Pergantian Password SUKSES";
		$objek -> tampilanlogin($isiteks);
		exit;
	}

	if(USER == FALSE){
		$objek -> tampilanlogin();
		exit;
	}
}
/**

*/
class auth{

	function tampilanlogin($isiteks="Login panel"){
	global $SITE_CONF_AUTOLOAD;

$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, theme.css, default.css, theme-custom.css, modernizr.js";
$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, 
			jquery.placeholder.js, theme.js, theme.custom.js, theme.init.js";
			
@include(c_THEMES."meta.php");

$teks .= "
<body>
<section class=\"body-sign\">
	<div class=\"center-sign\">
		<a href=\"".c_LANDING."\" class=\"logo pull-left\">
			<img src=\"".IMAGES."logo.png\" height=\"54\" alt=\"".c_APP." Admin\" />
		</a>

		<div class=\"panel panel-sign\">
			<div class=\"panel-title-sign mt-xl text-right\">
				<h2 class=\"title text-uppercase text-bold m-none\"><i class=\"fa fa-user mr-xs\"></i> ".$isiteks."</h2>
			</div>
			<div class=\"panel-body\">
				<form action=\"".c_SELF."\" method=\"post\">
					<input type=\"hidden\" name=\"redirect_to\" value=\"".c_SELF."\" />

					<div class=\"form-group mb-lg\">
						<label>Username</label>
						<div class=\"input-group input-group-icon\">
							<input name=\"authnama\" type=\"text\" class=\"form-control input-lg\" />
							<span class=\"input-group-addon\">
								<span class=\"icon icon-lg\">
									<i class=\"fa fa-user\"></i>
								</span>
							</span>
						</div>
					</div>

					<div class=\"form-group mb-lg\">
						<div class=\"clearfix\">
							<label class=\"pull-left\">Password</label>
						</div>
						<div class=\"input-group input-group-icon\">
							<input name=\"authsandi\" type=\"password\" class=\"form-control input-lg\" />
							<span class=\"input-group-addon\">
								<span class=\"icon icon-lg\">
									<i class=\"fa fa-lock\"></i>
								</span>
							</span>
						</div>
					</div>

					<div class=\"row\">
						<div class=\"col-sm-8\">
							<div class=\"checkbox-custom checkbox-default\">
								<input id=\"RememberMe\" name=\"autologin\" type=\"checkbox\"/>
								<label for=\"RememberMe\">AutoLogin Selama 7 Hari</label>
							</div>
						</div>
						<div class=\"col-sm-4 text-right\">
							<button type=\"submit\" name=\"LoginSubmit\" value=\"Sign In\" class=\"btn btn-primary hidden-xs\">Sign In</button>
							<button type=\"submit\" name=\"LoginSubmit\" value=\"Sign In\" class=\"btn btn-primary btn-block btn-lg visible-xs mt-lg\">Sign In</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<p class=\"text-center text-muted mt-md mb-md\">
			&copy;".date("Y")." <a href=\"http://{$SITE_CONF_AUTOLOAD['WEBSITE_CLIENT']}/\">".c_CLIENT."</a>.<br/>
   			Powered by <a href=\"http://www.qapuas.com/\" title=\"".c_APP." \">".c_APP."</a> ".c_APPVER." - <a href=\"http://www.indobit.com/\" title=\"Indobit Technologies\">Indobit Technologies</a>
   		</p>
	</div>
</section>";

echo $teks;

include(AdminFooter);
	}
/**

*/
	function authproses($authnama, $authsandi){
		global $sql;
		$authnama = ereg_replace("\sOR\s|\=|\#", "", $authnama);
		if($sql -> db_Select("3E_users", "ID", "WHERE `user_login`='".$authnama."' AND `user_pass`='".$authsandi."'")){
			$row = $sql -> db_Fetch();
			return $row;
		}else{
			$row = array("salah");
			return $row;
		}		
	}
}
?>