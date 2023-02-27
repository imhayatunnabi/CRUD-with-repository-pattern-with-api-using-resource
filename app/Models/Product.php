<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function getImageAttribute($value): string|UrlGenerator|Application
    {
        if($value){
            return Storage::url('products/'.$value);
        }
        return url('public/images/user.jpg');
    }
}