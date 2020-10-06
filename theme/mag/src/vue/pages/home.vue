<template>
    <div class="home">
        <div class="container">
            <div class="header">
                <div class="content-menu">
                    <div class="brand">
                        <img class="brand-icon" src="@img/app-icon.png" alt="paper icon">
                        <h1 class="brand-name">PAPER</h1>
                    </div>
                    <div class="nav">
                        <a class="link" href="">طبیعت</a>
                        <a class="link" href="">سفرنامه</a>
                        <a class="link" href="">مکان های باستانی</a>
                        <a class="link" href="">عکاسی</a>
                        <a class="link" href="">سفرنامه</a>
                    </div>
                </div>
            </div>
        </div>
        <Slider class="slider"></Slider>

        <div class="container">
            <div class="section-title">
                <div class="text">
                    <h2 class="title">انتخاب سردبیر</h2>
                    <h3 class="subtitle">مقالات برگزیده ای که پیشنهاد میکنیم مطالعه کنید</h3>
                </div>
                <div class="action">
                    <a href=""> مشاهده همه <i class="fa fa-chevron-left"></i> </a>
                </div>
            </div>

            <div class="selected-articles">
                <div class="box b1">
                    <a href="#">
                        <div class="image">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> خاورمیانه</span>
                            <img src="@img/samples/selected1.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2 class="title">استانبول شهری در دو قاره</h2>
                            <div class="bottom">
                                <div class="author">سردبیر</div>
                                <div class="date">12 اردیبهشت 1399</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="box b2">
                    <a href="#">
                        <div class="image">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> خاورمیانه</span>
                            <img src="@img/samples/selected2.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2 class="title">بهترین مقاصد گردشگری برای سال 1399 که باید مطالعه کنید و به اشتراک بگذارید
                                و فراموش نکنید</h2>
                            <div class="bottom">
                                <div class="author">سردبیر</div>
                                <div class="date">12 اردیبهشت 1399</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="box b3">
                    <a href="#">
                        <div class="image">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> خاورمیانه</span>
                            <img src="@img/samples/selected3.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2 class="title">برج ایفل محبوب ترین سازه جهان</h2>
                            <div class="bottom">
                                <div class="author">سردبیر</div>
                                <div class="date">12 اردیبهشت 1399</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="box b4">
                    <a href="#">
                        <div class="image">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> خاورمیانه</span>
                            <img src="@img/samples/selected4.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2 class="title">آسمان بارانی برزیل</h2>
                            <div class="bottom">
                                <div class="author">سردبیر</div>
                                <div class="date">12 اردیبهشت 1399</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="box b5">
                    <a href="#">
                        <div class="image">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> خاورمیانه</span>
                            <img src="@img/samples/selected5.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2 class="title">پرواز به جزایر هاوایی</h2>
                            <div class="bottom">
                                <div class="author">سردبیر</div>
                                <div class="date">12 اردیبهشت 1399</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="box b6">
                    <a href="#">
                        <div class="image">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> خاورمیانه</span>
                            <img src="@img/samples/selected6.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2 class="title">پرواز به جزایر هاوایی</h2>
                            <div class="bottom">
                                <div class="author">سردبیر</div>
                                <div class="date">12 اردیبهشت 1399</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section-title">
                <div class="text">
                    <h2 class="title">جدیدترین مقالات</h2>
                    <h3 class="subtitle">آخرین مقالات منتشر شده در مجله</h3>
                </div>
                <div class="action">
                    <a href=""> مشاهده همه <i class="fa fa-chevron-left"></i> </a>
                </div>
            </div>

            <div class="list-articles">
                <div class="articles">
                    <div class="box">
                        <div class="image">
                            <a href="#"> <img src="@img/samples/selected3.jpg" alt=""> </a>
                        </div>
                        <div class="content">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> سفرنامه</span>
                            <a class="title"><h2>کشتی کروز: سفر تفریحی 5 روزه به قطر</h2></a>
                            <div class="details">
                                <div class="item">نویسنده: صادق</div>
                                <div class="item">5 خرداد 1399</div>
                                <div class="item">خواندن 5 دقیقه</div>
                            </div>
                            <div class="summary">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="image">
                            <a href="#"> <img src="@img/samples/selected4.jpg" alt=""> </a>
                        </div>
                        <div class="content">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> سفرنامه</span>
                            <a class="title"><h2>کشتی کروز: سفر تفریحی 5 روزه به قطر</h2></a>
                            <div class="details">
                                <div class="item">نویسنده: صادق</div>
                                <div class="item">5 خرداد 1399</div>
                                <div class="item">خواندن 5 دقیقه</div>
                            </div>
                            <div class="summary">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="image">
                            <a href="#"> <img src="@img/samples/selected5.jpg" alt=""> </a>
                        </div>
                        <div class="content">
                            <span class="tag tag-blue"><i class="fa fa-circle"></i> سفرنامه</span>
                            <a class="title"><h2>کشتی کروز: سفر تفریحی 5 روزه به قطر</h2></a>
                            <div class="details">
                                <div class="item">نویسنده: صادق</div>
                                <div class="item">5 خرداد 1399</div>
                                <div class="item">خواندن 5 دقیقه</div>
                            </div>
                            <div class="summary">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                            </div>
                        </div>
                    </div>
                </div>
                <div class="boxes">
                    <a class="box" href="#">
                        <div class="overlay"></div>
                        <img class="image" src="@img/samples/selected3.jpg" alt="">
                        <span class="text">تبلیغات</span>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</template>

<script>

    import Slider from "../components/swiper.vue";

    export default {
        components: {Slider}
    }
</script>