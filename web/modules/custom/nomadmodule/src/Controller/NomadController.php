<?php

/**
 * @file
 * Contains \Drupal\nomadmodule\Controller\NomadController.
 */

namespace Drupal\nomadmodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;

class NomadController extends ControllerBase {

protected $formbuild;

public static function create(ContainerInterface $container) {
  $instance = parent::create($container);
  $instance->formbuild = $container->get('form_builder');

  return $instance;
}
public function myform() {
  $nomadform = $this->formbuild->getForm('Drupal\nomadmodule\Form\Nomadform');
  return $nomadform;
}
protected function load() {
  $db = \Drupal::service('database');
  $select = $db->select('nomadmodule','r');
  //Select the specific fields for the output.
  $select->fields('r', ['name', 'mail', 'image', 'created']);
  $select->orderBy('created', 'DESC');
  $entries = $select->execute()->fetchall();
  return $entries;
}

public function report() {
  $content = [];
  $contents = $this->load();
  $content['message'] = [
    '#markup' => $this->t('Below is a list af all pets that taking part in competition of domestic cats'),
  ];

  $headers = [
    t('Name'),
    t('email'),
    t('image'),
    t('created'),
  ];
  $rows = json_decode(json_encode($contents),true);
  foreach ($rows as $key => $entry) {
    $imgfile = File::load($entry['image']);
    $uri = $imgfile->getFileUri();
    $image_variables = [
      '#theme' => 'image_style',
      '#style_name' => 'large',
      '#alt' => "User's pet's images",
      '#title' => "User's pet's images",
      '#uri' => $uri,
    ];
    $petsimage = \Drupal::service('renderer')->render($image_variables);
    $rows[$key]['image'] = $petsimage;
  }

  $content['form'] = $this->myform();

  $content['table'] = [
    '#type' =>'table',
    '#header' => $headers,
    '#rows' => $rows,
    '#empty' => t('No entries available.'),
  ];
  return $content;
}
}
