<?php

namespace Drupal\html_mail_template\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class HtmlMailSettingsForm.
 */
class HtmlMailSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'html_mail_template.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'html_mail_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('html_mail_template.settings');

    $form['mail_ids'] = [
      '#title' => $this->t('Mail IDs'),
      '#type' => 'textarea',
      '#default_value' => $config->get('mail_ids'),
      '#description' => $this->t('Enter comma separated e-mail ids.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('html_mail_template.settings')
      ->set('mail_ids', $form_state->getValue('mail_ids'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
