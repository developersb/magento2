<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Analytics\Model\Connector\Http;

/**
 * Represents converter interface for http request and response body.
<<<<<<< HEAD
=======
 *
 * @api
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
 */
interface ConverterInterface
{
    /**
     * @param string $body
     *
     * @return array
     */
    public function fromBody($body);

    /**
     * @param array $data
     *
     * @return string
     */
    public function toBody(array $data);

    /**
     * @return string
     */
    public function getContentTypeHeader();
<<<<<<< HEAD
=======

    /**
     * @return string
     */
    public function getContentMediaType(): string;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
}
