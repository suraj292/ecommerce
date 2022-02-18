<div class="checkout-title">
    <h3>Billing Details</h3>
</div>
<style>
    .btn-selected{border: none; background: #2874f0; color: white; font-size: 15px; font-weight: bold;}
    .btnSpnSlct{background-color: white; color: #2874f0; font-weight: normal; border-radius: 2px;}
    .accordion-btn{border: none; /*border: #0a0a0a12 1px solid;*/ background: white; color: gray; font-size: 15px; box-shadow: 0 10px 20px 0 #f3f3f3a6; font-weight: bold;}
    .accordion-span{background-color: #dbdbdb85; color: #2874f0; font-weight: normal; border-radius: 2px;}
    .mainLoginInput{
        font-family: FontAwesome, serif;
    }
</style>
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        @auth()
            <div id="headingOne">
                <h2 class="accordion-header">
                    <button class="w-100 py-3 text-start accordion-btn active" type="button">
                        <span class="px-1 rounded accordion-span">1</span>&nbsp;&nbsp;&nbsp; USER AUTHORIZATION <i class="fa fa-check" style="color: #2874f0;"></i>
                    </button>
                </h2>
                <div style="display: block; background-color: white;">
                    <div class="accordion-body">
                        <strong>Suraj Sharma </strong> +917042611736
                    </div>
                </div>
            </div>
        @endauth
        @guest()
            <h2 class="accordion-header">
                <button class="w-100 py-3 text-start btn-selected" type="button">
                    &nbsp;&nbsp;&nbsp;<span class="px-1 btnSpnSlct">1</span>&nbsp;&nbsp;&nbsp; USER AUTHORIZATION
                </button>
            </h2>
            <div id="demo" style="display: block; border: #0a0a0a12 1px solid; background-color: white;">
                <div class="accordion-body">
                    <form>
                        <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Enter Email/Mobile number">

                        <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px; width: 75%;" placeholder="Mobile number">
                        <button class="btn btn-solid btn-sm btn-xs me-3">Send OTP</button>

                        <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px; width: 75%;" placeholder="OTP">
                        <button class="btn btn-solid btn-sm btn-xs me-3">Submit</button>

                        <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Password">

                        <input type="text" class="mainLoginInput" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;"
                               placeholder="demo@example.com " disabled>

                        <p class="my-3" style="font-size: 12px;">By continuing, you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                        <button type="submit" class="btn btn-solid me-3">CONTINUE</button>
                    </form>
                </div>
            </div>
        @endguest
            <div id="headingTwo">
                <h2 class="accordion-header mt-3">
                        <button class="w-100 py-3 text-start accordion-btn @auth() active @endauth" type="button">
                            &nbsp;&nbsp;&nbsp;<span class="px-1 rounded accordion-span">2</span>&nbsp;&nbsp;&nbsp; DELIVERY ADDRESS
                        </button>
                </h2>
                <div style="display: none; background-color: white;">
                    <div class="accordion-body">
                        <strong>Suraj Sharma </strong> +917042611736
                    </div>
                </div>
            </div>
            <div id="headingThree">
                <h2 class="accordion-header mt-3">
                    <button class="w-100 py-3 text-start accordion-btn @auth() active @endauth" type="button">
                        &nbsp;&nbsp;&nbsp;<span class="px-1 rounded accordion-span">3</span>&nbsp;&nbsp;&nbsp; ORDER SUMMARY
                    </button>
                </h2>
                <div style="display: none; background-color: white;">
                    <div class="accordion-body">
                        <strong>Suraj Sharma </strong> +917042611736
                    </div>
                </div>
            </div>
            <div id="headingFour">
                <h2 class="accordion-header mt-3">
                    <button class="w-100 py-3 text-start accordion-btn @auth() active @endauth" type="button">
                        &nbsp;&nbsp;&nbsp;<span class="px-1 rounded accordion-span">4</span>&nbsp;&nbsp;&nbsp; PAYMENT OPTION
                    </button>
                </h2>
                <div style="display: none; background-color: white;">
                    <div class="accordion-body">
                        <strong>Suraj Sharma </strong> +917042611736
                    </div>
                </div>
            </div>
    </div>
    <script>
        $(document).ready(function (){
            $("#headingOne").has(".active").click(function (){
                    // $("#demo").has(".active").slideToggle();
                $("#demo").slideToggle();
            });
            $("#headingTwo").has(".active").on( 'click', function (){
                $("#headingTwo button").removeClass("accordion-btn").addClass("btn-selected");
                $("#headingTwo span").removeClass("accordion-span").addClass("btnSpnSlct");
                $("#headingTwo div:first").slideDown();

                $("#headingThree div:first").slideUp();
                $("#headingThree button").removeClass("btn-selected").addClass("accordion-btn");
                $("#headingThree span").removeClass("btnSpnSlct").addClass("accordion-span");

                $("#headingFour div:first").slideUp();
                $("#headingFour button").removeClass("btn-selected").addClass("accordion-btn");
                $("#headingFour span").removeClass("btnSpnSlct").addClass("accordion-span");
            });
            $("#headingThree").has(".active").on( 'click', function (){
                $("#headingThree button").removeClass("accordion-btn").addClass("btn-selected");
                $("#headingThree span").removeClass("accordion-span").addClass("btnSpnSlct");
                $("#headingThree div:first").slideDown();

                $("#headingTwo div:first").slideUp();
                $("#headingTwo button").removeClass("btn-selected").addClass("accordion-btn");
                $("#headingTwo span").removeClass("btnSpnSlct").addClass("accordion-span");

                $("#headingFour div:first").slideUp();
                $("#headingFour button").removeClass("btn-selected").addClass("accordion-btn");
                $("#headingFour span").removeClass("btnSpnSlct").addClass("accordion-span");
            });
            $("#headingFour").has(".active").on( 'click', function (){
                $("#headingFour button").removeClass("accordion-btn").addClass("btn-selected");
                $("#headingFour span").removeClass("accordion-span").addClass("btnSpnSlct");
                $("#headingFour div:first").slideDown();

                $("#headingTwo div:first").slideUp();
                $("#headingTwo button").removeClass("btn-selected").addClass("accordion-btn");
                $("#headingTwo span").removeClass("btnSpnSlct").addClass("accordion-span");

                $("#headingThree div:first").slideUp();
                $("#headingThree button").removeClass("btn-selected").addClass("accordion-btn");
                $("#headingThree span").removeClass("btnSpnSlct").addClass("accordion-span");
            });
        });
    </script>
</div>
