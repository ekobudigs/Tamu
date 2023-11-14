<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorSurvey extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'visitor_id', 'survey_answer', 'survey_scale'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
