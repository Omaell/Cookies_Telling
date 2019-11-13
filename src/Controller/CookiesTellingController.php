<?php

namespace Drupal\cookies_telling\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines CookiesTellingController class.
 */
class CookiesTellingController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function list() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Here will be all my favorite cookies!'),
    ];
  }

}