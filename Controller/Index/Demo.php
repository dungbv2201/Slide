<?php
/**
 * Created by PhpStorm.
 * User: vandung
 * Date: 25/02/2019
 * Time: 09:16
 */

namespace Dungbv\Slide\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\ObjectManagerInterface;


/**
 * Class Demo
 * @package Dungbv\Slide\Controller\Index
 */
class Demo extends Action
{
    protected $objectManager;
    protected $name;
    protected $demo;


    /**
     * Demo constructor.
     * @param Context $context
     * @param ObjectManagerInterface $objectManager
     * @param array $demo
     */
    public function __construct(Context $context, ObjectManagerInterface $objectManager,Index $index)
   {
       $this->demo = $index;
       $this->objectManager = $objectManager;
       parent::__construct($context);
   }


    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
   {

     echo $this->demo->helloWorld();
     exit;
   }
}