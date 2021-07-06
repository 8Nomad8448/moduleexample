<?php

namespace Drupal\nomadmodule\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\file\Entity\File;

/**
 * Defines a confirmation form to confirm deletion of something by id.
 */
class NomadConfirmDel extends ConfirmFormBase {

  /**
   * ID of the item to delete.
   *
   * @var int
   */
  protected $id;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, string $id = NULL) {
    $this->id = $id;
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $db = \Drupal::service('database');
    $select = $db->select('nomadmodule', 'r');
    $select->condition('id', $this->id);
    $select->fields('r', ['image']);
    $file = $select->execute()->fetchAll();
    $img = json_decode(json_encode($file), TRUE);
    if (isset($img[0]['image'])) {
      $select->condition('image', $img[0]['image']);
      $filemanaged = File::load($img[0]['image']);
      $select = $db->select('nomadmodule', 'r');
      $select->condition('image', $img[0]['image']);
      $select->fields('r', ['image']);
      $check = $select->execute()->fetchAll();
      $check = count($check);
      if ($check == 1) {
        $filemanaged->delete();
      }
      $query = \Drupal::database()->delete('nomadmodule');
      $query->condition('id', $this->id);
      $query->execute();
      \Drupal::messenger()->addMessage($this->t("Selected member of pet's competition event has been removed successfully."), 'status', TRUE);
    }
    else {
      \Drupal::messenger()->addMessage($this->t("Selected member of pet's competition event has been removed already."), 'status', TRUE);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() : string {
    return "confirm_delete_form";
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('nomadmodule.content');
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Do you want to delete this member of event?');
  }

}
