<?php
/**
 * @return array
 */
function retrieve_modules() {
    return array(
//        'core-comments' => 'Comments',
//        'core-taxonomies' => 'Taxonomies',
//        'core-post-types' => 'PostTypes',
//          'core-post-type-attachment' => 'AttachmentPostType',
//        'mu-plugins' => 'MU_Plugins'
    );
}

foreach(retrieve_modules() as $name => $class) {
    require ABSPATH . WPMOD . "/$name/$name.php";
    (new $class())->run();
}