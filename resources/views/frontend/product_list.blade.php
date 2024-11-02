@foreach ($products as $key => $item)
    <div class="pb-2 mb-4 col-md-4 col-sm-6">
        <div class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
            <div class="list-card-image">
                <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1
                        (300+)
                    </span></div>
                <div class="favourite-heart text-danger position-absolute"><a
                        href="{{ route('restaurant.detail', $item->client->id) }}"><i class="icofont-heart"></i></a></div>
                <div class="member-plan position-absolute"><span class="badge badge-dark">Filter</span></div>
                <a href="{{ route('restaurant.detail', $item->client->id) }}">
                    <img src="{{ asset('upload/products/' . $item->image) }}" class="img-fluid item-img">
                </a>
            </div>
            <div class="p-3 position-relative">
                <div class="list-card-body">
                    <h6 class="mb-1"><a href="{{ route('restaurant.detail', $item->client->id) }}"
                            class="text-black">{{ $item->name }}</a>
                    </h6>
                    <p class="mb-3 text-gray">North Indian • American • Pure veg</p>
                    <p class="mb-3 text-gray time"><span class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                class="icofont-wall-clock"></i> 20–25 min</span> <span
                            class="float-right text-black-50">
                            {{ $item->price }}</span></p>
                </div>
                <div class="list-card-badge">
                    <span class="badge badge-success">OFFER</span> <small>65% off | Use
                        Coupon
                        OSAHAN50</small>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- {{$products}}
ok --}}