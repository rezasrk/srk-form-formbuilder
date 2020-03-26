<?php

namespace SrkForm\FormBuilder;

class StaticElement extends Config
{
    protected $is_start;

    public function __construct(string $validation = "", bool $labelsFile = true)
    {
        if ($validation != "")
            $this->is_start = (new $validation)->rules();
        if ($labelsFile)
            $this->labels = __('validation.attributes');
    }

    public function startRow(array $option = array())
    {
        $opt = array_merge(['class' => 'row'], $option);
        $attribute = $this->getAttribute($opt, false);
        $this->form .= "<div {$attribute}>";
        return $this;
    }

    public function endRow()
    {
        $this->form .= "</div>";
        return $this;
    }

    public function csrf()
    {
        $this->form .= csrf_field();
        return $this;
    }

    public function patch()
    {
        $this->form .= method_field('patch');
        return $this;
    }

    protected function beforeElement($width, $type = 'colMd')
    {
        switch ($type) {
            case 'colXm':
                $col = $this->colXs[$width];
                break;
            case 'colMd':
                $col = $this->colMd[$width];
                break;
            case 'colSm':
                $col = $this->colSm[$width];
                break;
            case 'colLg':
                $col = $this->colLg[$width];
                break;
        }
        $this->form .= "<div class='{$col}'><div class='form-group'>";
    }

    public function startDiv($option = array())
    {
        $attribute = $this->getAttribute($option, false);
        $this->form .= "<div {$attribute}>";
        return $this;
    }

    public function endDiv()
    {
        $this->form .= "</div>";
        return $this;
    }

    protected function afterElement()
    {
        $this->form .= "</div></div>";
    }

    protected function setStarRequired()
    {
        $this->form .= "<span class='text-danger'>*</span>" . str_repeat(' ', '1');
    }

    protected function label($labelName)
    {
        $this->form .= "<label>" . $labelName . "</label>";
    }


    protected function getStiringBetween($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    protected function getAttribute(array $option, $beforeElement = true, $firstLabel = true)
    {

        if ($beforeElement) {
            (array_key_exists('width', $option)) ? $width = $option['width'] : $width = 3;
            $this->beforeElement($width);
        }
        $attribute = "";
        if (count($option) != 0) {
            foreach ($option as $key => $value) {
                if (in_array($key, $this->withListAttr))
                    $attribute .= $key . "='" . $value . "'" . str_repeat(' ', 1);
                $name = "";
                if (strpos($value, '[') != "") {
                    if ($this->getStiringBetween($value, '[', ']') == "") {
                        $name = str_replace('[', '.', $value);
                        $name = str_replace(']', '*', $name);
                    } else {
                        $name = str_replace('[', '.', $value);
                        $name = str_replace(']', '', $name);
                    }
                } else {
                    $name = $value;
                }

                if ($key == "name" && !array_key_exists('star', $option) && is_array($this->is_start) && array_key_exists($name, $this->is_start) && $this->is_start[$name][0] == 'required')
                    $this->setStarRequired();
                elseif ($key == "star" && array_key_exists('star', $option))
                    $this->setStarRequired();

                if ($key == "name" && !array_key_exists('label', $option) && $firstLabel && is_array($this->labels) && array_key_exists($name, $this->labels)) {
                    $this->label($this->labels[$name]);
                } elseif ($key == 'label' && array_key_exists('label', $option) && $firstLabel) {
                    $this->label($option['label']);
                }
            }
        }

        return $attribute;
    }

    public function br()
    {
        $this->form .= "<br>";
        return $this;
    }

    public function h($innerHtml, $size = 4)
    {
        $this->form .= "<h{$size}>{$innerHtml}</h{$size}>";
        return $this;
    }

    public function hr()
    {
        $this->form .= "<hr>";
        return $this;
    }

    public function i($option)
    {
        $attribute = $this->getAttribute($option);
        $this->form .= "<i {$attribute}></i>";
        $this->afterElement();
        return $this;
    }

    protected function changeSortLabel(array $option = array(), $firstLabel)
    {
        if (array_key_exists('label', $option) && !$firstLabel)
            $this->form .= $this->label($option['label']);
        elseif (array_key_exists('name', $option) && array_key_exists($option['name'], $this->labels))
            $this->form .= $this->label($this->labels[$option['name']]);

    }
}
