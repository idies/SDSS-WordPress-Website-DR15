<header role="banner">
  <div class="navbar navbar-inverse navbar-fixed-top headroom" >
    <div class="container">
            <div class="navbar-header">
             <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="<?php echo home_url(); ?>/"><img src="/wp-content/uploads/2014/05/sixforsdss.png" alt="sdsslogo" style="width:200px"></a>
            </div>
              <div class="navbar-collapse collapse"  role="navigation">
                <?php
                  if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav pull-right'));
                  endif;
                ?>

              </div>
      </div>
    </div>
  <script  type="text/javascript"  src="https://rawgithub.com/WickyNilliams/headroom.js/master/dist/headroom.js"></script>      
   <script  type="text/javascript"  src="https://rawgithub.com/WickyNilliams/headroom.js/master/src/jQuery.headroom.js"></script>
    <script type="text/javascript">
        $(".navbar-fixed-top").headroom();
    </script>  
</header>
