<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'piratenkleider_options', 'piratenkleider_theme_options', 'theme_options_validate' );
        register_setting( 'piratenkleider_defaultbilder', 'piratenkleider_theme_defaultbilder', 'theme_defaultbilder_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Piratenkleider pimpen', 'piratenkleider' ), __( 'Piratenkleider pimpen', 'piratenkleider' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
        add_theme_page( __( 'Defaultbilder', 'piratenkleider' ), __( 'Defaultbilder', 'piratenkleider' ), 'edit_theme_options', 'theme_defaultbilder', 'theme_defaultbilder_do_page' );
}


/**
 * Create the options page
 */
function theme_options_do_page() {
	global $defaultoptions;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
        <style>
                label.description {
                    display: block;
                }
                div.wrap {
                    max-width: 1200px;
                    margin: 20px 0 0 0;
                    background-image: url(<?php echo $defaultoptions['logo']; ?>);
                    background-position: top right;
                    background-repeat: no-repeat;
                    padding: 0;
                }
                div.piratenkleider-optionen {
                    max-width: 1200px;
                    margin: 0;
                    padding-bottom: 0px;
                    background-image: url(<?php echo get_bloginfo('template_url')?>/images/schiff-welle.gif);
                    background-position: bottom left;
                    background-repeat: no-repeat;
                }
                p.submit {
                    margin-top: 100px;
                    padding-left: 20px;
                }
                .wrap div.updated {
                    margin-right: 300px;                    
                }
            </style>
	<div class="wrap">
            
            <div class="piratenkleider-optionen">  <!-- begin: .piratenkleider-optionen -->    
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' pimpen ', 'piratenkleider' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Optionen wurden gespeichert.', 'piratenkleider' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'piratenkleider_options' ); ?>
			<?php $options = get_option( 'piratenkleider_theme_options' ); 
                            if ( ! isset( $options['slider-slideshowSpeed'] ) )
                                $options['slider-slideshowSpeed'] = $defaultoptions['slider-slideshowSpeed']; 
                            if ( ! isset( $options['slider-animationDuration'] ) )
                                $options['slider-animationDuration'] = $defaultoptions['slider-animationDuration'];
                            if ( ! isset( $options['defaultwerbesticker'] ) )
                                $options['defaultwerbesticker'] = $defaultoptions['defaultwerbesticker'];;
                            if ( ! isset( $options['aktiv-autoren'] ) ) 
                                $options['aktiv-autoren'] = $defaultoptions['aktiv-autoren']; 
                            if ( ! isset( $options['newsletter'] ) ) 
                                $options['newsletter'] = $defaultoptions['newsletter'];
                            if ( ! isset( $options['alle-socialmediabuttons'] ) ) 
                                $options['alle-socialmediabuttons'] = $defaultoptions['alle-socialmediabuttons'];
                            if ( ! isset( $options['aktiv-platzhalterbilder-indexseiten'] ) ) 
                                $options['aktiv-platzhalterbilder-indexseiten'] = $defaultoptions['aktiv-platzhalterbilder-indexseiten'];  
                            if ( ! isset( $options['slider-aktiv'] ) ) 
                                $options['slider-aktiv'] = $defaultoptions['slider-aktiv'];
                            if ( ! isset( $options['slider-defaultwerbeplakate'] ) ) 
                                $options['slider-defaultwerbeplakate'] = $defaultoptions['slider-defaultwerbeplakate'];
                            if ( ! isset( $options['slider-numberarticle'] ) ) 
                                $options['slider-numberarticle'] = $defaultoptions['slider-numberarticle']; 
                            if ( ! isset( $options['feed_twitter_numberarticle'] ) )
                                $options['feed_twitter_numberarticle'] = $defaultoptions['feed_twitter_numberarticle']; 
                             if (!isset($options['num-article-startpage-fullwidth'])) 
                                $options['num-article-startpage-fullwidth'] = $defaultoptions['num-article-startpage-fullwidth'];
                            if (!isset($options['num-article-startpage-halfwidth'])) 
                                $options['num-article-startpage-halfwidth'] = $defaultoptions['num-article-startpage-halfwidth']; 

                            if (!isset($options['url-newsletteranmeldung'])) 
                                $options['url-newsletteranmeldung'] = $defaultoptions['url-newsletteranmeldung'];
	                    if (!isset($options['url-mitgliedwerden'])) 
                                $options['url-mitgliedwerden'] = $defaultoptions['url-mitgliedwerden'];
                            if (!isset($options['url-spenden'])) 
                                $options['url-spenden'] = $defaultoptions['url-spenden'];
                            if (!isset($options['aktiv-defaultseitenbild'])) 
                               $options['aktiv-defaultseitenbild'] = $defaultoptions['aktiv-defaultseitenbild'];
                        ?>
			<table class="form-table">
                                    
                            
                                <tr valign="top"><th scope="row">Werbesticker</th>
					<td>
						<input id="piratenkleider_theme_options[defaultwerbesticker]" name="piratenkleider_theme_options[defaultwerbesticker]" type="checkbox" value="1" <?php checked( '1', $options['defaultwerbesticker'] ); ?> />
						<label  for="piratenkleider_theme_options[defaultwerbesticker]">Sticker "Werde Pirat" und "Hilf uns mit einer Spende" anzeigen.</label>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Piraten-Newsletter</th>
					<td>
						<input id="piratenkleider_theme_options[newsletter]" name="piratenkleider_theme_options[newsletter]" type="checkbox" value="1" <?php checked( '1', $options['newsletter'] ); ?> />
						<label  for="piratenkleider_theme_options[newsletter]">Eingabemaske anzeigen</label>
					</td>
				</tr>
                                <tr valign="top"><th scope="row">Defaultbilder für Seiten</th>
					<td>
						<input id="piratenkleider_theme_options[aktiv-defaultseitenbild]" name="piratenkleider_theme_options[aktiv-defaultseitenbild]" type="checkbox" value="1" <?php checked( '1', $options['aktiv-defaultseitenbild'] ); ?> />
						<label  for="piratenkleider_theme_options[aktiv-defaultseitenbild]">Bilder für Seiten erzwingen, die von sich aus kein Artikelbild definiert haben. Wenn kein Artikelbild vorhanden ist,
                                                wird ein Defaultbild gezeigt.</label>
					</td>
				</tr>
                                <tr valign="top"><th scope="row">Platzhalterbilder für Indexseiten</th>
					<td>
						<input id="piratenkleider_theme_options[aktiv-platzhalterbilder-indexseiten]" name="piratenkleider_theme_options[aktiv-platzhalterbilder-indexseiten]" type="checkbox" value="1" <?php checked( '1', $options['aktiv-platzhalterbilder-indexseiten'] ); ?> />
						<label  for="piratenkleider_theme_options[aktiv-platzhalterbilder-indexseiten]">Platzhalterbilder bei Indexseiten zu Kategorien, Tags, Suche und Archiv anzeigen</label>
					</td>
				</tr>
				 <tr valign="top"><th scope="row">Autoren anzeigen</th>
					<td>
						<input id="piratenkleider_theme_options[aktiv-autoren]" name="piratenkleider_theme_options[aktiv-autoren]" type="checkbox" value="1" <?php checked( '1', $options['aktiv-autoren'] ); ?> />
						<label  for="piratenkleider_theme_options[aktiv-autoren]">Bei der Anzeige von Artikeln den Autoren anzeigen und verlinken.</label>
					</td>
				</tr>
				<tr valign="top">
                                    <th scope="row">Beiträge auf Startseite</th>
                                    <td>
                                        <table>
                                            <tr valign="top"><th scope="row">Beiträge über ganze Breite</th>
                                            <td>
                                                    <select name="piratenkleider_theme_options[num-article-startpage-fullwidth]">
                                                        <?php
                                                                    $selected = $options['num-article-startpage-fullwidth'];
                                                        ?>            
                                                        <option style="padding-right: 10px;" value="0" <?php if ($selected == '0') { echo 'selected="selected"'; }?>>0</option>
                                                        <option style="padding-right: 10px;" value="1" <?php if ($selected == '1') { echo 'selected="selected"'; }?>>1</option>
                                                        <option style="padding-right: 10px;" value="2" <?php if ($selected == '2') { echo 'selected="selected"'; }?>>2</option>
                                                        <option style="padding-right: 10px;" value="3" <?php if ($selected == '3') { echo 'selected="selected"'; }?>>3</option>
                                                        <option style="padding-right: 10px;" value="4" <?php if ($selected == '4') { echo 'selected="selected"'; }?>>4</option>
                                                        <option style="padding-right: 10px;" value="5" <?php if ($selected == '5') { echo 'selected="selected"'; }?>>5</option>
                                                       						
                                                    </select>
                                                    <label class="description" for="piratenkleider_theme_options[num-article-startpage-fullwidth]">
                                                        Zahl der Beiträge, die über die gesamte Inhaltsbreite gehen.
                                                    </label>
                                            </td>
                                            </tr>
                                            <tr valign="top"><th scope="row">Beiträge über halbe Breite</th>
                                            <td>
                                                    <select name="piratenkleider_theme_options[num-article-startpage-halfwidth]">
                                                        <?php
                                                                    $selected = $options['num-article-startpage-halfwidth'];
                                                        ?>            
                                                        <option style="padding-right: 10px;" value="0" <?php if ($selected == '0') { echo 'selected="selected"'; }?>>0</option>
                                                        <option style="padding-right: 10px;" value="2" <?php if ($selected == '2') { echo 'selected="selected"'; }?>>2</option>                                                        
                                                        <option style="padding-right: 10px;" value="4" <?php if ($selected == '4') { echo 'selected="selected"'; }?>>4</option>
                                                        <option style="padding-right: 10px;" value="6" <?php if ($selected == '6') { echo 'selected="selected"'; }?>>6</option>
                                                        <option style="padding-right: 10px;" value="8" <?php if ($selected == '8') { echo 'selected="selected"'; }?>>8</option>                                                       					
                                                    </select>
                                                    <label class="description" for="piratenkleider_theme_options[num-article-startpage-halfwidth]">
                                                        Zahl der Beiträge, die in Spalten mit je zwei Beiträgen nebeneinander, angezeigt werden.
                                                    </label>
                                            </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </tr>
				 <tr valign="top">
                                    <th scope="row"><?php _e( 'Social Media', 'piratenkleider' ); ?></th>
                                    <td>
                                        <table>
                                            <tr valign="top"><th scope="row"><?php _e( 'Social Media Buttons', 'piratenkleider' ); ?></th>
                                        	<td>
						<input id="piratenkleider_theme_options[alle-socialmediabuttons]" name="piratenkleider_theme_options[alle-socialmediabuttons]" type="checkbox" value="1" <?php checked( '1', $options['alle-socialmediabuttons'] ); ?> />
						<label for="piratenkleider_theme_options[alle-socialmediabuttons]">
                                                    Buttons anzeigen. <br>Hinweis: Es werden nur die Buttons gezeigt, bei denen in den folgenden Eingabefeldern Adressen
                                                    definiert sind.
                                                </label>
                                                </td>
                                            </tr>  
                                            
                                            
                                          <tr valign="top"><th scope="row">Facebook</th>
                                          <td>
						<input id="piratenkleider_theme_options[social_facebook]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[social_facebook]" value="<?php esc_attr_e( $options['social_facebook'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[social_facebook]">
                                                <?php _e( 'URL inkl. http:// zur Facebook Seite', 'piratenkleider' ); ?>
                                                    <br>Zum Beispiel: <code>http://www.facebook.com/PiratenparteiDeutschland</code>
                                                </label>
                                                
					</td>					
                                        </tr>
                                        
                                        
                                        <tr valign="top"><th scope="row">Twitter</th>
                                          <td>
						<input id="piratenkleider_theme_options[social_twitter]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[social_twitter]" value="<?php esc_attr_e( $options['social_twitter'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[social_twitter]">
                                                <?php _e( 'URL inkl. http:// zur Twitter Seite', 'piratenkleider' ); ?>
                                                    <br>Zum Beispiel: <code>https://twitter.com/#!/piratenpartei</code>
                                                </label>
					</td>					
                                        </tr>
                                        
                                        <tr valign="top"><th scope="row">YouTube</th>
                                          <td>
						<input id="piratenkleider_theme_options[social_youtube]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[social_youtube]" value="<?php esc_attr_e( $options['social_youtube'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[social_youtube]">
                                                <?php _e( 'URL inkl. http:// zur YouTube Seite', 'piratenkleider' ); ?>
                                                    <br>Zum Beispiel: <code>http://www.youtube.com/user/piratenpartei</code>
                                                </label>
					</td>					
                                        </tr>
                                      
                                        <tr valign="top"><th scope="row">G+</th>
                                          <td>
						<input id="piratenkleider_theme_options[social_gplus]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[social_gplus]" value="<?php esc_attr_e( $options['social_gplus'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[social_gplus]">
                                                <?php _e( 'URL inkl. http:// zur G+ Seite', 'piratenkleider' ); ?>
                                                <br>Zum Beispiel: <code>https://plus.google.com/u/0/107862983960150496076/posts</code>
                                                </label>
					</td>					
                                        </tr>
                                        
                                         <tr valign="top"><th scope="row">Diaspora</th>
                                          <td>
						<input id="piratenkleider_theme_options[social_diaspora]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[social_diaspora]" value="<?php esc_attr_e( $options['social_diaspora'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[social_diaspora]">
                                                <?php _e( 'URL inkl. http:// zur Diaspora Seite', 'piratenkleider' ); ?>
                                                    <br>Zum Beispiel: <code>https://joindiaspora.com/u/piratenpartei</code>
                                                </label>
                                            </td>					
                                            </tr>

                                            <tr valign="top"><th scope="row">Identica</th>
                                            <td>
                                            <input id="piratenkleider_theme_options[social_identica]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[social_identica]" value="<?php esc_attr_e( $options['social_identica'] ); ?>" />
                                            <label class="description" for="piratenkleider_theme_options[social_identica]">
                                            <?php _e( 'URL inkl. http:// zur Identica Seite' ); ?>
                                                <br>Zum Beispiel:  <code>http://identi.ca/piratenpartei</code>   
                                            </label>
                                            </td>					
                                             </tr>
                                        </table>                                                                                
                                    </td>                                    
                                </tr>                                   
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Twitter Feed', 'piratenkleider' ); ?></th>
                                    <td>
                                        <table>
			
                                        
                                         <tr valign="top"><th scope="row">Twitter Benutzername</th>
                                          <td>
						<input id="piratenkleider_theme_options[feed_twitter]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[feed_twitter]" value="<?php esc_attr_e( $options['feed_twitter'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[feed_twitter]"><?php _e( 'Der reine Twitter Benutzername', 'piratenkleider' ); ?></label>
					</td>					
                                        </tr>
                                         <tr valign="top"><th scope="row"><?php _e( 'Maximale Anzahl der Twittermeldungen', 'piratenkleider' ); ?></th>
                                            <td>
                                                    <select name="piratenkleider_theme_options[feed_twitter_numberarticle]">
                                                        <?php
                                                                    $selected = $options['feed_twitter_numberarticle'];
                                                        ?>            
                                                        <option style="padding-right: 10px;" value="2" <?php if ($selected ==2) { echo 'selected="selected"'; }?>>2</option>
                                                        <option style="padding-right: 10px;" value="3" <?php if ($selected ==3) { echo 'selected="selected"'; }?>>3</option>
                                                        <option style="padding-right: 10px;" value="4" <?php if ($selected ==4) { echo 'selected="selected"'; }?>>4</option>
                                                        <option style="padding-right: 10px;" value="5" <?php if ($selected ==5) { echo 'selected="selected"'; }?>>5</option>
                                                        <option style="padding-right: 10px;" value="6" <?php if ($selected ==6) { echo 'selected="selected"'; }?>>6</option>							
                                                    </select>
                                                    <label class="description" for="piratenkleider_theme_options[feed_twitter_numberarticle]"><?php _e( 'Wieviele Twittermeldungen sollen maximal gezeigt werden', 'piratenkleider' ); ?></label>
                                            </td>
                                            </tr>             

                                         </table>                                                                                
                                    </td>                                    
                                </tr>                            
				
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Slider', 'piratenkleider' ); ?></th>
                                    <td>
                                        <table>
                                             <tr valign="top"><th scope="row"><?php _e( 'Slider aktivieren', 'piratenkleider' ); ?></th>
                                        	<td>
                                            	<input id="piratenkleider_theme_options[slider-aktiv]" name="piratenkleider_theme_options[slider-aktiv]" type="checkbox" value="1" <?php checked( '1', $options['slider-aktiv'] ); ?> />
						<label for="piratenkleider_theme_options[slider-aktiv]">Slider auf der Startseite aktivieren.
                                                <br>Die Auswahl der Plakatbilder kann unter den Defaultbildern angepasst werden.</label>
                                                </td>
                                            </tr>
                                             <tr valign="top"><th scope="row"><?php _e( 'Plakatslider aktivieren', 'piratenkleider' ); ?></th>
                                        	<td>
                                            	<input id="piratenkleider_theme_options[slider-defaultwerbeplakate]" name="piratenkleider_theme_options[slider-defaultwerbeplakate]" type="checkbox" value="1" <?php checked( '1', $options['slider-defaultwerbeplakate'] ); ?> />
						<label for="piratenkleider_theme_options[slider-defaultwerbeplakate]">Slider der Werbeplakate (rechte Sidebar-Spalte) werden angezeigt. 
                                                    <br>Die Auswahl der Plakatbilder kann unter den Defaultbildern angepasst werden.</label>
                                                </td>
                                            </tr>
                                             <tr valign="top"><th scope="row"><?php _e( 'Kategorie', 'piratenkleider' ); ?></th>
                                            <td>
                                                    <select name="piratenkleider_theme_options[slider-catname]">
                                                        <?php
                                                         $selected = $options['slider-catname'];      
                                                         if (!isset($selected) ) $selected ="Slider";  
                                                        $args=array(
                                                        'orderby' => 'name',
                                                        'order' => 'ASC'
                                                        );
                                                        
                                                        $categories=get_categories($args);
                                                        foreach($categories as $category) {
                                                            echo '<option value="'.$category->name.'"';
                                                            if ($category->name == $selected) {
                                                                 echo ' selected="selected"'; 
                                                            }
                                                            echo '>'.$category->name.' ('.$category->count.' Einträge)</option>';
                                                        } 
                                                        ?>
                                                    </select>
                                                    <label class="description" for="piratenkleider_theme_options[slider-catname]"><?php _e( 'Aus welcher Artikelkategorie sollen die Slider genommen werden', 'piratenkleider' ); ?></label>
                                            </td>
                                            </tr>
                                            
                                            
                                            
                                
                                            <tr valign="top"><th scope="row"><?php _e( 'Maximale Anzahl der Artikel', 'piratenkleider' ); ?></th>
                                            <td>
                                                    <select name="piratenkleider_theme_options[slider-numberarticle]">
                                                        <?php
                                                                    $selected = $options['slider-numberarticle'];
                                                        ?>            
                                                        <option style="padding-right: 10px;" value="2" <?php if ($selected ==2) { echo 'selected="selected"'; }?>>2</option>
                                                        <option style="padding-right: 10px;" value="3" <?php if ($selected ==3) { echo 'selected="selected"'; }?>>3</option>
                                                        <option style="padding-right: 10px;" value="4" <?php if ($selected ==4) { echo 'selected="selected"'; }?>>4</option>
                                                        <option style="padding-right: 10px;" value="5" <?php if ($selected ==5) { echo 'selected="selected"'; }?>>5</option>
                                                        <option style="padding-right: 10px;" value="6" <?php if ($selected ==6) { echo 'selected="selected"'; }?>>6</option>							
                                                    </select>
                                                    <label class="description" for="piratenkleider_theme_options[slider-numberarticle]"><?php _e( 'Wieviele Slides sollen maximal gezeigt werden', 'piratenkleider' ); ?></label>
                                            </td>
                                            </tr>
                                            <tr valign="top"><th scope="row"><?php _e( 'Animationstyp', 'piratenkleider' ); ?></th>
                                            <td>
                                                    <select name="piratenkleider_theme_options[slider-animationType]">
                                                        <?php
                                                                    $selected = $options['slider-animationType'];
                                                        ?>            
                                                        <option style="padding-right: 10px;" value="fade" <?php if ($selected == 'fade') { echo 'selected="selected"'; }?>>fade</option>
                                                        <option style="padding-right: 10px;" value="slide" <?php if ($selected == 'slide') { echo 'selected="selected"'; }?>>slide</option>
                                                       						
                                                    </select>
                                                    <label class="description" for="piratenkleider_theme_options[slider-animationType]"><?php _e( 'Wie soll der Slidewechsel optisch aussehen', 'piratenkleider' ); ?></label>
                                            </td>
                                            </tr>
                                            <tr valign="top"><th scope="row"><?php _e( 'Richtung', 'piratenkleider' ); ?></th>
                                            <td>
                                                    <select name="piratenkleider_theme_options[slider-Direction]">
                                                        <?php
                                                                    $selected = $options['slider-Direction'];
                                                        ?>            
                                                        <option style="padding-right: 10px;" value="horizontal" <?php if ($selected == 'horizontal') { echo 'selected="selected"'; }?>>horizontal</option>
                                                        <option style="padding-right: 10px;" value="vertical" <?php if ($selected == 'vertical') { echo 'selected="selected"'; }?>>vertical</option>
                                                       						
                                                    </select>
                                                    <label class="description" for="piratenkleider_theme_options[slider-Direction]"><?php _e( 'Von wo sollen Bilder erscheinen', 'piratenkleider' ); ?></label>
                                            </td>
                                            </tr>                                            
                                            <tr valign="top"><th scope="row"><?php _e( 'Dauer Bildwechsel', 'piratenkleider' ); ?></th>
                                                  <td>
                                                            <input style="width: 5em;"  id="piratenkleider_theme_options[slider-slideshowSpeed]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[slider-slideshowSpeed]" value="<?php esc_attr_e( $options['slider-slideshowSpeed'] ); ?>" />
                                                            <label class="description" for="piratenkleider_theme_options[slider-slideshowSpeed]"><?php _e( 'Geschwindigkeit des Bildwechsels in Milisekunden', 'piratenkleider' ); ?></label>
                                                    </td>

                                            </tr>
                                            <tr valign="top"><th scope="row"><?php _e( 'Animationsdauer', 'piratenkleider' ); ?></th>
                                                  <td>
                                                            <input style="width: 5em;" id="piratenkleider_theme_options[slider-animationDuration]" class="regular-text" type="text" length="5" name="piratenkleider_theme_options[slider-animationDuration]" value="<?php esc_attr_e( $options['slider-animationDuration'] ); ?>" />
                                                            <label class="description" for="piratenkleider_theme_options[slider-animationDuration]"><?php _e( 'Geschwindigkeit der Animation/Fading beim Bildübergang in Milisekunden', 'piratenkleider' ); ?></label>
                                                    </td>					
                                            </tr>
                                            
                                                         
                                        </table>                                                                                
                                    </td>                                    
                                </tr>    
                                <tr valign="top">
                                    <th scope="row">Links zu Spezialseiten</th>
                                    <td>

                                        <table>                                
                                         <tr valign="top"><th scope="row">Mitglied werden</th>
                                              <td>
                                                        <input style="width: 40em;" id="piratenkleider_theme_options[url-mitgliedwerden]" class="regular-text" type="text" name="piratenkleider_theme_options[url-mitgliedwerden]" value="<?php esc_attr_e( $options['url-mitgliedwerden'] ); ?>" />
                                                        <label class="description" for="piratenkleider_theme_options[url-mitgliedwerden]">URL, inkl. https://, zur Seite auf der sich Mitglieder bewerben können. Hier sollte entweder die URL zur Bundesseite <code><?php echo $defaultoptions['url-mitgliedwerden']; ?></code>
                                                        oder die zu der entsprechenden Seite eines Landesverbandes stehen. Bitte mit https anstelle http, wenn möglich.</label>
                                                </td>					
                                        </tr>
                                         <tr valign="top"><th scope="row">Spenden</th>
                                              <td>
                                                        <input style="width: 40em;" id="piratenkleider_theme_options[url-spenden]" class="regular-text" type="text"  name="piratenkleider_theme_options[url-spenden]" value="<?php esc_attr_e( $options['url-spenden'] ); ?>" />
                                                        <label class="description" for="piratenkleider_theme_options[url-spenden]">URL, inkl. https://, zur Seite auf der Spenden gegeben werden können. Default: <code><?php echo $defaultoptions['url-spenden']; ?></code></label>
                                                </td>					
                                        </tr>
                                        <tr valign="top"><th scope="row">Newsletter</th>
                                          <td>
						<input style="width: 40em;" id="piratenkleider_theme_options[url-newsletteranmeldung]" class="regular-text" type="text"  name="piratenkleider_theme_options[url-newsletteranmeldung]" value="<?php esc_attr_e( $options['url-newsletteranmeldung'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[url-newsletteranmeldung]">URL, inkl. http://, zur Seite auf der man sich in Newsletter eingetragen werden kann. Default: <code><?php echo $defaultoptions['url-newsletteranmeldung']; ?></code></label>
					</td>					
                                        </tr>
                                       </table>  
                                       
                                            
                                            
                                    </td>                                    
                                </tr>
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Meta-Angaben', 'piratenkleider' ); ?></th>
                                    <td>

                                        <table>                                
                                         <tr valign="top"><th scope="row"><?php _e( 'Author', 'piratenkleider' ); ?></th>
                                              <td>
                                                        <input id="piratenkleider_theme_options[meta-author]" class="regular-text" type="text"  name="piratenkleider_theme_options[meta-author]" value="<?php esc_attr_e( $options['meta-author'] ); ?>" />
                                                        <label class="description" for="piratenkleider_theme_options[meta-author]"><?php _e( 'Optionale Autor-Angabe in dem Meta-Tag jeder Seite', 'piratenkleider' ); ?></label>
                                                </td>					
                                        </tr>
                                         <tr valign="top"><th scope="row"><?php _e( 'Description', 'piratenkleider' ); ?></th>
                                              <td>
                                                        <input id="piratenkleider_theme_options[meta-description]" class="regular-text" type="text"  name="piratenkleider_theme_options[meta-description]" value="<?php esc_attr_e( $options['meta-description'] ); ?>" />
                                                        <label class="description" for="piratenkleider_theme_options[meta-description]"><?php _e( 'Optionale Beschreibungstext in dem Meta-Tag jeder Seite (für alle gleich). Sollte nicht mehr als 140 Zeichen lang sein, wenn gesetzt.', 'piratenkleider' ); ?></label>
                                                </td>					
                                        </tr>
                                        <tr valign="top"><th scope="row"><?php _e( 'Keywords', 'piratenkleider' ); ?></th>
                                          <td>
						<input id="piratenkleider_theme_options[meta-keywords]" class="regular-text" type="text" name="piratenkleider_theme_options[meta-keywords]" value="<?php esc_attr_e( $options['meta-keywords'] ); ?>" />
						<label class="description" for="piratenkleider_theme_options[meta-keywords]"><?php _e( 'Optionale Schlüsselworte in dem Meta-Tag jeder Seite (für alle gleich). Durch Komma getrennt. Schlüsselworte sollten tatsächlich vorkommen.', 'piratenkleider' ); ?></label>
					</td>					
                                        </tr>
                                       </table>  
                                        <p>
                                            Hinweis: Diese Angaben wirken auf alle Seiten und Artikel der Site. Dies
                                            ist jedoch nicht immer sinnvoll (insbes. bei Keywords und Description). 
                                            Sollten zudem SEO-Plugins, wie bspw. wpSEO o.a. im Einsatz sein,
                                            sollten diese Angaben ebenfalls unausgefüllt bleiben.                                                                                                                                    
                                        </p>
                                    </td>                                    
                                </tr>    
                                
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Optionen speichern', 'piratenkleider' ); ?>" />
			</p>
		</form>               
	</div>
            
        </div> <!-- end: .piratenkleider-optionen -->      
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
    global $defaultoptions;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['defaultwerbesticker'] ) )
		$input['defaultwerbesticker'] = 0;
	$input['defaultwerbesticker'] = ( $input['defaultwerbesticker'] == 1 ? 1 : 0 );    
        
        if ( ! isset( $input['aktiv-defaultseitenbild'] ) )
		$input['aktiv-defaultseitenbild'] = 0;
	$input['aktiv-defaultseitenbild'] = ( $input['aktiv-defaultseitenbild'] == 1 ? 1 : 0 );    
        
        
        
        if ( ! isset( $input['aktiv-autoren'] ) )
		$input['aktiv-autoren'] = 0;
	$input['aktiv-autoren'] = ( $input['aktiv-autoren'] == 1 ? 1 : 0 );    
        
	if ( ! isset( $input['newsletter'] ) )
		$input['newsletter'] = 0;
	$input['newsletter'] = ( $input['newsletter'] == 1 ? 1 : 0 );
	if ( ! isset( $input['alle-socialmediabuttons'] ) )
		$input['alle-socialmediabuttons'] = 0;
	$input['alle-socialmediabuttons'] = ( $input['alle-socialmediabuttons'] == 1 ? 1 : 0 );
        
        if ( ! isset( $input['aktiv-platzhalterbilder-indexseiten'] ) )
		$input['aktiv-platzhalterbilder-indexseiten'] = 0;
	$input['aktiv-platzhalterbilder-indexseiten'] = ( $input['aktiv-platzhalterbilder-indexseiten'] == 1 ? 1 : 0 );       
        
        if ( ! isset( $input['slider-aktiv'] ) )
		$input['slider-aktiv'] = 0;
	$input['slider-aktiv'] = ( $input['slider-aktiv'] == 1 ? 1 : 0 );        
         if ( ! isset( $input['slider-defaultwerbeplakate'] ) )
		$input['slider-defaultwerbeplakate'] = 0;
	$input['slider-defaultwerbeplakate'] = ( $input['slider-defaultwerbeplakate'] == 1 ? 1 : 0 );        
        
        if ( ! isset( $input['slider-numberarticle'] ) )
		$input['slider-numberarticle'] = 3;
		
	if ( ! isset( $input['feed_twitter_numberarticle'] ) )
		$input['feed_twitter_numberarticle'] = 3;
		
        $input['slider-slideshowSpeed'] = wp_filter_nohtml_kses( $input['slider-slideshowSpeed'] );
        if ( ! isset( $input['slider-slideshowSpeed'] ) )
		$input['slider-slideshowSpeed'] = 8000;
         $input['slider-animationDuration'] = wp_filter_nohtml_kses( $input['slider-animationDuration'] );
        if ( ! isset( $input['slider-animationDuration'] ) )
		$input['slider-animationDuration'] = 600;       
        $input['slider-catname'] = wp_filter_nohtml_kses( $input['slider-catname'] );
        $input['slider-Direction'] = wp_filter_nohtml_kses( $input['slider-Direction'] );
        $input['slider-animationType'] = wp_filter_nohtml_kses( $input['slider-animationType'] );   
        
        $input['meta-keywords'] = wp_filter_nohtml_kses( $input['meta-keywords'] );
        $input['meta-author'] = wp_filter_nohtml_kses( $input['meta-author'] );
        $input['meta-description'] = wp_filter_nohtml_kses( $input['meta-description'] );
        $input['social_facebook'] = wp_filter_nohtml_kses( $input['social_facebook'] );
        $input['social_twitter'] = wp_filter_nohtml_kses( $input['social_twitter'] );
        $input['social_youtube'] = wp_filter_nohtml_kses( $input['social_youtube'] );
        $input['social_gplus'] = wp_filter_nohtml_kses( $input['social_gplus'] );
        $input['social_diaspora'] = wp_filter_nohtml_kses( $input['social_diaspora'] );
        $input['social_identica'] = wp_filter_nohtml_kses( $input['social_identica'] );            
        $input['feed_twitter'] = wp_filter_nohtml_kses( $input['feed_twitter'] );
	
        $input['url-newsletteranmeldung'] = esc_url( $input['url-newsletteranmeldung'] );
        $input['url-mitgliedwerden'] = esc_url( $input['url-mitgliedwerden'] );
        $input['url-spenden'] = esc_url( $input['url-spenden'] );
 
	return $input;
}


/**
 * Create the options page
 */
function theme_defaultbilder_do_page() {
   global $defaultbilder_liste;
   global $defaultplakate_liste;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
        <style>
                label.description {
                    display: block;
                }
                div.wrap {
                    max-width: 1200px;
                    margin: 20px 0 0 0;
                    background-image: url(<?php echo get_bloginfo('template_url')?>/images/logo.png);
                    background-position: top right;
                    background-repeat: no-repeat;
                    padding: 0;
                }
                div.piratenkleider-optionen {
                    max-width: 1200px;
                    margin: 0;
                    padding-bottom: 0px;
                    background-image: url(<?php echo get_bloginfo('template_url')?>/images/schiff-welle.gif);
                    background-position: bottom left;
                    background-repeat: no-repeat;
                }
                p.submit {
                    margin-top: 100px;
                    padding-left: 20px;
                }
                .wrap div.updated {
                    margin-right: 300px;                    
                }
                label.tile {
                    width: 320px;
                    height: 150px;
                    float: left;
                    border: 1px solid #ccc;                    
                    padding: 1px;
                    margin: 5px;
                }
                label.tile:hover {
                    background-color: #eee;
                }
                label.plakattile {
                    width: 160px;
                    height: 250px;
                    float: left;
                    border: 1px solid #ccc;                    
                    padding: 1px;
                    margin: 5px;
                }
                label.plakattile:hover {
                    background-color: #eee;
                }                
            </style>
	<div class="wrap">
            
            <div class="piratenkleider-optionen">  <!-- begin: .piratenkleider-optionen -->    
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Defaultbilder festlegen ', 'piratenkleider' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Defaultbilder wurden gespeichert.', 'piratenkleider' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
                    <?php settings_fields( 'piratenkleider_defaultbilder' ); ?>
                    <?php $options = get_option( 'piratenkleider_theme_defaultbilder' ); 
                        $defaultbildsrc = $options['slider-defaultbildsrc']; 
                        $defaultseitenbildsrc = $options['seiten-defaultbildsrc']; 
                        
                    ?>
                    <table class="form-table">
                     <tr valign="top">
                        <th scope="row"><?php _e( 'Defaultbilder für Slider', 'piratenkleider' ); ?></th>
                        <td>

                            <?php 
                                if ( ! isset( $checked ) ) $checked = '';
                                foreach ( $defaultbilder_liste as $option ) {


                                        if ( '' != $defaultbildsrc ) {
                                                if ( $defaultbildsrc == $option['src'] ) {
                                                        $checked = "checked=\"checked\"";
                                                } else {
                                                        $checked = '';
                                                }
                                        }
                                        ?>
                                        <label class="tile">                                                                                          
                                               <input type="radio" name="piratenkleider_theme_defaultbilder[slider-defaultbildsrc]" value="<?php esc_attr_e( $option['src'] ); ?>" <?php echo $checked; ?> />                                                                                                 
                                            <?php echo $option['label']?>
                                               <br> 
                                            <img src="<?php echo $option['src'] ?>" style="margin: 5px auto; width: 320px; height: auto;">
                                        </label>
                                <?php } ?>        
                                <br style="clear: left;">     
                                <h3>Alternatives Sliderbild als URL</h3>
                                 <input id="piratenkleider_theme_defaultbilder[slider-alternativesrc]" class="regular-text" type="text" name="piratenkleider_theme_defaultbilder[slider-alternativesrc]" value="<?php esc_attr_e( $options['slider-alternativesrc'] ); ?>" />
                            <label class="description" for="piratenkleider_theme_defaultbilder[slider-alternativesrc]">
                                URL inkl. http:// zum Bild. Dieses kann auch vorher über den Mediendialog hochgeladen worden sein.                        
                                <br>
                                Das Bild sollte nicht breiter als 640 Pixel sein und seine wesentlichen Merkmale auf einer
                                Höhe von 240 Pixel zeigen. In der Darstellung der Seite wird ab 240 Pixel nach unten abgeschnitten.
                            </label>
                                 <br />
                            </td>
                        </tr>  
                    
                     <tr valign="top">
                        <th scope="row"><?php _e( 'Defaultbilder für Seiten', 'piratenkleider' ); ?></th>
                        <td>

                            <?php 
                                if ( ! isset( $checked ) ) $checked = '';
                                foreach ( $defaultbilder_liste as $option ) {
                                        if ( '' != $defaultseitenbildsrc ) {
                                                if ( $defaultseitenbildsrc == $option['src'] ) {
                                                        $checked = "checked=\"checked\"";
                                                } else {
                                                        $checked = '';
                                                }
                                        }
                                        ?>
                                        <label class="tile">
                                            <input type="radio" name="piratenkleider_theme_defaultbilder[seiten-defaultbildsrc]" value="<?php esc_attr_e( $option['src'] ); ?>" <?php echo $checked; ?> />                                                     
                                            <?php echo $option['label']?>
                                            <br> 
                                            <img src="<?php echo $option['src'] ?>" style="width: 320px; height: auto;">

                                        </label>
                                <?php } ?>        
                                <br style="clear: left;">   
                                <h3>Alternatives Seitenbild als URL</h3>
                                <input id="piratenkleider_theme_defaultbilder[seiten-alternativesrc]" class="regular-text" type="text" name="piratenkleider_theme_defaultbilder[seiten-alternativesrc]" value="<?php esc_attr_e( $options['seiten-alternativesrc'] ); ?>" />
                               <label class="description" for="piratenkleider_theme_defaultbilder[seiten-alternativesrc]">
                                URL inkl. http:// zum Bild. Dieses kann auch vorher über den Mediendialog hochgeladen worden sein.                               
                                <br>
                                Das Bild sollte nicht breiter als 640 Pixel sein und seine wesentlichen Merkmale auf einer
                                Höhe von 150 Pixel zeigen. In der Darstellung der Seite wird ab 150 Pixel nach unten abgeschnitten.
                                   
                              </label>
                                 <br />
                            </td>
                        </tr>
                        <tr valign="top">
                        <th scope="row"><?php _e( 'Defaultplakate für Sidebar', 'piratenkleider' ); ?></th>
                        <td>                                                      
                            <?php                                                                                     
                                if ( ! isset( $checked ) ) $checked = '';
                                foreach ( $defaultplakate_liste as $option ) {    
                                    $checked = '';
                                    if (is_array($options['plakate-src'])) {
                                        foreach ($options['plakate-src'] as $current) {                                                                                      
                                            if ($current == $option['src']) {
                                                 $checked = "checked=\"checked\"";                                                                                            
                                                 break;
                                            }                                           ;
                                        }
                                    }                                    
                                     ?>       
                                    <label class="plakattile">
                                        <div style="height: 40px; width: 100%; margin:0 auto; background-color: #F28900; color: white; display: block;">  
                                        <input type="checkbox" name="piratenkleider_theme_defaultbilder[plakate-src][]" value="<?php esc_attr_e( $option['src'] ); ?>" <?php echo $checked; ?> />                                                     
                                        <?php echo $option['label']?>
                                        </div>
                                        <div style="height: 200px; overflow: hidden; margin: 5px auto; width: 150px; padding: 0;">
                                        <img src="<?php echo $option['src'] ?>" style="width: 150px; height: auto;  ">
                                        </div>
                                    </label>
                               <?php } ?>        
                                <br style="clear: left;"> 
                                <p>
                                    Diese Bilder werden in der Sidebar rechts gezeigt, sofern dieses über die Optionen (vgl. Slider) auch eingeschaltet ist.                                    
                                </p>
                                    
                                    
                                
                                <h3>Eigene Plaktbilder:</h3>
                                
                                <textarea id="piratenkleider_theme_defaultbilder[plakate-altadressen]" class="large-text" cols="30" rows="5" name="piratenkleider_theme_defaultbilder[plakate-altadressen]"><?php echo esc_textarea( $options['plakate-altadressen'] ); ?></textarea>
				<label class="description" for="piratenkleider_theme_defaultbilder[plakate-altadressen]"><?php _e( 'Adressen alternativer Plakatbilder', 'piratenkleider' ); ?></label>

                                <p>    
                                Angabe der URLs inkl. http:// zum Bild. Wenn es mehrere sind, werden
                                die einzelnen Adressen durch ein Komma oder Umbruch getrennt. 
                                Wenn oben Defaultplakate angeklickt sind, erscheinen diese Bilder zusätzlich.
                                Diese Bilder können auch vorher über den Mediendialog hochgeladen worden sein.                               
                                <br>
                                Die Bilder sollten jeweils exakt 277x391 Pixel groß sein.
                                 </p>      
                              </label>
                                 <br />
                            </td>
                        </tr>
             </table>

            <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e( 'Optionen speichern', 'piratenkleider' ); ?>" />
            </p>
        </form>               
	</div>
            
        </div> <!-- end: .piratenkleider-optionen -->      
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_defaultbilder_validate( $input ) {
	global $defaultbilder_liste;

	
        $input['slider-alternativesrc'] = wp_filter_nohtml_kses( $input['slider-alternativesrc'] );            
        $input['slider-defaultbildsrc'] = wp_filter_nohtml_kses( $input['slider-defaultbildsrc'] );       
        if ($input['slider-alternativesrc'] != '') {            
            $input['slider-defaultbildsrc'] = $input['slider-alternativesrc'];
        }
        $input['seiten-alternativesrc'] = wp_filter_nohtml_kses( $input['seiten-alternativesrc'] );            
        $input['seiten-defaultbildsrc'] = wp_filter_nohtml_kses( $input['seiten-defaultbildsrc'] );       
        if ($input['seiten-alternativesrc'] != '') {            
            $input['seiten-defaultbildsrc'] = $input['seiten-alternativesrc'];
        }
        $input['plakate-altadressen'] = wp_filter_post_kses( $input['plakate-altadressen'] );
	return $input;
}
// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/