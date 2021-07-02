<?php

namespace Drupal\nomadmodule\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an nomadmodule name form.
 */
class Nomadform extends FormBase {

  /**
   * Marking variable for dependency injection use.
   *
   * @var \Component\DependencyInjection\ContainerInterface
   */

  protected $currentTime;

  /**
   * Contains form created in order to create list of cats for in event.
   */
  public function getFormId() {
    return 'nomadmodule_name_form';
  }

  /**
   * Using build form function to create.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
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
      ],
      '#description' => t("Your pet image size must be less than 2MB. Only files with the following extensions are allowed: png, jpg, jpeg."),
      '#upload_location' => 'public://photos',
      '#required' => TRUE,
    ];
    $form['system_messages'] = [
      '#markup' => '<div id="form-system-messages"></div>',
      '#weight' => -100,
    ];
    $form['submit'] = [
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
   * Creating Dependency Injection function.
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->currentTime = $container->get('datetime.time');

    return $instance;
  }

  /**
   * Using standart structure of build form to create validation.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('name');
    $emailvalue = $form_state->getValue('email');
    if (!preg_match('/^[A-Za-z]*$/', $value) || strlen($value) < 2 || strlen($value) > 32) {
      $form_state->setErrorByName('name', t('The name %name is not valid.', ['%name' => $value]));
    }
    if (filter_var($emailvalue, FILTER_VALIDATE_EMAIL) &&
      preg_match('/[#$%^&*()+=!\[\]\';,\/{}|":<>?~\\\\0-9]/', $emailvalue)) {
      $form_state->setErrorByName('email', t('The email %email is not valid.', ['%email' => $emailvalue]));
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
        "<div class='alert alert-dismissible fade show alert-danger'>The name field is required.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
    </div>"));
    }
    elseif (!preg_match('/^[A-Za-z]*$/',
        $value) || strlen($value) < 2 || strlen($value) > 32) {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='alert alert-dismissible fade show alert-danger'>The name $value is not valid.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
    </div>"));
    }
    else {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class
='alert alert-dismissible fade show alert-success'>The name $value is correct.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
</div>"));
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
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='alert alert-dismissible fade show alert-danger'>Email field is required.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
    </div>"));
    }
    elseif (filter_var($emailvalue, FILTER_VALIDATE_EMAIL) &&
      !preg_match('/[#$%^&*()+=!\[\]\';,\/{}|":<>?~\\\\0-9]/', $emailvalue)) {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='alert alert-dismissible fade show alert-success'>Email $emailvalue is correct.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
</div>"));
    }
    else {
      $response->addCommand(new HtmlCommand('#form-system-messages',
        "<div class='alert alert-dismissible fade show alert-danger'>Email $emailvalue is not valid.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
    </div>"));
    }
    return $response;
  }

  /**
   * Adding ajax form submit for form.
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
   * Adding form submit according to build_form structure.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /* Fetch the array of the file stored temporarily in database */
    $image = $form_state->getValue('image');

    /* Load the object of the file by it's fid */
    $file = File::load($image[0]);

    /* Set the status flag permanent of the file object */
    $file->setPermanent();

    /* Save the file in database */
    $file->save();
    $data = \Drupal::service('database')->insert('nomadmodule')
      ->fields([
        'name' => $form_state->getValue('name'),
        'email' => $form_state->getValue('email'),
        'image' => $form_state->getValue('image')[0],
        'created' => date('d/m/Y H:i:s', $this->currentTime->getCurrentTime() + 3 * 60 * 60),
      ])
      ->execute();

    \Drupal::messenger()->addMessage($this->t('Form Submitted Successfully'), 'status', TRUE);
  }

}
