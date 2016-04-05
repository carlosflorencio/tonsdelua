/**
 * Laravel 5
 * 
 * Initialize using:
 *      $(function () {
 *          anchorMethod.init();
 *      });
 * 
 * Default:
 *      <a href="URL" data-method="delete">
 * 
 * Confirmation dialog:
 *      <a href="URL" data-method="delete"
 *                    data-alert="confirm"
 *                    data-alert-text="Confirmation text">
 * 
 * SweetAlert confirmation dialog (http://t4t5.github.io/sweetalert):
 *      <a href="URL" data-method="delete"
 *                    data-alert="confirm"
 *                    data-alert-text="Confirmation text"
 *                    data-alert-title="Caution"
 *                    data-alert-button="Yes delete"
 *                    data-alert-cancel="Cancel">
 */
var anchorMethod = {
    init: function () {
        $('a[data-method]').on('click', function (e) {
            e.preventDefault();
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var form;

            if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {
                return;
            }

            if (link.data('alert') == "confirm") {
                // Try to load SweetAlert if applicable.
                if (typeof swal !== 'undefined') {
                    options = {
                        title:            link.data('alert-title'),
                        text:             link.data('alert-text'),
                        type:             "warning",
                        html:             true,
                        showCancelButton: true,
                        closeOnConfirm:   false
                    };
                    if (link.data('alert-button')) {
                        options['confirmButtonText'] = link.data('alert-button');
                    }
                    if (link.data('alert-cancel')) {
                        options['cancelButtonText'] = link.data('alert-cancel');
                    }
                    swal(options, function () {
                        anchorMethod.submit(link);
                    });
                }
                // Show a default confirm box (eventually as SweetAlert fallback)
                else if (confirm($($.parseHTML(link.data('alert-text'))).text())) {
                    anchorMethod.submit(link);
                }
            }
            else {
                anchorMethod.submit(link);
            }
        });
    },

    submit: function (link) {
        var form =
            $('<form>', {
                'method': 'POST',
                'action': link.attr('href')
            });

        var token =
            $('<input>', {
                'type':  'hidden',
                'name':  '_token',
                'value': $('meta[name="csrf-token"]').attr('content')
            });

        var hiddenInput =
            $('<input>', {
                'name':  '_method',
                'type':  'hidden',
                'value': link.data('method')
            });

        form.append(token, hiddenInput)
            .appendTo('body').submit();
    }
};

$(function () {
    anchorMethod.init();
});