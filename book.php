<?php include 'includes/header.php'; 
include 'includes/db.php';

if (isset($_GET['id'])) {
    $property_id = intval($_GET['id']);
    $sql = "SELECT * FROM properties WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $property_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $property = $result->fetch_assoc();
    } else {
        echo "Property not found.";
    }
} else {
    echo "Invalid request.";
}
?>
<div class="container mt-5">
    <a href="prop.php" class="btn btn-secondary mb-4">Back to Listings</a>
    <div class="card">
        <img src="<?php echo htmlspecialchars($property['image']); ?>" class="card-img-top" alt="Property Image" style="max-height: 400px; object-fit: cover;">
        <div class="card-body">
            <h2 class="card-title"><?php echo htmlspecialchars($property['title']); ?></h2>
            <p class="card-text"><strong>Price:</strong> $<?php echo number_format($property['price'], 2); ?></p>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($property['description'])); ?></p>
            <?php if (!empty($property['full_description'])): ?>
                <hr>
                <h5>More About This Property</h5>
                <p class="text-muted"><?php echo nl2br(htmlspecialchars($property['full_description'])); ?></p>
            <?php endif; ?>
            <hr>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($property['phone']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($property['email']); ?></p>

            <a href="request.php ?>" class="btn btn-primary">Request for booking</a>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>