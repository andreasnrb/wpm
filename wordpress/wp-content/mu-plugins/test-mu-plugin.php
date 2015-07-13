<?php
/**
 * Class Test_Modular_Mu_Plugins
 */
class Test_Mu_Plugin {
    function run() {
        add_action( 'admin_notices', array( $this, '_admin_notices' ) );
    }
    function _admin_notices() {
        echo <<<HTML
<style type="text/css">
.updated p { font-size:3em; color:red; font-weight: bold; }
</style>
<div class="updated">
<p>Modular MU Plugins Loaded!</p>
</div>
HTML;
    }
}
(new Test_Mu_Plugin())->run();