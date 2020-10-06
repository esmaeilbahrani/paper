<template>
    <div>
        <transition mode="out-in" enter-active-class="animated faster fadeIn"
                    leave-active-class="animated faster fadeOut">
            <router-view></router-view>
        </transition>

        <div class="footer">
            <div class="container">
                <div class="top">
                    <div class="brand">
                        <img class="app-icon" src="@img/app-icon.png" alt="app icon">
                        <span class="app-name">paper</span>
                    </div>
                    <div class="socials">
                        <div class="text">ما را دنبال کنید</div>
                        <div class="links">
                            <a class="item"><i class="fab fa-twitter"></i></a>
                            <a class="item"><i class="fab fa-whatsapp"></i></a>
                            <a class="item"><i class="fab fa-instagram"></i></a>
                            <a class="item"><i class="fab fa-linkedin"></i></a>
                            <a class="item"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="links">
                        <a href="">خدمات و سرویس ها</a>
                        <a href="">نقشه سایت</a>
                        <a href="">تماس با ما</a>
                        <a href="">قوانین و مقررات</a>
                        <a href="">حریم خصوصی</a>
                    </div>
                    <div class="copyright">تمام حقوق مادی و معنوی این قالب برای پینوکس محفوظ است</div>
                </div>
            </div>
        </div>
    </div>
</template>