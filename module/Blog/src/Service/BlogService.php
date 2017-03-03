<?php

namespace Blog\Service;

use Blog\Entity\Post;

interface BlogService
{
  public function save(Post $post);

  public function fetchAll();

  public function fetch($page);

  public function find($categorySlug, $postSlug);

  public function findById($postId);

  public function update(Post $post);

  public function delete($postId);
}
