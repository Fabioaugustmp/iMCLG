<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
    'active_url' => 'A URL :attribute informada não é válida.',
    'after' => 'A data :attribute deve ser posterior à :date.',
    'after_or_equal' => 'A data :attribute deve ser igual ou posterior a :date.',
    'alpha' => 'O campo :attribute só pode conter letras.',
    'alpha_dash' => 'O campo :attribute só pode conter letras, números, traços e underline.',
    'alpha_num' => 'O campo :attribute só pode conter letras e números.',
    'array' => 'O campo :attribute deve conter uma matriz.',
    'before' => 'A data :attribute deve ser anterior à :date.',
    'before_or_equal' => 'A data :attribute deve ser igual ou anterior a :date.',
    'between' => [
        'numeric' => 'O valor do campo :attribute deve estar entre :min e :max.',
        'file' => 'O tamanho do arquivo :attribute deve estar entre :min e :max kilobytes.',
        'string' => 'O campo :attribute deve ter entre :min e :max caracteres.',
        'array' => 'O campo :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'O campo de confirmação :attribute não é válido.',
    'date' => 'A informação :attribute não é uma data válida.',
    'date_equals' => 'A data :attribute deve ser igual a :date.',
    'date_format' => 'O formato da data :attribute não está no padrão :format.',
    'different' => 'Os campos :attribute e :other devem ser diferentes.',
    'digits' => 'O campo :attribute deve possuir :digits digitos.',
    'digits_between' => 'O campo :attribute deve ter entre :min e :max digitos.',
    'dimensions' => 'A :attribute está com as dimensões inválidas.',
    'distinct' => 'O campo :attribute possui um valor duplicado.',
    'email' => 'o campo :attribute precisa conter um email válido.',
    'ends_with' => 'O campo :attribute deve terminar com um dos seguintes: :values.',
    'exists' => 'O campo :attribute está inválido.',
    'file' => 'O campo :attribute precisa ser um arquivo.',
    'filled' => 'O campo :attribute deve ser preenchido.',
    'gt' => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file' => 'O tamanho do arquivo :attribute deve ser maior que :value kilobytes.',
        'string' => 'O campo :attribute deve ter mais que :value caracteres.',
        'array' => 'O campo :attribute deve ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O campo :attribute deve ser maior ou igual :value.',
        'file' => 'O tamanho do arquivo :attribute deve ser maior ou igual a :value kilobytes.',
        'string' => 'O campo :attribute deve ter quantidade de caracteres maior ou igual a :value.',
        'array' => 'A matriz :attribute deve ter pelo menos :value item(ns).',
    ],
    'image' => 'O arquivo :attribute deve ser uma imagem.',
    'in' => 'O campo :attribute está inválido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => 'O :attribute deve ser um número inteiro.',
    'ip' => 'O IP em :attribute deve ser válido.',
    'ipv4' => 'O IP em :attribute deve ser IPv4 válido.',
    'ipv6' => 'O IP em :attribute deve ser IPv6 válido.',
    'json' => 'O :attribute deve ser um string JSON.',
    'lt' => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file' => 'O arquivo :attribute deve ter menos que :value kilobytes.',
        'string' => 'O campo :attribute deve ter menos que :value caracteres.',
        'array' => 'O campo :attribute deve ter menos que :value item(ns).',
    ],
    'lte' => [
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file' => 'O arquivo :attribute deve ter menos que :value kilobytes.',
        'string' => 'O campo :attribute deve ser menor ou igual a :value caracteres.',
        'array' => 'O campo :attribute deve ter menos que :value item(ns).',
    ],
    'max' => [
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file' => 'O arquivo :attribute não pode ter mais que :max kilobytes.',
        'string' => 'O campo :attribute não pode ter mais que :max caracteres.',
        'array' => 'O campo :attribute não pode ter mais que :max item(ns).',
    ],
    'mimes' => 'O arquivo :attribute deve ser do tipo: :values.',
    'mimetypes' => 'O arquivo :attribute deve ser do tipo: :values.',
    'min' => [
        'numeric' => 'O campo :attribute deve ser no mínimo :min.',
        'file' => 'O arquivo :attribute deve ter no mínimo :min kilobytes.',
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'array' => 'O campo :attribute deve ter no mínimo :min item(ns).',
    ],
    'multiple_of' => 'O campo :attribute deve ser um múltiplo de :value.',
    'not_in' => 'O campo selecionado :attribute é invalido.',
    'not_regex' => 'O formato do campo :attribute está inválido.',
    'numeric' => 'O campo :attribute deve ser um número.',
    'password' => 'As credenciais informadas estão inválidas.',
    'present' => 'O campo :attribute deve estar presente.',
    'regex' => 'O formato do campo :attribute está inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é exigido quando o campo :other é :value.',
    'required_unless' => 'O campo :attribute é exigido exceto quando :other estiver em :values.',
    'required_with' => 'O campo :attribute é exigido quando :values está presente.',
    'required_with_all' => 'O campo :attribute é exigido quando :values está presente.',
    'required_without' => 'O campo :attribute é exigido quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é exigido quando nenhum dos valores :values está presente.',
    'prohibited' => 'O campo :attribute é proibido.',
    'prohibited_if' => 'O campo :attribute é proibido quando :other é :value.',
    'prohibited_unless' => 'O campo :attribute é exigido exceto quando :other está em :values.',
    'same' => 'Os campos :attribute e :other devem ser iguais.',
    'size' => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file' => 'O arquivo :attribute deve ter :size kilobytes.',
        'string' => 'O campo :attribute deve ter :size caracteres.',
        'array' => 'O campo :attribute deve conter :size item(ns).',
    ],
    'starts_with' => 'O campo :attribute deve começar com um dos seguintes: :values.',
    'string' => 'O campo :attribute deve ser uma palavra.',
    'timezone' => 'O campo :attribute deve ser uma zona válida.',
    'unique' => 'O :attribute já foi selecionado.',
    'uploaded' => 'O upload do arquivo :attribute falhou.',
    'url' => 'O formato :attribute está inválido.',
    'uuid' => 'O campo deve :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
