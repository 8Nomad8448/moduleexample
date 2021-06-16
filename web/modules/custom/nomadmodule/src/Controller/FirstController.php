<?php

/**
 * @file
 * Contains \Drupal\nomadmodule\Controller\nomadmoduleController.
 */

namespace Drupal\nomadmodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class FirstController extends ControllerBase {

  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello! You can add here a photo of your cat.'),
    );
  }

}
