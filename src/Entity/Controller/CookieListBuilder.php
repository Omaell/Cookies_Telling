<?php

namespace Drupal\cookies_telling\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for  entity.
 *
 * @ingroup cookies_telling
 */
class CookieListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function render() {
    $build['description'] = [
      '#markup' => $this->t('Have a look at these cookies ! Anyway, you could go to the settings <a href=@adminlink>here</a>.', array(
        '@adminlink' => \Drupal::urlGenerator()
          ->generateFromRoute('cookies_telling.cookies_telling_settings'),
      )),
    ];

    $build += parent::render();
    return $build;
  }
  
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('IDCookie');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\cookie_telling\Entity\Cookie */
    $row['id'] = $entity->id();
    $row['link'] = $entity->toLink($entity->name->value);
    $row['op'] = parent::getOperations($entity);
    return $row + parent::buildRow($entity);
  }

}