<?php

namespace Drupal\ed_forms\Controller;

/**
 *
 */
class ThankYouController {

  /**
   *
   */
  public function getPage($form_id) {
    $args = [
      'form_id' => $form_id,
    ];

    return [
      '#theme' => 'thank_you_page',
      '#data' => $args,
      '#cache' => [
    // Seconds.
        'max-age' => 10,
      ],
    ];
  }

}
