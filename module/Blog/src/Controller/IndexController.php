<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Form\Add;

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

  public function addAction()
  {
    $form = new Add();
    
    $variables = [
      'form' => $form
    ];
    return new ViewModel($variables);
  }
}
