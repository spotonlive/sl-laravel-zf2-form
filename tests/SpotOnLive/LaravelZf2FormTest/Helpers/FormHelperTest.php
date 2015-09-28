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
            'class' => 'testClass',
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

    public function testColor()
    {
        $element = $this->getMock('Zend\Form\Element\Color');

        $name = 'tester';

        $attributes = [
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->color($element);

        $this->assertSame('<input name="tester" type="color" value="">', $result);
    }

    public function testColorWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Color');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->color($element);

        $this->assertSame('<input class="testClass" name="tester" type="color" value="">', $result);
    }

    public function testDate()
    {
        $element = $this->getMock('Zend\Form\Element\Date');

        $name = 'tester';

        $attributes = [
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->date($element);

        $this->assertSame('<input name="tester" type="date" value="">', $result);
    }

    public function testDateWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Date');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->date($element);

        $this->assertSame('<input class="testClass" name="tester" type="date" value="">', $result);
    }

    public function testDateTime()
    {
        $element = $this->getMock('Zend\Form\Element\DateTime');

        $name = 'tester';

        $attributes = [
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->dateTime($element);

        $this->assertSame('<input name="tester" type="date" value="">', $result);
    }

    public function testDateTimeWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\DateTime');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->dateTime($element);

        $this->assertSame('<input class="testClass" name="tester" type="date" value="">', $result);
    }

    public function testDateTimeLocal()
    {
        $element = $this->getMock('Zend\Form\Element\DateTimeLocal');

        $name = 'tester';

        $attributes = [
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->dateTimeLocal($element);

        $this->assertSame('<input name="tester" type="date" value="">', $result);
    }

    public function testDateTimeLocalWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\DateTimeLocal');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->dateTimeLocal($element);

        $this->assertSame('<input class="testClass" name="tester" type="date" value="">', $result);
    }

    public function testElementNoLabel()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $this->setExpectedException(
            'Zend\Form\Exception\DomainException',
            '__invoke expects either label content as the second argument, or that the element provided has a label attribute; neither found'
        );

        $this->helper->element($element);
    }

    public function testElement()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';
        $label = 'testLabel';

        $options = [
            'label' => $label
        ];

        $attributes = [
            'class' => 'testClass',
            'placeholder' => 'testPlaceHolder',
        ];

        $element->expects($this->any())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getLabel')
            ->willReturn($label);

        $element->expects($this->any())
            ->method('getOptions')
            ->willReturn($options);

        $element->expects($this->any())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->element($element);

        $this->assertSame('<label for="tester">testLabel</label><input class="testClass" placeholder="testPlaceHolder" name="tester" type="text" value="">', $result);
    }

    public function testElementNoHelper()
    {
        $element = $this->getMock('Zend\Form\ElementInterface');

        $result = $this->helper->element($element);

        $this->assertSame('', $result);
    }

    public function testParentClassName()
    {
        $element = 'Zend\Form\Element\Date';

        $result = $this->helper->parentClassName($element);

        $this->assertSame('Zend\Form\Element\DateTime', $result);
    }

    public function testParentClassNameClassNotExisting()
    {
        $element = 'NonExistingClass';

        $result = $this->helper->parentClassName($element);

        $this->assertFalse($result);
    }

    public function testFormElementErrors()
    {
        /** @var \Zend\Form\Element\Text $element */
        $element = $this->getMock('Zend\Form\Element\Text');

        $messages = [
            'key' => 'errorMessage'
        ];

        $element->expects($this->once())
            ->method('getMessages')
            ->willReturn($messages);

        $result = $this->helper->elementErrors($element);

        $this->assertSame('<ul><li>errorMessage</li></ul>', $result);
    }

    public function testFormElementErrorsNoMessage()
    {
        /** @var \Zend\Form\Element\Text $element */
        $element = $this->getMock('Zend\Form\Element\Text');

        $messages = [];

        $element->expects($this->once())
            ->method('getMessages')
            ->willReturn($messages);

        $result = $this->helper->elementErrors($element);

        $this->assertSame('', $result);
    }

    public function testEmail()
    {
        $element = $this->getMock('Zend\Form\Element\Email');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->email($element);

        $this->assertSame('<input name="tester" type="email" value="">', $result);
    }

    public function testEmailWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Email');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->email($element);

        $this->assertSame('<input class="testClass" name="tester" type="email" value="">', $result);
    }

    public function testFile()
    {
        $element = $this->getMock('Zend\Form\Element\File');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->file($element);

        $this->assertSame('<input type="file" name="tester">', $result);
    }

    public function testFileWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\File');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->file($element);

        $this->assertSame('<input class="testClass" type="file" name="tester">', $result);
    }

    public function testLabel()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $label = 'testLabel';

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getLabel')
            ->willReturn($label);

        $result = $this->helper->label($element);

        $this->assertSame('<label for="tester">testLabel</label>', $result);
    }

    public function testMonth()
    {
        $element = $this->getMock('Zend\Form\Element\Month');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->month($element);

        $this->assertSame('<input name="tester" type="month" value="">', $result);
    }

    public function testMonthWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Month');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->month($element);

        $this->assertSame('<input class="testClass" name="tester" type="month" value="">', $result);
    }

    public function testMultiCheckbox()
    {
        $element = $this->getMock('Zend\Form\Element\MultiCheckbox');

        $name = 'tester';

        $attributes = [];

        $options = [
            'a' => 'b',
            'c' => 'd',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $element->expects($this->once())
            ->method('getValueOptions')
            ->willReturn($options);

        $result = $this->helper->multiCheckbox($element);

        $this->assertSame('<label><input name="tester&#x5B;&#x5D;" type="checkbox" value="a">b</label><label><input name="tester&#x5B;&#x5D;" type="checkbox" value="c">d</label>', $result);
    }

    public function testNumber()
    {
        $element = $this->getMock('Zend\Form\Element\Number');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->number($element);

        $this->assertSame('<input name="tester" type="number" value="">', $result);
    }

    public function testNumberWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Number');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->number($element);

        $this->assertSame('<input class="testClass" name="tester" type="number" value="">', $result);
    }

    public function testPassword()
    {
        $element = $this->getMock('Zend\Form\Element\Password');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->password($element);

        $this->assertSame('<input name="tester" type="password" value="">', $result);
    }

    public function testPasswordWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Password');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->password($element);

        $this->assertSame('<input class="testClass" name="tester" type="password" value="">', $result);
    }

    public function testRadio()
    {
        $element = $this->getMock('Zend\Form\Element\Radio');

        $name = 'tester';

        $attributes = [];

        $options = [
            'a' => 'b',
            'c' => 'd',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $element->expects($this->once())
            ->method('getValueOptions')
            ->willReturn($options);

        $result = $this->helper->radio($element);

        $this->assertSame('<label><input name="tester" type="radio" value="a">b</label><label><input name="tester" type="radio" value="c">d</label>', $result);
    }

    public function testRange()
    {
        $element = $this->getMock('Zend\Form\Element\Range');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->range($element);

        $this->assertSame('<input name="tester" type="range" value="">', $result);
    }

    public function testRangeWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Range');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->range($element);

        $this->assertSame('<input class="testClass" name="tester" type="range" value="">', $result);
    }

    public function testReset()
    {
        $element = $this->getMock('Zend\Form\Element\Button');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->reset($element);

        $this->assertSame('<input name="tester" type="reset" value="">', $result);
    }

    public function testResetWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Button');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->reset($element);

        $this->assertSame('<input class="testClass" name="tester" type="reset" value="">', $result);
    }

    public function testRowWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $this->setExpectedException(
            'Zend\Form\Exception\DomainException',
            '__invoke expects either label content as the second argument, or that the element provided has a label attribute; neither found'
        );

        $this->helper->element($element);
    }

    public function testRow()
    {

        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';
        $label = 'testLabel';

        $options = [
            'label' => $label
        ];

        $attributes = [
            'class' => 'testClass',
            'placeholder' => 'testPlaceHolder',
        ];

        $element->expects($this->any())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getLabel')
            ->willReturn($label);

        $element->expects($this->any())
            ->method('getOptions')
            ->willReturn($options);

        $element->expects($this->any())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->element($element);

        $this->assertSame('<label for="tester">testLabel</label><input class="testClass" placeholder="testPlaceHolder" name="tester" type="text" value="">', $result);
    }

    public function testRowNoHelper()
    {
        $element = $this->getMock('Zend\Form\ElementInterface');

        $result = $this->helper->element($element);

        $this->assertSame('', $result);
    }

    public function testSearch()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->search($element);

        $this->assertSame('<input name="tester" type="search" value="">', $result);
    }

    public function testSearchWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->search($element);

        $this->assertSame('<input class="testClass" name="tester" type="search" value="">', $result);
    }

    public function testSubmit()
    {
        $element = $this->getMock('Zend\Form\Element\Button');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->submit($element);

        $this->assertSame('<input name="tester" type="submit" value="">', $result);
    }

    public function testSubmitWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Button');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->submit($element);

        $this->assertSame('<input class="testClass" name="tester" type="submit" value="">', $result);
    }

    public function testTel()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->tel($element);

        $this->assertSame('<input name="tester" type="tel" value="">', $result);
    }

    public function testTelWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->tel($element);

        $this->assertSame('<input class="testClass" name="tester" type="tel" value="">', $result);
    }

    public function testText()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->text($element);

        $this->assertSame('<input name="tester" type="text" value="">', $result);
    }

    public function testTextWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->text($element);

        $this->assertSame('<input class="testClass" name="tester" type="text" value="">', $result);
    }

    public function testTextarea()
    {
        $element = $this->getMock('Zend\Form\Element\Textarea');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->textarea($element);

        $this->assertSame('<textarea name="tester"></textarea>', $result);
    }

    public function testTextareaWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Textarea');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->textarea($element);

        $this->assertSame('<textarea class="testClass" name="tester"></textarea>', $result);
    }

    public function testTime()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->time($element);

        $this->assertSame('<input name="tester" type="time" value="">', $result);
    }

    public function testTimeWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Text');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->time($element);

        $this->assertSame('<input class="testClass" name="tester" type="time" value="">', $result);
    }

    public function testUrl()
    {
        $element = $this->getMock('Zend\Form\Element\Url');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->url($element);

        $this->assertSame('<input name="tester" type="url" value="">', $result);
    }

    public function testUrlWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Url');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->url($element);

        $this->assertSame('<input class="testClass" name="tester" type="url" value="">', $result);
    }

    public function testWeek()
    {
        $element = $this->getMock('Zend\Form\Element\Week');

        $name = 'tester';

        $attributes = [];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->week($element);

        $this->assertSame('<input name="tester" type="week" value="">', $result);
    }

    public function testWeekWithAttributes()
    {
        $element = $this->getMock('Zend\Form\Element\Week');

        $name = 'tester';

        $attributes = [
            'class' => 'testClass',
        ];

        $element->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $element->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $result = $this->helper->week($element);

        $this->assertSame('<input class="testClass" name="tester" type="week" value="">', $result);
    }
}
