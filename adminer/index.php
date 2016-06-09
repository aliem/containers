<?php
// save sessions in /tmp
ini_set('session.save_path',  '/tmp/');

// adminer customization
function adminer_object() {

    $title = getenv('TITLE') ? getenv('TITLE') : "Adminer";
    $key = getenv('KEY') ? getenv('KEY') : "8beptpyymnv6x0q9ojsh";

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
    }

    return new AdminerCustomization($plugins);
}

include "./adminer.php";
