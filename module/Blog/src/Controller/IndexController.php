<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
  public function __construct()
  {
    
  }

  public function indexAction()
  {
    $variables = [];

    return new ViewModel();
  }
}
