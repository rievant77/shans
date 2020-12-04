<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'pdfs';
    protected $fillable = ['title', 'description'];
}
