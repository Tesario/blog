<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return htmlspecialchars_decode(date("j. n. Y", strtotime($value)));
    }

    public function getTextAttribute($text)
    {
        $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';

        return preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', nl2br($text));
    }
}
