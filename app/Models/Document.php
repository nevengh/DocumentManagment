<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'document_type_id',
        'user_id',
        'file'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function documentType(){
        return $this->belongTo(DocumentType::class,'document_type_id');
    }

    public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}
}
