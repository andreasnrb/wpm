<?php

/**
 * Class WP_Core_PostType_Module
 */
abstract class WP_Core_PostType_Module extends WP_Module
{
    abstract function create_post_type();
}