<?php

namespace App\Models\Admin;

use App\Models\Backend\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'admin';
    protected $guarded =[];

    public function Role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    
}
