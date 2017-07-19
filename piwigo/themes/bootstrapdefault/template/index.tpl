<!-- Start of index.tpl -->
{combine_script id='core.switchbox' require='jquery' path='themes/default/js/switchbox.js'}
{combine_script id='cookie' require='jquery' path="themes/`$themeconf.name`/js/jquery.cookie.js"}
{combine_script id='equalheights' require='jquery' path="themes/`$themeconf.name`/js/jquery.equalheights.js"}
{if !empty($PLUGIN_INDEX_CONTENT_BEFORE)}{$PLUGIN_INDEX_CONTENT_BEFORE}{/if}

{include file='main-menu.tpl'}


<div class="path">
<!--
                {$TITLE}

{if isset($chronology.TITLE)}
                {$chronology.TITLE}
{/if}
{if !empty($CONTENT_DESCRIPTION)}
    <h4 style="text-align:center; font-size:25px;">
        {$CONTENT_DESCRIPTION}
    </h4>
{/if}

{$chronology|@var_dump}
{$blocks['mbMenu']->data['osm']|@var_dump}
-->
</div>

{include file='infos_errors.tpl'}

<div class="container">
{if !empty($PLUGIN_INDEX_CONTENT_BEGIN)}{$PLUGIN_INDEX_CONTENT_BEGIN}{/if}

<!--
{if isset($chronology_views)}
<div class="calendarViews">{'View'|@translate}:
    <a id="calendarViewSwitchLink" href="#">
        {foreach from=$chronology_views item=view}{if $view.SELECTED}{$view.CONTENT}{/if}{/foreach}
    </a>
    <div id="calendarViewSwitchBox" class="switchBox">
        {foreach from=$chronology_views item=view name=loop}{if !$smarty.foreach.loop.first}<br>{/if}
            <span{if !$view.SELECTED} style="visibility:hidden"{/if}>&#x2714; </span><a href="{$view.VALUE}">{$view.CONTENT}</a>
        {/foreach}
    </div>
    {footer_script}(SwitchBox=window.SwitchBox||[]).push("#calendarViewSwitchLink", "#calendarViewSwitchBox");{/footer_script}
</div>
{/if}

{if isset($FILE_CHRONOLOGY_VIEW)}
    {include file=$FILE_CHRONOLOGY_VIEW}
{/if}
-->

{if !empty($CONTENT_DESCRIPTION)}
    <h4 style="font-size:25px;">
        {$CONTENT_DESCRIPTION}
    </h4>
{/if}
    <div id="content" class="row {if $smarty.cookies.view == 'list'}content-list{else}content-grid{/if}">
{if !empty($CONTENT)}
    <!-- Start of content -->
    {$CONTENT}
    <!-- End of content -->
{/if}

{if !empty($CATEGORIES)}
    <!-- Start of categories -->
{$CATEGORIES}
{footer_script}{literal}$(document).ready(function(){$('#content img').load(function(){$('#content .col-inner').equalHeights()})});{/literal}{/footer_script}
    <!-- End of categories -->
{/if}

{if !empty($THUMBNAILS)}
    <!-- Start of thumbnails -->
{$THUMBNAILS}
{footer_script}{literal}$(document).ready(function(){$('#content img').load(function(){$('#content .col-inner').equalHeights()})});{/literal}{/footer_script}
    <!-- End of thumbnails -->
{/if}
    </div>
</div>
{if !empty($cats_navbar) || !empty($thumb_navbar)}
<div class="container">
{if !empty($cats_navbar)}
    {include file='navigation_bar.tpl' fragment="content"|@get_extent:'navbar' navbar=$cats_navbar}
{/if}
{if !empty($thumb_navbar)}
    {include file='navigation_bar.tpl' fragment="content"|@get_extent:'navbar' navbar=$thumb_navbar}
{/if}
</div>
{/if}

{if !empty($category_search_results)}
<div class="container">
    <h3 class="category_search_results">{'Album results for'|@translate} <em><strong>{$QUERY_SEARCH}</strong></em></h3>
    <p>
        <em><strong>
{foreach from=$category_search_results item=res name=res_loop}
{if !$smarty.foreach.res_loop.first} &mdash; {/if}
            {$res}
{/foreach}
        </strong></em>
    </p>
</div>
{/if}

{if !empty($tag_search_results)}
<div class="container">
    <h3 class="tag_search_results">{'Tag results for'|@translate} <em><strong>{$QUERY_SEARCH}</strong></em></h3>
    <p>
        <em><strong>
{foreach from=$tag_search_results item=tag name=res_loop}
{if !$smarty.foreach.res_loop.first} &mdash; {/if}
            <a href="{$tag.URL}">{$tag.name}</a>
{/foreach}
        </strong></em>
    </p>
</div>
{/if}

<div class="container">
{if !empty($PLUGIN_INDEX_CONTENT_END)}{$PLUGIN_INDEX_CONTENT_END}{/if}
</div>

{if !empty($PLUGIN_INDEX_CONTENT_AFTER)}{$PLUGIN_INDEX_CONTENT_AFTER}{/if}
<!-- End of index.tpl -->
