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
 
 /*Перекрываем форму поиска */
function header_omega_form_alter(&$form, &$form_state, $form_id) {

  if ($form_id == 'search_block_form') {

    $deftext = t('Поиск');
    $form['search_block_form']['#title'] = t(' '); 
    $form['search_block_form']['#title_display'] = 'invisible'; 
    $form['search_block_form']['#size'] = 20;  
    $form['search_block_form']['#default_value'] = $deftext; 
    $form['actions']['submit']['#value'] = '<div>'; // Change the text on the submit button
	//$form['actions']['submit']['#value'] = t('Искать'); 


    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '".$deftext."';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '".$deftext."') {this.value = '';}";
	
	$form['actions']['submit'] = array (
    '#type' => 'submit',
    '#value' => '',
    '#attributes' => array( 'style' => 'position: absolute; left: 0; right: 0; top: 0; bottom: 0; border: none; opacity: 0; width: 100%;'), // put input field over the top of button and make transparent
    '#prefix' => '<button type="submit" class="btn btn-primary"><i class="fa fa-search">',
    '#suffix' => '</i></button>',
	);
	
	 // $form['actions']['submit'] = array(
    //  '#type'  => 'submit',
	//  );
	
	//$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search.png');
  }
}




function header_omega_links__locale_block(&$vars) {
  foreach($vars['links'] as $language => $langInfo) {
		$vars['links'][$language]['title'] = $vars['links'][$language]['language']->language;
  }
  $content = theme_links($vars);
  return $content;
}