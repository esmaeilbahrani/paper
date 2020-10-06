<template>
    <swiper class="swiper" :options="swiperOption" dir="rtl">
        <swiper-slide>
            <div class="text">
                <div class="tag tag-blue"><i class="fa fa-circle"></i> مقصد گردشگری</div>
                <a href="#" class="title">موزه لوور پاریس ، فرانسه | Paris</a>
                <div class="details">
                    <div class="item">پنجشنبه 5 اردیبهشت 1399</div>
                    <div class="item">خواندن 5 دقیقه</div>
                </div>
            </div>
            <img class="parallax-bg" src="@img/samples/slider1.jpg" alt="">
            <div class="overlay"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="text">
                <div class="tag tag-blue"><i class="fa fa-circle"></i> مقصد گردشگری</div>
                <a href="#" class="title">تبت، سفر به کوه های هیمالیا | Asia</a>
                <div class="details">
                    <div class="item">پنجشنبه 5 اردیبهشت 1399</div>
                    <div class="item">خواندن 5 دقیقه</div>
                </div>
            </div>
            <img class="parallax-bg" src="@img/samples/slider2.jpg" alt="">
            <div class="overlay"></div>
        </swiper-slide>
        <div class="swiper-pagination swiper-pagination-white" slot="pagination"></div>
        <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
        <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
    </swiper>
</template>

<script>
    import {Swiper, SwiperSlide} from 'vue-awesome-swiper';
    import 'swiper/css/swiper.css';

    export default {
        name: 'Slider',
        components: {
            Swiper,
            SwiperSlide
        },
        data() {
            return {
                swiperOption: {
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
    }
</script>

