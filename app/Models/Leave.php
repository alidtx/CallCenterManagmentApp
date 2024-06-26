<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    public function employee() {

        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function designation() {

        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }

    public function Department() {

        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function user() {
        
        return $this->belongsTo(User::class, 'user_id', 'id');
    }   
}
