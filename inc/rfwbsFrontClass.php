<?php
class rfwbsFront
{
	// DISPLAY RFWBSLIDER
	function rfwbs_display()
	{
		$options          = get_option('rfwbs_settings');
		
		$rfwbs_interval   = $options["rfwbs_sduration"];
		$rfwbs_tspeed     = $options["rfwbs_tspeed"];
		$rfwbs_navigation = $options["rfwbs_navigation"];
		$rfwbs_toggle     = $options["rfwbs_toggle"];
		$rfwbs_bullet     = $options["rfwbs_bullet"];
		$rfwbs_controlpos = $options["rfwbs_controlpos"];
		$rfwbs_play       = $options["rfwbs_play"];
		$rfwbs_animation  = $options["rfwbs_animation"];
		$rfwbs_overlay    = $options["rfwbs_overlay"];
		$rfwbs_random     = $options["rfwbs_random"];
		$rfwbs_imgsArr    = $options["rfwbs_img"];
		
		if($rfwbs_play=='true'){$rfwbs_play = $rfwbs_interval;}
		if($rfwbs_tspeed=="" || $rfwbs_tspeed=="0"){$rfwbs_tspeed = 700;}
		$rfwbs_imgsArr = $options["rfwbs_img"];
		$rfwbs_errors = array_filter($rfwbs_imgsArr);
		$rfwbs_imgsCount = "";
		
		if($rfwbs_random && !empty($rfwbs_imgsArr)){shuffle($rfwbs_imgsArr);}

		if(!empty($rfwbs_errors)){ 
		?>
		<style type="text/css">
			.rfwbs_navi{<?php if(empty($rfwbs_controlpos)){?>right:0;<?php }else{ ?>left:0<?php } ?>}
		</style>
		
		<div id="rfwbs_slider" class="rfwbs_slider">
			<div class="rfwbs_container">
			  <?php
				if(!empty($rfwbs_imgsArr)){
					foreach($rfwbs_imgsArr as $rfwbs_img){
						if(empty($rfwbs_img)){
							continue;
						}
						?><img class="rfwbs_bg" src="<?php echo $rfwbs_img; ?>" alt="rfwbs-slide" /><?php
						$rfwbs_imgsCount++;
					}
				}
				if($rfwbs_imgsCount === '1'){$rfwbs_play = 'false';$rfwbs_navigation=0;}
			  ?>
			</div>
	        <nav class="rfwbs_navigation" style="display:none">
				<a href="#" class="rfwbs_next"><?php _e('Next','rfwbs'); ?></a>
				<a href="#" class="rfwbs_prev"><?php _e('Previous','rfwbs'); ?></a>
			</nav>
			<?php
			if(!empty($rfwbs_overlay)){
				?>
					<div class="rfwbsoverlay" style="background:url('<?php echo plugins_url( '/images/overlay/overlay.png' , __FILE__ )  ?>')"></div>
				<?php
			}
			?>
		</div> 
		
		<?php if( (isset($rfwbs_toggle) && $rfwbs_toggle) || (isset($rfwbs_navigation) && $rfwbs_navigation) ) { ?>
			<div class="rfwbs_navi">
				<?php if(isset($rfwbs_toggle) && $rfwbs_toggle) { ?>
				<a href="javascript:void(0)" id="rfwbs_toggle" title="toggle"><img src="<?php echo plugins_url( '/images/slider-fullscreen.png', __FILE__);?>" /></a>
				<?php } ?>
				<?php
				if(isset($rfwbs_navigation) && $rfwbs_navigation && $rfwbs_imgsCount > 1){
				?>
					<a href="javascript:void(0)" id="rfwbs_prev_slide" title="Previous"><img src="<?php echo plugins_url( '/images/left.png', __FILE__);?>" /></a>
					<a href="javascript:void(0)" id="rfwbs_next_slide" title="Next"><img src="<?php echo plugins_url( '/images/right.png', __FILE__);?>" /></a>
				<?php
				}
				?>
			</div>
		<?php } ?>
		
		<script type="text/javascript">
			jQuery(function() {
				jQuery('#rfwbs_slider').superslides({
					animation: '<?php echo $rfwbs_animation; ?>' ,
					animation_speed: <?php echo $rfwbs_tspeed; ?>,
					play: <?php echo $rfwbs_play; ?>,
					pagination: <?php echo $rfwbs_bullet; ?>,
				});
			});
			
			jQuery(document).ready(function(){
				jQuery('#rfwbs_next_slide').click(function(){
					jQuery('.rfwbs_navigation .rfwbs_next').trigger('click');
				});	
				jQuery('#rfwbs_prev_slide').click(function(){
					jQuery('.rfwbs_navigation .rfwbs_prev').trigger('click');
				});
				jQuery('#rfwbs_toggle').click(function(){
					var zindex = jQuery('.rfwbs_slider').css('z-index');
					if(zindex < 0){
						jQuery('.rfwbs_slider').css('z-index','999999999');
					}else{
						jQuery('.rfwbs_slider').css('z-index','-1');
					}
				});
				jQuery('body').addClass('rfwbs-active');
			});
		</script>
		
		<?php } ?>
	<?php
	}
	
	function rfwbs_is_customPostTtype( $post = NULL ){
		$all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );
		
		// THERE ARE NO CUSTOM POST TYPES
		if ( empty ( $all_custom_post_types ) )
		return FALSE;
		
		$custom_types = array_keys( $all_custom_post_types );
		$current_post_type = get_post_type( $post );
		
		// COULD NOT DETECT CURRENT TYPE
		if ( ! $current_post_type )
		return FALSE;
		return in_array( $current_post_type, $custom_types );
	}
}
?>