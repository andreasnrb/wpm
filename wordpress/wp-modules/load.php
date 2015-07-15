<?php
/**
 * @return array
 */
function retrieve_modules() {
    return array(
//        'core-comments' => 'Comments',
//        'core-taxonomies' => 'Taxonomies',
//        'core-post-types' => 'PostTypes',
          'core-post-type-attachment' => 'AttachmentPostType',
//        'mu-plugins' => 'MU_Plugins'
    );
}

foreach(retrieve_modules() as $name => $class) {
    global $module_instance;
    require ABSPATH . WPMOD . "/$name/$name.php";
    /**
     * @var WP_Module $module;
     */
    $module = new $class();
    $module->run();
    $module_instance[$name] =$module;
}

/**
 * @param string $module
 * @return bool
 */
function is_module_loaded($module) {
    global $module_instance;
    return isset($module_instance[$module]);
}

/**
 * @param string $module
 * @return null|WP_Module
 */
function get_module_instance($module) {
    global $module_instance;
    if(is_module_loaded($module))
        return $module_instance[$module];
    return null;
}

/**
 * @param $prefix
 * @return WP_Module[]
 */
function get_modules_instances($prefix) {
    $modules = array_keys(retrieve_modules());
    $instances = array();
    foreach($modules as $module) {
        if(substr($module,0, strlen($prefix)) == $prefix)
            if($instance = get_module_instance($module))
                $instances[]=$instance;
    }
    unset($instance);
    return $instances;
}