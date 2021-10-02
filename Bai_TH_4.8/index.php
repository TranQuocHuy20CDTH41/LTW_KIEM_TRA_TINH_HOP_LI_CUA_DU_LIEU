<?php

$name_loi = $email_loi = $age_loi = $phone_loi = '';
$name = $email = $age = $phone = '';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_age($age)
{
    if ($age < 18 || $age > 100) return false;
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
    if (empty($_POST["email"]))
        $email_loi = "Email không được để trống!";
    else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $email_loi = "Chỉ chứa địa chỉ email hợp lệ (có @ và .)";
    }
    if (empty($_POST['age']))
        $age_loi = "Age bắt buộc nhập";
    else {
        $age = $_POST['age'];
        if (!test_age($age))
            $age_loi = "Độ tuổi từ 18 đến 100";
    }
    if (empty($_POST['phone']))
        $phone_loi = "Phone Number bắt buộc nhập";
    else {
        $length = strlen($_POST['phone']);
        $phone = $_POST['phone'];
        if (!preg_match("/^[0-9]*$/", $phone) || $length < 10)
            $phone_loi = "Chỉ chứa các chữ số và có độ dài là 10 số";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        .error {
            color: red;
        }

        body {
            background: linear-gradient(to left bottom, rgb(86, 184, 230), rgb(37, 88, 104));
        }
    </style>

    <title>Bài thực hành 4.8</title>
</head>

<body>
    <h3>NHẬP THÔNG TIN</h3>
    <form action="index.php" method="post">
        <table>
            <div class="mb-3">
                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="name" value="<?php echo $name ?>"></td>
                    <td><span class="error">*<?php echo $name_loi ?></span></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" value="<?php echo $email ?>"></td>
                    <td><span class="error">*<?php echo $email_loi ?></span></td>
                </tr>
                <tr>
                    <td>Age: </td>
                    <td><input type="text" name="age" value="<?php echo $age ?>"></td>
                    <td><span class="error">*<?php echo $age_loi ?></span></td>
                </tr>
                <tr>
                    <td>Phone Number: </td>
                    <td><input type="text" name="phone" value="<?php echo $phone ?>"></td>
                    <td><span class="error">*<?php echo $phone_loi ?></span></td>
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
    echo "<h3>THÔNG TIN CỦA BẠN LÀ: </h3>";
    echo "<br>Username: " . $name;
    echo "<br>Email: " . $email;
    echo "<br>Age: " . $age;
    echo "<br>Phone number: " . $phone;
}
?>

</html>