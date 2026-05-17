<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $fillable=['heading','image','description'];

    public static function fetchData($pagination=false, $perPage=10,$search = ''){

        $query=self::select('id','heading','description','image','category_id')->orderBy('id', 'desc');


        if ($search) {
            $query->where('heading', 'like', '%' . $search . '%');
        }

        if ($pagination) {
            return $query->paginate($perPage)->withPath(route('testimonials'));
        }
        
        return $query->get();
    }

    // public function deleteTestimonial(): void
    // {
    //     if ($this->getRawOriginal('image')) {
    //         Storage::disk('public')->delete('admin/testimonials/' . $this->getRawOriginal('image'));
    //     }

    //     $this->delete();
    // }
}
