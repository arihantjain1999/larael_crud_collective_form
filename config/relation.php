<?php
    return[
        
        'Account' => [
            'Contact' => [  
                'relation_with_function' =>'contacts', 
                'relation_id' => 'Contact_id',
                'relation_with_id' => 'account_id',
                'relation' => 'Many_to_Many',
                'pivot' => 'account_contact'
            ],
        ],
        'Project' => [
            'Contact' => [  
                'relation_with_function' =>'contacts', 
                'relation_id' => 'Contact_id',
                'relation_with_id' => 'project_id',
                'relation' => 'Many_to_Many',
                'pivot' => 'contact_project'
            ],
        ],

        'Contact' => [
            'Account'=>[
                'relation_with_function' =>'account', 
                'relation_id' => 'Account_id',
                'relation_with_id' => 'contact_id',
                'relation' => 'Many_to_Many',
                'pivot' => 'account_contact'
            ],
            'Project'=> [
                'relation_with_function' =>'projects', 
                'relation_id' => 'Project_id',
                'relation_with_id' => 'contact_id',
                'relation' => 'Many_to_Many',
                'pivot' => 'contact_project'
            ],
        ],
    ];


?>