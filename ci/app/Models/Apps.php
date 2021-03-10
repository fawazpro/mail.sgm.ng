<?php
namespace App\Models;

use CodeIgniter\Model;

class Apps extends Model
{
    protected $table      = 'apps';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['appcode', 'server', 'sender_email', 'sender_password', 'port', 'reciever'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}