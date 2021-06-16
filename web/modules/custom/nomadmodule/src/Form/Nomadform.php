<?php

/**
 * @file
 * Contains \Drupal\nomadmodule\Form\Nomadform.
 */

namespace Drupal\nomadmodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides an nomadmodule name form.
 */

class Nomadform extends FormBase {

  /**
   *(@inheritdoc).
   */
  public function getFormId() {
    return 'nomadmodule_name_form';
  }
  /**
   * (@inheritdoc).
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form ['name'] = [
      '#title' => t("Your cat's name:"),
      '#type' => 'textfield',
      '#size' => 32,
      '#description' => t("The name of your pet, must contain at least 2 characters and maximum length is 32 characters, and can not contain any numbers, whitespaces, and symbols."),
      '#required' => TRUE,
    ];
    $form ['submit'] = [
      '#type' => 'submit',
      '#value' => t('Add cat'),
      '#ajax' => [
        'callback' => '::ajaxSubmitCallback',
        'event' => 'click',
      ],
    ];
    return $form;
  }

  /**
   * (@inheritdoc).
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage($this->t('Form Submitted Successfully'), 'status', TRUE);
  }
}
