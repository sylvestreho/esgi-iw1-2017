<?php

namespace Blog\Repository;

use Blog\Repository\PostRepository;
use Zend\Db\Adapter\AdapterAwareTrait;
use Blog\Entity\Post;

class PostRepositoryImpl implements PostRepository
{
  use AdapterAwareTrait;

  public function save(Post $post)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $insert = $sql->insert()
        ->values([
            'title'         => $post->getTitle(),
            'slug'          => $post->getSlug(),
            'content'       => $post->getContent(),
            'category_id'   => $post->getCategory()->getId(),
            'created'       => time()
        ])
        ->into('post');

      $statement = $sql->prepareStatementForSqlObject($insert);
      $statement->execute();
  }

  public function fetchAll()
  {

  }

  public function fetch($page)
  {

  }

  public function find($categorySlug, $postSlug)
  {

  }

  public function findById($postId)
  {

  }

  public function update(Post $post)
  {

  }

  public function delete($postId)
  {

  }
}
