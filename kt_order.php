<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'UFT-8'>
        <title>kiosk</title>
        <link rel = 'stylesheet' href = './style/kt_order.css'>
        <?php
        $dbcon = mysqli_connect('localhost', 'root', '1234');
        mysqli_select_db($dbcon, 'kt_cafe');
        $query = "select * from menu";
        $query2 = "select * from stock";
        $result = mysqli_query($dbcon, $query);
        $result2 = mysqli_query($dbcon, $query2);
        $row = mysqli_fetch_array($result);
        $row2 = mysqli_fetch_array($result2);
        mysqli_close($dbcon);
        ?>
        <script>
            var total_price = 0;
            var order_list = 0;
            var item1_num = 0;
            var item2_num = 0;
            var item3_num = 0;
            var item4_num = 0;
            var item5_num = 0;
            var item6_num = 0;

            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
            }

            function add_item1() {
                total_price = total_price + <?=$row['menu1']?>;
                item1_num = item1_num + 1;
                print_order();
            }

            function add_item2() {
                total_price = total_price + <?=$row['menu2']?>;
                item2_num = item2_num + 1;
                print_order();
            }

            function add_item3() {
                total_price = total_price + <?=$row['menu3']?>;
                item3_num = item3_num + 1;
                print_order();
            }

            function add_item4() {
                total_price = total_price + <?=$row['menu4']?>;
                item4_num = item4_num + 1;
                print_order();
            }

            function add_item5() {
                total_price = total_price + <?=$row['menu5']?>;
                item5_num = item5_num + 1;
                print_order();
            }

            function add_item6() {
                total_price = total_price + <?=$row['menu6']?>;
                item6_num = item6_num + 1;
                print_order();
            }

            function print_order() {
                order_list = "Coffee (hot) " + item1_num + "<br>Coffee (ice) " + item2_num + "<br>Tea " + item3_num + "<br>Coffee Bean " + item4_num + "<br>Coffee Capsule " + item5_num + "<br>Brownie " + item6_num;
                result_main.innerHTML = order_list;
                result_bottom.innerHTML = "총 " + numberWithCommas(total_price) + "원 <input type = 'button' id = 'order_button' value = '주문하기' onClick = 'order_button()'><input type = 'button' id = 'reset_button' value = '처음부터' onClick = 'reset_form()'>";
            }

            function order_button() {
                popup = window.open('kt_check.php?item1_num=' + item1_num + '&item2_num=' + item2_num + '&item3_num=' + item3_num + '&item4_num=' + item4_num + '&item5_num=' + item5_num + '&item6_num=' + item6_num + '&total_price=' + total_price, '', 'width = 300, height = 550');
            }

            function reset_form() {
                item1_num = 0;
                item2_num = 0;
                item3_num = 0;
                item4_num = 0;
                item5_num = 0;
                item6_num = 0;
                total_price = 0;
                print_order();
            }
        </script>
    </head>
    <body>
        <h1 class = "cafetitle"><span>Café</span></h1>
        <br><br>
        <div class = 'parent'>
            <div class = 'buttons'>
                <button type = 'button' class = 'menu_button' id = 'menu_button' onClick = 'add_item1()'><img src = './hot.png' width = '250px'></button><br>
                Coffee (Hot)<br>
                <?php
                if ($row2['menu1'] == '0') {
                    echo "품절";
                } else {
                    echo number_format($row['menu1'])."원";
                }
                ?>
            </div>
            <div class = 'buttons'>
                <button type = 'button' class = 'menu_button' id = 'menu_button' onClick = 'add_item2()'><img src = './ice.png' width = '200px' height = '250px'></button><br>
                Coffee (ice)<br>
                <?php
                if ($row2['menu2'] == '0') {
                    echo "품절";
                } else {
                    echo number_format($row['menu2'])."원";
                }
                ?>
            </div>
            <div class = 'buttons'>
                <button type = 'button' class = 'menu_button' id = 'menu_button' onClick = 'add_item3()'><img src = './tea.png' width = '250px'></button><br>
                Tea<br>
                <?php
                if ($row2['menu3'] == '0') {
                    echo "품절";
                } else {
                    echo number_format($row['menu3'])."원";
                }
                ?>
            </div>
        </div><br><br>
        <div class = 'parent'>
            <div class = 'buttons'>
                <button type = 'button' class = 'menu_button' id = 'menu_button' onClick = 'add_item4()'><img src = './bean.png' width = '230px' height = '230px'></button><br>
                Coffee Bean<br>
                <?php
                if ($row2['menu4'] == '0') {
                    echo "품절";
                } else {
                    echo number_format($row['menu4'])."원";
                }
                ?>
            </div>
            <div class = 'buttons'>
                <button type = 'button' class = 'menu_button' id = 'menu_button' onClick = 'add_item5()'><img src = './cap.png' width = '300px'></button><br>
                Coffee Capsule (10개입)<br>
                <?php
                if ($row2['menu5'] == '0') {
                    echo "품절";
                } else {
                    echo number_format($row['menu5'])."원";
                }
                ?>
            </div>
            <div class = 'buttons'>
                <button type = 'button' class = 'menu_button' id = 'menu_button' onClick = 'add_item6()'><img src = './brownie.png' width = '230px' height = '230px'></button><br>
                Brownie<br>
                <?php
                if ($row2['menu6'] == '0') {
                    echo "품절";
                } else {
                    echo number_format($row['menu6'])."원";
                }
                ?>
            </div>
        </div><br><br><br><br><br><br>
        <div class = 'order'>
            <div class = 'result_top'>
                주문 내역
            </div>
            <div class = 'result_main' id = 'result_main'>
                담긴 메뉴가 없습니다.
            </div>
            <div class = 'result_bottom' id = 'result_bottom'>
                총 0원
            <input type = 'button' id = 'order_button' value = '주문하기' onClick = 'order_button()'><input type = 'button' id = 'reset_button' value = '처음부터' onClick = 'reset_form()'>
            </div>
        </div><br><br>
        <div class = 'owner'>
            <a href = './kt_owner.php'>
                <img src = './setting.png' class = 'owner_img' width = '30'></a>
            <div class = 'owner_text'>관리자 페이지입니다.</div>
        </div>
        <div style = 'position: fixed; bottom: 5px; right: 5px'>
            <a href = '#'><img src = './top.png' title = '위로 가기' width = '70%'></a>
        </div>
    </body>
</html>