<link rel="stylesheet" href="../assets/css/style-starter.css">

<div class="w3l-footer-main">
    <div class="w3l-sub-footer-content">
        <footer class="footer-14">
            <div id="footers14-block">
                <div class="container">
                    <div class="footers20-content">
                        <div class="d-grid grid-col-4 grids-content">
                            <div class="column">
                                <h4>Our Address</h4>
                                <p>235 Terry, 10001 20C Trolley Square,
                                    DE 19806 U.S.A.</p>
                            </div>
                            <div class="column">
                                <h4>Call Us</h4>
                                <p>Mon - Fri 10:30 -18:00</p>
                                <p><a href="tel:+44-000-888-999">+44-000-888-999</a></p>
                            </div>
                            <div class="column">
                                <h4>Mail Us</h4>
                                <p><a href="mailto:info@example.com">info@example.com</a></p>
                                <p><a href="mailto:no.reply@example.com">no.reply@example.com</a></p>
                            </div>
                            <div class="column">
                                <h4>Follow Us On</h4>
                                <ul>
                                    <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <script src="../assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->
           

           
        

            <!--/MENU-JS-->
            <script>
            

            //Main navigation Active Class Add Remove
            $(".navbar-toggler").on("click", function() {
                $("header").toggleClass("active");
            });
            $(document).on("ready", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
                $(window).on("resize", function() {
                    if ($(window).width() > 991) {
                        $("header").removeClass("active");
                    }
                });
            });
            </script>
            <!--//MENU-JS-->

            <!-- disable body scroll which navbar is in active -->
            <script>
            $(function() {
                $('.navbar-toggler').click(function() {
                    $('body').toggleClass('noscroll');
                })
            });
            </script>
            <!-- //disable body scroll which navbar is in active -->

            <!--bootstrap-->
            <script src="../assets/js/bootstrap.min.js"></script>
            <!-- //bootstrap-->

        </footer>