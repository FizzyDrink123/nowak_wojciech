<?php

return[
    'attributes'=>[
        'created_at'=>'Utworzono',
        'updated_at'=>'Zaktualizowano',
        'deleted_at'=>'Usunięto',
    ],
    'messages'=>[
      'successes'=>[
        'stored_title'=>'Utworzony',
        'update_title'=>'Zaktualizowano',
        'destroy_title'=>'Usunięto',
        'restore_title'=>'Przywrócono',
        'destroy_description'=>'Usunięto :model',
        'restore_description'=>'Przywrócono :model',
      ]  
    ],
    'dialogs'=>[
        'soft_delete'=>[
            'title'=>'Usuwanie',
            'description'=>'Czy na pewno usunąć :model',
        ],
        'restore' =>[
            'title'=> 'Przywracanie',
            'descritpion'=>'Czy na pewno przywrócić :model',
        ],
    ],
    'actions'=>[
        'edit'=>'Edytuj',
        'destroy'=>'Usuń',
        'restore'=>'Przywróć',
    ],
    'yes'=>'Tak',
    'no'=>'Nie',
    'cancel'=>'Anuluj',
    'store'=>'Utwórz',
    'update'=>'Aktualizuj',
    'save'=>'Zapisz',
    'back'=>'Wstecz',
    'enter'=>'Wprowadż wartość',
    'account'=>[
        'manage_account'=>'Zarządzanie profilem',
        'profile'=>'Profil',
        'name'=>'Nazwisko i imię',
        'password'=>'Hasło',
        'password_confirm'=>'Powtórz hasło',
        'password_reset'=>'Resetuj hasło',
        'email'=>'Email',
        'remember_me'=>'Zapamiętaj mnie',
        'already_registered'=>'Już zarejestrowany',
        'confirm'=>'Potwierdź',
        'confirm_password_info'=>'Dostęp do tej funkcjonalności wymaga podania maila',
        'forgot_password'=>'Zapomniałeś hasła?',
        'forgot_password_info'=>'Zapomniałeś hasła? Podaj adres email',
        'send'=>'Wyślij',
        'logout'=>'Wyloguj się',
        'login'=>'Zaloguj się',
        'register'=>'Zarejestruj',
        'api_tokens'=>[
            'manage'=>'Zarzadzaj tokenami API',
            'create_new'=>'Stwórz nowy API token',
            'description'=>'API tokens allow thrid-party service to auto',
            'toke_name'=>'Nazwa tokenu',
            'permissions'=>'Uprawnienia'
        ],
        'team'=>[
            'manage'=>'Zarządzanie zespołem',
            'settings'=>'Ustawienia zespołu',
            'create_new'=>'Stwórz nowy zespół',
            'switch'=>'Zmień zespół',
        ]
        ],
        'navigation'=>[
            'dashboard'=>'Dashboard',
            'log-viewer'=>'Logi',
            'users'=>'Użytkownicy',
            'categories'=>'Kategorie',
            'manufacturers'=>'Reżyserzy'
        ],
    ];