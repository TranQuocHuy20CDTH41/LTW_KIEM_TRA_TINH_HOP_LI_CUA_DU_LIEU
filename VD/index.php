<?php
    $hoten_loi = $email_loi = '';
    $hoten = $email = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(empty($_POST['hoten']))
            $hoten_loi = "Họ tên không được để trống";
        else $hoten = $_POST['hoten'];
        if(empty($_POST['email']))
            $email_loi = "Email không được để trống ";
        else $email = $_POST['email'];
        if($hoten_loi =='' && $email_loi ==''){
            header('Location: xuly.php', false, 307);
            exit();
        }
    }
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <style>
            .error {color: red;}
        </style>
        <title>Ví dụ</title>
    </head>
    <body>
        <form action="index.php" method="post">
            <div class="mb_3">
                Họ và tên: <br>
                <input type="text" name="hoten" style="width: 300px" value="<?php echo $hoten ?>">
                <span class="error">*<?php echo $hoten_loi ?></span>
                <br>
                Email: <br>
                <input type="text" name="email" style="width: 300px" value="<?php echo $email ?>">
                <span class="error">*<?php echo $email_loi ?></span>
                <br>
                <button type="submit" value="Ok" class="btn btn-primary">Ok</button>
            </div>
        </form>
    </body>
</html>