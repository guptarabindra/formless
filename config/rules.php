<?php

/* 
 * Rules for all the api POST, PUT, DELETE etc. methods.
 */
return [
        'v1' => [

            'register'=> [
	            'email' => 'required|unique:users|regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/i',
	            'phone' => 'required|unique:users|regex:/^\d{10,13}$/'
            ]
        ]
];
