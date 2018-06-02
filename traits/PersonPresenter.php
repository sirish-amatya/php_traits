<?php

class PersonPresenter extends BasePresenter
{
    public function fullName()
    {
       return "Full Name: ".$this->entity->first_name.' '.$this->entity->last_name; 

    }

    public function completeMobile()
    {
        return "Mobile: ".$this->entity->country_code.'-'.$this->entity->mobile;
    }

    public function getMobile()
    {
        return "Mobile: ".$this->entity->mobile;
    }
}
