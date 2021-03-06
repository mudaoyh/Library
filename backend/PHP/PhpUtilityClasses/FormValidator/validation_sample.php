<?php

    $POST = array(
            'name' => 'Fred Scuttle',
            'age' => 42,
            'contact_email'=>'             fred@example.com',
            'url'=>'http://phpro.org');

    /*** an array of rules ***/
    $rules_array = array(
        'name'=>array('type'=>'string',  'required'=>true, 'min'=>30, 'max'=>50, 'trim'=>true),
        'age'=>array('type'=>'numeric', 'required'=>true, 'min'=>1, 'max'=>120, 'trim'=>true));

    /*** a new validation instance ***/
    $val = new validation;

    /*** use POST as the source ***/
    $val->addSource($POST);

    /*** add a form field rule ***/
    $val->addRule('contact_email', 'email', true, 1, 255, true)
        ->addRule('url', 'url', false, 10, 150, false);

    /*** add an array of rules ***/
    $val->addRules($rules_array);

    /*** run the validation rules ***/
    $val->run();

    /*** if there are errors show them ***/
    if(sizeof($val->errors) > 0)
    {
        print_r($val->errors);
    }

    /*** show the array of validated and sanitized variables ***/
    print_r($val->sanitized);
?>
