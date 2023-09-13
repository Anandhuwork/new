<?php
namespace Thecoachsmb\Mymodule\Block;

use \Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;



class Article extends Template
{
    protected $_storeManager;

    public function __construct(
        Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_storeManager = $storeManager;
    }

    public function getStoreInformation()
    {
        $stores = $this->_storeManager->getStores();

        $storeData = [];
        foreach ($stores as $store) {
            $storeData[] = [
                'Store ID' => $store->getId(),
                'Store Name' => $store->getName(),
                'Store Code' => $store->getCode(),
                'Store URL' => $store->getBaseUrl(),
            ];
        }

        return $storeData;
    }
}
?>