<!-- jQuery  -->
<script src="/frontend/js/jquery.min.js"></script>
<script src="/frontend/js/popper.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/waves.js"></script>
<script src="/frontend/js/jquery.slimscroll.js"></script>

<!-- Plugins Js -->
<script src="/frontend/plugins/switchery/switchery.min.js"></script>
<script src="/frontend/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="/frontend/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="/frontend/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="/frontend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="/frontend/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="/frontend/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="/frontend/plugins/moment/moment.js"></script>
<script src="/frontend/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="/frontend/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/frontend/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/frontend/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/frontend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<!-- App js -->
<script src="/frontend/js/jquery.core.js"></script>
<script src="/frontend/js/jquery.app.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="/frontend/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="/frontend/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<script src="/frontend/plugins/morris/morris.min.js"></script>
<script src="/frontend/plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="/frontend/pages/jquery.dashboard.js"></script>


<!-- App js -->
<script src="/frontend/js/jquery.core.js"></script>
<script src="/frontend/js/jquery.app.js"></script>


<!-- Required datatable js -->
<script src="/frontend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/frontend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/frontend/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/frontend/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="/frontend/plugins/datatables/jszip.min.js"></script>
<script src="/frontend/plugins/datatables/pdfmake.min.js"></script>
<script src="/frontend/plugins/datatables/vfs_fonts.js"></script>
<script src="/frontend/plugins/datatables/buttons.html5.min.js"></script>
<script src="/frontend/plugins/datatables/buttons.print.min.js"></script>

<!-- Key Tables -->
<script src="/frontend/plugins/datatables/dataTables.keyTable.min.js"></script>

<!-- Responsive examples -->
<script src="/frontend/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/frontend/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Selection table -->
<script src="/frontend/plugins/datatables/dataTables.select.min.js"></script>

<!-- Modal-Effect -->
<script src="/frontend/plugins/custombox/dist/custombox.min.js"></script>
<script src="/frontend/plugins/custombox/dist/legacy.min.js"></script>

<script>
    jQuery(document).ready(function() {

        //advance multiselect start
        $('#my_multi_select3').multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            afterInit: function (ms) {
                var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });

        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });

    });

    //Bootstrap-TouchSpin
    $(".vertical-spin").TouchSpin({
        verticalbuttons: true,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
        verticalupclass: 'ti-plus',
        verticaldownclass: 'ti-minus'
    });
    var vspinTrue = $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    if (vspinTrue) {
        $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
    }

    $("input[name='demo1']").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
        postfix: '%'
    });
    $("input[name='demo2']").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
        maxboostedstep: 10000000,
        prefix: '$'
    });
    $("input[name='demo3']").TouchSpin({
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $("input[name='demo3_21']").TouchSpin({
        initval: 40,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $("input[name='demo3_22']").TouchSpin({
        initval: 40,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });

    $("input[name='demo5']").TouchSpin({
        prefix: "pre",
        postfix: "post",
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $("input[name='demo0']").TouchSpin({
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });

    // Time Picker
    jQuery('#timepicker').timepicker({
        defaultTIme : false,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });
    jQuery('#timepicker2').timepicker({
        showMeridian : false,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });
    jQuery('#timepicker3').timepicker({
        minuteStep : 15,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });

    //colorpicker start

    $('.colorpicker-default').colorpicker({
        format: 'hex'
    });
    $('.colorpicker-rgba').colorpicker();

    // Date Picker
    jQuery('#datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#datepicker-inline').datepicker();
    jQuery('#datepicker-multiple-date').datepicker({
        format: "mm/dd/yyyy",
        clearBtn: true,
        multidate: true,
        multidateSeparator: ","
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });

    //Date range picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-secondary',
        cancelClass: 'btn-primary'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-secondary',
        cancelClass: 'btn-primary'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2016',
        maxDate: '06/30/2016',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-secondary',
        cancelClass: 'btn-primary',
        dateLimit: {
            days: 6
        }
    });

    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

    $('#reportrange').daterangepicker({
        format: 'MM/DD/YYYY',
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2016',
        maxDate: '12/31/2016',
        dateLimit: {
            days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        drops: 'down',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-success',
        cancelClass: 'btn-secondary',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Cancel',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

    //Bootstrap-MaxLength
    $('input#defaultconfig').maxlength({
        warningClass: "badge badge-success",
        limitReachedClass: "badge badge-danger"
    });

    $('input#thresholdconfig').maxlength({
        threshold: 20,
        warningClass: "badge badge-success",
        limitReachedClass: "badge badge-danger"
    });

    $('input#moreoptions').maxlength({
        alwaysShow: true,
        warningClass: "badge badge-success",
        limitReachedClass: "badge badge-danger"
    });

    $('input#alloptions').maxlength({
        alwaysShow: true,
        warningClass: "badge badge-success",
        limitReachedClass: "badge badge-danger",
        separator: ' out of ',
        preText: 'You typed ',
        postText: ' chars available.',
        validate: true
    });

    $('textarea#textarea').maxlength({
        alwaysShow: true,
        warningClass: "badge badge-success",
        limitReachedClass: "badge badge-danger"
    });

    $('input#placement').maxlength({
        alwaysShow: true,
        placement: 'top-left',
        warningClass: "badge badge-success",
        limitReachedClass: "badge badge-danger"
    });

    $(document).ready(function () {
        // Responsive Datatable
        $('#responsive-datatable').DataTable();
    });
</script>