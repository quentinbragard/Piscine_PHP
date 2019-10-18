<?php
session_start();
include("db_connect.php");
function check_if_admin($Email_address, $Password, $is_loggued)
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
        {
            if ($is_loggued == 0 && $row['Email_Address'] == $Email_address && $row['Password'] == $pwd && $row['Admin'] == 1)
                return (TRUE);
            if ($is_loggued == 1 && $row['Email_Address'] == $Email_address && $row['Admin'] == 1)
                return (TRUE);
        }
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        return (FALSE);
    }
    $conn = null;
    return (FALSE);
}
if (!isset($_POST['login']) || !isset($_POST['passwd']))
{
    header('Location: ../html/login_error.html');
    exit ;
}
if (check_if_admin($_POST['login'], $_POST['passwd']))
{
    $_SESSION['loggued_on_user'] = $_POST['login'];
    header('Location: ../php/admin_space.php');

}
else
    header('Location: ../html/login_error.html');
?>