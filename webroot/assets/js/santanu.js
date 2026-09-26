
    jQuery(document).ready(function(){
   $('.banner-slider').owlCarousel({
    items:1,
    loop:true,
    margin:10,
    lazyLoad: true,
    autoplay:true,
    nav:false,
    autoplayTimeout:3000,
    smartSpeed:1500,
    autoplayHoverPause:true,
});
$('.pop-slider').owlCarousel({
    items:4,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        
        375:{
            items:2
        },
        992:{
            items:3
        },
        1200:{
            items:4
        }
    }
});
$('.topcollection').owlCarousel({
    items:4,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        
        375:{
            items:2
        },
        992:{
            items:3
        },
        1200:{
            items:4
        }
    }
});
$('.offer-slider').owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    nav:false,
    autoplayHoverPause:true,
    autoplayTimeout:3000,
    smartSpeed:30000,
    slideTransition: 'linear',
});
$('.test-slider').owlCarousel({
      items:1,
      loop:true,
      margin:10,
      autoplay:true,
      smartSpeed:4000,
      autoplayTimeout:5000,
      slideTransition: 'linear',
      autoplayHoverPause:true,
  });
});
  
        document.addEventListener("DOMContentLoaded", function () {
    const userIcon = document.getElementById("user-icon");
    const userContainer = document.querySelector(".user-container");

    // Toggle User Dropdown
    userIcon.addEventListener("click", function (e) {
        e.preventDefault();
        userContainer.classList.toggle("active");
    });

    // Hide dropdown when clicking outside
    document.addEventListener("click", function (e) {
        if (!userContainer.contains(e.target) && !userIcon.contains(e.target)) {
            userContainer.classList.remove("active");
        }
    });
});
        $(window).scroll(function(){
            if($(this).scrollTop() > 100){
                $('.my-head').addClass('sticky')
            } else{
                $('.my-head').removeClass('sticky')
            }
        });
   
        document.addEventListener("DOMContentLoaded", function () {
            // Mobile Menu Toggle
            const menuToggle = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("mobile-menu");
            const closeMenu = document.getElementById("close-menu");
        
            menuToggle.addEventListener("click", function () {
                mobileMenu.classList.add("active");
            });
        
            closeMenu.addEventListener("click", function () {
                mobileMenu.classList.remove("active");
            });
        
            // Accordion Menu
            const accordionItems = document.querySelectorAll(".accordion-item");
        
            accordionItems.forEach((item) => {
                const button = item.querySelector(".accordion-btn");
        
                button.addEventListener("click", function () {
                    item.classList.toggle("active");
                    const submenu = item.querySelector(".submenu");
                    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
                });
            });
        
            // User Dropdown
            const userIcon = document.getElementById("user-icon");
            const userContainer = document.querySelector(".user-containerzz");
        
            userIcon.addEventListener("click", function (e) {
                e.preventDefault();
                userContainer.classList.toggle("active");
            });
        
            document.addEventListener("click", function (e) {
                if (!userContainer.contains(e.target) && !userIcon.contains(e.target)) {
                    userContainer.classList.remove("active");
                }
            });
        });