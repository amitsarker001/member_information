<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'father_name', 'mother_name', 'current_address', 'permanent_address',
        'permanent_post', 'permanent_union', 'current_political_position', 'previous_political_position',
        'voter_area_name', 'nid_number', 'religion', 'occupation', 'mobile', 'facebook_id',
        'education', 'case_number', 'is_reason', 'purpose_statement', 'photo_path', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
