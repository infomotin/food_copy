@php
// $id = Auth::user()->id;
// $userData = App\Models\User::find($id);
@endphp
<div class="col-md-3">
    <div class="bg-white rounded shadow-sm osahan-account-page-left h-100">
        <div class="p-4 border-bottom">
            <div class="text-center osahan-user">
                @php
                $userData = Auth::user();
                @endphp
                <div class="osahan-user-media">
                    <img class="mt-1 mb-3 shadow-sm rounded-pill"
                        src="{{(!empty($userData->profile_photo_path))?url('upload/users/'.$userData->profile_photo_path):url('upload/no_image.jpg')}}"
                        alt="gurdeep singh osahan">
                    <div class="osahan-user-media-body">
                        <h6 class="mb-2">{{$userData->name}}</h6>
                        <p class="mb-1">{{$userData->phone}}</p>
                        <p>{{$userData->email}}</p>
                        <p>{{$userData->address}}</p>
                        <p class="mb-0 text-black font-weight-bold"><a class="mr-3 text-primary" data-toggle="modal"
                                data-target="#edit-profile-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a></p>
                    </div>
                </div>
            </div>
        </div>


        <ul class="pt-4 pb-4 pl-4 border-0 nav nav-tabs flex-column" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{Route::currentRouteName() === 'dashboard' ? 'active' : ''}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="true"><i class="icofont-food-cart"></i> User Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::currentRouteName() === 'change.password' ? 'active' : ''}}" id="changepassword-tab" data-toggle="tab" href="#changepassword" role="tab"
                    aria-controls="changepassword" aria-selected="true"><i class="icofont-food-cart"></i>Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders"
                    aria-selected="true"><i class="icofont-food-cart"></i> Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="offers-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="offers"
                    aria-selected="false"><i class="icofont-sale-discount"></i> Offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link {{Route::currentRouteName() === 'user.favourites' ? 'active' : ''}}" id="favourites-tab" data-toggle="tab" href="#favourites" role="tab"
                    aria-controls="favourites" aria-selected="false"><i class="icofont-heart"></i> Favourites</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab"
                    aria-controls="payments" aria-selected="false"><i class="icofont-credit-card"></i> Payments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="addresses-tab" data-toggle="tab" href="#addresses" role="tab"
                    aria-controls="addresses" aria-selected="false"><i class="icofont-location-pin"></i> Addresses</a>
            </li>
        </ul>
    </div>
</div>
