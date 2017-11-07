<?php

return [
    'admin' => [
        'users'       => [
            'login'  => [
                'email'    => 'required|email|exists:users',
                'password' => 'required|between:6,20',
            ],
            'store'  => [
                'roles'    => 'array|nullable',
                'name'     => 'required|between:2,20|unique:users',
                'email'    => 'required|email|unique:users',
                'password' => 'required|between:6,20',
            ],
            'update' => [
                'roles'    => 'array|nullable',
                'name'     => 'required|between:2,20',
                'email'    => 'required|email',
                'password' => 'between:6,20|nullable',
            ],
        ],
        'menus'       => [
            'store'  => [
                'name'     => 'required|max:191',
                'icon'     => 'nullable|max:191',
                'slug'     => 'required|max:191',
                'weight'   => 'required|numeric',
                'top_id'   => 'required|numeric',
                'describe' => 'max:191|nullable',
            ],
            'update' => [
                'name'     => 'required|max:191',
                'icon'     => 'nullable|max:191',
                'slug'     => 'required|max:191',
                'weight'   => 'required|numeric',
                'top_id'   => 'required|numeric',
                'describe' => 'max:191|nullable',
            ],
        ],
        'permissions' => [
            'store'  => [
                'alias'    => 'required',
                'describe' => 'nullable',
                'name'     => 'required|between:2,50|unique:permissions',
            ],
            'update' => [
                'alias'    => 'required',
                'describe' => 'nullable',
                'name'     => 'required|between:2,50',
            ],
            'batch'  => [
                'id' => 'array|nullable',
            ],
        ],
        'roles'       => [
            'store'  => [
                'alias'       => 'required',
                'permissions' => 'array|nullable',
                'describe'    => 'nullable',
                'name'        => 'required|between:2,20|unique:roles',
            ],
            'update' => [
                'alias'       => 'required',
                'permissions' => 'array|nullable',
                'describe'    => 'nullable',
                'name'        => 'required|between:2,20',
            ],
            'batch'  => [
                'id' => 'array|nullable',
            ],
        ],
    ],
];