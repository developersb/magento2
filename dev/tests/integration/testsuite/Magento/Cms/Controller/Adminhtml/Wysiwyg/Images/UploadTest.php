<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Cms\Controller\Adminhtml\Wysiwyg\Images;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * Test for \Magento\Cms\Controller\Adminhtml\Wysiwyg\Images\Upload class.
 */
class UploadTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Cms\Controller\Adminhtml\Wysiwyg\Images\Upload
     */
    private $model;

    /**
     * @var \Magento\Framework\Filesystem\Directory\WriteInterface
     */
    private $mediaDirectory;

    /**
     * @var string
     */
<<<<<<< HEAD
=======
    private $fullDirectoryPath;

    /**
     * @var string
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    private $fileName = 'magento_small_image.jpg';

    /**
     * @var \Magento\Framework\Filesystem
     */
    private $filesystem;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
<<<<<<< HEAD
        $this->filesystem = $this->objectManager->get(\Magento\Framework\Filesystem::class);
        $this->mediaDirectory = $this->filesystem->getDirectoryWrite(DirectoryList::MEDIA);
=======
        $directoryName = 'directory1';
        $this->filesystem = $this->objectManager->get(\Magento\Framework\Filesystem::class);
        /** @var \Magento\Cms\Helper\Wysiwyg\Images $imagesHelper */
        $imagesHelper = $this->objectManager->get(\Magento\Cms\Helper\Wysiwyg\Images::class);
        $this->mediaDirectory = $this->filesystem->getDirectoryWrite(DirectoryList::MEDIA);
        $this->fullDirectoryPath = $imagesHelper->getStorageRoot() . DIRECTORY_SEPARATOR . $directoryName;
        $this->mediaDirectory->create($this->mediaDirectory->getRelativePath($this->fullDirectoryPath));
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $this->model = $this->objectManager->get(\Magento\Cms\Controller\Adminhtml\Wysiwyg\Images\Upload::class);
        $fixtureDir = realpath(__DIR__ . '/../../../../../Catalog/_files');
        $tmpFile = $this->filesystem->getDirectoryRead(DirectoryList::PUB)->getAbsolutePath() . $this->fileName;
        copy($fixtureDir . DIRECTORY_SEPARATOR . $this->fileName, $tmpFile);
        $_FILES = [
            'image' => [
                'name' => $this->fileName,
                'type' => 'image/png',
                'tmp_name' => $tmpFile,
                'error' => 0,
                'size' => filesize($fixtureDir),
            ],
        ];
    }

    /**
     * Execute method with correct directory path and file name to check that file can be uploaded to the directory
     * located under WYSIWYG media.
     *
     * @return void
     * @magentoAppIsolation enabled
     */
    public function testExecute()
    {
<<<<<<< HEAD
        $directoryName = 'directory1';
        /** @var \Magento\Cms\Helper\Wysiwyg\Images $imagesHelper */
        $imagesHelper = $this->objectManager->get(\Magento\Cms\Helper\Wysiwyg\Images::class);
        $fullDirectoryPath = $imagesHelper->getStorageRoot() . DIRECTORY_SEPARATOR . $directoryName;
        $this->mediaDirectory->create($this->mediaDirectory->getRelativePath($fullDirectoryPath));

        $this->model->getRequest()->setParams(['type' => 'image/png']);
        $this->model->getStorage()->getSession()->setCurrentPath($fullDirectoryPath);
        $this->model->execute();
        $this->assertTrue(
            $this->mediaDirectory->isExist(
                $this->mediaDirectory->getRelativePath(
                    $fullDirectoryPath . DIRECTORY_SEPARATOR . $this->fileName
=======
        $this->model->getRequest()->setParams(['type' => 'image/png']);
        $this->model->getStorage()->getSession()->setCurrentPath($this->fullDirectoryPath);
        $this->model->execute();

        $this->assertTrue(
            $this->mediaDirectory->isExist(
                $this->mediaDirectory->getRelativePath(
                    $this->fullDirectoryPath . DIRECTORY_SEPARATOR . $this->fileName
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                )
            )
        );
    }

    /**
     * Execute method with correct directory path and file name to check that file can be uploaded to the directory
     * located under linked folder.
     *
     * @return void
     * @magentoDataFixture Magento/Cms/_files/linked_media.php
     */
    public function testExecuteWithLinkedMedia()
    {
        $directoryName = 'linked_media';
        $fullDirectoryPath = $this->filesystem->getDirectoryRead(DirectoryList::PUB)
                ->getAbsolutePath() . DIRECTORY_SEPARATOR . $directoryName;
        $wysiwygDir = $this->mediaDirectory->getAbsolutePath() . '/wysiwyg';
        $this->model->getRequest()->setParams(['type' => 'image/png']);
        $this->model->getStorage()->getSession()->setCurrentPath($wysiwygDir);
        $this->model->execute();
        $this->assertTrue(is_file($fullDirectoryPath . DIRECTORY_SEPARATOR . $this->fileName));
    }

    /**
<<<<<<< HEAD
=======
     * Execute method with traversal directory path to check that there is no ability to create file not
     * under media directory.
     *
     * @return void
     */
    public function testExecuteWithWrongPath()
    {
        $dirPath = '/../../../etc/';
        $this->model->getRequest()->setParams(['type' => 'image/png']);
        $this->model->getStorage()->getSession()->setCurrentPath($dirPath);
        $this->model->execute();

        $this->assertFileNotExists(
            $this->fullDirectoryPath . $dirPath . $this->fileName
        );
    }

    /**
     * Execute method with traversal file path to check that there is no ability to create file not
     * under media directory.
     *
     * @return void
     */
    public function testExecuteWithWrongFileName()
    {
        $newFilename = '/../../../../etc/new_file.png';
        $_FILES['image']['name'] = $newFilename;
        $_FILES['image']['tmp_name'] = __DIR__ . DIRECTORY_SEPARATOR . $this->fileName;
        $this->model->getRequest()->setParams(['type' => 'image/png']);
        $this->model->getStorage()->getSession()->setCurrentPath($this->fullDirectoryPath);
        $this->model->execute();

        $this->assertFileNotExists($this->fullDirectoryPath . $newFilename);
    }

    /**
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @inheritdoc
     */
    public static function tearDownAfterClass()
    {
        $filesystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Framework\Filesystem::class);
        /** @var \Magento\Framework\Filesystem\Directory\WriteInterface $directory */
        $directory = $filesystem->getDirectoryWrite(DirectoryList::MEDIA);
        if ($directory->isExist('wysiwyg')) {
            $directory->delete('wysiwyg');
        }
    }
}
