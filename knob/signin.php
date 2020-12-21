<?php if(!defined('s7V9pz')) {die();}?><?php
fc('grupo');
if ($GLOBALS["logged"]) {
    if (isset($_POST["do"])) {
        gec('location.reload();');
    } else {
        if (!isset($_GET['goto'])) {
            $_GET['goto'] = 'chat/';
        }
        rt($_GET['goto']);
    }
}
gr_loginproviders('connect');
grupofns();
gr_metatags();
$GLOBALS["grads"] = gr_ads('get', 'signin');
$pgload = str_replace('/', '', pg('signin/pg'));
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no shrink-to-fit=no">
    <title><?php gec($GLOBALS["default"]->sitename.' - '.$GLOBALS["default"]->siteslogan); ?></title>
    <meta name="description" content="<?php gec($GLOBALS["default"]->sitedesc); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php gec(url()); ?>">
    <meta property="og:title" content="<?php gec($GLOBALS["default"]->sitename.' - '.$GLOBALS["default"]->siteslogan); ?>">
    <meta property="og:description" content="<?php gec($GLOBALS["default"]->sitedesc); ?>">
    <meta property="og:image" content="<?php gec($GLOBALS["default"]->grsitelogo); ?>">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php gec(url()); ?>">
    <meta property="twitter:title" content="<?php gec($GLOBALS["default"]->sitename.' - '.$GLOBALS["default"]->siteslogan); ?>">
    <meta property="twitter:description" content="<?php gec($GLOBALS["default"]->sitedesc); ?>">
    <meta property="twitter:image" content="<?php gec($GLOBALS["default"]->grsitelogo); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php gec(mf("grupo/global/favicon.png")); ?>" />
    <link rel="apple-touch-icon" href="<?php gec(mf("grupo/global/icon192.png")); ?>" />
    <link rel='manifest' href='<?php gec($GLOBALS["default"]->weburl); ?>manifest/'>
    <link href="<?php gec($GLOBALS["default"]->weburl) ?>riches/kit/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php gec($GLOBALS["default"]->weburl) ?>riches/fonts/<?php gec($GLOBALS["default"]->default_font) ?>/font.css" rel="stylesheet">
    <link href="<?php gec($GLOBALS["default"]->weburl) ?>riches/fonts/grupo/css/icons.css" rel="stylesheet">
    <link href="<?php gec($GLOBALS["default"]->weburl) ?>gem/tone/ajx.css" rel="stylesheet">
    <link href="<?php gec($GLOBALS["default"]->weburl) ?>gem/tone/gr-sign.css" rel="stylesheet">
    <link href="<?php gec($GLOBALS["default"]->weburl) ?>gem/tone/grscroll.css" rel="stylesheet">
    <?php gr_core('hf', 'header'); ?>
</head>
<body class="sign two bgone">

    <section style="background: url('https://i.imgur.com/7wDYtsG.jpg'); background-position: center;  background-repeat: no-repeat; background-size: cover;">
            <div class="row justify-content-center">
                <div class="col-sm-3">

                    <form autocomplete="off" class="gr_sign col-sm-3">
                        <div class="errormsg">
                            <span></span>
                        </div>

                        <div class="elements">
                            <input type="hidden" name="act" value=1 />
                            <input type="hidden" name="do" class='doz' value='login' />
                            <div class='register d-none'>
                                <div class="dc_hello">Créer un compte</div>
                                <div class="dc_hello_secondary"></div>
                                <div class="form-group">
                                    <label><?php gec($GLOBALS["lang"]->full_name) ?></label>
                                    <input type="text" autocomplete='grautocmp' name="fname" />
                                </div>
                                <div class="form-group">
                                    <label><?php gec($GLOBALS["lang"]->email_address) ?></label>
                                    <input type="email" autocomplete='grautocmp' name="email" />
                                </div>
                                <div class="form-group">
                                    <label><?php gec($GLOBALS["lang"]->username) ?></label>
                                    <input type="text" autocomplete='grautocmp' name="name" />
                                </div>
                                <?php gr_loginfields(); ?>
                            </div>
                            <div class="login">
                                <div class="dc_hello">Ha, te revoila !</div>
                                <div class="dc_hello_secondary">Nous sommes si heureux de te revoir !</div>
                                <div class="form-group">
                                    <label><?php gec($GLOBALS["lang"]->email_username) ?></label>
                                    <input type="text" autocomplete='grautocmp' name="sign" />
                                </div>
                            </div>
                            <div class="global">
                                <div class="form-group">
                                    <label><?php gec($GLOBALS["lang"]->password) ?></label>
                                    <input type="password" class='gstdep' autocomplete='grautocmp' name="pass" />
                                </div>
                            </div>
                        </div>
                        <div class="regsep d-none"></div>
                        <!--
                        <div class="sub">
                            <span class='rmbr'>
                                <i><b class="active"></b>
                                    <input type="hidden" name="rmbr" value=1 />
                                </i>
                                <?php gec($GLOBALS["lang"]->remember_me) ?></span>
                            <span class="doer" data-do="forgot"><?php gec($GLOBALS["lang"]->forgot_password) ?></span>
                        </div>
                        -->

                        <!-- CAPCHAT -->
                        <?php if ($GLOBALS["default"]->recaptcha == 'enable') { ?>
                            <div class='recaptcha'>
                                <div class="g-recaptcha" data-theme='light' data-sitekey="<?php gec($GLOBALS["default"]->rsitekey) ?>"></div>
                            </div>
                        <?php } ?>
                        <!-- END -->

                        <div class="submitbtns">
                            <div class="form-group">
                                 <span class="submit global dc_button" form='.gr_sign' do='login' btn='<?php gec($GLOBALS["lang"]->register); ?>' em='<?php gec($GLOBALS["lang"]->invalid_value); ?>' gst=0>
                                    <?php gec($GLOBALS["lang"]->login); ?>
                                </span>
                                <span class="submit ajx reset d-none" form='.gr_sign'><?php gec($GLOBALS["lang"]->reset); ?></span>
                            </div>
                        </div>
                        <?php if ($GLOBALS["default"]->userreg == 'enable') { ?>
                            <div class="switch" qn='<?php gec($GLOBALS["lang"]->already_have_account); ?>' btn='<?php gec($GLOBALS["lang"]->login); ?>'>
                                <?php gr_loginproviders('show'); ?>
                                <i><?php gec($GLOBALS["lang"]->dont_have_account); ?></i>
                                <span><?php gec($GLOBALS["lang"]->create); ?></span>
                            </div>
                        <?php } ?>
                    </form>

                </div>
            </div>
    </section>
    <div class='gr-consent<?php gec(' '.$GLOBALS["lang"]->core_align) ?>'>
        <span>
            <span><?php gec($GLOBALS["lang"]->cookie_constent); ?> <i class='d-none'><?php gec($GLOBALS["lang"]->tos); ?></i></span>
            <i><?php gec($GLOBALS["lang"]->got_it); ?></i>
        </span>
    </div>
    <div class="dumb d-none">
        <span class='unsplash'><?php gec($GLOBALS["default"]->unsplash_enable); ?></span>
        <span class='guestloginonload'><?php gec($GLOBALS["default"]->first_load_guestlogin); ?></span>
        <span class='unsplashid'><?php gec($GLOBALS["default"]->unsplash_load); ?></span>
        <span class='loading'><?php gec($GLOBALS["lang"]->loading) ?></span>
        <span class='pleasewait'><?php gec($GLOBALS["lang"]->please_wait) ?></span>
        <span class='cookieconsent'><?php gec($GLOBALS["default"]->cookie_consent) ?></span>
        <span class='baseurl'><?php gec($GLOBALS["default"]->weburl) ?></span>
        <span class='pgload'><?php gec($pgload) ?></span>
    </div>
    <div class="signbg"></div>
    <?php gr_core('hf', 'bodyclose'); ?>
</body>
<link href="<?php gec($GLOBALS["default"]->weburl) ?>gem/tone/custom.css" rel="stylesheet">
<script src="<?php gec($GLOBALS["default"]->weburl) ?>riches/kit/jquery/jquery-3.4.1.min.js"></script>
<script src="<?php gec($GLOBALS["default"]->weburl) ?>riches/kit/jquery/jquery-migrate-1.4.1.min.js"></script>
<script src="<?php gec($GLOBALS["default"]->weburl) ?>riches/kit/popper/umd/popper.min.js"></script>
<script src="<?php gec($GLOBALS["default"]->weburl) ?>riches/kit/bootstrap/bootstrap.min.js"></script>
<script src="<?php gec($GLOBALS["default"]->weburl) ?>riches/kit/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php gec($GLOBALS["default"]->weburl) ?>riches/kit/jscookie/js.cookie.js"></script>
<script src="<?php gec($GLOBALS["default"]->weburl) ?>gem/mine/ajx.js"></script>
<script src="<?php gec($GLOBALS["default"]->weburl) ?>gem/mine/gr-sign.js"></script>
<?php
gr_google();
if (pg('signin') == 'unverified/') {
    gr_prnt("<script> alert('".$GLOBALS["lang"]->check_inbox."'); </script>");
}
gr_core('hf', 'footer');
?>
<script type="module">
    import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwainstall';
    const el = document.createElement('pwa-update');
    document.body.appendChild(el);
</script>
</html>

<style>
    .gr_sign {
        background: #36393F !important;
        border-radius: 5px !important;
        padding: 30px;
        min-width: 450px;
    }

    .dc_hello {
        font-weight: 600;
        font-size: 25px;
        color: white;
        padding-top: 5px;
    }

    .dc_hello_secondary {
        font-size: 14px;
        color: #8E9297;
        margin-bottom: 30px;
    }

    .switch {
        margin-top: 12px !important;
        background: none !important;
        padding: 0 !important;
        border: none !important;
    }

    .switch i {
        color: #8E9297 !important;
    }

    .switch span {
        background: 0 !important;
        color: #7289DA !important;
        padding: 0 !important;
    }

    label {
        background: none !important;
        border: none !important;
        text-align: left !important;
        padding: 0 !important;
        color: #8E9297 !important;
        font-weight: normal !important;
    }

    input[type=text], input[type=password], input[type=email] {
        background: #303338 !important;
        border: solid 1px #262626 !important;
        padding: 10px !important;
        font-size: 14px !important;
        border-radius: 3px !important;
        box-sizing: border-box;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
        width: 100%;
        color: white !important;
    }

    input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
        border: solid 1px #7289DA !important;
    }

    .dc_button {
        padding: 11px 2px 11px 2px !important;
        border-radius: 3px!important;
        font-size: 16px !important;
        background: #7289DA !important;
        color: white !important;
    }
</style>