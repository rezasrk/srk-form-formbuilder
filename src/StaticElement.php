<?php
namespace SrkForm\FormBuilder;

class StaticElement
{
    protected $is_start;

    public function __construct(string $validation = "", bool $labelsFile = false)
    {
        if ($validation != "")
            $this->is_start = (new $validation)->rules();
        if ($labelsFile)
            $this->labels = __('validation.attributes');
    }

    public function startRow()
    {
        $this->form .= "<div class='row'>";
        return $this;
    }

    public function endRow()
    {
        $this->form .= "</div>";
        return $this;
    }

    public function beforeElement($width, $type = 'colMd')
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

    public function afterElement()
    {
        $this->form .= "</div></div>";
    }

    public function setStarRequired()
    {
        $this->form .= "<span class='text-danger'>*</span>" . str_repeat(' ', '1');
    }

    public function label($labelName)
    {
        $this->form .= "<label>" . $labelName . "</label>";
        return $this;
    }

    public function getAttribute(array $option, $beforeElement = true)
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

                if ($key == "name" && !array_key_exists('star', $option) && is_array($this->is_start) && array_key_exists($value, $this->is_start) && $this->is_start[$value][0] == 'required')
                    $this->setStarRequired();
                elseif ($key == "star" && array_key_exists('star', $option))
                    $this->setStarRequired();

                if ($key == "name" && !array_key_exists('label', $option) && is_array($this->labels) && array_key_exists($value, $this->labels))
                    $this->label($this->labels[$value]);
                elseif ($key == 'label' && array_key_exists('label', $option))
                    $this->label($option['label']);

            }
        }

        return $attribute;
    }
}
