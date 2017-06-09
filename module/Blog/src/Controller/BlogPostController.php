<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Blog\Entity\Post;
use Blog\Entity\Category;

class BlogPostController extends AbstractRestfulController
{
  protected $blogService;

  public function __construct($blogService)
  {
    $this->blogService = $blogService;
  }

  public function create($data)
  {
    $post = $this->setPost($data);

    $this->blogService->save($post);

    return new JsonModel(['success']);
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
    $this->blogService->delete($id);

    return new JsonModel(['success']);
  }

  public function update($id, $data)
  {
    $post = $this->setPost($data);
    $post->setId($id);

    $this->blogService->update($post);

    return new JsonModel(['success']);
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

  protected function setPost($data)
  {
    $post = new Post();
    $post->setTitle($data['title']);
    $post->setSlug($data['slug']);
    $post->setContent($data['content']);
    $post->setCreated(time());
    $category = new Category();
    $category->setId($data['category']);
    $post->setCategory($category);
    return $post;
  }
}
