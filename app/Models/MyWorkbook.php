<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyWorkbook extends Model
{
    protected $table = 'MyWorkbook';

    protected $fillable = [
        'Reference',
        'Task Name',
        'Start Date',
        'End Date',
        'Status',
        'Remark',
        'Signature'
    ];

    public $timestamps = false;
}