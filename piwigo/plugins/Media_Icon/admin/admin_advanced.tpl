{html_head}{literal}
<style type="text/css">
	#media_icon_position_box {
		border: 2px solid #ccc;
		width: 500px;
		padding: 5px;
		background-color: #e5e5e5;
		position: relative;
		margin: auto;
	}
	
	#media_icon_position_box label {
		font-weight: normal;
		display: block;
		color: #444;
	}
	
	#media_icon_position_box label.middle {
		margin: 50px;
		text-align: center;
	}
	
	#media_icon_position_box label.right {
		float: right;
	}
	
	#media_icon_opacity {
		text-align: center;
	}
	
	.media_icon_error {
		border-color: #ff7070;
		background-color: #FFe5e5
	}
	
	.media_icon_error_description {
		background-color: red;
		color: white;
		padding: 0 5px;
		border-radius: 10px;
		font-weight: bold;
		cursor: help;
	}
	
	.wrap1 a {
		position: relative;
		display: block;
	}
</style>
{/literal}{/html_head}

<div class="titrePage">
  <h2>{'Media Icon Plugin'|@translate}</h2>
</div>

<form method="post" action="" class="properties" ENCTYPE="multipart/form-data"> 
	<fieldset>
	<legend>{'Position'|@translate}</legend>
		<div id="media_icon_position_box">
			<label class="right">{'Top right corner'|@translate} <input name="media_icon[position]" type="radio" value="topright"{if $media_icon_advanced.position eq 'topright'} checked="checked"{/if}></label>
			<label><input name="media_icon[position]" type="radio" value="topleft"{if $media_icon_advanced.position eq 'topleft'} checked="checked"{/if}> {'Top left corner'|@translate}</label>
			<br /><br /><br />
			<label class="right">{'Bottom right corner'|@translate} <input name="media_icon[position]" type="radio" value="bottomright"{if $media_icon_advanced.position eq 'bottomright'} checked="checked"{/if}></label>
			<label><input name="media_icon[position]" type="radio" value="bottomleft"{if $media_icon_advanced.position eq 'bottomleft'} checked="checked"{/if}> {'Bottom left corner'|@translate}</label>
		</div>
	</fieldset>
	
	<fieldset>
	<legend>{'Opacity'|@translate}</legend>
		<div id="media_icon_opacity">
			<label for="media_icon_opacity_input">{'Opacity'|@translate}</label>
			<input size="3" maxlength="3" id="media_icon_opacity_input" type="text" name="media_icon[opacity]" value="{$media_icon_advanced.opacity}"{if isset($media_icon_errors.opacity)} class="media_icon_error"{/if}> %
			{if isset($media_icon_errors.opacity)}<span class="media_icon_error_description" title="{$media_icon_errors.opacity}">!</span>{/if}
		</div>
	</fieldset>
	
	<p><input class="submit" type="submit" value="{'Submit'|@translate}" name="submit"/></p>
	
	<fieldset>
		<legend>{'Result'|@translate}</legend>
		<ul class="thumbnails" id="thumbnails">
			<li>
				<span class="wrap1">
					<span class="">
						<a href="#">
							<span class="media_icon media_icon_pdf_{$media_icon_style}"></span>
							<img class="thumbnail" media_icon="xxxxxxxxx.pdf" src="{$media_icon_admin_path}admin/img/landscape.png" alt="landscape" title="landscape">
						</a>
					</span>
				</span>
			</li>
			<li>
				<span class="wrap1">
					<span class="">
						<a href="#">
							<span class="media_icon media_icon_youtube_{$media_icon_style}"></span>
							<img class="thumbnail" media_icon="youtube" src="{$media_icon_admin_path}admin/img/portrait.png" alt="portrait" title="portrait">
						</a>
					</span>
				</span>
			</li>
		</ul>
	</fieldset>
</form>