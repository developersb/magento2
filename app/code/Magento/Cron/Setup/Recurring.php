<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

namespace Magento\Cron\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Cron recurring setup
 */
class Recurring implements InstallSchemaInterface
{
    /**
     * @var \Magento\Cron\Model\ResourceModel\Schedule
     */
    private $schedule;

    /**
     * Recurring constructor.
     * @param \Magento\Cron\Model\ResourceModel\Schedule $schedule
     */
    public function __construct(
        \Magento\Cron\Model\ResourceModel\Schedule $schedule
    ) {
        $this->schedule = $schedule;
    }

    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $connection = $this->schedule->getConnection();
        $connection->update(
            $this->schedule->getMainTable(),
            [
                'status' => \Magento\Cron\Model\Schedule::STATUS_ERROR,
                'messages' => 'The job is terminated due to system upgrade'
            ],
            $connection->quoteInto('status = ?', \Magento\Cron\Model\Schedule::STATUS_RUNNING)
        );
    }
}
