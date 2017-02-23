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
       // $this->model = new Menu;
       // $this->model_child = new MenuChild;
       // view()->composer('admin_template', function ($view) {
       //     $menu = $this->model->menus();
       //     $menus = [];
       //     foreach ($menu as $value) {
       //         array_push($menus, $value->name);
       //     }

       //     for ($i=0; $i < count($menus); $i++) { 
       //        $parent_id = Menu::where('name', $menus[$i])->first();
       //        $child = MenuChild::select('name')->where('menu_id', $parent_id->id)->get();
       //        \Log::info($child);
       //        if (!empty($child)) {
       //          foreach ($child as $value) {
       //            $menus[$i] = array($parent_id->name, $value->name); 
       //          }
       //        } else {
       //          $menus[$i] = array($parent_id->name);
       //        }
       //     }
       //     \Log::info($menus);
       //     $view->withMenus($menus);
       // });
    }
}
