<header role="banner">
  <div class="logo">
  <div class="container">
        <div class="row">
         <div class="col-xs-6 col-sm-6 col-md-9 col-lg-9">
      <a  href="<?php echo home_url(); ?>/"><img src="/wp-content/uploads/2014/04/logo5dbeta-2.png"></a>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
           <?php //if(of_get_option('search_bar', '1')) {?>
            <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
              <div class="form-group">
                <input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search','wpbootstrap'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
              </div>
            </form>
            <?php //} ?>
        </div>
    </div>
  </div>
</div><!--end of logo -->
<div class="row">
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
</div> <!-- end .container -->
      </div> <!-- end .navbar -->
    </div>

    <?php if (is_page( array (202, 217, 334, 341, 345, 361, 366 )) ): ?> 

<div class="row">
      <div class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-top:-20px">
        <div class="container">
       
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapsed">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

 <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('secondary_navigation')) :
          wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>

        </div> <!-- end .container -->
      </div> <!-- end .navbar -->
    </div>
<?php endif; ?>
<script src="assets/js/headroom.min.js"></script>
<script src="assets/js/jQuery.headroom.min.js"></script>
</header>
