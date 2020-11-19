<?php
return [
    'transaction_statues' => [
        'pending' => 'В ожидании',
        'fail' => 'Ошибка',
        'cancelled' => 'Отменен',
        'success' => 'Успех'
    ],

    'http_errors' => [
        '404' => [
           'title' => 'Страница не найдена',
           'text' => 'Запрашиваемая страница не найдена, либо произошла ошибка'
        ],
        '429' => [
            'title' => 'Слишком много запросов',
            'text' => 'Вы отправили слишком много запросов. Подождите, пожалуйста минуту'
        ],
        'default' => [
           'title' => 'Произошла ошибка',
           'text' => 'Извините, что-то пошло не так'
        ],
    ]
];
