jQuery(document).ready(function ($) {

    if ($(".archive .products").length) {
        var $grid = $('.products').isotope({
            // options
            itemSelector: '.product',
            layoutMode: 'fitRows'
        });

        // filter items on button click
        $('.dropdown-item').click(function () {

            var dropdownRebsorte = $("#dropdownMenuRebsorte");
            var dropdownWineType = $("#dropdownMenuWineType");

            var filterValue = $(this).attr('data-filter');
            var filterName = $(this).text();

            var filterParent = $(this).attr('data-name');
            var filterDropdown = $(this).attr('data-dropdown');


            if (filterName === 'Alle') {

                filterName = filterParent;
                dropdownRebsorte.text(dropdownRebsorte.attr('data-fallback'))
                dropdownWineType.text(dropdownWineType.attr('data-fallback'));

                dropdownRebsorte.removeClass('btn-primary');
                dropdownRebsorte.addClass('btn-secondary');

                dropdownWineType.removeClass('btn-primary');
                dropdownWineType.addClass('btn-secondary');

            } else {

                $('#' + filterDropdown).removeClass('btn-secondary');
                $('#' + filterDropdown).addClass('btn-primary');
                $('#' + filterDropdown).text(filterName);
            }

            $grid.isotope({filter: filterValue});

        });
    }

});
