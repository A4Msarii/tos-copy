<?php
include('../../includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Default Navbar - Snippets | Front - Multipurpose Responsive Template</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico">

  <!-- Font -->
  

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/theme.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/snippets.min.css">
</head>

<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-end navbar-light bg-white">
    <div class="container">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Default Logo -->
        <a class="navbar-brand" href="./index.html" aria-label="Front">
          <img class="navbar-brand-logo" src="./assets/svg/logos/logo.svg" alt="Logo">
        </a>
        <!-- End Default Logo -->

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
          <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
        </button>
        <!-- End Toggler -->
      
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <!-- Landings -->
            <li class="hs-has-mega-menu nav-item">
              <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Landings</a>

              <!-- Mega Menu -->
              <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="landingsMegaMenu" style="min-width: 30rem;">
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-block">
                    <!-- Banner Image -->
                    <div class="navbar-dropdown-menu-banner" style="background-image: url(../assets/svg/components/shape-3.svg);">
                      <div class="navbar-dropdown-menu-banner-content">
                        <div class="mb-4">
                          <span class="h2 d-block">Branding Works</span>
                          <p>Experience a level of our quality in both design &amp; customization works.</p>
                        </div>
                        <a class="btn btn-primary btn-transition" href="#">Learn more <i class="bi-chevron-right small"></i></a>
                      </div>
                    </div>
                    <!-- End Banner Image -->
                  </div>
                  <!-- End Col -->

                  <div class="col-lg-6">
                    <div class="navbar-dropdown-menu-inner">
                      <div class="row">
                        <div class="col-sm mb-3 mb-sm-0">
                          <span class="dropdown-header">Classic</span>
                          <a class="dropdown-item " href="../landing-classic-corporate.html">Corporate</a>
                          <a class="dropdown-item " href="../landing-classic-analytics.html">Analytics <span class="badge bg-primary rounded-pill ms-1">Hot</span></a>
                          <a class="dropdown-item " href="../landing-classic-studio.html">Studio</a>
                          <a class="dropdown-item " href="../landing-classic-marketing.html">Marketing</a>
                          <a class="dropdown-item " href="../landing-classic-advertisement.html">Advertisement</a>
                          <a class="dropdown-item " href="../landing-classic-consulting.html">Consulting</a>
                          <a class="dropdown-item " href="../landing-classic-portfolio.html">Portfolio</a>
                          <a class="dropdown-item " href="../landing-classic-software.html">Software</a>
                          <a class="dropdown-item " href="../landing-classic-business.html">Business</a>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm">
                          <div class="mb-3">
                            <span class="dropdown-header">App</span>
                            <a class="dropdown-item " href="../landing-app-ui-kit.html">UI Kit</a>
                            <a class="dropdown-item " href="../landing-app-saas.html">SaaS</a>
                            <a class="dropdown-item " href="../landing-app-workflow.html">Workflow</a>
                            <a class="dropdown-item " href="../landing-app-payment.html">Payment</a>
                            <a class="dropdown-item " href="../landing-app-tool.html">Tool</a>
                          </div>

                          <span class="dropdown-header">Onepage</span>
                          <a class="dropdown-item " href="../landing-onepage-corporate.html">Corporate</a>
                          <a class="dropdown-item " href="../landing-onepage-saas.html">SaaS <span class="badge bg-primary rounded-pill ms-1">Hot</span></a>
                        </div>
                        <!-- End Col -->
                      </div>
                      <!-- End Row -->
                    </div>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Row -->
              </div>
              <!-- End Mega Menu -->
            </li>
            <!-- End Landings -->

            <!-- Company -->
            <li class="hs-has-sub-menu nav-item">
              <a id="companyMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Company</a>

              <!-- Mega Menu -->
              <div class="hs-sub-menu dropdown-menu" aria-labelledby="companyMegaMenu" style="min-width: 14rem;">
                <a class="dropdown-item " href="../page-about.html">About</a>
                <a class="dropdown-item " href="../page-services.html">Services</a>
                <a class="dropdown-item " href="../page-customer-stories.html">Customer Stories</a>
                <a class="dropdown-item " href="../page-customer-story.html">Customer Story</a>
                <a class="dropdown-item " href="../page-careers.html">Careers</a>
                <a class="dropdown-item " href="../page-careers-overview.html">Careers Overview</a>
                <a class="dropdown-item " href="../page-hire-us.html">Hire Us</a>
                <a class="dropdown-item " href="../page-pricing.html">Pricing</a>
                <a class="dropdown-item " href="../page-contacts-agency.html">Contacts: Agency</a>
                <a class="dropdown-item " href="../page-contacts-startup.html">Contacts: Startup</a>
              </div>
              <!-- End Mega Menu -->
            </li>
            <!-- End Company -->

            <!-- Account -->
            <li class="hs-has-sub-menu nav-item">
              <a id="accountMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>

              <!-- Mega Menu -->
              <div class="hs-sub-menu dropdown-menu" aria-labelledby="accountMegaMenu" style="min-width: 14rem;">
                <!-- Authentication -->
                <div class="hs-has-sub-menu nav-item">
                  <a id="authenticationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Authentication</a>

                  <div class="hs-sub-menu dropdown-menu" aria-labelledby="authenticationMegaMenu" style="min-width: 14rem;">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Signup Modal</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="../page-login.html">Login</a>
                    <a class="dropdown-item " href="../page-signup.html">Signup</a>
                    <a class="dropdown-item " href="../page-reset-password.html">Reset Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="../page-login-simple.html">Login Simple</a>
                    <a class="dropdown-item " href="../page-signup-simple.html">Signup Simple</a>
                    <a class="dropdown-item " href="../page-reset-password-simple.html">Reset Password Simple</a>
                  </div>
                </div>
                <!-- End Authentication -->
    
                <a class="dropdown-item " href="../account-overview.html">Personal Info</a>
                <a class="dropdown-item " href="../account-security.html">Security</a>
                <a class="dropdown-item " href="../account-notifications.html">Notifications</a>
                <a class="dropdown-item " href="../account-preferences.html">Preferences</a>
                <a class="dropdown-item " href="../account-orders.html">Orders</a>
                <a class="dropdown-item " href="../account-wishlist.html">Wishlist</a>
                <a class="dropdown-item " href="../account-payments.html">Payments</a>
                <a class="dropdown-item " href="../account-address.html">Address</a>
                <a class="dropdown-item " href="../account-teams.html">Teams</a>
              </div>
              <!-- End Mega Menu -->
            </li>
            <!-- End Account -->

            <!-- Pages -->
            <li class="hs-has-sub-menu nav-item">
              <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

              <!-- Mega Menu -->
              <div class="hs-sub-menu dropdown-menu" aria-labelledby="pagesMegaMenu" style="min-width: 14rem;">
                <a class="dropdown-item " href="../page-faq.html">FAQ</a>
                <a class="dropdown-item " href="../page-terms.html">Terms &amp; Conditions</a>
                <a class="dropdown-item " href="../page-privacy.html">Privacy &amp; Policy</a>
                <a class="dropdown-item " href="../page-coming-soon.html">Coming Soon</a>
                <a class="dropdown-item " href="../page-maintenance-mode.html">Maintenance Mode</a>
                <a class="dropdown-item " href="../page-status.html">Status</a>
                <a class="dropdown-item " href="../page-invoice.html">Invoice</a>
                <a class="dropdown-item " href="../page-error-404.html">Error 404</a>
              </div>
              <!-- End Mega Menu -->
            </li>
            <!-- End Pages -->

            <!-- Blog -->
            <li class="hs-has-sub-menu nav-item">
              <a id="blogMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>

              <!-- Mega Menu -->
              <div class="hs-sub-menu dropdown-menu" aria-labelledby="blogMegaMenu" style="min-width: 14rem;">
                <a class="dropdown-item " href="../blog-journal.html">Journal</a>
                <a class="dropdown-item " href="../blog-metro.html">Metro</a>
                <a class="dropdown-item " href="../blog-newsroom.html">Newsroom</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item " href="../blog-article.html">Article</a>
                <a class="dropdown-item " href="../blog-author-profile.html">Author Profile</a>
              </div>
              <!-- End Mega Menu -->
            </li>
            <!-- End Blog -->

            <!-- Portfolio -->
            <li class="hs-has-sub-menu nav-item">
              <a id="portfolioMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>

              <!-- Mega Menu -->
              <div class="hs-sub-menu dropdown-menu" aria-labelledby="portfolioMegaMenu" style="min-width: 14rem;">
                <a class="dropdown-item " href="../portfolio-grid.html">Grid</a>
                <a class="dropdown-item " href="../portfolio-product-article.html">Product Article</a>
                <a class="dropdown-item " href="../portfolio-case-studies-branding.html">Case Studies: Branding</a>
                <a class="dropdown-item " href="../portfolio-case-studies-product.html">Case Studies: Product</a>
              </div>
              <!-- End Mega Menu -->
            </li>
            <!-- End Portfolio -->

            <!-- Button -->
            <li class="nav-item">
              <a class="btn btn-primary btn-transition" href="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/" target="_blank">Buy now</a>
            </li>
            <!-- End Button -->
          </ul>
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="bg-img-start" style="background-image: url(../assets/svg/components/card-11.svg);">
      <div class="container text-center content-space-3">
        <h1 class="display-4">Default Navbar</h1>
      </div>
    </div>
    <!-- End Hero Section -->

    <div class="container content-space-2">
      <!-- Card -->
      <div class="card card-nav-tab-content-height">
        <!-- Header -->
        <div class="card-header">
          <!-- Nav -->
          <ul class="nav nav-segment" id="navTab1" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="nav-htmlTab1" href="#nav-html1" data-bs-toggle="pill" data-bs-target="#nav-html1" role="tab" aria-controls="nav-html1" aria-selected="false">HTML</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="nav-cssTab1" href="#nav-css1" data-bs-toggle="pill" data-bs-target="#nav-css1" role="tab" aria-controls="nav-css1" aria-selected="false">CSS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="nav-jsTab1" href="#nav-js1" data-bs-toggle="pill" data-bs-target="#nav-js1" role="tab" aria-controls="nav-js1" aria-selected="false">JS</a>
            </li>
          </ul>
          <!-- End Nav -->
        </div>
        <!-- End Header -->

        <!-- Tab Content -->
        <div class="tab-content" id="navTabContent1">
          <div class="tab-pane fade show active" id="nav-html1" role="tabpanel" aria-labelledby="nav-htmlTab1">
            <pre>
              <code class="language-markup" data-lang="html">
                &lt;!-- ========== HEADER ========== --&gt;
                &lt;header id="header" class="navbar navbar-expand-lg navbar-end navbar-light bg-white"&gt;
                  &lt;div class="container"&gt;
                    &lt;nav class="js-mega-menu navbar-nav-wrap"&gt;
                      &lt;!-- Default Logo --&gt;
                      &lt;a class="navbar-brand" href="../index.html" aria-label="Front"&gt;
                        &lt;img class="navbar-brand-logo" src="../assets/svg/logos/logo.svg" alt="Logo"&gt;
                      &lt;/a&gt;
                      &lt;!-- End Default Logo --&gt;

                      &lt;!-- Toggler --&gt;
                      &lt;button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"&gt;
                        &lt;span class="navbar-toggler-default"&gt;
                          &lt;i class="bi-list"&gt;&lt;/i&gt;
                        &lt;/span&gt;
                        &lt;span class="navbar-toggler-toggled"&gt;
                          &lt;i class="bi-x"&gt;&lt;/i&gt;
                        &lt;/span&gt;
                      &lt;/button&gt;
                      &lt;!-- End Toggler --&gt;
                  
                      &lt;!-- Collapse --&gt;
                      &lt;div class="collapse navbar-collapse" id="navbarNavDropdown"&gt;
                        &lt;ul class="navbar-nav"&gt;
                          &lt;!-- Landings --&gt;
                          &lt;li class="hs-has-mega-menu nav-item"&gt;
                            &lt;a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"&gt;Landings&lt;/a&gt;

                            &lt;!-- Mega Menu --&gt;
                            &lt;div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="landingsMegaMenu" style="min-width: 30rem;"&gt;
                              &lt;div class="row"&gt;
                                &lt;div class="col-lg-6 d-none d-lg-block"&gt;
                                  &lt;!-- Banner Image --&gt;
                                  &lt;div class="navbar-dropdown-menu-banner" style="background-image: url(../assets/svg/components/shape-3.svg);"&gt;
                                    &lt;div class="navbar-dropdown-menu-banner-content"&gt;
                                      &lt;div class="mb-4"&gt;
                                        &lt;span class="h2 d-block"&gt;Branding Works&lt;/span&gt;
                                        &lt;p&gt;Experience a level of our quality in both design &amp; customization works.&lt;/p&gt;
                                      &lt;/div&gt;
                                      &lt;a class="btn btn-primary btn-transition" href="#"&gt;Learn more &lt;i class="bi-chevron-right small"&gt;&lt;/i&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                  &lt;!-- End Banner Image --&gt;
                                &lt;/div&gt;
                                &lt;!-- End Col --&gt;

                                &lt;div class="col-lg-6"&gt;
                                  &lt;div class="navbar-dropdown-menu-inner"&gt;
                                    &lt;div class="row"&gt;
                                      &lt;div class="col-sm mb-3 mb-sm-0"&gt;
                                        &lt;span class="dropdown-header"&gt;Classic&lt;/span&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Corporate&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Analytics &lt;span class="badge bg-primary rounded-pill ms-1"&gt;Hot&lt;/span&gt;&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Studio&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Marketing&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Advertisement&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Consulting&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Portfolio&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Software&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Business&lt;/a&gt;
                                      &lt;/div&gt;
                                      &lt;!-- End Col --&gt;

                                      &lt;div class="col-sm"&gt;
                                        &lt;div class="mb-3"&gt;
                                          &lt;span class="dropdown-header"&gt;App&lt;/span&gt;
                                          &lt;a class="dropdown-item" href="#"&gt;UI Kit&lt;/a&gt;
                                          &lt;a class="dropdown-item" href="#"&gt;SaaS&lt;/a&gt;
                                          &lt;a class="dropdown-item" href="#"&gt;Workflow&lt;/a&gt;
                                          &lt;a class="dropdown-item" href="#"&gt;Payment&lt;/a&gt;
                                          &lt;a class="dropdown-item" href="#"&gt;Tool&lt;/a&gt;
                                        &lt;/div&gt;

                                        &lt;span class="dropdown-header"&gt;Onepage&lt;/span&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;Corporate&lt;/a&gt;
                                        &lt;a class="dropdown-item" href="#"&gt;SaaS &lt;span class="badge bg-primary rounded-pill ms-1"&gt;Hot&lt;/span&gt;&lt;/a&gt;
                                      &lt;/div&gt;
                                      &lt;!-- End Col --&gt;
                                    &lt;/div&gt;
                                    &lt;!-- End Row --&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                                &lt;!-- End Col --&gt;
                              &lt;/div&gt;
                              &lt;!-- End Row --&gt;
                            &lt;/div&gt;
                            &lt;!-- End Mega Menu --&gt;
                          &lt;/li&gt;
                          &lt;!-- End Landings --&gt;

                          &lt;!-- Company --&gt;
                          &lt;li class="hs-has-sub-menu nav-item"&gt;
                            &lt;a id="companyMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"&gt;Company&lt;/a&gt;

                            &lt;!-- Mega Menu --&gt;
                            &lt;div class="hs-sub-menu dropdown-menu" aria-labelledby="companyMegaMenu" style="min-width: 14rem;"&gt;
                              &lt;a class="dropdown-item" href="#"&gt;About&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Services&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Customer Stories&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Customer Story&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Careers&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Careers Overview&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Hire Us&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Pricing&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Contacts: Agency&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Contacts: Startup&lt;/a&gt;
                            &lt;/div&gt;
                            &lt;!-- End Mega Menu --&gt;
                          &lt;/li&gt;
                          &lt;!-- End Company --&gt;

                          &lt;!-- Account --&gt;
                          &lt;li class="hs-has-sub-menu nav-item"&gt;
                            &lt;a id="accountMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"&gt;Account&lt;/a&gt;

                            &lt;!-- Mega Menu --&gt;
                            &lt;div class="hs-sub-menu dropdown-menu" aria-labelledby="accountMegaMenu" style="min-width: 14rem;"&gt;
                              &lt;!-- Authentication --&gt;
                              &lt;div class="hs-has-sub-menu nav-item"&gt;
                                &lt;a id="authenticationMegaMenu" class="hs-mega-menu-invoker dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"&gt;Authentication&lt;/a&gt;

                                &lt;div class="hs-sub-menu dropdown-menu" aria-labelledby="authenticationMegaMenu" style="min-width: 14rem;"&gt;
                                  &lt;a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#signupModal"&gt;Signup Modal&lt;/a&gt;
                                  &lt;div class="dropdown-divider"&gt;&lt;/div&gt;
                                  &lt;a class="dropdown-item" href="#"&gt;Login&lt;/a&gt;
                                  &lt;a class="dropdown-item" href="#"&gt;Signup&lt;/a&gt;
                                  &lt;a class="dropdown-item" href="#"&gt;Reset Password&lt;/a&gt;
                                  &lt;div class="dropdown-divider"&gt;&lt;/div&gt;
                                  &lt;a class="dropdown-item" href="#"&gt;Login Simple&lt;/a&gt;
                                  &lt;a class="dropdown-item" href="#"&gt;Signup Simple&lt;/a&gt;
                                  &lt;a class="dropdown-item" href="#"&gt;Reset Password Simple&lt;/a&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                              &lt;!-- End Authentication --&gt;
                
                              &lt;a class="dropdown-item" href="#"&gt;Personal Info&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Security&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Notifications&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Preferences&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Orders&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Wishlist&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Payments&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Address&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Teams&lt;/a&gt;
                            &lt;/div&gt;
                            &lt;!-- End Mega Menu --&gt;
                          &lt;/li&gt;
                          &lt;!-- End Account --&gt;

                          &lt;!-- Pages --&gt;
                          &lt;li class="hs-has-sub-menu nav-item"&gt;
                            &lt;a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"&gt;Pages&lt;/a&gt;

                            &lt;!-- Mega Menu --&gt;
                            &lt;div class="hs-sub-menu dropdown-menu" aria-labelledby="pagesMegaMenu" style="min-width: 14rem;"&gt;
                              &lt;a class="dropdown-item" href="#"&gt;FAQ&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Terms &amp; Conditions&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Privacy &amp; Policy&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Coming Soon&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Maintenance Mode&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Status&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Invoice&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Error 404&lt;/a&gt;
                            &lt;/div&gt;
                            &lt;!-- End Mega Menu --&gt;
                          &lt;/li&gt;
                          &lt;!-- End Pages --&gt;

                          &lt;!-- Blog --&gt;
                          &lt;li class="hs-has-sub-menu nav-item"&gt;
                            &lt;a id="blogMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"&gt;Blog&lt;/a&gt;

                            &lt;!-- Mega Menu --&gt;
                            &lt;div class="hs-sub-menu dropdown-menu" aria-labelledby="blogMegaMenu" style="min-width: 14rem;"&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Journal&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Metro&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Newsroom&lt;/a&gt;
                              &lt;div class="dropdown-divider"&gt;&lt;/div&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Article&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Author Profile&lt;/a&gt;
                            &lt;/div&gt;
                            &lt;!-- End Mega Menu --&gt;
                          &lt;/li&gt;
                          &lt;!-- End Blog --&gt;

                          &lt;!-- Portfolio --&gt;
                          &lt;li class="hs-has-sub-menu nav-item"&gt;
                            &lt;a id="portfolioMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"&gt;Portfolio&lt;/a&gt;

                            &lt;!-- Mega Menu --&gt;
                            &lt;div class="hs-sub-menu dropdown-menu" aria-labelledby="portfolioMegaMenu" style="min-width: 14rem;"&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Grid&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Product Article&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Case Studies: Branding&lt;/a&gt;
                              &lt;a class="dropdown-item" href="#"&gt;Case Studies: Product&lt;/a&gt;
                            &lt;/div&gt;
                            &lt;!-- End Mega Menu --&gt;
                          &lt;/li&gt;
                          &lt;!-- End Portfolio --&gt;

                          &lt;!-- Button --&gt;
                          &lt;li class="nav-item"&gt;
                            &lt;a class="btn btn-primary btn-transition" href="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/" target="_blank"&gt;Buy now&lt;/a&gt;
                          &lt;/li&gt;
                          &lt;!-- End Button --&gt;
                        &lt;/ul&gt;
                      &lt;/div&gt;
                      &lt;!-- End Collapse --&gt;
                    &lt;/nav&gt;
                  &lt;/div&gt;
                &lt;/header&gt;
                &lt;!-- ========== END HEADER ========== --&gt;
              </code>
            </pre>
          </div>

          <div class="tab-pane fade" id="nav-css1" role="tabpanel" aria-labelledby="nav-cssTab1">
            <pre>
              <code class="language-markup" data-lang="html">
                &lt;!-- CSS Implementing Plugins --&gt;
                &lt;link rel="stylesheet" href="../assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css"&gt;
              </code>
            </pre>
          </div>

          <div class="tab-pane fade" id="nav-js1" role="tabpanel" aria-labelledby="nav-jsTab1">
            <pre>
              <code class="language-markup" data-lang="html">
                &lt;!-- JS Implementing Plugins --&gt;
                &lt;script src="../assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"&gt;&lt;/script&gt;

                &lt;!-- JS Plugins Init. --&gt;
                &lt;script&gt;
                  (function() {
                    // INITIALIZATION OF MEGA MENU
                    // =======================================================
                    new HSMegaMenu('.js-mega-menu', {
                        desktop: {
                          position: 'left'
                        }
                      })
                  })()
                &lt;/script&gt;
              </code>
            </pre>
          </div>
        </div>
        <!-- End Tab Content -->
      </div>
      <!-- End Card -->
    </div>
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Go To -->
  <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
     data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
  </a>
  <!-- ========== END SECONDARY CONTENTS ========== -->

  <!-- JS Global Compulsory  -->
  <script src="<?php echo BASE_URL;?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="<?php echo BASE_URL;?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/prism/prism.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>

  <!-- JS Front -->
  <script src="<?php echo BASE_URL;?>assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      // INITIALIZATION OF GO TO
      // =======================================================
      new HSGoTo('.js-go-to')

      
      // INITIALIZATION OF MEGA MENU
      // =======================================================
      new HSMegaMenu('.js-mega-menu', {
          desktop: {
            position: 'left'
          }
        })
    })()
  </script>
</body>
</html>
