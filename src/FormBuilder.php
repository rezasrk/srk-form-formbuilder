<?php
namespace SrkForm\FormBuilder;

class FormBuilder
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

    public function endForm()
    {
        $this->form .= "</form>";
        return $this->form;
    }
}
