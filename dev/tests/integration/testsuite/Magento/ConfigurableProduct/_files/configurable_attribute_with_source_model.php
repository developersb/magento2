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

$eavSetup = $objectManager->create(\Magento\Eav\Setup\EavSetup::class);
$eavSetup->addAttribute(
    \Magento\Catalog\Model\Product::ENTITY,
    'test_configurable_with_sm',
    [
        'group' => 'General',
        'type' => 'varchar',
        'backend' => '',
        'frontend' => '',
        'label' => 'Test configurable with source model',
        'input' => 'select',
        'source' => \Magento\Catalog\Model\Category\Attribute\Source\Mode::class,
        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
        'visible' => true,
        'required' => false,
        'user_defined' => true,
        'default' => '',
        'searchable' => false,
        'filterable' => false,
        'comparable' => false,
        'visible_on_front' => false,
        'used_in_product_listing' => true,
        'unique' => false,
        'apply_to' => ''
    ]
);

$eavConfig = $objectManager->get(\Magento\Eav\Model\Config::class);
$eavConfig->clear();
