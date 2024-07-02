<div class="position-relative bg-dark-subtle border rounded">
    <div class="row g-0">
        <div class="col-7">
            <div class="d-flex">
                <img src="{{asset('img/'. $product->category->image)}}"
                     alt="{{ $product->name }}" class="img-fluid rounded-start" style="width: 240px;height: 240px">
                <div class="position-absolute">
                    @if($product->isDiscount())
                        <div class="m-1">
                            <span class="d-inline-block small text-bg-danger bg-opacity-100 rounded px-1">
                                <i class="bi-percent"></i> @lang('app.discount')
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col p-2">
            <div class="d-flex flex-column h-100">
                <div class="fw-semibold mb-auto">
                    <a href="{{ route('show', $product->id) }}" class="link-dark text-decoration-none stretched-link">
                        {{ $product->name }}
                    </a>
                    <div>
                        <div class="text-primary opacity-75">
                            {{$product->category->getName()}}
                        </div>
                    </div>
                </div>
                <div class="small my-1">
                    @foreach($product->sellers as $seller)
                        <i class="bi-person-fill text-secondary"></i> {{ $seller->name }}{{$loop->last ? '' :','}}
                    @endforeach
                </div>
                @if($product->isDiscount())
                    <del class="small text-secondary">
                        {{ number_format($product->price, 2, '.', ' ') }}
                        TMT
                    </del>
                    <div class="fw-semibold text-danger">
                        {{ number_format($product->getPrice(), 2, '.', ' ') }}
                        <small>TMT</small>
                    </div>
                @else
                    <div class="fw-semibold text-primary">
                        {{ number_format($product->price, 2, '.', ' ') }}
                        <small>TMT</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>