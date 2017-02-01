<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use App\Models\MenuChild;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->bootMenuViewComposer();
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

    private function bootMenuViewComposer()
    {
       $this->model = new Menu;
       $this->model_child = new MenuChild;
       view()->composer('admin_template', function ($view) {
           $menu = $this->model->menus();
           $menus = [];
           foreach ($menu as $value) {
               $menus['data'][]= $value->name;
               $child = $this->model_child->get($value->id);
               foreach ($child as $key => $val) {
                   $menus['data'][] =  $val->name;
               }
           }
           \Log::info($menus);
           $view->withMenus($menus);
       });
    }
}
