<?php 
require('functions.php');
define("DB", "./database/db.txt");
if(!empty($_GET['id'])) {
    dell($_GET['id']);
    header("Location: dashboard.php");
}else{
	header("Location: dashboard.php");

}


function dell($id){
	$myDataBase = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($myDataBase as $data){
		$exp = explode(',',$data);
		$myid = $exp[4];
		if($myid==$id){
			$out = $data;
            $dell = str_replace($data,"",file_get_contents(DB));
            saveTxt(DB,$dell,'w');
            break;
        }else{
			$out = null;
		}
		
	}
	
return $out;

}
?>