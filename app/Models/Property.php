<?php

namespace App\Models;

use App\Models\Admin\PropertyType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function GalleryImage()
    {
        return $this->hasMany(PropertyGalleryImage::class, 'property_id');
    }
    public function LegalDocument()
    {
        return $this->hasMany(PropertyLegalDocument::class, 'property_id');
    }

    public function PropertyType()
    {
        return $this->belongsTo(PropertyType::class, 'p_type');
    }
    public function City()
    {
        return $this->belongsTo(City::class, 'p_city');
    }
}
