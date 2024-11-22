<?php

if (!function_exists('show_error_imput')) {

    function show_error_imput(string $imputFild): string
    {
        $imputFild = strtolower($imputFild);
        if (!session()->has('errorsValidation')) {
            return '';
        }
        $errorsValidation = esc(session('errorsValidation'));
            return !array_key_exists($imputFild, $errorsValidation) ?
                "" :
                "<span class='text-danger'>{$errorsValidation[$imputFild]}</span>";
    }

}



function form_group($name, $label, $type, $value, $placeholder)
    {
        return '
        <div class="form-group col-md-4">
            <label for="' . $name . '">' . $label . ':</label>
            <input type="' . $type . '" class="form-control" name="' . $name . '" value="' . $value . '" id="' . $name . '" placeholder="' . $placeholder . '">
       
       
       
        </div>
    ';

    }



//function form_checkbox($name, $value, $checked, $label) {
//    return '
//        <input type="checkbox" class="custom-control-input" name="' . $name . '" id="' . $name . '" value="' . $value . '" ' . $checked . '>
//        <label class="custom-control-label" for="' . $name . '">' . $label . '</label>
//    ';
//}
