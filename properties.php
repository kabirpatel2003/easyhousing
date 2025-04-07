<?php
include 'includes/db.php';
$sql = "SELECT * FROM properties";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Available Properties</h2>
    <div class="row">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="card-text"><strong>Price:</strong> $<?php echo number_format($row['price'], 2); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <a href="book.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-primary w-100">Book Now</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No properties available at the moment.</p>
        <?php endif; ?>
    </div>
</div>

