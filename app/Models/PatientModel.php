<?php 
namespace App\Models;
use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients_basics';

    protected $primaryKey = 'ID';
    
    protected $allowedFields = ['name', 'medical_id'];
}