{combine_script id="jquery" load="header"}
{html_head}
{literal}
<style type="text/css">
	.media_icon {
{/literal}
		opacity: {$media_icon_advanced.opacity/100};
		moz-opacity: {$media_icon_advanced.opacity/100};
		filter:alpha(opacity={$media_icon_advanced.opacity});
		{$media_icon_advanced.xposition};
		{$media_icon_advanced.yposition};
{literal}
	}
	.thumbnails .wrap2 A {
		position: relative;
	
	}
</style>
<script type="text/javascript">
	//Add Media Icon markups to thumbnails
	function media_icon_markup() {
{/literal}
		{if $media_icon_active.youtube eq 1}
			//Youtube
			$("img[media_icon^=youtube]").before('<span class="media_icon media_icon_youtube_{$media_icon_style}"></span>');
		{/if}
		
		{if $media_icon_active.vimeo eq 1}
			//Vimeo
			$("img[media_icon^=vimeo]").before('<span class="media_icon media_icon_vimeo_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.dailymotion eq 1}
			//Dailymotion
			$("img[media_icon^=dailymotion]").before('<span class="media_icon media_icon_dailymotion_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.wat eq 1}
			//Wat
			$("img[media_icon^=wat]").before('<span class="media_icon media_icon_wat_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.wideo eq 1}
			//Wideo
			$("img[media_icon^=wideo]").before('<span class="media_icon media_icon_wideo_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.video eq 1}
			//Video
			$("img[media_icon$=webm]").before('<span class="media_icon media_icon_video_{$media_icon_style}"></span>');
			$("img[media_icon$=webmv]").before('<span class="media_icon media_icon_video_{$media_icon_style}"></span>');
			$("img[media_icon$=ogv]").before('<span class="media_icon media_icon_video_{$media_icon_style}"></span>');
			$("img[media_icon$=m4v]").before('<span class="media_icon media_icon_video_{$media_icon_style}"></span>');
			$("img[media_icon$=flv]").before('<span class="media_icon media_icon_video_{$media_icon_style}"></span>');
			$("img[media_icon$=mp4]").before('<span class="media_icon media_icon_video_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.music eq 1}
			//Music
			$("img[media_icon$=mp3]").before('<span class="media_icon media_icon_music_{$media_icon_style}"></span>');
			$("img[media_icon$=ogg]").before('<span class="media_icon media_icon_music_{$media_icon_style}"></span>');
			$("img[media_icon$=oga]").before('<span class="media_icon media_icon_music_{$media_icon_style}"></span>');
			$("img[media_icon$=m4a]").before('<span class="media_icon media_icon_music_{$media_icon_style}"></span>');
			$("img[media_icon$=webma]").before('<span class="media_icon media_icon_music_{$media_icon_style}"></span>');
			$("img[media_icon$=fla]").before('<span class="media_icon media_icon_music_{$media_icon_style}"></span>');
			$("img[media_icon$=wav]").before('<span class="media_icon media_icon_music_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.pdf eq 1}
			//pdf
			$("img[media_icon$=pdf]").before('<span class="media_icon media_icon media_icon_pdf_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.document eq 1}
			//doc, docx or odt
			$("img[media_icon$=doc]").before('<span class="media_icon media_icon_document_{$media_icon_style}"></span>');
			$("img[media_icon$=docx]").before('<span class="media_icon media_icon_document_{$media_icon_style}"></span>');
			$("img[media_icon$=odt]").before('<span class="media_icon media_icon_document_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.spreadsheet eq 1}
			//xls, xlsx or ods
			$("img[media_icon$=xls]").before('<span class="media_icon media_icon_spreadsheet_{$media_icon_style}"></span>');
			$("img[media_icon$=xlsx]").before('<span class="media_icon media_icon_spreadsheet_{$media_icon_style}"></span>');
			$("img[media_icon$=ods]").before('<span class="media_icon media_icon_spreadsheet_{$media_icon_style}"></span>');
		{/if}
		{if $media_icon_active.presentation eq 1}
			//ppt, pptx or odp
			$("img[media_icon$=ppt]").before('<span class="media_icon media_icon_presentation_{$media_icon_style}"></span>');
			$("img[media_icon$=pptx]").before('<span class="media_icon media_icon_presentation_{$media_icon_style}"></span>');
			$("img[media_icon$=odp]").before('<span class="media_icon media_icon_presentation_{$media_icon_style}"></span>');
		{/if}
{literal}
	}
  
	//Allow Media Icon to work with RV Thumb Scroller 
	jQuery(window).bind("RVTS_loaded", function(){
		media_icon_markup();
	});

	//When the document has finiched to load
	jQuery(document).ready(function(){
		media_icon_markup();
	});
</script>
{/literal}
{/html_head}