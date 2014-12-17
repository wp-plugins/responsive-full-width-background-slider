<?php
// RFWBSLIDER ADMIN SETTING OPTIONS ---------------------
//-------------------------------------------------------
function rfwbs_backend_menu()
{
?>
<div id="rfwbs-admin-wrap">
	<!-- <iframe class="wpt_iframe" src="http://www.wptreasure.com/iframes/rfwbs-lite/iframe.php" width="100%" height="200px" scrolling="no" ></iframe> -->
	<form method="post" action="options.php">
		<div class="wrap">
		<div id="icon-themes" class="icon32"></div>
		<h2><?php _e('Responsive Full Width Background Slider '.rfwbs_plugin_version().' Setting\'s','rfwbs'); ?></h2>
		</div>
		<div id="poststuff" style="position:relative;">
			<div class="postbox" id="rfwbs_admin">
				<div class="handlediv" title="Click to toggle"><br/></div>
				<h3 class="hndle"><span><?php _e("Global Settings",'rfwbs'); ?></span></h3>
				<div class="inside" style="padding: 15px;margin: 0;">
					<form method="post" action="options.php">
						<?php
							wp_nonce_field('update-options');
							$rfwbs_getOpts = get_option('rfwbs_settings');	
						?>
						<div class="rfwbs_setting">
							<table cellpadding="9" class="rfwbs_settbl" id="rfwbs_settbl" style="width: 97%">
								<tbody>
								<tr><td style="width: 230px !important;" class="rfwbs_tdbt" colspan="2"><?php _e('Where to show Default RFWB Slider','rfwbslider'); ?></td></tr>
								<tr>
									<td colspan="2">
										<label for="rfwbs_pages" class="<?php if($rfwbs_getOpts['rfwbs_pages']){ ?> checked <?php } ?>" ><input type="checkbox" class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_pages]" id="rfwbs_pages" <?php if($rfwbs_getOpts['rfwbs_pages']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Pages",'rfwbs'); ?></label>
										<label for="rfwbs_posts" class="<?php if($rfwbs_getOpts['rfwbs_posts']){ ?> checked <?php } ?>" ><input type="checkbox" class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_posts]" id="rfwbs_posts" <?php if($rfwbs_getOpts['rfwbs_posts']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Posts",'rfwbs'); ?></label>
										<label for="rfwbs_homep" class="<?php if($rfwbs_getOpts['rfwbs_frontpg']){ ?> checked <?php } ?>" ><input type="checkbox" class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_frontpg]" id="rfwbs_homep" <?php if($rfwbs_getOpts['rfwbs_frontpg']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Home Page",'rfwbs'); ?></label>
										<label for="rfwbs_blogp" class="<?php if($rfwbs_getOpts['rfwbs_blogpg']){ ?> checked <?php } ?>" ><input type="checkbox" class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_blogpg]" id="rfwbs_blogp" <?php if($rfwbs_getOpts['rfwbs_blogpg']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Blog Page",'rfwbs'); ?></label>		
										<label for="rfwbs_catgs" class="<?php if($rfwbs_getOpts['rfwbs_cats']){ ?> checked <?php } ?>" ><input type="checkbox" class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_cats]" id="rfwbs_catgs" <?php if($rfwbs_getOpts['rfwbs_cats']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Categories",'rfwbs'); ?></label>	
										<label for="rfwbs_ctaxs" class="<?php if($rfwbs_getOpts['rfwbs_ctax']){ ?> checked <?php } ?>" ><input type="checkbox" class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_ctax]" id="rfwbs_ctaxs" <?php if($rfwbs_getOpts['rfwbs_ctax']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Custom Taxonomies",'rfwbs'); ?></label>		
										<label for="rfwbs_cposts" class="<?php if($rfwbs_getOpts['rfwbs_cposts']){ ?> checked <?php } ?>" ><input type="checkbox" class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_cposts]" id="rfwbs_cposts" <?php if($rfwbs_getOpts['rfwbs_cposts']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Custom Post-Types",'rfwbs'); ?></label>		
										<label for="rfwbs_tags"  class="<?php if($rfwbs_getOpts['rfwbs_tags']){ ?> checked <?php } ?>" ><input type="checkbox"  class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_tags]" id="rfwbs_tags" <?php if($rfwbs_getOpts['rfwbs_tags']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Tags",'rfwbs'); ?></label>		
										<label for="rfwbs_date"  class="<?php if($rfwbs_getOpts['rfwbs_date']){ ?> checked <?php } ?>" ><input type="checkbox"  class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_date]" id="rfwbs_date" <?php if($rfwbs_getOpts['rfwbs_date']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Date Archive",'rfwbs'); ?></label>													
										<label for="rfwbs_auth"  class="<?php if($rfwbs_getOpts['rfwbs_author']){ ?> checked <?php } ?>" ><input type="checkbox"  class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_author]" id="rfwbs_auth" <?php if($rfwbs_getOpts['rfwbs_author']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Author Page",'rfwbs'); ?></label>													
										<label for="rfwbs_srch"  class="<?php if($rfwbs_getOpts['rfwbs_search']){ ?> checked <?php } ?>" ><input type="checkbox"  class="rfwbs_smallchkbox" name="rfwbs_settings[rfwbs_search]" id="rfwbs_srch" <?php if($rfwbs_getOpts['rfwbs_search']){ ?> checked <?php } ?> value="true" />&nbsp;<?php _e("Search Page",'rfwbs'); ?></label>													
										<div class="rfwbs_clear"></div>
									</td>                                             
								</tr>
								</tbody>
							</table>
						</div>
						<p class="button-controls"><input type="submit" value="<?php _e('Save Settings','rfwbslider'); ?>" class="button-primary" id="rfwbs_update" name="rfwbs_update"></p>
				</div>
			</div>
		</div>
		<div id="poststuff" style="position:relative;">
			<div class="postbox" id="rfwbs_admin">
				<div class="handlediv" title="Click to toggle"><br/></div>
				<h3 class="hndle"><span><?php _e("Appearance Setting's ",'rfwbs'); ?></span></h3>
				<div class="inside" style="padding: 15px;margin: 0;">
						<table>			
							<tr>
								<td><?php _e("Slide Duration",'rfwbs'); ?> :</td>
								<td>
									<input type="text" style="width:90px;" value="<?php if($rfwbs_getOpts['rfwbs_sduration']) echo $rfwbs_getOpts['rfwbs_sduration']; else echo "8000"; ?>" name="rfwbs_settings[rfwbs_sduration]" /><small>&nbsp;( in msec )</small>
								</td>
							</tr>
							<tr>
								<td><?php _e("Transition Speed ",'rfwbs'); ?> :</td>
								<td>
									<input type="text" style="width:90px;" value="<?php if($rfwbs_getOpts['rfwbs_tspeed']) echo $rfwbs_getOpts['rfwbs_tspeed']; else echo "700"; ?>" name="rfwbs_settings[rfwbs_tspeed]" /><small>&nbsp;( in msec )</small>
								</td>
							</tr>
							<tr>
								<td><?php _e("Auto Play",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_play" name="rfwbs_settings[rfwbs_play]">
										<option value="true" <?php selected('true', $rfwbs_getOpts['rfwbs_play']); ?>><?php _e('Enable','rfwbs'); ?></option>
										<option value="false" <?php selected('false', $rfwbs_getOpts['rfwbs_play']); ?>><?php _e('Disable','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php _e("Show Navigation",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_navigation" name="rfwbs_settings[rfwbs_navigation]">
										<option value="1" <?php selected('1', $rfwbs_getOpts['rfwbs_navigation']); ?>><?php _e('Enable','rfwbs'); ?></option>
										<option value="0" <?php selected('0', $rfwbs_getOpts['rfwbs_navigation']); ?>><?php _e('Disable','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php _e("Show Toggle",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_toggle" name="rfwbs_settings[rfwbs_toggle]">
										<option value="1" <?php selected('1', $rfwbs_getOpts['rfwbs_toggle']); ?>><?php _e('Enable','rfwbs'); ?></option>
										<option value="0" <?php selected('0', $rfwbs_getOpts['rfwbs_toggle']); ?>><?php _e('Disable','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php _e("Controls Position",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_controlpos" name="rfwbs_settings[rfwbs_controlpos]">
										<option value="1" <?php selected('l', $rfwbs_getOpts['rfwbs_controlpos']); ?>><?php _e('Left','rfwbs'); ?></option>
										<option value="0" <?php selected('0', $rfwbs_getOpts['rfwbs_controlpos']); ?>><?php _e('Right','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php _e("Show Bullets",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_bullet"  name="rfwbs_settings[rfwbs_bullet]">
										<option value="1" <?php selected('1', $rfwbs_getOpts['rfwbs_bullet']); ?>><?php _e('Enable','rfwbs'); ?></option>
										<option value="0" <?php selected('0', $rfwbs_getOpts['rfwbs_bullet']); ?>><?php _e('Disable','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php _e("Animation",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_animation" name="rfwbs_settings[rfwbs_animation]">
										<option value="fade" <?php selected('fade', $rfwbs_getOpts['rfwbs_animation']); ?>><?php _e('Fade','rfwbs'); ?></option>
										<option value="slide" <?php selected('slide', $rfwbs_getOpts['rfwbs_animation']); ?>><?php _e('Slide','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php _e("Overlay",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_overlay" name="rfwbs_settings[rfwbs_overlay]">
										<option value="1" <?php selected('1', $rfwbs_getOpts['rfwbs_overlay']); ?>><?php _e('Enable','rfwbs'); ?></option>
										<option value="0" <?php selected('0', $rfwbs_getOpts['rfwbs_overlay']); ?>><?php _e('Disable','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php _e("Random Slides",'rfwbs'); ?> :</td>
								<td>
									<select id="rfwbs_overlay" name="rfwbs_settings[rfwbs_random]">
										<option value="1" <?php selected('1', $rfwbs_getOpts['rfwbs_random']); ?>><?php _e('Enable','rfwbs'); ?></option>
										<option value="0" <?php selected('0', $rfwbs_getOpts['rfwbs_random']); ?>><?php _e('Disable','rfwbs'); ?></option>
									</select>
								</td>
							</tr>
							
						</table>
						<div id="rfwbs_template_code" style="text-align:center;<?php if(empty($options['rfwbs_embed'])){?>display:none<?php } ?>">
							<?php _e('if (function_exists (rfwbs_social_sharing_icons)) rfwbs_social_sharing_icons();','rfwbs') ?><br>
							<?php _e('OR','rfwbs')?><br>
							<?php _e('You Can pur Shortcode "<b>[rfwbs_icons]</b>"')?>
						</div>
						<p class="button-controls"><input type="submit" value="<?php _e('Save Settings','rfwbs'); ?>" class="button-primary" id="rfwbs_update" name="rfwbs_update"></p>
				</div>
			</div>
		</div>
		<div id="poststuff" style="position:relative;">
			<div class="postbox rfwbs_slides_settings" id="rfwbs_admin">
				<div class="handlediv" title="Click to toggle"><br/></div>
				<h3 class="hndle"><span><?php _e("Slides Settings",'rfwbs'); ?></span></h3>
				<div class="inside" style="padding: 15px;margin: 0;">
						<table border="0">
							<tr><td class="rfwbs_tdbt" style="font-weight:600;" colspan="2"><label><?php _e('Please Enter Slider slides URL / PATH','rfwbs'); ?></label></td></tr>
							<tr>
								<td colspan="2">
									<ul id="rfwbs_slides">
										<?php 
											$rfwbs_errors = array_filter($rfwbs_getOpts['rfwbs_img']);
											if(!empty($rfwbs_getOpts['rfwbs_img']) && $rfwbs_errors)
											{
												foreach($rfwbs_getOpts['rfwbs_img'] as $rfwbs_img) 
												{ 
													if($rfwbs_img !="") {
														?>
														<li><input class="rfwbs_uploadimg"  type="text" name="rfwbs_settings[rfwbs_img][]" value="<?php echo $rfwbs_img; ?>" /> <input class="button-primary rfwbs_uploadbtn" type="button" value="Upload" /> 
															&nbsp;<input type="button" title="delete image" class="button-primary rfwbs_delimg" value="Delete" onClick="rfwbs_del_field(this);"  />&nbsp;<input type="button" value="Add Image" class="button-primary rfwbs_addimg" title="add image" onClick="rfwbs_add_field(this);"  /><div class="rfwbs_clear"></div></li>
														<?php 
													}
												}
											} 
											else{ ?>
												<li><input class="rfwbs_uploadimg"  type="text" name="rfwbs_settings[rfwbs_img][]" value="" /> <input class="button-primary rfwbs_uploadbtn" type="button" value="Upload" /> 
													&nbsp;<input type="button" title="delete image" class="button-primary rfwbs_delimg" value="Delete" onClick="rfwbs_del_field(this);"  />&nbsp;<input type="button" value="Add Image" class="button-primary rfwbs_addimg" title="add image" onClick="rfwbs_add_field(this);"  /><div class="rfwbs_clear"></div></li>
											<?php }
											?>
											<div class="rfwbs_clear"></div>
									</ul>
								</td>
							<tr>
						</table>
						<div id="rfwbs_template_code" style="text-align:center;<?php if(empty($options['rfwbs_embed'])){?>display:none<?php } ?>">
							<?php _e('if (function_exists (rfwbs_social_sharing_icons)) rfwbs_social_sharing_icons();','rfwbs') ?><br>
							<?php _e('OR','rfwbs')?><br>
							<?php _e('You Can pur Shortcode "<b>[rfwbs_icons]</b>"')?>
						</div>
						<p class="button-controls"><input type="submit" value="<?php _e('Save Settings','rfwbs'); ?>" class="button-primary" id="rfwbs_update" name="rfwbs_update"></p>
						<input type="hidden" name="security" value="<?php echo wp_create_nonce('rfwbs-options-data'); ?>" />
						
						<input type="hidden" name="action" value="update" />
					    <input type="hidden" name="page_options" value="rfwbs_settings" />
					</form>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
}