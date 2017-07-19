{footer_script}{literal}
jQuery(".showInfo").tipTip({
  delay: 0,
  fadeIn: 200,
  fadeOut: 200,
  maxWidth: '300px',
  defaultPosition: 'right'
});
{/literal}{/footer_script}


<div class="titrePage">
  <h2>{'Media Icon Plugin'|@translate}</h2>
</div>

<form method="post" action="" class="properties" ENCTYPE="multipart/form-data"> 
	<fieldset>
    <legend>{'Style'|@translate}</legend>
	<p class="media_icon_bold_center">
		{'Icon style:'|@translate}
	</p>
	<p class="media_icon_bold_center">	
		<select id="media_icon_select" name="media_icon_style">
			{foreach from=$media_icon_styles item=media_icon_styles_value key=media_icon_styles_key}
				<option value="{$media_icon_styles_key}" {if $media_icon_styles_key eq $media_icon_style}selected="selected"{/if}>{$media_icon_styles_value|@translate}</option>
			{/foreach}
		</select>
	</p>
	<p class="media_icon_bold_center">
		{'Types of files you want to add an icon to:'|@translate}
	</p>
	<p>
		<div id="media_icon_admin_checkbox_left">
			{foreach from=$media_icon_support item=media_icon_support_value key=media_icon_support_key name=media_icon_admin_checkbox_left}
				{if $smarty.foreach.media_icon_admin_checkbox_left.index < $smarty.foreach.media_icon_admin_checkbox_left.total/2|ceil}
					<label>{$media_icon_support_value.name|@translate} <input type="checkbox" name="media_icon_checkbox[media_icon_checkbox_{$media_icon_support_key}]" value="1" {if $media_icon_active.$media_icon_support_key eq 1}checked = "checked"{/if}{$media_icon_active_checked.youtube}></label><br />
				{/if}
			{/foreach}
		</div>
		<div id="media_icon_admin_checkbox_right">
			{foreach from=$media_icon_support item=media_icon_support_value key=media_icon_support_key name=media_icon_admin_checkbox_left}
				{if $smarty.foreach.media_icon_admin_checkbox_left.index >= $smarty.foreach.media_icon_admin_checkbox_left.total/2|ceil}
					<label><input type="checkbox" name="media_icon_checkbox[media_icon_checkbox_{$media_icon_support_key}]" value="1" {if $media_icon_active.$media_icon_support_key eq 1}checked = "checked"{/if}{$media_icon_active_checked.youtube}> {$media_icon_support_value.name|@translate} </label><br />
				{/if}
			{/foreach}
		</div>
	</p>
	<div class="media_icon_clear"></div>
	<p class="media_icon_bold_center">
		{'Click on submit to see changes.'|@translate}
	</p>
	</fieldset>
  
	<p><input class="submit" type="submit" value="{'Submit'|@translate}" name="submit"/></p>
</form>
  
<fieldset>
	<legend>{'Result'|@translate}</legend>
	{foreach from=$media_icon_support item=media_icon_support_value key=media_icon_support_key}
		<div class="media_icon_admin_element">{$media_icon_support_value.name|@translate} <a class="showInfo" title="{$media_icon_support_value.infos|@translate}">i</a>{if $media_icon_active.$media_icon_support_key eq 1}<span class="media_icon_admin media_icon_admin_{$media_icon_support_key}_{$media_icon_style}">{else}<span class="media_icon_admin">{'Not displayed'|@translate}{/if}</span></div>
	{/foreach}
</fieldset>