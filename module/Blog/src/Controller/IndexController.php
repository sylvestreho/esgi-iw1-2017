<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\Response;
use Blog\Form\Add;
use Blog\Form\Edit;
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
    $paginator = $this->blogService->fetch($this->params()->fromRoute('page'));
    return new ViewModel(['paginator' => $paginator]);
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

  public function editAction()
  {
    $form = new Edit();
    $variables = [ 'form' => $form ];

    // form has been submitted
    if ($this->request->isPost()) {
        $blogPost = new Post();
        $form->bind($blogPost);
        $form->setInputFilter(new AddPost());
        $data = $this->request->getPost();
        $form->setData($data); // key value array
    } else { // viewing data
      $post = $this->blogService->findById($this->params()->fromRoute('postId'));

      if (is_null($post)) {
        $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
      } else {
        $form->bind($post);
        $form->get('slug')->setValue($post->getSlug());
        $form->get('id')->setValue($post->getId());
        $form->get('category_id')->setValue($post->getCategory()->getId());
      }
    }

    return new ViewModel($variables);
  }

  public function viewPostAction()
  {
    $post = $this->blogService->find(
      $this->params()->fromRoute('categorySlug'),
      $this->params()->fromRoute('postSlug')
    );

    if (is_null($post)) {
      $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
    }

    return new ViewModel(['post' => $post]);
  }

  public function deleteAction()
  {

  }
}
