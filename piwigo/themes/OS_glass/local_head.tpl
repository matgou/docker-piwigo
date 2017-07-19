
{footer_script}
{literal} 
var max_dim_width = 0;
var max_dim_height = 0;
jQuery(window).load(function() {
  $(".thumbnails img").each(function () {
    if (jQuery(this).height() > max_dim_height)
      max_dim_height = jQuery(this).height() + 10;
    if (jQuery(this).width() > max_dim_width)
      max_dim_width = jQuery(this).width() + 10;

    jQuery(".wrap2")
      .css('width', max_dim_width+'px')
      .css('height', max_dim_height+'px');
  });
});
{/literal}
{/footer_script}

{combine_script id='jquery.tipTip.minified' load='header' require='jquery' path='themes/OS_glass/tiptip/jquery.tipTip.minified.js'}
{html_head}{literal} 
<script type="text/javascript">
/**
* jQuery Cookie plugin
*
* Copyright (c) 2010 Klaus Hartl (stilbuero.de)
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*
*/
jQuery.cookie = function (key, value, options) {

    // key and at least value given, set cookie...
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }

    // key and possibly options given, get cookie...
    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};



jQuery(document).ready(function(){
	$(".titre_acordeon, .titre_acordeon_0").each(function () {
		var id = $(this).parent().attr("id");
		if (!jQuery.cookie(id))
		{
			if ( $(this).attr("class")=="titre_acordeon")
			{
				jQuery.cookie($(this).parent().attr("id"),false, {path: "/"});
				$(this).next().hide();
			}
			else
			{
				$(this).next().show();
				jQuery.cookie($(this).parent().attr("id"),true, {path: "/"});
			}
		}
		else if (jQuery.cookie(id) == "true")
		{
			$(this).next().show();
		}
		else
		{
			$(this).next().hide();
		}
	});
	
	$(".titre_acordeon, .titre_acordeon_0").click(function() {
		$(this).next().toggle("medium");
		var id = $(this).parent().attr("id");
		if ( jQuery.cookie(id) == "true")
		{
			jQuery.cookie(id, false, {path: "/"});
		}
		else
		{
			jQuery.cookie(id, true, {path: "/"});
		}
	});
});
$(function(){
    $('.categoryActions li a[title]').tipTip({delay : 0, fadeIn : 200, fadeOut : 200, defaultPosition : "top"  });
    $("#home_icon A[title]").tipTip({edgeOffset : 10, fadeIn : 200, fadeOut : 200, defaultPosition : "top" });
    $(".randomButtons A[title]").tipTip({delay : 0, fadeIn : 200, fadeOut : 200 });
    $(".navButtons A[title]").tipTip({delay : 0, fadeIn : 200, fadeOut : 200 });
    $(".actionButtons a[title]").tipTip({delay : 0, fadeIn : 200, fadeOut : 200, defaultPosition : "top" });
    $("#mbCategories a[title]").tipTip({delay : 0, fadeIn : 200, fadeOut : 200 });
});
  </script> 
{/literal}
{/html_head}
{literal}
<!--[if lt IE 7]>
<style>
	#menubar dl, #section_in {
	background:  #FFF!important;
	}
	/* contenu "section" */
	#section_up_left, #section_up, #section_up_right, #section_left, #section_bottom_left, #section_bottom, #section_bottom_right, #section_right{
	background:none!important;
	}
</style>
<![endif]--> 
<!--[if IE 7]>
<style>
	#menubar dl, #section_in {
	background:  #FFF!important;
	}
	/* contenu "section" */
	#section_up_left, #section_up, #section_up_right, #section_left, #section_bottom_left, #section_bottom, #section_bottom_right, #section_right{
	background:none!important;
	}
	BODY#theCommentsPage .content,
	BODY#theUploadPage .content,
	BODY#theRegisterPage .content,
	BODY#theIdentificationPage .content,
	BODY#theProfilePage .content,
	BODY#theSearchPage .content,
	BODY#theAboutPage .content,
	BODY#thePopuphelpPage .content,
	BODY#thePasswordPage .content,
	BODY#theNotificationPage .content,
	BODY#theTagsPage .content,
	BODY#theNBMPage .content,
	#action_pict,
	#comments
	{
	background:  #FFF!important;
	}
</style>
<![endif]--> 
{/literal}