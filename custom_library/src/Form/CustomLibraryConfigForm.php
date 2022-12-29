<?php

namespace Drupal\custom_library\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Custom Library settings for this site.
 *
 * @internal
 */
class CustomLibraryConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_library_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['custom_library.assets.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('custom_library.assets.settings');

    $form['description'] = [
      '#markup' => $this->t('This form is used to configure Custom library for our site'),
    ];

    $form['asset_type'] = [
      '#type' => 'select',
      '#title' => 'Asset Type',
      '#options' => [
        1 => t('Default'),
        2 => t('Custom')
      ],
      '#default_value' => $config->get('asset_type'),
    ];
    $form['asset_links'] = [
        '#type' => 'textarea',
        '#title' => 'Asset Links',
        '#default_value' => $config->get('asset_links'),
        '#maxlength' => 200,
        '#description' => $this->t('Enter the external links with new line')
      ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save configuration'),
      '#button_type' => 'primary',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('custom_library.assets.settings')
      ->set('asset_type', $form_state->getValue('asset_type'))
      ->set('asset_links', $form_state->getValue('asset_links'))
      ->save();

    parent::submitForm($form, $form_state);
    

  }

}
