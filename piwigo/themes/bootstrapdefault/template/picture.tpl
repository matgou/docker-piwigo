<!-- Start of picture.tpl -->
{combine_css path="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"}
{combine_css path="themes/bootstrapdefault/jquery.fancybox.css"}
{combine_script id='jquery.fancybox' path='themes/bootstrapdefault/js/jquery.fancybox.pack.js' load='footer'}

{if !empty($PLUGIN_PICTURE_BEFORE)}{$PLUGIN_PICTURE_BEFORE}{/if}

{include file='main-menu.tpl'}

{include file='infos_errors.tpl'}

<div class="container">
    {include file='picture_nav_buttons.tpl'|@get_extent:'picture_nav_buttons'}
</div>

<div id="theImage">
    {$ELEMENT_CONTENT}
</div>
<div id="sidebar">
    <div id="info-content" class="info">
        <dl>
            <h4>{'Information'|@translate}</h4>
{if $display_info.author and isset($INFO_AUTHOR)}
            <dt>{'Author'|@translate}</dt>
            <dd>{$INFO_AUTHOR}</dd>
{/if}
{if $display_info.created_on and isset($INFO_CREATION_DATE)}
            <dt>{'Created on'|@translate}</dt>
            <dd>{$INFO_CREATION_DATE}</dd>
{/if}
{if $display_info.posted_on}
            <dt>{'Posted on'|@translate}</dt>
            <dd>{$INFO_POSTED_DATE}</dd>
{/if}
{if $display_info.dimensions and isset($INFO_DIMENSIONS)}
            <dt>{'Dimensions'|@translate}</dt>
            <dd>{$INFO_DIMENSIONS}</dd>
{/if}
{if $display_info.file}
            <dt>{'File'|@translate}</dt>
            <dd>{$INFO_FILE}</dd>
{/if}
{if $display_info.filesize and isset($INFO_FILESIZE)}
            <dt>{'Filesize'|@translate}</dt>
            <dd>{$INFO_FILESIZE}</dd>
{/if}
{if $display_info.tags and isset($related_tags)}
            <dt>{'Tags'|@translate}</dt>
            <dd>
                {foreach from=$related_tags item=tag name=tag_loop}{if !$smarty.foreach.tag_loop.first}, {/if}<a href="{$tag.URL}">{$tag.name}</a>{/foreach}
            </dd>
{/if}
{if $display_info.categories and isset($related_categories)}
            <dt>{'Albums'|@translate}</dt>
            <dd>
{foreach from=$related_categories item=cat name=cat_loop}
                {if !$smarty.foreach.cat_loop.first}<br />{/if}{$cat}
{/foreach}
            </dd>
<!--
{$related_categories|@var_dump}
-->
{/if}
{if $display_info.privacy_level and isset($available_permission_levels)}
{combine_script id='core.scripts' load='async' path='themes/default/js/scripts.js'}
{footer_script require='jquery'}{strip}
    function setPrivacyLevel(id, level, label) {
    (new PwgWS('{$ROOT_URL}')).callService(
        "pwg.images.setPrivacyLevel", { image_id:id, level:level},
        {
            method: "POST",
            onFailure: function(num, text) { alert(num + " " + text); },
            onSuccess: function(result) {
                jQuery('#dropdownPermissions').html(label + ' <span class="caret"></span>');
                jQuery('.permission-li').removeClass('active');
                jQuery('#permission-' + level).addClass('active');
            }
        }
    );
    }
    (SwitchBox=window.SwitchBox||[]).push("#privacyLevelLink", "#privacyLevelBox");
{/strip}{/footer_script}

            <dt>{'Who can see this photo?'|@translate}</dt>
            <dd>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle ellipsis" type="button" id="dropdownPermissions" data-toggle="dropdown" aria-expanded="true">
                        {$available_permission_levels[$current.level]}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownPermissions">
{foreach from=$available_permission_levels item=label key=level}
                        <li id="permission-{$level}" role="presentation" class="permission-li {if $current.level == $level} active{/if}"><a role="menuitem" tabindex="-1" href="javascript:setPrivacyLevel({$current.id},{$level},'{$label}')">{$label}</a></li>
{/foreach}
                    </ul>
                </div>
            </dd>
{/if}
{foreach from=$metadata item=meta}
            <br />
            <h4>{$meta.TITLE}</h4>
{foreach from=$meta.lines item=value key=label}
            <dt>{$label}</dt>
            <dd>{$value}</dd>
{/foreach}
{/foreach}
        </dl>
    </div>
    <div class="handle">
        <a id="info-link" href="#">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
        </a>
    </div>
</div>

<div class="container">
    <section id="important-info">
{if isset($COMMENT_IMG)}
        <h4 class="imageComment">{$COMMENT_IMG}</h4>
{/if}

{include file="http_scheme.tpl"}

{if !empty($navbar) }
<div class="container">
{include file='navigation_bar.tpl' fragment='comments'|@get_extent:'navbar'}
</div>
{/if}

<!--
<div id="imageToolBar">
{include file='picture_nav_buttons.tpl'|@get_extent:'picture_nav_buttons'}

{if isset($U_SLIDESHOW_STOP)}
<p>
	[ <a href="{$U_SLIDESHOW_STOP}">{'stop the slideshow'|@translate}</a> ]
</p>
{/if}
-->
{if !empty($PLUGIN_PICTURE_AFTER)}{$PLUGIN_PICTURE_AFTER}{/if}
{footer_script require='jquery'}{strip}
var images;
var xml;
$.get( "/ws.php?method=pwg.categories.getImages&cat_id[]=" + catid, function( data ) {
  xml = data, xmlDoc = $.parseXML( xml ),
  $xml = $( xmlDoc );
  var images;
  if(navigator.userAgent.indexOf("Safari") > -1) {
      images = $(xml).find('image');
  } else {
      images = xml.firstChild.children[1].children;
  }
  console.log(images);
  for (var i = 0; i < images.length; i++) {
    image = images[i];
    url=image.attributes[8].nodeValue;
    console.log(url);
    /* url = url.replace(/.*galleries/, "/i.php/galleries"); */
    /* url = url.replace(/.jpg/, "-me.jpg"); */
    console.log(url);
    $("#hidden_images").append("<a class='fancybox' href='" + url + "' rel='group'><img src='" + url + "' alt=''/></a>");
  }
});
$.get( "/ws.php?method=pwg.images.getInfo&image_id=" + imgid, function( data ) {
  xml = data, xmlDoc = $.parseXML( xml ),
  $xml = $( xmlDoc );
  var images;
  console.log(xml);
  if(navigator.userAgent.indexOf("Safari") > -1) {
      images = $(xml).find('image');
  } else {
      images = xml.firstChild.children;
  }
  image = images[0];
  url=image.getAttribute('element_url');
  $("#downloadSizeLink").attr('href', url.replace(/([0-9]*_[a-zA-Z0-9.-]*$)/, 'pwg_high/$1'));
  $("#downloadSizeLink").attr('download', url.replace(/^.*\/([0-9]*_[a-zA-Z0-9.-]*$)/, '$1'));
});
        $(document).ready(function() {
                $(".fancybox").fancybox();
        });


{/strip}{/footer_script}

