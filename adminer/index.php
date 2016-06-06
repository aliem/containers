<?php
function adminer_object() {
    $title = getenv('TITLE') ? getenv('TITLE') : "Adminer";
    $key = getenv('KEY') ? getenv('KEY') : "8beptpyymnv6x0q9ojsh";

    $db_host =
        getenv('DB_HOST');
    $db_username =
        getenv('DB_USERNAME');
    $db_password =
        getenv('DB_PASSWORD');

    $_login =
        getenv('USERNAME') ? getenv('USERNAME') : 'username';
    $_password =
        getenv('PASSWORD') ? getenv('PASSWORD') : 'password';


    // Plugins

    include_once "./plugins/plugin.php";

    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    $plugins = array(
        new AdminerForeignSystem,
        new AdminerEditForeign,
        new ConventionForeignKeys,
    );

    // Customization

    class AdminerCustomization extends AdminerPlugin {

        function name() {
            // custom name in title and heading
            return $title;
        }

        function permanentLogin() {
            // key used for permanent login
            return $key;
        }

        function credentials() {
            // server, username and password for connecting to database
            return array($db_host, $db_username, $db_password);
        }

        function login($login, $password) {
            // validate user submitted credentials
            return ($login == $_login && $password == $_password);
        }

        function fieldName($field, $order = 0) {
            // only columns with comments will be displayed and only the first five in select
            return ($order <= 5 && !preg_match('~_(md5|sha1)$~', $field["field"]) ? h($field["comment"]) : "");
        }

    }

    return new AdminerCustomization($plugins);
}

include "./adminer.php";
