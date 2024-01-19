let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');
let profile = document.querySelector('.profile');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

document.querySelector('.fa-sign-in-alt').onclick = () =>{
    profile.classList.toggle('active');
    navbar.classList.remove('active');
}

function search() {
    const input = document.getElementById("searchBox");
    const filter = input.value.toUpperCase();
    const dropdown = document.getElementById("filterDropdown");
    const selectedFilter = dropdown.value;
    const boxes = document.querySelectorAll('.box');

    for (let i = 0; i < boxes.length; i++) {
        let h3 = boxes[i].querySelector('h3');
        let txtValue = h3.textContent || h3.innerText;

        if ((selectedFilter === "all" || boxes[i].classList.contains(selectedFilter)) &&
            txtValue.toUpperCase().includes(filter)) {
            boxes[i].style.display = "";
        } else {
            boxes[i].style.display = "none";
        }
    }
}

var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 6500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop: true,
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
      delay: 6500,
      disableOnInteraction: false,
    },
    loop: true,
    breakpoints: {
        0:{
            slidesPerView: 1,
        },
        640:{
            slidesPerView: 2,
        },
        768:{
            slidesPerView: 2,
        },
        1024:{
            slidesPerView: 3,
        },
    },
});
