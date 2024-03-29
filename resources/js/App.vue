<template>
    <div class="container">

        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <div class="col-6 row">

            <div class="col-3"> <router-link to="/"
                class="d-flex  align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">Nitra obce</router-link>

            </div>
           <div class="col-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><router-link to="/" class="nav-item nav-link">Home</router-link></li>
                


            </ul>
        </div>
        </div>
        <div class="col-6 row   justify-content-end"> 
            <div class="col-3">
           <form action="">
            <input type="text" class="form-control" name="" id="">
           </form>
        </div>
        <div class="col-3"> <router-link to="/register" class="btn btn-primary">Register</router-link></div>
           
        </div>
        </header>


        <router-view> </router-view>


    </div>
</template>
 
<script>
export default {}
</script>