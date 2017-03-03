<?php

namespace Blog\Entity\Hydrator;

use Blog\Entity\Post;
use Zend\Hydrator\HydratorInterface;

class PostHydrator implements HydratorInterface
{
  public function extract($object)
  {
      if (!$object instanceof Post) {
        return [];
      }

      return [
        'id'      => $object->getId(),
        'title'   => $object->getTitle(),
        'slug'    => $object->getSlug(),
        'content' => $object->getContent(),
        'created' => $object->getCreated()
      ];
  }

  public function hydrate(array $data, $object)
  {
      if (!$object instanceof Post) {
        return $object;
      }

      $object->setId(isset($data['id']) ? intval($data['id']) : null);
      $object->setTitle(isset($data['title']) ? $data['title'] : null);
      $object->setSlug(isset($data['slug']) ? $data['slug'] : null);
      $object->setContent(isset($data['content']) ? $data['content'] : null);
      $object->setCreated(isset($data['created']) ? intval($data['created']) : null);

      return $object;
  }
}
