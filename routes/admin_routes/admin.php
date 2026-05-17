<?php 


use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Categories\CategoriesList;
use App\Livewire\Admin\Products\ProductsList;
use App\Livewire\Admin\AboutUs\EditAboutUs;
use App\Livewire\Admin\Blogs\BlogsList;
use App\Livewire\Admin\Testimonials\TestimonialsList;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Middleware\IsAdminLogin;


Route::get('login', [LoginController::class, 'login'])->name('login');

Route::middleware(IsAdminLogin::class)->group(function(){

    Route::get('categories',CategoriesList::class)->name('categories');
    Route::get('products',ProductsList::class)->name('products');
    Route::get('blogs',BlogsList::class)->name('blogs');
    Route::get('edit-aboutus',EditAboutUs::class)->name('edit-aboutus');
    Route::get('logout',[LogoutController::class,'logout'])->name('logout');
    Route::get('dashboard',Dashboard::class)->name('dashboard');
    Route::get('testimonials',[TestimonialsList::class])->name('testimonials');
    
});
