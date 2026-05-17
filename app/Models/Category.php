<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class Category extends Model
{
    protected $fillable=['heading','image','description'];

    public static function fetchData($pagination=false, $perPage=10,$search = ''){

        $query=self::select('id','heading','description','image')->orderBy('id', 'desc');


        if ($search) {
            $query->where('heading', 'like', '%' . $search . '%');
        }

        if ($pagination) {
            return $query->paginate($perPage)->withPath(route('categories'));
        }
        
        return $query->get();
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image
                ? asset('storage/admin/categories/' . $this->image)
                : null
        );
    }

   public static function store(
    string $heading,
    string $description,
    UploadedFile $image
    ): self
    {
        $extension = $image->getClientOriginalExtension();

        $fileName = uniqid('cat_', true) . '.' . $extension;

        $image->storeAs('admin/categories', $fileName, 'public');

        return self::create([
            'heading'     => $heading,
            'description' => $description,
            'image'       => $fileName,
        ]);
    }

    public function updateCategory(
    string $heading,
    string $description,
    ?UploadedFile $image = null,
    ?string $existingImage = null
    ): void {

        $fileName = $existingImage;

        if ($image) {

            if ($existingImage) {
                Storage::disk('public')
                    ->delete('admin/categories/' . $existingImage);
            }

            $extension = $image->getClientOriginalExtension();

            $fileName = uniqid('cat_', true) . '.' . $extension;

            $image->storeAs(
                'admin/categories',
                $fileName,
                'public'
            );
        }

        $this->update([
            'heading'     => $heading,
            'description' => $description,
            'image'       => $fileName,
        ]);
    }

    public function deleteCategory(): void
    {
        if ($this->getRawOriginal('image')) {
            Storage::disk('public')->delete('admin/categories/' . $this->getRawOriginal('image'));
        }

        $this->delete();
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

  
}
