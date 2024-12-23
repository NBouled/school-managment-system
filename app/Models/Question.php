<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'image',
        'description',
        'options',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
        ];
    }


    public function exam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Exam::class);
    }
}
