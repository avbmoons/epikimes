<?php

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\ColorsQueryBuilder;
use App\QueryBuilders\ItemsQueryBuilder;
use App\QueryBuilders\NotificationsQueryBuilder;
use App\QueryBuilders\PageElementsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ColorsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ItemsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, PageElementsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, UsersQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NotificationsQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        View::composer(['components.header', 'components.footer', 'components.admin.header', 'components.admin.footer'], function($view) {
          $builder = new PageElementsQueryBuilder();
          
          $globalElements = $builder->getElementsForGlobalBlocks(['header', 'footer']);

          $view->with([
            'headerElements' => $globalElements->where('page', 'header')->keyBy('element_key'),
            'footerElements' => $globalElements->where('page', 'footer')->keyBy('element_key')
          ]);
        });

        Password::defaults(function() {
          return Password::min(8);
            // ->letters()
            // ->mixedCase()
            // ->numbers()
            // ->symbols();
        });
    }
}
