<?php
include("add_cust_to_db.php");
if (!$_POST['Email_Address'] || !$_POST['Password'])
{
    header('Location: ../html/create_error.html');
    exit ;
}
$Email_address = $_POST['Email_Address'];
try 
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $stmt = $conn->prepare("SELECT COUNT(*) FROM customers WHERE Email_Address = '$Email_address'"); 
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row['COUNT(*)'] == 1)
        {
            header('Location: ../html/create_error.html');
            exit ;
        }  
    }
catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        exit ;
    }
add_cust_to_db($_POST['First_Name'], $_POST['Last_Name'], $_POST['Email_Address'], $_POST['Phone_Number'], $_POST['Programm'], $_POST['Password']);
    $conn = null;
header('Location: ../html/index.html');
?>