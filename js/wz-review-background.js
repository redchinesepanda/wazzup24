document.addEventListener("DOMContentLoaded", function(event) {
    console.log('wz-review start');
    //window.addEventListener("load", function () {
        console.log('wz-review function start');
        function getCookie(name) {
            let matches = document.cookie.match(
            new RegExp(
                "(?:^|; )" +
                name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
                "=([^;]*)"
            )
            );
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        let cookie_value = getCookie("pll_language").toLocaleUpperCase();
        console.log('wz-review cookie_value: ' + cookie_value);
        const pics = {
        picListRU: [
            "/wp-content/reviews/rev/23.09.2021_1.png",
            "/wp-content/reviews/rev/23.09.2021_2.webp",
            "/wp-content/reviews/rev/23.09.2021_3.webp",
            "/wp-content/reviews/rev/23.09.2021_4.png",
            "/wp-content/reviews/rev/23.09.2021_5.png",
            "/wp-content/reviews/rev/23.09.2021_6.png",
            "/wp-content/reviews/rev/23.09.2021_7.png",
            "/wp-content/reviews/rev/23.09.2021_8.png",
            "/wp-content/reviews/rev/23.09.2021_9.png",
            "/wp-content/reviews/rev/23.09.2021_10.png",
            "/wp-content/reviews/rev/23.09.2021_13.png",
            "/wp-content/reviews/rev/23.09.2021_14.png",
            "/wp-content/reviews/rev/23.09.2021_15.png",
            "/wp-content/reviews/rev/23.09.2021_16.png",
            "/wp-content/reviews/rev/23.09.2021_17.png",
            "/wp-content/reviews/rev/23.09.2021_18.png",
            "/wp-content/reviews/rev/23.09.2021_19.png",
            "/wp-content/reviews/rev/23.09.2021_20.png",
            "/wp-content/reviews/rev/23.09.2021_21.png",
            "/wp-content/reviews/rev/23.09.2021_22.png",
            "/wp-content/reviews/rev/23.09.2021_23.png",
            "/wp-content/reviews/rev/23.09.2021_24.png",
            "/wp-content/reviews/rev/23.09.2021_25.png",
            "/wp-content/reviews/rev/23.09.2021_26.png",
            "/wp-content/reviews/rev/23.09.2021_27.png",
            "/wp-content/reviews/rev/23.09.2021_28.png",
            "/wp-content/reviews/rev/23.09.2021_29.png",
            "/wp-content/reviews/rev/23.09.2021_30.png",
            "/wp-content/reviews/rev/23.09.2021_31.png",
            "/wp-content/reviews/rev/23.09.2021_32.png",
            "/wp-content/reviews/rev/23.09.2021_33.png",
            "/wp-content/reviews/rev/23072020_01.png",
            "/wp-content/reviews/rev/23072020_02.png",
            "/wp-content/reviews/rev/23072020_03.png",
            "/wp-content/reviews/rev/23072020_04.png",
            "/wp-content/reviews/rev/23072020_05.png",
            "/wp-content/reviews/rev/23072020_06.png",
            "/wp-content/reviews/rev/23072020_07.png",
            "/wp-content/reviews/rev/23072020_08.png",
            "/wp-content/reviews/rev/23072020_09.png",
            "/wp-content/reviews/rev/23072020_11.png",
            "/wp-content/reviews/rev/23072020_12.png",
            "/wp-content/reviews/rev/23072020_13.png",
            "/wp-content/reviews/rev/23072020_14.png",
            "/wp-content/reviews/rev/23072020_15.png",
            "/wp-content/reviews/rev/23072020_17.png",
            "/wp-content/reviews/rev/23072020_18.png",
            "/wp-content/reviews/rev/wz_ans_67.png",
            "/wp-content/reviews/rev/wz_ans_66.png",
            "/wp-content/reviews/rev/wz_ans_65.png",
            "/wp-content/reviews/rev/wz_ans_64.png",
            "/wp-content/reviews/rev/wz_ans_63.png",
            "/wp-content/reviews/rev/wz_ans_62.png",
            "/wp-content/reviews/rev/wz_ans_61.png",
            "/wp-content/reviews/rev/wz_ans_60.png",
            "/wp-content/reviews/rev/wz_ans_59.png",
            "/wp-content/reviews/rev/wz_ans_58.png",
            "/wp-content/reviews/rev/wz_ans_57.png",
            "/wp-content/reviews/rev/wz_ans_56.png",
            "/wp-content/reviews/rev/wz_ans_55.png",
            "/wp-content/reviews/rev/wz_ans_54.png",
            "/wp-content/reviews/rev/wz_ans_53.png",
            "/wp-content/reviews/rev/wz_ans_52.png",
            "/wp-content/reviews/rev/wz_ans_51.png",
            "/wp-content/reviews/rev/wz_ans_50.png",
            "/wp-content/reviews/rev/wz_ans_49.png",
            "/wp-content/reviews/rev/wz_ans_47.png",
            "/wp-content/reviews/rev/wz_ans_45.png",
            "/wp-content/reviews/rev/wz_ans_44.png",
            "/wp-content/reviews/rev/wz_ans_43.png",
            "/wp-content/reviews/rev/wz_ans_42.png",
            "/wp-content/reviews/rev/wz_ans_41.png",
            "/wp-content/reviews/rev/wz_ans_40.png",
            "/wp-content/reviews/rev/wz_ans_39.png",
            "/wp-content/reviews/rev/wz_ans_38.png",
            "/wp-content/reviews/rev/wz_ans_37.png",
            "/wp-content/reviews/rev/wz_ans_36.png",
            "/wp-content/reviews/rev/wz_ans_35.png",
            "/wp-content/reviews/rev/wz_ans_34.png",
            "/wp-content/reviews/rev/wz_ans_33.png",
            "/wp-content/reviews/rev/wz_ans_32.png",
            "/wp-content/reviews/rev/wz_ans_31.png",
            "/wp-content/reviews/rev/wz_ans_30.png",
            "/wp-content/reviews/rev/wz_ans_29.png",
            "/wp-content/reviews/rev/wz_ans_28.png",
            "/wp-content/reviews/rev/wz_ans_27.png",
            "/wp-content/reviews/rev/wz_ans_26.png",
            "/wp-content/reviews/rev/wz_ans_25.png",
            "/wp-content/reviews/rev/wz_ans_24.png",
            "/wp-content/reviews/rev/wz_ans_23.png",
            "/wp-content/reviews/rev/wz_ans_22.png",
            "/wp-content/reviews/rev/wz_ans_21.png",
            "/wp-content/reviews/rev/wz_ans_20.png",
            "/wp-content/reviews/rev/wz_ans_19.png",
            "/wp-content/reviews/rev/wz_ans_18.png",
            "/wp-content/reviews/rev/wz_ans_17.png",
            "/wp-content/reviews/rev/wz_ans_16.png",
            "/wp-content/reviews/rev/wz_ans_15.png",
            "/wp-content/reviews/rev/wz_ans_14.png",
            "/wp-content/reviews/rev/wz_ans_13.png",
            "/wp-content/reviews/rev/wz_ans_12.png",
            "/wp-content/reviews/rev/wz_ans_11.png",
            "/wp-content/reviews/rev/wz_ans_10.png",
            "/wp-content/reviews/rev/wz_ans_09.png",
            "/wp-content/reviews/rev/wz_ans_08.png",
            "/wp-content/reviews/rev/wz_ans_07.png",
            "/wp-content/reviews/rev/wz_ans_06.png",
            "/wp-content/reviews/rev/wz_ans_05.png",
            "/wp-content/reviews/rev/wz_ans_04.png",
            "/wp-content/reviews/rev/wz_ans_03.png",
            "/wp-content/reviews/rev/wz_ans_02.png",
            "/wp-content/reviews/rev/wz_ans_01.png",
        ],
        picListEN: [
            "/wp-content/reviews/rev/23.09.2021_11_EN.png",
            "/wp-content/reviews/rev/23.09.2021_12_EN.png",
            "/wp-content/reviews/rev/23072020_10.png",
            "/wp-content/reviews/rev/23072020_16.png",
            "/wp-content/reviews/rev/19082020_1en.png",
            "/wp-content/reviews/rev/prof_ans_01.png",
            "/wp-content/reviews/rev/wz_ans_48.png",
            "/wp-content/reviews/rev/prof_ans_02.png",
        ],
        picListES: [
            "/wp-content/reviews/rev/23.09.2021_11_EN.png",
            "/wp-content/reviews/rev/23.09.2021_12_EN.png",
            "/wp-content/reviews/rev/23072020_10.png",
            "/wp-content/reviews/rev/23072020_16.png",
            "/wp-content/reviews/rev/19082020_1en.png",
            "/wp-content/reviews/rev/prof_ans_01.png",
            "/wp-content/reviews/rev/wz_ans_48.png",
            "/wp-content/reviews/rev/prof_ans_02.png",
        ],
        picListPT: [
            "/wp-content/reviews/rev/23.09.2021_11_EN.png",
            "/wp-content/reviews/rev/23.09.2021_12_EN.png",
            "/wp-content/reviews/rev/23072020_10.png",
            "/wp-content/reviews/rev/23072020_16.png",
            "/wp-content/reviews/rev/19082020_1en.png",
            "/wp-content/reviews/rev/prof_ans_01.png",
            "/wp-content/reviews/rev/wz_ans_48.png",
            "/wp-content/reviews/rev/prof_ans_02.png",
        ],
        };
        const texts = {
        ru: {
            title: "Отзывы клиентов",
        },
        en: {
            title: "Testimonials",
        },
        es: {
            title: "Testimonios",
        },
        pt: {
            title: "Testemunhos",
        },
        };
        const slider = {
        page: 0,
        pending: false,
        boxX: 0,
        mouseX: 0,
        currentX: 0,
        pressed: false,
        /*piclist: pics["picList" + getCookie("pll_language").toLocaleUpperCase()],*/
        piclist: pics["picList" + cookie_value],
        };

        document.querySelector(".slider-title h2").innerHTML =
        texts[getCookie("pll_language")].title;

        const arrowLeft = document.querySelector(".slider-arrow-left");
        const count = document.querySelector(".slider-count");
        const arrowRight = document.querySelector(".slider-arrow-right");
        const sliderBox = document.querySelector(".slider-box");

        const slides = [];
        let c = 0;
        slider.piclist.forEach((_) => {
        if (c < 3 || c > slider.piclist.length - 3) {
            const slide = document.createElement("div");
            if (c === 0) slide.className = "slider-card slider-card--center";
            else if (c === 1) slide.className = "slider-card slider-card--right";
            else if (c === slider.piclist.length - 1)
            slide.className = "slider-card slider-card--left";
            else slide.className = "slider-card slider-card--hide";

            slide.innerHTML = `<img src="${_}" class="slider-card-screen" draggable="false" />`;
            slides.push(slide);
            sliderBox.appendChild(slide);
        } else {
            slides.push(null);
        }
        c++;
        });

        const setSlide = (index) => {
        const slide = document.createElement("div");
        slide.className = "slider-card slider-card--hide";
        slide.innerHTML = `<img src="${slider.piclist[index]}" class="slider-card-screen" draggable="false" />`;
        slides[index] = slide;
        sliderBox.appendChild(slide);
        };

        const removeSlide = (index) => {
        slides[index] = null;
        };

        const truePage = (page) => {
        if (page > -1 && page < slider.piclist.length) {
            return page;
        } else if (page < 0) {
            return slider.piclist.length + page;
        } else {
            return page - slider.piclist.length;
        }
        };

        const touchStart = (event) => {
        const box = document.querySelector(".slider-card--center");
        box.style.transitionDuration = "0s";
        slider.pressed = true;
        slider.mouseX = event.changedTouches[0].clientX;
        slider.boxX = +getComputedStyle(box).left.substr(0, -2);
        };
        const touchStop = (event) => {
        const box = document.querySelector(".slider-card--center");
        box.style.transitionDuration = "";
        slider.pressed = false;
        box.style.left = "";
        if (slider.currentX > slider.mouseX + 150) {
            goLeft();
        }
        if (slider.currentX < slider.mouseX - 150) {
            goRight();
        }
        };
        const touchMove = (event) => {
        if (slider.pressed) {
            const box = document.querySelector(".slider-card--center");
            slider.currentX = event.changedTouches[0].clientX;
            box.style.left =
            event.changedTouches[0].clientX - slider.mouseX + slider.boxX + "px";
        }
        };

        //sliderBox.addEventListener("touchstart", touchStart);
        //sliderBox.addEventListener("touchend", touchStop);
        //sliderBox.addEventListener("touchmove", touchMove);

        const updateCount = () => {
        count.innerHTML = `${
            slider.page + 1 < 10 ? "0" + (slider.page + 1) : slider.page + 1
        } / ${
            slider.piclist.length < 10
            ? "0" + slider.piclist.length
            : slider.piclist.length
        }`;
        };

        updateCount();

        const goRight = () => {
        if (slider.pending) return;
        slider.pending = true;
        const center = slider.page;
        let left = slider.page - 1;
        let right = slider.page + 1;
        let right2 = slider.page + 2;
        if (left < 0) left = slider.piclist.length - 1;
        if (right === slider.piclist.length) right = 0;
        if (right2 === slider.piclist.length) right2 = 0;
        if (right2 === slider.piclist.length + 1) right2 = 1;
        slides[center].className = "slider-card slider-card--left";
        slides[left].className = "slider-card slider-card--hide";
        slides[right].className = "slider-card slider-card--center";
        slides[right2].className = "slider-card slider-card--right";
        slider.page++;
        if (slider.page > slider.piclist.length - 1) slider.page = 0;
        setSlide(truePage(slider.page + 2));
        removeSlide(truePage(slider.page - 3));
        updateCount();
        setTimeout(() => {
            slider.pending = false;
        }, 600);
        };

        const goLeft = () => {
        if (slider.pending) return;
        slider.pending = true;
        const center = slider.page;
        let left = slider.page - 1;
        let left2 = slider.page - 2;
        let right = slider.page + 1;
        if (left < 0) left = slider.piclist.length - 1;
        if (left2 === -1) left2 = slider.piclist.length - 1;
        if (left2 === -2) left2 = slider.piclist.length - 2;
        if (right > slider.piclist.length - 1) right = 0;
        slides[center].className = "slider-card slider-card--right";
        slides[left].className = "slider-card slider-card--center";
        slides[left2].className = "slider-card slider-card--left";
        slides[right].className = "slider-card slider-card--hide";
        slider.page--;
        if (slider.page < 0) slider.page = slider.piclist.length - 1;
        setSlide(truePage(slider.page - 2));
        removeSlide(truePage(slider.page + 3));
        updateCount();
        setTimeout(() => {
            slider.pending = false;
        }, 400);
        };

        arrowRight.addEventListener("click", goRight);

        arrowLeft.addEventListener("click", goLeft);
        console.log('wz-review function end');
    //  });
    //window.document.dispatchEvent(new Event("DOMContentLoaded"));
    console.log('wz-review end');
});