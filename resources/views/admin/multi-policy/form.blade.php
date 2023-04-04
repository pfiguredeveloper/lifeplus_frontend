<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
<style type="text/css">
    .SA_Table>thead>tr>th,
    .SA_Table>tbody>tr>th,
    .SA_Table>tfoot>tr>th,
    .SA_Table>thead>tr>td,
    .SA_Table>tbody>tr>td,
    .SA_Table>tfoot>tr>td {
        border: 1px solid #dddddd !important;
    }

    #loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('https://moneycarts.in/public/images/1488.gif') 50% 50% no-repeat rgba(0,0,0,0.4);
    }
</style>
<div id="loader" style="display: none;"></div>


@include ('admin.multi-policy.tab_1')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js-grid/js-grid.js') }}"></script>
<script type="text/javascript">
    window.policyJson = $.parseJSON('<?php echo $policy_json; ?>');
    window.URLDATA = "{{ url('admin/getCalDetail') }}";
    window.CRFTOKEN = "{{ csrf_token() }}";
</script>
<script type="text/javascript" src="{{ asset('assets/pages/policy/policytab.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.0/vue.js"></script>

<script type="text/javascript">
    Vue.component('age-component', {
        template: '<div><select v-on:change = "age()" id="AGE" name="AGE" class="form-control" style="width: 100%;"><option value="" selected="selected"></option></select></div>',
        methods: {
            age: function() {
                if ($("#PLAN").val() != '' && $("#AGE").val() != '' && $("#PLAN").val() > 0 && $("#AGE").val() > 0) {
                    $.ajax({
                        url: "{{ url('admin/getPlanDetail') }}",
                        method: 'Post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "Plan": $("#PLAN").val(),
                            "ageCheck": "1"
                        },
                        success: function(result) {
                            if (!$.isEmptyObject(result)) {
                                console.log(result);
                                if (parseInt(result.getPlanData.matage) != 0) {
                                    if (result.getPlanData != '' && result.getPlanData.sp_po_term == '' && result.getPlanData.sp_pr_term == '' && result.getMTermData != '' && parseInt(result.getMTermData.mtermmax) != 0) {
                                        if (parseInt(result.getPlanData.matage) >= parseInt(result.getMTermData.mtermmax)) {
                                            $('#MTERM').empty().append('<option selected="selected" value=""></option>');
                                            for (var i = parseInt(result.getMTermData.mtermmin); i <= parseInt(result.getMTermData.mtermmax); i++) {
                                                var matAge = parseInt($("#AGE").val()) + parseInt(i);
                                                if (matAge > parseInt(result.getPlanData.matage)) {
                                                    break;
                                                }
                                                $('#MTERM').append($("<option></option>").attr("value", i).text(i));
                                            }
                                        }
                                    } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) != 1 && result.getPlanData.sp_po_term != '' && result.getPlanData.sp_pr_term != '' && result.getMTermData != '' && parseInt(result.getMTermData.mtermmax) != 0) {
                                        if (parseInt(result.getPlanData.matage) >= parseInt(result.getMTermData.mtermmax)) {
                                            var jsArray = JSON.parse("[" + result.getPlanData.sp_po_term + "]");
                                            $('#MTERM').empty().append('<option selected="selected" value=""></option>');
                                            $.each(jsArray, function(r, d) {
                                                var matAge = parseInt($("#AGE").val()) + parseInt(d);
                                                if (matAge > parseInt(result.getPlanData.matage)) {
                                                    return false;
                                                }
                                                $('#MTERM').append($("<option></option>").attr("value", d).text(d));
                                            });
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            },
        }
    });
    const app = new Vue({
        el: '#app',
    });

    $(document).ready(function() {
        $("#RDT").datepicker({
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            showAnim: 'slideDown',
            format: 'dd/mm/yyyy',
        }).on("change", function() {
            $("#CDT").val($("#RDT").val());
        });
        $("#RDT").datepicker("setDate", new Date());
        $("#CDT").datepicker({
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            showAnim: 'slideDown',
            format: 'dd/mm/yyyy',
        });
        $("#CDT").datepicker("setDate", new Date());
    });

    $(document).on("click", "#is_auto_prem", function() {
        if ($("#is_auto_prem").prop('checked') == true) {
            $("#BASIC_PREM").attr("readonly", "readonly");
            $("#DAB_PREM").attr("readonly", "readonly");
            $("#CIR_PREM").attr("readonly", "readonly");
            $("#TR_PREM").attr("readonly", "readonly");
            $("#PWB_PREM").attr("readonly", "readonly");
            $("#SETT_PREM").attr("readonly", "readonly");
        } else {
            $("#BASIC_PREM").removeAttr("readonly");
            $("#DAB_PREM").removeAttr("readonly");
            $("#CIR_PREM").removeAttr("readonly");
            $("#TR_PREM").removeAttr("readonly");
            $("#PWB_PREM").removeAttr("readonly");
            $("#SETT_PREM").removeAttr("readonly");
        }
    });

    $(document).on("change", "#agency_sel", function() {
        if ($("#agency_sel").val() != '') {
            $.ajax({
                url: "{{ url('admin/getAgencyCode') }}" + "/" + $("#agency_sel").val(),
                method: 'get',
                success: function(result) {
                    if (!$.isEmptyObject(result)) {
                        $("#agencycode").val(result.AGCODE);
                    }
                }
            });
        } else {
            $("#agencycode").val('');
        }
    });

    $(document).on("change", "#name1_sel", function() {
        if ($("#name1_sel").val() != '') {
            $.ajax({
                url: "{{ url('admin/getPartyBirthDay') }}" + "/" + $("#name1_sel").val(),
                method: 'get',
                success: function(result) {
                    if (!$.isEmptyObject(result)) {
                        if (result.ABD != '' && result.ABD != null) {
                            var date = new Date(result.ABD),
                                yr = date.getFullYear(),
                                month = date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1),
                                day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate(),
                                newDate = day + '/' + month + '/' + yr;
                            $("#birthdate1").val(newDate);
                        }
                    }
                }
            });
        } else {
            $("#birthdate1").val('');
        }
    });

    $(document).on("change", "#NAME2", function() {
        if ($("#NAME2").val() != '') {
            $.ajax({
                url: "{{ url('admin/getPartyBirthDay') }}" + "/" + $("#NAME2").val(),
                method: 'get',
                success: function(result) {
                    if (!$.isEmptyObject(result)) {
                        if (result.ABD != '' && result.ABD != null) {
                            var date = new Date(result.ABD),
                                yr = date.getFullYear(),
                                month = date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1),
                                day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate(),
                                newDate = day + '/' + month + '/' + yr;
                            $("#BIRTH2").val(newDate);
                        }
                    }
                }
            });
        } else {
            $("#BIRTH2").val('');
        }
    });

    $("#SAOPTION").hide();
    $(document).on("change", "#PLAN", function() {
        if ($("#PLAN").val() != '' && $("#PLAN").val() > 0) {
            $.ajax({
                url: "{{ url('admin/getCalDetail') }}",
                method: 'Post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "Plan": $("#PLAN").val()
                },
                success: function(result) {
                    if (!$.isEmptyObject(result)) {
                        console.log(result.getSaOptionData);
                        $('#AGE').empty().append('<option selected="selected" value=""></option>');
                        if (result.getAgeData != '') {
                            for (var i = parseInt(result.getAgeData.agemin); i <= parseInt(result.getAgeData.agemax); i++) {
                                $('#AGE').append($("<option></option>").attr("value", i).text(i));
                            }
                        }

                        if (result.getPlanData != '' && parseInt(result.getPlanData.po_term) != 0 && result.getPlanData.po_term != '') {
                            $('#MTERM').empty().append('<option selected="selected" value="' + result.getPlanData.po_term + '">' + result.getPlanData.po_term + '</option>');
                        } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) != 1 && result.getPlanData.sp_po_term != '') {
                            var jsArray = JSON.parse("[" + result.getPlanData.sp_po_term + "]");
                            $('#MTERM').empty().append('<option selected="selected" value=""></option>');
                            $.each(jsArray, function(r, d) {
                                $('#MTERM').append($("<option></option>").attr("value", d).text(d));
                            });
                        } else {
                            $('#MTERM').empty().append('<option selected="selected" value=""></option>');
                            if (result.getMTermData != '') {
                                for (var i = parseInt(result.getMTermData.mtermmin); i <= parseInt(result.getMTermData.mtermmax); i++) {
                                    $('#MTERM').append($("<option></option>").attr("value", i).text(i));
                                }
                            }
                        }

                        if (result.getPlanData != '' && parseInt(result.getPlanData.pr_term) != 0 && result.getPlanData.pr_term != '') {
                            $('#PTERM').empty().append('<option selected="selected" value="' + result.getPlanData.pr_term + '">' + result.getPlanData.pr_term + '</option>');
                        } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) == 1) {
                            $('#PTERM').empty().append('<option selected="selected" value=""></option>');
                        } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) != 1 && result.getPlanData.sp_po_term != '') {
                            $('#PTERM').empty().append('<option selected="selected" value=""></option>');
                        } else {
                            $('#PTERM').empty().append('<option selected="selected" value=""></option>');
                            if (result.getPTermData != '') {
                                for (var i = parseInt(result.getPTermData.ptermmin); i <= parseInt(result.getPTermData.ptermmax); i++) {
                                    $('#PTERM').append($("<option></option>").attr("value", i).text(i));
                                }
                            }
                        }


                        if (result.getSaOptionData != '') {
                            $("#SAOPTION").show();
                            $('#SAOPTION').empty().append('<option selected="selected" value=""></option>');
                            $.each(result.getSaOptionData, function(r, d) {
                                console.log(d.id, d.option_name);
                                $('#SAOPTION').append($("<option></option>").attr("value", d.id).text(d.option_name));
                            });
                        } else {
                            $("#SAOPTION").hide();
                        }

                        $('#MODE').empty().append('<option selected="selected" value=""></option>');
                        if (result.getModeData != '') {
                            $.each(result.getModeData, function(r, d) {
                                if (d == 'Y')
                                    d = 'Yearly';
                                else if (d == 'H')
                                    d = 'Half Yearly';
                                else if (d == 'Q')
                                    d = 'Quarterly';
                                else if (d == 'M')
                                    d = 'Monthly';
                                else if (d == 'S')
                                    d = 'SSS';
                                else if (d == 'G')
                                    d = 'Single';
                                else
                                    d = '';
                                $('#MODE').append($("<option></option>").attr("value", d).text(d));
                            });
                        }
                    }
                }
            });
        } else {
            $('#AGE').empty().append('<option selected="selected" value=""></option>');
            $('#MTERM').empty().append('<option selected="selected" value=""></option>');
            $('#PTERM').empty().append('<option selected="selected" value=""></option>');
            $('#MODE').empty().append('<option selected="selected" value=""></option>');
        }
    });

    // $(document).on("change", "#PLAN", function() {
    //     if ($("#PLAN").val() != '' && $("#PLAN").val() > 0) {
    //         $.ajax({
    //             url: "{{ url('admin/getCalDetail') }}",
    //             method: 'Post',
    //             data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 "Plan": $("#PLAN").val()
    //             },
    //             success: function(result) {
    //                 if (!$.isEmptyObject(result)) {
    //                     $('#AGE').empty().append('<option selected="selected" value=""></option>');
    //                     if (result.getAgeData != '') {
    //                         for (var i = parseInt(result.getAgeData.agemin); i <= parseInt(result.getAgeData.agemax); i++) {
    //                             $('#AGE').append($("<option></option>").attr("value", i).text(i));
    //                         }
    //                     }

    //                     if (result.getPlanData != '' && parseInt(result.getPlanData.po_term) != 0 && result.getPlanData.po_term != '') {
    //                         $('#MTERM').empty().append('<option selected="selected" value="' + result.getPlanData.po_term + '">' + result.getPlanData.po_term + '</option>');
    //                     } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) != 1 && result.getPlanData.sp_po_term != '') {
    //                         var jsArray = JSON.parse("[" + result.getPlanData.sp_po_term + "]");
    //                         $('#MTERM').empty().append('<option selected="selected" value=""></option>');
    //                         $.each(jsArray, function(r, d) {
    //                             $('#MTERM').append($("<option></option>").attr("value", d).text(d));
    //                         });
    //                     } else {
    //                         $('#MTERM').empty().append('<option selected="selected" value=""></option>');
    //                         if (result.getMTermData != '') {
    //                             for (var i = parseInt(result.getMTermData.mtermmin); i <= parseInt(result.getMTermData.mtermmax); i++) {
    //                                 $('#MTERM').append($("<option></option>").attr("value", i).text(i));
    //                             }
    //                         }
    //                     }

    //                     if (result.getPlanData != '' && parseInt(result.getPlanData.pr_term) != 0 && result.getPlanData.pr_term != '') {
    //                         $('#PTERM').empty().append('<option selected="selected" value="' + result.getPlanData.pr_term + '">' + result.getPlanData.pr_term + '</option>');
    //                     } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) == 1) {
    //                         $('#PTERM').empty().append('<option selected="selected" value=""></option>');
    //                     } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) != 1 && result.getPlanData.sp_po_term != '') {
    //                         $('#PTERM').empty().append('<option selected="selected" value=""></option>');
    //                     } else {
    //                         $('#PTERM').empty().append('<option selected="selected" value=""></option>');
    //                         if (result.getPTermData != '') {
    //                             for (var i = parseInt(result.getPTermData.ptermmin); i <= parseInt(result.getPTermData.ptermmax); i++) {
    //                                 $('#PTERM').append($("<option></option>").attr("value", i).text(i));
    //                             }
    //                         }
    //                     }

    //                     $('#MODE').empty().append('<option selected="selected" value=""></option>');
    //                     if (result.getModeData != '') {
    //                         $.each(result.getModeData, function(r, d) {
    //                             if (d == 'Y')
    //                                 d = 'Yearly';
    //                             else if (d == 'H')
    //                                 d = 'Half Yearly';
    //                             else if (d == 'Q')
    //                                 d = 'Quarterly';
    //                             else if (d == 'M')
    //                                 d = 'Monthly';
    //                             else if (d == 'S')
    //                                 d = 'SSS';
    //                             else if (d == 'G')
    //                                 d = 'Single';
    //                             else
    //                                 d = '';
    //                             $('#MODE').append($("<option></option>").attr("value", d).text(d));
    //                         });
    //                     }
    //                 }
    //             }
    //         });
    //     } else {
    //         $('#AGE').empty().append('<option selected="selected" value=""></option>');
    //         $('#MTERM').empty().append('<option selected="selected" value=""></option>');
    //         $('#PTERM').empty().append('<option selected="selected" value=""></option>');
    //         $('#MODE').empty().append('<option selected="selected" value=""></option>');
    //     }
    // });

    function getDateForFUP(CurrentDate, x, fullFUP) {
        CurrentDate.setMonth(CurrentDate.getMonth() + x);
        var day = ('0' + CurrentDate.getDate()).slice(-2);
        var month = ('0' + (CurrentDate.getMonth() + 1)).slice(-2);
        var year = CurrentDate.getFullYear();
        if (fullFUP == 2) {
            return day + "/" + month + "/" + year;
        }
        return month + "/" + year;
    }

    $(document).on("change", "#MTERM", function() {
        if ($("#PLAN").val() != '' && $("#MTERM").val() != '' && $("#PLAN").val() > 0 && $("#MTERM").val() > 0) {
            if ($("#RDT").val() != '') {
                getFupMatLastpremDate();
                getFupPremDates($("#RDT").val(), $("#MODE").val(), $("#MTERM").val(), '');
            }
            $.ajax({
                url: "{{ url('admin/getPlanDetail') }}",
                method: 'Post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "Plan": $("#PLAN").val()
                },
                success: function(result) {
                    if (!$.isEmptyObject(result)) {
                        //console.log(parseInt(result.getPlanData.po_pr_same));
                        if (result.getPlanData != '' && (parseInt(result.getPlanData.po_pr_same) == 1 || result.getPlanData.po_pr_same != '')) {
                            $('#PTERM').empty().append('<option selected="selected" value="' + $("#MTERM").val() + '">' + $("#MTERM").val() + '</option>');
                        } else if (result.getPlanData != '' && (parseInt(result.getPlanData.po_pr_same) != 1 || result.getPlanData.po_pr_same == '') && result.getPlanData.sp_po_term != '' && result.getPlanData.sp_pr_term != '') {
                            var dta = result.getPlanData.sp_pr_term.split('|');
                            for (var i = 0; i < dta.length; i++) {
                                var edited = dta[i].replace(/^,|,$/g, '');
                                var findFirst = +edited.toString().split(',')[0];
                                if (findFirst == $("#MTERM").val()) {
                                    var myString = edited.replace(findFirst + ',', '');
                                }
                            }
                            var jsArray = JSON.parse("[" + myString + "]");
                            if (jsArray.length == 1) {
                                $('#PTERM').empty().append('<option selected="selected" value=""></option>');
                                $("#PTERM option[value='']").remove();
                            } else {
                                $('#PTERM').empty().append('<option selected="selected" value=""></option>');
                            }
                            $.each(jsArray, function(r, d) {
                                $('#PTERM').append($("<option></option>").attr("value", d).text(d));
                            });
                        }
                    }
                }
            });
        }
    });

    // $(document).on("change", "#MTERM", function() {
    //     if ($("#PLAN").val() != '' && $("#MTERM").val() != '' && $("#PLAN").val() > 0 && $("#MTERM").val() > 0) {
    //         $.ajax({
    //             url: "{{ url('admin/getPlanDetail') }}",
    //             method: 'Post',
    //             data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 "Plan": $("#PLAN").val()
    //             },
    //             success: function(result) {
    //                 if (!$.isEmptyObject(result)) {
    //                     if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) == 1) {
    //                         $('#PTERM').empty().append('<option selected="selected" value="' + $("#MTERM").val() + '">' + $("#MTERM").val() + '</option>');
    //                     } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) != 1 && result.getPlanData.sp_po_term != '' && result.getPlanData.sp_pr_term != '') {
    //                         var dta = result.getPlanData.sp_pr_term.split('|');
    //                         for (var i = 0; i < dta.length; i++) {
    //                             var edited = dta[i].replace(/^,|,$/g, '');
    //                             var findFirst = +edited.toString().split(',')[0];
    //                             if (findFirst == $("#MTERM").val()) {
    //                                 var myString = edited.replace(findFirst + ',', '');
    //                             }
    //                         }
    //                         var jsArray = JSON.parse("[" + myString + "]");
    //                         if (jsArray.length == 1) {
    //                             $('#PTERM').empty().append('<option selected="selected" value=""></option>');
    //                             $("#PTERM option[value='']").remove();
    //                         } else {
    //                             $('#PTERM').empty().append('<option selected="selected" value=""></option>');
    //                         }
    //                         $.each(jsArray, function(r, d) {
    //                             $('#PTERM').append($("<option></option>").attr("value", d).text(d));
    //                         });
    //                     }
    //                 }
    //             }
    //         });
    //     }
    // });

    // $(document).on("change", "#AGE", function() {
    //     if ($("#PLAN").val() != '' && $("#AGE").val() != '' && $("#PLAN").val() > 0 && $("#AGE").val() > 0) {
    //         $.ajax({
    //             url: "{{ url('admin/getPlanDetail') }}",
    //             method: 'Post',
    //             data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 "Plan": $("#PLAN").val(),
    //                 "ageCheck": "1"
    //             },
    //             success: function(result) {
    //                 if (!$.isEmptyObject(result)) {
    //                     if (!$.isEmptyObject(result)) {
    //                         if (parseInt(result.getPlanData.matage) != 0) {
    //                             if (result.getPlanData != '' && result.getPlanData.sp_po_term == '' && result.getPlanData.sp_pr_term == '' && result.getMTermData != '' && parseInt(result.getMTermData.mtermmax) != 0) {
    //                                 if (parseInt(result.getPlanData.matage) >= parseInt(result.getMTermData.mtermmax)) {
    //                                     $('#MTERM').empty().append('<option selected="selected" value=""></option>');
    //                                     for (var i = parseInt(result.getMTermData.mtermmin); i <= parseInt(result.getMTermData.mtermmax); i++) {
    //                                         var matAge = parseInt($("#AGE").val()) + parseInt(i);
    //                                         if (matAge > parseInt(result.getPlanData.matage)) {
    //                                             break;
    //                                         }
    //                                         $('#MTERM').append($("<option></option>").attr("value", i).text(i));
    //                                     }
    //                                 }
    //                             } else if (result.getPlanData != '' && parseInt(result.getPlanData.po_pr_same) != 1 && result.getPlanData.sp_po_term != '' && result.getPlanData.sp_pr_term != '' && result.getMTermData != '' && parseInt(result.getMTermData.mtermmax) != 0) {
    //                                 if (parseInt(result.getPlanData.matage) >= parseInt(result.getMTermData.mtermmax)) {
    //                                     var jsArray = JSON.parse("[" + result.getPlanData.sp_po_term + "]");
    //                                     $('#MTERM').empty().append('<option selected="selected" value=""></option>');
    //                                     $.each(jsArray, function(r, d) {
    //                                         var matAge = parseInt($("#AGE").val()) + parseInt(d);
    //                                         if (matAge > parseInt(result.getPlanData.matage)) {
    //                                             return false;
    //                                         }
    //                                         $('#MTERM').append($("<option></option>").attr("value", d).text(d));
    //                                     });
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         });
    //     }
    // });

    // $(document).on("change", "#MODE", function() {
    //     if ($("#MODE").val() != '') {
    //         if ($("#MODE").val() == 'Yearly') {
    //             var x = 12;
    //         } else if ($("#MODE").val() == 'Half Yearly') {
    //             var x = 6;
    //         } else if ($("#MODE").val() == 'Quarterly') {
    //             var x = 3;
    //         } else if ($("#MODE").val() == 'Monthly') {
    //             var x = 1;
    //         } else if ($("#MODE").val() == 'SSS') {
    //             var x = 1;
    //         } else if ($("#MODE").val() == 'Single') {
    //             var x = 1;
    //         }
    //         var date = $("#RDT").val();
    //         var dateAr = date.split('/');
    //         var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
    //         var CurrentDate = new Date(newDate);
    //         var FUPDate = getDateForFUP(CurrentDate, x);
    //         $("#FUP").val(FUPDate);
    //     } else {
    //         $("#FUP").val("");
    //     }
    // });

    function getFupPremDates(riskdt, mode, terms, selectedFUP = '') {

        var ar_month_year = riskdt.split("/");
        var day = ar_month_year[0];
        var month = ar_month_year[1];
        var year = ar_month_year[2];
        var comination = [];
        var current_month = month;
        var current_year = year;
        var full_date = [];
        var test_full_date = [];
        var count = 0;
        var count_days = 0;
        var yearexist = [];

        yearexist.push(year);
        var mat_date_object = new Date((Number(year) + terms), month, day);
        if (mode == 'SSS') {
            mode = 'Yearly';
        }
        if (mode == "Monthly") {
            max_value = 12;
            append_month = 1;
            var decide = max_value * terms - 1;
        } else if (mode == "Quarterly") {
            max_value = 4;
            append_month = 3;
            var decide = max_value * terms - 1;
        } else if (mode == "Half Yearly") {
            max_value = 2;
            append_month = 6;
            var decide = max_value * terms - 1;
        } else if (mode == "Yearly") {
            max_value = 1;
            append_month = 12;
            var decide = max_value * terms - 1;
        }
        var count = 0;
        var e = '';
        var checkmonth = '13';
        var fullyear = year;
        var appenmonth = month;
        var d = new Date(year, month, day);
        for (var i = 1; i <= decide; i++) {
            if (mode == "Monthly" || mode == "Half Yearly" || mode == "Quarterly") {
                d.setMonth(d.getMonth() + append_month);
            }
            count = count + Number(1);
            d = d;
            months = d.getMonth();
            fullyear = d.getFullYear();
            if (months == 0 && mode != "Yearly") {
                months = '12';
                fullyear = d.getFullYear() - 1;
            }
            if (mode == "Yearly") {
                d.setMonth(d.getMonth() + append_month);
                fullyear = d.getFullYear();
            }
            if (months <= 9) {
                months = "0" + months;
            }
            test_full_date.push(months + "/" + fullyear);
        }
        //alert("Call");
        $('#FUP').empty();
        $.each(test_full_date, function(r, d) {
            if (selectedFUP != '' && selectedFUP == d) {
                $('#FUP').append($("<option selected='selected'></option>").attr("value", d).text(d));
            } else {
                $('#FUP').append($("<option></option>").attr("value", d).text(d));
            }
        });
        //return test_full_date;
        //document.write(test_full_date);
        //test_full_date.forEach(num => document.write(num));
    }

    $(document).on("change", "#MODE", function() {
        if ($("#MODE").val() != '' && $("#RDT").val() != '') {
            getFupMatLastpremDate();
            getFupPremDates($("#RDT").val(), $("#MODE").val(), $("#MTERM").val(), '');
        } else {
            $("#FUP").val("");
            $("#LASTPREM").val("");
        }
    });

    $(document).on("change", "#FUP", function() {
        var fupDate = $("#FUP").val();
        var fupdateAr = fupDate.split('/');
        var date = $("#RDT").val();
        var dateAr = date.split('/');
        var day = dateAr[0];
        var month = fupdateAr[0];
        var year = fupdateAr[1];
        $("#FULLFUP").val(day + "/" + month + "/" + year);
    });

    function getLastPremDate(CurrentDate, x) {
        CurrentDate.setMonth(CurrentDate.getMonth() - x);
        var day = ('0' + CurrentDate.getDate()).slice(-2);
        var month = ('0' + (CurrentDate.getMonth() + 1)).slice(-2);
        var year = CurrentDate.getFullYear();
        return day + "/" + month + "/" + year;
    }

    function getFupMatLastpremDate() {
        if ($("#MODE").val() == 'Yearly') {
            var x = 12;
        } else if ($("#MODE").val() == 'Half Yearly') {
            var x = 6;
        } else if ($("#MODE").val() == 'Quarterly') {
            var x = 3;
        } else if ($("#MODE").val() == 'Monthly') {
            var x = 1;
        } else if ($("#MODE").val() == 'SSS') {
            var x = 1;
        } else if ($("#MODE").val() == 'Single') {
            var x = 1;
        }
        var date = $("#RDT").val();
        var dateAr = date.split('/');
        var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
        var CurrentDate = new Date(newDate);
        var CurrentDate1 = new Date(newDate);
        var FUPDate = getDateForFUP(CurrentDate, x, 1);
        var FullFUPDate = getDateForFUP(CurrentDate1, x, 2);
        if ($("#MTERM").val() != '') {
            var expiryDate = new Date(dateAr[2], dateAr[1] - 1, dateAr[0]);
            expiryDate.setFullYear(expiryDate.getFullYear() + parseInt($("#MTERM").val()));

            var day = ('0' + expiryDate.getDate()).slice(-2);
            var month = ('0' + (expiryDate.getMonth() + 1)).slice(-2);
            var year = expiryDate.getFullYear();
            $("#MATDATE").val(day + "/" + month + "/" + year);

            var expiryDate1 = new Date(year, month - 1, day);
            var LASTPREM = getLastPremDate(expiryDate1, x);
            if ($("#MODE").val() != '') {
                $("#LASTPREM").val(LASTPREM);
            }
        } else {
            $("#MATDATE").val("");
            $("#LASTPREM").val("");
        }
        if ($("#MODE").val() != '') {
            //$("#FUP").val(FUPDate);
            $("#FULLFUP").val(FullFUPDate);
        }
    }

    $(document).on("change", "#DAB_SA", function() {
        var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;
        $("#DAB_SA").val($(this).val());
        if ($("#DAB_SA").val() > sa) {
            $("#DAB_SA").val(sa);
        }
        //$(".GET_PREM").trigger('change');
    });

    $(document).on("change", "#TR_SA", function() {
        var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;
        $("#TR_SA").val($(this).val());
        if ($("#TR_SA").val() > sa) {
            $("#TR_SA").val(sa);
        }
        //$(".GET_PREM").trigger('change');
    });

    $(document).on("change", "#CIR_SA", function() {
        var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;
        $("#CIR_SA").val($(this).val());
        if ($("#CIR_SA").val() > sa) {
            $("#CIR_SA").val(sa);
        }
        //$(".GET_PREM").trigger('change');
    });

    $(document).on("change", ".GET_PREM", function() {
        if ($("#PLAN").val() != '' && $("#PLAN").val() > 0) {
            var plno = ($("#PLAN").val() != '') ? $("#PLAN").val() : 0;
            var age = ($("#AGE").val() != '') ? $("#AGE").val() : 0;
            var mterm = ($("#MTERM").val() != '') ? $("#MTERM").val() : 0;
            var pterm = ($("#PTERM").val() != '') ? $("#PTERM").val() : 0;
            var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;

            // if (sa != 0 && sa > 0) {
            //     $("#DAB_SA").val(sa);
            //     $("#TR_SA").val(sa);
            //     $("#CIR_SA").val(sa);
            // }

            var dabsa = ($("#DAB_SA").val() != '') ? $("#DAB_SA").val() : 0;
            var trsa = ($("#TR_SA").val() != '') ? $("#TR_SA").val() : 0;
            var cirsa = ($("#CIR_SA").val() != '') ? $("#CIR_SA").val() : 0;
            var option = 'M';
            var waive = ($("#PWB").val() != '') ? $("#PWB").val() : 'No';
            var PropAge = ($("#PROP_AGE").val() != '') ? $("#PROP_AGE").val() : 0;
            var curr_year = new Date().getFullYear();
            var method = "GetPremium";
            var tax_benifit = 0;
            var bonus = 0;
            var daboption = ($("#DAB_OPTION").val() != '') ? $("#DAB_OPTION").val() : 0;
            var DAB_CHECK = 0;
            if ($("#DAB_CHECK").prop('checked') == true) {
                var DAB_CHECK = 1;
            }
            var TR_CHECK = 0;
            if ($("#TR_CHECK").prop('checked') == true) {
                var TR_CHECK = 1;
            }
            var CIR_CHECK = 0;
            if ($("#CIR_CHECK").prop('checked') == true) {
                var CIR_CHECK = 1;
            }
            var PWB_CHECK = 0;
            if ($("#PWB_CHECK").prop('checked') == true) {
                var PWB_CHECK = 1;
            }
            var SETT_CHECK = 0;
            if ($("#SETT_CHECK").prop('checked') == true) {
                var SETT_CHECK = 1;
            }

            if ($("#is_auto_prem").prop('checked') == true) {
                $.ajax({
                    url: "{{ url('admin/getPremiumPrentation') }}",
                    method: 'Post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "plno": plno,
                        "age": age,
                        "mterm": mterm,
                        "pterm": pterm,
                        "sa": sa,
                        "dabsa": dabsa,
                        "trsa": trsa,
                        "cirsa": cirsa,
                        "option": option,
                        "waive": waive,
                        "PropAge": PropAge,
                        "curr_year": curr_year,
                        "method": method,
                        "tax_benifit": tax_benifit,
                        "bonus": bonus,
                        "daboption": daboption,
                        "DAB_CHECK": DAB_CHECK,
                        "TR_CHECK": TR_CHECK,
                        "CIR_CHECK": CIR_CHECK,
                        "PWB_CHECK": PWB_CHECK,
                        "SETT_CHECK": SETT_CHECK
                    },
                    success: function(result) {
                        if (!$.isEmptyObject(result)) {
                            if (result.Premium != '') {

                                $.each(result.Premium, function(key, value) {
                                    var dabPrem = 0;
                                    var trPrem = 0;
                                    var cirPrem = 0;
                                    var pwbPrem = 0;
                                    if ($("#MODE").val() == 'Yearly') {
                                        var basicPrem = value.y.basic_prem;
                                        var totalPrem = value.y.total_prem;
                                        if (key == 0) {
                                            var gst1 = value.y.GST;
                                            $("#GST1").val(gst1.toFixed(2));
                                            var totPremWGST1 = value.y.prem_With_GST;
                                            $("#TOTPREM1").val(totPremWGST1.toFixed(2));
                                        }
                                        if (key == 1) {
                                            var gst2 = value.y.GST;
                                            $("#GST2").val(gst2.toFixed(2));
                                            var totPremWGST2 = value.y.prem_With_GST;
                                            $("#TOTPREM2").val(totPremWGST2.toFixed(2));
                                        }
                                        //console.log(value);
                                        if (typeof(value.y.dab_prem) != "undefined" && value.y.dab_prem !== null) {
                                            var dabPrem = value.y.dab_prem;
                                        }
                                        if (typeof(value.y.tr_prem) != "undefined" && value.y.tr_prem !== null) {
                                            var trPrem = value.y.tr_prem;
                                        }
                                        if (typeof(value.y.cir_prem) != "undefined" && value.y.cir_prem !== null) {
                                            var cirPrem = value.y.cir_prem;
                                        }
                                        if (typeof(value.y.waive_prem) != "undefined" && value.y.waive_prem !== null) {
                                            var pwbPrem = value.y.waive_prem;
                                        }
                                    } else if ($("#MODE").val() == 'Half Yearly') {
                                        var basicPrem = value.h.basic_prem;
                                        var totalPrem = value.h.total_prem;
                                        if (key == 0) {
                                            var gst1 = value.h.GST;
                                            $("#GST1").val(gst1.toFixed(2));
                                            var totPremWGST1 = value.h.prem_With_GST;
                                            $("#TOTPREM1").val(totPremWGST1.toFixed(2));
                                        }
                                        if (key == 1) {
                                            var gst2 = value.h.GST;
                                            $("#GST2").val(gst2.toFixed(2));
                                            var totPremWGST2 = value.h.prem_With_GST;
                                            $("#TOTPREM2").val(totPremWGST2.toFixed(2));
                                        }
                                        if (typeof(value.h.dab_prem) != "undefined" && value.h.dab_prem !== null) {
                                            var dabPrem = value.h.dab_prem;
                                        }
                                        if (typeof(value.h.tr_prem) != "undefined" && value.h.tr_prem !== null) {
                                            var trPrem = value.h.tr_prem;
                                        }
                                        if (typeof(value.h.cir_prem) != "undefined" && value.h.cir_prem !== null) {
                                            var cirPrem = value.h.cir_prem;
                                        }
                                        if (typeof(value.h.waive_prem) != "undefined" && value.h.waive_prem !== null) {
                                            var pwbPrem = value.h.waive_prem;
                                        }
                                    } else if ($("#MODE").val() == 'Quarterly') {
                                        var basicPrem = value.q.basic_prem;
                                        var totalPrem = value.q.total_prem;
                                        if (key == 0) {
                                            var gst1 = value.q.GST;
                                            $("#GST1").val(gst1.toFixed(2));
                                            var totPremWGST1 = value.q.prem_With_GST;
                                            $("#TOTPREM1").val(totPremWGST1.toFixed(2));
                                        }
                                        if (key == 1) {
                                            var gst2 = value.q.GST;
                                            $("#GST2").val(gst2.toFixed(2));
                                            var totPremWGST2 = value.q.prem_With_GST;
                                            $("#TOTPREM2").val(totPremWGST2.toFixed(2));
                                        }
                                        if (typeof(value.q.dab_prem) != "undefined" && value.q.dab_prem !== null) {
                                            var dabPrem = value.q.dab_prem;
                                        }
                                        if (typeof(value.q.tr_prem) != "undefined" && value.q.tr_prem !== null) {
                                            var trPrem = value.q.tr_prem;
                                        }
                                        if (typeof(value.q.cir_prem) != "undefined" && value.q.cir_prem !== null) {
                                            var cirPrem = value.q.cir_prem;
                                        }
                                        if (typeof(value.q.waive_prem) != "undefined" && value.q.waive_prem !== null) {
                                            var pwbPrem = value.q.waive_prem;
                                        }
                                    } else if ($("#MODE").val() == 'Monthly') {
                                        var basicPrem = value.m.basic_prem;
                                        var totalPrem = value.m.total_prem;
                                        if (key == 0) {
                                            var gst1 = value.m.GST;
                                            $("#GST1").val(gst1.toFixed(2));
                                            var totPremWGST1 = value.m.prem_With_GST;
                                            $("#TOTPREM1").val(totPremWGST1.toFixed(2));
                                        }
                                        if (key == 1) {
                                            var gst2 = value.m.GST;
                                            $("#GST2").val(gst2.toFixed(2));
                                            var totPremWGST2 = value.m.prem_With_GST;
                                            $("#TOTPREM2").val(totPremWGST2.toFixed(2));
                                        }
                                        if (typeof(value.m.dab_prem) != "undefined" && value.m.dab_prem !== null) {
                                            var dabPrem = value.m.dab_prem;
                                        }
                                        if (typeof(value.m.tr_prem) != "undefined" && value.m.tr_prem !== null) {
                                            var trPrem = value.m.tr_prem;
                                        }
                                        if (typeof(value.m.cir_prem) != "undefined" && value.m.cir_prem !== null) {
                                            var cirPrem = value.m.cir_prem;
                                        }
                                        if (typeof(value.m.waive_prem) != "undefined" && value.m.waive_prem !== null) {
                                            var pwbPrem = value.m.waive_prem;
                                        }
                                    } else if ($("#MODE").val() == 'SSS') {
                                        var basicPrem = value.s.basic_prem;
                                        var totalPrem = value.s.total_prem;
                                        if (key == 0) {
                                            var gst1 = value.s.GST;
                                            $("#GST1").val(gst1.toFixed(2));
                                            var totPremWGST1 = value.s.prem_With_GST;
                                            $("#TOTPREM1").val(totPremWGST1.toFixed(2));
                                        }
                                        if (key == 1) {
                                            var gst2 = value.s.GST;
                                            $("#GST2").val(gst2.toFixed(2));
                                            var totPremWGST2 = value.s.prem_With_GST;
                                            $("#TOTPREM2").val(totPremWGST2.toFixed(2));
                                        }
                                        if (typeof(value.s.dab_prem) != "undefined" && value.s.dab_prem !== null) {
                                            var dabPrem = value.s.dab_prem;
                                        }
                                        if (typeof(value.s.tr_prem) != "undefined" && value.s.tr_prem !== null) {
                                            var trPrem = value.s.tr_prem;
                                        }
                                        if (typeof(value.s.cir_prem) != "undefined" && value.s.cir_prem !== null) {
                                            var cirPrem = value.s.cir_prem;
                                        }
                                        if (typeof(value.s.waive_prem) != "undefined" && value.s.waive_prem !== null) {
                                            var pwbPrem = value.s.waive_prem;
                                        }
                                    } else if ($("#MODE").val() == 'Single') {
                                        var basicPrem = value.g.basic_prem;
                                        var totalPrem = value.g.total_prem;
                                        if (key == 0) {
                                            var gst1 = value.g.GST;
                                            $("#GST1").val(gst1.toFixed(2));
                                            var totPremWGST1 = value.g.prem_With_GST;
                                            $("#TOTPREM1").val(totPremWGST1.toFixed(2));
                                        }
                                        if (key == 1) {
                                            var gst2 = value.g.GST;
                                            $("#GST2").val(gst2.toFixed(2));
                                            var totPremWGST2 = value.g.prem_With_GST;
                                            $("#TOTPREM2").val(totPremWGST2.toFixed(2));
                                        }
                                        if (typeof(value.g.dab_prem) != "undefined" && value.g.dab_prem !== null) {
                                            var dabPrem = value.g.dab_prem;
                                        }
                                        if (typeof(value.g.tr_prem) != "undefined" && value.g.tr_prem !== null) {
                                            var trPrem = value.g.tr_prem;
                                        }
                                        if (typeof(value.g.cir_prem) != "undefined" && value.g.cir_prem !== null) {
                                            var cirPrem = value.g.cir_prem;
                                        }
                                        if (typeof(value.g.waive_prem) != "undefined" && value.g.waive_prem !== null) {
                                            var pwbPrem = value.g.waive_prem;
                                        }
                                    }

                                    if (key == 1) {
                                        $("#BASIC_PREM").val(basicPrem.toFixed(2));
                                        $("#DAB_PREM").val(dabPrem.toFixed(2));
                                        $("#CIR_PREM").val(cirPrem.toFixed(2));
                                        $("#TR_PREM").val(trPrem.toFixed(2));
                                        $("#PWB_PREM").val(pwbPrem.toFixed(2));
                                        $("#PREM").val(totalPrem.toFixed(2));
                                        return false;
                                    }
                                });
                            }
                        }
                    }
                });
            } else {
                var basicPrem = ($("#BASIC_PREM").val() != '') ? $("#BASIC_PREM").val() : 0;
                var davPrem = ($("#DAB_PREM").val() != '') ? $("#DAB_PREM").val() : 0;
                var trPrem = ($("#TR_PREM").val() != '') ? $("#TR_PREM").val() : 0;
                var cirPrem = ($("#CIR_PREM").val() != '') ? $("#CIR_PREM").val() : 0;
                var pwbPrem = ($("#PWB_PREM").val() != '') ? $("#PWB_PREM").val() : 0;
                var totalPrem = parseFloat(basicPrem) + parseFloat(davPrem) + parseFloat(trPrem) + parseFloat(cirPrem) + parseFloat(pwbPrem);
                $("#PREM").val(totalPrem);
                var gst1 = (parseFloat(totalPrem) * 4.5 / 100);
                var gst2 = (parseFloat(totalPrem) * 2.25 / 100);
                $("#GST1").val(gst1);
                $("#GST2").val(gst2);
                var premGst1 = parseFloat(totalPrem) + parseFloat(gst1);
                var premGst2 = parseFloat(totalPrem) + parseFloat(gst2);
                $("#TOTPREM1").val(premGst1);
                $("#TOTPREM2").val(premGst2);
            }
        }
    });

    // $(document).on("change", ".GET_PREM", function() {
    //     if ($("#PLAN").val() != '' && $("#PLAN").val() > 0) {
    //         var plno = ($("#PLAN").val() != '') ? $("#PLAN").val() : 0;
    //         var age = ($("#AGE").val() != '') ? $("#AGE").val() : 0;
    //         var mterm = ($("#MTERM").val() != '') ? $("#MTERM").val() : 0;
    //         var pterm = ($("#PTERM").val() != '') ? $("#PTERM").val() : 0;
    //         var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;
    //         if (sa != 0 && sa > 0) {
    //             $("#DAB_SA").val(sa);
    //             $("#TR_SA").val(sa);
    //             $("#CIR_SA").val(sa);
    //         }
    //         var dabsa = ($("#DAB_SA").val() != '') ? $("#DAB_SA").val() : 0;
    //         var trsa = ($("#TR_SA").val() != '') ? $("#TR_SA").val() : 0;
    //         var cirsa = ($("#CIR_SA").val() != '') ? $("#CIR_SA").val() : 0;
    //         var option = 'M';
    //         var waive = ($("#PWB").val() != '') ? $("#PWB").val() : 'No';;
    //         var PropAge = ($("#PROP_AGE").val() != '') ? $("#PROP_AGE").val() : 0;
    //         var curr_year = new Date().getFullYear();
    //         var method = "GetPremium";
    //         var tax_benifit = 0;
    //         var bonus = 0;
    //         var daboption = ($("#DAB_OPTION").val() != '') ? $("#DAB_OPTION").val() : 0;
    //         var DAB_CHECK = 0;
    //         if ($("#DAB_CHECK").prop('checked') == true) {
    //             var DAB_CHECK = 1;
    //         }
    //         var TR_CHECK = 0;
    //         if ($("#TR_CHECK").prop('checked') == true) {
    //             var TR_CHECK = 1;
    //         }
    //         var CIR_CHECK = 0;
    //         if ($("#CIR_CHECK").prop('checked') == true) {
    //             var CIR_CHECK = 1;
    //         }
    //         var PWB_CHECK = 0;
    //         if ($("#PWB_CHECK").prop('checked') == true) {
    //             var PWB_CHECK = 1;
    //         }
    //         var SETT_CHECK = 0;
    //         if ($("#SETT_CHECK").prop('checked') == true) {
    //             var SETT_CHECK = 1;
    //         }

    //         if ($("#is_auto_prem").prop('checked') == true) {
    //             $.ajax({
    //                 url: "{{ url('admin/getPremiumPrentation') }}",
    //                 method: 'Post',
    //                 data: {
    //                     "_token": "{{ csrf_token() }}",
    //                     "plno": plno,
    //                     "age": age,
    //                     "mterm": mterm,
    //                     "pterm": pterm,
    //                     "sa": sa,
    //                     "dabsa": dabsa,
    //                     "trsa": trsa,
    //                     "cirsa": cirsa,
    //                     "option": option,
    //                     "waive": waive,
    //                     "PropAge": PropAge,
    //                     "curr_year": curr_year,
    //                     "method": method,
    //                     "tax_benifit": tax_benifit,
    //                     "bonus": bonus,
    //                     "daboption": daboption,
    //                     "DAB_CHECK": DAB_CHECK,
    //                     "TR_CHECK": TR_CHECK,
    //                     "CIR_CHECK": CIR_CHECK,
    //                     "PWB_CHECK": PWB_CHECK,
    //                     "SETT_CHECK": SETT_CHECK
    //                 },
    //                 success: function(result) {
    //                     if (!$.isEmptyObject(result)) {
    //                         if (result.Premium != '') {

    //                             $.each(result.Premium, function(key, value) {
    //                                 var dabPrem = 0;
    //                                 var trPrem = 0;
    //                                 var cirPrem = 0;
    //                                 var pwbPrem = 0;
    //                                 if ($("#MODE").val() == 'Yearly') {
    //                                     var basicPrem = value.y.basic_prem;
    //                                     var totalPrem = value.y.total_prem;
    //                                     if (key == 0) {
    //                                         var gst1 = value.y.GST;
    //                                         $("#GST1").val(gst1.toFixed(2));
    //                                         var totPremWGST1 = value.y.prem_With_GST;
    //                                         $("#TOTPREM1").val(totPremWGST1.toFixed(2));
    //                                     }
    //                                     if (key == 1) {
    //                                         var gst2 = value.y.GST;
    //                                         $("#GST2").val(gst2.toFixed(2));
    //                                         var totPremWGST2 = value.y.prem_With_GST;
    //                                         $("#TOTPREM2").val(totPremWGST2.toFixed(2));
    //                                     }
    //                                     if (typeof(value.y.dab_prem) != "undefined" && value.y.dab_prem !== null) {
    //                                         var dabPrem = value.y.dab_prem;
    //                                     }
    //                                     if (typeof(value.y.tr_prem) != "undefined" && value.y.tr_prem !== null) {
    //                                         var trPrem = value.y.tr_prem;
    //                                     }
    //                                     if (typeof(value.y.cir_prem) != "undefined" && value.y.cir_prem !== null) {
    //                                         var cirPrem = value.y.cir_prem;
    //                                     }
    //                                     if (typeof(value.y.waive_prem) != "undefined" && value.y.waive_prem !== null) {
    //                                         var pwbPrem = value.y.waive_prem;
    //                                     }
    //                                 } else if ($("#MODE").val() == 'Half Yearly') {
    //                                     var basicPrem = value.h.basic_prem;
    //                                     var totalPrem = value.h.total_prem;
    //                                     if (key == 0) {
    //                                         var gst1 = value.h.GST;
    //                                         $("#GST1").val(gst1.toFixed(2));
    //                                         var totPremWGST1 = value.h.prem_With_GST;
    //                                         $("#TOTPREM1").val(totPremWGST1.toFixed(2));
    //                                     }
    //                                     if (key == 1) {
    //                                         var gst2 = value.h.GST;
    //                                         $("#GST2").val(gst2.toFixed(2));
    //                                         var totPremWGST2 = value.h.prem_With_GST;
    //                                         $("#TOTPREM2").val(totPremWGST2.toFixed(2));
    //                                     }
    //                                     if (typeof(value.h.dab_prem) != "undefined" && value.h.dab_prem !== null) {
    //                                         var dabPrem = value.h.dab_prem;
    //                                     }
    //                                     if (typeof(value.h.tr_prem) != "undefined" && value.h.tr_prem !== null) {
    //                                         var trPrem = value.h.tr_prem;
    //                                     }
    //                                     if (typeof(value.h.cir_prem) != "undefined" && value.h.cir_prem !== null) {
    //                                         var cirPrem = value.h.cir_prem;
    //                                     }
    //                                     if (typeof(value.h.waive_prem) != "undefined" && value.h.waive_prem !== null) {
    //                                         var pwbPrem = value.h.waive_prem;
    //                                     }
    //                                 } else if ($("#MODE").val() == 'Quarterly') {
    //                                     var basicPrem = value.q.basic_prem;
    //                                     var totalPrem = value.q.total_prem;
    //                                     if (key == 0) {
    //                                         var gst1 = value.q.GST;
    //                                         $("#GST1").val(gst1.toFixed(2));
    //                                         var totPremWGST1 = value.q.prem_With_GST;
    //                                         $("#TOTPREM1").val(totPremWGST1.toFixed(2));
    //                                     }
    //                                     if (key == 1) {
    //                                         var gst2 = value.q.GST;
    //                                         $("#GST2").val(gst2.toFixed(2));
    //                                         var totPremWGST2 = value.q.prem_With_GST;
    //                                         $("#TOTPREM2").val(totPremWGST2.toFixed(2));
    //                                     }
    //                                     if (typeof(value.q.dab_prem) != "undefined" && value.q.dab_prem !== null) {
    //                                         var dabPrem = value.q.dab_prem;
    //                                     }
    //                                     if (typeof(value.q.tr_prem) != "undefined" && value.q.tr_prem !== null) {
    //                                         var trPrem = value.q.tr_prem;
    //                                     }
    //                                     if (typeof(value.q.cir_prem) != "undefined" && value.q.cir_prem !== null) {
    //                                         var cirPrem = value.q.cir_prem;
    //                                     }
    //                                     if (typeof(value.q.waive_prem) != "undefined" && value.q.waive_prem !== null) {
    //                                         var pwbPrem = value.q.waive_prem;
    //                                     }
    //                                 } else if ($("#MODE").val() == 'Monthly') {
    //                                     var basicPrem = value.m.basic_prem;
    //                                     var totalPrem = value.m.total_prem;
    //                                     if (key == 0) {
    //                                         var gst1 = value.m.GST;
    //                                         $("#GST1").val(gst1.toFixed(2));
    //                                         var totPremWGST1 = value.m.prem_With_GST;
    //                                         $("#TOTPREM1").val(totPremWGST1.toFixed(2));
    //                                     }
    //                                     if (key == 1) {
    //                                         var gst2 = value.m.GST;
    //                                         $("#GST2").val(gst2.toFixed(2));
    //                                         var totPremWGST2 = value.m.prem_With_GST;
    //                                         $("#TOTPREM2").val(totPremWGST2.toFixed(2));
    //                                     }
    //                                     if (typeof(value.m.dab_prem) != "undefined" && value.m.dab_prem !== null) {
    //                                         var dabPrem = value.m.dab_prem;
    //                                     }
    //                                     if (typeof(value.m.tr_prem) != "undefined" && value.m.tr_prem !== null) {
    //                                         var trPrem = value.m.tr_prem;
    //                                     }
    //                                     if (typeof(value.m.cir_prem) != "undefined" && value.m.cir_prem !== null) {
    //                                         var cirPrem = value.m.cir_prem;
    //                                     }
    //                                     if (typeof(value.m.waive_prem) != "undefined" && value.m.waive_prem !== null) {
    //                                         var pwbPrem = value.m.waive_prem;
    //                                     }
    //                                 } else if ($("#MODE").val() == 'SSS') {
    //                                     var basicPrem = value.s.basic_prem;
    //                                     var totalPrem = value.s.total_prem;
    //                                     if (key == 0) {
    //                                         var gst1 = value.s.GST;
    //                                         $("#GST1").val(gst1.toFixed(2));
    //                                         var totPremWGST1 = value.s.prem_With_GST;
    //                                         $("#TOTPREM1").val(totPremWGST1.toFixed(2));
    //                                     }
    //                                     if (key == 1) {
    //                                         var gst2 = value.s.GST;
    //                                         $("#GST2").val(gst2.toFixed(2));
    //                                         var totPremWGST2 = value.s.prem_With_GST;
    //                                         $("#TOTPREM2").val(totPremWGST2.toFixed(2));
    //                                     }
    //                                     if (typeof(value.s.dab_prem) != "undefined" && value.s.dab_prem !== null) {
    //                                         var dabPrem = value.s.dab_prem;
    //                                     }
    //                                     if (typeof(value.s.tr_prem) != "undefined" && value.s.tr_prem !== null) {
    //                                         var trPrem = value.s.tr_prem;
    //                                     }
    //                                     if (typeof(value.s.cir_prem) != "undefined" && value.s.cir_prem !== null) {
    //                                         var cirPrem = value.s.cir_prem;
    //                                     }
    //                                     if (typeof(value.s.waive_prem) != "undefined" && value.s.waive_prem !== null) {
    //                                         var pwbPrem = value.s.waive_prem;
    //                                     }
    //                                 } else if ($("#MODE").val() == 'Single') {
    //                                     var basicPrem = value.g.basic_prem;
    //                                     var totalPrem = value.g.total_prem;
    //                                     if (key == 0) {
    //                                         var gst1 = value.g.GST;
    //                                         $("#GST1").val(gst1.toFixed(2));
    //                                         var totPremWGST1 = value.g.prem_With_GST;
    //                                         $("#TOTPREM1").val(totPremWGST1.toFixed(2));
    //                                     }
    //                                     if (key == 1) {
    //                                         var gst2 = value.g.GST;
    //                                         $("#GST2").val(gst2.toFixed(2));
    //                                         var totPremWGST2 = value.g.prem_With_GST;
    //                                         $("#TOTPREM2").val(totPremWGST2.toFixed(2));
    //                                     }
    //                                     if (typeof(value.g.dab_prem) != "undefined" && value.g.dab_prem !== null) {
    //                                         var dabPrem = value.g.dab_prem;
    //                                     }
    //                                     if (typeof(value.g.tr_prem) != "undefined" && value.g.tr_prem !== null) {
    //                                         var trPrem = value.g.tr_prem;
    //                                     }
    //                                     if (typeof(value.g.cir_prem) != "undefined" && value.g.cir_prem !== null) {
    //                                         var cirPrem = value.g.cir_prem;
    //                                     }
    //                                     if (typeof(value.g.waive_prem) != "undefined" && value.g.waive_prem !== null) {
    //                                         var pwbPrem = value.g.waive_prem;
    //                                     }
    //                                 }

    //                                 if (key == 1) {
    //                                     $("#BASIC_PREM").val(basicPrem.toFixed(2));
    //                                     $("#DAB_PREM").val(dabPrem.toFixed(2));
    //                                     $("#CIR_PREM").val(cirPrem.toFixed(2));
    //                                     $("#TR_PREM").val(trPrem.toFixed(2));
    //                                     $("#PWB_PREM").val(pwbPrem.toFixed(2));
    //                                     $("#PREM").val(totalPrem.toFixed(2));
    //                                     return false;
    //                                 }
    //                             });
    //                         }
    //                     }
    //                 }
    //             });
    //         } else {
    //             var basicPrem = ($("#BASIC_PREM").val() != '') ? $("#BASIC_PREM").val() : 0;
    //             var davPrem = ($("#DAB_PREM").val() != '') ? $("#DAB_PREM").val() : 0;
    //             var trPrem = ($("#TR_PREM").val() != '') ? $("#TR_PREM").val() : 0;
    //             var cirPrem = ($("#CIR_PREM").val() != '') ? $("#CIR_PREM").val() : 0;
    //             var pwbPrem = ($("#PWB_PREM").val() != '') ? $("#PWB_PREM").val() : 0;
    //             var totalPrem = parseFloat(basicPrem) + parseFloat(davPrem) + parseFloat(trPrem) + parseFloat(cirPrem) + parseFloat(pwbPrem);
    //             $("#PREM").val(totalPrem);
    //             var gst1 = (parseFloat(totalPrem) * 4.5 / 100);
    //             var gst2 = (parseFloat(totalPrem) * 2.25 / 100);
    //             $("#GST1").val(gst1);
    //             $("#GST2").val(gst2);
    //             var premGst1 = parseFloat(totalPrem) + parseFloat(gst1);
    //             var premGst2 = parseFloat(totalPrem) + parseFloat(gst2);
    //             $("#TOTPREM1").val(premGst1);
    //             $("#TOTPREM2").val(premGst2);
    //         }
    //     }
    // });

    $(document).on("click", "#DAB_CHECK", function() {
        var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;
        if ($("#DAB_CHECK").prop('checked') == true) {
            $("#DAB_SA").val(sa);
            $("#DAB_SA").removeAttr("readonly");
            $("#DAB_OPTION").removeAttr("readonly");
        } else {
            $("#DAB_SA").val(0);
            $("#DAB_SA").attr("readonly", "readonly");
            $("#DAB_OPTION").attr("readonly", "readonly");
        }
    });

    $(document).on("click", "#CIR_CHECK", function() {
        var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;
        if ($("#CIR_CHECK").prop('checked') == true) {
            $("#CIR_SA").val(sa);
            $("#CIR_SA").removeAttr("readonly");
        } else {
            $("#CIR_SA").val(0);
            $("#CIR_SA").attr("readonly", "readonly");
        }
    });

    $(document).on("click", "#TR_CHECK", function() {

        var sa = ($("#BASIC_SA").val() != '') ? $("#BASIC_SA").val() : 0;
        if ($("#TR_CHECK").prop('checked') == true) {
            $("#TR_SA").removeAttr("readonly");
            $("#TR_SA").val(sa);
        } else {
            $("#TR_SA").val(0);
            $("#TR_SA").attr("readonly", "readonly");
        }
    });

    $(document).on("click", "#PWB_CHECK", function() {
        if ($("#PWB_CHECK").prop('checked') == true) {
            $("#PWB").removeAttr("readonly");
        } else {
            $("#PWB").attr("readonly", "readonly");
        }
    });

    $(document).on("click", "#SETT_CHECK", function() {
        if ($("#SETT_CHECK").prop('checked') == true) {
            $("#SETT").removeAttr("readonly");
        } else {
            $("#SETT").attr("readonly", "readonly");
        }
    });

    $(document).on("click", ".save-policy", function() {

        var PROPNO = $("#QUOTNO").val();
        var PROPDT = $("#QUOTDT").val();
        var PONO = $("#QUOTREF").val();

        if (PROPNO != 0 && PROPDT == '') {
            alert("Please enter quotation date.");
            return false;
        } else if (PROPNO == '' && PROPDT != '') {
            alert("Please enter quotation number.");
            return false;
        }
        if ((PROPNO == '' || PROPNO == 0) && PROPDT == '' && PONO == '') {
            alert("Please enter quotation ref.");
            return false;
        }

        var form = $(this).closest(".store-policy-info");

        var formPostData = new FormData(this.form);
        var policyList = $('#policy-section').jsGrid('option', 'data');

        if (policyList.length > 0) {
            $.each(policyList, function(k, v) {
                $.each(v, function(r, d) {
                    console.log(k, r, d);
                    formPostData.append("RIDERS[" + k + "][" + r + "]", d);
                });
            });
        }

        //return false;

        if (typeof $(this).data('url') != 'undefined') {
            $nextUrl = $(this).data('url');
        } else {
            $nextUrl = '';
        }

        $.ajax({
            url: form.attr("action"),
            method: 'POST',
            data: formPostData,
            processData: false,
            contentType: false,
            success: function(result) {
                window.location.href = $nextUrl;
            }
        });
    });

    // register jQuery extension
    jQuery.extend(jQuery.expr[':'], {
        focusable: function(el, index, selector) {
            return $(el).is('a, button, :input, [tabindex]');
        }
    });

    $(document).on('keypress', 'input,select', function(e) {
        if (e.which == 13) {
            e.preventDefault();
            // Get all focusable elements on the page
            var $canfocus = $(':focusable');
            var index = $canfocus.index(document.activeElement) + 1;
            if (index >= $canfocus.length) index = 0;
            $canfocus.eq(index).focus();
        }
    });
</script>