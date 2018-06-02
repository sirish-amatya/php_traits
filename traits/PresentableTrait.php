<?php

trait PresentableTrait {
    
    protected $instance;
    public function present()
    {
        if (is_null($this->presenter) || !class_exists($this->presenter)) {
            throw new Exception("Class does not exists or 'presenter' not defined!");
        }    

        if (!$this->instance) {
            $instance = new $this->presenter($this);
        }     
        return $instance;
    }
}
