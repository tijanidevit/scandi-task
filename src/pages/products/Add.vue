<template>
    <div class="">
        <AddPageHeader />
        <AddForm />
    </div>
</template>

<script>
import AddPageHeader from '@/components/products/AddPageHeader.vue';
import AddForm from '@/components/products/AddForm.vue';


export default {
  name: 'AddProduct',
  components:{
    AddPageHeader,
    AddForm
  }
}
</script>