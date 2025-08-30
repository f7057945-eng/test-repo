<?php
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
}
else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
}
else {
    $printUsername = "None"; 
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OBS - About Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">𝐌𝐀𝐇𝐀𝐑𝐀𝐉𝐀 𝐁𝐀𝐊𝐄𝐑𝐒 & 𝐒𝐖𝐄𝐄𝐓𝐒</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3
"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                            <?php
                            require_once('config.php');
                            $select = "SELECT * FROM cake_shop_category";
                            $query = mysqli_query($conn, $select);
                            while ($res = mysqli_fetch_assoc($query)) {
                            ?>
                                <a class="dropdown-item" href="shop.php?category=<?php echo $res['category_id'];?>">
                                    <?php echo $res['category_name'];?>
                                </a>
                            <?php
                            }
                            ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount;?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq.php">Faq</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="uploads/default-image.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername;?></h5>
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
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper"> -->
            <div class="container-fluid dashboard-content bg-white text-dark">    
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">About us</h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    	<div class="card">
                    		<div class="card-body">
                    			<div class="text-black m-3 text-dark p-8">
                                    <p>
                                    𝐓𝐡𝐞 𝐌𝐚𝐡𝐚𝐫𝐚𝐣𝐚 𝐁𝐚𝐤𝐞𝐫𝐬 & 𝐒𝐰𝐞𝐞𝐭𝐬 𝐒𝐡𝐨𝐩 𝐰𝐚𝐬 𝐟𝐨𝐮𝐧𝐝𝐞𝐝 𝐛𝐲 𝐚 𝐭𝐞𝐚𝐦 𝐨𝐟 𝐩𝐚𝐬𝐬𝐢𝐨𝐧𝐚𝐭𝐞 𝐚𝐧𝐝 𝐝𝐞𝐝𝐢𝐜𝐚𝐭𝐞𝐝 𝐛𝐚𝐤𝐞𝐫𝐬 𝐰𝐡𝐨 𝐚𝐫𝐞 𝐜𝐨𝐦𝐦𝐢𝐭𝐭𝐞𝐝 𝐢𝐧 𝐛𝐚𝐤𝐢𝐧𝐠 𝐭𝐡𝐞 𝐦𝐨𝐬𝐭 𝐝𝐞𝐥𝐢𝐜𝐢𝐨𝐮𝐬 𝐜𝐚𝐤𝐞𝐬, 𝐬𝐰𝐞𝐞𝐭𝐬, 𝐬𝐚𝐧𝐝𝐰𝐢𝐜𝐡𝐞𝐬 𝐚𝐧𝐝 𝐩𝐚𝐬𝐭𝐫𝐢𝐞𝐬 𝐚𝐫𝐨𝐮𝐧𝐝. 𝐔𝐬𝐢𝐧𝐠 𝐨𝐧𝐥𝐲 𝐭𝐡𝐞 𝐟𝐫𝐞𝐬𝐡𝐞𝐬𝐭 𝐢𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬 𝐰𝐞 𝐜𝐚𝐧 𝐟𝐢𝐧𝐝, 𝐲𝐨𝐮 𝐜𝐚𝐧 𝐛𝐞 𝐬𝐮𝐫𝐞 𝐭𝐡𝐚𝐭 𝐲𝐨𝐮 𝐚𝐫𝐞 𝐬𝐞𝐫𝐯𝐞𝐝 𝐭𝐡𝐞 𝐛𝐞𝐬𝐭 𝐪𝐮𝐚𝐥𝐢𝐭𝐲 𝐟𝐨𝐨𝐝 𝐲𝐨𝐮 𝐜𝐚𝐧 𝐞𝐯𝐞𝐫 𝐡𝐚𝐯𝐞.
                                    </p>
                                    <p>
                                    𝐖𝐞 𝐡𝐚𝐯𝐞 𝐞𝐯𝐨𝐥𝐯𝐞𝐝 𝐭𝐨 𝐛𝐞𝐜𝐨𝐦𝐞 𝐨𝐧𝐞 𝐨𝐟 𝐚 𝐩𝐫𝐞𝐦𝐢𝐮𝐦 𝐝𝐢𝐬𝐭𝐫𝐢𝐛𝐮𝐭𝐨𝐫 𝐚𝐧𝐝 𝐰𝐡𝐨𝐥𝐞𝐬𝐚𝐥𝐞𝐫 𝐟𝐨𝐫 𝐜𝐚𝐤𝐞𝐬, 𝐬𝐰𝐞𝐞𝐭𝐬 𝐚𝐧𝐝 𝐩𝐚𝐬𝐭𝐫𝐢𝐞𝐬 𝐭𝐨 𝐬𝐨𝐦𝐞 𝐰𝐞𝐥𝐥 𝐤𝐧𝐨𝐰𝐧 𝐫𝐞𝐬𝐭𝐮𝐫𝐚𝐧𝐭𝐬, 𝐜𝐚𝐟𝐞𝐬, 𝐬𝐮𝐩𝐞𝐫𝐦𝐚𝐫𝐭, 𝐡𝐨𝐭𝐞𝐥𝐬 𝐚𝐧𝐝 𝐛𝐚𝐤𝐞𝐫𝐲.
                                    </p>
                                    <p>
                                    𝐎𝐮𝐫 𝐨𝐧𝐥𝐢𝐧𝐞 𝐬𝐭𝐨𝐫𝐞 𝐢𝐬 𝐚 𝐥𝐞𝐚𝐝𝐢𝐧𝐠 𝐨𝐧𝐥𝐢𝐧𝐞 𝐬𝐡𝐨𝐩 𝐢𝐧 𝐏𝐚𝐤𝐢𝐬𝐭𝐚𝐧 𝐩𝐫𝐨𝐯𝐢𝐝𝐢𝐧𝐠 𝐜𝐚𝐤𝐞𝐬 𝐚𝐧𝐝 𝐠𝐢𝐟𝐭𝐬 𝐝𝐞𝐥𝐢𝐯𝐞𝐫𝐢𝐞𝐬 𝐰𝐢𝐭𝐡𝐢𝐧 𝐏𝐚𝐤𝐢𝐬𝐭𝐚𝐧. 𝐖𝐞 𝐩𝐫𝐨𝐯𝐢𝐝𝐞 𝐜𝐨𝐦𝐩𝐞𝐭𝐢𝐭𝐢𝐯𝐞 𝐩𝐫𝐢𝐜𝐞𝐬, 𝐠𝐨𝐨𝐝 𝐚𝐟𝐭𝐞𝐫 𝐬𝐚𝐥𝐞𝐬 𝐬𝐞𝐫𝐯𝐢𝐜𝐞𝐬 𝐚𝐧𝐝 𝐨𝐧-𝐭𝐢𝐦𝐞 𝐝𝐞𝐥𝐢𝐯𝐞𝐫𝐲.
                                    </p>
                                    <p>
                                    𝐓𝐡𝐞 𝐌𝐚𝐡𝐚𝐫𝐚𝐣𝐚 𝐁𝐚𝐤𝐞𝐫𝐬 & 𝐒𝐰𝐞𝐞𝐭𝐬 𝐒𝐡𝐨𝐩 𝐩𝐫𝐨𝐯𝐢𝐝𝐞𝐬 𝐬𝐚𝐦𝐞 𝐝𝐚𝐲 𝐝𝐞𝐥𝐢𝐯𝐞𝐫𝐲 𝐬𝐞𝐫𝐯𝐢𝐜𝐞 𝐬𝐞𝐯𝐞𝐧 𝐝𝐚𝐲𝐬 𝐚 𝐰𝐞𝐞𝐤, 𝐢𝐧𝐜𝐥𝐮𝐝𝐢𝐧𝐠 𝐒𝐮𝐧𝐝𝐚𝐲, 𝐰𝐢𝐭𝐡𝐢𝐧 𝐏𝐚𝐤𝐢𝐬𝐭𝐚𝐧 𝐭𝐨 𝐩𝐫𝐨𝐯𝐢𝐝𝐞 𝐚 𝐡𝐢𝐠𝐡 𝐥𝐞𝐯𝐞𝐥 𝐨𝐟 𝐜𝐮𝐬𝐭𝐨𝐦𝐞𝐫 𝐬𝐞𝐫𝐯𝐢𝐜𝐞.
                                    </p>
                                    <p>
                                    𝐄𝐧𝐣𝐨𝐲 𝐲𝐨𝐮𝐫 𝐦𝐞𝐚𝐥!!
                                    </p>
                                    <p>
                                    𝐓𝐡𝐞 𝐁𝐚𝐤𝐞𝐫𝐲 𝐒𝐡𝐨𝐩 𝐓𝐞𝐚𝐦
                                    </p>
                                </div>
                    		</div>
                    	</div>
                    </div>
                </div>

                <div class="row m-5">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <h1>Our Categories</h1>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="owl-carousel owl-theme">
                            <?php
                            require_once('config.php');
                            $select = "SELECT * FROM cake_shop_category";
                            $query = mysqli_query($conn, $select);
                            while ($res = mysqli_fetch_assoc($query)) {
                            ?>
                            <div class="item">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $res['category_name'];?></h3>
                                        <a href="shop.php?category=<?php echo $res['category_id'];?>"><img class="card-img" src="uploads/<?php echo $res['category_image'];?>"></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            
        <!-- </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive:{
                    0:{items:1}, 600:{items:2}, 1000:{items:4}
                }
            })
        });
    </script>
</body>
 
</html>
