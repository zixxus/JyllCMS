<?php

class Forms
{

    function __construct()
    {
        parent::__construct();
    }

    public function makeform($action, $label = '', $under_label = '')
    {
        echo '<form id="form" class="form" name="form" action="' . $action . '" enctype="multipart/form-data" method="post"  accept-charset="UTF-8">';

        if ($label != '') {
            echo '<h1>' . $label . '</h1>';
        }
        echo '<div class="content">';
        if ($under_label != '') {
            echo '<div class="intro">' . $under_label . '</div>';

        }

    }

    public static function endform()
    {
        echo '</div></form>';
    }

    public static function input_form($type, $name, $label = '', $id = '', $value = '', $required = '1')
    {
        if ($required == 1) {
            $required = 'required';
        }
        if ($value != null) {
            $value = 'value="' . $value . '"';
        }
        echo '<div class="field"><label for="' . $label . '">' . $label . '</label><input ' . $value . ' id="' . $id . '" name="' . $name . '" ' . $required . ' autofocus type="' . $type . '"></div>';

    }

    public static function other_form($type, $name, $label = '', $id = '', $required = '1', $placeholder = '')
    {
        if ($required == 1) {
            $required = 'required';
        }
        if ($type == 'textarea') {
            echo '<div class="field"><label for="textarea">' . $label . '</label><textarea id="' . $id . '" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '" pattern="pattern" maxlength="99" wrap="hard" ' . $required . ' autofocus></textarea></div>';

        }
    }

    public static function select_form($name, $array = '', $label = '', $id = '', $required = '1')
    {
        echo '<div class="field"><label for="select">' . $label . '</label><select id="' . $id . '" name="' . $name . '" ' . $required . ' autofocus>';

        foreach ($array as $key => $value) {
            echo '<option value="' . $key . '">' . $value . '</option>';
        }

        echo '</select></div>';
    }

    public static function date_form($name, $label = '', $id = '', $required = '1')
    {


        echo '<div class="field"><label for="select">' . $label . '</label><input class="' . $id . '" name="' . $name . '" id="' . $id . '" required="' . $required . '" type="date" >';


        echo '</div>';
    }

    public static function button_form($name, $label = '', $id = '', $required = '1')
    {


        echo '<div class="field"> <button type="button" name="' . $name . '" required="' . $required . '" id="' . $id . '">' . $label . '</button> ';


        echo '</div>';
    }


}