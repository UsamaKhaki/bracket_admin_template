/*!
 * Bracket Plus v1.0.0 (https://themetrace.com/bracketplus)
 * Copyright 2017-2018 ThemePixels
 * Licensed under ThemeForest License
 */

'use strict';

$(document).ready(function () {

    // This will auto show sub menu using the slideDown()
    // when top level menu have a class of .show-sub
    $('.show-sub + .br-menu-sub').slideDown();

    // This will collapsed sidebar menu on left into a mini icon menu
    $('#btnLeftMenu').on('click', function () {
        var menuText = $('.menu-item-label,.menu-item-arrow');

        if ($('body').hasClass('collapsed-menu')) {
            $('body').removeClass('collapsed-menu');

            // show current sub menu when reverting back from collapsed menu
            $('.show-sub + .br-menu-sub').slideDown();

            $('.br-sideleft').one('transitionend', function (e) {
                menuText.removeClass('op-lg-0-force');
                menuText.removeClass('d-lg-none');
            });

        } else {
            $('body').addClass('collapsed-menu');

            // hide toggled sub menu
            $('.show-sub + .br-menu-sub').slideUp();

            menuText.addClass('op-lg-0-force');
            $('.br-sideleft').one('transitionend', function (e) {
                menuText.addClass('d-lg-none');
            });
        }
        return false;
    });


    // This will expand the icon menu when mouse cursor points anywhere
    // inside the sidebar menu on left. This will only trigget to left sidebar
    // when it's in collapsed mode (the icon only menu)
    $(document).on('mouseover', function (e) {
        e.stopPropagation();

        if ($('body').hasClass('collapsed-menu') && $('#btnLeftMenu').is(':visible')) {
            var targ = $(e.target).closest('.br-sideleft').length;
            if (targ) {
                $('body').addClass('expand-menu');

                // show current shown sub menu that was hidden from collapsed
                $('.show-sub + .br-menu-sub').slideDown();

                var menuText = $('.menu-item-label,.menu-item-arrow');
                menuText.removeClass('d-lg-none');
                menuText.removeClass('op-lg-0-force');

            } else {
                $('body').removeClass('expand-menu');

                // hide current shown menu
                $('.show-sub + .br-menu-sub').slideUp();

                var menuText = $('.menu-item-label,.menu-item-arrow');
                menuText.addClass('op-lg-0-force');
                menuText.addClass('d-lg-none');
            }
        }
    });


    // This will show sub navigation menu on left sidebar
    // only when that top level menu have a sub menu on it.
    $('.br-menu-link').on('click', function () {
        var nextElem = $(this).next();
        var thisLink = $(this);

        if (nextElem.hasClass('br-menu-sub')) {

            if (nextElem.is(':visible')) {
                thisLink.removeClass('show-sub');
                nextElem.slideUp();
            } else {
                $('.br-menu-link').each(function () {
                    $(this).removeClass('show-sub');
                });

                $('.br-menu-sub').each(function () {
                    $(this).slideUp();
                });

                thisLink.addClass('show-sub');
                nextElem.slideDown();
            }
            return false;
        }
    });


    // This will trigger only when viewed in small devices
    // #btnLeftMenuMobile element is hidden in desktop but
    // visible in mobile. When clicked the left sidebar menu
    // will appear pushing the main content.
    $('#btnLeftMenuMobile').on('click', function () {
        $('body').addClass('show-left');
        return false;
    });


    // This is the right menu icon when it's clicked, the
    // right sidebar will appear that contains the four tab menu
    $('#btnRightMenu').on('click', function () {
        $('body').addClass('show-right');
        return false;
    });


    // This will hide sidebar when it's clicked outside of it
    $(document).on('click', function (e) {
        e.stopPropagation();

        // closing left sidebar
        if ($('body').hasClass('show-left')) {
            var targ = $(e.target).closest('.br-sideleft').length;
            if (!targ) {
                $('body').removeClass('show-left');
            }
        }

        // closing right sidebar
        if ($('body').hasClass('show-right')) {
            var targ = $(e.target).closest('.br-sideright').length;
            if (!targ) {
                $('body').removeClass('show-right');
            }
        }
    });


    // displaying time and date in right sidebar
    var interval = setInterval(function () {
        var momentNow = moment();
        $('#brDate').html(momentNow.format('MMMM DD, YYYY') + ' '
            + momentNow.format('dddd')
                .substring(0, 3).toUpperCase());
        $('#brTime').html(momentNow.format('hh:mm:ss A'));
    }, 100);

    // Datepicker
    if ($().datepicker) {
        $('.form-control-datepicker').datepicker()
            .on("change", function (e) {
                console.log("Date changed: ", e.target.value);
            });
    }


    // custom scrollbar style
    $('.overflow-y-auto').perfectScrollbar();

    // peity charts
    $('.peity-bar').peity('bar');

    // For Form AutoComplete
    if($('form').length){
        for (let i = 0; i < $('form').length; i++) {
            $($('form')[i]).attr('autocomplete', 'off')
        }
    }

});

function sidebarActive (route) {
    let $activeLink = $('.br-sideleft-menu a[href="'+route+'"]')
    $activeLink.addClass('active')
    if($activeLink.closest('.br-menu-sub').length){
        $activeLink.closest('.br-menu-sub').prev('a').addClass('active show-sub')
    }
}

function settingSidebarActive (route) {
    $('.br-nav-mailbox .nav-link[href="'+route+'"]').addClass('active')
}

$("body").on('click', '[dt-action="view"]', function (e) {
    e.preventDefault();
    let $this = $(this);
    let $target = $this.data('target');
    if ($target == undefined || $target == "") {
        $target = "#myModal";
    }
    if ($($target).length) {
        $.ajax({
            url: $this.attr('href'),
            method: "GET",
            beforeSend: function () {
                $.LoadingOverlay('show', {maxSize: 50})
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                $($target).find('.modal-content').html(response);
                $($target).modal('show');
                getPlaceholder();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $.LoadingOverlay('hide')
                alert('Error Code: ' + xhr.status + '. ' + thrownError + '. Please contact Admin.');
            }
        })
    } else {
        alert('Modal template not included yet.')
    }
});

$("body").on('click', 'button[href]', function (e) {
    e.preventDefault();
    window.location.href = $(this).attr('href');
});

$("body").on('change', 'input, select, textarea', function (e) {
    if($(this).closest('form').length) {
        if (typeof $.fn.validate == 'function') {
            if (!$(this).hasClass('no-validate')) {
                $(this).valid()
            }
        }
    }
});

$("body").on('input', '[type="email"]', function (e) {
    this.value = this.value.toLowerCase();
});


$(document).on("input", "input[type='tel']", function (evt) {
    if ($(this).hasClass('allow-decimals')) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9\.]/g, ''));
        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
            evt.preventDefault();
        }
    } else {
        this.value = this.value.replace(/\D/g, '');
    }
});
