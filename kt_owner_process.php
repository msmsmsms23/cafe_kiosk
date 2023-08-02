<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'UFT-8'>
        <meta http-equiv="refresh" content="5">
        <title>관리자 페이지</title>
        <link rel = 'stylesheet' href = './style/kt_order.css'>
    </head>
    <body>
        <h2>관리자 페이지</h2>
        </form>
    <?php
    $dbcon = mysqli_connect('localhost', 'root', '1234');
    mysqli_select_db($dbcon, 'kt_cafe');
    $query = "select * from kt_order";
    $result = mysqli_query($dbcon, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "Coffee (hot): ".$row['menu1']."개 ";
        echo "Coffee (ice): ".$row['menu2']."개 ";
        echo "Tea: ".$row['menu3']."개 ";
        echo "Coffee Bean: ".$row['menu4']."개 ";
        echo "Coffee Capsule: ".$row['menu5']."개 ";
        echo "Brownie: ".$row['menu6']."개 ";
        echo "<br><br><br>";
    }
    mysqli_close($dbcon);
    ?>
    </body>
</html>