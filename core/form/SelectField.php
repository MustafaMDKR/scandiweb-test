<?php
namespace app\core\form;

use app\core\Model;
use app\models\ProductModel;

class SelectField
{
    public const TYPE_DVD = 'DVD';
    public const TYPE_BOOK = 'Book';
    public const TYPE_FUR = 'Furniture';
    public const TYPE_NONE = '';

    public Model $model;
    public string $attr;
    public string $icon;


    public function __construct(Model $model, string $attr, string $icon)
    {
        $this->model = $model;
        $this->attr = $attr;
        $this->icon = $icon;
    }


    public function __toString()
    {

        return sprintf(
            '<div class="input-group mb-2">
                <div class="form-floating">
                    <select class="form-select %s" value="%s" name="%s" id="%s" aria-label="%s">
                        <option disabled selected>Select Product Type</option>
                        <option value="DVD">DVD</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                    <label for="%s" class="p-2"><i class="bi bi-%s"  style="font-size: 1.25rem; color: #FC7521;"></i> Type Switcher</label>
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>
            </div>',
            $this->model->hasError($this->attr) ? 'is-invalid' : '',
            $this->model->{$this->attr},
            $this->attr,    
            $this->attr,
            $this->attr,
            $this->attr,
            $this->icon,
            $this->model->getFirstError($this->attr)
        );
    }
}