<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;


    public function campaignWiseLeads()
    {
        return $this->hasMany(UserEmpWiseLead::class);
    }

  
    public function leads()
    {
        return $this->belongsToMany(Lead::class, 'user_emp_wise_leads');
    }
}
