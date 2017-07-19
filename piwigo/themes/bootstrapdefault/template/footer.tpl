<!-- Start of footer.tpl -->

          <footer class="footer">
            <div class="container">
		<p class="text-muted">
        {if isset($debug.TIME)}
            {'Page generated in'|@translate} {$debug.TIME} ({$debug.NB_QUERIES} {'SQL queries in'|@translate} {$debug.SQL_TIME}) -
        {/if}
        {'Powered by'|@translate}	<a href="{$PHPWG_URL}" class="Piwigo">Piwigo</a> | Galerie Photos de Mathieu et Johanna {$VERSION}
        {if isset($CONTACT_MAIL)}
            | <a href="mailto:{$CONTACT_MAIL}?subject={'A comment on your site'|@translate|@escape:url}">{'Contact webmaster'|@translate}</a>
        {/if}
        {if isset($TOGGLE_MOBILE_THEME_URL)}
            | {'View in'|@translate} : <a href="{$TOGGLE_MOBILE_THEME_URL}">{'Mobile'|@translate}</a> | <b>{'Desktop'|@translate}</b>
        {/if}

        {get_combined_scripts load='footer'}

        {if isset($footer_elements)}
            {foreach from=$footer_elements item=v}
                {$v}
            {/foreach}
        {/if}
            </p>
        </div>
    </footer>
{if isset($debug.QUERIES_LIST)}
    <div id="debug">
        {$debug.QUERIES_LIST}
    </div>
{/if}
</body>
</html>
