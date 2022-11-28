<?php
namespace app\core\form;

use app\core\Model;

class InputField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_NUMBER = 'number';
    

    public Model $model;
    public string $attr;
    public string $icon;
    public string $type;


    public function __construct(Model $model, string $attr, string $icon)
    {
        $this->model = $model;
        $this->attr = $attr;
        $this->icon = $icon;
        $this->type = self::TYPE_TEXT;
    }

    public function __toString()
    {
        return sprintf(
            "<div class='input-group mb-2'>
                <div class='form-floating'>
                    <input type='%s' name='%s' value='%s' class='form-control %s' id='%s' placeholder='product%s'>
                    <label for='%s' class='p-2'><i class='bi bi-%s'  style='font-size: 1.25rem; color: #FC7521;'></i>   Product %s</label>
                    <div class='invalid-feedback'>
                        %s
                    </div>
                </div>
            </div>",
            $this->type,
            $this->attr,
            $this->model->{$this->attr},
            $this->model->hasError($this->attr) ? 'is-invalid' : '',
            $this->attr,
            $this->attr,
            $this->attr,
            $this->icon,
            ucfirst($this->attr),
            $this->model->getFirstError($this->attr)
        );
    }

    public function numField()
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }

    
}