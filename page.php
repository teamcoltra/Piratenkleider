<?php get_header(); ?>

<div class="section content">
  <div class="row">
    <div class="content-primary">
      <div class="content-header">
        <h1 id="page-title"><span><?php the_title(); ?></span></h1>
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail(); 
        } else {            
           $bilderoptions = get_option( 'piratenkleider_theme_defaultbilder' ); 
           $defaultbildsrc = $bilderoptions['seiten-defaultbildsrc'];                        
            echo '<img src="'.$defaultbildsrc.'" width="640" height="240" alt="">';                        
        }   
         ?>
      </div>
      <div class="skin">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
        <?php edit_post_link( __( 'Bearbeiten', 'twentyten' ), '', '' ); ?>
        <?php endwhile; ?>
      </div>
    </div>

    <div class="content-aside">
      <div class="skin">

          
        <?php 
       if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'walker'  => new My_Walker_Nav_Menu()) );      
        } else { 
        ?>
          <ul class="menu">
              <?php  wp_page_menu( ); ?>
          </ul>
           <?php 
         } 
        $custom_fields = get_post_custom();
        if ($custom_fields['right_column'][0]<>'') {
            echo $custom_fields['right_column'][0]; 
        }  
         ?>
         <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
