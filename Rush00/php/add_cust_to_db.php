<?php
include("db_connect.php");
function add_cust_to_db($First_Name, $Last_Name, $Email_Address, $Phone_Number, $Program, $Password)
{
    $pwd = hash('whirlpool', $Password);
    try
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Customers (First_Name, Last_Name, Email_Address, Phone_Number, Program, ID)
        VALUES ('$First_Name', '$Last_Name', '$Email_Address', '$Phone_Number', '$Program', NULL)";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully\n";
        $stmt = $conn->prepare("SELECT Email_Address, ID FROM customers WHERE Email_Address = '$Email_Address'"); 
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row['Email_Address'])
            $ID = $row['ID'];
        echo "ID = ".$ID."\n";
        $sql = "INSERT INTO Passwords (ID, Password)
        VALUES ('$ID', '$pwd')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Password added\n";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
        return (FALSE);
    }
    $conn = null;
    return (TRUE);
}

?>