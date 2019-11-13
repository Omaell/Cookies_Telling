<?php
namespace Drupal\cookies_telling\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Ingredient entity.
 *
 * @ingroup cookies_telling
 *
 * @ContentEntityType(
 *   id = "ingredient",
 *   label = @Translation("Ingredient"),
 *   base_table = "ingredient",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\Core\Entity\EntityListBuilder",
 *     "access" = "Drupal\Core\Entity\EntityAccessControlHandler",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "storage" = "Drupal\Core\Entity\Sql\SqlContentEntityStorage",
 *     "storage_schema" = "Drupal\Core\Entity\Sql\SqlContentEntityStorageSchema",
 *     "translation" = "Drupal\content_translation\ContentTranslationHandler",
 *     "form" = {
 *       "default" = "Drupal\Core\Entity\ContentEntityForm",
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *       },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *      }
 *   },
 * )
 */

class Ingredient extends ContentEntityBase implements ContentEntityInterface {

    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
      
        // Standard field, used as unique if primary index.
        $fields['id'] = BaseFieldDefinition::create('integer')
          ->setLabel(t('ID'))
          ->setDescription(t('The ID of the Ingredient entity.'))
          ->setReadOnly(TRUE);
    
        // Standard field, unique outside of the scope of the current project.
        $fields['uuid'] = BaseFieldDefinition::create('uuid')
          ->setLabel(t('UUID'))
          ->setDescription(t('The UUID of the Ingredient entity.'))
          ->setReadOnly(TRUE);

        // Standard field.
        $fields['name'] = BaseFieldDefinition::create('string')
          ->setLabel(t('Name'))
          ->setDescription(t('The Name of the Ingredient entity.'))
          ->setRequired(TRUE);

        $fields['uid'] = BaseFieldDefinition::create('entity_reference')
          ->setLabel(t('User ID'))
          ->setDescription(t('The user ID of the node author.'))
          ->setSettings(array(
            'target_type' => 'user',
            'default_value' => 0,
          ));
        
        $fields['created'] = BaseFieldDefinition::create('created')
          ->setLabel(t('Created'))
          ->setDescription(t('The time that the entity was created.'));
    
        $fields['changed'] = BaseFieldDefinition::create('changed')
          ->setLabel(t('Changed'))
          ->setDescription(t('The time that the entity was last edited.'));

        return $fields;
    }
}