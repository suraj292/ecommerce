<div {{--style="background-color: #0a0a0a12;"--}}>
    <div class="hidden-hight-div"></div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <section class="section-b-space">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="block-content">
                            <ul>
                                <li @if($account == 'home') class="active" @endif>
                                    <a type="button" wire:click="switchHome">Dashboard</a>
                                </li>
                                <li @if($account == 'profile') class="active" @endif>
                                    <a type="button" wire:click="switchProfile">Account</a>
                                </li>
                                <li @if($account == 'wallet') class="active" @endif>
                                    <a type="button" wire:click="switchWallet">Wallet</a>
                                </li>
                                <li @if($account == 'address') class="active" @endif>
                                    <a type="button" wire:click="switchAddress">Address Book</a>
                                </li>
                                <li @if($account == 'order') class="active" @endif>
                                    <a type="button" wire:click="switchOrder">My Order</a>
                                </li>

{{--                                <li><a href="#">My Wishlist</a></li>--}}
                                <li @if($account == 'password') class="active" @endif>
                                    <a type="button" wire:click="switchPassword">Change Password</a>
                                </li>
                                <li class="last"><a wire:click="logout">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="dashboard-right">
                        @switch($account)
                            @case('home')
                                @include('partial.public.account-home')
                            @break

                            @case('profile')
                                <livewire:public.account.profile />
                            @break

                            @case('wallet')
                                <livewire:public.account.wallet />
                            @break

                            @case('address')
                                <livewire:public.account.address />
                            @break

                            @case('order')
                                <livewire:public.account.order />
                            @break

                            @case('password')
                                <livewire:public.account.password />
                            @break

                            @default
                                {{ abort(404) }}
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@section('style')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* remove the gap so it doesn't close */
        }
        .new-input-style{
            border: none; border-bottom: #b0b0b07a 1px solid; font-size: 15px; width: 100%;
            padding: 10px;
        }
        .btn-custom{
            margin-top: 27px; padding: 8px 16px !important;
        }
        .dashboard{background-color: #f7f7f77d;}
    </style>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#name-btn-1").on('click', function () {
                $("#name").removeAttr("disabled");
                $("#name-btn-1").hide();
                $("#name-btn-2").show();
            });
            $("#email-btn-1").on('click', function () {
                $("#email").removeAttr("disabled");
                $("#email-btn-1").hide();
                $("#email-btn-2").show();
            });
            $( ".card" ).hover(function () {
                $(this).addClass('shadow').css('cursor', 'pointer');
            });
            // function() {
            //     $(this).addClass('shadow').css('cursor', 'pointer');
            // }, function() {
            //     $(this).removeClass('shadow-sm');
            // }
        });
    </script>
@endsection
