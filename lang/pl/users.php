<?php

return[
    'attributes'=>[
        'name'=>'Nazwisko i imię',
        'email'=>'Email',
        'roles'=>'Role',
        'created_at'=>'Utworzono',
        'email_verified_at'=>'Email zweryfikowano',
    ],
    'actions'=>[
        'assign_admin_role'=>'Nadaj uprawnienia administratora',
        'assign_worker_role'=>'Nadaj uprawnienia pracownika',
        'remove_admin_role'=>'Odbierz uprawnienia administratora',
        'remove_worker_role'=>'Odbierz uprawnienia pracownika',
    ],
    'messages'=>[
        'successes'=>[
            'admin_role_assigned'=>'Ustawiono rolę admina dla :user',
            'admin_role_removed'=>'Odebrano rolę admina :user',
            'worker_role_assigned'=>'Ustawiono rolę pracownika dla :user',
            'worker_role_removed'=>'Odebrano rolę pracownika :user',
        ]
    ]
];