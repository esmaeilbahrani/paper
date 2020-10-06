// [parser-php]
const PINOOX = {

    // urls
    URL: {
        CURRENT: window.location.href,
        BASE: '<?php echo url("^"); ?>',
        APP: '<?php echo url(""); ?>',
        API: '<?php echo url("^api/v1/"); ?>',
        SITE: '<?php echo url("~"); ?>',
        PANEL: '<?php echo url("~panel"); ?>',
        THEME: '<?php echo $_url; ?>',
        AVATAR: '<?php echo furl("resources/avatar.png"); ?>',
        APP_ICON: '<?php echo furl("resources/default.png"); ?>',
    },

    LANG: <?php echo @$_lang; ?>,
};