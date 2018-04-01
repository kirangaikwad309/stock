
<?php
ob_start();
session_start();
require_once 'php_action/db_connect.php';
	
	 if(isset($_POST['save']))
	 {
    $ac_no="";
    $bnk_nm="";
    $chq_no="";
    $i_date=""; 
    
	 $ac_no=$_POST['ac_no'];
	 $bnk_nm=$_POST['bnk_nm'];
	 $chq_no=$_POST['chq_no'];
   $i_date=$_POST['i_date'];
   
   // prepare and bind
  $stmt = $connect->prepare("INSERT INTO chq_payment (Account_no,Bank_nm,Cheque_no,Issue_date) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $ac_no, $bnk_nm,$chq_no, $i_date);
  echo "$ac_no";
   $result=$stmt->execute();
   echo "New records created successfully";
     echo "$ac_no";

    $stmt->close();
    mysqli_close($connect);
	
   
  // $query="INSERT INTO 	chq_payment(Account_no,Bank_nm,Cheque_no,Issue_date) VALUES ($ac_no,'$bnk_nm',$chq_no,$i_date)";
	//  if($connect)
	//  {
	// 	 mysqli_query($connect,$query);
	// 	 if(mysqli_affected_rows($connect)>0)
	// 	 {
	// 	 echo "record is inserted";
		 
	// 	 }
	// 	 else
	// 	 {
	// 	 echo "record is not inserted";
	// 	 }
	// 	}
        // header("Location: makeinvoice.php");
    }
     
     ?>
     

  <?php ob_end_flush(); ?>