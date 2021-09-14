<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = "categories";
    protected $DBGroup = "default";
    protected $allowedFields = ['title','description'];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
}
