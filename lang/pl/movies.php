<?php


return [
    'attributes' => [
        'image'=> 'Zdjęcie',
        'name' => 'Nazwa',
        'description'=>'Opis',
        'manufacturer'=>'Reżyser',
        'categories'=>'Kategorie',
    ],
    'actions'=>[
        'create'=>'Dodaj film',
    ],
    'labels'=>[
        'create_form_title' => 'Tworzenie nowego filmu',
        'edit_form_title'=>'Edycja filmu',
    ],
    'messages'=>[
        'successes'=>[
            'stored'=>'Dodano film :name',
            'updated'=>'Zaktualizowano film :name',
            'destroy'=>'Usunięto film :name',
            'restore'=>'Przywrócono film :name',
        ],
        'errors'=>[
            'image_deleted'=>'Nie udało się usunąć zdjęcia dla filmu :name',
        ],
    ],
    'dialogs'=>[
        'soft_delete'=>[
            'title'=>'Usuwanie filmu',
            'description'=>'Czy na pewno usunąć film :name',
        ],
        'restore' => [
            'title'=>'usuwanie filmu',
            'description'=>'Czy na pewno przywrócić film :name',
        ],
        'image_delete'=>[
            'title'=>'Usuwanie zdjęcia',
            'description'=>'Czy na pewno usunąć zdjęcie dla filmu :name',
        ],
    ],
    'filters'=>[
        'categories'=>'Nazwa kategorii',
        'manufacturer'=>'Nazwa reżysera',
    ]
];