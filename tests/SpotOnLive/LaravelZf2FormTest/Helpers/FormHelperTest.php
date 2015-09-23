<?php

namespace SpotOnLive\LaravelZf2FormTest\Helpers;

use PHPUnit_Framework_TestCase;

class FormHelperTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\LaravelZf2Form\Helpers\FormHelper */
    protected $helper;

    public function setUp()
    {
        $helper = new \SpotOnLive\LaravelZf2Form\Helpers\FormHelper();
        $this->helper = $helper;
    }

    public function testCloseTag()
    {
        $result = $this->helper->closeTag();
        $this->assertSame('</form>', $result);
    }

    public function testOpenTag()
    {
        $form = $this->getMock('Zend\Form\FormInterface');

        $attributes = [];

        $form->expects($this->at(0))
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->openTag($form);

        $this->assertSame('<form action="" method="get">', $result);
    }

    public function testOpenTagWithAttributes()
    {
        $form = $this->getMock('Zend\Form\FormInterface');

        $attributes = [
            'method' => 'post',
            'action' => 'testAction',
        ];

        $form->expects($this->at(0))
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->openTag($form);

        $this->assertSame('<form action="testAction" method="post">', $result);
    }

    public function testButton()
    {
        $element = $this->getMock('Zend\Form\ElementInterface');

        $name = 'testName';
        $label = 'testLabel';

        $element->expects($this->at(0))
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getLabel')
            ->willReturn($label);

        $result = $this->helper->button($element);

        $this->assertSame('<button name="testName" type="submit" value="">testLabel</button>', $result);
    }

    public function testCheckboxNotCorrectTypeException()
    {
        $element = $this->getMock('Zend\Form\ElementInterface');

        $this->setExpectedException(
            'Zend\Form\Exception\InvalidArgumentException',
            'Zend\Form\View\Helper\FormCheckbox::render requires that the element is of type Zend\Form\Element\Checkbox'
        );

        $this->helper->checkbox($element);
    }

    public function testCheckboxNoNameException()
    {
        $element = $this->getMock('Zend\Form\Element\Checkbox');

        $this->setExpectedException(
            'Zend\Form\Exception\DomainException',
            'Zend\Form\View\Helper\FormCheckbox::render requires that the element has an assigned name; none discovered'
        );

        $this->helper->checkbox($element);
    }

    public function testCheckbox()
    {
        $element = $this->getMock('Zend\Form\Element\Checkbox');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->checkbox($element);

        $this->assertSame('<input name="tester" type="checkbox" value="">', $result);
    }

    public function testCheckboxWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Checkbox');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass'
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->checkbox($element);

        $this->assertSame('<input class="testClass" name="tester" type="checkbox" value="">', $result);
    }
}
