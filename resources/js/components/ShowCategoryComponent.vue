<template>
    <div>
        <h2>Hello from Vue js</h2>
        <div v-for="category in this.categories" :key="category.id">
        <h4 >{{category.name}}</h4>
        <ul>
            <li v-for="subCat in category.sub_categories" :key="subCat.id">
                {{subCat.name}}
            </li>
        </ul>
        </div>
   </div> 
</template>

<script>
   
    export default {
        props:['categories'],
    }
</script>
