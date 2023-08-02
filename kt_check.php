<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'UFT-8'>
        <title>주문 확인</title>
        <style>
        @font-face {
        font-family: 'Chosunilbo_myungjo';
        src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_one@1.0/Chosunilbo_myungjo.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        }
        body {
            text-align: center;
            font-family: 'Chosunilbo_myungjo';
            font-size: 20px;
            background-color: #2B2B28; 
            color: whitesmoke; 
        }
        div {
            text-align: right;
        }
        </style>
    </head>
    <body>
        <h2>주문 확인</h2>
        <br>
        <?php
        $count1 = $_GET['item1_num'];
        $count2 = $_GET['item2_num'];
        $count3 = $_GET['item3_num'];
        $count4 = $_GET['item4_num'];
        $count5 = $_GET['item5_num'];
        $count6 = $_GET['item6_num'];
        $total = $count1 + $count2 + $count3 + $count4 + $count5 + $count6;
        $price = $_GET['total_price'];

        echo "<div>Coffee (hot) ".$count1."개<br>";
        echo "Coffee (ice) ".$count2."개<br>";
        echo "Tea ".$count3."개<br>";
        echo "Coffee Bean ".$count4."개<br>";
        echo "Coffee Capsule ".$count5."개<br>";
        echo "Brownie ".$count6."개<br><br>";
        echo "총 ".$total."개<br><br>";
        echo number_format($price)."원</div>";

        $dbcon = mysqli_connect('localhost', 'root', '1234');
        mysqli_select_db($dbcon, 'kt_cafe');
        $query = "insert into kt_order"
        ?>
        <br><br><br>주문이 완료되었습니다.<br><br>
        <input type = 'button' value = '창닫기' onClick = 'save_order()'>
        <script>
            function save_order() {
                <?php
                $dbcon = mysqli_connect('localhost', 'root', '1234');
                mysqli_select_db($dbcon, 'kt_cafe');
                $query = "insert into kt_order values ($count1, $count2, $count3, $count4, $count5, $count6, $total, $price)";
                mysqli_query($dbcon, $query);
                mysqli_close($dbcon);
                ?>
                window.open('', '_self').close();
            }
        </script>
    </body>
</html>