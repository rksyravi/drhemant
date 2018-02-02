<?php

/**
 * @file
 * The primary PHP file for this theme.
 */

function drhemant_menu_tree__main_menu(&$vars) {
  return '<ul class="nav navbar-nav">' . $vars['tree'] . '</ul>';
}
