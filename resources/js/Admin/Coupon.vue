<template class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-tag-multiple"></i>
                </span> Coupons </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- session coupon created-->
<!--                        <p class="alert-success rounded p-2">{{ session('coupon_saved') }}</p>-->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Coupon</th>
                                <th>Discount</th>
                                <th>Expiry</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(coupon, index) in coupons" :key="coupon.id" >
                                <td>{{ index + 1 }}</td>
                                <td class="text-uppercase "
                                    :class=" coupon.active === 1 ? 'text-success' : 'text-danger'"
                                >{{ coupon.code }}</td>
                                <td> {{ coupon.value }} % </td>
                                <td> {{ moment(coupon.expire_at).format("D MMM yyyy") }} </td>
                                <td>
                                    <button class="btn btn-sm btn-danger" @click="couponDel(coupon.id)">Del</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Coupons</h4>
                        <form class="forms-sample" @submit.prevent="addCoupon">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Coupon Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-uppercase"
                                           style="border: 1px solid #c4c4c4"
                                           placeholder="enter new Coupon" v-model="newCoupon.couponCode">
<!--                                    @error('coupons.code')<p class="text-danger">{{ $message }}</p>@enderror-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Coupon Value [%]</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           style="border: 1px solid #c4c4c4"
                                           id="exampleInputEmail2" placeholder="enter 1-100 %" v-model="newCoupon.couponValue">
<!--                                    @error('coupons.value')<p class="text-danger">{{ $message }}</p>@enderror-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Maximum Discount Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           style="border: 1px solid #c4c4c4"
                                           id="exampleInputMobile" placeholder="&#8377; xxx" v-model="newCoupon.couponMaxAmount">
<!--                                    @error('coupons.maxAmount')<p class="text-danger">{{ $message }}</p>@enderror-->
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Add Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from "moment";

export default {
    data(){
        return {
            coupons: [],
            newCoupon: {
                couponCode: '',
                couponValue: '',
                couponMaxAmount: ''
            },
            isEditing: false,
            moment: moment
        }
    },
    mounted() {
        this.fetchCoupon()
    },
    methods:{
        fetchCoupon(){
            try {
                axios.get('/api/coupon')
                    .then(response => this.coupons = response.data.data)
            }catch (e){
                console.log(e)
            }
        },
        addCoupon(){
            axios.post('/api/coupon', this.newCoupon)
                .then(response => {
                    this.fetchCoupon()
                    this.newCoupon = {
                        couponCode: '',
                        couponValue: '',
                        couponMaxAmount: ''
                    }
                })
        },
        couponDel(id){
            try {
                axios.delete(`/api/coupon/${id}`)
                    .then(res => {
                        this.fetchCoupon()
                    })
            } catch (e) {
                console.log(e)
            }
        }
    },

}
</script>
