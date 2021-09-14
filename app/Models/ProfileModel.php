<?php namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = "profiles";
    protected $DBGroup = "default";
    protected $allowedFields = ['user_id','name','thumbnail','address','city','state','country'];
    protected $useTimestamps = true;
    protected $validationRules = [
        'name' => 'alpha_numeric_space|min_length[3]',
        'user_id' => 'required|is_unique[profiles.user_id]',
    ];
    protected $validationMessages = [];
}
