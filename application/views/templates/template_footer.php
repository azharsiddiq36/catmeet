</div>
<!-- Main page footer -->
<footer id="footer">
    <div class="container">

        <!-- Footer info -->
        <p>Built with love on <a href="http://getbootstrap.com/">Twitter Bootstrap</a> by <a href="http://www.walkingpixels.com">Walking Pixels</a></p>

        <!-- Footer nav -->
        <ul>
            <li><a href="http://support.walkingpixels.com/">Support</a></li>
            <li><a href="http://getbootstrap.com/getting-started/">Documentation</a></li>
            <li><a href="http://parallaq.com/">API</a></li>
        </ul>
        <!-- /Footer nav -->

        <!-- Footer back to top -->
        <a href="<?= $this->uri->segment(1)?>#top" class="btn btn-back-to-top" title="Back to top"><span class="elusive icon-arrow-up"></span></a>

    </div>
</footer>
<!-- /Main page footer -->

<!-- Bootstrap scripts -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="<?= base_url()?>assets/dropify/js/dropify.min.js"></script>
<script src="<?= base_url()?>assets/js/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/js/app.js"></script>
<script src="<?= base_url()?>assets/js/plugins/flot/jquery.flot.min.js"></script>
<script src="<?= base_url()?>assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?= base_url()?>assets/js/plugins/dataTables/jquery.datatables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/dateRangePicker/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/dateRangePicker/daterangepicker.js"></script>
<!-- jQuery FullCalendar -->
<script src="<?= base_url()?>assets/js/plugins/wysihtml5/wysihtml5-0.3.0.js"></script>
<script src="<?= base_url()?>assets/js/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="<?= base_url()?>assets/js/plugins/fileupload/bootstrap-fileupload.js"></script>
<script src="<?= base_url()?>assets/js/plugins/inputmask/bootstrap-inputmask.js"></script>

<!-- Button switch -->
<script src="<?= base_url()?>assets/js/plugins/bootstrapSwitch/bootstrapSwitch.js"></script>

<!-- PrettyCheckable checkbox and radio -->
<script src="<?= base_url()?>assets/js/plugins/prettyCheckable/prettyCheckable.js"></script>
<!-- Form validation -->
<script src="<?= base_url()?>assets/js/plugins/bootstrapValidation/jqBootstrapValidation.min.js"></script>
<script src="<?= base_url()?>assets/js/plugins/prettyCheckable/prettyCheckable.js"></script>
<script src="<?= base_url()?>assets/js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
<script src="<?= base_url()?>assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?= base_url()?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script>

    /* Default class modification */
    $.extend( $.fn.dataTableExt.oStdClasses, {
        "sWrapper": "dataTables_wrapper form-inline"
    } );

    /* API method to get paging information */
    $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
    {
        return {
            "iStart":         oSettings._iDisplayStart,
            "iEnd":           oSettings.fnDisplayEnd(),
            "iLength":        oSettings._iDisplayLength,
            "iTotal":         oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
            "iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
        };
    }

    /* Sangoma style pagination control */
    $.extend( $.fn.dataTableExt.oPagination, {
        "sangoma": {
            "fnInit": function( oSettings, nPaging, fnDraw ) {
                var oLang = oSettings.oLanguage.oPaginate;
                var fnClickHandler = function ( e ) {
                    e.preventDefault();
                    if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                        fnDraw( oSettings );
                    }
                };

                $(nPaging).addClass('pagination-right').append(
                    '<ul class="pagination">'+
                    '<li class="prev disabled"><a href="tables.html#">&larr; '+oLang.sPrevious+'</a></li>'+
                    '<li class="next disabled"><a href="tables.html#">'+oLang.sNext+' &rarr; </a></li>'+
                    '</ul>'
                );
                var els = $('a', nPaging);
                $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
                $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
            },

            "fnUpdate": function ( oSettings, fnDraw ) {
                var iListLength = 5;
                var oPaging = oSettings.oInstance.fnPagingInfo();
                var an = oSettings.aanFeatures.p;
                var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

                if ( oPaging.iTotalPages < iListLength) {
                    iStart = 1;
                    iEnd = oPaging.iTotalPages;
                }
                else if ( oPaging.iPage <= iHalf ) {
                    iStart = 1;
                    iEnd = iListLength;
                } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                    iStart = oPaging.iTotalPages - iListLength + 1;
                    iEnd = oPaging.iTotalPages;
                } else {
                    iStart = oPaging.iPage - iHalf + 1;
                    iEnd = iStart + iListLength - 1;
                }

                for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
                    // Remove the middle elements
                    $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                    // Add the new list items and their event handlers
                    for ( j=iStart ; j<=iEnd ; j++ ) {
                        sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                        $('<li '+sClass+'><a href="tables.html#">'+j+'</a></li>')
                            .insertBefore( $('li:last', an[i])[0] )
                            .bind('click', function (e) {
                                e.preventDefault();
                                oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                                fnDraw( oSettings );
                            } );
                    }

                    // Add / remove disabled classes from the static elements
                    if ( oPaging.iPage === 0 ) {
                        $('li:first', an[i]).addClass('disabled');
                    } else {
                        $('li:first', an[i]).removeClass('disabled');
                    }

                    if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                        $('li:last', an[i]).addClass('disabled');
                    } else {
                        $('li:last', an[i]).removeClass('disabled');
                    }
                }
            }
        }
    });

    /* Table #example */
    $(document).ready(function() {
        $('.datatable').dataTable( {
            "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
            "sPaginationType": "sangoma",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        $('.full-calendar-demo').fullCalendar({
            header: {
                left: 'prev today',
                center: 'title',
                right: 'next'
            },
            buttonText: {
                prev: '<span class="elusive icon-chevron-left"></span>',
                next: '<span class="elusive icon-chevron-right"></span>'
            },
            editable: true,
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2),
                    className: 'event-red'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false,
                    className: 'event-blue'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false,
                    className: 'event-green'
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false,
                    className: 'event-orange'
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false,
                    className: 'event-purple'
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false,
                    className: 'event-turquoise'
                },
                {
                    title: 'Walking Pixels website',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://www.walkingpixels.com/',
                    className: 'event-dark'
                }
            ]
        });

    });
</script>

<!-- PrettyCheckable checkbox and radio -->

<script>
    $(document).ready(function() {

        $('.todo-block input').prettyCheckable();

    });
</script>

<!-- Block TODO list -->
<script>
    $(document).ready(function() {

        $('.todo-block input[type="checkbox"], .todo-block .prettycheckbox').click(function(){
            $(this).closest('tr').toggleClass('done');
        });
        $('.todo-block input[type="checkbox"]:checked').closest('tr').addClass('done');

    });
</script>

<!-- jQuery Flot Charts -->
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="<?= base_url()?>assets/js/plugins/flot/excanvas.min.js"></script>
<![endif]-->

<script>
    $(document).ready(function() {

        // Demo #1
        // we use an inline data source in the example, usually data would be fetched from a server
        var data = [], totalPoints = 300;
        function getRandomData() {
            if (data.length > 0)
                data = data.slice(1);

            // do a random walk
            while (data.length < totalPoints) {
                var prev = data.length > 0 ? data[data.length - 1] : 50;
                var y = prev + Math.random() * 10 - 5;
                if (y < 0)
                    y = 0;
                if (y > 100)
                    y = 100;
                data.push(y);
            }

            // zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i)
                res.push([i, data[i]])
            return res;
        }

        // setup control widget
        var updateInterval = 30;
        $("#updateInterval").val(updateInterval).change(function () {
            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                if (updateInterval < 1)
                    updateInterval = 1;
                if (updateInterval > 2000)
                    updateInterval = 2000;
                $(this).val("" + updateInterval);
            }
        });

        // setup plot
        var options = {
            series: {
                shadowSize: 0,
                color: '#c0392b',
                lines: {
                    fill: true
                }
            }, // drawing is faster without shadows
            yaxis: { min: 0, max: 100 },
            xaxis: { show: false },
            grid: { backgroundColor: '#ffffff', borderColor: 'transparent' },
        };
        var plot = $.plot($("#demo-1"), [ getRandomData() ], options);

        function update() {
            plot.setData([ getRandomData() ]);
            // since the axes don't change, we don't need to call plot.setupGrid()
            plot.draw();
            setTimeout(update, updateInterval);
        }

        update();

    });
</script>


<script>
    $(document).ready(function() {

        if($('.color')[0]) {
            var preview = $('.color')[0].style;
        }
        $('.colorpicker').colorpicker().on('changeColor', function(ev){
            preview.backgroundColor = ev.color.toHex();
        });

    });
</script>

<!-- Datepicker -->

<script>
    $(document).ready(function() {

        $('.datepicker').datepicker({
            "autoclose": true
        });

    });
</script>

<!-- Date range picker -->

<script type="text/javascript">
    $(document).ready(function() {

        $('#demoDaterangePicker').daterangepicker();

    });
</script>

<!-- Timepicker -->
<script src="<?= base_url()?>assets/js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
    $(document).ready(function() {

        $('#demoTimepicker').timepicker({
            minuteStep: 5,
            showInputs: false,
            disableFocus: true
        });

    });
</script>

<!-- jQuery TagsInput -->
<script src="<?= base_url()?>assets/js/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script>
    $(document).ready(function() {

        $('.tagsinput').tagsInput();

    });
</script>

<!-- Wysihtml5 -->
<script src="<?= base_url()?>assets/js/plugins/wysihtml5/wysihtml5-0.3.0.js"></script>
<script src="<?= base_url()?>assets/js/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
<script>
    $(document).ready(function() {

        $('#textarea-WYSIWYG').wysihtml5();

    });
</script>

<!-- Fileupload plugin -->

<script>
    $(document).ready(function() {

        $("#demoValidation input").jqBootstrapValidation({
            submitSuccess: function($form, event) {
                event.preventDefault();
            }
        });

    });
</script>

<!-- Inputmask -->

<script>
    $(document).ready(function() {

        $('.styled-checkbox input, .styled-radio input').prettyCheckable();

    });
</script>

</body>
</html>
