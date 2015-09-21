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
     * @return Helper\FormButton
     */
    public function button(ElementInterface $element = null, $buttonContent = null)
    {
        return new Helper\FormButton($element, $buttonContent);
    }

    /**
     * Captcha element
     *
     * @param ElementInterface|null $element
     * @return Helper\FormCaptcha
     */
    public function captcha(ElementInterface $element = null)
    {
        return new Helper\FormCaptcha($element);
    }

    /**
     * Checkbox
     *
     * @param ElementInterface|null $element
     * @return Helper\FormCheckbox
     */
    public function checkbox(ElementInterface $element = null)
    {
        return new Helper\FormCheckbox($element);
    }

    /**
     * Collection
     *
     * @param ElementInterface|null $element
     * @param bool|true $wrap
     * @return Helper\FormCollection
     */
    public function collection(ElementInterface $element = null, $wrap = true)
    {
        return new Helper\FormCollection($element, $wrap);
    }

    /**
     * Color
     *
     * @param ElementInterface|null $element
     * @return Helper\FormColor
     */
    public function color(ElementInterface $element = null)
    {
        return new Helper\FormColor($element);
    }

    /**
     * Date
     *
     * @param ElementInterface|null $element
     * @return Helper\FormDate
     */
    public function date(ElementInterface $element = null)
    {
        return new Helper\FormDate($element);
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
     * @return Helper\FormDateTime
     */
    public function dateTime(ElementInterface $element = null)
    {
        return new Helper\FormDateTime($element);
    }

    /**
     * Datetime local
     *
     * @param ElementInterface|null $element
     * @return Helper\FormDateTimeLocal
     */
    public function dateTimeLocal(ElementInterface $element = null)
    {
        return new Helper\FormDateTimeLocal($element = null);
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
     * @return Helper\FormElement
     */
    public function element(ElementInterface $element = null)
    {
        return new Helper\FormElement($element);
    }

    /**
     * Element errors
     *
     * @param ElementInterface|null $element
     * @param array $attributes
     * @return Helper\FormElementErrors
     */
    public function elementErrors(ElementInterface $element = null, array $attributes = [])
    {
        return new Helper\FormElementErrors($element, $attributes);
    }

    /**
     * Email
     *
     * @param ElementInterface|null $element
     * @return Helper\FormEmail
     */
    public function email(ElementInterface $element = null)
    {
        return new Helper\FormEmail($element);
    }

    /**
     * File
     *
     * @param ElementInterface|null $element
     * @return Helper\FormFile
     */
    public function file(ElementInterface $element = null)
    {
        return new Helper\FormFile($element);
    }

    /**
     * Hidden
     *
     * @param ElementInterface|null $element
     * @return Helper\FormHidden
     */
    public function hidden(ElementInterface $element = null)
    {
        return new Helper\FormHidden($element);
    }

    /**
     * Image
     *
     * @param ElementInterface|null $element
     * @return Helper\FormImage
     */
    public function image(ElementInterface $element = null)
    {
        return new Helper\FormImage($element);
    }

    /**
     * @param ElementInterface|null $element
     * @return Helper\FormInput
     */
    public function input(ElementInterface $element = null)
    {
        return new Helper\FormInput($element);
    }

    /**
     * Label
     *
     * @param ElementInterface|null $element
     * @param null $labelContent
     * @param null $position
     * @return Helper\FormLabel
     */
    public function label(ElementInterface $element = null, $labelContent = null, $position = null)
    {
        return new Helper\FormLabel($element, $labelContent, $position);
    }

    /**
     * Month
     *
     * @param ElementInterface|null $element
     * @return Helper\FormMonth
     */
    public function month(ElementInterface $element = null)
    {
        return new Helper\FormMonth($element);
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
     * @return Helper\FormMultiCheckbox
     */
    public function multiCheckbox(ElementInterface $element = null, $labelPosition = null)
    {
        return new Helper\FormMultiCheckbox($element, $labelPosition);
    }

    /**
     * Number
     *
     * @param ElementInterface|null $element
     * @return Helper\FormNumber
     */
    public function number(ElementInterface $element = null)
    {
        return new Helper\FormNumber($element);
    }

    /**
     * Password
     *
     * @param ElementInterface|null $element
     * @return Helper\FormPassword
     */
    public function password(ElementInterface $element = null)
    {
        return new Helper\FormPassword($element);
    }

    /**
     * Radio
     *
     * @param ElementInterface|null $element
     * @param null $labelPosition
     * @return Helper\FormRadio
     */
    public function radio(ElementInterface $element = null, $labelPosition = null)
    {
        return new Helper\FormRadio($element, $labelPosition);
    }

    /**
     * Range
     *
     * @param ElementInterface|null $element
     * @return Helper\FormRange
     */
    public function range(ElementInterface $element = null)
    {
        return new Helper\FormRange($element);
    }

    /**
     * Reset
     *
     * @param ElementInterface|null $element
     * @return Helper\FormReset
     */
    public function reset(ElementInterface $element = null)
    {
        return new Helper\FormReset($element);
    }

    /**
     * Row
     *
     * @param ElementInterface|null $element
     * @param null $labelPosition
     * @param null $renderErrors
     * @param null $partial
     * @return Helper\FormRow
     */
    public function row(ElementInterface $element = null, $labelPosition = null, $renderErrors = null, $partial = null)
    {
        return new Helper\FormRow($element, $labelPosition, $renderErrors, $partial);
    }

    /**
     * Search
     *
     * @param ElementInterface|null $element
     * @return Helper\FormSearch
     */
    public function search(ElementInterface $element = null)
    {
        return new Helper\FormSearch($element);
    }

    /**
     * Select
     *
     * @param ElementInterface|null $element
     * @return Helper\FormSelect
     */
    public function select(ElementInterface $element = null)
    {
        return new Helper\FormSelect($element);
    }

    /**
     * Submit
     *
     * @param ElementInterface|null $element
     * @return Helper\FormSubmit
     */
    public function submit(ElementInterface $element = null)
    {
        return new Helper\FormSubmit($element);
    }

    /**
     * Tel
     *
     * @param ElementInterface|null $element
     * @return Helper\FormTel
     */
    public function tel(ElementInterface $element = null)
    {
        return new Helper\FormTel($element);
    }

    /**
     * Text
     *
     * @param ElementInterface|null $element
     * @return Helper\FormText
     */
    public function text(ElementInterface $element = null)
    {
        return new Helper\FormText($element);
    }

    /**
     * Textarea
     *
     * @param ElementInterface|null $element
     * @return Helper\FormTextarea
     */
    public function textarea(ElementInterface $element = null)
    {
        return new Helper\FormTextarea($element);
    }

    /**
     * Time
     *
     * @param ElementInterface|null $element
     * @return Helper\FormTime
     */
    public function time(ElementInterface $element = null)
    {
        return new Helper\FormTime($element);
    }

    /**
     * Url
     *
     * @param ElementInterface|null $element
     * @return Helper\FormUrl
     */
    public function url(ElementInterface $element = null)
    {
        return new Helper\FormUrl($element);
    }

    /**
     * Week
     *
     * @param ElementInterface|null $element
     * @return Helper\FormWeek
     */
    public function week(ElementInterface $element = null)
    {
        return new Helper\FormWeek($element);
    }
}
