{if isset($category_thumbnails) || $BODY_ID != "theCategoryPage" || isset($U_LOGOUT)}
<nav id="main-menu" class="main-menu">
  <a href="{$U_HOME}">{'Home'|@translate}</a>
  |&nbsp;<a href="javascript:history.back();">Pr&eacute;c&eacute;dent</a>
{if isset($category_thumbnails)}
<div class="dropdown" style="display: inline">
  |&nbsp;<a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Galeries <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
{foreach from=$category_thumbnails item=cat name=cat_loop}
    <li role="presentation">
      <a role="menuitem" href="{$cat.URL}">
        <span>{$cat.NAME}</span>
        <span class="badge">{$cat.NB_IMAGES}</span>
    </a></li>
{/foreach}
  </ul>
</div>
{/if}
{if isset($blocks['mbMenu']->data['osm']) }
  |&nbsp;<a href="{$blocks['mbMenu']->data['osm']['URL']}">Carte</a>
{/if}
</nav>
{/if}
