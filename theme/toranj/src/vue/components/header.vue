<template>
    <div class="header">
        <div class="container">
            <div class="header-inner">
                <router-link :to="{name:'home'}" class="brand">ترنج</router-link>
                <nav>
                    <a class="item" href="#">خانه</a>
                    <a class="item" href="#">درباره ما</a>
                    <router-link :to="{name:'contact'}" class="item">تماس با ما</router-link>
                    <router-link :to="{name:'search'}" class="item"><i class="fa fa-search"></i></router-link>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {}
</script>