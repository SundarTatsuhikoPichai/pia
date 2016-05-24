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

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => ':attribute は無効なURLです。',
    'after'                => ':attribute は:date.より後の日付でなければいけません。',
    'alpha'                => ':attribute にはアルファベット以外使用できません。',
    'alpha_dash'           => ':attribute にはアルファベット、数字、ハイフン、アンダーバー以外使用できません。',
    'alpha_num'            => ':attribute にはアルファベット、数字以外使用できません。',
    'array'                => 'The :attribute must be an array.',
    'before'               => ':attribute は:dateより前の日付でなければなりません。',
    'between'              => [
        'numeric' => ':attribute は:min～:maxの範囲である必要があります。',
        'file'    => ':attribute のファイルサイズは:min～:maxキロバイトの範囲である必要があります。',
        'string'  => ':attribute の長さは:min～:max文字の範囲である必要があります。',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => ':attribute は確認欄と一致しませんでした。',
    'date'                 => ':attribute は正しい日付ではありません。',
    'date_format'          => ':attribute は:format形式ではありません。',
    'different'            => ':attribute と:otherは異なる必要があります。',
    'digits'               => ':attribute は:digits桁である必要があります。',
    'digits_between'       => ':attribute は:min～:max桁の範囲である必要があります。',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute は正しいメールアドレスではありません。',
    'exists'               => '選択された:attribute は存在しませんでした。',
    'filled'               => 'The :attribute field is required.',
    'image'                => ':attribute は画像ファイルである必要があります。',
    'in'                   => '選択された:attributeは正しくありません。',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute は整数である必要があります。',
    'ip'                   => ':attribute は正しいIPアドレスではありません。',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute は:max以下である必要があります。',
        'file'    => ':attribute のファイルサイズは:maxキロバイト以下である必要があります。',
        'string'  => ':attribute の長さは:max文字以下である必要があります。',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => ':attribute のファイル種別は:valuesである必要があります。',
    'min'                  => [
        'numeric' => ':attribute は:min以上である必要があります。',
        'file'    => ':attribute のファイルサイズは:minキロバイト以上である必要があります。',
        'string'  => ':attribute の長さは :min文字以上である必要があります。',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => '選択された:attributeは正しくありません。',
    'numeric'              => ':attribute は数値である必要があります。',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attribute の形式は正しくありません。',
    'required'             => ':attribute は必須です。',
    'required_if'          => ':otherが:valueである場合、:attributeは必須です。',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => ':valuesが指定されている場合、:attributeは必須です。',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => ':attributeと:otherが一致しません。',
    'size'                 => [
        'numeric' => ':attribute は:sizeである必要があります。',
        'file'    => ':attribute のファイルサイズは:sizeキロバイトである必要があります。',
        'string'  => ':attribute の長さは:size文字である必要があります。',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => ':attribute はすでに使われています。',
    'url'                  => ':attribute は正しいURL形式ではありません。',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
