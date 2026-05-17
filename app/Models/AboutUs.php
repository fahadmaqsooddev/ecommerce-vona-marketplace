<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AboutUs extends Model
{
    protected $fillable = ['heading', 'image', 'description'];

    public static function fetchData()
    {
        return self::select('id', 'heading', 'description', 'image')->first();
    }

    public static function updateData(int $id, array $data, $image = null): bool
    {
        if ($image) {
            $extension = $image->getClientOriginalExtension();
            $fileName  = uniqid('aboutus_', true) . '.' . $extension;
            $image->storeAs(
                'admin/aboutus',
                $fileName,
                'public'
            );
            $data['image']=$fileName;

        }

        return self::where('id', $id)->update($data);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image
                ? asset('storage/admin/aboutus/' . $this->image)
                : null
        );
    }
}