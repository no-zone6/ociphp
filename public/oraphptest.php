<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 接続テスト</title>
    </head>
    <body>
        <h1>Oracle PHP接続テスト</h1>
        <?PHP
            $user = '';
            $pass = '';
            $connstr = '';

            $conn = oci_connect($user, $pass, $connstr);
            if(!$conn){
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                echo "<p>".$e."</p>";
            }

            $stid = oci_parse($conn, 'SELECT SYSDATE FROM DUAL');
            oci_execute($stid);

            echo "<h2>現在時刻：";
            while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)){
                $time = $row['SYSDATE'];
                echo $time."</h2>";
            }
        ?>
    </body>
</html>

