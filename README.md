# Traits
Traits are a mechanism for code reuse in single inheritance languages such as PHP. We can add functions in traits and use it in classes as if those functions were the functions of the class itself.

# Situation
You've got a situation in which there is a model class and want to add a functionality which would modify the attributes before displaying it. One way is to add those code in Model class itself. However if you do not want to clutter the Model class with the view logic and want a different class to manage it, you could use traits and make the class more clean.

# Implementation
The only code that you need to add in the Model class is 

```
use PresentableTrait;
protected $presenter = 'PersonPresenter'; //Class name where the logic would be written
```
as in
```
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
```

The way in which you would now like to access the feature would be 
```
$person = new PersonModel('Henry', 'Ford');
$person->addMobile('123', '321312123');
echo $person->present()->fullName();
echo "\n";
echo $person->present()->completeMobile();
```
In order to make this possible you would have to add few more classes
```
<?php

class BasePresenter
{
    protected $entity;
    public function __construct($entity)
    {
        $this->entity = $entity;
    }
}
```
and
```
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
```
and

```
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
```
This kind of structure is used in caffeinated/presenter in laravel. You can use this structure in your code architecture to make the code more clean, manageable and modular.
!! Happy Coding !!
