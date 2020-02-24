<?php

namespace Drupal\ed_forms\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Class AjaxFormBlock.
 *
 * @package Drupal\ed_forms\Plugin\Block
 *
 * @Block(
 * id = "ajax_form_block",
 * admin_label=@Translation("Ajax Form Block"),
 * )
 */
class AjaxFormBlock extends BlockBase {

  /**
   *
   */
  public function build() {
    $ajax = TRUE;

    // $form = \Drupal::formBuilder()->getForm('\Drupal\ed_forms\Form\RedirectForm', $ajax);.
    $form = \Drupal::formBuilder()->getForm('\Drupal\ed_forms\Form\AjaxForm');

    return $form;
  }

}
