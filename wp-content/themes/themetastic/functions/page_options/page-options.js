jQuery(function(jQuery) {
	
	
		jQuery('#media-items').bind('DOMNodeInserted',function(){
		jQuery('input[value="Insert into Post"]').each(function(){
				jQuery(this).attr('value','Use This Image');
		});
	});
		
	jQuery('.custom_clear_image_button').click(function() {
		var defaultImage = jQuery(this).closest("td").find('.custom_default_image').text();
		jQuery(this).closest("td").find('.custom_media_id').val('');
		jQuery(this).closest("td").find('.custom_media_image').attr('src', defaultImage).hide().css("margin-top","0");
		return false;
	});
	
	jQuery('.custom_media_upload').click(function() {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		wp.media.editor.send.attachment = function(props, attachment) {
	        jQuery('.custom_media_image').attr('src', attachment.url).show().css("margin-top","10px");
	        jQuery('.custom_media_url').val(attachment.url);
	        jQuery('.custom_media_id').val(attachment.id);
	        wp.media.editor.send.attachment = send_attachment_bkp;
	    }
	    wp.media.editor.open();	
	    return false;       
    });

	
	jQuery('.repeatable-add').click(function() {
		field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
		fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
		jQuery('input,textarea', field).each(function(){
			jQuery(this).val('').attr('name', function(index, name) {
				return name.replace(/(\d+)/, function(fullMatch, n) {
					return Number(n) + 1;
				});
			});
		});
		field.insertAfter(fieldLocation, jQuery(this).closest('td'))
		return false;
	});
	
	jQuery('.repeatable-remove').click(function(){
		jQuery(this).parent().parent().remove();
		return false;
	});
		
	jQuery('.custom_repeatable').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort',
		stop: function(event, ui) { 
			jQuery('.custom_repeatable').each(function(){
				field_count=0;
				jQuery(this).find("li").each(function(){
					jQuery(this).find("input,textarea").each(function(){
						$this = jQuery(this);
						name_array=($this.attr("name")).split("[");
						$this.attr("name",name_array[0]+"["+field_count+"]");
					});
					field_count++;
				});
			});
		}
	});

});