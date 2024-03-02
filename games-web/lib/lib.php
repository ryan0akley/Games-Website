<?php
	require_once "dbconnect_string.php";
        function db_connect(){
		global $g_dbconnect_string;
		$g_dbconnect_string="host=mcsdb.utm.utoronto.ca port=5432 dbname=oakleyry_309 user=oakleyry password=13095";
                $dbconn = pg_connect($g_dbconnect_string);
                if(!$dbconn){
			$system_errors[] = "Can't connect to the database.";
			return null;
		} else return $dbconn;
        }

	// return the errors in a standard format
        function view_errors($e){
                $s="";
                foreach($e as $key=>$value){
                        $s .= "<br/> $value";
                }
                return $s;
        }
?>
