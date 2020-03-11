<?php

namespace SrkForm\FormBuilder;

class FormBuilder extends StaticElement
{
    public function startForm(string $action, array $option = array())
    {
        $option = array_merge(['method' => 'POST'], $option);
        $attribute = $this->getAttribute($option, false);
        $this->form .= "<form action='{$action}'" . " " . " {$attribute}>";
        $this->form .= $this->afterElement();
        return $this;
    }


    public function text(array $option = array())
    {
        $option = array_merge(['class' => 'form-control'], $option);
        $attribute = $this->getAttribute($option);
        $this->form .= "<input type='text' {$attribute}>";
        $this->form .= $this->afterElement();
        return $this;
    }

    public function select(array $option = array(), array $data = array(), int $selected = null)
    {
        $option = array_merge(['class' => 'form-control'], $option);
        $attribute = $this->getAttribute($option);
        $this->form .= "<select {$attribute}>";
        if (count($data) != 0) {
            $this->form .= "<option value>انتخاب نمایید...</option>";
            foreach ($data as $key => $value) {
                ($key === $selected) ? $select = 'selected' : $select = '';
                $this->form .= "<option {$select} value='{$key}'>{$value}</option>";
            }
        }
        $this->form .= "</select>";
        return $this;
    }

    public function endForm()
    {
        $this->form .= "</form>";
        return $this->form;
    }
}
