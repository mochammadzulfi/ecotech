<div class="row g-4">
    @foreach ($relatedProducts as $product)
    <div class="col-md-4 col-sm-6">
        @include('pages.partials.product-card', ['product' => $product])
    </div>
    @endforeach
</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $relatedProducts->links() }}
</div>