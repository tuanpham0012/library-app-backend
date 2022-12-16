<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'authors';

    protected $fillable = [
        'code',
        'name',
        'date_of_birth',
        'country',
        'story',
        'image',
    ];

    public function formatData($data)
    {
        $data['date_of_birth'] = isset($data['date_of_birth']) ? DateTime::createFromFormat('d/m/Y', $data['date_of_birth'])->format('Y-m-d') : date('Y-m-d');
        return $data;
    }
}
