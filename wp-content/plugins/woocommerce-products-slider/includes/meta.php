<?php

/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

function wcps_posttype_register() {
 
        $labels = array(
                'name' => __('WCPS', 'wcps'),
                'singular_name' => __('WCPS', 'wcps'),
                'add_new' => __('New WCPS', 'wcps'),
                'add_new_item' => __('New WCPS','wcps'),
                'edit_item' => __('Edit WCPS','wcps'),
                'new_item' => __('New WCPS','wcps'),
                'view_item' => __('View WCPS','wcps'),
                'search_items' => __('Search WCPS','wcps'),
                'not_found' =>  __('Nothing found','wcps'),
                'not_found_in_trash' => __('Nothing found in Trash','wcps'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => false,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'wcps' , $args );

}

add_action('init', 'wcps_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_wcps()
	{
		$screens = array( 'wcps' );
		foreach ( $screens as $screen )
			{
				add_meta_box('wcps_metabox',__( 'Woocommerce Products Slider Options','wcps' ),'meta_boxes_wcps_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_wcps' );


function meta_boxes_wcps_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_wcps_input', 'meta_boxes_wcps_input_nonce' );
	
	
	$wcps_bg_img = get_post_meta( $post->ID, 'wcps_bg_img', true );
	$wcps_container_padding = get_post_meta( $post->ID, 'wcps_container_padding', true );
	if(empty($wcps_container_padding)){
		$wcps_container_padding = '';
		}
	
	$wcps_container_bg_color = get_post_meta( $post->ID, 'wcps_container_bg_color', true );
	if(empty($wcps_container_bg_color)){
		$wcps_container_bg_color = '';
		}	
	
	$wcps_items_bg_color = get_post_meta( $post->ID, 'wcps_items_bg_color', true );
	if(empty($wcps_items_bg_color)){
		
		$wcps_items_bg_color = '';
		}
	
	$wcps_items_padding = get_post_meta( $post->ID, 'wcps_items_padding', true );
	if(empty($wcps_items_padding)){
		$wcps_items_padding = '';
		
		}
	
	$wcps_themes = get_post_meta( $post->ID, 'wcps_themes', true );
	if(empty($wcps_themes)){
		$wcps_themes = 'flat';
		}
	
	
	$wcps_total_items = get_post_meta( $post->ID, 'wcps_total_items', true );
	if(empty($wcps_total_items)){
		$wcps_total_items = 10;
		}	
	
	$wcps_total_items_price_format = get_post_meta( $post->ID, 'wcps_total_items_price_format', true );	
	
	$wcps_column_number = get_post_meta( $post->ID, 'wcps_column_number', true );
	if(empty($wcps_column_number)){
		$wcps_column_number = 3;
		}
	$wcps_column_number_tablet = get_post_meta( $post->ID, 'wcps_column_number_tablet', true );
	if(empty($wcps_column_number_tablet)){
		$wcps_column_number_tablet = 2;
		}
	
	$wcps_column_number_mobile = get_post_meta( $post->ID, 'wcps_column_number_mobile', true );
	if(empty($wcps_column_number_mobile)){
		$wcps_column_number_mobile = 1;
		}
		
	$wcps_auto_play = get_post_meta( $post->ID, 'wcps_auto_play', true );
	if(empty($wcps_auto_play)){
		$wcps_auto_play = 'true';
		}	
	
	$wcps_stop_on_hover = get_post_meta( $post->ID, 'wcps_stop_on_hover', true );
	if(empty($wcps_stop_on_hover)){
		$wcps_stop_on_hover = 'true';
		}	
		
		
	$wcps_slider_navigation = get_post_meta( $post->ID, 'wcps_slider_navigation', true );
	if(empty($wcps_slider_navigation)){
		$wcps_slider_navigation = 'true';
		}	
	
	
	$wcps_slider_navigation_position = get_post_meta( $post->ID, 'wcps_slider_navigation_position', true );	
	if(empty($wcps_slider_navigation_position)){
		$wcps_slider_navigation_position = 'topright';
		}

	$wcps_slide_speed = get_post_meta( $post->ID, 'wcps_slide_speed', true );
	if(empty($wcps_slide_speed)){
		$wcps_slide_speed = '1000';
		}

	$wcps_slider_pagination = get_post_meta( $post->ID, 'wcps_slider_pagination', true );
	$wcps_pagination_slide_speed = get_post_meta( $post->ID, 'wcps_pagination_slide_speed', true );
	if(empty($wcps_pagination_slide_speed)){
		$wcps_pagination_slide_speed = '1000';
		}

	$wcps_slider_pagination_count = get_post_meta( $post->ID, 'wcps_slider_pagination_count', true );
	
	$wcps_slider_pagination_bg = get_post_meta( $post->ID, 'wcps_slider_pagination_bg', true );
	$wcps_slider_pagination_text_color = get_post_meta( $post->ID, 'wcps_slider_pagination_text_color', true );	
	
	$wcps_slider_touch_drag = get_post_meta( $post->ID, 'wcps_slider_touch_drag', true );
	$wcps_slider_mouse_drag = get_post_meta( $post->ID, 'wcps_slider_mouse_drag', true );
	
	$wcps_content_source = get_post_meta( $post->ID, 'wcps_content_source', true );
	if(empty($wcps_content_source)){
		$wcps_content_source = 'recent';
		}
	
	$wcps_content_year = get_post_meta( $post->ID, 'wcps_content_year', true );
	$wcps_content_month = get_post_meta( $post->ID, 'wcps_content_month', true );
	$wcps_content_month_year = get_post_meta( $post->ID, 'wcps_content_month_year', true );	
	
	$wcps_content_sku = get_post_meta( $post->ID, 'wcps_content_sku', true );		
	
	$wcps_taxonomy = get_post_meta( $post->ID, 'wcps_taxonomy', true );
	$wcps_taxonomy_category = get_post_meta( $post->ID, 'wcps_taxonomy_category', true );
	
	$wcps_product_ids = get_post_meta( $post->ID, 'wcps_product_ids', true );	
	
	$wcps_items_cat_font_size = get_post_meta( $post->ID, 'wcps_items_cat_font_size', true );
	$wcps_items_cat_text_align = get_post_meta( $post->ID, 'wcps_items_cat_text_align', true );	
	
	$wcps_featured_icon_url = get_post_meta( $post->ID, 'wcps_featured_icon_url', true );	
	
	$wcps_sale_icon_url = get_post_meta( $post->ID, 'wcps_sale_icon_url', true );		

	$wcps_ratings_text_align = get_post_meta( $post->ID, 'wcps_ratings_text_align', true );
	$wcps_items_ratings_font_size = get_post_meta( $post->ID, 'wcps_items_ratings_font_size', true );
	$wcps_items_ratings_color = get_post_meta( $post->ID, 'wcps_items_ratings_color', true );	
			
	$wcps_cart_style = get_post_meta( $post->ID, 'wcps_cart_style', true );		
	$wcps_cart_bg = get_post_meta( $post->ID, 'wcps_cart_bg', true );	
	$wcps_cart_text_color = get_post_meta( $post->ID, 'wcps_cart_text_color', true );
	if(empty($wcps_cart_text_color)){
		$wcps_cart_text_color = '#626262';
		}
	
	
	$wcps_cart_text_align = get_post_meta( $post->ID, 'wcps_cart_text_align', true );
	$wcps_items_cat_font_color = get_post_meta( $post->ID, 'wcps_items_cat_font_color', true );	
	if(empty($wcps_items_cat_font_color)){
		$wcps_items_cat_font_color = '#626262';
		}
	
	$wcps_grid_items = get_post_meta( $post->ID, 'wcps_grid_items', true );	
	$wcps_grid_items_hide = get_post_meta( $post->ID, 'wcps_grid_items_hide', true );		

	$wcps_items_title_color = get_post_meta( $post->ID, 'wcps_items_title_color', true );
	if(empty($wcps_items_title_color)){
		$wcps_items_title_color = '#626262';
		}
	
	
	
	$wcps_items_title_font_size = get_post_meta( $post->ID, 'wcps_items_title_font_size', true );
	$wcps_items_title_text_align = get_post_meta( $post->ID, 'wcps_items_title_text_align', true );	
	
	$wcps_items_excerpt_count = get_post_meta( $post->ID, 'wcps_items_excerpt_count', true );
	if(empty($wcps_items_excerpt_count)){
		$wcps_items_excerpt_count = 20;
		}	
		
	$wcps_items_excerpt_read_more = get_post_meta( $post->ID, 'wcps_items_excerpt_read_more', true );
	if(empty($wcps_items_excerpt_read_more)){
		$wcps_items_excerpt_read_more = 'View product.';
		}	
	
	
	
	$wcps_items_excerpt_text_align = get_post_meta( $post->ID, 'wcps_items_excerpt_text_align', true );
	$wcps_items_excerpt_font_size = get_post_meta( $post->ID, 'wcps_items_excerpt_font_size', true );
	$wcps_items_excerpt_font_color = get_post_meta( $post->ID, 'wcps_items_excerpt_font_color', true );
	if(empty($wcps_items_excerpt_font_color)){
		$wcps_items_excerpt_font_color = '#626262';
		}

	$wcps_items_price_color = get_post_meta( $post->ID, 'wcps_items_price_color', true );
	if(empty($wcps_items_price_color)){
		$wcps_items_price_color = '#626262';
		}
	
	
	
	
	$wcps_items_price_font_size = get_post_meta( $post->ID, 'wcps_items_price_font_size', true );
	$wcps_items_price_text_align = get_post_meta( $post->ID, 'wcps_items_price_text_align', true );	
	
	$wcps_items_thumb_link_to = get_post_meta( $post->ID, 'wcps_items_thumb_link_to', true );		
	$wcps_items_thumb_size = get_post_meta( $post->ID, 'wcps_items_thumb_size', true );	
	$wcps_items_thumb_max_hieght = get_post_meta( $post->ID, 'wcps_items_thumb_max_hieght', true );
	$wcps_items_thumb_zoom = get_post_meta( $post->ID, 'wcps_items_thumb_zoom', true );	
	
	$wcps_items_empty_thumb = get_post_meta( $post->ID, 'wcps_items_empty_thumb', true );
	if(empty($wcps_items_empty_thumb)){
		$wcps_items_empty_thumb = wcps_plugin_url.'assets/front/images/no-thumb.png';
		}	
	
	
	
	$wcps_query_order = get_post_meta( $post->ID, 'wcps_query_order', true );
    $wcps_query_orderby = get_post_meta( $post->ID, 'wcps_query_orderby', true );
    $wcps_hide_out_of_stock = get_post_meta( $post->ID, 'wcps_hide_out_of_stock', true );		
	
	$wcps_ribbon_name = get_post_meta( $post->ID, 'wcps_ribbon_name', true );
	$wcps_ribbon_custom = get_post_meta( $post->ID, 'wcps_ribbon_custom', true );
	
	$wcps_items_custom_css = get_post_meta( $post->ID, 'wcps_items_custom_css', true );		
	
		


		

		$wcps_id = $post->ID;
?>



    <div class="para-settings">
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active"><i class="fa fa-code"></i> <?php _e('Shortcode','wcps');?></li>       
            <li nav="2" class="nav2"><i class="fa fa-cogs"></i> <?php _e('Options','wcps');?></li>
            <li nav="3" class="nav3"><i class="fa fa-diamond"></i> <?php _e('Style','wcps');?></li>
            <li nav="4" class="nav4"><i class="fa fa-pencil-square-o"></i> <?php _e('Content','wcps');?></li>
            <li nav="5" class="nav5"><i class="fa fa-bug"></i> <?php _e('Custom CSS','wcps');?></li>            
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Shortcode','wcps');?></p>
                    <p class="option-info">
                    <?php _e('Copy this shortcode and paste on page or post where you want to display slider.','wcps');?>
                    <br />
                    <?php _e('Use PHP code to your themes file to display slider.','wcps');?>
                    </p>
                    <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[wcps <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                <br /><br />
                PHP Code:<br />
                <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[wcps id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
                </div>
            
            </li>    
        
        
            <li style="display: none;" class="box2 tab-box">
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Total Items','wcps');?></p>
                    <p class="option-info"><?php _e('ex: 10','wcps');?></p>
					<input type="text" placeholder="10"   name="wcps_total_items" value="<?php echo $wcps_total_items; ?>" />                   
                </div>
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Column Number','wcps');?></p>
                    
                    <p class="option-info"><?php _e('In Destop: (min:1000px and max)','wcps');?></p>
					<input type="text" placeholder="4"   name="wcps_column_number" value="<?php echo $wcps_column_number;  ?>" />

                    <p class="option-info"><?php _e('In Tablet & Small Desktop: (900px max width)','wcps');?></p>
                    <input type="text" placeholder="2"  name="wcps_column_number_tablet" value="<?php echo $wcps_column_number_tablet;  ?>" />  
                   
                    <p class="option-info"><?php _e('In Mobile: (479px max width)','wcps');?></p>
                    <input type="text" placeholder="1"  name="wcps_column_number_mobile" value="<?php echo $wcps_column_number_mobile;  ?>" />
                    
                  
                               
                </div>   

				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Auto Play','wcps');?></p>
                    <p class="option-info"></p>
                    
                    
                        <select name="wcps_auto_play">
                            <option value="true" <?php if(($wcps_auto_play=="true")) echo "selected"; ?> ><?php _e('True','wcps');?></option>
                            <option value="false" <?php if(($wcps_auto_play=="false")) echo "selected"; ?> ><?php _e('False','wcps');?></option>
                        </select>

                </div>     
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Stop on Hover','wcps');?></p>
                    <p class="option-info"></p>
                    
                        <select name="wcps_stop_on_hover">
                            <option value="true" <?php if(($wcps_stop_on_hover=="true")) echo "selected"; ?> ><?php _e('True','wcps');?></option>
                            <option value="false" <?php if(($wcps_stop_on_hover=="false")) echo "selected"; ?> ><?php _e('False','wcps');?></option>
                        </select>
                    
                
                </div>   
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Navigation','wcps');?></p>
                    <p class="option-info"><?php _e('Slider Navigation at Top','wcps');?></p>
                    
                        <select name="wcps_slider_navigation">
                            <option value="true" <?php if(($wcps_slider_navigation=="true")) echo "selected"; ?> ><?php _e('True','wcps');?></option>
                            <option value="false" <?php if(($wcps_slider_navigation=="false")) echo "selected"; ?> ><?php _e('False','wcps');?></option>
                        </select>

                        
                        <p class="option-info"><?php _e('Slider Navigation Position','wcps');?></p>
                        <select name="wcps_slider_navigation_position">
                            <option value="topright" <?php if(($wcps_slider_navigation_position=="topright")) echo "selected"; ?> ><?php _e('Top Right','wcps');?></option>
                            <option value="middle" <?php if(($wcps_slider_navigation_position=="middle")) echo "selected"; ?> ><?php _e('Middle','wcps');?></option>
                            <option value="middle-fixed" <?php if(($wcps_slider_navigation_position=="middle-fixed")) echo "selected"; ?> ><?php _e('Middle fixed','wcps');?></option>                      
                        
                        </select>
                        
                                        
                </div>

                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Pagination','wcps');?></p>
                    <p class="option-info"><?php _e('Slider Pagination at Bottom','wcps');?></p>
                    
                        <select name="wcps_slider_pagination">
                            <option value="true" <?php if(($wcps_slider_pagination=="true")) echo "selected"; ?> ><?php _e('True','wcps');?></option>
                            <option value="false" <?php if(($wcps_slider_pagination=="false")) echo "selected"; ?> ><?php _e('False','wcps');?></option>
                        </select>
 
                        
                        
                       <p class="option-info"><?php _e('Pagination Background Color','wcps');?></p> 
                        <input type="text" name="wcps_slider_pagination_bg" class="wcps_color" id="wcps_slider_pagination_bg" value="<?php echo $wcps_slider_pagination_bg; ?>" />
                        
                        <p class="option-info"><?php _e('Pagination Text Color','wcps');?></p> 
                        <input type="text" name="wcps_slider_pagination_text_color" class="wcps_color" id="wcps_slider_pagination_text_color" value="<?php echo $wcps_slider_pagination_text_color; ?>" /> 
                        
                        <p class="option-info"><?php _e('Pagination Number Counting','wcps');?></p> 
                        <select name="wcps_slider_pagination_count">
                        	<option value="false" <?php if(($wcps_slider_pagination_count=="false")) echo "selected"; ?> ><?php _e('False','wcps');?></option>
                            <option value="true" <?php if(($wcps_slider_pagination_count=="true")) echo "selected"; ?> ><?php _e('True','wcps');?></option>
                            
                        </select>
                        
  
                        
                                       
                </div>
                

                
				     
				<div class="option-box">
                    <p class="option-title"><?php _e('Slide Speed','wcps');?></p>
                    <p class="option-info"></p>
					<input type="text" placeholder="1000" id="wcps_slide_speed" name="wcps_slide_speed" value="<?php echo $wcps_slide_speed; ?>"  />                 
                </div>   
				<div class="option-box">
                    <p class="option-title"><?php _e('Pagination Slide Speed','wcps');?></p>
                    <p class="option-info"></p>
					<input type="text" placeholder="1000" id="wcps_pagination_slide_speed" name="wcps_pagination_slide_speed" value="<?php echo $wcps_pagination_slide_speed; ?>"  />                 
                </div>
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Touch Drag Enabled','wcps');?></p>
                    <p class="option-info"></p>
                    
                    
                        <select name="wcps_slider_touch_drag">
                            <option value="true" <?php if(($wcps_slider_touch_drag=="true")) echo "selected"; ?> ><?php _e('True','wcps');?></option>
                            <option value="false" <?php if(($wcps_slider_touch_drag=="false")) echo "selected"; ?> ><?php _e('False','wcps');?></option>
                        </select>
                    
                 
                </div>       
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Mouse Drag Enabled','wcps');?></p>
                    <p class="option-info"></p>
                    
                        <select name="wcps_slider_mouse_drag">
                            <option value="true" <?php if(($wcps_slider_mouse_drag=="true")) echo "selected"; ?> ><?php _e('True','wcps');?></option>
                            <option value="false" <?php if(($wcps_slider_mouse_drag=="false")) echo "selected"; ?> ><?php _e('False','wcps');?></option>
                        </select>
                    
                
                </div>         
               
            </li>
            <li style="display: none;" class="box3 tab-box ">
				<div class="option-box">
                    <p class="option-title"><?php _e('Themes for slider','wcps');?></p>
                    <p class="option-info"></p>                    
					<select name="wcps_themes"  >
                    <?php
						
						$class_wcps_functions = new class_wcps_functions();
						$skins = $class_wcps_functions->skins();						

						foreach($skins as $skin_key => $skin_data){
							
								echo '<option value="'.$skin_key.'"';
								if($wcps_themes == $skin_key) echo "selected";
								echo '>'.$skin_data['name'].'</option>';
							}
					?>               
                    </select>   
                    
                                  
                </div> 
                

                
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider Ribbon','wcps');?></p>
                    <p class="option-info"></p>
					<?php
                    
					echo '<select id="wcps_ribbon_name" name="wcps_ribbon_name" >';
	
						if(empty($wcps_ribbon_name))
							{
								$wcps_ribbon_name = "";
							}
						echo  '<option value="none" '.(($wcps_ribbon_name=="none" ) ? "selected" : "").' >None</option>';
						echo  '<option value="custom" '.(($wcps_ribbon_name=="custom" ) ? "selected" : "").' >Custom</option>';						
						echo  '<option value="free" '.(($wcps_ribbon_name=="free" ) ? "selected" : "").' >Free</option>';
						echo  '<option value="save" '.(($wcps_ribbon_name=="save" ) ? "selected" : "").' >Save</option>';								
						echo  '<option value="hot" '.(($wcps_ribbon_name=="hot" ) ? "selected" : "").' >Hot</option>';
						echo  '<option value="pro" '.(($wcps_ribbon_name=="pro" ) ? "selected" : "").' >Pro</option>';								
						echo  '<option value="best" '.(($wcps_ribbon_name=="best" ) ? "selected" : "").' >Best</option>';
						echo  '<option value="gift" '.(($wcps_ribbon_name=="gift" ) ? "selected" : "").' >Gift</option>';
						echo  '<option value="sale" '.(($wcps_ribbon_name=="sale" ) ? "selected" : "").' >Sale</option>';																
						echo  '<option value="new" '.(($wcps_ribbon_name=="new" ) ? "selected" : "").' >New</option>';	
						echo  '<option value="top" '.(($wcps_ribbon_name=="top" ) ? "selected" : "").' >Top</option>';
						echo  '<option value="fresh" '.(($wcps_ribbon_name=="fresh" ) ? "selected" : "").' >Fresh</option>';								
						
						echo  '<option value="dis-10" '.(($wcps_ribbon_name=="dis-10" ) ? "selected" : "").' >-10%</option>';								
						echo  '<option value="dis-20" '.(($wcps_ribbon_name=="dis-20" ) ? "selected" : "").' >-20%</option>';
						echo  '<option value="dis-30" '.(($wcps_ribbon_name=="dis-30" ) ? "selected" : "").' >-30%</option>';
						echo  '<option value="dis-40" '.(($wcps_ribbon_name=="dis-40" ) ? "selected" : "").' >-40%</option>';
						
						echo  '<option value="dis-50" '.(($wcps_ribbon_name=="dis-50" ) ? "selected" : "").' >-50%</option>';								
						
						echo  '<option value="dis-60" '.(($wcps_ribbon_name=="dis-60" ) ? "selected" : "").' >-60%</option>';								
						
						echo  '<option value="dis-70" '.(($wcps_ribbon_name=="dis-70" ) ? "selected" : "").' >-70%</option>';									
						
						echo  '<option value="dis-80" '.(($wcps_ribbon_name=="dis-80" ) ? "selected" : "").' >-80%</option>';								
						
						echo  '<option value="dis-90" '.(($wcps_ribbon_name=="dis-90" ) ? "selected" : "").' >-90%</option>';								
						
						echo  '<option value="dis-100" '.(($wcps_ribbon_name=="dis-100" ) ? "selected" : "").' >-100%</option>';									
						
							
					echo  '</select><br />';
			
			
					
					?>
                    
                    <input style="width:100%;" type="text" id="wcps_ribbon_custom" name="wcps_ribbon_custom" placeholder="Custom url for ribbons." id="wcps_ribbon_custom" value="<?php echo $wcps_ribbon_custom; ?>" />

                    <?php
                    
					if($wcps_ribbon_name=='custom'){
						echo '<style type="text/css">';
						echo '#wcps_metabox #wcps_ribbon_custom{display:block }';
						echo '</style>';
						}

					?>
                    
                    
                                
                </div> 
                
 
                
 
                
				  
                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Container options','wcps'); ?></p>
                    <p class="option-info"><?php _e('Padding: (ex: 10px)','wcps'); ?></p>
                    <input type="text" placeholder="10px" name="wcps_container_padding" value="<?php echo $wcps_container_padding; ?>" />

                    <p class="option-info"><?php _e('Background color:','wcps'); ?></p>
                    <input type="text" class="wcps_color" name="wcps_container_bg_color" value="<?php echo $wcps_container_bg_color; ?>" />
                    
                    <p class="option-info"><?php _e('Background image:','wcps'); ?></p>
                    <img class="bg_image_src" onClick="bg_img_src(this)" src="<?php echo wcps_plugin_url; ?>assets/global/images/bg/dark_embroidery.png" />
                    <img class="bg_image_src" onClick="bg_img_src(this)" src="<?php echo wcps_plugin_url; ?>assets/global/images/bg/dimension.png" />
                    <img class="bg_image_src" onClick="bg_img_src(this)" src="<?php echo wcps_plugin_url; ?>assets/global/images/bg/eight_horns.png" /> 
                    <br />                    
                    <input type="text" id="wcps_bg_img" class="wcps_bg_img" name="wcps_bg_img" value="<?php echo $wcps_bg_img; ?>" /> <div onClick="clear_container_bg_image()" class="button clear-container-bg-image"> <?php _e('Clear','wcps'); ?></div>
                    
                    <script>
					
					function bg_img_src(img){
						
						src =img.src;
						
						document.getElementById('wcps_bg_img').value  = src;
						
						}
					
					function clear_container_bg_image(){

						document.getElementById('wcps_bg_img').value  = '';
						
						}					
					
					
					</script>
                </div>
                


				<div class="option-box">
                    <p class="option-title"><?php _e('Items Options','wcps'); ?></p>
                    <p class="option-info"><?php _e('Items Background color','wcps'); ?></p>
					<input type="text" class="wcps_color" name="wcps_items_bg_color" value="<?php echo $wcps_items_bg_color; ?>" />
                    
                    <p class="option-info"><?php _e('Items Padding','wcps'); ?></p>
					<input type="text"  name="wcps_items_padding" placeholder="5px" value="<?php echo $wcps_items_padding; ?>" />                    
                    
                </div>


                                
                
            </li>
            <li style="display: none;" class="box4 tab-box ">
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Empty Thumbnail','wcps');?></p>
                    <p class="option-info"><?php _e('Custom thumbnail image url','wcps');?></p>
					<input type="text" name="wcps_items_empty_thumb" id="wcps_items_empty_thumb" value="<?php echo $wcps_items_empty_thumb; ?>" /><br /><br />
                    <input id="wcps_items_empty_thumb_upload" class="wcps_items_empty_thumb_upload button" type="button" value="Upload Image" />
                       <br /><br />
                       
                       
                        <?php
                        	if(empty($wcps_items_empty_thumb))
								{
								?>
                                <img class="wcps_items_empty_thumb_display" width="300px" src="<?php echo wcps_plugin_url.'assets/front/images/no-thumb.png'; ?>" />
                                <?php
								}
							else
								{
								?>
                                <img class="wcps_items_empty_thumb_display" width="300px" src="<?php echo $wcps_items_empty_thumb; ?>" />
                                <?php
								}
						?>
                       
                       
                       
                       
                       
					<script>
                        jQuery(document).ready(function($){

                            var custom_uploader; 
                         
                            jQuery('#wcps_items_empty_thumb_upload').click(function(e) {
													
                                e.preventDefault();
                         
                                //If the uploader object has already been created, reopen the dialog
                                if (custom_uploader) {
                                    custom_uploader.open();
                                    return;
                                }
                        
                                //Extend the wp.media object
                                custom_uploader = wp.media.frames.file_frame = wp.media({
                                    title: 'Choose Image',
                                    button: {
                                        text: 'Choose Image'
                                    },
                                    multiple: false
                                });
                        
                                //When a file is selected, grab the URL and set it as the text field's value
                                custom_uploader.on('select', function() {
                                    attachment = custom_uploader.state().get('selection').first().toJSON();
                                    jQuery('#wcps_items_empty_thumb').val(attachment.url);
                                    jQuery('.wcps_items_empty_thumb_display').attr('src',attachment.url);									
                                });
                         
                                //Open the uploader dialog
                                custom_uploader.open();
                         
                            });
                            
                            
                        })
                    </script>      
                </div> 
            
            
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Query order','wcps'); ?></p>
                    <p class="option-info"></p>
                    <select name="wcps_query_order" >
                    <option value="DESC" <?php if($wcps_query_order=="DESC") echo "selected"; ?>><?php _e('Descending','wcps');?></option>
                    <option value="ASC" <?php if($wcps_query_order=="ASC") echo "selected"; ?>><?php _e('Ascending ','wcps');?></option>
                    

                    </select>
                </div>
                
               
                
                
                

                    <div class="option-box">
                    <p class="option-title"><?php _e('Query orderBy','wcps'); ?></p>
                    <p class="option-info"></p>
                    <select name="wcps_query_orderby" >
                        <option value="none" <?php if($wcps_query_orderby=="none") echo "selected"; ?>><?php _e('None','wcps');?></option>
                        <option value="ID" <?php if($wcps_query_orderby=="ID") echo "selected"; ?>><?php _e('ID','wcps');?></option>
                        <option value="date" <?php if($wcps_query_orderby=="date") echo "selected"; ?>><?php _e('Date','wcps');?></option>
                        <option value="rand" <?php if($wcps_query_orderby=="rand") echo "selected"; ?>><?php _e('Rand','wcps');?></option>
                        <option value="comment_count" <?php if($wcps_query_orderby=="comment_count") echo "selected"; ?>><?php _e('Comment Count','wcps');?></option>                    
                        <option value="author" <?php if($wcps_query_orderby=="author") echo "selected"; ?>><?php _e('Author','wcps');?></option>
                        <option value="title" <?php if($wcps_query_orderby=="title") echo "selected"; ?>><?php _e('Title','wcps');?></option>
                        <option value="name" <?php if($wcps_query_orderby=="name") echo "selected"; ?>><?php _e('Name','wcps');?></option>
                        <option value="type" <?php if($wcps_query_orderby=="type") echo "selected"; ?>><?php _e('Type','wcps');?></option>
                       

                    </select>
                </div>

 				<div class="option-box">
                    <p class="option-title"><?php _e('Hide out of stock items','wcps'); ?></p>
                    <p class="option-info"></p>
                    <select name="wcps_hide_out_of_stock" >
                    <option value="no" <?php if($wcps_hide_out_of_stock=="no") echo "selected"; ?>><?php _e('No','wcps');?></option>
                    <option value="yes" <?php if($wcps_hide_out_of_stock=="yes") echo "selected"; ?>><?php _e('Yes ','wcps');?></option>
                    

                    </select>
                </div> 
            
            
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Filter Slider Content.','wcps');?></p>
                    <p class="option-info"></p>
                    <ul class="content_source_area" >
                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_recent" type="radio" value="recent" <?php if($wcps_content_source=="recent")  echo "checked";?> /> <label for="wcps_content_source_recent"><?php _e('Display from <b>Recent</b> Published','wcps');?></label>
                        <div class="wcps_content_source_recent content-source-box"><?php _e('Slider items will query from recent published product.','wcps');?></div>
                        </li>           
                        
                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_featured" type="radio" value="featured" <?php if($wcps_content_source=="featured")  echo "checked";?> /> <label for="wcps_content_source_featured"><?php _e('Display from <b>Featured</b> Product','wcps');?></label>
                        <div class="wcps_content_source_featured content-source-box"><?php _e('Slider items will query from featured marked product.','wcps');?></div>
                        </li>

                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_year" type="radio" value="year" <?php if($wcps_content_source=="year")  echo "checked";?> /> <label for="wcps_content_source_year"><?php _e('Display from Only <b>Year</b>','wcps');?></label>
                        
                        <div class="wcps_content_source_year content-source-box"><?php _e('Slider items will query from a year.','wcps');?>
                        <input type="text" size="7" class="wcps_content_year" name="wcps_content_year" value="<?php echo $wcps_content_year;?>" placeholder="2014" />
                        </div>
                        </li>

                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_month" type="radio" value="month" <?php if($wcps_content_source=="month")  echo "checked";?> /> <label for="wcps_content_source_month"><?php _e('Display from <b>Month</b>','wcps');?></label>
                        <div class="wcps_content_source_month content-source-box"><?php _e('Slider items will query from Month of a year.','wcps');?>		<br />
                        <input type="text" size="7" class="wcps_content_month_year" name="wcps_content_month_year" value="<?php echo $wcps_content_month_year;?>" placeholder="2014" />            
                        <input type="text" size="7" class="wcps_content_month" name="wcps_content_month" value="<?php echo $wcps_content_month;?>" placeholder="06" />
                        </div>
                        </li>            


           
                    </ul>                 
                </div>

				<div class="option-box">
                    <p class="option-title"><?php _e('Items sort.','wcps'); ?></p>
                    <p class="option-info"><?php _e('Click each items to expand.','wcps'); ?></p>
                    <div class="button wcps_grid_items_reset" wcps_id="<?php echo $wcps_id; ?>"><?php _e('Reset','wcps');?></div>
                    <br /><br />
                    
                    <?php
                    $class_wcps_functions = new class_wcps_functions();
					
					
					if(empty($wcps_grid_items)){
						
						$wcps_grid_items = $class_wcps_functions->wcps_grid_items();
						
						}
					else{
						$wcps_grid_items_main = $class_wcps_functions->wcps_grid_items();
						$wcps_grid_items = array_merge($wcps_grid_items,$wcps_grid_items_main);
						}
					
					$wcps_grid_items = apply_filters('wcps_grid_items',$wcps_grid_items);
					
					
					//var_dump($wcps_grid_items);
					
					?>
                    
                    <div class="expandable">
                    <?php
					
					
                    foreach($wcps_grid_items as $item_key=>$item_name){
						echo '<div class="items">';
						echo '<div class="header">'.$item_name;
						echo '<input type="hidden" name="wcps_grid_items['.$item_key.']" value="'.$item_name.'" />';
						
						if(!empty($wcps_grid_items_hide[$item_key])){
							
							$checked = 'checked';
							}
						else{
							$checked = '';
							}
						
						echo '<label><input '.$checked.' type="checkbox" class="wcps_grid_items_hide" name="wcps_grid_items_hide['.$item_key.']" value="1" />Hide on front-end</label>';						
						//echo '<span class="remove">X</span>';
						echo '</div>'; // .header
						
						
						echo '<div class="options">';
						
						if($item_key == 'thumb'){
							
							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Slider Thumbnail Size','wcps');?></p>
                                <p class="option-info"></p>
                                <select name="wcps_items_thumb_size" >
                                	<option value="full" <?php if($wcps_items_thumb_size=="full")echo "selected"; ?>><?php _e('Full','wcps');?></option>
                                    <option value="large" <?php if($wcps_items_thumb_size=="large")echo "selected"; ?>><?php _e('Large','wcps');?></option>
                                    <option value="medium" <?php if($wcps_items_thumb_size=="medium")echo "selected"; ?>><?php _e('Medium','wcps');?></option>
                                    <option value="thumbnail" <?php if($wcps_items_thumb_size=="thumbnail")echo "selected"; ?>><?php _e('Thumbnail','wcps');?></option>
    
                                </select>                 
                            </div>
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items thumbnail link\'s to','wcps');?></p>
                                <p class="option-info"></p>
                                <select name="wcps_items_thumb_link_to" >
                                <option value="product" <?php if($wcps_items_thumb_link_to=="product")echo "selected"; ?>><?php _e('Product','wcps');?></option>
                                <option value="category" <?php if($wcps_items_thumb_link_to=="category")echo "selected"; ?>><?php _e('Category','wcps');?></option>
                                </select>                 
                            </div>                 
                            
                            
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Slider thumb max hieght(px)','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_thumb_max_hieght" placeholder="14px" id="wcps_items_thumb_max_hieght" value="<?php echo $wcps_items_thumb_max_hieght; ?>" />                 
                            </div>
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Display Thumbnail Zoom button','wcps');?></p>
                                <p class="option-info"></p>
                                <select name="wcps_items_thumb_zoom" >
                                <option value="no" <?php if($wcps_items_thumb_zoom=="no")echo "selected"; ?>><?php _e('No','wcps');?></option>
                                <option value="yes" <?php if($wcps_items_thumb_zoom=="yes")echo "selected"; ?>><?php _e('Yes','wcps');?></option>
                                
                                </select>                 
                            </div> 
                            
                            
                            <?php

							}
						elseif($item_key == 'cart'){
							
							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Add to cart button Style','wcps');?></p>
                                <p class="option-info"><?php _e('You can hide items Add to cart button on slider.','wcps');?></p>
                                <select name="wcps_cart_style" >
                                <option value="default" <?php if($wcps_cart_style=="default")echo "selected"; ?>><?php _e('Default','wcps');?></option>
                                <option value="custom" <?php if($wcps_cart_style=="custom")echo "selected"; ?>><?php _e('Custom','wcps');?></option>
                                </select>
                            </div>                

                            <div class="option-box">
                                <p class="option-title"><?php _e('Add to cart Background Color','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_cart_bg" class="wcps_color" id="wcps_cart_bg" value="<?php echo $wcps_cart_bg; ?>" />                 
                            </div> 
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Add to cart Text Color','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_cart_text_color" class="wcps_color"  id="wcps_cart_text_color" value="<?php echo $wcps_cart_text_color; ?>" />                 
                            </div>
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Cart Text Align','wcps');?></p>

                                
                                <select name="wcps_cart_text_align" >
                                <option value="left" <?php if($wcps_cart_text_align=="left")echo "selected"; ?>><?php _e('Left','wcps');?></option>
                                <option value="right" <?php if($wcps_cart_text_align=="right")echo "selected"; ?>><?php _e('Right','wcps');?></option>
                                <option value="center" <?php if($wcps_cart_text_align=="center")echo "selected"; ?>><?php _e('Center','wcps');?></option>                                
                                </select>
                           
                            </div> 
                            
                            
                            <?php
							
							
							}
						elseif($item_key == 'sale'){
							
							?>

                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Sale marker icon url','wcps');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_sale_icon_url" placeholder="" id="wcps_sale_icon_url" value="<?php echo $wcps_sale_icon_url; ?>" /> 
                            </div> 
                            
                            
                            
                            <?php
							
							
							}

							
						elseif($item_key == 'title'){
							
							?>

                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Color','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_title_color" class="wcps_color" id="wcps_items_title_color" value="<?php echo $wcps_items_title_color; ?>" />                
                            </div>                
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Font Size','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_title_font_size" placeholder="14px" id="wcps_items_title_font_size" value="<?php echo $wcps_items_title_font_size; ?>" />                 
                            </div>
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Text Align','wcps');?></p>

                                
                                <select name="wcps_items_title_text_align" >
                                <option value="left" <?php if($wcps_items_title_text_align=="left")echo "selected"; ?>><?php _e('Left','wcps');?></option>
                                <option value="right" <?php if($wcps_items_title_text_align=="right")echo "selected"; ?>><?php _e('Right','wcps');?></option>
                                <option value="center" <?php if($wcps_items_title_text_align=="center")echo "selected"; ?>><?php _e('Center','wcps');?></option>                                
                                </select>
                           
                            </div>                            
                            
                            <?php
							
							}
							
						elseif($item_key == 'featured'){
							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Featured marker icon url','wcps');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_featured_icon_url" placeholder="" id="wcps_featured_icon_url" value="<?php echo $wcps_featured_icon_url; ?>" /> 
                            </div>                            
                            
                            
                            <?php
							}	
						elseif($item_key == 'price'){
							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Price format on slider','wcps');?></p>
                                <p class="option-info"></p>
                                <select name="wcps_total_items_price_format">
                                    <option value="full" <?php if(($wcps_total_items_price_format=="full")) echo "selected"; ?> ><?php _e('Full Format','wcps');?></option>
                                    <option value="sale" <?php if(($wcps_total_items_price_format=="sale")) echo "selected"; ?> ><?php _e('Sale price','wcps');?></option>
                                    <option value="regular" <?php if(($wcps_total_items_price_format=="regular")) echo "selected"; ?> ><?php _e('Regular price','wcps');?></option>
                                </select>
                            
                            </div>
                            
                            
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Price Color','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_price_color" class="wcps_color" id="wcps_items_price_color" value="<?php echo $wcps_items_price_color; ?>" />                 
                            </div>       
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items price Font Size','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_price_font_size" placeholder="14px" id="wcps_items_price_font_size" value="<?php echo $wcps_items_price_font_size; ?>" />                 
                            </div>
                            
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Price Text Align','wcps');?></p>

                                
                                <select name="wcps_items_price_text_align" >
                                <option value="left" <?php if($wcps_items_price_text_align=="left")echo "selected"; ?>><?php _e('Left','wcps');?></option>
                                <option value="right" <?php if($wcps_items_price_text_align=="right")echo "selected"; ?>><?php _e('Right','wcps');?></option>
                                <option value="center" <?php if($wcps_items_price_text_align=="center")echo "selected"; ?>><?php _e('Center','wcps');?></option>                                
                                </select>
                           
                            </div> 
                            
                            
                            
                            
                            
                            <?php
							
							
							}
							
						elseif($item_key == 'rating'){
							
							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Rating Text Align','wcps');?></p>

                                
                                <select name="wcps_ratings_text_align" >
                                <option value="left" <?php if($wcps_ratings_text_align=="left")echo "selected"; ?>><?php _e('Left','wcps');?></option>
                                <option value="right" <?php if($wcps_ratings_text_align=="right")echo "selected"; ?>><?php _e('Right','wcps');?></option>
                                <option value="center" <?php if($wcps_ratings_text_align=="center")echo "selected"; ?>><?php _e('Center','wcps');?></option>                                
                                </select>
                           
                            </div>
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items ratings Font Size','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_ratings_font_size" placeholder="14px" id="wcps_items_ratings_font_size" value="<?php echo $wcps_items_ratings_font_size; ?>" />                 
                            </div>
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Ratings Color','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_ratings_color" class="wcps_color" id="wcps_items_ratings_color" value="<?php echo $wcps_items_ratings_color; ?>" />                 
                            </div>  
                            
                            
                            
                            
                            <?php
							
							}
							
							
						elseif($item_key == 'excerpt'){
							
							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt word count','wcps');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_items_excerpt_count" placeholder="30" id="wcps_items_excerpt_count" value="<?php echo $wcps_items_excerpt_count; ?>" /> 
                            </div>
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt read more text','wcps');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_items_excerpt_read_more" placeholder="View product." id="wcps_items_excerpt_read_more" value="<?php echo $wcps_items_excerpt_read_more; ?>" /> 
                            </div>                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Excerpt Font Size','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_excerpt_font_size" placeholder="14px" id="wcps_items_excerpt_font_size" value="<?php echo $wcps_items_excerpt_font_size; ?>" />                 
                            </div>
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt Text Align','wcps');?></p>

                                
                                <select name="wcps_items_excerpt_text_align" >
                                <option value="left" <?php if($wcps_items_excerpt_text_align=="left")echo "selected"; ?>><?php _e('Left','wcps');?></option>
                                <option value="right" <?php if($wcps_items_excerpt_text_align=="right")echo "selected"; ?>><?php _e('Right','wcps');?></option>
                                
                                <option value="center" <?php if($wcps_items_excerpt_text_align=="center")echo "selected"; ?>><?php _e('Center','wcps');?></option>                                
                                </select>
                           
                            </div>
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Excerpt Font color','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" class="wcps_color" name="wcps_items_excerpt_font_color" placeholder="14px" id="wcps_items_excerpt_font_color" value="<?php echo $wcps_items_excerpt_font_color; ?>" />                 
                            </div>
                            
                            
                            
                            
                            <?php
							
							}							
							
							
							
							
							
							
						elseif($item_key=='category'){
							?>
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category Font Size','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_cat_font_size" placeholder="14px" id="wcps_items_cat_font_size" value="<?php echo $wcps_items_cat_font_size; ?>" />                 
                            </div>
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Category Text Align','wcps');?></p>

                                
                                <select name="wcps_items_cat_text_align" >
                                <option value="left" <?php if($wcps_items_cat_text_align=="left")echo "selected"; ?>><?php _e('Left','wcps');?></option>
                                <option value="right" <?php if($wcps_items_cat_text_align=="right")echo "selected"; ?>><?php _e('Right','wcps');?></option>
                                <option value="center" <?php if($wcps_items_cat_text_align=="center")echo "selected"; ?>><?php _e('Center','wcps');?></option>                                
                                </select>
                           
                            </div> 
                            
                            
                            
                            
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category Font color','wcps');?></p>
                                <p class="option-info"></p>
                                <input type="text" class="wcps_color" name="wcps_items_cat_font_color" placeholder="14px" id="wcps_items_cat_font_color" value="<?php echo $wcps_items_cat_font_color; ?>" />                 
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            <?php
							
							
							}
							
							
							
							
							

						
						echo '</div>'; // .options
						
						
						
						echo '</div>'; // .items
						
						}
					?>

                    </div> <!-- .expandable -->
                    
                    
                    
				</div> 
 
 <script>
 jQuery(document).ready(function($)
	{
		$(function() {
			$( ".expandable" ).sortable({ handle: '.header' });
			//$( ".items" ).disableSelection();
			});
		
		})

</script> 
                          
            
            </li>
            
            
            <li style="display: none;" class="box5 tab-box">
				<div class="option-box">
                    <p class="option-title"><?php _e('Custom CSS for this slider.','wcps'); ?></p>
                    <p class="option-info"><?php _e('Do not use &lt;style>&lt;/style> tag, you can use bellow prefix to your css, sometime you need use "!important" to overrid.','wcps');?>
                    <br/>
                    <b>#wcps-<?php
					
					
					 echo $wcps_id ; ?></b>
                    </p>
                   	<?php
                    
					$empty_css_sample = '.wcps-container #wcps-'.$wcps_id.'{}\n.wcps-container #wcps-'.$wcps_id.' .wcps-items{}\n.wcps-container #wcps-'.$wcps_id.' .wcps-items-thumb{}\n.wcps-container #wcps-'.$wcps_id.' .items-info{}';
					
					
					?>

                    <textarea style="width:80%; min-height:150px" name="wcps_items_custom_css"><?php if(!empty($wcps_items_custom_css)) echo htmlentities($wcps_items_custom_css); else echo str_replace('\n', PHP_EOL, $empty_css_sample); ?></textarea>
                    
				</div>
            
            
            </li>
            
            
            
        </ul>
    
    </div> 
    
    
    

    
    
<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_wcps_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_wcps_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_wcps_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_wcps_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$wcps_bg_img = sanitize_text_field( $_POST['wcps_bg_img'] );
	$wcps_container_padding = sanitize_text_field( $_POST['wcps_container_padding'] );	
	$wcps_container_bg_color = sanitize_text_field( $_POST['wcps_container_bg_color'] );	
	
	$wcps_items_bg_color = sanitize_text_field( $_POST['wcps_items_bg_color'] );
	$wcps_items_padding = sanitize_text_field( $_POST['wcps_items_padding'] );	
	
	$wcps_themes = sanitize_text_field( $_POST['wcps_themes'] );

	
	$wcps_total_items = sanitize_text_field( $_POST['wcps_total_items'] );	
		
	$wcps_total_items_price_format = sanitize_text_field( $_POST['wcps_total_items_price_format'] );		
		
	$wcps_column_number = sanitize_text_field( $_POST['wcps_column_number'] );
	$wcps_column_number_mobile = sanitize_text_field( $_POST['wcps_column_number_mobile'] );
	$wcps_column_number_tablet = sanitize_text_field( $_POST['wcps_column_number_tablet'] );	
		
	if(empty($_POST['wcps_auto_play']))
		{
			$wcps_auto_play = '';
		}
	else
		{
		$wcps_auto_play = sanitize_text_field( $_POST['wcps_auto_play'] );
		}
	
	
	if(empty($_POST['wcps_stop_on_hover']))
		{
			$wcps_stop_on_hover = '';
		}
	else
		{
		$wcps_stop_on_hover = sanitize_text_field( $_POST['wcps_stop_on_hover'] );
		}
	
	
	if(empty($_POST['wcps_slider_navigation']))
		{
			$wcps_slider_navigation = '';
		}
	else
		{
			$wcps_slider_navigation = sanitize_text_field( $_POST['wcps_slider_navigation'] );
		}
	
	$wcps_slider_navigation_position = sanitize_text_field( $_POST['wcps_slider_navigation_position'] );	
		
	
	$wcps_slide_speed = sanitize_text_field( $_POST['wcps_slide_speed'] );
	
	
	if(empty($_POST['wcps_slider_pagination']))
		{
			$wcps_slider_pagination = '';
		}
	else
		{
			$wcps_slider_pagination = sanitize_text_field( $_POST['wcps_slider_pagination'] );	
		}
	
	
	
	$wcps_pagination_slide_speed = sanitize_text_field( $_POST['wcps_pagination_slide_speed'] );
	
	
	if(empty($_POST['wcps_slider_pagination_count']))
		{
			$wcps_slider_pagination_count = '';
		}
	else
		{
			$wcps_slider_pagination_count = sanitize_text_field( $_POST['wcps_slider_pagination_count'] );
		}
	
	
	
	$wcps_slider_pagination_bg = sanitize_text_field( $_POST['wcps_slider_pagination_bg'] );
	$wcps_slider_pagination_text_color = sanitize_text_field( $_POST['wcps_slider_pagination_text_color'] );	
	
	
	if(empty($_POST['wcps_slider_touch_drag']))
		{
			$wcps_slider_touch_drag = '';
		}
	else
		{
			$wcps_slider_touch_drag = sanitize_text_field( $_POST['wcps_slider_touch_drag'] );
		}
	
	if(empty($_POST['wcps_slider_mouse_drag']))
		{
			$wcps_slider_mouse_drag = '';
		}
	else
		{
			$wcps_slider_mouse_drag = sanitize_text_field( $_POST['wcps_slider_mouse_drag'] );	
		}
		
	
	
	$wcps_content_source = sanitize_text_field( $_POST['wcps_content_source'] );
	$wcps_content_year = sanitize_text_field( $_POST['wcps_content_year'] );
	$wcps_content_month = sanitize_text_field( $_POST['wcps_content_month'] );
	$wcps_content_month_year = sanitize_text_field( $_POST['wcps_content_month_year'] );	
	
	$wcps_content_sku = sanitize_text_field( $_POST['wcps_content_sku'] );	
	
	
	
	if(empty($_POST['wcps_taxonomy']))
		{
			$wcps_taxonomy = '';
		}
	else
		{
			$wcps_taxonomy = sanitize_text_field( $_POST['wcps_taxonomy'] );
		}
	

	if(empty($_POST['wcps_taxonomy_category']))
		{
			$wcps_taxonomy_category = '';
		}
	else
		{
			$wcps_taxonomy_category = stripslashes_deep( $_POST['wcps_taxonomy_category'] );
		}
	

	if(empty($_POST['wcps_product_ids']))
		{
			$wcps_product_ids = '';
		}
	else
		{
			$wcps_product_ids = sanitize_text_field( $_POST['wcps_product_ids'] );
		}
	
	
	
	
	
	//$wcps_cat_display = sanitize_text_field( $_POST['wcps_cat_display'] );
	$wcps_items_cat_font_size = sanitize_text_field( $_POST['wcps_items_cat_font_size'] );
	$wcps_items_cat_text_align = sanitize_text_field( $_POST['wcps_items_cat_text_align'] );	
	$wcps_items_cat_font_color = sanitize_text_field( $_POST['wcps_items_cat_font_color'] );
	
	//$wcps_featured_display = sanitize_text_field( $_POST['wcps_featured_display'] );
	$wcps_featured_icon_url = sanitize_text_field( $_POST['wcps_featured_icon_url'] );	
				
	//$wcps_sale_display = sanitize_text_field( $_POST['wcps_sale_display'] );
	$wcps_sale_icon_url = sanitize_text_field( $_POST['wcps_sale_icon_url'] );			
	

		
	//$wcps_ratings_display = sanitize_text_field( $_POST['wcps_ratings_display'] );
	$wcps_ratings_text_align = sanitize_text_field( $_POST['wcps_ratings_text_align'] );
	$wcps_items_ratings_font_size = sanitize_text_field( $_POST['wcps_items_ratings_font_size'] );
	$wcps_items_ratings_color = sanitize_text_field( $_POST['wcps_items_ratings_color'] );	
	
	$wcps_cart_style = sanitize_text_field( $_POST['wcps_cart_style'] );	
	//$wcps_cart_display = sanitize_text_field( $_POST['wcps_cart_display'] );
	$wcps_cart_bg = sanitize_text_field( $_POST['wcps_cart_bg'] );
	$wcps_cart_text_color = sanitize_text_field( $_POST['wcps_cart_text_color'] );
	$wcps_cart_text_align = sanitize_text_field( $_POST['wcps_cart_text_align'] );
		
		
	$wcps_grid_items = stripslashes_deep( $_POST['wcps_grid_items'] );
	$wcps_grid_items_hide = stripslashes_deep( $_POST['wcps_grid_items_hide'] );
	
	//$wcps_items_title_display = sanitize_text_field( $_POST['wcps_items_title_display'] );		
	$wcps_items_title_color = sanitize_text_field( $_POST['wcps_items_title_color'] );	
	$wcps_items_title_font_size = sanitize_text_field( $_POST['wcps_items_title_font_size'] );
	$wcps_items_title_text_align = sanitize_text_field( $_POST['wcps_items_title_text_align'] );	
	
	$wcps_items_excerpt_count = sanitize_text_field( $_POST['wcps_items_excerpt_count'] );
	$wcps_items_excerpt_read_more = sanitize_text_field( $_POST['wcps_items_excerpt_read_more'] );
	$wcps_items_excerpt_text_align = sanitize_text_field( $_POST['wcps_items_excerpt_text_align'] );
	$wcps_items_excerpt_font_size = sanitize_text_field( $_POST['wcps_items_excerpt_font_size'] );
	$wcps_items_excerpt_font_color = sanitize_text_field( $_POST['wcps_items_excerpt_font_color'] );			
	
	//$wcps_items_price_display = sanitize_text_field( $_POST['wcps_items_price_display'] );		
	$wcps_items_price_color = sanitize_text_field( $_POST['wcps_items_price_color'] );	
	$wcps_items_price_font_size = sanitize_text_field( $_POST['wcps_items_price_font_size'] );
	$wcps_items_price_text_align = sanitize_text_field( $_POST['wcps_items_price_text_align'] );	
	
	$wcps_items_thumb_link_to = sanitize_text_field( $_POST['wcps_items_thumb_link_to'] );	
	$wcps_items_thumb_size = sanitize_text_field( $_POST['wcps_items_thumb_size'] );
	$wcps_items_thumb_max_hieght = sanitize_text_field( $_POST['wcps_items_thumb_max_hieght'] );
	$wcps_items_thumb_zoom = sanitize_text_field( $_POST['wcps_items_thumb_zoom'] );		
	
	$wcps_items_empty_thumb = sanitize_text_field( $_POST['wcps_items_empty_thumb'] );
	$wcps_query_order = sanitize_text_field( $_POST['wcps_query_order'] );	
    $wcps_query_orderby = sanitize_text_field( $_POST['wcps_query_orderby'] ); 
    $wcps_hide_out_of_stock = sanitize_text_field( $_POST['wcps_hide_out_of_stock'] ); 	
	
	$wcps_ribbon_name = sanitize_text_field( $_POST['wcps_ribbon_name'] );
	$wcps_ribbon_custom = sanitize_text_field( $_POST['wcps_ribbon_custom'] );			
	
	$wcps_items_custom_css = sanitize_text_field( $_POST['wcps_items_custom_css'] );			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'wcps_bg_img', $wcps_bg_img );
	update_post_meta( $post_id, 'wcps_container_padding', $wcps_container_padding );
	update_post_meta( $post_id, 'wcps_container_bg_color', $wcps_container_bg_color );	
	
	update_post_meta( $post_id, 'wcps_items_bg_color', $wcps_items_bg_color );
	update_post_meta( $post_id, 'wcps_items_padding', $wcps_items_padding );	
		
	
	update_post_meta( $post_id, 'wcps_themes', $wcps_themes );
	update_post_meta( $post_id, 'wcps_total_items', $wcps_total_items );
	
	update_post_meta( $post_id, 'wcps_total_items_price_format', $wcps_total_items_price_format );	
	
	update_post_meta( $post_id, 'wcps_column_number', $wcps_column_number );
	update_post_meta( $post_id, 'wcps_column_number_mobile', $wcps_column_number_mobile );
	update_post_meta( $post_id, 'wcps_column_number_tablet', $wcps_column_number_tablet );	
		
	update_post_meta( $post_id, 'wcps_auto_play', $wcps_auto_play );
	update_post_meta( $post_id, 'wcps_stop_on_hover', $wcps_stop_on_hover );	
	update_post_meta( $post_id, 'wcps_slider_navigation', $wcps_slider_navigation );
	update_post_meta( $post_id, 'wcps_slider_navigation_position', $wcps_slider_navigation_position );	
	update_post_meta( $post_id, 'wcps_slide_speed', $wcps_slide_speed );
		
	update_post_meta( $post_id, 'wcps_slider_pagination', $wcps_slider_pagination );
	update_post_meta( $post_id, 'wcps_pagination_slide_speed', $wcps_pagination_slide_speed );
	update_post_meta( $post_id, 'wcps_slider_pagination_count', $wcps_slider_pagination_count );
	
	update_post_meta( $post_id, 'wcps_slider_pagination_bg', $wcps_slider_pagination_bg );
	update_post_meta( $post_id, 'wcps_slider_pagination_text_color', $wcps_slider_pagination_text_color );		
	
	update_post_meta( $post_id, 'wcps_slider_touch_drag', $wcps_slider_touch_drag );
	update_post_meta( $post_id, 'wcps_slider_mouse_drag', $wcps_slider_mouse_drag );
	
	update_post_meta( $post_id, 'wcps_content_source', $wcps_content_source );
	update_post_meta( $post_id, 'wcps_content_year', $wcps_content_year );
	update_post_meta( $post_id, 'wcps_content_month', $wcps_content_month );
	update_post_meta( $post_id, 'wcps_content_month_year', $wcps_content_month_year );
	
	update_post_meta( $post_id, 'wcps_content_sku', $wcps_content_sku );	
	
	update_post_meta( $post_id, 'wcps_taxonomy', $wcps_taxonomy );
	update_post_meta( $post_id, 'wcps_taxonomy_category', $wcps_taxonomy_category );
			
	update_post_meta( $post_id, 'wcps_product_ids', $wcps_product_ids );	
	
	//update_post_meta( $post_id, 'wcps_cat_display', $wcps_cat_display );
	update_post_meta( $post_id, 'wcps_items_cat_font_size', $wcps_items_cat_font_size );
	update_post_meta( $post_id, 'wcps_items_cat_text_align', $wcps_items_cat_text_align );
	update_post_meta( $post_id, 'wcps_items_cat_font_color', $wcps_items_cat_font_color );	
	
	//update_post_meta( $post_id, 'wcps_featured_display', $wcps_featured_display );
	update_post_meta( $post_id, 'wcps_featured_icon_url', $wcps_featured_icon_url );	
			
	//update_post_meta( $post_id, 'wcps_sale_display', $wcps_sale_display );	
	update_post_meta( $post_id, 'wcps_sale_icon_url', $wcps_sale_icon_url );		
	
	
	//update_post_meta( $post_id, 'wcps_ratings_display', $wcps_ratings_display );
	update_post_meta( $post_id, 'wcps_ratings_text_align', $wcps_ratings_text_align );
	update_post_meta( $post_id, 'wcps_items_ratings_font_size', $wcps_items_ratings_font_size );
	update_post_meta( $post_id, 'wcps_items_ratings_color', $wcps_items_ratings_color );	
	
	update_post_meta( $post_id, 'wcps_cart_style', $wcps_cart_style );		
	//update_post_meta( $post_id, 'wcps_cart_display', $wcps_cart_display );
	update_post_meta( $post_id, 'wcps_cart_bg', $wcps_cart_bg );
	update_post_meta( $post_id, 'wcps_cart_text_color', $wcps_cart_text_color );
	update_post_meta( $post_id, 'wcps_cart_text_align', $wcps_cart_text_align );		
	
	update_post_meta( $post_id, 'wcps_grid_items', $wcps_grid_items );
	update_post_meta( $post_id, 'wcps_grid_items_hide', $wcps_grid_items_hide );	
	
	//update_post_meta( $post_id, 'wcps_items_title_display', $wcps_items_title_display );	
	update_post_meta( $post_id, 'wcps_items_title_color', $wcps_items_title_color );
	update_post_meta( $post_id, 'wcps_items_title_font_size', $wcps_items_title_font_size );
	update_post_meta( $post_id, 'wcps_items_title_text_align', $wcps_items_title_text_align );	
	
	update_post_meta( $post_id, 'wcps_items_excerpt_count', $wcps_items_excerpt_count );
	update_post_meta( $post_id, 'wcps_items_excerpt_read_more', $wcps_items_excerpt_read_more );
	update_post_meta( $post_id, 'wcps_items_excerpt_text_align', $wcps_items_excerpt_text_align );
	update_post_meta( $post_id, 'wcps_items_excerpt_font_size', $wcps_items_excerpt_font_size );
	update_post_meta( $post_id, 'wcps_items_excerpt_font_color', $wcps_items_excerpt_font_color );				
	
	//update_post_meta( $post_id, 'wcps_items_price_display', $wcps_items_price_display );	
	update_post_meta( $post_id, 'wcps_items_price_color', $wcps_items_price_color );
	update_post_meta( $post_id, 'wcps_items_price_font_size', $wcps_items_price_font_size );
	update_post_meta( $post_id, 'wcps_items_price_text_align', $wcps_items_price_text_align );	
	
	update_post_meta( $post_id, 'wcps_items_thumb_link_to', $wcps_items_thumb_link_to );		
	update_post_meta( $post_id, 'wcps_items_thumb_size', $wcps_items_thumb_size );	
	update_post_meta( $post_id, 'wcps_items_thumb_max_hieght', $wcps_items_thumb_max_hieght );
	update_post_meta( $post_id, 'wcps_items_thumb_zoom', $wcps_items_thumb_zoom );	
	
	update_post_meta( $post_id, 'wcps_items_empty_thumb', $wcps_items_empty_thumb );
	update_post_meta( $post_id, 'wcps_query_order', $wcps_query_order );		
	update_post_meta( $post_id, 'wcps_query_orderby', $wcps_query_orderby );
	update_post_meta( $post_id, 'wcps_hide_out_of_stock', $wcps_hide_out_of_stock );	
	
	
	update_post_meta( $post_id, 'wcps_ribbon_name', $wcps_ribbon_name );
	update_post_meta( $post_id, 'wcps_ribbon_custom', $wcps_ribbon_custom );	
	
	update_post_meta( $post_id, 'wcps_items_custom_css', $wcps_items_custom_css );		
	

}
add_action( 'save_post', 'meta_boxes_wcps_save' );

