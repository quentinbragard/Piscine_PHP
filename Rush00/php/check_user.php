<?php
include("db_connect.php");
function check_user($Email_address, $Password)
{
    $pwd = hash('whirlpool', $Password);
    try 
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $stmt = $conn->prepare("SELECT *
            FROM customers as a
            INNER JOIN passwords as b ON a.ID = b.ID WHERE a.Email_Address = '$Email_address'"); 
        $stmt->execute(); 
        while ($row = $stmt->fetch())
            if ($row['Email_Address'] == $Email_address && $row['Password'] == $pwd)
                return (TRUE);
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        return (FALSE);
    }
    $conn = null;
    return (FALSE);
}
?>