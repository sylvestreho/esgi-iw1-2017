<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Form\Add;
use Blog\InputFilter\AddPost;
use Blog\Entity\Post;

class IndexController extends AbstractActionController
{
  protected $blogService;

  public function __construct($blogService)
  {
      $this->blogService = $blogService;
  }

  public function indexAction()
  {
    $posts = $this->blogService->fetchAll();
    return new ViewModel(['posts' => $posts]);
  }

  public function addAction()
  {
    $form = new Add();

    $variables = [
      'form' => $form
    ];

    if ($this->request->isPost()) { // if form is submitted
      $blogPost = new Post();
      $form->bind($blogPost);

      $form->setInputFilter(new AddPost());
      $data = $this->request->getPost(); // key value array
      $form->setData($data);
      if ($form->isValid()) {
        $this->blogService->save($blogPost);
        // @todo insert article into db
        return $this->redirect()->toRoute('blog_index');
      }
    }

    return new ViewModel($variables);
  }
}
