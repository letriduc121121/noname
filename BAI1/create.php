<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    include 'db.php'; 
    $ten = $_POST['name'];
    $mota = $_POST['description'];

    $uploadDir = 'images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $linkanh = $uploadDir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $linkanh)) {
        try {
            $stmt = $conn->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $ten);
            $stmt->bindParam(2, $mota);
            $stmt->bindParam(3, $linkanh);
            $stmt->execute();
            header("Location: admin.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi khi thêm dữ liệu: " ;
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Loài Hoa</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .a {
            background-image: linear-gradient(120deg, #1d4a69 0%, #90f99e 100%);
        }
    </style>
</head>
<body>

<header class="a p-4 mb-5">
    <nav class="nav d-flex fs-1 justify-content-center" style=" color:white;">
        <a>Thêm loài Hoa</a>
    </nav>
</header>

<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label >Tên Hoa: </label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label >Mô Tả (Không bắt buộc): </label>
            <input type="text" class="form-control" id="description" name="description" rows="4"></input>
        </div>
        <div class="mb-3">
            <label >Thêm ảnh: </label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png">
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="admin.php" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php
include"footer.php";
?>