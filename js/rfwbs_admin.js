//-- RESPONSIVE FULL WIDTH BACKGROUND SLIDER ADMIN SCRIPT
//--------------------------------------------------------
jQuery(document).ready(function(){
	jQuery('#rfwbs-admin-wrap .hndle,#rfwbs-admin-wrap .handlediv').click(function(){
		jQuery(this).parent().find('.inside').slideToggle("fast");
	});
});

//-- ADD / DELETE DOM FIELDS ---------------------
function rfwbs_add_field(field){
	var optnm = jQuery('#rfwbs_itemname').val();
	var field_html = '<input class="rfwbs_uploadimg"  type="text" name="rfwbs_settings[rfwbs_img][]" value="" /> <input class="button-primary rfwbs_uploadbtn" type="button" value="Upload"/>';
	field_html += "&nbsp;<input type=\"button\" title=\"delete image\" class=\"button-primary rfwbs_delimg\" value=\"Delete\" onClick=\"rfwbs_del_field(this);\"  />&nbsp;<input type=\"button\" class=\"button-primary rfwbs_addimg\" title=\"add image\" value=\"Add Image\" onClick=\"rfwbs_add_field(this);\"  />";
	jQuery(field).parent().after("<li style='display:none;'>" + field_html + "<div class='rfwbs_clear'></div></li>");
	jQuery(field).parent().next().stop().slideDown('fast',function(){var counts = jQuery("#rfwbs_slides li").size();jQuery('#rfwbs_countimgs').text(counts);});
}
function rfwbs_del_field( field ) {
	jQuery(field).parent().css('background','#F97E75').fadeOut('slow', function(e){ jQuery(this).remove();	var counts = jQuery("#rfwbs_slides li").size();jQuery('#rfwbs_countimgs').text(counts); });
}

//-- UPLOAD IMAGE & VIDEO JQUERY START -----------
var targetfield= '';
var rfwbs_send_to_editor = window.send_to_editor;
jQuery('.rfwbs_uploadbtn').live('click',function(){
	targetfield = jQuery(this).prev('.rfwbs_uploadimg');
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery(targetfield).val(imgurl);
		tb_remove();
		window.send_to_editor = rfwbs_send_to_editor;
	}
	return false;
});	

jQuery(document).ready(function() 
{
	if(jQuery('#rfwbs_slides').length > 0)
	{
		jQuery("#rfwbs_slides").sortable({placeholder: "ui-state-highlight"});
		jQuery("#rfwbs_slides li").live('click',function(e) {
			e.stopPropagation();
		});
		jQuery("#rfwbs_slides li").live('mousedown',function () {jQuery(this).addClass('focus');});
		jQuery("#rfwbs_slides li").live('mouseup',function () {jQuery(this).removeClass('focus');});
		
		var counts = jQuery("#rfwbs_slides li").size();
		jQuery('#rfwbs_countimgs').text(counts);
	}
});