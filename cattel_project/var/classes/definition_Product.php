<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - sku [input]
 * - name [textarea]
 * - brand [input]
 * - brandCattel [input]
 * - origin [input]
 * - webTitle [textarea]
 * - webDescription [textarea]
 * - availableInEcommerce [booleanSelect]
 * - image [image]
 * - gallery [imageGallery]
 * - shopifyCollection [input]
 * - attributesJGalileo [input]
 * - attributes [multiselect]
 * - buyerType [multiselect]
 * - sector [manyToManyObjectRelation]
 * - family [manyToManyObjectRelation]
 * - subFamily [manyToManyObjectRelation]
 * - shelfLife [input]
 * - unityOfMeasure [select]
 * - localizedfields [localizedfields]
 * -- useAdvice [textarea]
 * -- labelIngredients [textarea]
 * -- productSizes [textarea]
 * - seasoning [input]
 * - meatCutType [input]
 * - meatAnimal [input]
 * - fishCleanOrDirty [select]
 * - edibleCrust [select]
 * - alcoholContent [numeric]
 * - labelUseMode [multiselect]
 * - preservationMode [select]
 * - itemsInPackage [numeric]
 * - packageType [select]
 * - sellingUnit [numeric]
 * - unitWeight [numeric]
 * - productDrainedWeight [numeric]
 * - productSizesJGalileo [textarea]
 * - productDiameter [quantityValue]
 * - productCaliber [quantityValue]
 * - productThickness [quantityValue]
 * - allergensCereal [select]
 * - allergensCrustaceans [select]
 * - allergensEggs [select]
 * - allergensFish [select]
 * - allergensPeanuts [select]
 * - allergensSoybeans [select]
 * - allergensMilkDiary [select]
 * - allergensNuts [select]
 * - allergensCelery [select]
 * - allergensMustard [select]
 * - allergensSesame [select]
 * - allergensSulphur [select]
 * - allergensLupins [select]
 * - allergensMolluscs [select]
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

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'PDC',
   'name' => 'Product',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1667382195,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => false,
   'showVariants' => false,
   'fieldDefinitions' => 
  array (
  ),
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => 'pimcore_root',
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Layout',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Main Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Dati principali',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'name' => 'Basic Info',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Informazioni principali',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'sku',
                     'title' => 'Codice',
                     'tooltip' => 'JGalileo',
                     'mandatory' => true,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'name',
                     'title' => 'Nome',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'textarea',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'brand',
                     'title' => 'Marchio Fornitore',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'brandCattel',
                     'title' => 'Marchio Interno',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'origin',
                     'title' => 'Provenienza',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'webTitle',
                     'title' => 'Nome per il web',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'textarea',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'webDescription',
                     'title' => 'Descrizione per il web',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'textarea',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                  7 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                     'name' => 'availableInEcommerce',
                     'title' => 'Pubblicato su sito',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'booleanSelect',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'yesLabel' => 'Yes',
                     'noLabel' => 'No',
                     'emptyLabel' => 'Empty',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Empty',
                        'value' => 0,
                      ),
                      1 => 
                      array (
                        'key' => 'Yes',
                        'value' => 1,
                      ),
                      2 => 
                      array (
                        'key' => 'No',
                        'value' => -1,
                      ),
                    ),
                     'width' => '',
                  )),
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                     'name' => 'image',
                     'title' => 'Immagine principale',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'image',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'uploadPath' => '',
                  )),
                  9 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                     'name' => 'gallery',
                     'title' => 'Altre Immagini',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'imageGallery',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'uploadPath' => '',
                     'ratioX' => NULL,
                     'ratioY' => NULL,
                     'predefinedDataTemplates' => '',
                  )),
                  10 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'shopifyCollection',
                     'title' => 'Collezione su Shopify',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  11 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'attributesJGalileo',
                     'title' => 'Attributi JGalileo',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  12 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'attributes',
                     'title' => 'Attributi',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'multiselect',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Bio',
                        'value' => ' Bio ',
                      ),
                      1 => 
                      array (
                        'key' => 'Vegano',
                        'value' => ' Vegano',
                      ),
                      2 => 
                      array (
                        'key' => 'Vegetariano',
                        'value' => ' Vegetariano',
                      ),
                      3 => 
                      array (
                        'key' => 'Kosher',
                        'value' => ' Kosher',
                      ),
                      4 => 
                      array (
                        'key' => 'No glutine',
                        'value' => ' No glutine',
                      ),
                      5 => 
                      array (
                        'key' => 'No lattosio',
                        'value' => ' No lattosio  ',
                      ),
                      6 => 
                      array (
                        'key' => 'Halal',
                        'value' => ' Halal',
                      ),
                    ),
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'list',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'dynamicOptions' => false,
                  )),
                  13 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'buyerType',
                     'title' => 'Canali di vendita',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'multiselect',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Bar',
                        'value' => 'Bar',
                      ),
                      1 => 
                      array (
                        'key' => 'Ristorante',
                        'value' => 'Ristorante',
                      ),
                      2 => 
                      array (
                        'key' => 'Pizzeria',
                        'value' => 'Pizzeria',
                      ),
                    ),
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'list',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'dynamicOptions' => false,
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 0,
                 'labelAlign' => 'left',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Relations',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Relazioni',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'name' => 'Relations',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Relazioni',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                     'name' => 'sector',
                     'title' => 'Settore',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'manyToManyObjectRelation',
                     'relationType' => true,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'Sector',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'width' => '',
                     'height' => '',
                     'maxItems' => 1,
                     'visibleFields' => 'id,title,code',
                     'allowToCreateNewObject' => false,
                     'optimizedAdminLoading' => false,
                     'enableTextSelection' => false,
                     'visibleFieldDefinitions' => 
                    array (
                    ),
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                     'name' => 'family',
                     'title' => 'Famiglia',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'manyToManyObjectRelation',
                     'relationType' => true,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'Family',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'width' => '',
                     'height' => '',
                     'maxItems' => 1,
                     'visibleFields' => 'id,title,code',
                     'allowToCreateNewObject' => false,
                     'optimizedAdminLoading' => false,
                     'enableTextSelection' => false,
                     'visibleFieldDefinitions' => 
                    array (
                    ),
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                     'name' => 'subFamily',
                     'title' => 'SottoFamiglia',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'manyToManyObjectRelation',
                     'relationType' => true,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'SubFamily',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'width' => '',
                     'height' => '',
                     'maxItems' => 1,
                     'visibleFields' => 'id,title,code',
                     'allowToCreateNewObject' => false,
                     'optimizedAdminLoading' => false,
                     'enableTextSelection' => false,
                     'visibleFieldDefinitions' => 
                    array (
                    ),
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 0,
                 'labelAlign' => 'left',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Properties',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Proprietà',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'name' => 'Uses',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Usi e proprietà',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'shelfLife',
                     'title' => 'Shelf Life',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'unityOfMeasure',
                     'title' => 'Unità di misura',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'select',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Kg',
                        'value' => 'Kg',
                      ),
                      1 => 
                      array (
                        'key' => 'g',
                        'value' => 'g',
                      ),
                    ),
                     'width' => '',
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                     'name' => 'localizedfields',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => NULL,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'localizedfields',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => true,
                     'visibleSearch' => true,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'useAdvice',
                         'title' => 'Consigli d\'utilizzo',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'fieldtype' => 'textarea',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'width' => '',
                         'height' => '',
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                      )),
                    ),
                     'region' => NULL,
                     'layout' => NULL,
                     'width' => '',
                     'height' => '',
                     'maxTabs' => NULL,
                     'border' => false,
                     'provideSplitView' => false,
                     'tabPosition' => NULL,
                     'hideLabelsWhenTabsReached' => NULL,
                     'referencedFields' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                         'name' => 'localizedfields',
                         'title' => '',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => NULL,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'fieldtype' => 'localizedfields',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => true,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'name' => 'labelIngredients',
                             'title' => 'Ingredienti',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'fieldtype' => 'textarea',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'width' => '',
                             'height' => '',
                             'maxLength' => NULL,
                             'showCharCount' => false,
                             'excludeFromSearchIndex' => false,
                          )),
                        ),
                         'region' => NULL,
                         'layout' => NULL,
                         'width' => '',
                         'height' => '',
                         'maxTabs' => NULL,
                         'border' => false,
                         'provideSplitView' => false,
                         'tabPosition' => NULL,
                         'hideLabelsWhenTabsReached' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'fieldDefinitionsCache' => NULL,
                         'permissionView' => NULL,
                         'permissionEdit' => NULL,
                         'labelWidth' => 0,
                         'labelAlign' => 'left',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                         'name' => 'localizedfields',
                         'title' => '',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => NULL,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'fieldtype' => 'localizedfields',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => true,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'name' => 'productSizes',
                             'title' => 'Dimensioni / calibro',
                             'tooltip' => 'JGalileo',
                             'mandatory' => false,
                             'noteditable' => true,
                             'index' => false,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'fieldtype' => 'textarea',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'width' => '',
                             'height' => '',
                             'maxLength' => NULL,
                             'showCharCount' => false,
                             'excludeFromSearchIndex' => false,
                          )),
                        ),
                         'region' => NULL,
                         'layout' => NULL,
                         'width' => '',
                         'height' => '',
                         'maxTabs' => NULL,
                         'border' => false,
                         'provideSplitView' => false,
                         'tabPosition' => NULL,
                         'hideLabelsWhenTabsReached' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'fieldDefinitionsCache' => NULL,
                         'permissionView' => NULL,
                         'permissionEdit' => NULL,
                         'labelWidth' => 0,
                         'labelAlign' => 'left',
                      )),
                    ),
                     'fieldDefinitionsCache' => NULL,
                     'permissionView' => NULL,
                     'permissionEdit' => NULL,
                     'labelWidth' => 0,
                     'labelAlign' => 'left',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'seasoning',
                     'title' => 'Stagionatura media',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'meatCutType',
                     'title' => 'Tipo di taglio',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'meatAnimal',
                     'title' => 'Tipo animale',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'input',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'defaultValueGenerator' => '',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'fishCleanOrDirty',
                     'title' => 'Pulito o Sporco ',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'select',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  7 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'edibleCrust',
                     'title' => 'Crosta edibile / budello edibile',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'select',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
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
                        'key' => 'unknown',
                        'value' => 'unknown',
                      ),
                    ),
                     'width' => '',
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                  )),
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'alcoholContent',
                     'title' => 'Grado effettivo',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'numeric',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => false,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => NULL,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 0,
                 'labelAlign' => 'left',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Dimensions',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Dimensioni e Peso',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                 'name' => 'localizedfields',
                 'title' => '',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => NULL,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'localizedfields',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'labelIngredients',
                     'title' => 'Ingredienti',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'textarea',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                ),
                 'region' => NULL,
                 'layout' => NULL,
                 'width' => '',
                 'height' => '',
                 'maxTabs' => NULL,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
                array (
                ),
                 'fieldDefinitionsCache' => NULL,
                 'permissionView' => NULL,
                 'permissionEdit' => NULL,
                 'labelWidth' => 0,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                 'name' => 'labelUseMode',
                 'title' => 'Modalità d\'uso',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'multiselect',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'options' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
                 'maxItems' => '',
                 'renderType' => 'list',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'dynamicOptions' => false,
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'preservationMode',
                 'title' => 'Modalità di conservazione',
                 'tooltip' => 'JGalileo',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'Fresco',
                    'value' => 'Fresco',
                  ),
                  1 => 
                  array (
                    'key' => 'Gelo',
                    'value' => 'Gelo',
                  ),
                  2 => 
                  array (
                    'key' => 'Ambiente',
                    'value' => 'Ambiente',
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'itemsInPackage',
                 'title' => 'Composizione Cartone',
                 'tooltip' => 'JGalileo',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'numeric',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'defaultValueGenerator' => '',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'packageType',
                 'title' => 'Tipo di confezione',
                 'tooltip' => 'JGalileo',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'Sottovuoto',
                    'value' => 'Sottovuoto',
                  ),
                  1 => 
                  array (
                    'key' => 'Atm',
                    'value' => 'Atm',
                  ),
                  2 => 
                  array (
                    'key' => 'Bag in box',
                    'value' => 'Bag in box',
                  ),
                  3 => 
                  array (
                    'key' => 'Busta',
                    'value' => 'Busta',
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'sellingUnit',
                 'title' => 'Unità di vendita',
                 'tooltip' => 'JGalileo',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'numeric',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'defaultValueGenerator' => '',
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'unitWeight',
                 'title' => 'Peso netto',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'numeric',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'defaultValueGenerator' => '',
              )),
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'productDrainedWeight',
                 'title' => 'Peso sgocciolato',
                 'tooltip' => 'JGalileo',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'numeric',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'defaultValueGenerator' => '',
              )),
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                 'name' => 'productSizesJGalileo',
                 'title' => 'Dimensioni (JGalileo)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'textarea',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
                 'maxLength' => NULL,
                 'showCharCount' => false,
                 'excludeFromSearchIndex' => false,
              )),
              9 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                 'name' => 'localizedfields',
                 'title' => '',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => NULL,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'localizedfields',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'productSizes',
                     'title' => 'Dimensioni / calibro',
                     'tooltip' => 'JGalileo',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'fieldtype' => 'textarea',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                  )),
                ),
                 'region' => NULL,
                 'layout' => NULL,
                 'width' => '',
                 'height' => '',
                 'maxTabs' => NULL,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
                array (
                ),
                 'fieldDefinitionsCache' => NULL,
                 'permissionView' => NULL,
                 'permissionEdit' => NULL,
                 'labelWidth' => 0,
                 'labelAlign' => 'left',
              )),
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'productDiameter',
                 'title' => 'Product Diameter',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'unitWidth' => '',
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => 'cm',
                ),
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
              )),
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'productCaliber',
                 'title' => 'Product Caliber',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'unitWidth' => '',
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => 'cm',
                ),
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
              )),
              12 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'productThickness',
                 'title' => 'Product Thickness',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'unitWidth' => '',
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => 'cm',
                ),
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Allergeni',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Allergeni',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensCereal',
                 'title' => 'Cereal and Glutens',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensCrustaceans',
                 'title' => 'Crustaceans',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensEggs',
                 'title' => 'Eggs',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensFish',
                 'title' => 'Fish',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensPeanuts',
                 'title' => 'Peanuts',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensSoybeans',
                 'title' => 'Soybeans',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensMilkDiary',
                 'title' => 'Milk and Diary',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensNuts',
                 'title' => 'Nuts',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensCelery',
                 'title' => 'Celery',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              9 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensMustard',
                 'title' => 'Mustard',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensSesame',
                 'title' => 'Sesame',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensSulphur',
                 'title' => 'Sulphur',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              12 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensLupins',
                 'title' => 'Lupins',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              13 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'allergensMolluscs',
                 'title' => 'Molluscs',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'fieldtype' => 'select',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Info nutrizionali',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Info nutrizionali',
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              9 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
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
                 'fieldtype' => 'quantityValue',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
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
                 'defaultValueGenerator' => '',
              )),
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
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
                 'fieldtype' => 'textarea',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
                 'maxLength' => NULL,
                 'showCharCount' => false,
                 'excludeFromSearchIndex' => false,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => NULL,
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/deployment.svg',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'generateTypeDeclarations' => true,
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'deletedDataComponents' => 
  array (
  ),
   'blockedVarsForExport' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
