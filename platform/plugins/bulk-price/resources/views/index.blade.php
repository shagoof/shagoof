@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="block block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('Bulk price update') }}</h3>
        </div>

        <div class="block-content">
            <form action="{{ route('bulk-price.update') }}" method="POST">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">{{ __('Action') }}</label>
                        <select name="action" class="form-control" required>
                            <option value="increase">{{ __('Increase') }}</option>
                            <option value="decrease">{{ __('Decrease') }}</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('Type') }}</label>
                        <select name="type" class="form-control" required>
                            <option value="percentage">{{ __('Percentage (%)') }}</option>
                            <option value="fixed">{{ __('Fixed amount') }}</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('Amount') }}</label>
                        <input type="number" name="amount" class="form-control" step="0.01" min="0.01" required>
                    </div>
                </div>

                <hr>

                <h5>{{ __('Filters (optional)') }}</h5>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('Categories') }}</label>
                        <select name="categories[]" class="form-control select-multiple" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('Brands') }}</label>
                        <select name="brands[]" class="form-control select-multiple" multiple>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('Collections') }}</label>
                        <select name="collections[]" class="form-control select-multiple" multiple>
                            @foreach($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('Tags') }}</label>
                        <select name="tags[]" class="form-control select-multiple" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="alert alert-warning">
                    {{ __('This action will directly update product prices in the database. Please make sure you have a recent backup before running it.') }}
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ __('Apply bulk price update') }}
                </button>
            </form>
        </div>
    </div>
@endsection


