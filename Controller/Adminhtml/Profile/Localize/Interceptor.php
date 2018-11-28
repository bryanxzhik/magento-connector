<?php
namespace SmartCat\Connector\Magento\Controller\Adminhtml\Profile\Localize;

/**
 * Interceptor class for @see \SmartCat\Connector\Magento\Controller\Adminhtml\Profile\Localize
 */
class Interceptor extends \SmartCat\Connector\Magento\Controller\Adminhtml\Profile\Localize implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

<<<<<<< HEAD
    public function __construct(\Magento\Backend\App\Action\Context $context, \SmartCat\Connector\Magento\Service\ProjectService $senderService, \SmartCat\Connector\Magento\Api\ProfileRepositoryInterface $profileRepository = null, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository = null)
=======
    public function __construct(\Magento\Backend\App\Action\Context $context, \SmartCat\Connector\Service\SenderService $senderService, \SmartCat\Connector\Api\ProfileRepositoryInterface $profileRepository = null, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository = null)
>>>>>>> parent of 06302bf... Refactoring
    {
        $this->___init();
        parent::__construct($context, $senderService, $profileRepository, $productRepository);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
