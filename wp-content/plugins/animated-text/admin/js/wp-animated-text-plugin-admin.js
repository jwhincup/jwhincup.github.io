(function ($) {
    'use strict';
    var global = {
        uploaded: false,
        uploader: {},
        chosenFile: null,
    };
    console.log("im here");
    tinymce.create('tinymce.plugins.pah', {
        init: function (ed, url) {
            ed.addButton('pah_btn', {
                title: 'Insert your animated text',
                image: url + '/pah.jpg',
                classes: 'thickbox',
                onclick: function() {
                    // var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                    // W = W - 80;
                    // H = H - 550;
                    // setDefaultState();
                    tb_show('Configure your animated text', '#TB_inline?inlineId=pah-popup&height=300&width=200');
                    jQuery("#TB_ajaxContent").css({
                        height: '100%',
                        width: '100%',
                    });
                    jQuery("#TB_window").css({
                        'padding-bottom': '2rem',
                        bottom: '2rem',
                        overflow: 'hidden',
                        'max-height': '550px'
                    });
                    return false;
                }
            });
        },
        createControl: function () {
            return null;
        },
        getInfo: function () {
            return {
                longname: 'WordPress Animated Text Plugin',
                author: 'BWPS',
                authorurl: 'www.preventdirectaccess.com',
                infourl: 'www.preventdirectaccess.com',
                version: '1.0',
            }
        }
    });
    tinymce.PluginManager.add('pah', tinymce.plugins.pah);
    $(function() {
        var form = jQuery('<div id="pah-popup">\
		<div class="notice notice-error is-dismissible pah-notice" style="display: none">\
		    <p class="pah-message"></p>\
		</div>\
		<table id="pah-tbl" class="form-table">\
			<tr>\
				<th width="70%"><label for="pah-animation">Animation</label>\
				</th>\
				<td>\
				    <select name="pah-animation" id="pah-animation">\
				        <option value="rotate-1">Rotate 1</option>\
				        <option value="type">Type</option>\
				        <option value="rotate-2">Rotate 2</option>\
				        <option value="loading-bar">Loading Bar</option>\
				        <option value="slide">Slide</option>\
				        <option value="clip">Clip</option>\
				        <option value="zoom">Zoom</option>\
				        <option value="rotate-3">Rotate 3</option>\
				        <option value="scale">Scale</option>\
				        <option value="push">Push</option>\
				        <option value="ymese_container_change-red">Change red</option>\
				    </select>\
				</td>\
			</tr>\
			<tr>\
				<th><label for="pah-width">Text selector</label></th>\
				<td><select name="pah-selector" id="pah-selector">\
				<option value="h1">h1</option>\
				<option value="h2">h2</option>\
				<option value="h3">h3</option>\
				<option value="h4">h4</option>\
				<option value="h5">h5</option>\
				<option value="h6">h6</option>\
				<option value="div">div</option>\
				</select><br>\
				<small></small></td>\
			</tr>\
			<tr>\
				<th><label for="pah-pretext">Pre-text</label></th>\
				<td><input type="text" name="pah-pretext" id="pah-pretext"><br>\
				<small></small></td>\
			</tr>\
			<tr>\
			    <th><label for="pah-animated-text">Animated Text</label></th>\
			    <td><input type="text" name="pah-animated-text" id="pah-animated_text"><br>\
			    <small></small></td>\
			</tr>\
			<tr>\
				<th><label for="pah-posttext">Post-text</label></th>\
				<td><input type="text" name="pah-posttext" id="pah-posttext"><br>\
				<small></small></td>\
			</tr>\
			<tr>\
			    <th>\
			        <label for="pah-class">Optional class (on the selector)</label>\
			    </th>\
			    <td>\
			        <input type="text" name="pah-class" id="pah-class"><br>\
			    </td>\
			</tr>\
		</table>\
		<p class="submit">\
				<input type="button" id="pah-submit" class="button-primary" value="Submit" name="submit" />\
		</p>\
		</div>');
        var table = form.find('table');
        form.appendTo('body').hide();
        form.find('#pah-submit').click(_handleFormSubmit);
    });

    function _handleFormSubmit(evt) {
        evt.preventDefault();
        var table = $('#pah-tbl');
        var button = this;
        var shortcode = '[pda-animated-headline';
        var options = {
            'selector': '',
            'animation': '',
            'class' : '',
            'pretext': '',
            'posttext' : '',
            'animated_text' : '',

        }
        for(var key in options) {
            var value = table.find('#pah-' + key).val();
            if(value !== options[key]) {
                shortcode += ' ' + key + '="' + value + '"';
            }
        }
        shortcode += ']';
        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
        tb_remove();
    }

    function setDefaultState() {
        $('#pah-submit').val('Insert PDF file');
        $('#pah-submit').prop('disabled', false);
    }

})(jQuery);
