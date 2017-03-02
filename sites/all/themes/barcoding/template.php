<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */

/* Removing default class names for menu items */
function barcoding_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . $sub_menu . "</li>\n";
}

function barcoding_menu_link__menu_top_nav_menu(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
    
  if ($element['#localized_options']['attributes']['class'][0]){
  $element['#localized_options']['html'] = TRUE;    
  $iconclass = $element['#localized_options']['attributes']['class'][0];  
  $element['#title'] = '<svg class="symbol symbol-'. $iconclass .'"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#'. $iconclass .'"></use></svg><span>'  . $element['#title'] ."</span>";
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    
  }else{
    $element['#localized_options']['html'] = TRUE;
    $element['#title'] = "<span>" . $element['#title'] . "</span>";
   $output = l($element['#title'], $element['#href'], $element['#localized_options']); 
  }
      
  return '<li>' . $output . $sub_menu . "</li>\n";
}

function barcoding_menu_link__menu_nav_social(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
    
  if ($element['#localized_options']['attributes']['class'][0]){
  $element['#localized_options']['html'] = TRUE;    
  $iconclass = $element['#localized_options']['attributes']['class'][0];  
  $element['#title'] = '<span class="bottle"><svg class="symbol symbol-'. $iconclass .'"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#'. $iconclass .'"></use></svg></span><span class="visible-for-screen-readers">' . $element['#title'] ."</span>";
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    
  }else{
    $element['#localized_options']['html'] = TRUE;
    $element['#title'] = "<span>" . $element['#title'] . "</span>";
   $output = l($element['#title'], $element['#href'], $element['#localized_options']); 
  }
      
  return '<li>' . $output . $sub_menu . "</li>\n";
}

function barcoding_menu_tree__menu_top_nav_menu($variables){
  return '<nav class="nav nav-quick nav-quick--clone" id="top-nav-menu"><ul>' . $variables['tree'] . '</ul></nav>';
}

function barcoding_menu_tree__menu_nav_main_menu($variables){
  //return '<nav class="nav nav-main" id="nav-main-menu"><ul>' . $variables['tree'] . '</ul></nav>';
    
    if (preg_match("/\bchildren\b/i", $variables['tree'])){
       return '<nav class="nav nav-main" id="nav-main-menu"><ul>' . $variables['tree'] . '</ul></nav>';
      } else {
        return '<button aria-hidden="true" class="silk-nav__trigger silk-nav__trigger--advance"><svg class="symbol symbol-chevron-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#chevron-right"></use></svg></button><ul class="children">' . $variables['tree'] . '</ul>';
      }
    
}

function barcoding_menu_tree__menu_nav_secondary_main_menu($variables){
  return '<nav class="nav nav-secondary-main" id="nav-secondary-main-menu"><ul>' . $variables['tree'] . '</ul></nav>';
}

function barcoding_menu_tree__menu_nav_action($variables){
  return '<nav class="nav nav-bulleted nav-action" id="nav-action"><ul>' . $variables['tree'] . '</ul></nav>';
}

function barcoding_menu_tree__menu_nav_legal($variables){
  return '<nav class="nav nav-bulleted nav-legal" id="nav-legal"><ul>' . $variables['tree'] . '</ul></nav>';
}

function barcoding_menu_tree__menu_nav_social($variables){
  return '<nav class="nav nav-social" id="nav-social"><ul>' . $variables['tree'] . '</ul></nav>';
}

function barcoding_preprocess_page(&$variables) {
  if (isset($variables['node']->type)) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }
}