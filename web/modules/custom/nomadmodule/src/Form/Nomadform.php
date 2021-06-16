<?php

/**
 * @file
 * Contains \Drupal\nomadmodule\Form\Nomadform.
 */

namespace Drupal\nomadmodule\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\InsertCommand;
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
      '#ajax' => [
        'callback' => '::validateNameAjax',
        'event' => 'change',
        'progress' => [
          'type' => 'throbber',
          'message' => t('Verifying name..'),
        ],
      ],
    ];
        $form['system_messages'] = [
      '#markup' => '<div id="form-system-messages"></div>',
      '#weight' => -100,
    ];
    $form ['submit'] = [
      '#type' => 'submit',
      '#value' => t('Add cat'),
      '#ajax' => [
        'callback' => '::ajaxSubmitCallback',
        'event' => 'click',
        'progress' => [
          'type' => 'throbber',
        ],
      ],
    ];
    return $form;
  }

  /**
   * (@inheritdoc).
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('name');
    $emailvalue = $form_state->getValue('email');
    if (!preg_match('/^[A-Za-z]*$/', $value) || strlen($value)<2 || strlen($value)>32) {
      $form_state->setErrorByName ('name', t('The name %name is not valid.', array('%name' => $value)));
    }
  }
  
    /**
   * {@inheritdoc}
   */
  public function ajaxSubmitCallback(array &$form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    $message = [
      '#theme' => 'status_messages',
      '#message_list' => $this->messenger()->all(),
      '#status_headings' => [
        'status' => t('Status message'),
        'error' => t('Error message'),
        'warning' => t('Warning message'),
      ],
    ];
    $messages = \Drupal::service('renderer')->render($message);
    $ajax_response->addCommand(new HtmlCommand('#form-system-messages', $messages));
    return $ajax_response;
  }
  
  /**
   * (@inheritdoc).
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage($this->t('Form Submitted Successfully'), 'status', TRUE);
  }
}
