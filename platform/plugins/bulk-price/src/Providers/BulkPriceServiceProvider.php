<?php

declare(strict_types=1);

namespace Botble\BulkPrice\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;

class BulkPriceServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/bulk-price')
            ->loadAndPublishViews()
            ->loadRoutes();

        DashboardMenu::beforeRetrieving(function (): void {
            DashboardMenu::make()
                ->registerItem([
                    'id' => 'cms-plugins-bulk-price',
                    'priority' => 60,
                    'name' => 'Bulk Price',
                    'icon' => 'ti ti-currency-dollar',
                    'url' => route('bulk-price.index'),
                    'permissions' => ['bulk-price.index'],
                ]);
        });
    }
}


