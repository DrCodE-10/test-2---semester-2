<?php
include 'includes/db.php';
include 'includes/header.php';
require_once 'includes/session.php';


// Run query
$result = $conn->query("SELECT * FROM products");

// Safety check
if (!$result) {
    die("Database query failed: " . $conn->error);
}

?>
<!DOCTYPE html>
<html lang="en">
            <head>
            <meta charset="UTF-8">  
            <link rel="stylesheet" href="style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?
                family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
                rel="stylesheet">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" 
                integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" 
                crossorigin="anonymous">

            </head>
        <h1>Available Products</h1>

        <div class="card-grid">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">    
                  <?php


                    // Fetch products
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    // Check if there are results
                    if ($result && $result->num_rows > 0) {

                        while ($p = $result->fetch_assoc()) {

                            echo "<div class='product-card' style='border:1px solid #ccc; padding:10px; margin:10px; display:inline-block; text-align:center; width:220px;  height=220;'>";
                            echo "<h2>" . htmlspecialchars($p['name']) . "</h2>";
                            echo "<p>Price: TZS " . number_format($p['price']) . "</p>";
                            echo "<p>" . htmlspecialchars($p['description']) . "</p>";
                            

                            if (!empty($p['image'])) {
                                    echo "<img src='uploads/products/" . htmlspecialchars($p['image']) . "' alt='" . htmlspecialchars($p['name']) . "' width='100' height='100' />";
                                }

                                // ✅ FORM WITH PRODUCT ID
                                echo "<form method='POST' action='cart_add.php'>";
                                echo "<input type='hidden' name='product_id' value='" . $p['id'] . "'>";
                                echo "<button type='submit'>Add to Cart</button>";
                                echo "</form>";

                                echo "</div>";
                            }

                        } else {
                            echo "No products found.";
                        }

                    $conn->close();
                ?>

                    
                    
                
            </div>
        <?php } ?>

        </div>

</html>

<?php include 'includes/footer.php'; ?>
