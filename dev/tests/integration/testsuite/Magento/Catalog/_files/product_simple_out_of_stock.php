<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
\Magento\TestFramework\Helper\Bootstrap::getInstance()->reinitialize();

/** @var \Magento\TestFramework\ObjectManager $objectManager */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\Catalog\Api\CategoryLinkManagementInterface $categoryLinkManagement */
$categoryLinkManagement = $objectManager->get(\Magento\Catalog\Api\CategoryLinkManagementInterface::class);

/** @var $product \Magento\Catalog\Model\Product */
$product = $objectManager->create(\Magento\Catalog\Model\Product::class);
$product->isObjectNew(true);
$product->setTypeId(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE)
<<<<<<< HEAD
    ->setId(1)
    ->setAttributeSetId(4)
=======
    ->setAttributeSetId($product->getDefaultAttributeSetId())
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    ->setWebsiteIds([1])
    ->setName('Simple Product')
    ->setSku('simple-out-of-stock')
    ->setPrice(10)
    ->setWeight(1)
    ->setShortDescription("Short description")
    ->setTaxClassId(0)
    ->setDescription('Description with <b>html tag</b>')
    ->setMetaTitle('meta title')
    ->setMetaKeyword('meta keyword')
    ->setMetaDescription('meta description')
    ->setVisibility(\Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH)
    ->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED)
    ->setStockData(
        [
            'use_config_manage_stock'   => 1,
            'qty'                       => 0,
            'is_qty_decimal'            => 0,
            'is_in_stock'               => 0,
        ]
<<<<<<< HEAD
    )->setCanSaveCustomOptions(true)
=======
    )
    ->setCanSaveCustomOptions(true)
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    ->setHasOptions(true);

/** @var \Magento\Catalog\Api\ProductRepositoryInterface $productRepositoryFactory */
$productRepository = $objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
$productRepository->save($product);

$categoryLinkManagement->assignProductToCategories(
    $product->getSku(),
    [2]
);
