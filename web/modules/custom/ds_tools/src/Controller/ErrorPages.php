<?php

namespace Drupal\ds_tools\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 *
 */
class ErrorPages extends ControllerBase {

  /**
   *
   */
  public function pageNotFound() {
    return [
      '#markup' => '404',
    ];
  }

  /**
   *
   */
  public function pageAccessDenied() {
    return [
      '#markup' => '403',
    ];
  }

}
