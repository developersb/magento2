<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Signifyd\Model\SignifydGateway\Debugger;

use Magento\Framework\ObjectManagerInterface;
use Magento\Signifyd\Model\Config;

/**
 * Factory produces debugger based on runtime configuration.
 *
 * Configuration may be changed by
 *  - config.xml
 *  - at Admin panel (Stores > Configuration > Sales > Fraud Detection > Signifyd > Debug)
 */
class DebuggerFactory
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var Config
     */
    private $config;

    /**
     * DebuggerFactory constructor.
     *
     * @param ObjectManagerInterface $objectManager
     * @param Config $config
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        Config $config
    ) {
        $this->objectManager = $objectManager;
        $this->config = $config;
    }

    /**
     * Create debugger instance
     *
     * @param int|null $storeId
     * @return DebuggerInterface
     */
<<<<<<< HEAD
    public function create($storeId = null)
=======
    public function create($storeId = null): DebuggerInterface
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        if (!$this->config->isDebugModeEnabled($storeId)) {
            return $this->objectManager->get(BlackHole::class);
        }

        return $this->objectManager->get(Log::class);
    }
}
