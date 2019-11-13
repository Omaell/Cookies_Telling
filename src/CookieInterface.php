<?php

namespace Drupal\cookies_telling;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a Contact entity.
 * @ingroup content_entity_example
 */
interface CookieInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}