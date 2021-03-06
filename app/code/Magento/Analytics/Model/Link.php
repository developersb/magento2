<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Analytics\Model;

use Magento\Analytics\Api\Data\LinkInterface;

/**
<<<<<<< HEAD
 * Class Link
 *
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
 * Represents link with collected data and initialized vector for decryption.
 */
class Link implements LinkInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $initializationVector;

    /**
<<<<<<< HEAD
     * Link constructor.
     *
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @param string $url
     * @param string $initializationVector
     */
    public function __construct($url, $initializationVector)
    {
        $this->url = $url;
        $this->initializationVector = $initializationVector;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getInitializationVector()
    {
        return $this->initializationVector;
    }
}
