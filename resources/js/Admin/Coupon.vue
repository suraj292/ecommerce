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
                                    <p class="text-danger" v-if="errors && errors.couponCode">{{ errors.couponCode[0] }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Coupon Value [%]</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           style="border: 1px solid #c4c4c4"
                                           id="exampleInputEmail2" placeholder="enter 1-100 %" v-model="newCoupon.couponValue">
                                    <p class="text-danger" v-if="errors && errors.couponValue">{{ errors.couponValue[0] }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Maximum Discount Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           style="border: 1px solid #c4c4c4"
                                           id="exampleInputMobile" placeholder="&#8377; xxx" v-model="newCoupon.couponMaxAmount">
                                    <p class="text-danger" v-if="errors && errors.couponMaxAmount">{{ errors.couponMaxAmount[0] }}</p>
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
import Swal from "sweetalert2";

export default {
    data(){
        return {
            coupons: [],
            newCoupon: {},
            errors: {},
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
                    this.newCoupon = {}
                    this.errors = {}
                }).catch(error => {
                    if (error.response.status === 422){
                        this.errors = error.response.data.errors
                    }
                    console.log(this.errors)
            })
        },
        couponDel(id){
            try {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/api/coupon/${id}`)
                        this.fetchCoupon()
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            } catch (e) {
                console.log(e)
            }
        }
    },

}
</script>
