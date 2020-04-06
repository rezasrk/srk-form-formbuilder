<?php

namespace SrkForm\FormBuilder;

class FormBuilder extends StaticElement
{
    public function startForm(string $action = "", array $option = array())
    {
        $option = array_merge(['method' => 'POST'], $option);
        $attribute = $this->getAttribute($option, false);
        $this->form .= "<form action='{$action}'" . " " . " {$attribute}>";
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

    public function hidden(array $option = array())
    {
        $attribute = $this->getAttribute($option, false);
        $this->form .= "<input type='hidden' {$attribute}>";
        return $this;
    }

    public function bootstrapFile($option = array())
    {
        $lable = (array_key_exists($option['name'], $this->labels)) ? $this->labels[$option['name']] : 'انتخاب فایل';
        $isRequiredz = array_key_exists($option['name'],$this->is_start) && $this->is_start[$option['name']][0] == "required" ? $is_star = "<span class='text-danger'>*</span>" : $is_star = '';
        $this->form .= "<div class='col-md-12'>
                            <div class='form-group'>
                            {$is_star}<label>{$lable}</label>
            <div class='custom-file'>
                    <label class='custom-file-label'>انتخاب فایل</label>
            <input type='file' name={$option['name']} class='custom-file-input'></div></div></div>";
        return $this;
    }

    public function select(array $option = array(), array $data = array(), $selected = null)
    {
        $option = array_merge(['class' => 'form-control'], $option);
        $attribute = $this->getAttribute($option);
        $this->form .= "<select {$attribute}>";
        if (count($data) != 0) {
            $this->form .= "<option value>انتخاب نمایید...</option>";
            foreach ($data as $key => $value) {
                if (is_array($selected) && in_array($key, $selected)) {
                    $this->form .= "<option selected value='{$key}'>{$value}</option>";
                } elseif (!is_array($selected) && $key == $selected) {
                    $this->form .= "<option selected value='{$key}'>{$value}</option>";
                } else {
                    $this->form .= "<option value='{$key}'>{$value}</option>";
                }

            }
        }
        $this->form .= "</select>";
        $this->afterElement();
        return $this;
    }

    public function radio(array $option = array(), bool $checked = false, $firstLabel = false)
    {
        $attribute = $this->getAttribute($option, true, $firstLabel);
        ($checked) ? $check = 'checked' : $check = '';
        $this->form .= "<input {$check} type='radio' {$attribute}>";
        $this->changeSortLabel($option, $firstLabel);
        $this->afterElement();
        return $this;
    }

    public function checkbox(array $option = array(), bool $checked = false, $firstLabel = false)
    {
        $attribute = $this->getAttribute($option, true, $firstLabel);
        ($checked) ? $check = 'checked' : $check = '';
        $this->form .= "<input {$check} type='checkbox' {$attribute}>";
        $this->changeSortLabel($option, $firstLabel);
        $this->afterElement();
        return $this;
    }

    public function button(array $option = array(), $innerHtml = "ثبت")
    {
        $attribute = $this->getAttribute($option);
        $this->form .= "<button {$attribute}>{$innerHtml}</button>";
        $this->afterElement();
        return $this;
    }

    public function textarea(array $option = array(), $innerHtml = "")
    {
        $option = array_merge(['class' => 'form-control', 'width' => 12, 'rows' => '5'], $option);
        $attribute = $this->getAttribute($option);
        $this->form .= "<textarea {$attribute}>{$innerHtml}</textarea>";
        $this->afterElement();
        return $this;
    }

    public function file(array $option = array())
    {
        $attribute = $this->getAttribute($option);
        $this->form .= "<input type='file' {$attribute}>";
        $this->afterElement();
        return $this;
    }

    public function password(array $option = array())
    {
        $option = array_merge(['class' => 'form-control'], $option);
        $attribute = $this->getAttribute($option);
        $this->form .= "<input type='password' {$attribute}>";
        $this->afterElement();
        return $this;
    }

    public function endForm()
    {
        $this->form .= "</form>";
        return $this->form;
    }
}
