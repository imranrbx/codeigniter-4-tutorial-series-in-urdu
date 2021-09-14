<?php namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity {
    protected $attributes = [
        'id'         => null,
        'username'   => null,
        'email'      => null,
        'password'   => null,
        'options'    => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    protected $datamap = [
        'full_name'      => 'username',
        'user_full_name' => 'username',
    ];
    protected $casts = [
        'username'       => 'float', //integer, float, boolean, array, object, datetime, timestamp,
        'options'        => 'array',
        'options_object' => 'json',
        'options_array'  => 'json-array',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // public function setPassword() {
    //     $this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_DEFAULT);
    //     return $this;
    // }
    public function getPassword() {
        return 'N/A';
    }
}
