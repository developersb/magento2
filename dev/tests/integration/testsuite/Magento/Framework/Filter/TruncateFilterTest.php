<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Framework\Filter;

class TruncateFilterTest extends \PHPUnit\Framework\TestCase
{
    /**
<<<<<<< HEAD
     * @dataProvider truncateDataProvider
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @param string $expectedValue
     * @param string $expectedRemainder
     * @param string $string
     * @param int $length
     * @param string $etc
     * @param bool $breakWords
<<<<<<< HEAD
     * @return void
     */
    public function testFilter(
        string $expectedValue,
        string $expectedRemainder,
        string $string,
        int $length = 5,
        string $etc = '...',
        bool $breakWords = true
=======
     * @dataProvider truncateDataProvider
     */
    public function testFilter(
        $expectedValue,
        $expectedRemainder,
        $string,
        $length = 5,
        $etc = '...',
        $breakWords = true
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    ) {
        /** @var TruncateFilter $truncateFilter */
        $truncateFilter = \Magento\TestFramework\ObjectManager::getInstance()->create(
            TruncateFilter::class,
            [
                'length' => $length,
                'etc' => $etc,
                'breakWords' => $breakWords,
            ]
        );
        $result = $truncateFilter->filter($string);
        $this->assertEquals($expectedValue, $result->getValue());
        $this->assertEquals($expectedRemainder, $result->getRemainder());
    }

<<<<<<< HEAD
    /**
     * @return array
     */
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function truncateDataProvider() : array
    {
        return [
            '1' => [
                '12...',
                '34567890',
                '1234567890',
            ],
            '2' => [
                '123..',
                ' 456 789',
                '123 456 789',
                8,
                '..',
<<<<<<< HEAD
                false,
            ],
=======
                false
            ]
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        ];
    }
}
