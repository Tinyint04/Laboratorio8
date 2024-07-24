<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'priority',
        'completed',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(etiqueta::class, 'etiqueta_task');
    }

    public function getTagsListAttribute()
    {
        return $this->tags->pluck('name')->implode(', ');
    }

    
}
