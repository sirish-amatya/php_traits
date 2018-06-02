<?php

class PersonModel
{
    use PresentableTrait;
    protected $presenter = 'PersonPresenter';

    public $first_name;
    public $last_name;
    public $country_code;
    public $mobile;

    public function __construct($first_name, $last_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function addMobile($country_code, $mobile)
    {
        $this->country_code = $country_code;
        $this->mobile = $mobile;
    }
}

