<?php

namespace Drupal\ed_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 */
class AjaxForm extends FormBase {

  /**
   *
   */
  public function getFormId() {
    return 'ajax_form';
  }

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['box'] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => 'box-wrapper',
      ],
    ];

    $form['box']['first_name'] = [
      '#type' => 'textfield',
      '#title' => t('First Name'),
      '#required' => TRUE,
      '#attributes' => [
        'placeholder' => t('First Name'),
      ],
    ];

    $form['box']['email'] = [
      '#type' => 'textfield',
      '#title' => t('E-mail address'),
      '#required' => TRUE,
      '#attributes' => [
        'placeholder' => t('Email address'),
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
      '#ajax' => [
        'callback' => '::ajaxSubmit',
        'wrapper' => 'box-wrapper',
      ],

    ];

    return $form;
  }

  /**
   *
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // TODO: Implement submitForm() method.
  }

  /**
   *
   */
  public function ajaxSubmit(array &$form, FormStateInterface $form_state) {
    $elem = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello, ' . $form_state->getValue('first_name') . '!',
      '#attributes' => [
        'id' => ['edit-output'],
      ],
    ];

    return $elem;
  }

}
