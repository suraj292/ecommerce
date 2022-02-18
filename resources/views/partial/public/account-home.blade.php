<div class="dashboard">
    <div class="page-title">
        <h2>My Dashboard</h2>
    </div>
    <div class="welcome-msg">
        <p>Hello, {{ strtoupper($user->name) }} !</p>
        <p>From your My Account Dashboard you have the ability to view a snapshot of your recent
            account activity and update your account information. Select a link below to view or
            edit information.</p>
    </div>
    <div class="box-account box-info">
{{--        <div class="box-head">--}}
{{--            <h2>Account Information</h2>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-title">
                        <h3>Contact Information</h3><a href="#">Edit</a>
                    </div>
                    <div class="box-content">
                        <h6>{{ $user->name }}</h6>
                        <h6 class="text-lowercase">{{ $user->email }}</h6>
                        <h6>{{ $user->mobile }}</h6>
                        <h6><a href="#">Change Password</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-title">
                        <h3>Address Book</h3><a href="#">Edit</a>
                    </div>
                    @if($address)
                        <div class="box-content">
                            <h6>Default Billing Address</h6>
                            <address class="text-capitalize">
                                {{ $address->name }} {{ '+91 '.$address->phone }}
                                <br>
                                {{ $address->address }}, {{ $address->locality }}, {{ $address->name }},
                                {{ $address->city }} ({{ $address->pincode }}), {{ $address->state }}
                                @if($address->landmark) {{ ', '.$address->landmark }} @endif
                                @if($address->alternate_phone) {{ ', '.$address->alternate_phone }} @endif
                                <br><a href="#">Manage Address</a>
                            </address>
                        </div>
                    @else
                        <div class="box-content text-center p-3">
                            <h6>No Address</h6>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--
        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-title">
                        <h3>Address Book</h3><a href="#">Edit</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Default Billing Address</h6>
                            <address>You have not set a default billing address.<br><a href="#">Edit
                                    Address</a></address>
                        </div>

                        <div class="col-sm-6">
                            <h6>Default Shipping Address</h6>
                            <address>You have not set a default shipping address.<br><a href="#">Edit Address</a></address>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

    </div>
</div>
