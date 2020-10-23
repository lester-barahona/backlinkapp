<template>
    <div class="w-100 mt-5">
        <div class="row">
            <div class="col-12 p-2">
                <div class="categorybox w-100 align-items-center py-1" @click="selectedAll()">
                    <h5 class="text-center">Show all links</h5>
                </div>
            </div>
            <div class="p-2 col-4" v-for="category in this.categories" :key="category.id">
                <div class="categorybox w-100 align-items-center py-1" @click="selectedCat(category.id)" v-bind:class="{'bg-primary':selectedcategory==category.id}">
                    <h5 class="text-center" v-text="category.name"></h5>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="p-2 col-4" v-for="subCat in this.filteredSubCategories" :key="subCat.id">
                <div class="categorybox w-100 align-items-center py-1" @click="selectedSubCat(subCat.id)" v-bind:class="{'bg-primary':selectedsubcategory==subCat.id}">
                    <h6 class="text-center" v-text="subCat.name"></h6>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-6 p-2" v-for="domain in this.filteredDomains" :key="domain.id">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Website name:</strong> {{domain.title}}</p>
                        <p><strong>Website URL:</strong> <a :href="domain.url">{{domain.url}}</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    props:['domains','categories','subcategories'],
    data(){
        return {
            selectedcategory:'',
            selectedsubcategory:''
        };
    },
    methods:{

        selectedAll:function(){
             this.selectedcategory='';
            this.selectedsubcategory='';
        },
        selectedCat:function(id){
            this.selectedcategory=id;
            this.selectedsubcategory='';
        },

        selectedSubCat:function(id){
         
            this.selectedsubcategory=id;
        }

    },

    computed:{

        filteredSubCategories: function(){
           
            return this.subcategories.filter((subcategory)=>subcategory.category_id==this.selectedcategory);
        },

        filteredDomains:function(){
            if(this.selectedcategory==='' && this.selectedsubcategory===''){
                return this.domains;
            }else if(this.selectedcategory!='' && this.selectedsubcategory ==='' ){
                return this.domains.filter((domain)=>domain.category_id==this.selectedcategory);
            }else if(this.selectedcategory==='' && this.selectedsubcategory !='' ){
                return this.domains.filter((domain)=>domain.subCategory_id==this.selectedsubcategory);
            }else if(this.selectedcategory!='' && this.selectedsubcategory!=''){
                return this.domains.filter((domain)=>{return domain.subCategory_id==this.selectedsubcategory && domain.category_id==this.selectedcategory});
            }
        }

    }

}
</script>