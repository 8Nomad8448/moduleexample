<?php

namespace Drupal\nomadmodule\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\file\Entity\File;
use Drupal\Core\Form\FormStateInterface;

/**
 * Contains form created in order to change information in the list of cats.
 */
class Nomadformupdate extends FormBase {

  /**
   * Contains form machine id in order to create form of cats.
   */
  public function getFormId() {
    return 'nomadmodule_update_form';
  }

  /**
   * ID of the item to delete.
   *
   * @var int
   */
  protected $id;

  /**
   * Using build form function to create form.
   */
  public function buildForm(array $form, FormStateInterface $form_state, string $id = NULL) {
    $form['name'] = [
      '#title' => t("Your cat's name:"),
      '#type' => 'textfield',
      '#size' => 32,
      '#description' => t("The name of your pet, must contain at least 2 characters and maximum length is 32 characters, and can not contain any numbers, whitespaces, and symbols."),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::validateNameAjax',
        'event' => 'keyup',
        'progress' => [
          'type' => 'throbber',
          'message' => t('Verifying name..'),
        ],
      ],
    ];
    $form['email'] = [
      '#title' => t('Your email:'),
      '#type' => 'email',
      '#required' => TRUE,
      '#description' => t("Your email can contain only latin alphabet letters, 'at' sign, dash sign, underscore sign, and dots."),
      '#ajax' => [
        'callback' => '::validateEmailAjax',
        'event' => 'keyup',
        'progress' => [
          'type' => 'throbber',
          'message' => t('Verifying email..'),
        ],
      ],
    ];
    $form['image'] = [
      '#title' => t('Add your pet image'),
      '#type' => 'managed_file',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_size' => [2097152],
        '#required' => TRUE,
      ],
      '#description' => t("Your pet image size must be less than 2MB."),
      '#upload_location' => 'public://photos',
      '#required' => TRUE,
    ];
    $form['system_messages'] = [
      '#markup' => '<div id="form-system-messages"></div>',
      '#weight' => -100,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Edit'),
    ];
    $form['cancel'] = [
      '#type' => 'submit',
      '#value' => t('Cancel'),
      '#attributes' => [
        'onClick' => 'javascript:window.history.go(-1); return false;',
      ],
    ];
    $this->id = $id;
    return $form;
  }

  /**
   * Using standart structure of build form to create validation.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('name');
    $emailvalue = $form_state->getValue('email');
    if (!preg_match('/[A-Za-z]/', $value) || strlen($value) < 2 || strlen($value) > 32) {
      $form_state->setErrorByName('name', t('The name %name is not valid.', ['%name' => $value]));
    }
    if (filter_var($emailvalue, FILTER_VALIDATE_EMAIL) &&
      preg_match('/[#$%^&*()+=!\[\]\';,\/{}|":<>?~\\\\]/', $emailvalue)) {
      $form_state->setErrorByName('email', t('The email %email is not valid.', ['%email' => $emailvalue]));
    }
    else {
      $this->messenger()->deleteAll();
    }
  }

  /**
   * Creating ajax validation for name field of form.
   */
  public function validateNameAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $value = $form_state->getValue('name');
    if ($value == '') {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='messages messages--error'>The name field is required.
    </div>"));
    }
    elseif (!preg_match('/^[A-Za-z]*$/', $value) || strlen($value) < 2 || strlen($value) > 32) {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='messages messages--error'>The name $value is not valid.
    </div>"));
    }
    else {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='messages messages--status'>The name $value is correct.
</div>"));
      $this->messenger()->deleteAll();
    }
    return $response;
  }

  /**
   * Creating ajax validation for email field of form.
   */
  public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $emailvalue = $form_state->getValue('email');
    if ($emailvalue == '') {
      $response->addCommand(new HtmlCommand('#form-system-messages', "
<div class='messages messages--error'>Email field is required.
    </div>"));
    }
    elseif (!preg_match('/[#$%^&*()+=!\[\]\';,\/{}|":<>?~\\\\]/', $emailvalue) &&
      filter_var($emailvalue, FILTER_VALIDATE_EMAIL)) {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='messages messages--status'>Email $emailvalue is correct.
</div>"));
    }
    else {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='messages messages--error'>Email $emailvalue is not valid.
    </div>"));
      $this->messenger()->deleteAll();
    }
    return $response;
  }

  /**
   * Adding form submit according to build_form structure.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // In order to delete files after changing data in
    // database table fetching chosen file id.
    $db = \Drupal::service('database');
    $select = $db->select('nomadmodule', 'r');
    $select->condition('id', $this->id);
    $select->fields('r', ['image']);
    $file = $select->execute()->fetchAll();
    $img = json_decode(json_encode($file), TRUE);
    // Performing update query to update info stored in database
    // based on fid.
    $image = $form_state->getValue('image');
    $file = File::load($image[0]);
    $file->setPermanent();
    $file->save();
    $query = \Drupal::database()->update('nomadmodule')
      ->fields([
        'name' => $form_state->getValue('name'),
        'email' => $form_state->getValue('email'),
        'image' => $form_state->getValue('image')[0],
        'created' => date('d/m/Y H:i:s', time()),
      ]);
    $query->condition('id', $this->id);
    $query->execute();
    // Pulling all rows with the images that using same fid load and count it.
    $filemanaged = File::load($img[0]['image']);
    $select = $db->select('nomadmodule', 'r');
    $select->condition('image', $img[0]['image']);
    $select->fields('r', ['image']);
    $check = $select->execute()->fetchAll();
    $check = count($check);
    // If number of rows that using chosen fid less than 1 delete managed
    // file and all dependencies.
    if ($check < 1) {
      $filemanaged->delete();
    }
    \Drupal::messenger()->addMessage($this->t('Form changed successfully'), 'status', TRUE);
  }

}
