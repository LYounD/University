
<?php
add_database();

function add_database(){
require_once __DIR__ . '/database_conf.php';
require_once '/h.php';

	$addTitle = $_COOKIE['addTitle'];
	$addText = $_COOKIE['addText'];
	$addDate = $_COOKIE['addDate'];

//echo "<script>alert('$addTitle');</script>";
//print($addTitle);

if( ($addTitle != null )&&($addText != null) || ($addTitle != '' )&&($addText != '' ) ){
	parse_str($_COOKIE['addTitle'], $output);
	parse_str($_COOKIE['addText'], $output2);
	parse_str($_COOKIE['addDate'], $output3);
}
	
	
	try{//접속
		$db = new PDO("sqlite:sangjun.db");
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<script>alert(\"데이터 베이스 저장됨\");</script>";
		$sql = "delete from sangjun;";
		$prepare = $db->prepare($sql);
		$prepare->execute();
		
		foreach( $output as $key=>$value){
			$value_title = $value;
			//echo "<script>alert('$value');</script>";
			foreach( $output2 as $key2=>$value){
			$value_text = $value;
				foreach( $output3 as $key3=>$value){
					$index = $key;
					$value_date = $value;
				}
			}
		
		$sql = "insert into sangjun(addTitle,addText,addDate) values (:value_title,:value_text,:value_date);";
		$prepare = $db->prepare($sql);
		
		$prepare->execute([':value_title' => $value_title,':value_text' => $value_text, ':value_date' => $value_date]);
		}
		$id = $db->lastInsertId();
		
	} catch (PDOException $e) {
		echo '에러가 발생했습니다. 내용: ' . h($e->getMessage());
	}
	
}

?>
