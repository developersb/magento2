<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Model\Indexer\Category\Product\Plugin;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;

class StoreView extends StoreGroup
{
    /**
     * Validate changes for invalidating indexer
     *
     * @param \Magento\Framework\Model\AbstractModel $store
     * @return bool
     */
    protected function validate(\Magento\Framework\Model\AbstractModel $store)
    {
        return $store->isObjectNew() || $store->dataHasChangedFor('group_id');
    }

    /**
     * Invalidate catalog_category_product indexer
     *
     * @param AbstractDb $subject
     * @param AbstractDb $objectResource
     * @param AbstractModel $store
     *
     * @return AbstractDb
     */
    public function afterSave(AbstractDb $subject, AbstractDb $objectResource, AbstractModel $store = null)
    {
        if ($store->isObjectNew()) {
            $this->tableMaintainer->createTablesForStore($store->getId());
        }

        return parent::afterSave($subject, $objectResource);
    }

    /**
     * Delete catalog_category_product indexer table for deleted store
     *
     * @param AbstractDb $subject
     * @param AbstractDb $objectResource
     * @param AbstractModel $store
     *
     * @return AbstractDb
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterDelete(AbstractDb $subject, AbstractDb $objectResource, AbstractModel $store)
    {
<<<<<<< HEAD
        $this->tableMaintainer->dropTablesForStore($store->getId());
=======
        $this->tableMaintainer->dropTablesForStore((int)$store->getId());
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        return $objectResource;
    }
}
