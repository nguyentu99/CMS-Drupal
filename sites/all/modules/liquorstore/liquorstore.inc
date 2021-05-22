<?php
function liquorstore_home_page_callback()
{
  return "";
}
function liquorstore_about_page_callback()
{
  return "";
}
function liquorstore_contact_page_callback()
{
  return "";
}
function liquorstore_product_page_callback()
{
  return "";
}
function liquorstore_blog_page_callback()
{
  return "";
}

function liquorstore_config_contact_form($form, $form_state){
  $form['liquorstore_config_form']['phone'] = array(
    '#type' => "textfield",
    "#title" => 'phone',
    "#default_value" => variable_get('phone'),
  );

  $form['liquorstore_config_form']['mail'] = array(
    '#type' => "textfield",
    "#title" => 'mail',
    "#default_value" => variable_get('mail'),
  );

  $form['liquorstore_config_form']['address'] = array(
    '#type' => "textfield",
    "#title" => 'address',
    "#default_value" => variable_get('address'),
  );

  $form['liquorstore_config_form']['website'] = array(
    '#type' => "textfield",
    "#title" => 'website',
    "#default_value" => variable_get('website'),
  );

  $form['liquorstore_config_form']['youtobe'] = array(
    '#type' => "textfield",
    "#title" => 'youtobe',
    "#default_value" => variable_get('youtobe'),
  );

  $form['liquorstore_config_form']['facebook'] = array(
    '#type' => "textfield",
    "#title" => 'facebook',
    "#default_value" => variable_get('facebook'),
  );

  $form['liquorstore_config_form']['slogan'] = array(
    '#type' => "textfield",
    "#title" => 'slogan',
    "#default_value" => variable_get('slogan'),
  );

  $form['liquorstore_config_form']['copyright'] = array(
    '#type' => "textfield",
    "#title" => 'copyright',
    "#default_value" => variable_get('copyright'),
  );

  return system_settings_form($form);
}

function liquorstore_config_background_form($form, $form_state){
  $nodes = db_select('node', 'n')
    ->fields('n')
    ->condition('type', 'background')
    ->execute()
    ->fetchAll();
  $node_options = array();
  foreach ($nodes as $node) {
    $node_options[$node->nid] = $node->title;
  }

  $form['background'] = array(
    '#type' => 'select',
    '#title' => 'background',
    '#options' => $node_options,
    "#default_value" => variable_get('background'),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}

function liquorstore_config_service_form($form, $form_state){
  $nodes = db_select('node', 'n')
    ->fields('n')
    ->condition('type', 'service')
    ->execute()
    ->fetchAll();
  $node_option = array();
  foreach ($nodes as $node){
    $node_option[$node->nid] = $node->title;
  }

  $form['service'] = array(
    '#type' => 'select',
    '#title' => 'service',
    '#options' => $node_option,
    '#default_value' => variable_get('service'),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}

function liquorstore_config_about_form($form, $form_state){
  $query = db_select('node', 'n');
  $query->fields('n');
  $query->condition('type','about');
  $about = $query->execute()->fetchAll();
  $node_option = array();
  foreach ($about as $node){
    $node_option[$node->nid] = $node->title;
  }

  $form['about'] = array(
    '#type' => 'select',
    '#title' => 'about',
    '#options' => $node_option,
    '#default_value' => variable_get('about'),
    '#required' => TRUE,
  );
  return system_settings_form($form);
}
