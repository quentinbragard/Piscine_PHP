<?php
session_start();
include("auth.php");
if (!isset($_POST['login']) || !isset($_POST['passwd']))
{
    echo "ERROR\n";
    exit ;
}
if (auth($_POST['login'], $_POST['passwd']))
{
    $_SESSION['loggued_on_user'] = $_POST['login'];
    echo "OK\n";
    ?>
    <html>
        <iframe
            id="inlineFrameExample"
            title="Inline Frame Example"
            width="300"
            height="200"
            src="create.html">
            <iframe
                id="inlineFrameExample"
                title="Inline Frame Example"
                width="150"
                height="100"
                src="modif.html">
            </iframe>
        </iframe>
    </html>
    <?php
}
else
{
    $_SESSION['loggued_on_user'] = NULL;
    echo "ERROR\n"; 
}
?>