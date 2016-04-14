<?php
/*
|--------------------------------------------------------------------------
| Macros
|--------------------------------------------------------------------------
*/
Form::macro('submitForm', function($text, $class = "btn-primary") {

    return "<button type=\"submit\" class=\"btn ".$class."\">".$text."</button>";

});

// to use with http://msurguy.github.io/ladda-bootstrap/
// Ladda.bind('.loading-state', { timeout: 3000 } );
Form::macro('submitFormLoading', function($text, $class = "btn-primary") {

    return "<button class=\"btn ".$class." ladda-button loading-state\" data-style=\"expand-left\">
                <span class=\"ladda-label\">".$text."</span>
            </button>";

});

Form::macro('fileField', function($name, $label = null, $attributes = array(), array $size = [] )
{
    $element = Form::file($name, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $label, $element, $size, $attributes);
});

Form::macro('textField', function($name, $label = null, $value = null, $attributes = array(), array $size = [] )
{
    $element = Form::text($name, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $label, $element, $size, $attributes);
});

Form::macro('passwordField', function($name, $label = null, $attributes = array(), array $size = [])
{
    $element = Form::password($name, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $label, $element, $size, $attributes);
});

Form::macro('textareaField', function($name, $label = null, $value = null, $attributes = array(), array $size = [])
{
    $element = Form::textarea($name, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $label, $element, $size, $attributes);
});

Form::macro('selectField', function($name, $label = null, $options, $value = null, $attributes = array(), array $size = [])
{
    $element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $label, $element, $size, $attributes);
});

Form::macro('selectMultipleField', function($name, $label = null, $options, $value = null, $attributes = array(), array $size = [] )
{
    $attributes = array_merge($attributes, ['multiple' => true]);
    $element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $label, $element, $size, $attributes);
});

Form::macro('checkboxField', function($name, $label = null, $value = 1, $checked = null, $attributes = array())
{
    $attributes = array_merge(['id' => 'id-field-' . $name], $attributes);

    $out = '<div class="checkbox';
    $out .= fieldError($name) . '">';
    $out .= '<label>';
    $out .= Form::checkbox($name, $value, $checked, $attributes) . ' ' . $label;
    $out .= '</div>';

    return $out;
});

function fieldWrapper($name, $label, $element, array $size = [], $attributes)
{
    $required = false;
    foreach ($attributes as $k => $v) {
        if($k) {
            if($k == 'required') {
                $required = true;
                break;
            }
        } else {
            if($v == 'required') {
                $required = true;
                break;
            }
        }
    }

    $out = '<div class="form-group';
    $out .= fieldError($name) . '">';
    if(empty($size) == false) {
        $out .= fieldLabel($name, $label, $size[0], $required);
        $out .= '<div class="col-sm-'.$size[1].'">';
        $out .= $element;
        $out .= '</div>';
    } else {
        $out .= fieldLabel($name, $label, null, $required);
        $out .= $element;
    }

    $out .= appendErrorMessage($name);

    $out .= '</div>';

    return $out;
}

function fieldError($field)
{
    $error = '';
    if ($errors = Session::get('errors'))
    {
        $error = $errors->first($field) ? ' has-error' : '';
    }

    return $error;
}

function fieldLabel($name, $label, $size = null, $required = false)
{
    if (is_null($label)) return '';

    $name = str_replace('[]', '', $name);

    if($size != null) {
        $out = '<label for="id-field-' . $name . '" class="control-label col-sm-'.$size.'">';
    } else {
        $out = '<label for="id-field-' . $name . '" class="control-label">';
    }

    if($required) {
        $out .= $label . ' <span style="color:red">*</span></label>';
    } else {
        $out .= $label . '</label>';
    }


    return $out;
}

function fieldAttributes($name, $attributes = array())
{
    $name = str_replace('[]', '', $name);
    $default = ['class' => 'form-control input-sm', 'id' => 'id-field-' . $name];

    //add new classes
    foreach($attributes as $k => $v) {
        if($k && $k == 'class') {
            $default['class'] = $default['class'] ." ". $v;
            unset($attributes[$k]);
        }
    }

    return array_merge($default, $attributes);
}

function appendErrorMessage($field)
{
    $error = '';
    if ($errors = Session::get('errors'))
    {
        $error = $errors->first($field) ? $errors->first($field) : '';
    }

    $error = "<span class=\"help-block\">".$error."</span>";

    return $error;
}