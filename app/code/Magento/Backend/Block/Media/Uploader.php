<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Backend\Block\Media;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Serialize\Serializer\Json;
<<<<<<< HEAD
use Magento\Framework\Image\Adapter\ConfigInterface;
=======
use Magento\Framework\Image\Adapter\UploadConfigInterface;
use Magento\Backend\Model\Image\UploadResizeConfigInterface;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

/**
 * Adminhtml media library uploader
 * @api
 * @since 100.0.2
 */
class Uploader extends \Magento\Backend\Block\Widget
{
    /**
     * @var \Magento\Framework\DataObject
     */
    protected $_config;

    /**
     * @var string
     */
    protected $_template = 'Magento_Backend::media/uploader.phtml';

    /**
     * @var \Magento\Framework\File\Size
     */
    protected $_fileSizeService;

    /**
     * @var Json
     */
    private $jsonEncoder;

    /**
<<<<<<< HEAD
     * @var ConfigInterface
=======
     * @var UploadResizeConfigInterface
     */
    private $imageUploadConfig;

    /**
     * @var UploadConfigInterface
     * @deprecated
     * @see \Magento\Backend\Model\Image\UploadResizeConfigInterface
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     */
    private $imageConfig;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\File\Size $fileSize
     * @param array $data
     * @param Json $jsonEncoder
<<<<<<< HEAD
     * @param ConfigInterface $imageConfig
=======
     * @param UploadConfigInterface $imageConfig
     * @param UploadResizeConfigInterface $imageUploadConfig
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\File\Size $fileSize,
        array $data = [],
        Json $jsonEncoder = null,
<<<<<<< HEAD
        ConfigInterface $imageConfig = null
    ) {
        $this->_fileSizeService = $fileSize;
        $this->jsonEncoder = $jsonEncoder ?: ObjectManager::getInstance()->get(Json::class);
        $this->imageConfig = $imageConfig ?: ObjectManager::getInstance()->get(ConfigInterface::class);

=======
        UploadConfigInterface $imageConfig = null,
        UploadResizeConfigInterface $imageUploadConfig = null
    ) {
        $this->_fileSizeService = $fileSize;
        $this->jsonEncoder = $jsonEncoder ?: ObjectManager::getInstance()->get(Json::class);
        $this->imageConfig = $imageConfig
            ?: ObjectManager::getInstance()->get(UploadConfigInterface::class);
        $this->imageUploadConfig = $imageUploadConfig
            ?: ObjectManager::getInstance()->get(UploadResizeConfigInterface::class);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        parent::__construct($context, $data);
    }

    /**
     * Initialize block.
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->setId($this->getId() . '_Uploader');

        $uploadUrl = $this->_urlBuilder->addSessionParam()->getUrl('adminhtml/*/upload');
        $this->getConfig()->setUrl($uploadUrl);
        $this->getConfig()->setParams(['form_key' => $this->getFormKey()]);
        $this->getConfig()->setFileField('file');
        $this->getConfig()->setFilters(
            [
                'images' => [
                    'label' => __('Images (.gif, .jpg, .png)'),
                    'files' => ['*.gif', '*.jpg', '*.png'],
                ],
                'media' => [
                    'label' => __('Media (.avi, .flv, .swf)'),
                    'files' => ['*.avi', '*.flv', '*.swf'],
                ],
                'all' => ['label' => __('All Files'), 'files' => ['*.*']],
            ]
        );
    }

    /**
     * Get file size
     *
     * @return \Magento\Framework\File\Size
     */
    public function getFileSizeService()
    {
        return $this->_fileSizeService;
    }

    /**
<<<<<<< HEAD
     * Get Image Upload Maximum Width Config
=======
     * Get Image Upload Maximum Width Config.
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     *
     * @return int
     */
    public function getImageUploadMaxWidth()
    {
<<<<<<< HEAD
        return $this->imageConfig->getMaxWidth();
    }

    /**
     * Get Image Upload Maximum Height Config
=======
        return $this->imageUploadConfig->getMaxWidth();
    }

    /**
     * Get Image Upload Maximum Height Config.
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     *
     * @return int
     */
    public function getImageUploadMaxHeight()
    {
<<<<<<< HEAD
        return $this->imageConfig->getMaxHeight();
=======
        return $this->imageUploadConfig->getMaxHeight();
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    }

    /**
     * Prepares layout and set element renderer
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        $this->pageConfig->addPageAsset('jquery/fileUploader/css/jquery.fileupload-ui.css');
        return parent::_prepareLayout();
    }

    /**
     * Retrieve uploader js object name
     *
     * @return string
     */
    public function getJsObjectName()
    {
        return $this->getHtmlId() . 'JsObject';
    }

    /**
     * Retrieve config json
     *
     * @return string
     */
    public function getConfigJson()
    {
        return $this->jsonEncoder->encode($this->getConfig()->getData());
    }

    /**
     * Retrieve config object
     *
     * @return \Magento\Framework\DataObject
     */
    public function getConfig()
    {
        if (null === $this->_config) {
            $this->_config = new \Magento\Framework\DataObject();
        }

        return $this->_config;
    }

    /**
     * Retrieve full uploader SWF's file URL
     * Implemented to solve problem with cross domain SWFs
     * Now uploader can be only in the same URL where backend located
     *
     * @param string $url url to uploader in current theme
     * @return string full URL
     */
    public function getUploaderUrl($url)
    {
        return $this->_assetRepo->getUrl($url);
    }
}
