"use strict";
var KTDatatablesBasicPaginations = function () {

    var initTable1 = function () {
        var table = $('#kt_datatable');

        // begin first table
        table.DataTable({
            responsive: true,
            pagingType: 'full_numbers',
            columnDefs: [
                {
                    targets: 6,
                    width: '75px',
                    render: function (data, type, full, meta) {
                        var status = {
                            1: {'title': 'Yayınlanıb', 'class': ' label-light-success'},
                            0: {'title': 'Yayınlanmayıb', 'class': ' label-light-danger'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                    },
                },
            ],
        });
    };

    return {

        //main function to initiate the module
        init: function () {
            initTable1();
        },

    };

}();

jQuery(document).ready(function () {
    KTDatatablesBasicPaginations.init();
});
