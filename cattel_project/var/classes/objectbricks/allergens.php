<?php

/**
 * Fields Summary:
 * - cerealSelect [select]
 * - crustaceans [select]
 */

return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'allergens',
    ),
  ),
   'dao' => NULL,
   'key' => 'allergens',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => '',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'name' => NULL,
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'children' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
         'fieldtype' => 'select',
         'options' => 
        array (
          0 => 
          array (
            'key' => 'Yes',
            'value' => 'Yes',
          ),
          1 => 
          array (
            'key' => 'No',
            'value' => 'No',
          ),
          2 => 
          array (
            'key' => 'Partially',
            'value' => 'Partially',
          ),
        ),
         'width' => '',
         'defaultValue' => '',
         'optionsProviderClass' => '',
         'optionsProviderData' => '',
         'columnLength' => 190,
         'dynamicOptions' => false,
         'name' => 'cerealSelect',
         'title' => 'Cereal and Glutens',
         'tooltip' => '',
         'mandatory' => false,
         'noteditable' => false,
         'index' => false,
         'locked' => NULL,
         'style' => '',
         'permissions' => NULL,
         'datatype' => 'data',
         'relationType' => false,
         'invisible' => false,
         'visibleGridView' => false,
         'visibleSearch' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'defaultValueGenerator' => '',
      )),
      1 => 
      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
         'fieldtype' => 'select',
         'options' => 
        array (
          0 => 
          array (
            'key' => 'Yes',
            'value' => 'Yes',
          ),
          1 => 
          array (
            'key' => 'No',
            'value' => 'No',
          ),
          2 => 
          array (
            'key' => 'Partially',
            'value' => 'Partially',
          ),
        ),
         'width' => '',
         'defaultValue' => '',
         'optionsProviderClass' => '',
         'optionsProviderData' => '',
         'columnLength' => 190,
         'dynamicOptions' => false,
         'name' => 'crustaceans',
         'title' => 'Crustaceans',
         'tooltip' => '',
         'mandatory' => false,
         'noteditable' => false,
         'index' => false,
         'locked' => NULL,
         'style' => '',
         'permissions' => NULL,
         'datatype' => 'data',
         'relationType' => false,
         'invisible' => false,
         'visibleGridView' => false,
         'visibleSearch' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'defaultValueGenerator' => '',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'generateTypeDeclarations' => true,
   'blockedVarsForExport' => 
  array (
  ),
));
