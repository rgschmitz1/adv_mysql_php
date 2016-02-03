<html>
    <head>
        <title>Output from our PHP form</title>
    </head>
    <body>
<?php
    if (isset($_REQUEST['secret_key']) && $_REQUEST['secret_key'] == 'some secret value') {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $state = $_GET['state'];

        $tbell = isset($_GET['tbell']);
        $mcdonalds = isset($_GET['mcdonalds']);
        $bk = isset($_GET['bk']);
        $kfc = isset($_GET['kfc']);

        $color = $_GET['color'];

        echo "tbell: $tbell<br />";
        echo "mcdonalds: $mcdonalds<br />";
        echo "bk: $bk<br />";
        echo "kfc: $kfc<br />";
        echo $name, "<br />", $email, "<br />", print_r($state), "<br />", $color;
    } else {
        header('Location: form.php');
    }
?>
    </body>
</html>
