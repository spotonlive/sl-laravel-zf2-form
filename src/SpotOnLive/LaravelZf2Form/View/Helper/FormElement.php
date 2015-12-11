<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SpotOnLive\LaravelZf2Form\View\Helper;

use StdClass;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\View\Helper\AbstractHelper as BaseAbstractHelper;

class FormElement extends \Zend\Form\View\Helper\FormElement
{
    const DEFAULT_HELPER = 'forminput';

    /**
     * Instance map to view helper
     *
     * @var array
     */
    protected $classMap = [
        'Zend\Form\Element\Button'         => 'formbutton',
        'Zend\Form\Element\Captcha'        => 'formcaptcha',
        'Zend\Form\Element\Csrf'           => 'formhidden',
        'Zend\Form\Element\Collection'     => 'formcollection',
        'Zend\Form\Element\DateTimeSelect' => 'formdatetimeselect',
        'Zend\Form\Element\DateSelect'     => 'formdateselect',
        'Zend\Form\Element\MonthSelect'    => 'formmonthselect',
    ];

    /**
     * Type map to view helper
     *
     * @var array
     */
    protected $typeMap = [
        'checkbox'       => 'formcheckbox',
        'color'          => 'formcolor',
        'date'           => 'formdate',
        'datetime'       => 'formdatetime',
        'datetime-local' => 'formdatetimelocal',
        'email'          => 'formemail',
        'file'           => 'formfile',
        'hidden'         => 'formhidden',
        'image'          => 'formimage',
        'month'          => 'formmonth',
        'multi_checkbox' => 'formmulticheckbox',
        'number'         => 'formnumber',
        'password'       => 'formpassword',
        'radio'          => 'formradio',
        'range'          => 'formrange',
        'reset'          => 'formreset',
        'search'         => 'formsearch',
        'select'         => 'formselect',
        'submit'         => 'formsubmit',
        'tel'            => 'formtel',
        'text'           => 'formtext',
        'textarea'       => 'formtextarea',
        'time'           => 'formtime',
        'url'            => 'formurl',
        'week'           => 'formweek',
    ];

    /**
     * Default helper name
     *
     * @var string
     */
    protected $defaultHelper = self::DEFAULT_HELPER;

    /**
     * Invoke helper as function
     *
     * Proxies to {@link render()}.
     *
     * @param  ElementInterface|null $element
     * @return string|FormElement
     */
    public function __invoke(ElementInterface $element = null)
    {
        if (!$element) {
            return $this;
        }

        return $this->render($element);
    }

    /**
     * Render an element
     *
     * Introspects the element type and attributes to determine which
     * helper to utilize when rendering.
     *
     * @param  ElementInterface $element
     * @return string
     */
    public function render(ElementInterface $element)
    {
        $renderedInstance = $this->renderInstance($element);

        if ($renderedInstance !== null) {
            return $renderedInstance;
        }

        $renderedType = $this->renderType($element);

        if ($renderedType !== null) {
            return $renderedType;
        }

        return $this->renderHelper($this->defaultHelper, $element);
    }

    /**
     * Set default helper name
     *
     * @param string $name
     * @return self
     */
    public function setDefaultHelper($name)
    {
        $this->defaultHelper = $name;

        return $this;
    }

    /**
     * Add form element type to plugin map
     *
     * @param string $type
     * @param string $plugin
     * @return self
     */
    public function addType($type, $plugin)
    {
        $this->typeMap[$type] = $plugin;

        return $this;
    }

    /**
     * Add instance class to plugin map
     *
     * @param string $class
     * @param string $plugin
     * @return self
     */
    public function addClass($class, $plugin)
    {
        $this->classMap[$class] = $plugin;

        return $this;
    }

    /**
     * Render element by helper name
     *
     * @param string $name
     * @param ElementInterface $element
     * @return string
     */
    protected function renderHelper($name, ElementInterface $element)
    {
        $method = str_replace(
            'Zend\Form\Element\\',
            '',
            get_class($element)
        );

        $className = '\Zend\Form\View\Helper\Form' . $method;

        /** @var null $helper */
        $helper = null;

        if (class_exists($className)) {
            /** @var AbstractHelper|null $helper */
            $helper = new $className;
        }

        if ($parentClass = $this->parentClassName($method)) {
            $method = str_replace(
                'Zend\Form\Element\\',
                '',
                $parentClass
            );

            $className = '\Zend\Form\View\Helper\Form' . $method;

            if (class_exists($className)) {
                /** @var AbstractHelper|null $helper */
                $helper = new $className;
            }
        }

        if (!$helper) {
            return null;
        }

        return $helper($element);
    }

    /**
     * Get parent class name
     *
     * @param $className
     * @return bool|string
     */
    public function parentClassName($className)
    {
        if (!class_exists($className)) {
            return false;
        }

        $class = new $className;

        return get_parent_class($class);
    }

    /**
     * Render element by instance map
     *
     * @param ElementInterface $element
     * @return string|null
     */
    protected function renderInstance(ElementInterface $element)
    {
        foreach ($this->classMap as $class => $pluginName) {
            if ($element instanceof $class) {
                return $this->renderHelper($pluginName, $element);
            }
        }

        return null;
    }

    /**
     * Render element by type map
     *
     * @param ElementInterface $element
     * @return string|null
     */
    protected function renderType(ElementInterface $element)
    {
        $type = $element->getAttribute('type');

        if (isset($this->typeMap[$type])) {
            return $this->renderHelper($this->typeMap[$type], $element);
        }

        return null;
    }
}
