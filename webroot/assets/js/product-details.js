/**
 * product-details.js
 * Handles the image carousel and pack-size price switching
 * on the Product Details page.
 *
 * Dependencies: none (Vanilla JS)
 */

(function () {
    'use strict';

    /* ============================================================
       DATA — Pack sizes and prices for Rose Water
       (Extend this array for other products as needed)
    ============================================================ */
    const packData = [
        { label: '200 ml', dist: '₹ 28', retail: '₹ 35', mrp: '₹ 45' },
        { label: '500 ml', dist: '₹ 60', retail: '₹ 75', mrp: '₹ 95' },
        { label: '1 Litre', dist: '₹ 110', retail: '₹ 135', mrp: '₹ 175' },
        { label: '5 Litre', dist: '₹ 480', retail: '₹ 580', mrp: '₹ 720' },
        { label: 'Bulk / Custom', dist: 'On Request', retail: 'On Request', mrp: 'On Request' },
    ];

    /* Carousel images (dynamically collected from thumbnails or main image) */
    const images = [];
    const thumbImgs = document.querySelectorAll('#pdThumbStrip .pd-thumb img');
    if (thumbImgs.length > 0) {
        thumbImgs.forEach(function (img) {
            images.push(img.src);
        });
    } else if (mainImg) {
        images.push(mainImg.src);
    }

    /* ============================================================
       DOM refs
    ============================================================ */
    const mainImg      = document.getElementById('pdMainImg');
    const activeBadge  = document.getElementById('pdActiveBadge');
    const thumbStrip   = document.getElementById('pdThumbStrip');
    const dots         = document.querySelectorAll('.pd-nav-dot');
    const prevBtn      = document.getElementById('pdPrevBtn');
    const nextBtn      = document.getElementById('pdNextBtn');
    const packTabs     = document.querySelectorAll('.pd-pack-tab');
    const distEl       = document.getElementById('pdDistPrice');
    const retailEl     = document.getElementById('pdRetailPrice');
    const mrpEl        = document.getElementById('pdMrpPrice');
    const enquiryBtn   = document.getElementById('quickEnquiryBtn');

    if (!mainImg) return; // guard: not on the right page

    let currentImg  = 0;
    let currentPack = 0;

    /* ============================================================
       Carousel helpers
    ============================================================ */
    function goToImage(idx) {
        if (idx < 0) idx = images.length - 1;
        if (idx >= images.length) idx = 0;

        currentImg = idx;

        /* Fade-swap the main image */
        mainImg.style.opacity = '0';
        mainImg.style.transform = 'scale(0.96)';
        setTimeout(function () {
            mainImg.src = images[currentImg];
            mainImg.style.opacity = '1';
            mainImg.style.transform = 'scale(1)';
        }, 180);

        /* Update thumbnails */
        thumbStrip.querySelectorAll('.pd-thumb').forEach(function (th, i) {
            th.classList.toggle('is-active', i === currentImg);
        });

        /* Update dots */
        dots.forEach(function (d, i) {
            d.classList.toggle('is-active', i === currentImg);
        });
    }

    /* Smooth transition style on main image */
    if (mainImg) {
        mainImg.style.transition = 'opacity 0.18s ease, transform 0.18s ease';
    }

    /* Prev / Next buttons */
    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            goToImage(currentImg - 1);
        });
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            goToImage(currentImg + 1);
        });
    }

    /* Thumbnail clicks */
    thumbStrip && thumbStrip.addEventListener('click', function (e) {
        const thumb = e.target.closest('.pd-thumb');
        if (!thumb) return;
        goToImage(parseInt(thumb.dataset.idx, 10));
    });

    /* Keyboard on thumbnails */
    thumbStrip && thumbStrip.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            const thumb = e.target.closest('.pd-thumb');
            if (thumb) {
                e.preventDefault();
                goToImage(parseInt(thumb.dataset.idx, 10));
            }
        }
    });

    /* Dot clicks */
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            goToImage(parseInt(dot.dataset.dot, 10));
        });
    });

    /* Auto-rotate every 3.5 s — pauses on hover */
    let autoTimer = null;
    if (images.length > 1) {
        autoTimer = setInterval(function () {
            goToImage(currentImg + 1);
        }, 3500);
    }

    const carouselWrap = document.querySelector('.pd-carousel-wrap');
    if (carouselWrap) {
        carouselWrap.addEventListener('mouseenter', function () {
            if (autoTimer) clearInterval(autoTimer);
        });
        carouselWrap.addEventListener('mouseleave', function () {
            if (images.length > 1) {
                autoTimer = setInterval(function () { goToImage(currentImg + 1); }, 3500);
            }
        });
    }

    /* ============================================================
       Pack size / variant switching with animated price update
    ============================================================ */
    function updatePricesFromTab(tab) {
        if (!tab) return;
        const dist = tab.dataset.dist || 'On Request';
        const retail = tab.dataset.retail || 'On Request';
        const mrp = tab.dataset.mrp || 'On Request';
        const label = tab.dataset.label || tab.textContent.trim();
        const img = tab.dataset.img;

        /* Badge on main image */
        if (activeBadge) activeBadge.textContent = label;

        /* Update main image if variant has its own image */
        if (img && mainImg) {
            mainImg.style.opacity = '0';
            setTimeout(function() {
                mainImg.src = img;
                mainImg.style.opacity = '1';
            }, 180);
        }

        /* Animate the price values */
        [distEl, retailEl, mrpEl].forEach(function (el) {
            if (!el) return;
            el.classList.add('updating');
        });

        setTimeout(function () {
            if (distEl)   distEl.innerHTML   = dist;
            if (retailEl) retailEl.innerHTML = retail;
            if (mrpEl)    mrpEl.innerHTML    = mrp;

            [distEl, retailEl, mrpEl].forEach(function (el) {
                if (el) el.classList.remove('updating');
            });
        }, 200);
    }

    packTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            /* Toggle active states */
            packTabs.forEach(function (t) {
                t.classList.remove('is-active');
                t.setAttribute('aria-pressed', 'false');
            });
            tab.classList.add('is-active');
            tab.setAttribute('aria-pressed', 'true');

            updatePricesFromTab(tab);
        });
    });

    /* ============================================================
       Quick Enquiry button — pre-selects the product in the modal
       (calls into quick-enquiry.js which exposes the modal open fn)
    ============================================================ */
    if (enquiryBtn) {
        enquiryBtn.addEventListener('click', function () {
            const overlay = document.getElementById('quickEnquiryModal');
            const select  = document.getElementById('qeProduct');
            const variantInput = document.getElementById('qeVariant');
            const activeTab = document.querySelector('#pdPackTabs .pd-pack-tab.is-active');
            const selectedVariant = activeTab ? (activeTab.getAttribute('data-label') || activeTab.textContent.trim()) : '';

            if (overlay) {
                overlay.removeAttribute('aria-hidden');
                overlay.classList.add('is-open');
                document.body.style.overflow = 'hidden';

                if (select) {
                    const prodName = enquiryBtn.getAttribute('data-product-name') || 'Dauji Rose Water';
                    select.value = prodName;
                    select.dispatchEvent(new Event('change'));
                }

                if (variantInput && selectedVariant) {
                    variantInput.value = selectedVariant;
                    variantInput.dispatchEvent(new Event('input'));
                }

                const firstInput = overlay.querySelector('.qe-input');
                if (firstInput) {
                    setTimeout(function () { firstInput.focus(); }, 120);
                }
            }
        });
    }

})();
