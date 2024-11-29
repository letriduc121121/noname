<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM flowers WHERE id = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $flower = $stmt->fetch(PDO::FETCH_ASSOC);

} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST['name'];
    $mota = $_POST['description'];
    $linkanh = $flower['image']; // Lấy đường dẫn ảnh cũ
    if (!empty($_FILES['image']['name'])) {
        $loadfile = 'images/';
        $linkanh = $loadfile . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $linkanh);
    }
    $stmt = $conn->prepare("UPDATE flowers SET name = ?, description = ?, image = ? WHERE id = ?");
    $stmt->bindParam(1, $ten);
    $stmt->bindParam(2, $mota);
    $stmt->bindParam(3, $linkanh);
    $stmt->bindParam(4, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } 
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Loài Hoa</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .bg-light {
            background-image: linear-gradient(120deg, #1d4a69 0%, #90f99e 100%);
        }
    </style>
</head>
<body>

<header class="bg-light p-3 mb-4">
    <nav class="nav d-flex justify-content-center">
    <nav class="nav d-flex fs-1 justify-content-center" style=" color:white;">
            <a>Sửa thông tin</a>
    </nav>
    </nav>
</header>

<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label >Tên Hoa</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($flower['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label >Mô Tả</label>
            <input type="" class="form-control" id="description" name="description" value="<?= htmlspecialchars($flower['description']) ?>" required></input>
        </div>
        <div class="mb-3">
            <label >Ảnh</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png">
            <img src="<?= htmlspecialchars($flower['image']) ?>" alt="Ảnh Hoa" width="100px" class="mt-2">
        </div>
        <button type="submit" class="btn btn-success">Lưu Thay Đổi</button>
        <a href="admin.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php
include'footer.php';
?>