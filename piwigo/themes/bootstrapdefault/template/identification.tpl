<div class="container">
{include file='infos_errors.tpl'}
   <form action="{$F_LOGIN_ACTION}" method="post" name="login_form" class="form-signin">
        <h2 class="form-signin-heading">
                {'Connexion'|@translate}
        </h2>
        <label for="username" class="sr-only">{'Username'|@translate}</label>
        <input tabindex="1" class="form-control" type="text" name="username" id="username" maxlength="40" placeholder="{'Username'|@translate}" style="margin-bottom: 20px; margin-top: 30px">
        <label for="password" class="sr-only">Password</label>
        <input tabindex="2" class="form-control" type="password" name="password" id="password" maxlength="25" placeholder="{'Password'|@translate}" required>
{if $authorize_remembering }
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox" style="margin-left: 20px; margin-bottom: 10px">
                            <label>
                                <input tabindex="3" type="checkbox" name="remember_me" id="remember_me" value="1"> {'Auto login'|@translate}
                            </label>
                        </div>
                    </div>
                </div>
{/if}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10"  style="text-align:center;">
                        <input type="hidden" name="redirect" value="{$U_REDIRECT|@urlencode}">
                        <input tabindex="4" type="submit" name="login" value="{'Submit'|@translate}" class="btn btn-default">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10" style="text-align:center;">
                        {if isset($U_REGISTER)}
                            <a href="{$U_REGISTER}" title="{'Register'|@translate}" class="pwg-state-default pwg-button">
                                <span class="glyphicon glyphicon-user"></span> {'Register'|@translate}
                            </a>
                        {/if}
                </div>
        </div>
    </form>
</div>
{combine_css path="http://getbootstrap.com/examples/signin/signin.css"}


<script type="text/javascript"><!--
    document.getElementById('username').focus();
//--></script>
