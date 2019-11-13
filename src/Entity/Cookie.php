<?php
namespace Drupal\cookies_telling\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;

/**
 * Defines the Cookie entity.
 *
 * @ingroup cookies_telling
 *
 * @ContentEntityType(
 *   id = "cookie",
 *   label = @Translation("Cookie"),
 *   base_table = "cookie",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\cookies_telling\Entity\Controller\CookieListBuilder",
 *    "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "default" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityConfirmFormBase",
 *     },
 *     "access" = "Drupal\Core\Entity\EntityAccessControlHandler",
 *     "route_provider" = {
 *        "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *    }
 *
 *   },
 *   links = {
 *     "canonical" = "/cookie/{cookie}",
 *     "add-page" = "/cookie/add",
 *     "edit-form" = "/cookie/{cookie}/edit",
 *     "delete-form" = "/cookie/{cookie}/delete",
 *     "collection" = "/cookie/list"
 *   },
 *  fieldable = TRUE,
 * )
 */

class Cookie extends ContentEntityBase implements ContentEntityInterface {

  use EntityChangedTrait;


    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
      
        // Standard field, used as unique if primary index.
        $fields['id'] = BaseFieldDefinition::create('integer')
          ->setLabel(t('ID'))
          ->setDescription(t('The ID of the Cookie entity.'))
          ->setReadOnly(TRUE);
    
        // Standard field, unique outside of the scope of the current project.
        $fields['uuid'] = BaseFieldDefinition::create('uuid')
          ->setLabel(t('UUID'))
          ->setDescription(t('The UUID of the Cookie entity.'))
          ->setReadOnly(TRUE);

        // Standard field.
        $fields['name'] = BaseFieldDefinition::create('string')
          ->setLabel(t('Name'))
          ->setDescription(t('The Name of the Cookie entity.'))
          ->setRevisionable(TRUE)
            ->setTranslatable(TRUE)
            ->setDisplayOptions('form', array(
            'type' => 'string_textfield',
            'settings' => array(
                'display_label' => TRUE,
            ),
            ))
            ->setDisplayOptions('view', array(
            'label' => 'hidden',
            'type' => 'string',
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE)
            ->setRequired(TRUE); 
            
        $fields['first_name'] = BaseFieldDefinition::create('string')
            ->setLabel(t('First Name'))
            ->setDescription(t('The first name of the Cookie entity.'))
            ->setSettings(array(
              'default_value' => '',
              'max_length' => 255,
              'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
              'label' => 'above',
              'type' => 'string',
              'weight' => -5,
            ))
            ->setDisplayOptions('form', array(
              'type' => 'string_textfield',
              'weight' => -5,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setRequired(TRUE)
            ->setDisplayConfigurable('view', TRUE);

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
        /*
        $fields['ingredients'] = BaseFieldDefinition::create('entity_reference')
          ->setLabel(t('My ingredients'))
          ->setDescription(t('All that make me so delightfull.'))
          ->setRevisionable(TRUE)
          ->setSetting('target_type', 'ingredient')
          ->setSetting('handler', 'default')
          ->setTranslatable(TRUE)
          ->setDisplayOptions('form', [
            'type' => 'entity_reference_autocomplete',
            'weight' => 5,
            'settings' => [
              'match_operator' => 'CONTAINS',
              'size' => '60',
              'autocomplete_type' => 'tags',
              'placeholder' => '',
            ],
          ])
          ->setDisplayConfigurable('form', TRUE)
          ->setRequired(TRUE)
          ->setCardinality(FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED);
            */
        return $fields;
      }
}