<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Framework;

use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Helper\CacheCleaner;
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;
=======
use PHPUnit_Framework_MockObject_MockObject as MockObject;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

/**
 * @magentoAppIsolation enabled
 * @magentoCache all disabled
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TranslateTest extends TestCase
{
    /**
     * @var \Magento\Framework\Translate
     */
    private $translate;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
<<<<<<< HEAD
        /** @var \Magento\Framework\View\FileSystem | PHPUnit_Framework_MockObject_MockObject $viewFileSystem */
=======
        /** @var \Magento\Framework\View\FileSystem|MockObject $viewFileSystem */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $viewFileSystem = $this->createPartialMock(
            \Magento\Framework\View\FileSystem::class,
            ['getLocaleFileName']
        );

        $viewFileSystem->expects($this->any())
            ->method('getLocaleFileName')
            ->will(
                $this->returnValue(
                    dirname(__DIR__) . '/Translation/Model/_files/Magento/design/Magento/theme/i18n/en_US.csv'
                )
            );

<<<<<<< HEAD
        /** @var \Magento\Framework\View\Design\ThemeInterface | PHPUnit_Framework_MockObject_MockObject $theme */
=======
        /** @var \Magento\Framework\View\Design\ThemeInterface|MockObject $theme */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $theme = $this->createMock(\Magento\Framework\View\Design\ThemeInterface::class);
        $theme->expects($this->any())->method('getThemePath')->will($this->returnValue('Magento/luma'));

        /** @var \Magento\TestFramework\ObjectManager $objectManager */
        $objectManager = Bootstrap::getObjectManager();
        $objectManager->addSharedInstance($viewFileSystem, \Magento\Framework\View\FileSystem::class);

        /** @var $moduleReader \Magento\Framework\Module\Dir\Reader */
        $moduleReader = $objectManager->get(\Magento\Framework\Module\Dir\Reader::class);
        $moduleReader->setModuleDir(
            'Magento_Store',
            'i18n',
            dirname(__DIR__) . '/Translation/Model/_files/Magento/Store/i18n'
        );
        $moduleReader->setModuleDir(
            'Magento_Catalog',
            'i18n',
            dirname(__DIR__) . '/Translation/Model/_files/Magento/Catalog/i18n'
        );

<<<<<<< HEAD
        /** @var \Magento\Theme\Model\View\Design | \PHPUnit_Framework_MockObject_MockObject $designModel */
=======
        /** @var \Magento\Theme\Model\View\Design|MockObject $designModel */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $designModel = $this->getMockBuilder(\Magento\Theme\Model\View\Design::class)
            ->setMethods(['getDesignTheme'])
            ->setConstructorArgs(
                [
                    $objectManager->get(\Magento\Store\Model\StoreManagerInterface::class),
                    $objectManager->get(\Magento\Framework\View\Design\Theme\FlyweightFactory::class),
                    $objectManager->get(\Magento\Framework\App\Config\ScopeConfigInterface::class),
                    $objectManager->get(\Magento\Theme\Model\ThemeFactory::class),
                    $objectManager->get(\Magento\Framework\ObjectManagerInterface::class),
                    $objectManager->get(\Magento\Framework\App\State::class),
                    ['frontend' => 'Test/default']
                ]
            )
            ->getMock();

        $designModel->expects($this->any())->method('getDesignTheme')->willReturn($theme);

        $objectManager->addSharedInstance($designModel, \Magento\Theme\Model\View\Design\Proxy::class);

        $this->translate = $objectManager->create(\Magento\Framework\Translate::class);
        $objectManager->addSharedInstance($this->translate, \Magento\Framework\Translate::class);
        $objectManager->removeSharedInstance(\Magento\Framework\Phrase\Renderer\Composite::class);
        $objectManager->removeSharedInstance(\Magento\Framework\Phrase\Renderer\Translate::class);
        \Magento\Framework\Phrase::setRenderer(
            $objectManager->get(\Magento\Framework\Phrase\RendererInterface::class)
        );
    }

    public function testLoadData()
    {
        $data = $this->translate->loadData(null, true)->getData();
        CacheCleaner::cleanAll();
        $this->translate->loadData()->getData();
        $dataCached = $this->translate->loadData()->getData();
        $this->assertEquals($data, $dataCached);
    }

    /**
     * @magentoCache all disabled
     * @dataProvider translateDataProvider
<<<<<<< HEAD
     * @param string $inputText
     * @param string $expectedTranslation
=======
     *
     * @param string $inputText
     * @param string $expectedTranslation
     * @return void
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @throws Exception\LocalizedException
     */
    public function testTranslate($inputText, $expectedTranslation)
    {
        $this->translate->loadData(\Magento\Framework\App\Area::AREA_FRONTEND);
        $actualTranslation = new \Magento\Framework\Phrase($inputText);
        $this->assertEquals($expectedTranslation, $actualTranslation);
    }

    /**
     * @return array
     */
    public function translateDataProvider()
    {
        return [
            ['', ''],
            [
                'Theme phrase will be translated',
                'Theme phrase is translated',
            ],
            [
                'Phrase in Magento_Store module that doesn\'t need translation',
                'Phrase in Magento_Store module that doesn\'t need translation',
            ],
            [
                'Phrase in Magento_Catalog module that doesn\'t need translation',
                'Phrase in Magento_Catalog module that doesn\'t need translation',
            ],
            [
<<<<<<< HEAD
                'Magento_Store module phrase will be override by theme translation',
                'Magento_Store module phrase is override by theme translation',
            ],
            [
                'Magento_Catalog module phrase will be override by theme translation',
                'Magento_Catalog module phrase is override by theme translation',
=======
                'Magento_Store module phrase will be overridden by theme translation',
                'Magento_Store module phrase is overridden by theme translation',
            ],
            [
                'Magento_Catalog module phrase will be overridden by theme translation',
                'Magento_Catalog module phrase is overridden by theme translation',
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ],
        ];
    }
}
