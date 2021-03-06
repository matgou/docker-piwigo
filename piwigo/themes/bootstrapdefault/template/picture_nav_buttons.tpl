<div id="navigationButtons">
{if $DISPLAY_NAV_BUTTONS or isset($slideshow)}
{if isset($slideshow)}
{if isset($slideshow.U_INC_PERIOD)}
	<a href="{$slideshow.U_INC_PERIOD}" title="{'Reduce diaporama speed'|@translate}" class="pwg-state-default pwg-button">
		<span class="glyphicon glyphicon-minus"></span><span class="glyphicon-text">{'Reduce diaporama speed'|@translate}</span>
	</a>
{else}
    <span class="glyphicon glyphicon-minus"></span><span class="glyphicon-text">{'Reduce diaporama speed'|@translate}</span>
{/if}
{if isset($slideshow.U_DEC_PERIOD)}
	<a href="{$slideshow.U_DEC_PERIOD}" title="{'Accelerate diaporama speed'|@translate}" class="pwg-state-default pwg-button">
		<span class="glyphicon glyphicon-plus"></span><span class="glyphicon-text">{'Accelerate diaporama speed'|@translate}</span>
	</a>
{else}
    <span class="glyphicon glyphicon-plus"></span><span class="glyphicon-text">{'Accelerate diaporama speed'|@translate}</span>
{/if}
{/if}
{if isset($slideshow.U_START_REPEAT)}
	<a href="{$slideshow.U_START_REPEAT}" title="{'Repeat the slideshow'|@translate}" class="pwg-state-default pwg-button">
		<span class="glyphicon glyphicon-repeat"></span><span class="glyphicon-text">{'Repeat the slideshow'|@translate}</span>
	</a>
{/if}
{* TODO need an icon for this
{if isset($slideshow.U_STOP_REPEAT)}
	<a href="{$slideshow.U_STOP_REPEAT}" title="{'Not repeat the slideshow'|@translate}" class="pwg-state-default pwg-button">
		<span class="pwg-icon pwg-icon-repeat-stop"></span><span class="glyphicon-text">{'Not repeat the slideshow'|@translate}</span>
	</a>
{/if} *}
{*<!--{strip}{if isset($first)}
	<a href="{$first.U_IMG}" title="{'First'|@translate} : {$first.TITLE}" class="pwg-state-default pwg-button">
		<span class="pwg-icon pwg-icon-arrowstop-w">&nbsp;</span><span class="pwg-button-text">{'First'|@translate}</span>
	</a>
{else}
	<span class="pwg-state-disabled pwg-button">
		<span class="pwg-icon pwg-icon-arrowstop-w">&nbsp;</span><span class="pwg-button-text">{'First'|@translate}</span>
	</span>
{/if}{/strip}-->*}
{strip}{if isset($previous)}
	<a href="{$previous.U_IMG}" title="{'Previous'|@translate} : {$previous.TITLE_ESC}">
		<span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon-text">{'Previous'|@translate}</span>
	</a>
{else}
    <span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon-text">{'Previous'|@translate}</span>
{/if}{/strip}
{if isset($slideshow.U_START_PLAY)}
	<a href="{$slideshow.U_START_PLAY}" title="{'Play slideshow'|@translate}">
		<span class="glyphicon glyphicon-play"></span><span class="glyphicon-text">{'Play slideshow'|@translate}</span>
	</a>
{/if}
{if isset($slideshow.U_STOP_PLAY)}
	<a href="{$slideshow.U_STOP_PLAY}" title="{'Pause slideshow'|@translate}">
		<span class="glyphicon glyphicon-pause"></span><span class="glyphicon-text">{'Pause slideshow'|@translate}</span>
	</a>
{/if}
{if isset($U_SLIDESHOW_STOP) }
    <a href="{$U_SLIDESHOW_STOP}" title="{'Stop slideshow'|@translate}">
        <span class="glyphicon glyphicon-stop"></span><span class="glyphicon-text">{'Stop slideshow'|@translate}</span>
    </a>
{/if}
{strip}{if isset($U_UP) and !isset($slideshow)}
    <a href="{$U_UP}" title="{'Thumbnails'|@translate}">
        <span class="glyphicon glyphicon-home"></span><span class="glyphicon-text">{'Thumbnails'|@translate}</span>
    </a>
{/if}{/strip}
{if isset($current.U_DOWNLOAD)}
                    <a id="downloadSizeLink" href="/d.php?link={$current.U_DOWNLOAD}" title="{'Download this file'|@translate}" class="pwg-state-default pwg-button" rel="nofollow">
                        <span class="glyphicon glyphicon-download-alt"></span><span class="glyphicon-text">{'Download'|@translate}</span>
                    </a>
{/if}
{strip}{if isset($next)}
	<a href="{$next.U_IMG}" title="{'Next'|@translate} : {$next.TITLE_ESC}">
		<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon-text">{'Next'|@translate}</span>
	</a>
{else}
    <span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon-text">{'Next'|@translate}</span>
{/if}{/strip}
{*<!--{strip}{if isset($last)}
	<a href="{$last.U_IMG}" title="{'Last'|@translate} : {$last.TITLE}" class="pwg-state-default pwg-button pwg-button-icon-right">
		<span class="pwg-icon pwg-icon-arrowstop-e"></span><span class="pwg-button-text">{'Last'|@translate}</span>
	</a>
{else}
	<span class="pwg-state-disabled pwg-button pwg-button-icon-right">
		<span class="pwg-icon pwg-icon-arrowstop-e">&nbsp;</span><span class="pwg-button-text">{'Last'|@translate}</span>
	</span>
{/if}{/strip}-->*}
{/if}
</div>
{strip}
{footer_script}
document.onkeydown = function(e){ldelim}
	e=e||window.event;
	if (e.altKey) return true;
	var target=e.target||e.srcElement;
	if (target && target.type) return true;{* an input editable element *}
	var keyCode=e.keyCode||e.which, docElem=document.documentElement, url;
	switch(keyCode){ldelim}
{if isset($next)}
	case 63235: case 39: if (e.ctrlKey || docElem.scrollLeft==docElem.scrollWidth-docElem.clientWidth)url="{$next.U_IMG}"; break;
{/if}
{if isset($previous)}
	case 63234: case 37: if (e.ctrlKey || docElem.scrollLeft==0)url="{$previous.U_IMG}"; break;
{/if}
{if isset($first)}
	{* Home *}case 36: if (e.ctrlKey)url="{$first.U_IMG}"; break;
{/if}
{if isset($last)}
	{* End *}case 35: if (e.ctrlKey)url="{$last.U_IMG}"; break;
{/if}
{if isset($U_UP) and !isset($slideshow)}
	{* Up *}case 38: if (e.ctrlKey)url="{$U_UP}"; break;
{/if}
{if isset($slideshow.U_START_PLAY)}
	{* Pause *}case 32: url="{$slideshow.U_START_PLAY}"; break;
{/if}
{if isset($slideshow.U_STOP_PLAY)}
	{* Play *}case 32: url="{$slideshow.U_STOP_PLAY}"; break;
{/if}
	}
	if (url) {ldelim}window.location=url.replace("&amp;","&"); return false;}
	return true;
}
{/footer_script}
{/strip}

<script>

var catid="{$ato.CATEGORY_ID}";
if(!catid) {
motif=/^.*\/([0-9]*)($|\/.*)/
catid="{$U_UP}".replace(motif,"$1")
console.log(catid)
}
motif=/^.*id=([0-9]*)($|&.*)/
imgid="{$current.U_DOWNLOAD}".replace(motif,"$1")
console.log(imgid)

</script>
