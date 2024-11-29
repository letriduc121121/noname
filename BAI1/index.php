<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
            
        }
        a:hover {
            background-color: #0056b3;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
       
    </style>
</head>
<body>
    <p><strong>Mời lựa chọn</strong></p>
    <div class="button-container">
        <a href="read.php" class="btn-custom">Khách</a>
        <a href="admin.php" class="btn-custom">Quản Trị Viên</a>
    </div>
    <div class="image-container">
        <img src="images/camchuong.jpg" alt="Hình ảnh đẹp về hoa">
    </div>
</body>
</html>
<?php
include("footer.php");
?>