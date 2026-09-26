<style>
    .subcategory-link {
        display: block;
        padding: 8px 12px;
        text-decoration: none;
        color: #333;
        border-radius: 5px;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .subcategory-link:hover {
        background: #28a745;
        /* Hover color */
        color: #fff;
    }

    .subcategory-link.active {
        background: rgb(4, 71, 20) !important;
        /* Fixed selected color */
        color: #fff !important;
    }

    .dedd {
        border: none !important;
    }

    .dedd:hover {
        border: none !important;
    }

    .subcategory-link.active {
        background: rgb(4, 71, 20) !important;
        /* Subcategory active color */

        color: #fff !important;
    }

    .btn-link.active-category {
        color: rgb(4, 71, 20) !important;
        /* Category active color */
        font-size: 18px !important;
        font-weight: bold;
    }
</style>
<aside class="col-lg-3 order-lg-first">
    <div class="sidebar sidebar-shop">
        <div class="widget widget-collapsible">
            <div class="accordion" id="categoryAccordion">
                <?php $pp = 0; ?>
                <?php foreach ($category as $c) {
                    if ($c->is_active == 1) {
                        $pp++;
                ?>
                        <div class="card border-0 shadow-sm mb-2">
                            <div class="card-header bg-white p-3" id="heading<?= $c->id ?>">
                                <h3 class="mb-0">
                                    <button class="btn btn-link text-dark fw-bold text-decoration-none w-100 d-flex justify-content-between align-items-center dedd"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $c->id ?>"
                                        aria-expanded="<?= ($pp == 1) ? 'true' : 'false' ?>"
                                        aria-controls="collapse<?= $c->id ?>">
                                        <?= $c->name ?>
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                </h3>
                            </div>
                            <div id="collapse<?= $c->id ?>" class="collapse <?= ($pp == 1) ? 'show' : '' ?>" aria-labelledby="heading<?= $c->id ?>" data-bs-parent="#categoryAccordion">
                                <div class="card-body">
                                    <div class="filter-items">
                                        <?php foreach ($c->sub_categories as $s) {
                                            if ($s->is_active == 1) { ?>
                                                <a href="/products/subcategory/<?= $s->slug ?>" class="subcategory-link" data-id="<?= $s->id ?>">
                                                    <?= $s->name ?>
                                                </a>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>

        <div class="widget widget-collapsible" style="display:none;">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                    Price
                </a>
            </h3>
            <div class="collapse show" id="widget-5">
                <div class="widget-body">
                    <div class="filter-price">
                        <div class="filter-price-text">
                            Price Range:
                            <span id="filter-price-range"></span>
                        </div>
                        <div id="price-slider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subcategoryLinks = document.querySelectorAll('.subcategory-link');
        const categoryButtons = document.querySelectorAll('.btn-link');

        // Restore active subcategory and open its category
        const activeSubcategory = localStorage.getItem('activeSubcategory');
        if (activeSubcategory) {
            subcategoryLinks.forEach(link => {
                if (link.getAttribute('href') === activeSubcategory) {
                    link.classList.add('active');

                    // Find parent category and add active state
                    const parentCollapse = link.closest('.collapse');
                    if (parentCollapse) {
                        parentCollapse.classList.add('show'); // Keep only the selected category open

                        const parentButton = parentCollapse.previousElementSibling.querySelector('.btn-link');
                        if (parentButton) {
                            parentButton.classList.add('active-category'); // Highlight the category
                        }
                    }
                }
            });
        } else {
            // Close all categories if no subcategory is selected
            document.querySelectorAll('.collapse').forEach(collapse => {
                collapse.classList.remove('show');
            });
        }

        // Handle subcategory click
        subcategoryLinks.forEach(link => {
            link.addEventListener('click', function() {
                localStorage.setItem('activeSubcategory', this.getAttribute('href')); // Store subcategory URL
            });
        });
    });
</script>