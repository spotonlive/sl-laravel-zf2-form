## Zend Framework 2 forms for Laravel 5.1
ZF2 form integration for Laravel 5.1

[![Latest Stable Version](https://poser.pugx.org/spotonlive/sl-laravel-zf2-form/v/stable)](https://packagist.org/packages/spotonlive/sl-laravel-zf2-form) [![Total Downloads](https://poser.pugx.org/spotonlive/sl-laravel-zf2-form/downloads)](https://packagist.org/packages/spotonlive/sl-laravel-zf2-form) [![Latest Unstable Version](https://poser.pugx.org/spotonlive/sl-laravel-zf2-form/v/unstable)](https://packagist.org/packages/spotonlive/sl-laravel-zf2-form) [![License](https://poser.pugx.org/spotonlive/sl-laravel-zf2-form/license)](https://packagist.org/packages/spotonlive/sl-laravel-zf2-form) [![Build Status](https://travis-ci.org/spotonlive/sl-laravel-zf2-form.svg?branch=master)](https://travis-ci.org/spotonlive/sl-laravel-zf2-form) [![Code Climate](https://codeclimate.com/github/spotonlive/sl-laravel-zf2-form/badges/gpa.svg)](https://codeclimate.com/github/spotonlive/sl-laravel-zf2-form) [![Test Coverage](https://codeclimate.com/github/spotonlive/sl-laravel-zf2-form/badges/coverage.svg)](https://codeclimate.com/github/spotonlive/sl-laravel-zf2-form/coverage)

## Installation

### Composer
Run `$ composer require spotonlive/sl-laravel-zf2-form`

### Helper
Add the helper/facade to your aliases.

`config/app.php`
```php
return [
    'aliases' => [
        'Form' => SpotOnLive\LaravelZf2Form\Facades\Helpers\FormHelperFacade::class,
    ]
];
```

### Example

#### Form
```php
<?php

namespace App\Forms\Customer;

use Zend\Form\Form;
use App\Entities\Country;
use App\Entities\Customer;
use Zend\Form\Element\Text;
use Zend\InputFilter\FileInput;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use DoctrineModule\Form\Element\ObjectSelect;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\InputFilter\InputFilterAwareInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CreateForm extends Form
{
    /** @var ObjectManager */
    protected $objectManager;

    protected $inputFilter;

    public function __construct($name = null, ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;

        $this->setHydrator(new DoctrineHydrator($objectManager, Customer::class));
        $this->setObject(new Customer());

        parent::__construct('create-customer');

        $this->add([
            'name' => 'name',
            'type' => Text::class,
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
            'type' => ObjectSelect::class,
            'options' => [
                'type' => 'select',
                'label' => 'Country',
                'object_manager' => $objectManager,
                'target_class' => Country::class,
                'label_generator' => function(Country $country) {
                    return sprintf(
                        '%s (%s),
                        $country->getName(),
                        $country->getCode()
                    );
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

    {!! csrf_field() !!}

    {!! Form::row($form->get('name')) !!}
    {!! Form::row($form->get('country')) !!}

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
Documentation for Zend Framework 2 forms: http://framework.zend.com/manual/current/en/modules/zend.form.elements.html