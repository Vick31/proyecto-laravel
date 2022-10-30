<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    protected $fillable = ['title','start', 'end', 'color', 'time', 'description', 'users_id', 'clients_id', 'reports_id'];
}
