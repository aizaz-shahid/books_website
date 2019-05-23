<?php

namespace App\Providers;
use App\Footer;
use App\Advert;
use App\Links;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $footer=Footer::find(1);
        $advertt=Advert::find(1);
        $social=Links::find(1);
        View::share('footer', $footer); 
        View::share('social',$social); 
        View::share('advertt',$advertt);
  }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
