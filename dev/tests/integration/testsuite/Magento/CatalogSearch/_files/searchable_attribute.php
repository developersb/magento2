<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$eavSetupFactory = $objectManager->create(\Magento\Eav\Setup\EavSetupFactory::class);
/** @var \Magento\Eav\Setup\EavSetup $eavSetup */
$eavSetup = $eavSetupFactory->create();
$eavSetup->addAttribute(
    \Magento\Catalog\Model\Product::ENTITY,
    'test_searchable_attribute',
    [
        'label' => 'Test-attribute',
        'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
        'required' => 0,
        'user_defined' => 1,
        'searchable' => 1,
        'visible_on_front' => 1,
        'filterable_in_search' => 1,
        'used_in_product_listing' => 1,
        'is_used_in_grid' => 1,
        'is_filterable_in_grid' => 1,
    ]
);
