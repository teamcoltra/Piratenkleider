<?php get_header(); 
 $options = get_option( 'piratenkleider_theme_options' );
  $bilderoptions = get_option( 'piratenkleider_theme_defaultbilder' ); 
   if (!isset($bilderoptions['src-default-symbolbild-404'])) 
            $bilderoptions['src-default-symbolbild-404'] = $defaultoptions['src-default-symbolbild-404'];
 ?>

<div class="section content">
  <div class="row">
    <div class="content-primary">
      <div class="content-header-big">
          <h1>404 not found</h1>
         <div class="symbolbild">                   
              <img src="<?php echo $bilderoptions['src-default-symbolbild-404']?>" alt="" >
               <div class="caption">  
                   <p style="font-size: 2em;" class="bebas">404</p>                  
               </div>   
              <div class="aaarh">
                  <p>AAARH!<br>The page cannot be found!</p>
              </div>
           </div> 
         
      </div>
      <div class="skin">
         <p>
                            <?php _e("The page or post that you are looking for cannot be found! Please use the search function to find the page you are looking for.", 'piratenkleider'); ?>
                            
                        </p>
              
         <?php get_search_form(); ?>
      </div>
    </div>

    <div class="content-aside">
      <div class="skin">
        <h1 class="skip"><?php _e( 'For more information', 'piratenkleider' ); ?></h1>
         <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
