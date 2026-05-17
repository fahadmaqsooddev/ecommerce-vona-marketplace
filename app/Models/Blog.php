<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class Blog extends Model
{
    protected $fillable=['heading','image','description'];

    public static function fetchData($pagination=false, $perPage=10,$search = ''){

        $query=self::select('id','heading','description','image')->orderBy('id', 'desc');


        if ($search) {
            $query->where('heading', 'like', '%' . $search . '%');
        }

        if ($pagination) {
            return $query->paginate($perPage)->withPath(route('blogs'));
        }
        
        return $query->get();
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image
                ? asset('storage/admin/blogs/' . $this->image)
                : null
        );
    }

    public static function store(string $heading, string $description, UploadedFile $image): self
    {
        $imagePath = null;

        if ($image) {
            $extension = $image->getClientOriginalExtension();
            $fileName  = uniqid('blog_', true) . '.' . $extension;
            $image->storeAs('admin/blogs', $fileName, 'public');
            $imagePath = $fileName;
        }

        return self::create([
            'heading'     => $heading,
            'description' => $description,
            'image'       => $imagePath,
        ]);
    }

    public function updateBlog(string $heading, string $description, $image, ?string $existingImage): void
    {
        $fileName = $existingImage;

        if ($image) {

            if ($existingImage) {
                Storage::disk('public')->delete('admin/blogs/' . $existingImage);
            }

            $extension = $image->getClientOriginalExtension();
            $fileName  = uniqid('blog_', true) . '.' . $extension;
            $image->storeAs('admin/blogs',$fileName,'public');

        }

        $this->update([
            'heading'     => $heading,
            'description' => $description,
            'image'       => $fileName
        ]);
    }

    public function deleteBlog(): void
    {
        if ($this->getRawOriginal('image')) {
            Storage::disk('public')->delete('admin/blogs/' . $this->getRawOriginal('image'));
        }

        $this->delete();
    }
}
