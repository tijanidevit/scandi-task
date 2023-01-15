<template>
    <form class="">
        <div class="form-group mb-2">
            <label for="sku">Sku</label>
            <input type="text" class="form-control" v-model="product.sku" id="sku">
        </div>


        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" v-model="product.name" id="name">
        </div>


        <div class="form-group mb-2">
            <label for="size">Size</label>
            <input type="text" class="form-control" v-model="product.size" id="size">
        </div>
    </form>
</template>

<script>
    export default {
        name: 'AddForm',
        data (){
            return{
                product:{
                    name:'',
                    productType:'',
                    price:'',
                    sku:'',
                    height:'',
                    length:'',
                    width:'',
                    weight:'',
                    size:'',
                }
            }
        }
    }
</script>