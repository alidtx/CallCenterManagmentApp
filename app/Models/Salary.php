<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    public function employee() {

      return $this->hasOne(Employee::class, 'id', 'employee_id');

    }

    public function designation () {

    return $this->hasOne(Designation::class, 'id', 'designation_id');

    } 

    public function department () {

      return $this->hasOne(Designation::class, 'id', 'department_id');
  
      } 
}
