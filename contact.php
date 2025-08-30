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
    <style>
        html,
    body {
        background-color: white;
        height: 100%;
    }
    </style>
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
                            <h2 class="pageheader-title">Contact</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
        /* Basic styling for the container */
        .container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        /* Styling for the left and right frames */
        .left-frame{width: 40%; /* Adjust width as necessary */
            height: 200px; /* Example height for the frames */
            padding: 10px;}
        .right-frame {
            width: 60%; /* Adjust width as necessary */
            height: 200px; /* Example height for the frames */
            padding: 10px;
        }
        
    </style>
</head>
<body>

<div class="container">
    <div class="left-frame">
    <h3 class="text-black font-bold mt-3 text-left">Address:</h3>
    <p class="text-black text-left">
        𝐆𝐮𝐥𝐫𝐚𝐢𝐳 𝟐 𝐍𝐞𝐚𝐫 𝐇𝐢𝐠𝐡 𝐂𝐨𝐮𝐫𝐭, 𝐑𝐚𝐰𝐚𝐥𝐩𝐢𝐧𝐝𝐢, 𝟒𝟔𝟎𝟎𝟎</p>
                                <h3 class="text-black font-bold mt-3 text-left">Email:</h3>
                                <p class="text-black text-left">
                                𝐛𝐚𝐤𝐞𝐫𝐲𝐬𝐲𝐬𝐭𝐞𝐦𝟑@𝐠𝐦𝐚𝐢𝐥.𝐜𝐨𝐦
                                </p>
                                <h3 class="text-black font-bold mt-3 text-left">Phone number:</h3>
                                <p class="text-black text-left">
                                𝟎𝟑𝟑𝟏𝟓𝟑𝟔𝟔𝟕𝟕𝟕
                                </p>
    </div>
    <div class="right-frame">
    <div class="portfolio-area" style="margin:0 auto; width:620px;">	
				<iframe width="100%" height="390" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Maharaja+Bakers+%26+Sweets&amp;aq=0&amp;oq=Maharaja+Bakers+%26+Sweets&amp;sll=@33.5565068&amp;sspn=73.1028322&amp;output=embed">
                </iframe>
                    <br />
                    <small>
                        <a href="https://www.google.com/maps/place/Maharaja+Bakers+%26+Sweets/@33.5565068,73.1028322,15z/data=!4m6!3m5!1s0x38dfed622057dbcf:0xcc8f2ac9fc6ca907!8m2!3d33.5565068!4d73.1028322!16s%2Fg%2F11jz659dcp?entry=ttu&g_ep=EgoyMDI0MTAyOS4wIKXMDSoASAFQAw%3D%3D" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
    </div>
</div>
</div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
</body>
 
</html>