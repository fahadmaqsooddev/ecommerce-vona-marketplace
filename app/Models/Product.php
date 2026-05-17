<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable=['heading','category_id','description','price','image','gender','discount'];

    public static function fetchData($pagination=false, $perPage=10,$search = ''){

        $query=self::with('category')->select('id','heading','description','image','category_id')->orderBy('id', 'desc');


        if ($search) {
            $query->where('heading', 'like', '%' . $search . '%');
        }

        if ($pagination) {
            return $query->paginate($perPage)->withPath(route('products'));
        }
        
        return $query->get();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public static function store(array $data): self
    {


        $extension = $data['image']->getClientOriginalExtension();
        $fileName  = uniqid('pro_', true) . '.' . $extension;
        $data['image']->storeAs('admin/products', $fileName, 'public');
        $imagePath = $fileName;

        return self::create([
            'heading'     => $data['heading'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'price'       => $data['price'],
            'gender'      => $data['gender'],
            'discount'    => $data['discount'] ?? null,
            'image'       => $imagePath,
        ]);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image
                ? asset('storage/admin/products/' . $this->image)
                : null
        );
    }

    public function deleteProduct(): void
    {
        if ($this->getRawOriginal('image')) {
            Storage::disk('public')->delete('admin/products/' . $this->getRawOriginal('image'));
        }

        $this->delete();
    }


    public static function updateProduct(int $id, array $data): self
    {
        $product = self::findOrFail($id);

        $imagePath = $product->getRawOriginal('image');

        if (!empty($data['image'])) {
            
            if ($imagePath) {
                Storage::disk('public')->delete('admin/products/' . $imagePath);
            }

            $extension = $data['image']->getClientOriginalExtension();
            $fileName  = uniqid('pro_', true) . '.' . $extension;
            $data['image']->storeAs('admin/products', $fileName, 'public');
            $imagePath = $fileName;
        }

        $product->update([
            'heading'     => $data['heading'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'price'       => $data['price'],
            'gender'      => $data['gender'],
            'discount'    => $data['discount'] ?? null,
            'image'       => $imagePath,
        ]);

        return $product;
    }

}
