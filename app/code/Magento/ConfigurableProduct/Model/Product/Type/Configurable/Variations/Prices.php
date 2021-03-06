<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
namespace Magento\ConfigurableProduct\Model\Product\Type\Configurable\Variations;

/**
 * Configurable product variation prices.
 */
class Prices
{
    /**
     * @var \Magento\Framework\Locale\Format
     */
    private $localeFormat;

    /**
     * Prices constructor.
     * @param \Magento\Framework\Locale\Format $localeFormat
     */
    public function __construct(\Magento\Framework\Locale\Format $localeFormat)
    {
        $this->localeFormat = $localeFormat;
    }

    /**
     * Get product prices for configurable variations
     *
     * @param \Magento\Framework\Pricing\PriceInfo\Base $priceInfo
     * @return array
     */
    public function getFormattedPrices(\Magento\Framework\Pricing\PriceInfo\Base $priceInfo)
    {
        $regularPrice = $priceInfo->getPrice('regular_price');
        $finalPrice = $priceInfo->getPrice('final_price');

        return [
            'oldPrice' => [
                'amount' => $this->localeFormat->getNumber($regularPrice->getAmount()->getValue()),
            ],
            'basePrice' => [
                'amount' => $this->localeFormat->getNumber($finalPrice->getAmount()->getBaseAmount()),
            ],
            'finalPrice' => [
                'amount' => $this->localeFormat->getNumber($finalPrice->getAmount()->getValue()),
            ],
        ];
    }
}
