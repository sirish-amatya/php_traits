<?php

class BasePresenter
{
    protected $entity;
    public function __construct($entity)
    {
        $this->entity = $entity;
    }
}
