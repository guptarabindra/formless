<?php

/* 
 * Common messages for all the api response 
 */
return [
	    'v1' => [
	    		'success'      => 'success',
	    		'failed'      => 'failed',
	            'register'=> [
		            'email.required'=> [
		                'type' => 'FIELD_REQUIRED',
		                'parameter' => 'email', 
		                'messsage' =>'The email field is required.'
		            ],
  		            'email.regex'=>[
		                'type' => 'FIELD_INVALID',
		                'parameter' => 'email',  
		                'messsage' =>'The email must be a valid email address.'
		            ],
		            'email.unique'=> [
		                'type' => 'FIELD_EXISTS',
	                 	'parameter' => 'email', 
		                'messsage' =>'The email has already been taken.'
		            ],
		            'phone.required'=>[
		                'type' => 'FIELD_REQUIRED',
		                'parameter' => 'phone', 
		                'messsage' =>'The phone field is required.'
		            ],
		            'phone.regex'=>[
		                'type' => 'FIELD_INVALID',
		                'parameter' => 'phone', 
		                'messsage' =>'The phone must be a valid phone number.'
		            ],
		            'phone.unique'=>[
		                'type' => 'FIELD_EXISTS',
		                'parameter' => 'phone', 
		                'messsage' =>'The phone has already been taken.'
		            ]
	            ]
	    ]
];

