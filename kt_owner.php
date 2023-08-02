<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'UFT-8'>
        <title>관리자 페이지</title>
        <link rel = 'stylesheet' href = './style/kt_order.css'>
    </head>
    <body>
        <h2>관리자 페이지</h2>
        <form action = '#' method = 'post'>
            수정할 메뉴:
            <select name = 'menu' size = '1'>
                <option value = '0'>- 메뉴 선택 -</option>
                <option value = '1'>Coffee (Hot)</option>
                <option value = '2'>Coffee (Ice)</option>
                <option value = '3'>Tea</option>
                <option value = '4'>Coffee Bean</option>
                <option value = '5'>Coffee Capsule</option>
                <option value = '6'>Brownie</option>
            </select><br>
            가격: <input type = "text" name = "price" size = "10" placeholder = "필수 입력" style = "text-align: right" required> 원<br>
            수량: <input type = 'text' name = "stock" size = "17" placeholder = "'0' 기재 시 품절로 등록" style = 'text-align: right'> 개<br>
            <input type = 'submit' value = '완료'><br>
        </form><br><br>
        <a href = './kt_owner_process.php' style = 'text-decoration: none; color: lightgrey;'>주문 내역 확인 (클릭)</a>
    <?php
    $menu = $_POST['menu'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $dbcon = mysqli_connect('localhost', 'root', '1234');
    mysqli_select_db($dbcon, 'kt_cafe');

    switch ($menu) {
        case '1':
            $query = "update menu set menu1 = $price";
            $query2 = "update stock set menu1 = $stock";
            break;
        case '2':
            $query = "update menu set menu2 = $price";
            $query2 = "update stock set menu2 = $stock";
            break;
        case '3':
            $query = "update menu set menu3 = $price";
            $query2 = "update stock set menu3 = $stock";
            break;
        case '4':
            $query = "update menu set menu4 = $price";
            $query2 = "update stock set menu4 = $stock";
            break;
        case '5':
            $query = "update menu set menu5 = $price";
            $query2 = "update stock set menu5 = $stock";
            break;
        case '6':
            $query = "update menu set menu6 = $price";
            $query2 = "update stock set menu6 = $stock";
            break;
    }
    mysqli_query($dbcon, $query);
    mysqli_query($dbcon, $query2);

    $query3 = "select * from kt_order";
    mysqli_query($dbcon, $query3);
    mysqli_close($dbcon);
    ?>
    </body>
</html>