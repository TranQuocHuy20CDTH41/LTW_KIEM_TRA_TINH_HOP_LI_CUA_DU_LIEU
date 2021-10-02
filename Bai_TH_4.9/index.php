<?php

$name_loi = $day_loi = $dtb_loi = '';
$name = $day = $dtb = '';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_date($date)
{
    $matches = array();
    $pattern = '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/';
    if (!preg_match($pattern, $date, $matches)) return false;
    if (!checkdate($matches[2], $matches[1], $matches[3])) return false;
    return true;
}
function test_dtb($dtb)
{
    if ($dtb < 0 || $dtb > 10) return false;
    return true;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']))
        $name_loi = "Username bắt buộc nhập";
    else {
        $name = $_POST['name'];
        if (preg_match("/^[a-zA-Z ]*$/", $name))
            $name_loi = "Chỉ chứa kí tự và khoảng trắng";
    }
    if (empty($_POST["day"]))
        $day_loi = "Ngày sinh không được để trống";
    else {
        $day = $_POST["day"];
        if (!test_date($day))
            $day_loi = "Ngày sinh không hợp lệ";
    }

    if (empty($_POST['dtb']))
        $dtb_loi = "Điểm trung bình bắt buộc nhập";
    else {
        $dtb = $_POST['dtb'];
        if (!test_dtb($dtb))
            $dtb_loi = "Điểm không hợp lệ";
    }
}
?>
<html>

<head>
    <style>
        .error {
            color: red;
        }

        body {
            background: linear-gradient(to right top, rgb(186, 241, 248), rgb(92, 152, 160));
        }
    </style>
    <title>Bài thực hành 4.9</title>
</head>

<body>
    <h2>NHẬP THÔNG TIN</h2>
    <form action="index.php" method="post">
        <table>
            <div class="mb-3">
                <tr>
                    <td>Họ và tên: </td>
                    <td><input type="text" name="name" value="<?php echo $name ?>"></td>
                    <td><span class="error">*<?php echo $name_loi ?></span></td>
                </tr>
                <tr>
                    <td>Ngày sinh: </td>
                    <td><input type="text" name="day" value="<?php echo $day ?>"></td>
                    <td><span class="error">*<?php echo $day_loi ?></span></td>
                </tr>
                <tr>
                    <td>Điểm trung bình: </td>
                    <td><input type="text" name="dtb" value="<?php echo $dtb ?>"></td>
                    <td><span class="error">*<?php echo $dtb_loi ?></span></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit" value="submit">Submit</button></td>
                </tr>
            </div>
        </table>
    </form>
</body>
<?php
if (isset($_POST['submit'])) {
    echo "<h3>THÔNG TIN VỪA NHẬP</h3>";
    echo "<br>Họ và tên: " . $name;
    echo "<br>Ngày sinh: " . $day;
    echo "<br>Điểm trung bình: " . $dtb;
}
?>

</html>