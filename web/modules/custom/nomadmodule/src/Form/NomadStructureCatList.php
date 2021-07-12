<?php

namespace Drupal\nomadmodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\file\Entity\File;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Contains form created in order to create list of cats, taking part in event.
 */
class NomadStructureCatList extends FormBase {

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
    // Getting destination array to create redirect.
    $value = $this->getDestinationArray();
    $root = $value['destination'];
    // Create connection, select the specific fields for the output.
    $db = \Drupal::service('database');
    $select = $db->select('nomadmodule', 'r');
    $select->fields('r', ['name', 'email', 'image', 'created', 'id']);
    $select->orderBy('created', 'DESC');
    $entries = $select->execute()->fetchall();
    // Create function for load info from database.
    $content = [];
    $contents = $entries;
    $content['message'] = [
      '#markup' => $this->t('Below is a list af all pets that taking part in competition of domestic cats'),
    ];
    $headers = [
      t('name'),
      t('email'),
      t('image'),
      t('created'),
      t('delete'),
      t('update'),
    ];
    // Encode stdClass to make it associative array.
    $rows = json_decode(json_encode($contents), TRUE);
    $tablerows = [];
    foreach ($rows as $entry) {
      $rowid = $entry['id'];
      // Adding fields for delete info in database.
      $form['delete'] = [
        '#type' => 'link',
        '#title' => $this->t('Delete'),
        '#url' => Url::fromUserInput("/admin/nomadmodule/delete/$rowid?destination=$root"),
        '#attributes' => [
          'data-dialog-type' => 'modal',
          'class' => 'use-ajax button form-submit',
        ],
      ];
      // Adding fields for update info in database.
      $form['update'] = [
        '#type' => 'link',
        '#title' => $this->t('Update'),
        '#url' => Url::fromUserInput("/admin/nomadmodule/update/$rowid?destination=$root"),
        '#attributes' => [
          'class' => 'button form-submit',
        ],
      ];
      $delete = \Drupal::service('renderer')->render($form['delete']);
      $update = \Drupal::service('renderer')->render($form['update']);
      $imgfile = File::load($entry['image']);
      $uri = $imgfile->getFileUri();
      $image_variables = [
        '#theme' => 'image_style',
        '#style_name' => 'medium',
        '#alt' => "User's pet's images",
        '#title' => "User's pet's images",
        '#uri' => $uri,
      ];
      $petsimage = \Drupal::service('renderer')->render($image_variables);
      $render = [];
      array_push($render, $entry['name'], $entry['email'], $petsimage, $entry['created'], $delete, $update, $rowid);
      array_push($tablerows, $render);
    }
    // Create table with type table set in order to render all database out
    // put in table style with checkboxes.
    $content['table'] = [
      '#type' => 'tableselect',
      '#header' => $headers,
      '#options' => $tablerows,
      '#empty' => t('No entries available.'),
    ];
    $content['modal'] = [
      '#theme' => 'nomadmodule_admin_modal',
    ];
    $content['#attached']['library'][] = 'nomadmodule/cats-style';
    // Adding submit button to send all checked rows.
    $content['cancel'] = [
      '#type' => 'submit',
      '#value' => t('Cancel'),
      '#attributes' => [
        'id' => 'abort',
      ],
    ];
    $content['submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Remove checked'),
      '#attributes' => [
        'id' => 'rem_multiple',
      ],
    ];
    return $content;
  }

  /**
   * Adding form submit according to build_form structure.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Taking form indexes that returned when administrator
    // wants to delete multiple rows and taking id from fields
    // with it.
    $index = $form['table']['#value'];
    foreach ($index as $checked) {
      $id = $form['table']['#options'][$checked][6];
      // Creating database connection and select all the images from database
      // in order to create check(count) how many rows using image with
      // same file id.
      $db = \Drupal::service('database');
      $select = $db->select('nomadmodule', 'r');
      $select->condition('id', $id);
      $select->fields('r', ['image']);
      $file = $select->execute()->fetchAll();
      $img = json_decode(json_encode($file), TRUE);
      if (isset($img[0]['image'])) {
        // Getting all table rows that using image with that
        // fid.
        $select->condition('image', $img[0]['image']);
        $filemanaged = File::load($img[0]['image']);
        $select = $db->select('nomadmodule', 'r');
        $select->condition('image', $img[0]['image']);
        $select->fields('r', ['image']);
        $check = $select->execute()->fetchAll();
        $check = count($check);
        // If current fid used in table more than once than deleting
        // only row but not managed file and it's dependencies if not
        // delete managed file.
        if ($check == 1) {
          $filemanaged->delete();
        }
        $query = \Drupal::database()->delete('nomadmodule');
        $query->condition('id', $id);
        $query->execute();
        \Drupal::messenger()->addMessage($this->t("Selected member of pet's competition event has been removed successfully."), 'status', TRUE);
      }
      else {
        \Drupal::messenger()->addMessage($this->t("Selected member of pet's competition event has been removed already."), 'status', TRUE);
      }
    }

  }

}
