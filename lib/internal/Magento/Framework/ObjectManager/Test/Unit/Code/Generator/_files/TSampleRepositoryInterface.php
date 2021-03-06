<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\ObjectManager\Code\Generator;

interface TSampleRepositoryInterface
{
    /**
     * @param int $id
<<<<<<< HEAD
     *
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @return TSampleInterface
     */
    public function get(int $id) : \Magento\Framework\ObjectManager\Code\Generator\TSampleInterface;

    /**
     * @param TSampleInterface $entity
<<<<<<< HEAD
     *
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @return bool
     */
    public function delete(\Magento\Framework\ObjectManager\Code\Generator\TSampleInterface $entity) : bool;

    /**
     * @param TSampleInterface $entity
<<<<<<< HEAD
     *
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @return TSampleInterface
     */
    public function save(\Magento\Framework\ObjectManager\Code\Generator\TSampleInterface $entity)
        : \Magento\Framework\ObjectManager\Code\Generator\TSampleInterface;
}
