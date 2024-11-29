<?php
include 'db.php'; 
$stmt = $conn->prepare("SELECT * FROM flowers");
$stmt->execute();
$flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Loài Hoa</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;

        }
        .bg-light {
            background-image: linear-gradient(120deg, #1d4a69 0%, #90f99e 100%);
        }
        .nut {
            width: 150px; 
        }
    </style>
</head>
<body>

<header class="bg-light p-3 mb-4">
  <nav class="nav d-flex justify-content-center">
  <nav class="nav d-flex fs-1 justify-content-center" style=" color:white;">
        <a>Quản lí danh sách</a>
    </nav>
  </nav>
</header>

<div class="container">
    <a href="create.php" class="btn mb-3 btn-success" >Thêm Loài Hoa</a>
    <a href="index.php" class="btn mb-3 btn-success" >Quay lại</a>
    <table class="table table-bordered ">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Ảnh</th>
                <th>Chọn chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $flower): ?>
                <tr>
                    <td><?= htmlspecialchars($flower['id']) ?></td>
                    <td><?= htmlspecialchars($flower['name']) ?></td>
                    <td><?= htmlspecialchars($flower['description']) ?></td>
                    <td><img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" width="100px"></td>
                    <td class="nut">
                        <a href="edit.php?id=<?= $flower['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                        <a href="delete.php?id=<?= $flower['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include'footer.php';
?>