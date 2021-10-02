<?php
    function xuly($data){
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = trim($data);
        return $data;
    }
    echo "Họ và tên: ".xuly($_POST["hoten"]);
    echo "<br>Email: ".xuly($_POST["email"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý</title>
</head>
<body>
    
</body>
</html>