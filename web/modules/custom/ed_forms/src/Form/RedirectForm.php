<?php

namespace Drupal\ed_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 *
 */
class RedirectForm extends FormBase {

  /**
   * Return Form ID.
   *
   * @return string
   */
  public function getFormId() {
    return 'redirect-form';
  }

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state, $ajax = FALSE) {
    $form['#attached']['library'][] = 'ed_forms/js_validator';

    $form['#attributes']['class'][] = 'js-validation';

    $form['form_wrapper'] = [
      '#type' => 'container',
      '#attributes' => [
        'class' => 'form-wrapper',
        'id' => 'form-wrapper',
      ],
    ];

    $form['form_wrapper']['first_name'] = [
      '#type' => 'textfield',
      '#title' => t('First name'),
      '#required' => TRUE,
      '#attributes' => [
        'placeholder' => t('Enter your name'),
        'data-validation' => 'length',
        'data-validation-length' => 'min3',
      ],
    ];

    $form['form_wrapper']['mail'] = [
      '#type' => 'textfield',
      '#title' => t('E-mail address'),
      '#required' => TRUE,
      '#attributes' => [
        'placeholder' => t('Email address'),
        'data-validation' => 'email',
      ],
    ];

    $form['form_wrapper']['textarea'] = [
      '#type' => 'textarea',
      '#title' => t('Textarea example'),
    ];

    $form['form_wrapper']['radio'] = [
      '#type' => 'radios',
      '#required' => TRUE,
      '#title' => t('Radio example'),
      '#options' => [
        'option_1' => t('Option 1'),
        'option_2' => t('Option 2'),
      ],
    ];

    $form['form_wrapper']['checkbox'] = [
      '#type' => 'checkboxes',
      '#required' => TRUE,
      '#title' => t('Checkbox example'),
      '#options' => [
        'option_1' => t('Option 1'),
        'option_2' => t('Option 2'),
      ],
    ];

    $form['form_wrapper']['select'] = [
      '#type' => 'select',
      '#title' => t('Select example'),
      '#options' => [
        '' => t('Select option'),
        'option_1' => t('Option 1'),
        'option_2' => t('Option 2'),
      ],
    ];

    $form['form_wrapper']['file_attachment'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('File to attach'),
      '#description' => t('Allowed file extensions are: pdf doc docx txt'),
      '#upload_location' => 'public://file-attachments',
      '#upload_validators' => [
        'file_validate_extensions' => ['pdf doc docx txt'],
      ],
    ];

    $form['form_wrapper']['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];

    if ($ajax) {
      $form['form_wrapper']['submit'] = [
        '#type' => 'button',
        '#value' => t('Submit'),
        '#ajax' => [
          'callback' => '::ajaxSubmit',
          'wrapper' => 'form-wrapper',
        ],
      ];
    }

    return $form;
  }

  /**
   *
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $validate_mail = filter_var($form_state->getValue('mail'), FILTER_VALIDATE_EMAIL);

    if (!$validate_mail) {
      $form_state->setErrorByName('mail', $this->t('Your Email address is not valid!'));
    }
  }

  /**
   *
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $fid = $form_state->getValue('file_attachment', 0);
    $file = '';

    if (!empty($fid)) {
      $file = File::load($fid[0]);
      $file->setPermanent();
      $file->save();
    }

    $form_state->setRedirect('ed_forms.thank_you_page', ['form_id' => $form['#form_id']]);
  }

  /**
   *
   */
  public function ajaxSubmit(array &$form, FormStateInterface $form_state) {
    $markup = [
      '#markup' => t('Form has been submitted.'),
    ];

    return $markup;
  }

}
