<?php

namespace SpotOnLive\LaravelZf2Form\Helpers;

use Zend\Form\FormInterface;
use Zend\Form\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\Form\ElementInterface;
use Zend\Form\Exception;
use Zend\Form\LabelAwareInterface;

class FormHelper
{
    /**
     * Open tag
     *
     * @param FormInterface $form
     * @return string
     */
    public function openTag(FormInterface $form)
    {
        $helper = new Helper\Form;
        return $helper->openTag($form);
    }

    /**
     * Close tag
     *
     * @return string
     */
    public function closeTag()
    {
        $helper = new Helper\Form;
        return $helper->closeTag();
    }

    /**
     * Button element
     *
     * @param ElementInterface|null $element
     * @param null $buttonContent
     * @return string|Helper\FormButton
     */
    public function button(ElementInterface $element = null, $buttonContent = null)
    {
        $helper = new Helper\FormButton();
        return $helper->__invoke($element, $buttonContent);
    }

    /**
     * Captcha element
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormCaptcha
     */
    public function captcha(ElementInterface $element = null)
    {
        $helper = new Helper\FormCaptcha();
        return $helper->__invoke($element);
    }

    /**
     * Checkbox
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function checkbox(ElementInterface $element = null)
    {
        $helper = new Helper\FormCheckbox();
        return $helper->__invoke($element);
    }

    /**
     * Collection
     *
     * @param ElementInterface|null $element
     * @param bool|true $wrap
     * @return string|Helper\FormCollection
     */
    public function collection(ElementInterface $element = null, $wrap = true)
    {
        $helper = new Helper\FormCollection();
        return $helper->__invoke($element, $wrap);
    }

    /**
     * Color
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function color(ElementInterface $element = null)
    {
        $helper = new Helper\FormColor();
        return $helper->__invoke($element);
    }

    /**
     * Date
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function date(ElementInterface $element = null)
    {
        $helper = new Helper\FormDate();
        return $helper->__invoke($element);
    }

    /**
     * Date select
     *
     * @return Helper\FormDateSelect
     */
    public function dateSelect()
    {
        return new Helper\FormDateSelect();
    }

    /**
     * Datetime
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function dateTime(ElementInterface $element = null)
    {
        $helper = new Helper\FormDateTime();
        return $helper->__invoke($element);
    }

    /**
     * Datetime local
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function dateTimeLocal(ElementInterface $element = null)
    {
        $helper = new Helper\FormDateTimeLocal();
        return $helper->__invoke($element);
    }

    /**
     * Datetime select
     *
     * @return Helper\FormDateTimeSelect
     */
    public function dateTimeSelect()
    {
        return new Helper\FormDateTimeSelect();
    }

    /**
     * Element
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormElement
     */
    public function element(ElementInterface $element = null)
    {
        $helper = new Helper\FormElement();
        return $helper->__invoke($element);
    }

    /**
     * Errors
     *
     * @param ElementInterface|null $element
     * @param array $attributes
     * @return string|Helper\FormElementErrors
     */
    public function elementErrors(ElementInterface $element = null, array $attributes = [])
    {
        $helper = new Helper\FormElementErrors();
        return $helper->__invoke($element, $attributes);
    }

    /**
     * Email
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function email(ElementInterface $element = null)
    {
        $helper = new Helper\FormEmail();
        return $helper->__invoke($element);
    }

    /**
     * File
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function file(ElementInterface $element = null)
    {
        $helper = new Helper\FormFile();
        return $helper->__invoke($element);
    }

    /**
     * Hidden
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function hidden(ElementInterface $element = null)
    {
        $helper = new Helper\FormHidden();
        return $helper->__invoke($element);
    }

    /**
     * Image
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function image(ElementInterface $element = null)
    {
        $helper = new Helper\FormImage();
        return $helper->__invoke($element);
    }

    /**
     * @param ElementInterface|null $element
     * @return Helper\FormInput
     */
    public function input(ElementInterface $element = null)
    {
        $helper = new Helper\FormInput();
        return $helper->__invoke($element);
    }

    /**
     * Label
     *
     * @param ElementInterface|null $element
     * @param null $labelContent
     * @param null $position
     * @return string|Helper\FormLabel
     */
    public function label(ElementInterface $element = null, $labelContent = null, $position = null)
    {
        $helper = new Helper\FormLabel();
        return $helper->__invoke($element, $labelContent, $position);
    }

    /**
     * Month
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function month(ElementInterface $element = null)
    {
        $helper = new Helper\FormMonth();
        return $helper->__invoke($element);
    }

    /**
     * Month select
     *
     * @return Helper\FormMonthSelect
     */
    public function monthSelect()
    {
        return new Helper\FormMonthSelect();
    }

    /**
     * Multi checkbox
     *
     * @param ElementInterface|null $element
     * @param null $labelPosition
     * @return string|Helper\FormMultiCheckbox
     */
    public function multiCheckbox(ElementInterface $element = null, $labelPosition = null)
    {
        $helper = new Helper\FormMultiCheckbox();
        return $helper->__invoke($element, $labelPosition);
    }

    /**
     * Number
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function number(ElementInterface $element = null)
    {
        $helper = new Helper\FormNumber();
        return $helper->__invoke($element);
    }

    /**
     * Password
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function password(ElementInterface $element = null)
    {
        $helper = new Helper\FormPassword();
        return $helper->__invoke($element);
    }

    /**
     * Radio
     *
     * @param ElementInterface|null $element
     * @param null $labelPosition
     * @return string|Helper\FormMultiCheckbox
     */
    public function radio(ElementInterface $element = null, $labelPosition = null)
    {
        $helper = new Helper\FormRadio();
        return $helper->__invoke($element, $labelPosition);
    }

    /**
     * Range
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function range(ElementInterface $element = null)
    {
        $helper = new Helper\FormRange();
        return $helper->__invoke($element);
    }

    /**
     * Reset
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function reset(ElementInterface $element = null)
    {
        $helper = new Helper\FormReset();
        return $helper->__invoke($element);
    }

    /**
     * Row
     *
     * @param ElementInterface|null $element
     * @param null $labelPosition
     * @param null $renderErrors
     * @param null $partial
     * @return string|Helper\FormRow
     */
    public function row(ElementInterface $element = null, $labelPosition = null, $renderErrors = null, $partial = null)
    {
        $helper = new Helper\FormRow();
        return $helper->__invoke($element, $labelPosition, $renderErrors, $partial);
    }

    /**
     * Search
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function search(ElementInterface $element = null)
    {
        $helper = new Helper\FormSearch();
        return $helper->__invoke($element);
    }

    /**
     * Select
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormSelect
     */
    public function select(ElementInterface $element = null)
    {
        $helper = new Helper\FormSelect();
        return $helper->__invoke($element);
    }

    /**
     * Submit
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function submit(ElementInterface $element = null)
    {
        $helper = new Helper\FormSubmit();
        return $helper->__invoke($element);
    }

    /**
     * Tel
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function tel(ElementInterface $element = null)
    {
        $helper = new Helper\FormTel();
        return $helper->__invoke($element);
    }

    /**
     * Text
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function text(ElementInterface $element = null)
    {
        $helper = new Helper\FormText();
        return $helper->__invoke($element);
    }

    /**
     * Textarea
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormTextarea
     */
    public function textarea(ElementInterface $element = null)
    {
        $helper = new Helper\FormTextarea();
        return $helper->__invoke($element);
    }

    /**
     * Time
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function time(ElementInterface $element = null)
    {
        $helper = new Helper\FormTime();
        return $helper->__invoke($element);
    }

    /**
     * Url
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function url(ElementInterface $element = null)
    {
        $helper = new Helper\FormUrl();
        return $helper->__invoke($element);
    }

    /**
     * Week
     *
     * @param ElementInterface|null $element
     * @return string|Helper\FormInput
     */
    public function week(ElementInterface $element = null)
    {
        $helper = new Helper\FormWeek();
        return $helper->__invoke($element);
    }
}
