(function () {
    'use strict';

    /* ---- Helpers ---- */
    function sanitizeText(str) {
        return String(str).trim();
    }

    function setError(inputEl, errorEl, msg) {
        if (!errorEl) return;
        errorEl.textContent = sanitizeText(msg);
        if (msg) {
            inputEl.classList.add('is-invalid');
            inputEl.setAttribute('aria-invalid', 'true');
        } else {
            inputEl.classList.remove('is-invalid');
            inputEl.removeAttribute('aria-invalid');
        }
    }

    function clearError(inputEl, errorEl) {
        setError(inputEl, errorEl, '');
    }

    function isValidEmail(v) {
        return /^[^\s@]{1,64}@[^\s@]{1,255}\.[^\s@]{2,}$/.test(v);
    }

    function isValidPhone(v) {
        return /^[0-9+\-\s]{7,15}$/.test(v);
    }

    function isValidName(v) {
        return /^[A-Za-z\s]{2,100}$/.test(v);
    }

    /* ---- DOM refs ---- */
    var modal        = document.getElementById('quickEnquiryModal');
    var closeBtn     = document.getElementById('qeCloseBtn');
    var form         = document.getElementById('quickEnquiryForm');
    var successState = document.getElementById('qeSuccessState');
    var successClose = document.getElementById('qeSuccessCloseBtn');
    var submitBtn    = document.getElementById('qeSubmitBtn');

    if (!modal || !closeBtn || !form || !successState || !successClose || !submitBtn) {
        return; // Modal assets not loaded on this page
    }

    var backdrop = modal.querySelector('.qe-backdrop');

    var fields = {
        name:    { input: document.getElementById('qeName'),    error: document.getElementById('qeNameError') },
        phone:   { input: document.getElementById('qePhone'),   error: document.getElementById('qePhoneError') },
        email:   { input: document.getElementById('qeEmail'),   error: document.getElementById('qeEmailError') },
        product: { input: document.getElementById('qeProduct'), error: document.getElementById('qeProductError') }
    };

    /* ---- Open / Close ---- */
    function openModal(productName, variantName) {
        if (productName && fields.product.input) {
            var select = fields.product.input;
            var found = false;
            for (var i = 0; i < select.options.length; i++) {
                if (select.options[i].value.trim().toLowerCase() === productName.trim().toLowerCase()) {
                    select.selectedIndex = i;
                    found = true;
                    break;
                }
            }
            if (!found) {
                var opt = new Option(productName, productName, true, true);
                select.add(opt, select.options[1] || null);
                select.value = productName;
            }
            select.dispatchEvent(new Event('change'));
        }

        var variantInput = document.getElementById('qeVariant');
        if (variantInput && variantName) {
            variantInput.value = variantName;
            variantInput.dispatchEvent(new Event('input'));
        }

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        setTimeout(function () {
            if (fields.name.input) fields.name.input.focus();
        }, 350);
    }

    function closeModal() {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        setTimeout(resetModal, 350);
    }

    function resetModal() {
        form.reset();
        Object.keys(fields).forEach(function(k) {
            if (fields[k].input && fields[k].error) {
                clearError(fields[k].input, fields[k].error);
            }
        });
        form.removeAttribute('hidden');
        successState.setAttribute('hidden', '');
        submitBtn.disabled = false;
        var textSpan = submitBtn.querySelector('.qe-submit-text');
        if (textSpan) textSpan.textContent = 'Submit Enquiry';
    }

    /* ---- Global Click Listener for all Quick Enquiry Buttons ---- */
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('#quickEnquiryBtn, .quickEnquiryBtn, [aria-controls="quickEnquiryModal"]');
        if (btn) {
            e.preventDefault();
            var prodName = btn.getAttribute('data-product-name') || btn.getAttribute('data-product') || '';
            var varName  = btn.getAttribute('data-variant') || btn.getAttribute('data-product-variant') || '';
            openModal(prodName, varName);
        }
    });

    closeBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);
    successClose.addEventListener('click', closeModal);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal.classList.contains('is-open')) {
            closeModal();
        }
    });

    /* ---- Validation ---- */
    function validateField(key) {
        var f = fields[key];
        if (!f || !f.input) return true;
        var v = f.input.value.trim();
        var msg = '';

        switch (key) {
            case 'name':
                if (!v) msg = 'Please enter your name.';
                else if (!isValidName(v)) msg = 'Name must be 2-100 letters only.';
                break;
            case 'phone':
                if (!v) msg = 'Please enter your phone number.';
                else if (!isValidPhone(v)) msg = 'Enter a valid phone number (7-15 digits).';
                break;
            case 'email':
                if (!v) msg = 'Please enter your email address.';
                else if (!isValidEmail(v)) msg = 'Enter a valid email address.';
                break;
            case 'product':
                if (!v) msg = 'Please select a product.';
                break;
        }
        setError(f.input, f.error, msg);
        return msg === '';
    }

    Object.keys(fields).forEach(function (key) {
        if (fields[key].input) {
            fields[key].input.addEventListener('blur', function () { validateField(key); });
            fields[key].input.addEventListener('input', function () {
                if (fields[key].input.classList.contains('is-invalid')) validateField(key);
            });
            fields[key].input.addEventListener('change', function () {
                if (fields[key].input.classList.contains('is-invalid')) validateField(key);
            });
        }
    });

    /* ---- Submit via AJAX ---- */
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        var valid = Object.keys(fields).reduce(function(acc, key) {
            return validateField(key) && acc;
        }, true);

        if (!valid) return;

        submitBtn.disabled = true;
        var textSpan = submitBtn.querySelector('.qe-submit-text');
        if (textSpan) textSpan.textContent = 'Submitting\u2026';

        var formData = new FormData(form);
        var headers = {
            'X-Requested-With': 'XMLHttpRequest'
        };
        if (typeof csrf_token !== 'undefined' && csrf_token) {
            headers['X-CSRF-Token'] = csrf_token;
        }

        fetch('/home/enquiry', {
            method: 'POST',
            body: formData,
            headers: headers
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (data && data.success) {
                form.setAttribute('hidden', '');
                successState.removeAttribute('hidden');
            } else {
                alert(data && data.message ? data.message : 'Failed to submit enquiry. Please try again.');
                submitBtn.disabled = false;
                if (textSpan) textSpan.textContent = 'Submit Enquiry';
            }
        })
        .catch(function(err) {
            console.error('Enquiry submit error:', err);
            // Fallback: standard submit if fetch fails
            form.submit();
        });
    });

}());
