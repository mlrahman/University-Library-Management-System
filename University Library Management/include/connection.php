    <?php
		//session_start();
	$db_host='localhost';
	$db_user='root';
	$db_password='';
	$db_name='neub_library';

	$con=mysql_connect($db_host,$db_user,$db_password) or die ('Cannot connect to the database.');
	$db=mysql_select_db($db_name);
	mysql_query('SET CHARACTER SET utf8');
	mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 
	
	
	
	
	// PDO connect *********
		function connect() {
			return new PDO('mysql:host=localhost;dbname=neub_library', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		
	function call_time($date)
	{
		  $offset=5*60*60; //converting 5 hours to seconds.
		  $dateFormat="d";
		  $d2=gmdate($dateFormat, time()+$offset);
		  $dateFormat="m";
		  $m2=gmdate($dateFormat, time()+$offset);
	      $dateFormat="Y";
		  $y2=gmdate($dateFormat, time()+$offset);
		  $d1=$date[0].''.$date[1];
		  $m1=$date[3].''.$date[4];
		  $y1=$date[6].''.$date[7].''.$date[8].''.$date[9];
	  if($d1>$d2)
	  {
		$d2=$d2+30;
		$m1=$m1+1;
	  }
	   if($m1>$m2)
		{$m2=$m2+12;
		$y1=$y1+1;}
	   $da=$d2-$d1;
	   $mon=$m2-$m1;
	   $age=$y2-$y1;
	   $age=$age*12;
	   $mon=$mon+$age;
	   $tiii=$mon.' months, '.$da.' days.';
		return $tiii;
	}
    ?>