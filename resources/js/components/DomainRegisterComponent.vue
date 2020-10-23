<template>
    <div>
       <form action="" method="POST" enctype="multipart/form-data" @submit.prevent="submitDomain">
           <div class="form-group">
               <label for="category">Select a category</label>
               <select v-model="form.category_id" class="form-control" id="category">
                   <option v-for="category in this.categories" :key="category.id" :value="category.id" v-text="category.name"></option>
               </select>
           </div>
           <div class="form-group">
               <label for="subcategory">Select a subcategory if you wish</label>
               <select v-model="form.subcategory_id" class="form-control" id="subcategory">
                   <option v-for="subcategory in fillSubCats" :key="subcategory.id" :value="subcategory.id" v-text="subcategory.name"></option>
               </select>
           </div>

           <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input :class="{'is-invalid':form.errors.has('email')}" @keydown="form.errors.clear('email')" type="email" class="form-control" name="email" id="email" placeholder="Please enter your email Address" v-model="form.email">
                    <div class="invalid-feedback" v-show="form.errors.has('email')" v-text="form.errors.get('email')"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Enter your Domain URL</label>
                    <input v-model="form.url" :class="{'is-invalid':form.errors.has('url')}" @keydown="form.errors.clear('url')" type="text"  class="form-control" name="url" id="url" placeholder="https://your-domain.com" >
                    <div class="invalid-feedback" v-show="form.errors.has('url')" v-text="form.errors.get('url')"></div>
                </div>
           </div>

           <div class="input-group mb-3">
               <input type="file" name="img" id="img" class="form-control-file">
           </div>

           <div class="form-group">
                    <label for="title">Title of your Domain</label>
                    <input :class="{'is-invalid':form.errors.has('title')}" @keydown="form.errors.clear('title')" type="text" class="form-control" name="title" id="title" v-model="form.title">
                    <div class="invalid-feedback" v-show="form.errors.has('title')" v-text="form.errors.get('title')"></div>
            </div>

              <div class="form-group">
                    <label :class="{'is-invalid':form.errors.has('shortDescription')}" @keydown="form.errors.clear('shortDescription')" for="title">Short Description</label>
                    <input type="text" class="form-control" name="shortDescription" id="shortDescription" v-model="form.shortDescription">
                    <div class="invalid-feedback" v-show="form.errors.has('shortDescription')" v-text="form.errors.get('shortDescription')"></div>
            </div>

            <div class="form-group">
                    <label for="title">Short Description</label>
                   <vue-editor v-model="form.description"></vue-editor>
            </div>

            <button type="submit" class="btn btn-success">Submit your Domain</button>
       </form>
   </div> 
</template>

<script>
    export default {
        props:['categories','subcategories'],
        data(){
            return{ 
                //producto a vender
                product: {
                    price:3.0,
                    description: "backlinkapp submit domain"
                },
                form:new Form(
                    {
                       email:'', 
                       title:'', 
                       url:'', 
                       shortDescription:'', 
                       description:'', 
                       category_id:'1',
                       subcategory_id:'',

                    }
                )
            }
        },
        
        methods:{
            //pago con paypal
                setLoaded: function(resp) {
                    
                    window.paypal
                        .Buttons({
                            
            
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [
                                {
                                description: this.product.description,
                                amount: {
                                    currency_code: "USD",
                                    value: this.product.price,
                                     
                                }
                                
                                }
                            ],
                            


                            });
                        },
                        onApprove: async (data, actions, resp) => {
    
                            const order = await actions.order.capture();
                            this.data;
                            //this.submitDomain();
                            alert('Many Thanks! 😎');
                           
                        },
                        onError: err => {
                            console.log(err);
                        }
                        })
                        .render('#paypal-button-container');
                    },
            //Envio del formulario
            submitDomain:function(){
                let data=new FormData();
                data.append('title',this.form.title);
                data.append('email',this.form.email);
                data.append('url',this.form.url);
                data.append('shortDescription',this.form.shortDescription);
                data.append('description',this.form.description);
                data.append('category_id',this.form.category_id);
                data.append('subcategory_id',this.form.subcategory_id);
                
                if(document.getElementById('img').files[0]){
                    data.append('img',document.getElementById('img').files[0]);
                }

                axios.post('/domain',data)
                .then((resp)=>{
                    this.form.reset();
                })
                .catch((err)=>{
                    this.form.errors.record(err.response.data.errors);
                });
            }
        },

        computed:{
           fillSubCats:function(){
               return this.subcategories.filter((subCat)=>subCat.category_id==this.form.category_id);
           } 
        },
        mounted() {
            //poniendo el script de paypal
            const script = document.createElement("script");
            script.src =
            "https://www.paypal.com/sdk/js?client-id=AWW-_EpxtUYIDd3mzgmUbnKMV8y_uqWVGuKPS_nz01LeA3xWaM3cX5ks-T7cqrZIKcDA2zA_vTeQ4Kkw&locale=es_CR";
            script.addEventListener("load", this.setLoaded);
            document.body.appendChild(script);
        }
    }
</script>

//  paypal.Buttons({
//                 createOrder: function(data, actions) {
//                     return actions.order.create({
//                         purchase_units: [
//                             {
//                                 reference_id: "PUHF",
//                                 description: "Sporting Goods",

//                                 custom_id: "CUST-HighFashions",
//                                 soft_descriptor: "HighFashions",
//                                 amount: {
//                                     currency_code: "USD",
//                                     value: "230.00",
//                                     breakdown: {
//                                         item_total: {
//                                             currency_code: "USD",
//                                             value: "180.00"
//                                         },
//                                         shipping: {
//                                             currency_code: "USD",
//                                             value: "30.00"
//                                         },
//                                         handling: {
//                                             currency_code: "USD",
//                                             value: "10.00"
//                                         },
//                                         tax_total: {
//                                             currency_code: "USD",
//                                             value: "20.00"
//                                         },
//                                         shipping_discount: {
//                                             currency_code: "USD",
//                                             value: "10"
//                                         }
//                                     }
//                                 },
//                                 items: [
//                                     {
//                                         name: "T-Shirt",
//                                         description: "Green XL",
//                                         sku: "sku01",
//                                         unit_amount: {
//                                             currency_code: "USD",
//                                             value: "90.00"
//                                         },
//                                         tax: {
//                                             currency_code: "USD",
//                                             value: "10.00"
//                                         },
//                                         quantity: "1",
//                                         category: "PHYSICAL_GOODS"
//                                     },
//                                     {
//                                         name: "Shoes",
//                                         description: "Running, Size 10.5",
//                                         sku: "sku02",
//                                         unit_amount: {
//                                             currency_code: "USD",
//                                             value: "45.00"
//                                         },
//                                         tax: {
//                                             currency_code: "USD",
//                                             value: "5.00"
//                                         },
//                                         quantity: "2",
//                                         category: "PHYSICAL_GOODS"
//                                     }
//                                 ],
//                                 shipping: {
//                                     method: "United States Postal Service",
//                                     address: {
//                                         name: {
//                                             full_name:"John",
//                                             surname:"Doe"
//                                         },
//                                         address_line_1: "123 Townsend St",
//                                         address_line_2: "Floor 6",
//                                         admin_area_2: "San Francisco",
//                                         admin_area_1: "CA",
//                                         postal_code: "94107",
//                                         country_code: "US"
//                                     }
//                                 }
//                             }
//                         ]
//                     });
//                 },
//                 onApprove: function(data, actions) {
//                     return actions.order.capture().then(function(details) {
//                         alert('Transaction completed by ' + details.payer.name.given_name);
//                         // Call your server to save the transaction
//                         return fetch('/api/paypal-transaction-complete', {
//                             method: 'post',
//                             headers: {
//                                 'content-type': 'application/json'
//                             },
//                             body: JSON.stringify({
//                                 orderID: data.orderID
//                             })
//                         });
//                     });
//                 }
//             }).render('#paypal-button-container');