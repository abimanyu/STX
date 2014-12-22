<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since Release 1.0
* @category     database_class
*/

$MySQLHost = "127.0.0.1";
$MySQLUser = "root"; //user Mysql
$MySQLPasswd = "london"; //password Mysql
$MySQLDb = "projects_sinartex"; //Database yang di gunakan
$sql = new db;
$sql -> db_SetErrorReporting(FALSE);
$konek = $sql -> db_Connect($MySQLHost, $MySQLUser, $MySQLPasswd, $MySQLDb);
if($konek == "wadoh_ga_bisa_konek"){ die("GAK BISA CONNECT CUY!!"); exit;}
else if($konek == "wadoh_db_nya_mana_yah"){die("BAH! GAK ADA DATABASE!!"); exit;}

/**

*/
class db{

	var $MySQLHost;
	var $MySQLUser;
	var $MySQLPasswd;
	var $MySQLDb;
	var $mySQLaccess;
	var $mySQLresult;
	var $mySQLrows;
	var $mySQLerror;
/**

*/
	function db_Connect($MySQLHost, $MySQLUser, $MySQLPasswd, $MySQLDb){
		
		$this->MySQLHost = $MySQLHost;
		$this->MySQLUser = $MySQLUser;
		$this->MySQLPasswd = $MySQLPasswd;
		$this->MySQLDb = $MySQLDb;
		$temp = $this->mySQLerror;
		$this->mySQLerror = FALSE;
		if(!$this->mySQL_access = @mysql_connect($this->MySQLHost, $this->MySQLUser, $this->MySQLPasswd)){
			return "wadoh_ga_bisa_konek";
		}else{
			if(!@mysql_select_db($this->MySQLDb)){
				return "wadoh_db_nya_mana_yah";
			}else{
				$this->dbError("dbConnect/SelectDB");
			}
		}
	}
/**

*/
	function db_Select($table, $fields="*", $arg="", $mode="default"){
		global $dbq;
		$dbq++;

		//mode statis (default)
		if($arg != ""){

			if($this->mySQLresult = @mysql_query("SELECT ".$fields." FROM ".$table." ".$arg)){
				$this->dbError("dbQuery");
				return $this->db_Rows();
			}else{
				$this->dbError("db_Select (SELECT $fields FROM "."$table $arg)");
				return FALSE;
			}
		}
		
		else{

			if($this->mySQLresult = @mysql_query("SELECT ".$fields." FROM ".$table)){
				$this->dbError("dbQuery");
				return $this->db_Rows();
			}else{
				$this->dbError("db_Select (SELECT $fields FROM "."$table)");
				return FALSE;
			}		
		}
	}
/**

*/
	function db_Insert($table, $arg){

		if($result = $this->mySQLresult = @mysql_query("INSERT INTO ".$table." VALUES (".$arg.")" )){
			$tmp = mysql_insert_id();
			return $tmp;
		}else{
			$this->dbError("db_Insert");
			return FALSE;
		}
	}
/**

*/
	function db_Update($table, $arg){
		global $dbq;
		$dbq++;

		if($result = $this->mySQLresult = @mysql_query("UPDATE ".$table." SET ".$arg)){
			$result = mysql_affected_rows();
			return $result;
		}else{
			$this->dbError("db_Update ($arg)");
			return FALSE;
		}
	}
/**

*/
	function db_Fetch($mode = "strip"){
		if($row = @mysql_fetch_array($this->mySQLresult)){
			if($mode == "strip"){
				while (list($key,$val) = each($row)){
					$row[$key] = stripslashes($val);
				}
			}
			$this->dbError("db_Fetch");
			return $row;
		}else{
			$this->dbError("db_Fetch");
			return FALSE;
		}
	}
/**

*/
	function db_Close(){
		mysql_close();
		$this->dbError("dbClose");
	}
/**

*/
	function db_Delete($table, $arg=""){

		if($table == "user"){
			//echo "DELETE FROM ".$table." WHERE ".$arg."<br />";			// debug
		}
		if(!$arg){
			if($result = $this->mySQLresult = @mysql_query("DELETE FROM ".$table)){
				return $result;
			}else{
				$this->dbError("db_Delete ($arg)");
				return FALSE;
			}
		}else{
			if($result = $this->mySQLresult = @mysql_query("DELETE FROM ".$table." WHERE ".$arg)){
				$tmp = mysql_affected_rows();
				return $tmp;
			}else{
				$this->dbError("db_Delete ($arg)");
				return FALSE;
			}
		}
	}
/**

*/
	function db_Rows(){
		$rows = $this->mySQLrows = @mysql_num_rows($this->mySQLresult);
		return $rows;
		$this->dbError("db_Rows");
	}
/**

*/
	function dbError($from){
		if($error_message = @mysql_error()){
			if($this->mySQLerror == TRUE){
				return $error_message;
			}
		}
	}
/**

*/
	function db_SetErrorReporting($mode){
		$this->mySQLerror = $mode;
	}
/**

*/
	function db_Select_gen($arg){
		global $dbq;
		$dbq++;
		//echo "\mysql_query($arg)";
		if($this->mySQLresult = @mysql_query($arg)){
			$this->dbError("db_Select_gen");
			return $this->db_Rows();
		}else{
			$this->dbError("dbQuery ($query)");
			return FALSE;
		}
	}
/**

*/
	function db_Fieldname($offset){

		$result = @mysql_field_name($this->mySQLresult, $offset);
		return $result;
	}
/**

*/
	function db_Num_fields(){
		$result = @mysql_num_fields($this->mySQLresult);
		return $result;
	}
}
?>