<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Form\Add;
use Blog\InputFilter\AddPost;

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

    if ($this->request->isPost()) { // if form is submitted
      $form->setInputFilter(new AddPost());
      $data = $this->request->getPost(); // key value array
      $form->setData($data);
      if ($form->isValid()) {
        // @todo insert article into db
        return $this->redirect()->toRoute('blog_index');
      }
    }

    return new ViewModel($variables);
  }
}
