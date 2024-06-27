<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmpWiseLead extends Model
{
    use HasFactory;

    protected $table = 'user_emp_wise_leads';

     public function lead() {

      return $this->belongsTo(Lead::class);

     }

     public function employee() {

        return $this->belongsTo(Employee::class);
  
    }

       public function campaign() {

        return $this->belongsTo(campaign::class);
  
    }

       public function user() {

        return $this->belongsTo(user::class);
        
   }

}
