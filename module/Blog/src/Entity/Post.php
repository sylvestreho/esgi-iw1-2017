<?php

namespace Blog\Entity;

class Post
{
    protected $id;

    protected $title;

    protected $slug;

    protected $content;

    protected $created;

    protected $category;

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getId()
    {
      return $this->id;
    }

    public function setTitle($title)
    {
      $this->title = $title;
    }

    public function getTitle()
    {
      return $this->title;
    }

    public function setSlug($slug)
    {
      $this->slug = $slug;
    }

    public function getSlug()
    {
      return $this->slug;
    }

    public function setContent($content)
    {
      $this->content = $content;
    }

    public function getContent()
    {
      return $this->content;
    }

    public function setCreated($created)
    {
      $this->created = $created;
    }

    public function getCreated()
    {
      return $this->created;
    }

    public function setCategory($category)
    {
      $this->category = $category;
    }

    public function getCategory()
    {
      return $this->category;
    }
}
