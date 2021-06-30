<?php

namespace Drupal\nomadmodule\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Extending ControllerBase for creating our form.
 */
class FirstController extends ControllerBase {

  /**
   * Getting before created form, from Nomadform.php.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => t('Hello! You can add here a photo of your cat.'),
    ];
  }

}
