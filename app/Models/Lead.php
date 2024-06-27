<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    
     
  
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'user_emp_wise_leads');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_emp_wise_leads');
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'user_emp_wise_leads');
    }

     

}
