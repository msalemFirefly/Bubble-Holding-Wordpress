
<?php 
include 'functions.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bubble Holding</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <!-- Bootstrap 5.3.7 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Owl Carousel 2 (v2.3.4) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

        <!-- Swiper v11.2.10 -->
        <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@11.2.10/swiper-bundle.min.css">
        <script src="https://unpkg.com/swiper@11.2.10/swiper-bundle.min.js"></script> -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- Your custom styles -->
        <link rel="stylesheet" href="css/style.css">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Numans&display=swap" rel="stylesheet">

        <?php enqueue_head_scripts(); ?>
    </head>

    <body>
        <header id="header">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">Bubble Holding</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="10" viewBox="0 0 22 10" fill="none">
                    <path d="M1 1L21 1" stroke="#FFFAEE" stroke-linecap="round"/>
                    <path d="M1 5L21 5" stroke="#FFFAEE" stroke-linecap="round"/>
                    <path d="M16 9L21 9" stroke="#FFFAEE" stroke-linecap="round"/>
                    </svg>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link slide-link active <?php echo ($current_page == 'index.php') ? 'border-bottom' : ''; ?>" href="index.php">
                                <div class="slide-button text-white">
                                    <span class="btn_text btn_text--default">HOME</span>
                                    <span class="btn_text btn_text--hover">HOME</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link slide-link <?php echo ($current_page == 'about.php') ? 'border-bottom' : ''; ?>" href="about.php">
                                <div class="slide-button text-white">
                                    <span class="btn_text btn_text--default">ABOUT</span>
                                    <span class="btn_text btn_text--hover">ABOUT</span>
                                </div>                                
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link slide-link dropdown-toggle white-text d-flex align-items-center <?php echo ($current_page == 'hospitality.php' || $current_page == 'healthcare.php' || $current_page == 'retail.php' || $current_page == 'manufacturing.php' || $current_page == 'housekeeeping.php') ? 'border-bottom' : ''; ?>" href="#" id="industriesDropdown" role="button" data-bs-toggle="dropdown">
                                <div class="slide-button text-white" style="margin-right:0.5em">
                                    <span class="btn_text btn_text--default">INDUSTRIES</span>
                                    <span class="btn_text btn_text--hover">INDUSTRIES</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                            <path d="M3.5 1C3.5 0.723858 3.72386 0.5 4 0.5C4.27614 0.5 4.5 0.723858 4.5 1H4H3.5ZM4.35355 11.3536C4.15829 11.5488 3.84171 11.5488 3.64645 11.3536L0.464466 8.17157C0.269204 7.97631 0.269204 7.65973 0.464466 7.46447C0.659728 7.2692 0.976311 7.2692 1.17157 7.46447L4 10.2929L6.82843 7.46447C7.02369 7.2692 7.34027 7.2692 7.53553 7.46447C7.7308 7.65973 7.7308 7.97631 7.53553 8.17157L4.35355 11.3536ZM4 1H4.5L4.5 11H4H3.5L3.5 1H4Z" fill="#FFFAEE"/>
                            </svg></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item blue-text" href="hospitality.php"><p class="mb-0">Hospitality</p></a></li>
                                <li><a class="dropdown-item blue-text" href="healthcare.php"><p class="mb-0">Healthcare</p></a></li>
                                <li><a class="dropdown-item blue-text" href="retail.php"><p class="mb-0">Retail</p></a></li>
                                <li><a class="dropdown-item blue-text" href="manufacturing.php"><p class="mb-0">Manufacturing</p></a></li>
                                <li><a class="dropdown-item blue-text" href="housekeeping.php"><p class="mb-0">Housekeeeping</p></a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link slide-link <?php echo ($current_page == 'careers.php') ? 'border-bottom' : ''; ?>" href="careers.php">
                                <div class="slide-button text-white">
                                    <span class="btn_text btn_text--default">CAREERS</span>
                                    <span class="btn_text btn_text--hover">CAREERS</span>
                                </div>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link slide-link <?php echo ($current_page == 'contact.php') ? 'border-bottom' : ''; ?>" href="contact.php">
                                <div class="slide-button text-white">
                                    <span class="btn_text btn_text--default">CONTACT</span>
                                    <span class="btn_text btn_text--hover">CONTACT</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <span class="navbar-text slide-link">
                        <div class="d-flex align-items-center gap-3">                        
                            <div class="slide-button text-white" id="langToggle">
                                <span class="btn_text btn_text--default">ENGLISH TO ARABIC</span>
                                <span class="btn_text btn_text--hover">ENGLISH TO ARABIC</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                            <path d="M7 9.5C6.72386 9.5 6.5 9.72386 6.5 10C6.5 10.2761 6.72386 10.5 7 10.5L7 10L7 9.5ZM17.3536 10.3536C17.5488 10.1583 17.5488 9.84171 17.3536 9.64645L14.1716 6.46447C13.9763 6.2692 13.6597 6.2692 13.4645 6.46447C13.2692 6.65973 13.2692 6.97631 13.4645 7.17157L16.2929 10L13.4645 12.8284C13.2692 13.0237 13.2692 13.3403 13.4645 13.5355C13.6597 13.7308 13.9763 13.7308 14.1716 13.5355L17.3536 10.3536ZM7 10L7 10.5L17 10.5L17 10L17 9.5L7 9.5L7 10Z" fill="#C6C6C6"/>
                            <path d="M11 3.5C11.2761 3.5 11.5 3.72386 11.5 4C11.5 4.27614 11.2761 4.5 11 4.5L11 4L11 3.5ZM0.646446 4.35355C0.451184 4.15829 0.451184 3.84171 0.646446 3.64645L3.82843 0.464467C4.02369 0.269205 4.34027 0.269204 4.53553 0.464467C4.7308 0.659729 4.7308 0.976311 4.53553 1.17157L1.70711 4L4.53553 6.82843C4.7308 7.02369 4.7308 7.34027 4.53553 7.53553C4.34027 7.7308 4.02369 7.7308 3.82843 7.53553L0.646446 4.35355ZM11 4L11 4.5L1 4.5L1 4L1 3.5L11 3.5L11 4Z" fill="#C6C6C6"/>
                            </svg>
                        </div>
                    </span>
                </div>
            </nav>
            <div class="offcanvas offcanvas-end white-text" tabindex="-1" id="offcanvasMenu">
                <div class="d-flex justify-content-between">
                    <a class="navbar-brand" href="index.php">BubbleCare Holding</a>
                    <a href="#" class="text-decoration-none white-text" data-bs-dismiss="offcanvas" aria-label="Close">Close <span><svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none">
                    <path d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5L1 3.5ZM9.35355 4.35355C9.54882 4.15829 9.54882 3.84171 9.35355 3.64645L6.17157 0.464467C5.97631 0.269204 5.65973 0.269204 5.46447 0.464467C5.2692 0.659729 5.2692 0.976311 5.46447 1.17157L8.29289 4L5.46447 6.82843C5.2692 7.02369 5.2692 7.34027 5.46447 7.53553C5.65973 7.7308 5.97631 7.7308 6.17157 7.53553L9.35355 4.35355ZM1 4L1 4.5L9 4.5L9 4L9 3.5L1 3.5L1 4Z" fill="#FFFAEE"/>
                    </svg></span></a>
                </div>
                <div class="offcanvas-body px-0">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active border-bottom" href="index.php">
                                <div class="d-flex gap-4">
                                    <span>01</span>
                                    HOME
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-bottom" href="about.php">
                                <div class="d-flex gap-4">
                                    <span>02</span>
                                    ABOUT
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link white-text border-bottom d-flex justify-content-between collapsed" href="#" id="industriesMenu" role="button">
                                <div class="d-flex gap-4">
                                    <span>03</span>
                                    INDUSTRIES
                                </div>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                            <path d="M3.5 1C3.5 0.723858 3.72386 0.5 4 0.5C4.27614 0.5 4.5 0.723858 4.5 1H4H3.5ZM4.35355 11.3536C4.15829 11.5488 3.84171 11.5488 3.64645 11.3536L0.464466 8.17157C0.269204 7.97631 0.269204 7.65973 0.464466 7.46447C0.659728 7.2692 0.976311 7.2692 1.17157 7.46447L4 10.2929L6.82843 7.46447C7.02369 7.2692 7.34027 7.2692 7.53553 7.46447C7.7308 7.65973 7.7308 7.97631 7.53553 8.17157L4.35355 11.3536ZM4 1H4.5L4.5 11H4H3.5L3.5 1H4Z" fill="#FFFAEE"/>
                            </svg></a>
                            <ul class="industriesMenu list-unstyled" style="display:none;">
                                <li class="nav-item">
                                    <a class="nav-link border-bottom" href="careers.php">
                                        <div class="d-flex gap-4">
                                            <span>01</span>
                                            Hospitality
                                        </div>    
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link border-bottom" href="careers.php">
                                        <div class="d-flex gap-4">
                                            <span>02</span>
                                            Healthcare
                                        </div>    
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-bottom" href="careers.php">
                                        <div class="d-flex gap-4">
                                            <span>03</span>
                                            Retail
                                        </div>    
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link border-bottom" href="careers.php">
                                        <div class="d-flex gap-4">
                                            <span>04</span>
                                            Manufacturing
                                        </div>    
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link border-bottom" href="careers.php">
                                        <div class="d-flex gap-4">
                                            <span>05</span>
                                            Housekeeeping
                                        </div>    
                                    </a>
                                </li> 
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link border-bottom" href="careers.php">
                                <div class="d-flex gap-4">
                                    <span>04</span>
                                    CAREERS
                                </div>    
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link border-bottom" href="contact.php">
                                <div class="d-flex gap-4">
                                    <span>04</span>
                                    CONTACT
                                </div>    
                            </a>
                        </li>
                    </ul>

                    <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                        <div class="d-grid gap-3" style="grid-template-columns: repeat(1, 1fr);">
                            <p class="mb-0">SOCIALS</p>
                            <!-- Instagram -->
                            <a href="https://www.instagram.com/" target="_blank" class="text-decoration-none white-text">
                                <div class="d-flex align-items-center justify-content-center social-link gap-2 p-3">
                                    <span>
                                        <!-- Instagram Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M5.8 0H14.2C17.4 0 20 2.6 20 5.8V14.2C20 15.7383 19.3889 17.2135 18.3012 18.3012C17.2135 19.3889 15.7383 20 14.2 20H5.8C2.6 20 0 17.4 0 14.2V5.8C0 4.26174 0.61107 2.78649 1.69878 1.69878C2.78649 0.61107 4.26174 0 5.8 0ZM5.6 2C4.64522 2 3.72955 2.37928 3.05442 3.05442C2.37928 3.72955 2 4.64522 2 5.6V14.4C2 16.39 3.61 18 5.6 18H14.4C15.3548 18 16.2705 17.6207 16.9456 16.9456C17.6207 16.2705 18 15.3548 18 14.4V5.6C18 3.61 16.39 2 14.4 2H5.6ZM15.25 3.5C15.5815 3.5 15.8995 3.6317 16.1339 3.86612C16.3683 4.10054 16.5 4.41848 16.5 4.75C16.5 5.08152 16.3683 5.39946 16.1339 5.63388C15.8995 5.8683 15.5815 6 15.25 6C14.9185 6 14.6005 5.8683 14.3661 5.63388C14.1317 5.39946 14 5.08152 14 4.75C14 4.41848 14.1317 4.10054 14.3661 3.86612C14.6005 3.6317 14.9185 3.5 15.25 3.5ZM10 5C11.3261 5 12.5979 5.52678 13.5355 6.46447C14.4732 7.40215 15 8.67392 15 10C15 11.3261 14.4732 12.5979 13.5355 13.5355C12.5979 14.4732 11.3261 15 10 15C8.67392 15 7.40215 14.4732 6.46447 13.5355C5.52678 12.5979 5 11.3261 5 10C5 8.67392 5.52678 7.40215 6.46447 6.46447C7.40215 5.52678 8.67392 5 10 5ZM10 7C9.20435 7 8.44129 7.31607 7.87868 7.87868C7.31607 8.44129 7 9.20435 7 10C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10C13 9.20435 12.6839 8.44129 12.1213 7.87868C11.5587 7.31607 10.7956 7 10 7Z" fill="#FFFFFF"/>
                                        </svg>
                                    </span>
                                    <p class="mb-0">@bubblecareholding</p>
                                </div>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/" target="_blank" class="text-decoration-none white-text">
                                <div class="d-flex align-items-center justify-content-center social-link gap-2 p-3">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none">
                                            <path d="M8 11.5H10.8571L12 7.5H8V5.5C8 4.47 8 3.5 10.2857 3.5H12V0.14C11.6274 0.097 10.2206 0 8.73486 0C5.632 0 3.42857 1.657 3.42857 4.7V7.5H0V11.5H3.42857V20H8V11.5Z" fill="#FFFFFF"/>
                                        </svg>
                                    </span>
                                    <p class="mb-0">@bubblecareholding</p>
                                </div>
                            </a>

                            <!-- X (Twitter) -->
                            <a href="https://x.com/?lang=en-in" target="_blank" class="text-decoration-none white-text">
                                <div class="d-flex align-items-center justify-content-center social-link gap-2 p-3">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M11.9027 8.46429L19.3482 0H17.5838L11.119 7.34942L5.95547 0H0L7.8082 11.1136L0 19.9897H1.76443L8.59152 12.2285L14.0445 19.9897H20L11.9023 8.46429H11.9027ZM9.48608 11.2115L8.69495 10.1049L2.40018 1.29901H5.11025L10.1902 8.40562L10.9813 9.51229L17.5847 18.7498H14.8746L9.48608 11.212V11.2115Z" fill="#FFFFFF"/>
                                        </svg>
                                    </span>
                                    <p class="mb-0">@bubblecareholding</p>
                                </div>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://in.linkedin.com/" target="_blank" class="text-decoration-none white-text"> 
                                <div class="d-flex align-items-center justify-content-center social-link gap-2 p-3">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M4.19727 2.22321C4.19699 2.81255 3.97562 3.37763 3.58185 3.79415C3.18809 4.21066 2.65418 4.44449 2.09759 4.4442C1.54099 4.4439 1.00731 4.20951 0.613934 3.79257C0.220561 3.37564 -0.000278034 2.81033 2.62709e-07 2.22099C0.000278559 1.63165 0.221651 1.06657 0.615418 0.650052C1.00919 0.233536 1.54309 -0.00029439 2.09969 2.78164e-07C2.65628 0.000294947 3.18996 0.234691 3.58334 0.651623C3.97671 1.06856 4.19755 1.63387 4.19727 2.22321ZM4.26023 6.08966H0.0629593V20H4.26023V6.08966ZM10.8919 6.08966H6.71564V20H10.8499V12.7004C10.8499 8.63397 15.8552 8.25621 15.8552 12.7004V20H20V11.1894C20 4.3342 12.5918 4.58975 10.8499 7.95622L10.8919 6.08966Z" fill="#FFFFFF"/>
                                        </svg>
                                    </span>
                                    <p class="mb-0">@bubblecareholding</p>
                                </div>
                            </a>    
                        </div>              
                    </div>
                </div>
            </div>
        </header>
