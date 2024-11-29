<?php
include 'db.php';
include("header.php");
$query = "SELECT * FROM flowers";
$stmt = $conn->prepare($query);
$stmt->execute();
$flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <div class="row mt-5">
        <?php foreach ($flowers as $flower): ?>
            <div class="col-md-7 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= $flower['image']; ?>" class="card-img-top" alt="<?= $flower['name']; ?>">
                    <div class="card-body">
                        <h5><?= $flower['name']; ?></h5>
                        <p><?= $flower['description']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include 'footer.php';
?>
