<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\CustomerImportExport\Model\ResourceModel\Import\Address;

use Magento\Customer\Model\ResourceModel\Address\CollectionFactory as AddressCollectionFactory;
use Magento\Framework\DataObject;
use Magento\Framework\DB\Select;
use Magento\ImportExport\Model\Import\AbstractEntity;
use Magento\ImportExport\Model\ResourceModel\CollectionByPagesIterator as CollectionIterator;
use Magento\Customer\Model\ResourceModel\Address\Collection as AddressCollection;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Storage to check existing addresses.
 */
class Storage
{
    /**
     * IDs of addresses grouped by customer IDs.
     *
     * @var string[][]
     */
    private $addresses = [];

    /**
     * @var AddressCollectionFactory
     */
    private $addressCollectionFactory;

    /**
     * For iterating over large number of addresses.
     *
     * @var CollectionIterator
     */
    private $collectionIterator;

    /**
     * @var ScopeConfigInterface
     */
    private $config;

    /**
     * @param AddressCollectionFactory $addressCollectionFactory
     * @param CollectionIterator $byPagesIterator
     * @param ScopeConfigInterface $config
     */
    public function __construct(
        AddressCollectionFactory $addressCollectionFactory,
        CollectionIterator $byPagesIterator,
        ScopeConfigInterface $config
    ) {
        $this->addressCollectionFactory = $addressCollectionFactory;
        $this->collectionIterator = $byPagesIterator;
        $this->config = $config;
    }

    /**
     * Record existing address.
     *
     * @param string $customerId
     * @param string $addressId
     *
     * @return void
     */
<<<<<<< HEAD
    private function addRecord(string $customerId, string $addressId)
=======
    private function addRecord(string $customerId, string $addressId): void
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        if (!$customerId || !$addressId) {
            return;
        }
<<<<<<< HEAD
        $customerId = (string)$customerId;
        $addressId = (string)$addressId;
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        if (!array_key_exists($customerId, $this->addresses)) {
            $this->addresses[$customerId] = [];
        }

        if (!in_array($addressId, $this->addresses[$customerId], true)) {
            $this->addresses[$customerId][] = $addressId;
        }
    }

    /**
     * Load addresses IDs for given customers.
     *
     * @param string[] $customerIds
     *
     * @return void
     */
<<<<<<< HEAD
    private function loadAddresses(array $customerIds)
=======
    private function loadAddresses(array $customerIds): void
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        /** @var AddressCollection $collection */
        $collection = $this->addressCollectionFactory->create();
        $collection->removeAttributeToSelect();
        $select = $collection->getSelect();
        $tableId = array_keys($select->getPart(Select::FROM))[0];
        $select->where($tableId .'.parent_id in (?)', $customerIds);

        $this->collectionIterator->iterate(
            $collection,
            $this->config->getValue(AbstractEntity::XML_PATH_PAGE_SIZE),
            [
                function (DataObject $record) {
                    $this->addRecord($record->getParentId(), $record->getId());
                }
            ]
        );
    }

    /**
     * Check if given address exists for given customer.
     *
     * @param string $addressId
     * @param string $forCustomerId
     * @return bool
     */
    public function doesExist(string $addressId, string $forCustomerId): bool
    {
        return array_key_exists($forCustomerId, $this->addresses)
            && in_array(
<<<<<<< HEAD
                (string)$addressId,
=======
                $addressId,
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                $this->addresses[$forCustomerId],
                true
            );
    }

    /**
     * Pre-load addresses for given customers.
     *
     * @param string[] $forCustomersIds
     * @return void
     */
<<<<<<< HEAD
    public function prepareAddresses(array $forCustomersIds)
=======
    public function prepareAddresses(array $forCustomersIds): void
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        if (!$forCustomersIds) {
            return;
        }

        $forCustomersIds = array_unique($forCustomersIds);
        $customerIdsToUse = [];
        foreach ($forCustomersIds as $customerId) {
            if (!array_key_exists((string)$customerId, $this->addresses)) {
                $customerIdsToUse[] = $customerId;
            }
        }

        $this->loadAddresses($customerIdsToUse);
    }
}
