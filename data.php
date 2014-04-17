<?php 
	$link = mysqli_connect('mysql.eecs.ku.edu', 'drmullin', 'skl00ker', 'drmullin')
			or die('Could not connect: ' . mysqli_connect_error());
      
     if (isset($_POST["metrics"])){
       $metric = $_POST["metrics"];
       
       
       if (isset($_POST["start_date"]) && isset($_POST["end_date"])){
          $start_date = $_POST["start_date"];
          $end_date = $_POST["end_date"];
          $gran = $_POST["gran"];
          switch ($gran){
            case "Hour": 
              $gran_val = 13;
              break;
            case "Day":
              $gran_val = 10;
              break;
            case "Month":
              $gran_val = 7;
              break;
            case "Year":
              $gran_val = 7;
              break;
            default:
              $gran_val = 0;
              break;
          }
          $query = "SELECT time, ROUND(AVG( " . $metric . " ), 2) AS " . $metric . "
              FROM Data
              WHERE " . $metric . " <>0
              AND STR_TO_DATE( TIME,  '%Y-%m-%d' ) >= STR_TO_DATE( '" .$start_date. "' ,  '%Y-%m-%d' ) 
			  AND STR_TO_DATE( TIME,  '%Y-%m-%d' ) <= STR_TO_DATE( '" .$end_date. "' ,  '%Y-%m-%d' ) 
              GROUP BY SUBSTR( TIME, 1, " . $gran_val . " ) 
              LIMIT 30"; 
       }else{
        $query = "SELECT time, " . $metric . " FROM Data ORDER BY time desc LIMIT 30;";
       }
     }else{
      $query = "SELECT * FROM Data ORDER BY time desc LIMIT 30;";
     }
			  /*    $query = "SELECT TIME, ROUND(AVG( temp ), 2)
		FROM Data
		WHERE temp <>0
		AND STR_TO_DATE( TIME,  '%Y-%m-%d' ) >= STR_TO_DATE(  '03/12/2010',  '%m/%d/%Y' ) 
		GROUP BY STR_TO_DATE( TIME,  '%Y-%m-%d' ) 
		LIMIT 30";*/
      $result = mysqli_query($link, $query);
      if(mysqli_num_rows($result) != 0){
		  $response["success"] = 1;
		  
          while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
          }
          $response["data"] = $data;
          echo json_encode($response);
          //echo json_encode(mysqli_fetch_array($result));
      }
      else{
        echo "Error.";
          die();
      }
?>
