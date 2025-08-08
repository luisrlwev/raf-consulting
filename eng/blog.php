<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>RAF Consulting</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/pogo-slider.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WTL9C9LM0B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WTL9C9LM0B');
</script>

</head>

<body>
    <div id="preloader"></div>
    <!-- header-start -->
    <?php include "includes/header.php";?>
    <!-- header-end -->
    <!-- breadcumb-area-start -->
    <div class="breadcumb-area bg-with-black breadcumb-area-blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb">
                        <h2 class="name">News RAF Consulting</h2>
                        <ul class="links">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="blog.php" style="color:#0fb8ce;">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area-end -->
    <!-- explore-service-area-start -->
    <!-- news-area-start -->

    <?php
    include 'lib/link.php';
    $queryBlog = "SELECT * 
    FROM wp_posts WHERE post_type='post' AND post_status='publish'";
    $resultBlogItems = mysqli_query($link, $queryBlog);
    ?>
    <div class="page-blog-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-blog-two-column page-blog">
                        <div class="row">
                        <?php
                        while ($rowBlogItem = $resultBlogItems->fetch_array()) {

                            $queryCategoria = "SELECT * 
                            FROM wp_term_relationships
                            INNER JOIN wp_terms
                            ON wp_term_relationships.term_taxonomy_id = wp_terms.term_id
                            WHERE object_id='".$rowBlogItem['ID']."'";
                            $resultGetCateg  = mysqli_query($link, $queryCategoria);
                            $rowGetCateg = mysqli_fetch_assoc($resultGetCateg);

                            $queryPhoto = "SELECT * 
                            FROM wp_posts
                            WHERE post_type='attachment' AND post_parent='".$rowBlogItem['ID']."'";
                            $resultGetPhoto  = mysqli_query($link, $queryPhoto);
                            $numGetPhoto = mysqli_num_rows($resultGetPhoto);

                            if($numGetPhoto == 0){
                                $urlPhoto = "http://clientes.codeandpixel.mx/RAF/blog/wp-content/uploads/2020/12/default-noimage.jpg";
                            }else{
                                $rowGetPhoto = mysqli_fetch_assoc($resultGetPhoto);
                                $urlPhoto = $rowGetPhoto["guid"];
                            }

                            

                            echo '<div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-sm-8 offset-sm-2 col-12">
                            <div class="single-page-blog">
                                <div class="bimg">
                                    <a href="blog-post.php?idpost='.$rowBlogItem['ID'].'">
                                        <img src="'.$urlPhoto.'" class="w-100" alt="">
                                        <span class="icon"><i class="fas fa-link"></i></span>
                                    </a>
                                    <p class="type">'.$rowGetCateg["name"].'</p>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="blog-post.php?idpost='.$rowBlogItem['ID'].'">'.$rowBlogItem["post_title"].'</a></h4>
                                    <div class="meta">
                                        <div class="date">
                                            <p><span><i class="far fa-calendar-alt"></i></span> '.$rowBlogItem["post_date"].'</p>
                                        </div>
                                    </div>
                                    <p class="text">'.substr($rowBlogItem["post_content"], 0, 200).'</p>
                                    <a class="more" href="blog-post.php?idpost='.$rowBlogItem['ID'].'">View more <span><i class="fas fa-angle-right"></i></span></a>
                                </div>
                            </div>
                        </div>';
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news-area-end -->
    <!-- map-start -->
    <!-- footer-start -->
    <?php include "includes/footer.php"; ?>
    <!-- footer-end -->
    <script>
        sessionStorage.setItem('page-visit', 'news');
    </script>
    <!-- Scripts -->
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/imagesLoaded-PACKAGED.js"></script>
    <script src="js/isotope-packaged.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>