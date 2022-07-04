<?php

/**
 * Fields Summary:
 * - nutritionalEnergeticValue [quantityValue]
 * - nutritionalOtherEnergeticValue [quantityValue]
 * - nutritionalFats [quantityValue]
 * - nutritionalSaturatedFats [quantityValue]
 * - nutritionalCarbs [quantityValue]
 * - nutritionalSugars [quantityValue]
 * - nutritionalProteins [quantityValue]
 * - nutritionalSalt [quantityValue]
 * - nutritionalFibers [quantityValue]
 * - nutritionalCalcium [quantityValue]
 * - nutritionalPhoshorus [quantityValue]
 * - nutritionalOtherInfo [textarea]
 */

return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'nutritionalInfo',
    ),
  ),
   'dao' => NULL,
   'key' => 'nutritionalInfo',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Nutritional Info',
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => NULL,
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'KiloJoule',
             'validUnits' => 
            array (
              0 => 'KiloJoule',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalEnergeticValue',
             'title' => 'Energy KJ',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'Kilocalories',
             'validUnits' => 
            array (
              0 => 'Kilocalories',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalOtherEnergeticValue',
             'title' => 'Energy Kcal',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalFats',
             'title' => 'Fats',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalSaturatedFats',
             'title' => 'Saturated Fats',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalCarbs',
             'title' => 'Carbs',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalSugars',
             'title' => 'Sugars',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          6 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalProteins',
             'title' => 'Proteins',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          7 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalSalt',
             'title' => 'Salt',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          8 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalFibers',
             'title' => 'Fibers',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          9 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalCalcium',
             'title' => 'Calcium',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          10 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => '',
             'unitWidth' => '',
             'defaultValue' => NULL,
             'defaultUnit' => 'g100g',
             'validUnits' => 
            array (
              0 => 'g100g',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'name' => 'nutritionalPhoshorus',
             'title' => 'Phoshorus',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          11 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
             'fieldtype' => 'textarea',
             'width' => '',
             'height' => '',
             'maxLength' => NULL,
             'showCharCount' => false,
             'excludeFromSearchIndex' => false,
             'name' => 'nutritionalOtherInfo',
             'title' => 'Other Info',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
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
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'icon' => '',
         'labelWidth' => 0,
         'labelAlign' => 'left',
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
