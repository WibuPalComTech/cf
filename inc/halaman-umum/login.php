<!-- Intro -->
<section class="site-section site-section-light site-section-top themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-slideDown"><i class="fa fa-arrow-right"></i> <strong>Login</strong></h1>
        <h2 class="h3 text-center animation-slideUp"><?php if(!empty($statuslogin)) { echo $statuslogin; } else { echo "Connect to your dashboard!"; } ?></h2>
    </div>
</section>
<!-- END Intro -->

<!-- Log In -->
<section class="site-content site-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">
                <!-- Log In Form -->
                <form action="frame.php?f=cek-login" method="post" id="form-validation" class="form-horizontal ajaxform" data-target="#page-container">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" id="username" name="username" class="form-control input-lg" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-keys"></i></span>
                                <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn btn-lg btn-primary btn-block"><i class="fa fa-arrow-right"></i> Login to DashBoard</button>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                </form>
                <!-- END Log In Form -->
            </div>
        </div>
        <hr>
    </div>
</section>
<!-- END Log In -->

<!-- Support Links -->
<section class="site-content site-section">
    <div class="container">
        <div class="row row-items text-center">
            <div class="col-sm-3 animation-fadeIn">
                <a href="javascript:void(0)" class="circle themed-background">
                    <i class="gi gi-life_preserver"></i>
                </a>
                <h4>Daftar <strong>Online</strong></h4>
            </div>
            <div class="col-sm-3 animation-fadeIn">
                <a href="javascript:void(0)" class="circle themed-background">
                    <i class="gi gi-envelope"></i>
                </a>
                <h4><strong>Email</strong> Kami</h4>
            </div>
            <div class="col-sm-3 animation-fadeIn">
                <a href="javascript:void(0)" class="circle themed-background">
                    <i class="fa fa-comments"></i>
                </a>
                <h4><strong>Live</strong> Chat</h4>
            </div>
            <div class="col-sm-3 animation-fadeIn">
                <a href="javascript:void(0)" class="circle themed-background">
                    <i class="fa fa-twitter"></i>
                </a>
                <h4><strong>Hubungi</strong> Kami</h4>
            </div>
        </div>
    </div>
</section>
<!-- END Support Links -->
<script>$(function() { FormsValidation.init();});</script>