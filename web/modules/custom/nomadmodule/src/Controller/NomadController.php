<?php

namespace Drupal\nomadmodule\Controller;

use Drupal\Core\Url;
use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Extending ControllerBase for creating our form.
 */
class NomadController extends ControllerBase {
  /**
   * Marking variable for dependency injection use.
   *
   * @var \Component\DependencyInjection\ContainerInterface
   */
  protected $formbuild;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->formbuild = $container->get('form_builder');
    return $instance;
  }

  /**
   * Getting before created form, from Nomadform.php.
   */
  public function myform() {
    $nomadform = $this->formbuild->getForm('Drupal\nomadmodule\Form\Nomadform');
    return $nomadform;
  }

  /**
   * Created function for load info from database.
   */
  protected function load() {
    // Create connection, select the specific fields for the output.
    $db = \Drupal::service('database');
    $select = $db->select('nomadmodule', 'r');
    $select->fields('r', ['name', 'email', 'image', 'created', 'id']);
    $select->orderBy('created', 'DESC');
    $entries = $select->execute()->fetchall();
    return $entries;
  }

  /**
   * Created function for load info from database.
   */
  public function report() {
    // Added function to create markup and render information.
    $content = [];
    $contents = $this->load();
    $rows = json_decode(json_encode($contents), TRUE);
    foreach ($rows as $key => $entry) {
      $imgfile = File::load($entry['image']);
      $uri = $imgfile->getFileUri();
      $url = file_url_transform_relative(Url::fromUri(file_create_url($uri))->toString());
      $rows[$key]['image'] = $url;
    }
    $content['form'] = $this->myform();
    $value = $this->getDestinationArray();
    $dest = $value['destination'];
    return [
      '#theme' => 'nomadmodule_twig',
      '#form' => $content['form'],
      '#items' => $rows,
      '#title' => $this->t("Hello! You can add here a photo of your cat."),
      '#markup' => $this->t('Below is a list af all pets that taking part in competition of domestic cats'),
      '#root' => $dest,
    ];
  }

}
