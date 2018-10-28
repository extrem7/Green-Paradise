<?php

/**
 * Plugin Name: Garden
 * Version: 1.0
 * Author: YesTech
 * Author uri: https://t.me/drKeinakh
 */

require_once "includes/functions.php";
require_once "Garden.php";

function ThemeActivation()
{
    global $Garden;
    $Garden = new Garden();
}

ThemeActivation();