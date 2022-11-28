<?php
namespace app\core\form;

use app\core\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s" class="w-75 offset-md-1 d-grid gap-3">', $action, $method);
        return new Form();
    }


    public static function end()
    {
        echo '</form>';
    }

    public function inField(Model $model, $attr, $icon='')
    {
        return new InputField($model, $attr, $icon);
    }

    public function selField(Model $model, $attr, $icon = '')
    {
        return new SelectField($model, $attr, $icon);
    }
}