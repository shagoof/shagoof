<?php

declare(strict_types=1);

namespace Botble\BulkPrice\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\BulkPrice\Http\Requests\BulkPriceRequest;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Models\Brand;
use Botble\Ecommerce\Models\Product;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Ecommerce\Models\ProductCollection;
use Botble\Ecommerce\Models\ProductTag;
use Botble\Ecommerce\Services\ProductCacheService;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BulkPriceController extends BaseController
{
    public function index(): View
    {
        $categories = ProductCategory::query()->wherePublished()->orderBy('name')->get(['id', 'name']);
        $brands = Brand::query()->wherePublished()->orderBy('name')->get(['id', 'name']);
        $collections = ProductCollection::query()->wherePublished()->orderBy('name')->get(['id', 'name']);
        $tags = ProductTag::query()->wherePublished()->orderBy('name')->get(['id', 'name']);

        return view('plugins/bulk-price::index', compact('categories', 'brands', 'collections', 'tags'));
    }

    public function update(BulkPriceRequest $request, BaseHttpResponse $response): BaseHttpResponse|RedirectResponse
    {
        $action = $request->input('action'); // increase | decrease
        $type = $request->input('type');     // percentage | fixed
        $amount = (float) $request->input('amount');

        // Apply to all products (including variations) so storefront prices always change
        $query = Product::query();

        if ($categoryIds = $request->input('categories', [])) {
            $query->whereHas('categories', function ($q) use ($categoryIds): void {
                $q->whereIn('ec_product_category_product.category_id', $categoryIds);
            });
        }

        if ($brandIds = $request->input('brands', [])) {
            $query->whereIn('brand_id', $brandIds);
        }

        if ($collectionIds = $request->input('collections', [])) {
            $query->whereHas('productCollections', function ($q) use ($collectionIds): void {
                $q->whereIn('ec_product_collection_products.product_collection_id', $collectionIds);
            });
        }

        if ($tagIds = $request->input('tags', [])) {
            $query->whereHas('tags', function ($q) use ($tagIds): void {
                $q->whereIn('ec_product_tag_product.tag_id', $tagIds);
            });
        }

        $operator = $action === 'decrease' ? '-' : '+';

        $ids = (clone $query)->pluck('id');
        $count = $ids->count();

        if ($count === 0) {
            return $response
                ->setPreviousUrl(route('bulk-price.index'))
                ->setError()
                ->setMessage(__('No products matched the selected filters. Nothing was updated.'));
        }

        if ($type === 'percentage') {
            $percentage = $amount / 100;

            $query->update([
                'price' => DB::raw("GREATEST(0, price {$operator} (price * {$percentage}))"),
                'sale_price' => DB::raw("CASE WHEN sale_price IS NULL THEN NULL ELSE GREATEST(0, sale_price {$operator} (sale_price * {$percentage})) END"),
            ]);
        } else {
            $query->update([
                'price' => DB::raw("GREATEST(0, price {$operator} {$amount})"),
                'sale_price' => DB::raw("CASE WHEN sale_price IS NULL THEN NULL ELSE GREATEST(0, sale_price {$operator} {$amount}) END"),
            ]);
        }

        // Clear product-related caches so new prices show on the storefront
        $cacheService = app(ProductCacheService::class);

        Product::query()
            ->whereIn('id', $ids)
            ->chunkById(100, function ($products) use ($cacheService): void {
                foreach ($products as $product) {
                    $cacheService->clearProductCache($product);
                }
            });

        EcommerceHelper::clearProductMaxPriceCache();

        return $response
            ->setPreviousUrl(route('bulk-price.index'))
            ->setMessage(trans_choice('{1} :count product was updated.|[2,*] :count products were updated.', $count, ['count' => $count]));
    }
}


