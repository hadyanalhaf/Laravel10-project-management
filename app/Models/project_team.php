<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_team extends Model
{
    use HasFactory;
    // protected $table = 'project_team';
    protected $fillable = ['project_id', 'team_member_id', 'team_name'];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    // Relasi Many-to-One dengan tabel 'team_members'
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'team_member_id');
    }
}
