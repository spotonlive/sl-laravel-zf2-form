## Zend Framework 2 forms for Laravel 5.1
ZF2 form integration for Laravel 5.1

## Installation

### Composer
Run `$ composer require spotonlive/sl-laravel-zf2-form`

### Helper
Add the helper/facade to your aliases.

`config/app.php`
```php
return [
    'aliases' => [
        'Form' => 'SpotOnLive\LaravelZf2Form\Facades\Helpers\FormHelperFacade',
    ]
];
```

### Example

#### Form
```php
<?php

namespace App\Forms\Customer;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Form;
use Zend\InputFilter\FileInput;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class CreateForm extends Form
{
    /** @var  \Doctrine\Common\Persistence\ObjectManager */
    protected $objectManager;

    protected $inputFilter;

    public function __construct($name = null, ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;

        $this->setHydrator(new DoctrineHydrator($objectManager, 'App\Entities\Customer'));
        $this->setObject(new \App\Entities\Customer());

        parent::__construct('create-customer');

        $this->add([
            'name' => 'name',
            'type' => 'Zend\Form\Element\Text',
            'options' => [
                'label' => 'Name',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true,
            ],
        ]);

        $this->add([
            'name' => 'country',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => [
                'type' => 'select',
                'label' => 'Country',
                'object_manager' => $objectManager,
                'target_class' => 'App\Entities\Country',
                'label_generator' => function($country) {
                    return $country->getName() . ' (' . $country->getCode() . ')';
                },
                'empty_option' => '-- Select country --',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true,
            ],
        ]);
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add([
                'name'     => 'name',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 255,
                        ],
                    ],
                ],
            ]);

            $inputFilter->add([
                'name'     => 'country',
                'required' => true,
            ]);

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
```

#### View
```php
@extends('layout')

@section('content')
    <h1>{{_('Form')}}</h1>

    {!! Form::openTag($form) !!}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    {!! Form::element($form->get('name')) !!}
    {!! Form::element($form->get('domain')) !!}
    {!! Form::element($form->get('active')) !!}
    {!! Form::element($form->get('country')) !!}
    {!! Form::element($form->get('industry')) !!}

    {!! Form::button($form->get('submit')) !!}

    {!! Form::closeTag() !!}
@endsection
```

## Helper methods

- openTag
- closeTag
- button
- captcha
- checkbox
- collection
- color
- date
- dateSelect
- dateTime
- dateTimeLocal
- dateTimeSelect
- element
- elementErrors
- email
- file
- hidden
- image
- input
- label
- month
- monthSelect
- multiCheckbox
- number
- password
- radio
- range
- reset
- row
- search
- select
- submit
- tel
- text
- textarea
- time
- url
- week

## Documentation
Documentation for Zend Framework 2.0 forms: http://framework.zend.com/manual/current/en/user-guide/forms-and-actions.html