    document.addEventListener('DOMContentLoaded', function () {
        var burgerIcon = document.getElementById('burger-icon');
        var aside = document.querySelector('.aside');

        burgerIcon.addEventListener('click', function () {
            burgerIcon.classList.toggle('opened');
            aside.classList.toggle('opened');
        });

        var navLinks = document.querySelectorAll('.burger-line a');

        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                burgerIcon.classList.remove('opened');
                aside.classList.remove('opened');
            });
        });
    });
        document.addEventListener('DOMContentLoaded', function () {
        var scrollUpBtn = document.getElementById('scrollUpBtn');
        window.addEventListener('scroll', function () {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollUpBtn.style.display = 'block';
            } else {
                scrollUpBtn.style.display = 'none';
            }
        });
        scrollUpBtn.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });