<?php

/**
 * @file
 * Contains \Drupal\nomadmodule\Controller\NomadController.
 */

namespace Drupal\nomadmodule\Controller;
use Drupal\Core\Url;
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
    $select->fields('r', ['name', 'email', 'image', 'created', 'id']);
    $select->orderBy('created', 'DESC');
    $entries = $select->execute()->fetchall();
    return $entries;
  }

  public function report() {
    $content = [];
    $contents = $this->load();

    $rows = json_decode(json_encode($contents),true);
    foreach ($rows as $key => $entry) {
      $imgfile = File::load($entry['image']);
      $uri = $imgfile->getFileUri();
      $url = file_url_transform_relative(Url::fromUri(file_create_url($uri))->toString());
      $rows[$key]['image'] = $url;
    }

    $content['form'] = $this->myform();

    return [
      '#theme' => 'nomadmodule_twig',
      '#form' => $content['form'],
      '#items' => $rows,
      '#title' => $this->t("Hello! You can add here a photo of your cat."),
      '#markup' => $this->t('Below is a list af all pets that taking part in competition of domestic cats'),
    ];
  }
}
