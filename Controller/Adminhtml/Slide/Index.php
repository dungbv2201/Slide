<?php
/**
 * Created by PhpStorm.
 * User: vandung
 * Date: 25/02/2019
 * Time: 16:42
 */

namespace Dungbv\Slide\Controller\Adminhtml\Slide;


use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Dungbv\Slide\Controller\Adminhtml\Banner
 */
class Index extends Action
{
    const ADMIN_RESOURCE = 'Dungbv_Slide::slide_index';
    /**
     * @var $pageFactory \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;

    /**
     * Index constructor.
     * @param Action\Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Action\Context $context,PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $this->_setActiveMenu('Dungbv_Slide::slide_list');
        $resultPage->getConfig()->getTitle()->prepend(__('List all banner'));
        return $resultPage;
    }
}