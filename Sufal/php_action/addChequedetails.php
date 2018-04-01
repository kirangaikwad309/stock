<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
echo "hiiiii";
	$ac_no = $_POST['ac_no'];
  $bnk_nm= $_POST['bnk_nm']; 
  $chq_no= $_POST['ckq_no'];
  $i_date= $_POST['i_date'];
	$sql = "INSERT INTO chq_payment (Account_no,Bank_nm,Cheque_no,Issue_date) 
	VALUES ('$ac_no', '$bnk_nm', '$chq_no','$i_date')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST

// Account no:<input type="text" name="ac_no" value=""><br><br>
// Bank name:<input type="text" name="bnk_nm" value=""><br><br>
// Cheque no:<input type="text" name="chq_no" value=""><br><br>
// Issue Date: <input type="text" name="i_date" value="">