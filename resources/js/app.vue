<template>
    <div class="container ">

          <ul class="nav justify-content-center background-color pt-2 shadow">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">New Receipt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="">
<!-- IN HERE IF WE WANT TO AUTO COLLAPASE -->

                </div>

                
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>

<script>
    export default {}
</script>


<style>
    .background-color{
        background-color:#e65251;
        height: 60px;
       
    }
    .nav-link{
        color: #fafafa;
    }

</style>