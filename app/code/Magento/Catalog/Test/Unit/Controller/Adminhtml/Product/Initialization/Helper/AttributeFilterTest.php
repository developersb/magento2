<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Unit\Controller\Adminhtml\Product\Initialization\Helper;

use Magento\Catalog\Controller\Adminhtml\Product\Initialization\Helper\AttributeFilter;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
<<<<<<< HEAD
use PHPUnit_Framework_MockObject_MockObject;
=======
use PHPUnit_Framework_MockObject_MockObject as MockObject;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

class AttributeFilterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var AttributeFilter
     */
    protected $model;

    /**
<<<<<<< HEAD
     * @var PHPUnit_Framework_MockObject_MockObject
=======
     * @var MockObject
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     */
    protected $objectManagerMock;

    /**
<<<<<<< HEAD
     * @var Product|PHPUnit_Framework_MockObject_MockObject
=======
     * @var Product|MockObject
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     */
    protected $productMock;

    protected function setUp()
    {
        $objectHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->model = $objectHelper->getObject(AttributeFilter::class);
    }

    /**
     * @param array $requestProductData
     * @param array $useDefaults
     * @param array $expectedProductData
     * @param array $initialProductData
     * @dataProvider setupInputDataProvider
     */
    public function testPrepareProductAttributes(
        $requestProductData,
        $useDefaults,
        $expectedProductData,
        $initialProductData
    ) {
<<<<<<< HEAD
        /** @var PHPUnit_Framework_MockObject_MockObject | Product $productMockMap */
=======
        /** @var MockObject | Product $productMockMap */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $productMockMap = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->setMethods(['getData', 'getAttributes'])
            ->getMock();

        if (!empty($initialProductData)) {
            $productMockMap->expects($this->any())->method('getData')->willReturnMap($initialProductData);
        }

        if ($useDefaults) {
            $productMockMap
                ->expects($this->once())
                ->method('getAttributes')
                ->willReturn(
                    $this->getProductAttributesMock($useDefaults)
                );
        }

        $actualProductData = $this->model->prepareProductAttributes($productMockMap, $requestProductData, $useDefaults);
        $this->assertEquals($expectedProductData, $actualProductData);
    }

    /**
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function setupInputDataProvider()
    {
        return [
            'create_new_product' => [
                'productData' => [
                    'name' => 'testName',
                    'sku' => 'testSku',
                    'price' => '100',
                    'description' => '',
                ],
                'useDefaults' => [],
                'expectedProductData' => [
                    'name' => 'testName',
                    'sku' => 'testSku',
                    'price' => '100',
                ],
                'initialProductData' => [],
            ],
            'update_product_without_use_defaults' => [
                'productData' => [
                    'name' => 'testName2',
                    'sku' => 'testSku2',
                    'price' => '101',
                    'description' => '',
                    'special_price' => null,
                ],
                'useDefaults' => [],
                'expectedProductData' => [
                    'name' => 'testName2',
                    'sku' => 'testSku2',
                    'price' => '101',
                    'special_price' => null,
                ],
                'initialProductData' => [
                    ['name', 'testName2'],
                    ['sku', 'testSku2'],
                    ['price', '101'],
                    ['special_price', null],
                ],
            ],
            'update_product_without_use_defaults_2' => [
                'productData' => [
                    'name' => 'testName2',
                    'sku' => 'testSku2',
                    'price' => '101',
                    'description' => 'updated description',
                    'special_price' => null,
                ],
                'useDefaults' => [],
                'expectedProductData' => [
                    'name' => 'testName2',
                    'sku' => 'testSku2',
                    'price' => '101',
                    'description' => 'updated description',
                    'special_price' => null,
                ],
                'initialProductData' => [
                    ['name', 'testName2'],
                    ['sku', 'testSku2'],
                    ['price', '101'],
                    ['special_price', null],
                ],
            ],
            'update_product_with_use_defaults' => [
                'productData' => [
                    'name' => 'testName2',
                    'sku' => 'testSku2',
                    'price' => '101',
                    'description' => '',
                    'special_price' => null,
                ],
                'useDefaults' => [
                    'description' => '0',
                ],
                'expectedProductData' => [
                    'name' => 'testName2',
                    'sku' => 'testSku2',
                    'price' => '101',
                    'special_price' => null,
                    'description' => '',
                ],
                'initialProductData' => [
                    ['name', 'testName2'],
                    ['sku', 'testSku2'],
                    ['price', '101'],
                    ['special_price', null],
                    ['description', 'descr text'],
                ],
            ],
            'update_product_with_use_defaults_2' => [
                'requestProductData' => [
                    'name' => 'testName3',
                    'sku' => 'testSku3',
                    'price' => '103',
                    'description' => 'descr modified',
                    'special_price' => '100',
                ],
                'useDefaults' => [
                    'description' => '0',
                ],
                'expectedProductData' => [
                    'name' => 'testName3',
                    'sku' => 'testSku3',
                    'price' => '103',
                    'special_price' => '100',
                    'description' => 'descr modified',
                ],
                'initialProductData' => [
                    ['name', null, 'testName2'],
                    ['sku', null, 'testSku2'],
                    ['price', null, '101'],
                    ['description', null, 'descr text'],
                ],
            ],
            'update_product_with_use_defaults_3' => [
                'requestProductData' => [
                    'name' => 'testName3',
                    'sku' => 'testSku3',
                    'price' => '103',
                    'special_price' => '100',
                    'description' => 'descr modified',
                ],
                'useDefaults' => [
                    'description' => '1',
                ],
                'expectedProductData' => [
                    'name' => 'testName3',
                    'sku' => 'testSku3',
                    'price' => '103',
                    'special_price' => '100',
<<<<<<< HEAD
                    'description' => false
=======
                    'description' => false,
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                ],
                'initialProductData' => [
                    ['name', null, 'testName2'],
                    ['sku', null, 'testSku2'],
                    ['price', null, '101'],
                    ['description', null, 'descr text'],
                ],
            ],
        ];
    }

    /**
     * @param array $useDefaults
     * @return array
     */
    private function getProductAttributesMock(array $useDefaults): array
    {
        $returnArray = [];
        foreach ($useDefaults as $attributecode => $isDefault) {
            if ($isDefault === '1') {
<<<<<<< HEAD
                /** @var Attribute | PHPUnit_Framework_MockObject_MockObject $attribute */
=======
                /** @var Attribute | MockObject $attribute */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                $attribute = $this->getMockBuilder(Attribute::class)
                    ->disableOriginalConstructor()
                    ->getMock();
                $attribute->expects($this->any())
                    ->method('getBackendType')
                    ->willReturn('varchar');

                $returnArray[$attributecode] = $attribute;
            }
        }
        return $returnArray;
    }
}
