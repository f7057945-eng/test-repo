<?php
session_start();

// Cart and User session check
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
} else {
    $printUsername = "None";
}

// Get product details
$product_id = $_GET['product_id'];
require_once('config.php');
$select = "SELECT * FROM cake_shop_product WHERE product_id = $product_id";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);

// Path to reviews JSON file
$reviews_file = 'reviews.json';

// Load existing reviews
$reviews = [];
if (file_exists($reviews_file)) {
    $reviews = json_decode(file_get_contents($reviews_file), true);
}

// Handle review form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_review'])) {
        // DELETE REVIEW PROCESS

        // Only logged in users can delete
        if ($printUsername === "None") {
            header("Location: single_product.php?product_id=$product_id&error=login_required");
            exit();
        }

        // Find the review index to delete
        $delete_index = intval($_POST['delete_review']);

        // Verify the review belongs to logged in user
        if (isset($reviews[$delete_index]) && 
            $reviews[$delete_index]['cake_id'] == $product_id && 
            $reviews[$delete_index]['user_name'] == $printUsername) {

            // Remove the review
            array_splice($reviews, $delete_index, 1);

            // Save back to JSON file
            file_put_contents($reviews_file, json_encode($reviews, JSON_PRETTY_PRINT));
        }

        // Redirect to avoid resubmission
        header("Location: single_product.php?product_id=$product_id");
        exit();
    } else {
        // ADD REVIEW PROCESS

        // Only allow logged-in users to post review
        if ($printUsername === "None") {
            // Redirect with error if not logged in
            header("Location: single_product.php?product_id=$product_id&error=login_required");
            exit();
        }

        $user_name = htmlspecialchars($printUsername); // force logged in username
        $rating = intval($_POST['rating']);
        $review_text = htmlspecialchars($_POST['review_text']);

        $new_review = [
            'cake_id' => $product_id,
            'user_name' => $user_name,
            'rating' => $rating,
            'review_text' => $review_text,
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Append new review
        $reviews[] = $new_review;

        // Save back to JSON file
        file_put_contents($reviews_file, json_encode($reviews, JSON_PRETTY_PRINT));

        // Redirect to avoid form resubmission
        header("Location: single_product.php?product_id=$product_id");
        exit();
    }
}

// Filter reviews for this specific product
$product_reviews = [];
foreach ($reviews as $key => $review) {
    if ($review['cake_id'] == $product_id) {
        $product_reviews[$key] = $review;  // keep key for delete identification
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OBS - Product Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <style>
        .review {
            background: #f8f9fa; /* Light grey background */
            border: 1px solid #ddd; /* Light border */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Space inside */
            margin-bottom: 20px; /* Space between reviews */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
            color: #333; /* Dark text */
            transition: 0.3s; /* Smooth hover effect */
            position: relative;
        }

        .review:hover {
            background: #e3f2fd; /* Slight blue on hover */
            transform: translateY(-5px); /* Lift effect on hover */
        }

        .review strong {
            font-size: 18px;
            color: #007bff; /* Blue color for username */
        }

        .review .stars {
            color: gold;
            font-size: 18px;
        }

        .review p {
            font-size: 16px;
            margin-top: 10px;
        }

        .review small {
            color: #888;
            font-size: 12px;
        }

        .delete-review-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            color: #dc3545;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .delete-review-btn:hover {
            color: #a71d2a;
        }
    </style>

</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">𝐌𝐀𝐇𝐀𝐑𝐀𝐉𝐀 𝐁𝐀𝐊𝐄𝐑𝐒 & 𝐒𝐖𝐄𝐄𝐓𝐒</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span
                                    class="badge badge-pill badge-secondary"><?php echo $printCount; ?></span></a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">Faq</a></li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="uploads/default-image.png" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="account_users.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="login_users.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                <a class="dropdown-item" href="logout_users.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container-fluid dashboard-content bg-white" style="padding-top:80px;">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-30">
                            <div class="product-slider p-4">
                                <div id="carouselExampleIndicators" class="product-carousel carousel slide" data-ride="carousel">
                                    <?php
                                    $file_array = explode(', ', $res['product_image']);
                                    ?>
                                    <div class="carousel-inner">
                                        <?php
                                        for ($i = 0; $i < count($file_array); $i++) {
                                        ?>
                                        <div class="carousel-item <?php if ($i == 0) { echo 'active'; } ?>">
                                            <img class="d-block w-100" src="uploads/<?php echo $file_array[$i]; ?>" alt="slide<?php echo $i; ?>">
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 border-start mb-30 d-flex text-black">
                            <div class="product-details p-4">
                                <h2 class="mb-3"><?php echo $res['product_name']; ?></h2>
                                <h3 class="mb-0 text-primary">Rs. <?php echo $res['product_price']; ?></h3>
                                <p style="color: black;"><?php echo $res['product_description']; ?></p>
                                <button onclick="add_cart(<?php echo $res['product_id']; ?>)" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="reviews text-black">
                        <h2>Customer Reviews</h2>

                        <?php if (isset($_GET['error']) && $_GET['error'] === 'login_required'): ?>
                            <div class="alert alert-danger text-black">You must be logged in to submit or delete a review.</div>
                        <?php endif; ?>

                        <?php if (empty($product_reviews)): ?>
                            <p style="color: black;">No reviews yet. Be the first to review!</p>
                        <?php else: ?>
                            <?php foreach ($product_reviews as $key => $review): ?>
                                <div class="review" style="color: black;">
                                    <strong><?php echo htmlspecialchars($review['user_name']); ?></strong> -
                                    <span class="stars"><?php echo str_repeat('&#9733;', $review['rating']); ?></span>
                                    <p><?php echo nl2br(htmlspecialchars($review['review_text'])); ?></p>
                                    <small><?php echo htmlspecialchars($review['created_at']); ?></small>

                                    <?php if ($printUsername !== "None" && $printUsername === $review['user_name']): ?>
                                        <form method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete your review?');">
                                            <input type="hidden" name="delete_review" value="<?php echo $key; ?>">
                                            <button type="submit" class="delete-review-btn" title="Delete Review">&times;</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <h3>Leave a Review</h3>

                        <?php if ($printUsername === "None"): ?>
                            <p style="color: black;"><strong>You must <a href="login_users.php">log in</a> to leave a review.</strong></p>
                        <?php else: ?>
                            <form method="post">
                                <input type="hidden" name="user_name" value="<?php echo htmlspecialchars($printUsername); ?>">
                                <p style="color: black;" ><strong text-black>Reviewing as:</strong> <?php echo htmlspecialchars($printUsername); ?></p>

                                <label>Rating:</label><br>
                                <select name="rating" required>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select><br><br>

                                <textarea name="review_text" rows="4" cols="50" placeholder="Write your review here..." required></textarea><br><br>
                                <button type="submit">Submit Review</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main-js.js"></script>
</body>

</html>