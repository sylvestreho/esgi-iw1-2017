<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class BlogPostController extends AbstractRestfulController
{
  protected $blogService;

  public function __construct($blogService)
  {
    $this->blogService = $blogService;
  }

  public function create($data)
  {
    return new JsonModel();
  }

  public function get($id)
  {
    $post = $this->blogService->findById($id);

    $result = $this->postToArray($post);

    return new JsonModel($result);
  }

  public function getList()
  {
    $posts = $this->blogService->fetchAll();
    $results = [];
    foreach ($posts as $post) {
      $results[] = $this->postToArray($post);
    }

    return new JsonModel($results);
  }

  public function delete($id)
  {

  }

  public function update($id, $data)
  {

  }

  public function patch($id, $data)
  {

  }

  protected function postToArray($post)
  {
    return [
      'id' => $post->getId(),
      'title' => $post->getTitle(),
      'slug'  => $post->getSlug(),
      'content' => $post->getContent(),
      'created' => $post->getCreated(),
      'category' => $post->getCategory()->getName()
    ];
  }
}
