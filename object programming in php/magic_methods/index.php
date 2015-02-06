<?php

// Require app files
require 'app/User.php';
require 'app/Validator.php';
require 'app/Helper.php';

// Set data and validation rules
$rules = array('email' => 'required|email', 'password' => 'required|min:8');
$data = array('email' => 'MJ@123.com', 'password' => '12346789', 'foo' => 'bar');

// Run validation
$validator = new Validator();
if ($validator->validate($data, $rules) == true) {
    
    // Validation passed. Set user values.
    $joost = new User($data);
    
    $joost->email = 'someotheremail@test.com';
    $joost->password = 'sadfsadfsad';
    
    // var_dump($joost->email);
    // var_dump($joost->password);
    
    // Dump user
    // var_dump($joost);
    
    echo $joost;
}
else {
    
    // Validation failed. Dump validation errors.
    var_dump($validator->getErrors());
}