<?php 
    function test_pass($password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) return false;
        else return true;
    }

    $name_loi = $password_loi = $confirm_loi = '';
    $name = $password = $confirm = '';
    function test_input($s){
                $s = trim($s); 
                $s = stripslashes($s);
                $s = htmlspecialchars($s);
                return $s;
            }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['name']))
            $name_loi = 'Username bắt buộc nhập!';
        else{
            $name = $_POST['name'];
            if(preg_match("/^[a-zA-Z ]*$/", $name))
                $name_loi = "Username chỉ chứa kí tự và khoảng trắng!";
        } 
        if(empty($_POST['password']))
            $password_loi = 'Password bắt buộc nhập!';
        else {
            $password = $_POST['password'];
            if(!test_pass($password))
                $password_loi = 'Dài ít nhất 8 kí tự, trong đó có ít nhất 1 kí tự hoa, 1 chữ số, 1 kí tự đặc biệt!';
        }
        if($_POST['password'] != $_POST['confirm'])
            $confirm_loi = 'Passwoed không trùng, vui lòng kiểm tra lại!';
        else $confirm = $_POST['confirm'];
        
    }    
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <style>
            .error {color: red;}
            body {
                background: linear-gradient(to left bottom, rgb(86, 184, 230), rgb(37, 88, 104));
            }
        </style>
        <title>Bài thực hành 4.7</title>
    </head>
<body>
    <h3>SIGN IN</h3>
    <form action="index.php" method="post">
        <table>
            <div class="mb-3">
                <tr>
                    <td>Username: </td>
                    <td> <input type="text" name="name" value="<?php echo $name ?>"></td>
                    <td><span class="error">*<?php echo $name_loi ?></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td> <input type="password" name="password" value="<?php echo $password ?>"></td>
                    <td><span class="error">*<?php echo $password_loi ?></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td> <input type="password" name="confirm" value="<?php echo $confirm ?>" /></td>
                    <td><span class="error">*<?php echo $confirm_loi ?></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit" value="submit">submit</button></td>
                </tr>                     
            </div>
        </table>     
    </form>
</body>
    <?php
        if(isset($_POST["submit"])){
            echo "<h2>Your Information</h2>";
            echo "UserName: ".$name;
            echo "<br>Password: ".$password;
            echo "<br>Confirm Password: ".$confirm;
        }
    ?>
</html>