<?php  
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=csms", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

if (!isset($_SESSION)) {
  session_start();
}


?>
<?php

$colname_rsUserInfo = $_SESSION['User_Name'];


$query_rsUserInfo = "SELECT * FROM `users` WHERE User_Name = '$colname_rsUserInfo'";

$rsUserInfo = $conn->prepare($query_rsUserInfo);
$rsUserInfo->execute();
$row_rsUserInfo=$rsUserInfo->fetchAll(PDO::FETCH_OBJ);
$totalRows_rsUserInfo=$rsUserInfo->rowCount();

 
?>

<?php 

 $filename=$_POST['InvoiceNumber'];
 $path=$_POST['folder_name'];
$query_rsUserInfo1 = "SELECT * FROM stock WHERE folder_name like '%".$filename."%'  ORDER BY SID DESC LIMIT 1;";

$rsUserInfo1 = $conn->prepare($query_rsUserInfo1);
$rsUserInfo1->execute();
$row_rsUserInfo1=$rsUserInfo1->fetchAll(PDO::FETCH_OBJ);
$totalRows_rsUserInfo1=$rsUserInfo1->rowCount();
$row_rsUserInfo1['row']=$totalRows_rsUserInfo1;

if ($totalRows_rsUserInfo1 >= 1) {
	 echo json_encode($row_rsUserInfo1);
}
else{
	 echo "0";
}



/**
 $.ajax({
        url: 'uploadtry.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
          if(php_script_response == 0){
            alert('yeess')
           // display response from the PHP script, if any
          }
          else{
alert('No')
          }
       // alert(php_script_response)
           //location.reload();

        }
     });


     **/
?>
