<?php
   global $defaultoptions;
   global $defaultbilder_liste;
   $options = get_option( 'piratenkleider_theme_options' );
   $bilderoptions = get_option( 'piratenkleider_theme_defaultbilder' ); 
?>          
<div class="first-teaser-widget-area">
<?php if ( is_active_sidebar( 'first-teaser-widget-area' ) ) { ?>
        <?php dynamic_sidebar( 'first-teaser-widget-area' ); ?>
    <?php } else {        

       
      
         $defaultbildsrc = $bilderoptions['slider-defaultbildsrc'];                        
         $cat = $options['slider-catid'];
         if (!isset($cat) ) $cat = 1;         
         $numberarticle = $options['slider-numberarticle'];
         if (!isset($numberarticle) )  $numberarticle =3;   
         if (!isset($options['url-mitgliedwerden'])) 
            $options['url-mitgliedwerden'] = $defaultoptions['url-mitgliedwerden'];
         if (!isset($options['teaser-subtitle'])) 
            $options['teaser-subtitle'] = $defaultoptions['teaser-subtitle'];
          if (!isset($options['teaser-title-maxlength'])) 
            $options['teaser-title-maxlength'] = $defaultoptions['teaser-title-maxlength'];        
          if (!isset($options['teaser-title-words'])) 
            $options['teaser-title-words'] = $defaultoptions['teaser-title-words'];
          
        query_posts( array( 'cat' => "$cat", 'posts_per_page' => $numberarticle) );
        ?>
        <div class="flexslider">
            <h2 class="skip"><?php _e( 'Aktuelle Themen', 'piratenkleider' ); ?></h2>
            <ul class="slides">
        <?php 
        if ( have_posts() ) while ( have_posts() ) : the_post();
            echo "<li class='slide'>";
            if (has_post_thumbnail()) {
                the_post_thumbnail('full');
            } else {
                if (isset($defaultbildsrc)) {  
                    echo '<img src="'.$defaultbildsrc.'" width="'.$defaultoptions['thumb-width'].'" height="'.$defaultoptions['thumb-height'].'" alt="">';                
                } else {
                    $randombild = array_rand($defaultbilder_liste,2);
                    echo '<img src="'.$defaultbilder_liste[$randombild[0]]['src'].'" width="'.$defaultoptions['thumb-width'].'" height="'.$defaultoptions['thumb-height'].'" alt="">'; 
                    
                }
            }
            echo '<div class="caption">';
            echo '<p class="bebas">'.$options['teaser-subtitle'].'</p>';
            echo "<h3>";
            echo "<a href=";
            the_permalink();
            echo ">";
            echo short_title('&hellip;', $options['teaser-title-words'], $options['teaser-title-maxlength']);
            echo "</a>";
            echo "</h3>";
            echo "</div>";
            echo "</li>";
        endwhile;
        echo "</ul>";
        echo "</div>";
        wp_reset_query(); 
    } ?>
</div>
<div class="second-teaser-widget-area">
<div class="skin">
    <?php if ( is_active_sidebar( 'second-teaser-widget-area' ) ) { ?>
        <?php dynamic_sidebar( 'second-teaser-widget-area' ); ?>
    <?php } else {
                                 if (!isset($options['teaserlink1-title'])) 
                                  $options['teaserlink1-title'] = $defaultoptions['teaserlink1-title'];   
                             if (!isset($options['teaserlink1-untertitel'])) 
                                  $options['teaserlink1-untertitel'] = $defaultoptions['teaserlink1-untertitel'];   
                             if (!isset($options['teaserlink1-url'])) 
                                  $options['teaserlink1-url'] = $defaultoptions['teaserlink1-url'];   
                             if (!isset($options['teaserlink1-symbol'])) 
                                  $options['teaserlink1-symbol'] = $defaultoptions['teaserlink1-symbol'];   
                             
                             if (!isset($options['teaserlink2-title'])) 
                                  $options['teaserlink2-title'] = $defaultoptions['teaserlink2-title'];   
                             if (!isset($options['teaserlink2-untertitel'])) 
                                  $options['teaserlink2-untertitel'] = $defaultoptions['teaserlink2-untertitel'];   
                             if (!isset($options['teaserlink2-url'])) 
                                  $options['teaserlink2-url'] = $defaultoptions['teaserlink2-url'];   
                             if (!isset($options['teaserlink2-symbol'])) 
                                  $options['teaserlink2-symbol'] = $defaultoptions['teaserlink2-symbol'];  
                             
                             if (!isset($options['teaserlink3-title'])) 
                                  $options['teaserlink3-title'] = $defaultoptions['teaserlink3-title'];   
                             if (!isset($options['teaserlink3-untertitel'])) 
                                  $options['teaserlink3-untertitel'] = $defaultoptions['teaserlink3-untertitel'];   
                             if (!isset($options['teaserlink3-url'])) 
                                  $options['teaserlink3-url'] = $defaultoptions['teaserlink3-url'];   
                             if (!isset($options['teaserlink3-symbol'])) 
                                  $options['teaserlink3-symbol'] = $defaultoptions['teaserlink3-symbol'];  
     ?>
    
        <div class="teaserlinks">
            <ul>
                <li><a class="symbol symbol-<?php echo $options['teaserlink1-symbol'] ?>" href="<?php echo $options['teaserlink1-url'] ?>"><?php echo $options['teaserlink1-title'] ?> <span><?php echo $options['teaserlink1-untertitel'] ?></span></a></li>
                <li><a class="symbol symbol-<?php echo $options['teaserlink2-symbol'] ?>" href="<?php echo $options['teaserlink2-url'] ?>"><?php echo $options['teaserlink2-title'] ?> <span><?php echo $options['teaserlink2-untertitel'] ?></span></a></li>
                <li><a class="symbol symbol-<?php echo $options['teaserlink3-symbol'] ?>" href="<?php echo $options['teaserlink3-url'] ?>"><?php echo $options['teaserlink3-title'] ?> <span><?php echo $options['teaserlink3-untertitel'] ?></span></a></li>
            </ul>
        </div>

    <?php }  ?>
</div>
</div>
