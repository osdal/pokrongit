<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
 
 /**
 * Implements hook_process().
 */
function omega_bootstrap_process(&$vars, $hook) {
  if (!empty($vars['elements']['#grid']) || !empty($vars['elements']['#data']['wrapper_css'])) {
    if (!empty($vars['elements']['#grid'])) {
      foreach (array('prefix', 'suffix', 'push', 'pull') as $quality) {
        if (!empty($vars['elements']['#grid'][$quality])) {
          array_unshift($vars['attributes_array']['class'], 'offset' . $vars['elements']['#grid'][$quality]); # Добавляем класс offset* региону
        }
      }

      array_unshift($vars['attributes_array']['class'], 'span' . $vars['elements']['#grid']['columns']); # Добавляем класс span* региону
    }
  
    $vars['attributes'] = $vars['attributes_array'] ? drupal_attributes($vars['attributes_array']) : '';
  }

  if (!empty($vars['elements']['#grid_container']) || !empty($vars['elements']['#data']['css'])) {

    if (!empty($vars['elements']['#grid_container'])) {
      $vars['content_attributes_array']['class'][] = 'container'; # Добавляем класс container зоне
    }

    $vars['content_attributes'] = $vars['content_attributes_array'] ? drupal_attributes($vars['content_attributes_array']) : '';
  }

  alpha_invoke('process', $hook, $vars);
}