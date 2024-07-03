<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function leaves() {
        return $this->hasMany(Leave::class);
    }

    public function employeeWiseLeads()
    {
        return $this->hasMany(UserEmpWiseLead::class);
    }

  
    public function leads()
    {
        return $this->belongsToMany(Lead::class, 'user_emp_wise_leads');
    }

    

}
