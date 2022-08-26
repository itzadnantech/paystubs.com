
var current_month, old_current_month, auto_calculations, pay_days, fTaxArr, fTax, is_contractor, is_salary, fedaRalTax;

var NewMedicareTax = tax_api.tax_rates[0].rate;
var NewSocialSecurityTax = tax_api.tax_rates[1].rate;
var currentActiveUSATemplate_;

var currency_seperator = "";


jQuery(document).ready(function () {

  
//    $(document).bind("contextmenu",function(e){
//        return false;
//    });
//    $(document).keydown(function (event) {
//        if (event.keyCode == 123) { // Prevent F12
//            return false;
//        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
//            return false;
//        } else if (event.ctrlKey && (event.keyCode === 67 || event.keyCode === 86 || event.keyCode === 85 || event.keyCode === 117)) {
//            return false;
//        }
//    });

    if ($(window).width() > 767) {
        if ($('.page_card').length) {
            $('.page_card').matchHeight({byRow: true, property: 'min-height'});

        }
    }
    $(window).on("resize", function () {
        if ($(window).width() > 767) {
            if ($('.page_card').length) {
                $('.page_card').matchHeight({byRow: true, property: 'min-height'});
            }
        }
    });
    auto_calculations = $('.choose-auto-calculation').val();
    pay_days = $('.choose-pay-mode').val();
    is_contractor = is_salary = false;
    var usaTemplateListArray = ["usa_template_2", "usa_template_3", "usa_template_4",  "usa_template_5",  "usa_template_6"];
    var currentActiveUSATemplate = $(".us__template__selection").val();
    currentActiveUSATemplate_ = currentActiveUSATemplate;
    showStubPeriods($('.choose-stub-periods').val(), currentActiveUSATemplate);

    
    $('.newinputdatepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    }).on('changeDate', function () {
        var date = new Date($(this).val());

    });
    $('.inputdatepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    }).on('changeDate', function () {
        var date = new Date($(this).val());
        old_current_month = date.getMonth() + 1;
        current_month = date.getMonth() + 1;

        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        
       // console.log("degub:checkIfnewTemplateisActive:"+checkIfnewTemplateisActive);
        //console.log("degub:currentActiveUSATemplate:"+currentActiveUSATemplate);
        
        if (checkIfnewTemplateisActive >= 0) {
            
            if(currentActiveUSATemplate == "usa_template_3"){
                
                if ( convertNumber($('.bq_salary_total', $('#' + currentActiveUSATemplate)).val())) {
                
                    fTaxArr = getNewFederalTaxRate(
                     
                                            $('.choose-pay-mode').val(), 
                                            $('.choose-marital-status').val(), 
                                            $('.choose-exemptions').val(), 
                                            (
                                                parseFloat(
                                                    convertNumber($('.bq_salary_total',$('#' + currentActiveUSATemplate)).val())
                                                )
                                            ).toFixed(2)
                                            
                                        );
                                        
               
                    calculateTaxinustemplate(currentActiveUSATemplate);
                }
                
            }else{
                
                if ( convertNumber($('.usa__regular__earnings_total', $('#' + currentActiveUSATemplate)).val())) {
                
                 fTaxArr = getNewFederalTaxRate(
                                            $('.choose-pay-mode').val(), 
                                            $('.choose-marital-status').val(), 
                                            $('.choose-exemptions').val(), 
                                            (
                                                parseFloat(
                                                    convertNumber($('.usa__regular__earnings_total',$('#' + currentActiveUSATemplate)).val())
                                                )
                                            ).toFixed(2)
                                        );
                                        
               
                    calculateTaxinustemplate(currentActiveUSATemplate);
                }
            
            }
            
            
            
        } else {
            var $totalAmounttocount = 0;
            if ($('.total_gross_wages').val()) {
                if (convertNumber($('.total_gross_wages').val()) > 0) {
                    $totalAmounttocount = parseFloat(parseFloat($totalAmounttocount) + parseFloat(convertNumber($('.total_gross_wages').val())));
                }
            }
            if ($('.overtime_total').val()) {
                if (convertNumber($('.overtime_total').val()) > 0) {
                    $totalAmounttocount = parseFloat(parseFloat($totalAmounttocount) + parseFloat(convertNumber($('.overtime_total').val())));
                }
            }
             if ($('.vacation_total').val()) {
                if (convertNumber($('.vacation_total').val()) > 0) {
                    $totalAmounttocount = parseFloat(parseFloat($totalAmounttocount) + parseFloat(convertNumber($('.vacation_total').val())));
                }
            }
            if ($('.bonus_total').val()) {
                if (convertNumber($('.bonus_total').val()) > 0) {
                    $totalAmounttocount = parseFloat(parseFloat($totalAmounttocount) + parseFloat(convertNumber($('.bonus_total').val())));
                }
            }
                console.log(parseFloat($totalAmounttocount).toFixed(2))
            fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));
            usTaxCalculate();

        }
        calculatePayPeriodDate(date, currentActiveUSATemplate);
    });

    $('.canadainputdatepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy/mm/dd',
    }).on('changeDate', function () {
        var date = new Date($(this).val());
        var $candaform = $(this).parents('form').attr('id');
        // calculatePayPeriodDate(date,$candaform);
    });

    $('.uk_process_datepicker').datepicker({
        autoclose: true,
        format: 'dd-MM-yyyy',
        todayHighlight: true,
    });

    $('.tax_period_datepicker').datepicker({
        autoclose: true,
        format: 'M-yyyy',
        viewMode: "months",
        minViewMode: "months"
    });

    $('.uk__emloyee__pay__date').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
    });
    
    $('.uk__emloyee__pay_period_bank').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
    });
    
     $('.uk__emloyee__pay_period_month').daterangepicker({
        autoUpdateInput: false,
         opens: 'left'
    }, function (start, end, label) {
//        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    
    });
    $('.uk__emloyee__pay_period_month').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });

    $(".paystub__date").datepicker({
        autoclose: true,
        format: 'MM  d, yyyy',
        todayHighlight: true,
        setDate: new Date()
    });

    $('.inputdatepicker, .canadainputdatepicker, .uk_process_datepicker, .tax_period_datepicker,.uk__emloyee__pay__date').datepicker('setDate', new Date());

    $('.inputdaterangepicker').daterangepicker({
        opens: 'left'
    }, function (start, end, label) {
//        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });

    $('.canadainputdaterangepicker').daterangepicker({
        opens: 'left',
        locale: {
            format: 'YYYY/MM/DD'
        }
    });
    $(".uk__template__selection").change(function () {
        var currentTemplate = $(this).val();
        $(".uk__template").each(function (index, element) {
            if ($(element).attr('id') == currentTemplate) {
                $(element).show();
            } else {
                $(element).hide();
            }
        });
    });

    // UK New template calculation start
    $('.uk__emloyee__salary__hours,.uk__emloyee__salary__rate').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var salary__rate = convertNumber($('.uk__emloyee__salary__rate', $scopeofCurrentForm).val());
        var salary__hours = convertNumber($('.uk__emloyee__salary__hours', $scopeofCurrentForm).val());
        var current__salary__total = $('.uk__emloyee__salary__total', $scopeofCurrentForm);
        if (!isNaN(parseFloat(salary__rate)) && !isNaN(parseFloat(salary__hours))) {
            $(current__salary__total).val(default_currency + ' ' + addCommas(parseFloat(convertNumber((parseFloat(salary__rate) * parseFloat(salary__hours)).toFixed(2)))));
        } else {
            $(current__salary__total).val(default_currency + ' ' + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
    });

    $('.uk__emloyee__bonus__hours,.uk__emloyee__bonus__rate').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var bonus__rate = convertNumber($('.uk__emloyee__bonus__rate', $scopeofCurrentForm).val());
        var bonus__hours = convertNumber($('.uk__emloyee__bonus__hours', $scopeofCurrentForm).val());
        var current__bonus__total = $('.uk__emloyee__bonus__total', $scopeofCurrentForm);
        if (!isNaN(parseFloat(bonus__rate)) && !isNaN(parseFloat(bonus__hours))) {
            $(current__bonus__total).val(default_currency + ' ' + addCommas(parseFloat(convertNumber((parseFloat(bonus__rate) * parseFloat(bonus__hours)).toFixed(2)))));
        } else {
            $(current__bonus__total).val(default_currency + ' ' + parseInt(0) * parseInt(0));
        }
    });

    $('.uk__emloyee__commision__hours,.uk__emloyee__commision__rate').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var commision__rate = convertNumber($('.uk__emloyee__commision__rate', $scopeofCurrentForm).val());
        var commision__hours = convertNumber($('.uk__emloyee__commision__hours', $scopeofCurrentForm).val());
        var current__commision__total = $('.uk__emloyee__commision__total', $scopeofCurrentForm);
        if (!isNaN(parseFloat(commision__rate)) && !isNaN(parseFloat(commision__hours))) {
            $(current__commision__total).val(default_currency + ' ' + addCommas(parseFloat(convertNumber((parseFloat(commision__rate) * parseFloat(commision__hours)).toFixed(2)))));
        } else {
            $(current__commision__total).val(default_currency + ' ' + parseInt(0) * parseInt(0));
        }
    });

    $('.uk__emloyee__expense__hours,.uk__emloyee__expense__rate').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var expense__rate = convertNumber($('.uk__emloyee__expense__rate', $scopeofCurrentForm).val());
        var expense__hours = convertNumber($('.uk__emloyee__expense__hours', $scopeofCurrentForm).val());
        var current__expense__total = $('.uk__emloyee__expense__total', $scopeofCurrentForm);
        if (!isNaN(parseFloat(expense__rate)) && !isNaN(parseFloat(expense__hours))) {
            $(current__expense__total).val(default_currency + ' ' + addCommas(parseFloat(convertNumber((parseFloat(expense__rate) * parseFloat(expense__hours)).toFixed(2)))));
        } else {
            $(current__expense__total).val(default_currency + ' ' + parseInt(0) * parseInt(0));
        }
    });

    const capitalize = (s) => {
        if (typeof s !== 'string') return ''
            return s.charAt(0).toUpperCase() + s.slice(1)
    }

    // USA new template Section tax calculation start
    // Get current selected USA Template
    // $(".us__template__selection").val();
    
    // $('#dark_blue_cmp_name').on('keyup',function(event){
            
    //         v = this.value;
    //         $('#dark_blue_comp_name').val(v);
            
    // });
    
    // $('#dark_blue_cmp_add1').on('keyup',function(event){
            
    //         v1 = this.value;
    //        // v2 = $('#dark_blue_cmp_add2').val();
    //        // v3 = v1+', '+v2;
    //         $('#dark_blue_comp_add1').val(v1);
    // });
    
    // $('#dark_blue_e_name').on('keyup',function(event){
        
    //         v = this.value;
    //         $('#dark_blue_emp_name').val(v);
            
    // });
    
    // $('#dark_blue_e_add1').on('keyup',function(event){
            
    //         v1 = this.value;
            
    //         $('#dark_blue_emp_add1').val(v1);
    // });
    
    // $('#dark_blue_e_add2').on('keyup',function(event){
            
    //         v1 = this.value;
            
    //         $('#dark_blue_emp_add2').val(v1);
    // });
    
    // $('#dark_blue_cmp_add2').on('keyup',function(event){
            
    //         v2 = this.value;
    //        // v1 = $('#dark_blue_cmp_add1').val();
    //       //  v3 = v1+', '+v2;
    //         $('#dark_blue_comp_add2').val(v2);
            
       
            
    // });
    
    //  $('.ct_empname').on('keyup',function(event){
            
    //         v2 = this.value;
    //        // v1 = $('#dark_blue_cmp_add1').val();
    //       //  v3 = v1+', '+v2;
    //         $('.ct_deposited_name').val(v2);
            
       
            
    // });
    
    
    
    
    
    
    //if(currentActiveUSATemplate)
    // Basic QD
    var Salary_cal_data = 0.00;
    var Overtime_cal_data = 0.00;
    var Holiday_cal_data = 0.00;
    var Vacation_cal_data = 0.00;
    var Bonus_cal_data = 0.00;
    var Float_cal_data = 0.00;
    
    var Salary_YTD = 0.00;
    var Overtime_YTD = 0.00;
    var Holiday_YTD = 0.00;
    var Vacation_YTD = 0.00;
    var Bonus_YTD = 0.00;
    var Float_YTD = 0.00;
    
    $('.usa_stub').on('click',function(event){
            
            $('input[name="currency"]').val('$'); 
    });
    $('.choose-marital-status').on('change',function(event){
        
        if('usa_template_4' == currentActiveUSATemplate ){
            
            $('input[name="bq_maritalStatus"]').val(capitalize($('.choose-marital-status').val())); 
            
        }else if( 'usa_template_5' == currentActiveUSATemplate ){
            
            $('input[name="ct_maritalStatus"]').val(capitalize($('.choose-marital-status').val()));  
        }else if( 'usa_template_6' == currentActiveUSATemplate ){
            
            $('input[name="es_maritalStatus"]').val(capitalize($('.choose-marital-status').val()));  
        }
     
    });
    
    $('.choose-exemptions').on('change',function(event){
        
        if( 'usa_template_4' == currentActiveUSATemplate ){
            
            $('input[name="bq_exemptions"]').val($('.choose-exemptions').val());     
        }else if( 'usa_template_5' == currentActiveUSATemplate ){
            
            $('input[name="ct_exemptions"]').val($('.choose-exemptions').val());    
        }else if( 'usa_template_6' == currentActiveUSATemplate ){
            
            $('input[name="es_exemptions"]').val($('.choose-exemptions').val());    
        }
     
    });
    
    $('.choose-state').on('change',function(event){        
         if( 'usa_template_6' == currentActiveUSATemplate ){
            
            $('input[name="es_state"]').val($('.choose-state option:selected').text());    
        }
        if($('.choose-state option:selected').text() == 'California'){
            
        }
             
    });
    
     $('.ct_comp_name').on('keyup',function(event){
        
         if( 'usa_template_6' == currentActiveUSATemplate ){
            
            $('input[name="ct_comp_name"]').val($('.ct_comp_name').val());    
        }
     
    });
    
     $('.ct_comp_name').on('keyup',function(event){
        
         if( 'usa_template_5' == currentActiveUSATemplate ){
            
            $('input[name="ct_chk_comp_name"]').val($('.ct_comp_name').val());    
        }
     
    });

    /** teknomines  US*/
    
    $( ".ct_comp_addr1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("input[name=ct_comp_addr2]").val(address[1])
            $("input[name=ct_comp_addr1]").val(address[0])  
            return false;
        }
    });

    $( "input[name=ct_comp_addr2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("input[name=ct_comp_addr2]").val(address[1])
            $("input[name=ct_comp_addr1]").val(address[0])  
            return false;
        }
    });

    $( "#ct_chk_comp_addr1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#ct_chk_comp_addr2").val(address[1])
            $("#ct_chk_comp_addr1").val(address[0])  
            return false;
        }
    });

    $( "#ct_chk_comp_addr2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#ct_chk_comp_addr2").val(address[1])
            $("#ct_chk_comp_addr1").val(address[0])  
            return false;
        }
    });

    $( "#us_def_cmp_add1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#us_def_cmp_add2").val(address[1])
            $("#us_def_cmp_add1").val(address[0])  
            return false;
        }
    });

    $( "#us_def_cmp_add2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#us_def_cmp_add2").val(address[1])
            $("#us_def_cmp_add1").val(address[0])  
            return false;
        }
    });

    $( "#us_def_e_add1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#us_def_e_add2").val(address[1])
            $("#us_def_e_add1").val(address[0])  
            return false;
        }
    });

    $( "#us_def_e_add2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#us_def_e_add2").val(address[1])
            $("#us_def_e_add1").val(address[0])  
            return false;
        }
    });
  
    $( "#tan_blue_cmp_address_line1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
        $('#tan_blue_cmp_address_line1').val(ui.item.label); // display the selected text
            return false;
        },
        focus: function(event, ui){
            $( "#tan_blue_cmp_address_line1" ).val( ui.item.label );
            return false;
        },
    });
  
    $( "#dark_blue_cmp_add1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_cmp_add2").val(address[1])
            $("#dark_blue_cmp_add1").val(address[0])  
            return false;
        }
    });

    $( "#dark_blue_cmp_add2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_cmp_add2").val(address[1])
            $("#dark_blue_cmp_add1").val(address[0])  
            return false;
        }
    });

    $( "#dark_blue_e_add1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_e_add2").val(address[1])
            $("#dark_blue_e_add1").val(address[0])  
            return false;
        }
    });

    $( "#dark_blue_e_add2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_e_add2").val(address[1])
            $("#dark_blue_e_add1").val(address[0])  
            return false;
        }
    });

    $( "#dark_blue_emp_add1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_emp_add2").val(address[1])
            $("#dark_blue_emp_add1").val(address[0])  
            return false;
        }
    });

    $( "#dark_blue_emp_add2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_emp_add2").val(address[1])
            $("#dark_blue_emp_add1").val(address[0])  
            return false;
        }
    });

    $( "#dark_blue_comp_add1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_comp_add2").val(address[1])
            $("#dark_blue_comp_add1").val(address[0])  
            return false;
        }
    });

    $( "#dark_blue_comp_add2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#dark_blue_comp_add2").val(address[1])
            $("#dark_blue_comp_add1").val(address[0])  
            return false;
        }
    });

    $( "#bq_autocomplete1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#bq_autocomplete2").val(address[1])
            $("#bq_autocomplete1").val(address[0])  
            return false;
        }
    });

    $( "#bq_autocomplete2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#bq_autocomplete2").val(address[1])
            $("#bq_autocomplete1").val(address[0])  
            return false;
        }
    });

    $( "#bq_emp_autocomplete" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#bq_emp_autocomplete2").val(address[1])
            $("#bq_emp_autocomplete").val(address[0])  
            return false;
        }
    });

    $( "#bq_emp_autocomplete2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#bq_emp_autocomplete2").val(address[1])
            $("#bq_emp_autocomplete").val(address[0])  
            return false;
        }
    });

    $( "#es_companyaddr1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#es_companyaddr2").val(address[1])
            $("#es_companyaddr1").val(address[0])  
            return false;
        }
    });


    $( "#es_companyaddr2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#es_companyaddr2").val(address[1])
            $("#es_companyaddr1").val(address[0])  
            return false;
        }
    });

    $( "#es_empAddr1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#es_empAddr2").val(address[1])
            $("#es_empAddr1").val(address[0])  
            return false;
        }
    });
    
    $( "#es_empAddr2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#es_empAddr2").val(address[1])
            $("#es_empAddr1").val(address[0])  
            return false;
        }
    });

    $( "#ct_emp_add1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#ct_emp_add2").val(address[1])
            $("#ct_emp_add1").val(address[0])  
            return false;
        }
    });

    $( "#ct_emp_add2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $("#ct_emp_add2").val(address[1])
            $("#ct_emp_add1").val(address[0])  
            return false;
        }
    });

    
 

    /** teknomines  US*/

    /** teknomines  GLOBAL and CANADA*/

    function split( val ) {
        return val.split( /,\s*/ );
     }
    function extractLast( term ) {
       return split( term ).pop();
    }

    $( ".company__address" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
        $('.company__address').val(ui.item.label); // display the selected text
            return false;
        },
        focus: function(event, ui){
            $( ".company__address" ).val( ui.item.label );
            return false;
        },
    });
    
    $( ".employee__address" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            $('.employee__address').val(ui.item.label); // display the selected text
            return false;
        },
        focus: function(event, ui){
            $( ".employee__address" ).val( ui.item.label );
            return false;
        },
    });
    
     /** teknomines  GLOBAL and CANADA*/
    
     /** teknomines  UK*/
     $( ".employee__address1" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $('.employee__address2').val(address[1])
            $('.employee__address1').val(address[0])  
            return false;
        }       
    });

    $( ".employee__address2" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            var str = ui.item.label                                
            var address = str.split(/,(.+)/);
            console.log(address)
            $('.employee__address2').val(address[1])
            $('.employee__address1').val(address[0])  
            return false;
        }       
    });


    $( ".uk__emloyee__officeaddress" ).autocomplete({        
        source: function( request, response ) {   
        $.ajax({
            url: base_url + 'paystub/getgeocode',
            method: 'POST',
            data: {'search': request.term},        
            success: function( result ) {
                var data = JSON.parse(result);
                response( data.html );
            }
        });
        },
        select: function (event, ui) {
            $('.uk__emloyee__officeaddress').val(ui.item.label); // display the selected text
            return false;
        },
        focus: function(event, ui){
            $('.uk__emloyee__officeaddress').val(ui.item.label); // display the selected text
            return false;
        },
    });
   

    

    

    /** teknomines  UK*/

    //  $('.ct_comp_addr2').on('keyup',function(event){
        
    //      if( 'usa_template_5' == currentActiveUSATemplate ){
            
    //         $('input[name="ct_chk_comp_addr2"]').val($('.ct_comp_addr2').val());    
    //     }
     
    // });
    
    //  $('.ct_comp_addr3').on('keyup',function(event){
        
    //      if( 'usa_template_5' == currentActiveUSATemplate ){
            
    //         $('input[name="ct_chk_comp_zip"]').val($('.ct_comp_addr3').val());    
    //     }
     
    // });
    
    
    
    $('.bq_salary_rate, .bq_overtime_rate, .bq_holiday_rate, .bq_vacation_rate, .bq_bonus_rate, .bq_float_rate').on("blur", function () {
        var rate = convertNumber($(this).val());
        
        
        if (rate == '' || rate == null || rate == '0.00') {
            $(this).val(default_currency + currency_seperator + '0.00');
        }else{
            $(this).val(default_currency + currency_seperator + addCommas(parseFloat(rate).toFixed(2)));
           
        }
    });
        
    $('.bq_salary_rate,.bq_salary_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.bq_current_total_amount', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.bq_salary_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.bq_salary_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.bq_salary_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            Salary_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
            //console.log( "Salary_cal_data:" + Salary_cal_data );
            
            //console.log(caculateData);
            
           // $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(caculateData))));
           
           caculateData = addCommas((Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(convertNumber(caculateData)));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        

        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
               /* var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
    
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                Salary_YTD =  (parseFloat(Salary_cal_data) * parseFloat(current_month));
                $('.bq_salary_ydt', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas(convertNumber((convertNumber(Salary_cal_data.toString()) * current_month.toString()).toFixed(2))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD).toFixed(2));
                $('.bq_ytd').val(default_currency + currency_seperator + addCommas(convertNumber(caculateYTDData)));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2);
                
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.bq_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.bq_ytd_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.bq_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.bq_ytd_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.bq_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.bq_ytd_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.bq_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.bq_ytd_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.bq_current_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.bq_ytd_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(parseFloat(TotalEarnings)-parseFloat(current_deduction_amt)).toFixed(2);
                $('.bq_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (parseFloat(Salary_YTD)+parseFloat(Overtime_YTD)+parseFloat(Holiday_YTD)+parseFloat(Vacation_YTD)+parseFloat(Bonus_YTD)+parseFloat(Float_YTD)) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.bq_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        //update_dataUSA_defaultAndBlue();
    });
    $('.bq_overtime_rate,.bq_overtime_hour').on('keyup', function (event) {
    
 
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.bq_current_total_amount', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.bq_overtime_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.bq_overtime_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.bq_overtime_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            Overtime_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
            //console.log( "Overtime_cal_data:" + Overtime_cal_data );
            
           // console.log(caculateData);
            
           // $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(caculateData))));
           
           caculateData = addCommas((Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
            //calculateTaxinNEWustemplate(currentActiveUSATemplate,Overtime_cal_data,caculateData,"bq_overtime_ydt");
            if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                Overtime_YTD =  (parseFloat(Overtime_cal_data) * parseFloat(current_month));
                $('.bq_overtime_ydt', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(Overtime_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD).toFixed(2));
                $('.bq_ytd').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.bq_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.bq_ytd_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.bq_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.bq_ytd_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.bq_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.bq_ytd_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.bq_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.bq_ytd_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                
                $('.bq_current_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.bq_ytd_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.bq_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.bq_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
               
           }

        }
        
       // update_dataUSA_defaultAndBlue();
    });
    $('.bq_holiday_rate,.bq_holiday_hour').on('keyup', function (event) {
    
 
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.bq_current_total_amount', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.bq_holiday_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.bq_holiday_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.bq_holiday_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            Holiday_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));

           // $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(caculateData))));
           
           caculateData = addCommas((Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
      
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
            //calculateTaxinNEWustemplate(currentActiveUSATemplate,Holiday_cal_data,caculateData,"bq_holiday_ydt");
            if (auto_calculations == 'on') {
        
       
               /* var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);
                */
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                Holiday_YTD =  (parseFloat(Holiday_cal_data) * parseFloat(current_month));
                $('.bq_holiday_ydt', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(Holiday_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD).toFixed(2));
                $('.bq_ytd').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.bq_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.bq_ytd_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.bq_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.bq_ytd_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.bq_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.bq_ytd_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.bq_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.bq_ytd_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
      
                $('.bq_current_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.bq_ytd_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.bq_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.bq_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
                
               
           }

        }
        
        //update_dataUSA_defaultAndBlue();
    });
    $('.bq_vacation_rate,.bq_vacation_hour').on('keyup', function (event) {
    
 
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.bq_current_total_amount', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.bq_vacation_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.bq_vacation_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.bq_vacation_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            Vacation_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           // $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(caculateData))));
           
           caculateData = addCommas((Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency +currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
      
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
             //calculateTaxinNEWustemplate(currentActiveUSATemplate,Vacation_cal_data,caculateData,"bq_vacation_ydt");
             if (auto_calculations == 'on') {
        
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                Vacation_YTD =  (parseFloat(Vacation_cal_data) * parseFloat(current_month));
                $('.bq_vacation_ydt', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(Vacation_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD).toFixed(2));
                $('.bq_ytd').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.bq_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.bq_ytd_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.bq_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.bq_ytd_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.bq_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.bq_ytd_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.bq_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.bq_ytd_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.bq_current_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency +currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.bq_ytd_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.bq_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.bq_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
                
               
           }

        }
        
        //update_dataUSA_defaultAndBlue();
    });
    $('.bq_bonus_rate,.bq_bonus_hour').on('keyup', function (event) {
    
 
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.bq_current_total_amount', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.bq_bonus_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.bq_bonus_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.bq_bonus_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            Bonus_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           // $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(caculateData))));
           
           caculateData = addCommas((Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
      
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
      
            //calculateTaxinNEWustemplate(currentActiveUSATemplate,Bonus_cal_data,caculateData,"bq_bonus_ydt");
            if (auto_calculations == 'on') {
        
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                 /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                Bonus_YTD =  (parseFloat(Bonus_cal_data) * parseFloat(current_month));
                $('.bq_bonus_ydt', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(Bonus_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD).toFixed(2));
                $('.bq_ytd').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.bq_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.bq_ytd_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.bq_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.bq_ytd_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.bq_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.bq_ytd_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.bq_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.bq_ytd_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.bq_current_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.bq_ytd_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.bq_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.bq_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
                
               
           }

        }
        
       // update_dataUSA_defaultAndBlue();
    });
    $('.bq_float_rate,.bq_float_hour').on('keyup', function (event) {
    
 
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.bq_current_total_amount', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.bq_float_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.bq_float_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.bq_float_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency +currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            Float_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           // $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(caculateData))));
           
           caculateData = addCommas((Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator+ addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        

        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
            //calculateTaxinNEWustemplate(currentActiveUSATemplate,Float_cal_data,caculateData,"bq_float_ydt");
            if (auto_calculations == 'on') {
        
               /* var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                 /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                Float_YTD =  (parseFloat(Float_cal_data) * parseFloat(current_month));
                $('.bq_float_ydt', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(Float_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD).toFixed(2));
                $('.bq_ytd').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
            
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (Salary_cal_data+Overtime_cal_data+Holiday_cal_data+Vacation_cal_data+Bonus_cal_data+Float_cal_data).toFixed(2);
                
                 fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                );
                
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.bq_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.bq_ytd_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.bq_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.bq_ytd_soc_sec_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.bq_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.bq_ytd_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.bq_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.bq_ytd_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.bq_current_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.bq_ytd_deduction_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.bq_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (Salary_YTD+Overtime_YTD+Holiday_YTD+Vacation_YTD+Bonus_YTD+Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.bq_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
                
               
           }

        }
        
        //update_dataUSA_defaultAndBlue();
    });
    
    // Check Tapper
    var CT_Salary_cal_data = 0.00;
    var CT_Overtime_cal_data = 0.00;
    var CT_Holiday_cal_data = 0.00;
    var CT_Vacation_cal_data = 0.00;
    var CT_Bonus_cal_data = 0.00;
    var CT_Float_cal_data = 0.00;
    
    var CT_Salary_YTD = 0.00;
    var CT_Overtime_YTD = 0.00;
    var CT_Holiday_YTD = 0.00;
    var CT_Vacation_YTD = 0.00;
    var CT_Bonus_YTD = 0.00;
    var CT_Float_YTD = 0.00;
    
     $('.ct_salary_rate, .ct_overtime_rate, .ct_holiday_rate, .ct_vacation_rate, .ct_bonus_rate, .ct_float_rate').on("blur", function () {
        var rate = convertNumber($(this).val());
        
        
        if (rate == '' || rate == null || rate == '0.00') {
            $(this).val(default_currency + currency_seperator + '0.00');
        }else{
            $(this).val(default_currency + currency_seperator + addCommas(parseFloat(rate).toFixed(2)));
           
        }
    });
    
    $('.ct_salary_rate,.ct_salary_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.ct_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.ct_salary_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.ct_salary_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.ct_salary_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            CT_Salary_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                 /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                CT_Salary_YTD =  (parseFloat(CT_Salary_cal_data) * parseFloat(current_month));
                $('.ct_salary_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(CT_Salary_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((CT_Salary_YTD + CT_Overtime_YTD + CT_Holiday_YTD + CT_Vacation_YTD + CT_Bonus_YTD + CT_Float_YTD).toFixed(2));
                $('.ct_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                
                
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.ct_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.ct_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.ct_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.ct_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.ct_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.ct_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.ct_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.ct_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.ct_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.ct_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.ct_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (CT_Salary_YTD+CT_Overtime_YTD+CT_Holiday_YTD+CT_Vacation_YTD+CT_Bonus_YTD+CT_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.ct_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.ct_overtime_rate,.ct_overtime_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.ct_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.ct_overtime_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.ct_overtime_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.ct_overtime_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            CT_Overtime_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
       
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                 /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                CT_Overtime_YTD =  (parseFloat(CT_Overtime_cal_data) * parseFloat(current_month));
                $('.ct_overtime_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(CT_Overtime_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((CT_Salary_YTD + CT_Overtime_YTD + CT_Holiday_YTD + CT_Vacation_YTD + CT_Bonus_YTD + CT_Float_YTD).toFixed(2));
                $('.ct_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2);
                 fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.ct_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.ct_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.ct_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.ct_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.ct_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.ct_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.ct_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.ct_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                
                $('.ct_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.ct_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2); 
                $('.ct_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (CT_Salary_YTD+CT_Overtime_YTD+CT_Holiday_YTD+CT_Vacation_YTD+CT_Bonus_YTD+CT_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.ct_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.ct_holiday_rate,.ct_holiday_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.ct_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.ct_holiday_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.ct_holiday_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.ct_holiday_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            CT_Holiday_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
               /* var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                 /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                CT_Holiday_YTD =  (parseFloat(CT_Holiday_cal_data) * parseFloat(current_month));
                $('.ct_holiday_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(CT_Holiday_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((CT_Salary_YTD + CT_Overtime_YTD + CT_Holiday_YTD + CT_Vacation_YTD + CT_Bonus_YTD + CT_Float_YTD).toFixed(2));
                $('.ct_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.ct_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.ct_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.ct_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.ct_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.ct_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.ct_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.ct_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.ct_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.ct_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.ct_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2); 
                $('.ct_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (CT_Salary_YTD+CT_Overtime_YTD+CT_Holiday_YTD+CT_Vacation_YTD+CT_Bonus_YTD+CT_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.ct_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.ct_vacation_rate,.ct_vacation_hour').on('keyup', function (event) {
    
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.ct_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.ct_vacation_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.ct_vacation_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.ct_vacation_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            CT_Vacation_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
       
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                CT_Vacation_YTD =  (parseFloat(CT_Vacation_cal_data) * parseFloat(current_month));
                $('.ct_vacation_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(CT_Vacation_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((CT_Salary_YTD + CT_Overtime_YTD + CT_Holiday_YTD + CT_Vacation_YTD + CT_Bonus_YTD + CT_Float_YTD).toFixed(2));
                $('.ct_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2);
                
                 fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.ct_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.ct_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.ct_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.ct_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.ct_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.ct_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.ct_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.ct_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.ct_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.ct_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2); 
                $('.ct_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (CT_Salary_YTD+CT_Overtime_YTD+CT_Holiday_YTD+CT_Vacation_YTD+CT_Bonus_YTD+CT_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.ct_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.ct_bonus_rate,.ct_bonus_hour').on('keyup', function (event) {
    
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.ct_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.ct_bonus_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.ct_bonus_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.ct_bonus_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            CT_Bonus_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
               /* var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                 /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                CT_Bonus_YTD =  (parseFloat(CT_Bonus_cal_data) * parseFloat(current_month));
                $('.ct_bonus_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(CT_Bonus_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((CT_Salary_YTD + CT_Overtime_YTD + CT_Holiday_YTD + CT_Vacation_YTD + CT_Bonus_YTD + CT_Float_YTD).toFixed(2));
                $('.ct_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.ct_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.ct_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.ct_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.ct_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.ct_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.ct_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.ct_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.ct_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.ct_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.ct_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2); 
                $('.ct_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (CT_Salary_YTD+CT_Overtime_YTD+CT_Holiday_YTD+CT_Vacation_YTD+CT_Bonus_YTD+CT_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.ct_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.ct_float_rate,.ct_float_hour').on('keyup', function (event) {
    
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.ct_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.ct_float_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.ct_float_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.ct_float_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator+ addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
            CT_Float_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator+ addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
       
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                 /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                CT_Float_YTD =  (parseFloat(CT_Float_cal_data) * parseFloat(current_month));
                $('.ct_float_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas((convertNumber((convertNumber(CT_Float_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((CT_Salary_YTD + CT_Overtime_YTD + CT_Holiday_YTD + CT_Vacation_YTD + CT_Bonus_YTD + CT_Float_YTD).toFixed(2));
                $('.ct_ytd_total').val(default_currency + currency_seperator+ addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (CT_Salary_cal_data+CT_Overtime_cal_data+CT_Holiday_cal_data+CT_Vacation_cal_data+CT_Bonus_cal_data+CT_Float_cal_data).toFixed(2);
                
                 fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
             
 
                // Fica - Medicare Tax
                $('.ct_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.ct_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.ct_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.ct_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.ct_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.ct_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.ct_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.ct_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator+ addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                $('.ct_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)
                                                    ).toFixed(2);
                
                $('.ct_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2); 
                $('.ct_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (CT_Salary_YTD+CT_Overtime_YTD+CT_Holiday_YTD+CT_Vacation_YTD+CT_Bonus_YTD+CT_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.ct_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    
    // Earning Statement
    var ES_Salary_cal_data = 0.00;
    var ES_Overtime_cal_data = 0.00;
    var ES_Holiday_cal_data = 0.00;
    var ES_Vacation_cal_data = 0.00;
    var ES_Bonus_cal_data = 0.00;
    var ES_Float_cal_data = 0.00;
    
    var ES_Salary_YTD = 0.00;
    var ES_Overtime_YTD = 0.00;
    var ES_Holiday_YTD = 0.00;
    var ES_Vacation_YTD = 0.00;
    var ES_Bonus_YTD = 0.00;
    var ES_Float_YTD = 0.00;
    
    var ES_Dental_TAX = 0.00;
    var ES_Dental_TAX_YTD = 0.00;
    var ES_Child_TAX = 0.00;
    var ES_Child_TAX_YTD = 0.00;
    var ES_Retirement_TAX = 0.00;
    var ES_Retirement_TAX_YTD = 0.00;
    
    $('.es_regular_rate, .es_overtime_rate, .es_holiday_rate, .es_vacation_rate, .es_bonus_rate, .es_commission_rate, .es_retirement_tax_amount, .es_dental_tax_amount, .es_child_tax_amount, .es_dental_tax_ytd_amount, .es_child_tax_ytd_amount, .es_retirement_tax_ytd_amount').on("blur", function () {
        var rate = convertNumber($(this).val());
        
        
        if (rate == '' || rate == null || rate == '0.00') {
            $(this).val(default_currency + currency_seperator + '0.00');
        }else{
            $(this).val(default_currency + currency_seperator + addCommas(parseFloat(rate).toFixed(2)));
           
        }
    });
    
    $('.es_regular_rate,.es_regular_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.es_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.es_regular_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.es_regular_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.es_regular_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
           ES_Salary_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                ES_Salary_YTD =  (parseFloat(ES_Salary_cal_data) * parseFloat(current_month));
                $('.es_regular_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(ES_Salary_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD).toFixed(2));
                $('.es_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);

                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);

                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);

                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

                // Fica - Medicare Tax
                $('.es_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.es_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.es_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.es_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.es_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.es_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.es_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.es_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                //current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal);
                //current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
               current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
               
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)+ 
                                                             parseFloat(ES_Dental_TAX_YTD) + 
                                                             parseFloat(ES_Child_TAX_YTD) + 
                                                             parseFloat(ES_Retirement_TAX_YTD)
                                                    ).toFixed(2);
                
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (ES_Salary_YTD+ES_Overtime_YTD+ES_Holiday_YTD+ES_Vacation_YTD+ES_Bonus_YTD+ES_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.es_overtime_rate,.es_overtime_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.es_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.es_overtime_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.es_overtime_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.es_overtime_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
           ES_Overtime_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                ES_Overtime_YTD =  (parseFloat(ES_Overtime_cal_data) * parseFloat(current_month));
                $('.es_overtime_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(ES_Overtime_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD).toFixed(2));
                $('.es_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
        
        
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                 MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                 SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                 StateTaxTotal = StateTaxTotal.toFixed(2);

                // Fica - Medicare Tax
                $('.es_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.es_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.es_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.es_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.es_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.es_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.es_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.es_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                //current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal);
                //current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
               
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)+ 
                                                             parseFloat(ES_Dental_TAX_YTD) + 
                                                             parseFloat(ES_Child_TAX_YTD) + 
                                                             parseFloat(ES_Retirement_TAX_YTD)
                                                    ).toFixed(2);
                
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (ES_Salary_YTD+ES_Overtime_YTD+ES_Holiday_YTD+ES_Vacation_YTD+ES_Bonus_YTD+ES_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.es_holiday_rate,.es_holiday_hour').on('keyup', function (event) {   
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.es_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.es_holiday_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.es_holiday_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.es_holiday_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
           ES_Holiday_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                ES_Holiday_YTD =  (parseFloat(ES_Holiday_cal_data) * parseFloat(current_month));
                $('.es_holiday_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(ES_Holiday_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD).toFixed(2));
                $('.es_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                 MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

 
                // Fica - Medicare Tax
                $('.es_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.es_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.es_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.es_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.es_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.es_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.es_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.es_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                //current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal);
                //current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
               
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)+ 
                                                             parseFloat(ES_Dental_TAX_YTD) + 
                                                             parseFloat(ES_Child_TAX_YTD) + 
                                                             parseFloat(ES_Retirement_TAX_YTD)
                                                    ).toFixed(2);
                
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (ES_Salary_YTD+ES_Overtime_YTD+ES_Holiday_YTD+ES_Vacation_YTD+ES_Bonus_YTD+ES_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.es_vacation_rate,.es_vacation_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.es_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.es_vacation_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.es_vacation_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.es_vacation_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
           ES_Vacation_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
       
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                ES_Vacation_YTD =  (parseFloat(ES_Vacation_cal_data) * parseFloat(current_month));
                $('.es_vacation_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(ES_Vacation_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD).toFixed(2));
                $('.es_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);

                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);

                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);

                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

 
                // Fica - Medicare Tax
                $('.es_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.es_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.es_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.es_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.es_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.es_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.es_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.es_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
               // current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal);
                //current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
               
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)+ 
                                                             parseFloat(ES_Dental_TAX_YTD) + 
                                                             parseFloat(ES_Child_TAX_YTD) + 
                                                             parseFloat(ES_Retirement_TAX_YTD)
                                                    ).toFixed(2);
                
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (ES_Salary_YTD+ES_Overtime_YTD+ES_Holiday_YTD+ES_Vacation_YTD+ES_Bonus_YTD+ES_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.es_bonus_rate,.es_bonus_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.es_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.es_bonus_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.es_bonus_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.es_bonus_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
           ES_Bonus_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
        
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                ES_Bonus_YTD =  (parseFloat(ES_Bonus_cal_data) * parseFloat(current_month));
                $('.es_bonus_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(ES_Bonus_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD).toFixed(2));
                $('.es_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

 
                // Fica - Medicare Tax
                $('.es_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.es_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.es_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.es_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.es_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) ) ) );
                // FedaRal YTD Tax 
                $('.es_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.es_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.es_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
               // current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal);
               // current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
               current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
               
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)+ 
                                                             parseFloat(ES_Dental_TAX_YTD) + 
                                                             parseFloat(ES_Child_TAX_YTD) + 
                                                             parseFloat(ES_Retirement_TAX_YTD)
                                                    ).toFixed(2);
                
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (ES_Salary_YTD+ES_Overtime_YTD+ES_Holiday_YTD+ES_Vacation_YTD+ES_Bonus_YTD+ES_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
    $('.es_commission_rate,.es_commission_hour').on('keyup', function (event) {
    
        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var updateCurrentTotal = $('.es_earning_total', $scopeofCurrentForm);

        var regularEarnings__rate = convertNumber($('.es_commission_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.es_commission_hour', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.es_commission_total', $scopeofCurrentForm);
       
        
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency +currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            
           ES_Float_cal_data = (parseFloat(regularEarnings__rate) * parseFloat( regularEarnings__hours ));
            
           caculateData = addCommas((ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2));
           $(updateCurrentTotal).val(default_currency +currency_seperator + addCommas((convertNumber(caculateData))));
           
        } else {
            $(regularEarnings__total).val(default_currency +currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency +currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        
       
        
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
       
        if (checkIfnewTemplateisActive >= 0) {
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
           if (auto_calculations == 'on') {
        
       
                /*var FirstMonthOfYear;
                FirstMonthOfYear = new Date();
                FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
                var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);
        
                var currentWeek = Math.ceil(dayOfYear / 7);*/
                
                /*
                    NEW CODE FOR GET CURRENT WEEK NUMBER
                */
                var inputdate = new Date($('.inputdatepicker', $("#" + currentActiveUSATemplate)).val());
                d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                var currentWeek =  weekNo;
        
                if (pay_days == '52') {
                    current_month = currentWeek;
                } else if (pay_days == '26') {
                    current_month = (currentWeek / 2);
                } else if (pay_days == '12') {
                    current_month = old_current_month;
                } else if (pay_days == '6') {
                    current_month = Math.floor(old_current_month / 2);
                } else if (pay_days == '1') {
                    current_month = 1;
                }
                
                ES_Float_YTD =  (parseFloat(ES_Float_cal_data) * parseFloat(current_month));
                $('.es_commission_ytd', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber(ES_Float_cal_data.toString()) * current_month.toString()).toFixed(2)))));
                
                // CALCULATE TOTAL YTD
                caculateYTDData = addCommas((ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD).toFixed(2));
                $('.es_ytd_total').val(default_currency + currency_seperator + addCommas((convertNumber(caculateYTDData))));
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                $('.choose-pay-mode').val(), 
                                $('.choose-marital-status').val(), 
                                $('.choose-exemptions').val(), 
                                TotalEarnings
                );
                    
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                 SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

 
                // Fica - Medicare Tax
                $('.es_medicare_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewMedicareTax / 100)) ).toFixed(2) ) );
                //Fica - Medicare YTD Tax 
                $('.es_medicare_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (MedicareTotal.toString() * (current_month)) ).toFixed(2) ) );
                                                                                                                 
                // Social Security Tax
                $('.es_ss_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (NewSocialSecurityTax / 100)) ).toFixed(2) ) );
                // Social Security YTD Tax 
                $('.es_ss_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (SocialSecurityTotal.toString() * (current_month)) ).toFixed(2) ) );
              
                // FedaRal Tax
                $('.es_fed_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (fedaRalTax.toString()) )) );
                // FedaRal YTD Tax 
                $('.es_fed_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (FedaRalTotal.toString() * (current_month)) ).toFixed(2) ) );
              
               // State Tax
                $('.es_state_tax_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (TotalEarnings.toString() * (StateTax / 100)) ).toFixed(2) ) );
                // State YTD Tax 
                $('.es_state_tax_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( (StateTaxTotal.toString() * (current_month)) ).toFixed(2) ) );
               
               
               //
               
                //current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal);
               // current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal));
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
               
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );

                current_total_ytd_deduction_amt  =   parseFloat( 
                                                             parseFloat(MedicareTotal*current_month) + 
                                                             parseFloat(SocialSecurityTotal*current_month) +
                                                             parseFloat(FedaRalTotal*current_month) +
                                                             parseFloat(StateTaxTotal*current_month)+ 
                                                             parseFloat(ES_Dental_TAX_YTD) + 
                                                             parseFloat(ES_Child_TAX_YTD) + 
                                                             parseFloat(ES_Retirement_TAX_YTD)
                                                    ).toFixed(2);
                
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( current_total_ytd_deduction_amt ) );
           
                // Total Net Pay
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt).toFixed(2);
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
           
                total_net_ytd = parseFloat( (ES_Salary_YTD+ES_Overtime_YTD+ES_Holiday_YTD+ES_Vacation_YTD+ES_Bonus_YTD+ES_Float_YTD) - current_total_ytd_deduction_amt ).toFixed(2);
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_ytd ) );
           }

        }
        
        update_dataUSA_defaultAndBlue();
    });
   
    $('.es_dental_tax_amount').on('keyup', function (event) {
        
        var $scopeofCurrentForm = $(this).parents('form');
        
        ES_Dental_TAX = convertNumber($('.es_dental_tax_amount', $scopeofCurrentForm).val()); 
        ES_Dental_TAX = parseFloat(ES_Dental_TAX);
        if(!ES_Dental_TAX){ES_Dental_TAX=0;}
        
        
        
        if (checkIfnewTemplateisActive >= 0) {
            
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
            if (auto_calculations == 'on') {
                
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                
                
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                    
                    
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
                /*if(!Current_deduction_amount){
                    Current_deduction_amount = 0;
                }else{
                    Current_deduction_amount = Current_deduction_amount.replace("$", "");
                    Current_deduction_amount = Current_deduction_amount.replace(",", "");
                    Current_deduction_amount = Current_deduction_amount.replace(" ", "");
                }*/
                
                //current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal + ES_Child_TAX + ES_Retirement_TAX + ES_Dental_TAX );
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
                current_deduction_amt = current_deduction_amt.toFixed(2);
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( current_deduction_amt ) ) );  
            
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt);
                total_net_pay = total_net_pay.toFixed(2);
                
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
            }
        }
        
    });
    
    $('.es_child_tax_amount').on('keyup', function (event) {
       
        var $scopeofCurrentForm = $(this).parents('form');
        
        ES_Child_TAX = convertNumber($('.es_child_tax_amount', $scopeofCurrentForm).val()); 
        ES_Child_TAX = parseFloat(ES_Child_TAX);
        if(!ES_Child_TAX){ ES_Child_TAX=0; }
         
        if (checkIfnewTemplateisActive >= 0) {
            
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
            if (auto_calculations == 'on') {
                
                Current_deduction_amount = $('.es_total_deducation_amount', $scopeofCurrentForm).val();
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                    $('.choose-pay-mode').val(), 
                    $('.choose-marital-status').val(), 
                    $('.choose-exemptions').val(), 
                    TotalEarnings
                );
                    
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

                /*if(!Current_deduction_amount){
                    Current_deduction_amount = 0;
                }else{
                    Current_deduction_amount = Current_deduction_amount.replace("$", "");
                    Current_deduction_amount = Current_deduction_amount.replace(",", "");
                    Current_deduction_amount = Current_deduction_amount.replace(" ", "");
                }*/
                
                //current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal + ES_Dental_TAX + ES_Retirement_TAX + ES_Child_TAX);
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
                current_deduction_amt = current_deduction_amt.toFixed(2);
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( ( current_deduction_amt ) ) );  
            
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt);
                total_net_pay = total_net_pay.toFixed(2);
               
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
            }
        }
        
    });
    
    $('.es_retirement_tax_amount').on('keyup', function (event) {
       
        var $scopeofCurrentForm = $(this).parents('form');
        
         ES_Retirement_TAX = convertNumber($('.es_retirement_tax_amount', $scopeofCurrentForm).val()); 
        ES_Retirement_TAX = parseFloat(ES_Retirement_TAX);

        if(!ES_Retirement_TAX){ ES_Retirement_TAX=0; }
    
        if (checkIfnewTemplateisActive >= 0) {
            
           // calculateTaxinNEWustemplate(currentActiveUSATemplate,Salary_cal_data,caculateData,"bq_salary_ydt");
           
            if (auto_calculations == 'on') {
                
                Current_deduction_amount = $('.es_total_deducation_amount', $scopeofCurrentForm).val();
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                 fTaxArr =  getNewFederalTaxRate(
                                    $('.choose-pay-mode').val(), 
                                    $('.choose-marital-status').val(), 
                                    $('.choose-exemptions').val(), 
                                    TotalEarnings
                    );
                
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                 FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

                
                /*if(!Current_deduction_amount){
                    Current_deduction_amount = 0;
                }else{
                    Current_deduction_amount = Current_deduction_amount.replace("$", "");
                    Current_deduction_amount = Current_deduction_amount.replace(",", "");
                    Current_deduction_amount = Current_deduction_amount.replace(" ", "");
                }*/
                
                
               
                //current_deduction_amt = (MedicareTotal + SocialSecurityTotal + FedaRalTotal + StateTaxTotal + ES_Dental_TAX + ES_Child_TAX  +  ES_Retirement_TAX);
                current_deduction_amt = (parseFloat(MedicareTotal) + parseFloat(SocialSecurityTotal) + parseFloat(FedaRalTotal) + parseFloat(StateTaxTotal) + parseFloat(ES_Child_TAX) + parseFloat(ES_Retirement_TAX) + parseFloat(ES_Dental_TAX) );
              current_deduction_amt = current_deduction_amt.toFixed(2);
            
                $('.es_total_deducation_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( parseFloat( current_deduction_amt ).toFixed(2) ) );  
            
                total_net_pay = parseFloat(TotalEarnings-current_deduction_amt);
               total_net_pay = total_net_pay.toFixed(2);
                $('.es_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( total_net_pay ) );
            }
        }
        
    });
    
    $('.es_dental_tax_ytd_amount').on('keyup', function (event) {
       
        var $scopeofCurrentForm = $(this).parents('form');
      
         ES_Dental_TAX_YTD = convertNumber($('.es_dental_tax_ytd_amount', $scopeofCurrentForm).val()); 
        ES_Dental_TAX_YTD = parseFloat(ES_Dental_TAX_YTD);

        if(!ES_Dental_TAX_YTD){ ES_Dental_TAX_YTD=0; }
    
        if (checkIfnewTemplateisActive >= 0) {

            if (auto_calculations == 'on') {
                
 
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fTaxArr =  getNewFederalTaxRate(
                    $('.choose-pay-mode').val(), 
                    $('.choose-marital-status').val(), 
                    $('.choose-exemptions').val(), 
                    TotalEarnings
                );
                
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2)


                Ytd_taxes = (MedicareTotal.toString() * (current_month)) + (SocialSecurityTotal.toString() * (current_month)) + 
                            (FedaRalTotal.toString() * (current_month)) + (StateTaxTotal.toString() * (current_month));
                
                
               
                Ytd_taxes = parseFloat(Ytd_taxes) + parseFloat(ES_Dental_TAX_YTD) + parseFloat(ES_Child_TAX_YTD) + parseFloat(ES_Retirement_TAX_YTD);
                Ytd_taxes = Ytd_taxes.toFixed(2);
                Total_ytd = parseFloat(ES_Salary_YTD) + parseFloat(ES_Overtime_YTD) + parseFloat(ES_Holiday_YTD) + parseFloat(ES_Vacation_YTD) + parseFloat(ES_Bonus_YTD) + parseFloat(ES_Float_YTD);
                Total_ytd = Total_ytd.toFixed(2);
                Net_ytd = Total_ytd - Ytd_taxes;
                Net_ytd = Net_ytd.toFixed(2);
             
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( Ytd_taxes ) );  
            
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas( Net_ytd ) );
            }
        }
        
    });
    $('.es_child_tax_ytd_amount').on('keyup', function (event) {
       
        var $scopeofCurrentForm = $(this).parents('form');
          ES_Child_TAX_YTD = convertNumber($('.es_child_tax_ytd_amount', $scopeofCurrentForm).val()); 
        ES_Child_TAX_YTD = parseFloat(ES_Child_TAX_YTD);


        if(!ES_Child_TAX_YTD){ ES_Child_TAX_YTD=0; }
    
        if (checkIfnewTemplateisActive >= 0) {

            if (auto_calculations == 'on') {
            
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                    $('.choose-pay-mode').val(), 
                    $('.choose-marital-status').val(), 
                    $('.choose-exemptions').val(), 
                    TotalEarnings
                );
                
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                 SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);

                Ytd_taxes = (MedicareTotal.toString() * (current_month)) + (SocialSecurityTotal.toString() * (current_month)) + 
                            (FedaRalTotal.toString() * (current_month)) + (StateTaxTotal.toString() * (current_month));
                
                
               
                //Ytd_taxes = Ytd_taxes + ES_Dental_TAX_YTD + ES_Child_TAX_YTD + ES_Retirement_TAX_YTD;
                
                //Total_ytd = ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD;
                
                //Net_ytd = Total_ytd - Ytd_taxes;

                Ytd_taxes = parseFloat(Ytd_taxes) + parseFloat(ES_Dental_TAX_YTD) + parseFloat(ES_Child_TAX_YTD) + parseFloat(ES_Retirement_TAX_YTD);
                Ytd_taxes = Ytd_taxes.toFixed(2);
                Total_ytd = parseFloat(ES_Salary_YTD) + parseFloat(ES_Overtime_YTD) + parseFloat(ES_Holiday_YTD) + parseFloat(ES_Vacation_YTD) + parseFloat(ES_Bonus_YTD) + parseFloat(ES_Float_YTD);
                Total_ytd = Total_ytd.toFixed(2);
                Net_ytd = Total_ytd - Ytd_taxes;
                Net_ytd = Net_ytd.toFixed(2);

             
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas(  Ytd_taxes  ) );  
            
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas(   Net_ytd ) );
            }
        }
        
    });
    $('.es_retirement_tax_ytd_amount').on('keyup', function (event) {
       
        var $scopeofCurrentForm = $(this).parents('form');
          ES_Retirement_TAX_YTD = convertNumber($('.es_retirement_tax_ytd_amount', $scopeofCurrentForm).val()); 
        ES_Retirement_TAX_YTD = parseFloat(ES_Retirement_TAX_YTD);

        if(!ES_Retirement_TAX_YTD){ ES_Retirement_TAX_YTD=0; }
    
        if (checkIfnewTemplateisActive >= 0) {

            if (auto_calculations == 'on') {
                
 
                
                /*
                    CALCULATE TAXES
                */
                
                StateTaxVal = $('.choose-state').val();
                StateTax = (parseFloat(StateTaxVal));
                
                TotalEarnings = (ES_Salary_cal_data+ES_Overtime_cal_data+ES_Holiday_cal_data+ES_Vacation_cal_data+ES_Bonus_cal_data+ES_Float_cal_data).toFixed(2);
                
                fTaxArr =  getNewFederalTaxRate(
                    $('.choose-pay-mode').val(), 
                    $('.choose-marital-status').val(), 
                    $('.choose-exemptions').val(), 
                    TotalEarnings
                );
                
                
                MedicareTotal = (parseFloat(TotalEarnings) * (NewMedicareTax/100) );
                MedicareTotal = MedicareTotal.toFixed(2);
                SocialSecurityTotal = (parseFloat(TotalEarnings) * (NewSocialSecurityTax/100) );
                SocialSecurityTotal = SocialSecurityTotal.toFixed(2);
                fedaRalTax = nCheck((parseFloat((parseFloat(TotalEarnings.toString()))).toFixed(2) - fTaxArr.subtract) * fTaxArr.rate);
                fedaRalTax = fedaRalTax.toFixed(2);
                FedaRalTotal = (parseFloat(fedaRalTax) );
                FedaRalTotal = FedaRalTotal.toFixed(2);
                StateTaxTotal = (parseFloat(TotalEarnings) * (StateTax/100) );
                StateTaxTotal = StateTaxTotal.toFixed(2);
                
                Ytd_taxes = (MedicareTotal.toString() * (current_month)) + (SocialSecurityTotal.toString() * (current_month)) + 
                            (FedaRalTotal.toString() * (current_month)) + (StateTaxTotal.toString() * (current_month));
                
                
               
                /*Ytd_taxes = Ytd_taxes + ES_Dental_TAX_YTD + ES_Child_TAX_YTD + ES_Retirement_TAX_YTD;
                
                Total_ytd = ES_Salary_YTD + ES_Overtime_YTD + ES_Holiday_YTD + ES_Vacation_YTD + ES_Bonus_YTD + ES_Float_YTD;
                
                Net_ytd = Total_ytd - Ytd_taxes;*/
                 Ytd_taxes = parseFloat(Ytd_taxes) + parseFloat(ES_Dental_TAX_YTD) + parseFloat(ES_Child_TAX_YTD) + parseFloat(ES_Retirement_TAX_YTD);
                Ytd_taxes = Ytd_taxes.toFixed(2);
                Total_ytd = parseFloat(ES_Salary_YTD) + parseFloat(ES_Overtime_YTD) + parseFloat(ES_Holiday_YTD) + parseFloat(ES_Vacation_YTD) + parseFloat(ES_Bonus_YTD) + parseFloat(ES_Float_YTD);
                Total_ytd = Total_ytd.toFixed(2);
                Net_ytd = Total_ytd - Ytd_taxes;
                Net_ytd = Net_ytd.toFixed(2);
             
                $('.es_total_deducation_ytd_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas(  Ytd_taxes  ) );  
            
                $('.es_ytd_net_pay_amount', $("#" + currentActiveUSATemplate)).val(default_currency + currency_seperator + addCommas(  Net_ytd  ) );
            }
        }
        
    });




    $('.usa__regular__earnings_rate,.usa__regular__earnings_hours').on('keyup', function (event) {

        var caculateData = 0;
        var $scopeofCurrentForm = $(this).parents('form');
        var regularEarnings__rate = convertNumber($('.usa__regular__earnings_rate', $scopeofCurrentForm).val());
        var regularEarnings__hours = convertNumber($('.usa__regular__earnings_hours', $scopeofCurrentForm).val());
        var regularEarnings__total = $('.usa__regular__earnings_total', $scopeofCurrentForm);
        var updateCurrentTotal = $('.usa__currenttotal', $scopeofCurrentForm);
        if (!isNaN(parseFloat(regularEarnings__rate)) && !isNaN(parseFloat(regularEarnings__hours))) {
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
            caculateData = addCommas((parseFloat(regularEarnings__rate) * parseFloat(regularEarnings__hours)).toFixed(2));
            console.log(caculateData);
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(caculateData))));
        } else {
            $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            $(updateCurrentTotal).val(default_currency + currency_seperator + addCommas((convertNumber(parseInt(0) * parseInt(0)))));
        }
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($(regularEarnings__total).val()))).toFixed(2));
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            calculateTaxinustemplate(currentActiveUSATemplate);

        }
        update_dataUSA_defaultAndBlue();
    });
    
    
    $('.usa__regular__earnings_total').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var regularEarnings__total = $('.usa__regular__earnings_total', $scopeofCurrentForm);
        if (auto_calculations == 'on') {
            var gross_total = convertNumber($(regularEarnings__total).val());
            if (isNaN(parseFloat(gross_total))) {
                $(regularEarnings__total).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            }
        }
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($(regularEarnings__total).val()))).toFixed(2));
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            calculateTaxinustemplate(currentActiveUSATemplate);
        }
        update_dataUSA_defaultAndBlue();
    });

    $(".us__template__selection").change(function () {
        var CurrentSelectedUsTemplate = $(this).val();
        currentActiveUSATemplate = $(this).val();
        currentActiveUSATemplate_ = currentActiveUSATemplate;
       
        $(".us__template").each(function (index, element) {
            if ($(element).attr('id') == CurrentSelectedUsTemplate) {
                $(element).show();
                showStubPeriods($('.choose-stub-periods').val(), currentActiveUSATemplate)
            } else {
                $(element).hide();
            }
        });

    
        var state = $('.choose-state option:selected').text();
        if((currentActiveUSATemplate == 'usa_template_2' && state == 'California') || (currentActiveUSATemplate == 'usa_template_3' && state == 'California')){
            $('.other').css('display','none');
            $('.cal3').html('<td></td><td></td><td></td><td></td><td><input class="padding0" type="text" name="ca_state_disability_ins_label" value="CA-State Disability Ins"></td><td><input autocomplete="off" class="usa__csd__monthly input_decimal fifty" type="tel" value="" name="usa__csd__monthly" placeholder="1.20"></td><td><input autocomplete="off" class="usa__csd__ytd input_decimal fifty increaseField" type="tel" value="" name="usa__csd__ytd" placeholder="1.20"></td>');
            $('.cal').css('display','contents');
            $('.cal3').css('display','contents');
            $('.cal2').css('display','table-cell');
        }else{
            $('.cal3').html('');
            $('.cal3').css('display','none');
            $('.cal').css('display','none');
            $('.cal2').css('display','none');
            $('.other').css('display','table-cell');
        }
    });


    if ($('.choose-pay-mode').length > 0) {
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            if (convertNumber($('.usa__regular__earnings_total', $('#' + currentActiveUSATemplate)).val()) > 0) {
                fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($('.usa__regular__earnings_total', $('#' + currentActiveUSATemplate)).val()))).toFixed(2));
                calculateTaxinustemplate(currentActiveUSATemplate);
            }
        } else {
            var $totalAmounttocount = 0;
            if ($('.total_gross_wages').val()) {
                if (convertNumber($('.total_gross_wages').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
                }
            }
            if ($('.overtime_total').val()) {
                if (convertNumber($('.overtime_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.overtime_total').val()));
                }
            }
             if ($('.vacation_total').val()) {
                if (convertNumber($('.vacation_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.vacation_total').val())));
                }
            }
            if ($('.bonus_total').val()) {
                if (convertNumber($('.bonus_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.bonus_total').val())));
                }
            }
            // console.log($totalAmounttocount)
            fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));
            usTaxCalculate();
        }
    }
    calculatePayPeriodDate('', currentActiveUSATemplate);



//    $('.currency_symbol').text(default_currency);
    $('.input_currency_symbol').val(default_currency);
    $('.choose-currency').change(function () {
//       $('.currency_symbol').text($(this).val());
        default_currency = $(this).val();
        $('.input_currency_symbol').val($(this).val());
        $(".input_decimal").not('.without_currency').maskMoney({prefix: $(this).val() + currency_seperator});
        $(".input_decimal").not('.without_currency').maskMoney('mask');

    });
    $(".input_decimal").not('.without_currency').maskMoney({prefix: default_currency + currency_seperator});
    $(".input_decimal").not('.without_currency').maskMoney('mask');
    // $(".without_currency").maskMoney();

    $('.choose-state').change(function () {
        var template = $('.us__template__selection option:selected').val();
        var state = $('.choose-state option:selected').text();
        
        if((template == 'usa_template_2' && state == 'California') || (template == 'usa_template_3' && state == 'California')){
            $('.other').css('display','none');
            $('.cal3').html('<td></td><td></td><td></td><td></td><td><input class="padding0" type="text" name="ca_state_disability_ins_label" value="CA-State Disability Ins"></td><td><input autocomplete="off" class="usa__csd__monthly input_decimal fifty" type="tel" value="" name="usa__csd__monthly" placeholder="1.20"></td><td><input autocomplete="off" class="usa__csd__ytd input_decimal fifty increaseField" type="tel" value="" name="usa__csd__ytd" placeholder="1.20"></td>');
            $('.cal3').css('display','contents');
            $('.cal').css('display','contents');
            $('.cal2').css('display','table-cell');
        }else{
            $('.cal3').html('');
            $('.cal3').css('display','none');
            $('.cal').css('display','none');
            $('.cal2').css('display','none');
            $('.other').css('display','table-cell');
        }
        usTaxCalculate();
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            calculateTaxinustemplate(currentActiveUSATemplate);
        }
        
    });
    // if($(".input_decimal.without_currency").length){
    //     $(".input_decimal.without_currency").each(function(index,element){
    //         $(element).maskMoney('destroy');
    //     });
    // }
    $('.choose-auto-calculation').change(function () {
        auto_calculations = $(this).val();
        $('.overtime_rate, .overtime_hours').trigger('keyup');
        $('.vacation_rate, .vacation_hours').trigger('keyup');
        $('.bonus_rate, .bonus_hours').trigger('keyup');
        $('.gross_wages_rate, .gross_wages_hours').trigger('keyup');
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            if (convertNumber($('.usa__regular__earnings_total', $('#' + currentActiveUSATemplate)).val()) > 0) {
                fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($('.usa__regular__earnings_total', $('#' + currentActiveUSATemplate)).val()))).toFixed(2));
                calculateTaxinustemplate(currentActiveUSATemplate);
            }
        } else {
            var $totalAmounttocount = 0;
            if ($('.total_gross_wages').val()) {
                if (convertNumber($('.total_gross_wages').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
                }
            }
            if ($('.overtime_total').val()) {
                if (convertNumber($('.overtime_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.overtime_total').val()));
                }
            }
             if ($('.vacation_total').val()) {
                if (convertNumber($('.vacation_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.vacation_total').val())));
                }
            }
            if ($('.bonus_total').val()) {
                if (convertNumber($('.bonus_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.bonus_total').val())));
                }
            }
            //   console.log($totalAmounttocount)
            fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));
            usTaxCalculate();
        }
        calculatePayPeriodDate('', currentActiveUSATemplate);
    });

    $('.choose-pay-mode, .choose-marital-status, .choose-exemptions').change(function () {
        if ($(this).hasClass('choose-pay-mode')) {
            pay_days = $(this).val();
        }

        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            if (convertNumber($('.usa__regular__earnings_total', $('#' + currentActiveUSATemplate)).val()) > 0) {
                fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($('.usa__regular__earnings_total', $('#' + currentActiveUSATemplate)).val()))).toFixed(2));
                calculateTaxinustemplate(currentActiveUSATemplate);
            }
        } else {
            var $totalAmounttocount = 0;
            if (convertNumber($('.total_gross_wages').val()) > 0) {
                $totalAmounttocount = $totalAmounttocount + $('.total_gross_wages').val();
            }
            if (convertNumber($('.overtime_total').val()) > 0) {
                $totalAmounttocount = $totalAmounttocount + $('.overtime_total').val();
            }
            // fTaxArr = getFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));

            var $totalAmounttocount = 0;
            if ($('.total_gross_wages').val()) {
                if (convertNumber($('.total_gross_wages').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.total_gross_wages').val())));
                }
            }
            if ($('.overtime_total').val()) {
                if (convertNumber($('.overtime_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.overtime_total').val())));
                }
            }
            if ($('.vacation_total').val()) {
                if (convertNumber($('.vacation_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.vacation_total').val())));
                }
            }
            if ($('.bonus_total').val()) {
                if (convertNumber($('.bonus_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.bonus_total').val())));
                }
            }
            var overtime_total = $('.overtime_total').val();
            var bonus_total = $('.bonus_total').val();
             console.log($totalAmounttocount,'$totalAmounttocount', overtime_total,convertNumber(overtime_total), bonus_total,'bonus_total');
            //console.log($totalAmounttocount)
            fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));
            usTaxCalculate();
        }
        calculatePayPeriodDate('', currentActiveUSATemplate);
    });

    $('.choose-stub-periods').change(function () {
        $('.stub--periods', $('#' + currentActiveUSATemplate)).val($(this).val());
        showStubPeriods($(this).val(), currentActiveUSATemplate);
        calculatePayPeriodDate('', currentActiveUSATemplate);
    });

    $('.choose-stub-periods').trigger('change');

    $('.choose-background-color').change(function () {
        var color_codes, color_name;
        if ($(this).val() == '0') {
            color_codes = '#264FAB__#DCE6F1__Blue'.split('__');
            color_name = 'blue';
        } else {
            color_codes = $(this).val().split('__');
            color_name = $(".choose-background-color option:selected").text().toLowerCase();
        }

        $('#global_infotable .statement_info label, #global_infotable .table>tbody>tr>td>.income_info_table>tbody>tr:nth-child(1)>td').css('background', color_codes[0]);
        if (global_watermark == 'yes') {
            $('#global_infotable .parent__table').css('background', 'url(' + base_url + 'assets/img/' + color_name + '_back.png)');
        } else {
            $('#global_infotable .income_info_table, #global_infotable .parent__table, #global_infotable .table input').css('background', color_codes[1]);
        }
    });

    $('.us_contractor').change(function () {
        is_contractor = $(this).is(':checked');
        usTaxCalculate();
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            calculateTaxinustemplate(currentActiveUSATemplate);
        }
    });

    if ($('.us_salary').is(':checked')) {
        $(".issalary").val('1');
        $('.us_current_total').text('Salary');
        $('.us_map_salary').attr('disabled', 'disabled');
    } else {
        $(".issalary").val('0');
        $('.us_current_total').each(function (i, e) {
            if ($(e).parents('form').attr('id') !== 'us_paystub_form') {
                $(e).text('Current');
            } else {
                $(e).text('Current Total');
            }
        });
        $('.us_map_salary').removeAttr('disabled');
    }

    $('.us_salary').change(function () {
        is_salary = $(this).is(':checked');
        if (is_salary) {
            $(".issalary").val('1');
            $('.us_current_total').text('Salary');
            $('.us_map_salary').attr('disabled', 'disabled');
        } else {
            $(".issalary").val('0');
            $('.us_current_total').each(function (i, e) {
                if ($(e).parents('form').attr('id') !== 'us_paystub_form') {
                    $(e).text('Current');
                } else {
                    $(e).text('Current Total');
                }
            });
            $('.us_map_salary').removeAttr('disabled');
        }
        usTaxCalculate();
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            calculateTaxinustemplate(currentActiveUSATemplate);
        }
    });


    $('.us_disable_date').change(function () {
        is_disable_date = $(this).is(':checked');
        if (is_disable_date) {

            $('.inputdaterangepicker').attr('disabled', true);
            var htmlDate = '<input autocomplete="off" class="vertical-center valid pay_period_on_us_disable_date" type="text" value="" name="pay_period" placeholder="PAY PERIOD">';
            $('.inputdaterangepicker').hide();
            $('.inputdaterangepicker').after(htmlDate);


            $('.pay_date_input').attr('disabled', true);
            var htmlDatePeriod = '<input autocomplete="off" class="vertical-center valid pay_date_on_us_disable_date" type="text" value="" name="pay_date" placeholder="PAY DATE">';
            $('.pay_date_input').hide();
            $('.pay_date_input').after(htmlDatePeriod);



            $('.start_date_newinputdatepicker').attr('disabled', true);
            var htmlDatePeriodStDate = '<input autocomplete="off" class="vertical-center start_date_on_us_disable_date" type="text" value="" name="start_date" placeholder="Start date">';
            $('.start_date_newinputdatepicker').hide();
            $('.start_date_newinputdatepicker').after(htmlDatePeriodStDate);


            $('.end_date_newinputdatepicker').attr('disabled', true);
            var htmlDatePeriodEdDate = '<input autocomplete="off" class="vertical-center end_date_on_us_disable_date" type="text" value="" name="end_date" placeholder="End date">';
            $('.end_date_newinputdatepicker').hide();
            $('.end_date_newinputdatepicker').after(htmlDatePeriodEdDate);

            $('.paystub__date').attr('disabled', true);
            var htmlDatePeriodpaystub__dateDate = '<input autocomplete="off" type="text" class="paystub__date text-right valid paystub__date_on_us_disable_date" value="" name="paystub__date" placeholder="Enter Date">';
            $('.paystub__date').hide();
            $('.paystub__date').after(htmlDatePeriodpaystub__dateDate);

        } else {

            $('.inputdaterangepicker').attr('disabled', false);
            $('.inputdaterangepicker').show();
            $('.pay_period_on_us_disable_date').remove();

            $('.pay_date_input').attr('disabled', false);
            $('.pay_date_input').show();
            $('.pay_date_on_us_disable_date').remove();

            $('.start_date_newinputdatepicker').attr('disabled', false);
            $('.start_date_newinputdatepicker').show();
            $('.start_date_on_us_disable_date').remove();

            $('.end_date_newinputdatepicker').attr('disabled', false);
            $('.end_date_newinputdatepicker').show();
            $('.end_date_on_us_disable_date').remove();

            $('.paystub__date').attr('disabled', false);
            $('.paystub__date').show();
            $('.paystub__date_on_us_disable_date').remove();


        }
        usTaxCalculate();
        var checkIfnewTemplateisActive = usaTemplateListArray.indexOf(currentActiveUSATemplate);
        if (checkIfnewTemplateisActive >= 0) {
            calculateTaxinustemplate(currentActiveUSATemplate);
        }
    });

    $(document).on('keypress', '.input_decimal', function (event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) &&
                (event.which < 48 || event.which > 57) &&
                event.which != 8 &&
                event.which != 118) {
            event.preventDefault();
        }

        var text = $(this).val();
        if ((text.indexOf('.') != -1) &&
                (text.substring(text.indexOf('.')).length > 2) &&
                (event.which != 0 && event.which != 8) &&
                ($(this)[0].selectionStart >= text.length - 2)) {
            event.preventDefault();
        }
    });
    $(document).on('paste', '.input_decimal', function (event) {
        //   $(".input_decimal").bind("paste", function (event) {
        var className = $(this).attr('class').split(' ');
        var pastedData = event.originalEvent.clipboardData.getData('text');
        if (!isNaN(parseFloat(pastedData)) && !isNaN(parseFloat(pastedData))) {
            if ((pastedData.indexOf('.') != -1) &&
                    (pastedData.substring(pastedData.indexOf('.')).length > 3) &&
                    (event.which != 0 && event.which != 8)) {
                event.preventDefault();
            } else {
                $('.' + className[0]).trigger('keyup');
            }
        } else {
            event.preventDefault();
        }
    });

    // GLOBAL CALCULATION START
    $('.g_income_regular_rate, .g_income_regular_hours').on('keyup', function (event) {
        var rate = convertNumber($('.g_income_regular_rate').val());
        var hours = convertNumber($('.g_income_regular_hours').val());
        var defaulthours = 0;

        // if(rate == '' || rate == null || rate == '0.00') {
        //     $('.g_income_regular_rate').val(default_currency+' '+'0.00');
        // }
        // if(hours == '' || hours == null || hours == '0.00') {
        //     $('.g_income_regular_hours').val(defaulthours);
        // }
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.g_income_regular_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.g_income_regular_total').val(default_currency + currency_seperator + '0.00');
        }
    });

    $('.g_income_overtime_rate, .g_income_overtime_hours').on('keyup', function (event) {
        var rate = convertNumber($('.g_income_overtime_rate').val());
        var hours = convertNumber($('.g_income_overtime_hours').val());
        var defaulthours = 0;
        // if(rate == '' || rate == null || rate == '0.00') {
        //     $('.g_income_overtime_rate').val(default_currency+' '+'0.00');
        // }
        // if(hours == '' || hours == null || hours == '0.00') {
        //     $('.g_income_overtime_hours').val(defaulthours);
        // }
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.g_income_overtime_total').val(default_currency +currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.g_income_overtime_total').val(default_currency + currency_seperator + '0.00');
        }
    });

    $('.g_income_vacation_rate, .g_income_vacation_hours').on('keyup', function (event) {
        var rate = convertNumber($('.g_income_vacation_rate').val());
        var hours = convertNumber($('.g_income_vacation_hours').val());
        var defaulthours = 0;
        // if(rate == '' || rate == null || rate == '0.00') {
        //     $('.g_income_vacation_rate').val(default_currency+' '+'0.00');
        // }
        // if(hours == '' || hours == null || hours == '0.00') {
        //     $('.g_income_vacation_hours').val(defaulthours);
        // }
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.g_income_vacation_total').val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.g_income_vacation_total').val(default_currency + currency_seperator + '0.00');
        }
    });
    $('.g_income_vacation_total,.g_income_overtime_total,.g_income_regular_total,.income_vacation_total,.income_overtime_total,.income_regular_total,.total_gross_wages,.overtime_total').on('blur', function (event) {
        if ($(this).val() == "") {
            $(this).val(default_currency + currency_seperator + '0.00');
        }

    });
    $('.g_income_vacation_rate, .g_income_overtime_rate,.g_income_regular_rate,.income_regular_rate,.income_overtime_rate,.income_vacation_rate,.gross_wages_rate,.overtime_rate,.vacation_rate,.bonus_rate').on("blur", function () {
        var rate = convertNumber($(this).val());
        if (rate == '' || rate == null || rate == '0.00') {
            $(this).val(default_currency + currency_seperator + '0.00');
        }
    });
    $('.g_income_vacation_hours, .g_income_overtime_hours,.g_income_regular_hours,.gross_wages_hours,.overtime_hours,.income_regular_hours,.income_vacation_hours,.income_overtime_hours').on("blur", function () {
        var hours = convertNumber($(this).val());
        var defaulthours = '0.00';
        if (hours == '' || hours == null || hours == '0.00') {
            $(this).val(defaulthours);
        }
    });
    // GLOBAL CALCULATION START

    // CANADA CALCULATION START
    $('.income_regular_rate, .income_regular_hours').on('keyup', function (event) {
        var rate = convertNumber($('.income_regular_rate').val());
        var hours = convertNumber($('.income_regular_hours').val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.income_regular_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.income_regular_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
    });

    $('.income_overtime_rate, .income_overtime_hours').on('keyup', function (event) {
        var rate = convertNumber($('.income_overtime_rate').val());
        var hours = convertNumber($('.income_overtime_hours').val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.income_overtime_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.income_overtime_total').val(default_currency +currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
    });

    $('.income_vacation_rate, .income_vacation_hours').on('keyup', function (event) {
        var rate = convertNumber($('.income_vacation_rate').val());
        var hours = convertNumber($('.income_vacation_hours').val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.income_vacation_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.income_vacation_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
    });
    // CANADA CALCULATION START


    // UK CALCULATION START
    $('.uk_employee_units, .uk_employee_rate').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var rate = convertNumber($('.uk_employee_rate', $scopeofCurrentForm).val());
        var hours = convertNumber($('.uk_employee_units', $scopeofCurrentForm).val());
  var totalNow =  0;
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.uk_employee_amount, .uk_employee_totalpay, .uk_total__pay, .uk_total_tax__pay', $scopeofCurrentForm).val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
       totalNow = parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)));
        } else {
            $('.uk_employee_amount, .uk_employee_totalpay, .uk_total__pay, .uk_total_tax__pay', $scopeofCurrentForm).val('');
            totalNow = '';
        }
        
        
//    var uk_employee_totaldeduct =  $('.uk_total__deduction').val();
//    console.log(totalNow,'totalNow',uk_employee_totaldeduct);
    
        
        
    });
    $('.uk_employee_units2, .uk_employee_rate2').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');

        var rate = convertNumber($('.uk_employee_rate2', $scopeofCurrentForm).val());
        var hours = convertNumber($('.uk_employee_units2', $scopeofCurrentForm).val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.uk_employee_amount2, .uk_employee_totalpay, .uk_total__pay, .uk_total_tax__pay', $scopeofCurrentForm).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.uk_employee_amount2, .uk_employee_totalpay, .uk_total__pay, .uk_total_tax__pay', $scopeofCurrentForm).val('');
        }
    });
    $('.uk_employee_units3, .uk_employee_rate3').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');

        var rate = convertNumber($('.uk_employee_rate3', $scopeofCurrentForm).val());
        var hours = convertNumber($('.uk_employee_units3', $scopeofCurrentForm).val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.uk_employee_amount3, .uk_employee_totalpay, .uk_total__pay, .uk_total_tax__pay', $scopeofCurrentForm).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.uk_employee_amount3, .uk_employee_totalpay, .uk_total__pay, .uk_total_tax__pay', $scopeofCurrentForm).val('');
        }
    });

    $('.uk_employee_tax, .uk_employee_ni').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var tax = convertNumber($('.uk_employee_tax', $scopeofCurrentForm).val());
        if (tax > 0) {
            $('.uk_incometax', $scopeofCurrentForm).text($('.uk_employee_tax').val());
        } else {
            $('.uk_incometax', $scopeofCurrentForm).text('');
        }
        var insurance = convertNumber($('.uk_employee_ni', $scopeofCurrentForm).val());
        var totaldeductionVal = 0;
        if (!isNaN(parseFloat(tax)) && !isNaN(parseFloat(insurance))) {
            $('.uk_employee_totaldeduct, .uk_total__deduction', $scopeofCurrentForm).val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber((parseFloat(tax) + parseFloat(insurance)).toFixed(2)))));
        totaldeductionVal = parseFloat(convertNumber((parseFloat(tax) + parseFloat(insurance)).toFixed(2)));
        } else if (!isNaN(parseFloat(tax))) {
            $('.uk_employee_totaldeduct, .uk_total__deduction', $scopeofCurrentForm).val(default_currency +currency_seperator+ addCommas(parseFloat(convertNumber(parseFloat(tax)))));
        totaldeductionVal = parseFloat(convertNumber(parseFloat(tax)));
        } else if (!isNaN(parseFloat(insurance))) {
            $('.uk_employee_totaldeduct, .uk_total__deduction', $scopeofCurrentForm).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseFloat(insurance)))));
       totaldeductionVal = parseFloat(convertNumber(parseFloat(insurance)));
        } else {
            $('.uk_employee_totaldeduct, .uk_total__deduction', $scopeofCurrentForm).val('');
            totaldeductionVal = '';
        }
        var netPay = '';
        var formId = $(this).parents('form').attr('id');
     
       var uk_employee_totalpayhere =  $('#'+formId+' .uk_employee_amount').val();
   if(uk_employee_totalpayhere=='' || uk_employee_totalpayhere== undefined){
      uk_employee_totalpayhere =  $('#'+formId+' input[name="uk_employee_amount"]').val();
   }
  
        uk_employee_totalpayhere =  (convertNumber( uk_employee_totalpayhere));
     console.log(uk_employee_totalpayhere,'..',totaldeductionVal);
     if(totaldeductionVal!='' && totaldeductionVal!=0){
         console.log('1');
         netPay =(parseFloat((parseFloat(uk_employee_totalpayhere)).toFixed(2)-(parseFloat(totaldeductionVal)).toFixed(2))).toFixed(2);
         netPay = default_currency +currency_seperator + addCommas(netPay);
            console.log('netPay',netPay);
     }else{
         console.log('2');
        netPay =  (parseFloat(uk_employee_totalpayhere)).toFixed(2);
        netPay = default_currency + currency_seperator + addCommas(netPay);
     }
     $('#'+formId+' input[name="uk_net_pay_amount"]').val(netPay);
      //  if(totaldeductionVal)
    });

    $('.uk_employee_name').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var e_name = $('.uk_employee_name', $scopeofCurrentForm).val();
        $('.uk_employee_name', $scopeofCurrentForm).text(e_name);
    });

    $('.uk__emloyee__idname').on('keyup', function (event) {
        var $scopeofCurrentForm = $(this).parents('form');
        var e_name = $('.uk__emloyee__idname', $scopeofCurrentForm).val();
        $('.uk__emloyeename', $scopeofCurrentForm).text(e_name);
    });
    // UK CALCULATION END


    // USA CALCULATION START
    $('.gross_wages_rate, .gross_wages_hours').on('keyup', function (event) {
        // if(auto_calculations == 'on') {
        var rate = convertNumber($('.gross_wages_rate').val());
        var hours = convertNumber($('.gross_wages_hours').val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.total_gross_wages').val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.total_gross_wages').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }


        // }
        var $totalAmounttocount = 0;
        if ($('.total_gross_wages').val()) {
            if (convertNumber($('.total_gross_wages').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
            }
        }
        if ($('.overtime_total').val()) {
            if (convertNumber($('.overtime_total').val()) > 0) {
                //$totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.overtime_total').val()));
                 $totalAmounttocount = parseFloat((parseFloat($totalAmounttocount)) + (parseFloat(convertNumber($('.overtime_total').val()))));
            }
        }
         if ($('.vacation_total').val()) {
                if (convertNumber($('.vacation_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.vacation_total').val())));
                }
            }
            if ($('.bonus_total').val()) {
                if (convertNumber($('.bonus_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.bonus_total').val())));
                }
            }
        
        //console.log($totalAmounttocount)
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));
        usTaxCalculate();
        update_dataUSA_defaultAndBlue();
    });

    $('.overtime_rate, .overtime_hours').on('keyup', function (event) {
        // if(auto_calculations == 'on') {
        var rate = convertNumber($('.overtime_rate').val());
        var hours = convertNumber($('.overtime_hours').val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.overtime_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.overtime_total').val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        // }
        //   fTaxArr = getFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($('.total_gross_wages').val())) + parseFloat(convertNumber($('.overtime_total').val()))).toFixed(2));

        var $totalAmounttocount = 0;
        if ($('.total_gross_wages').val()) {
            if (convertNumber($('.total_gross_wages').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
            }
        }
        if ($('.overtime_total').val()) {
            if (convertNumber($('.overtime_total').val()) > 0) {
                //$totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.overtime_total').val()));
                $totalAmounttocount = parseFloat((parseFloat($totalAmounttocount)) + (parseFloat(convertNumber($('.overtime_total').val()))));
            }
        }
        //console.log($totalAmounttocount)
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));

        usTaxCalculate();
    });
    
    $('.vacation_rate, .vacation_hours').on('keyup', function (event) {
        // if(auto_calculations == 'on') {
        var rate = convertNumber($('.vacation_rate').val());
        var hours = convertNumber($('.vacation_hours').val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.vacation_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.vacation_total').val(default_currency +currency_seperator+ addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        // }
        //   fTaxArr = getFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($('.total_gross_wages').val())) + parseFloat(convertNumber($('.vacation_total').val()))).toFixed(2));

        var $totalAmounttocount = 0;
        if ($('.total_gross_wages').val()) {
            if (convertNumber($('.total_gross_wages').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
            }
        }
        if ($('.vacation_total').val()) {
            if (convertNumber($('.vacation_total').val()) > 0) {
                //$totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.vacation_total').val()));
                $totalAmounttocount = parseFloat((parseFloat($totalAmounttocount)) + (parseFloat(convertNumber($('.vacation_total').val()))));
            }
        }
        //console.log($totalAmounttocount)
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));

        usTaxCalculate();
    });
    
    $('.bonus_rate, .bonus_hours').on('keyup', function (event) {
        // if(auto_calculations == 'on') {
        var rate = convertNumber($('.bonus_rate').val());
        var hours = convertNumber($('.bonus_hours').val());
        if (!isNaN(parseFloat(rate)) && !isNaN(parseFloat(hours))) {
            $('.bonus_total').val(default_currency +currency_seperator+ addCommas(parseFloat(convertNumber((parseFloat(rate) * parseFloat(hours)).toFixed(2)))));
        } else {
            $('.bonus_total').val(default_currency + currency_seperator+ addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
        }
        // }
        //   fTaxArr = getFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($('.total_gross_wages').val())) + parseFloat(convertNumber($('.bonus_total').val()))).toFixed(2));

        var $totalAmounttocount = 0;
        if ($('.total_gross_wages').val()) {
            if (convertNumber($('.total_gross_wages').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
            }
        }
        if ($('.bonus_total').val()) {
            if (convertNumber($('.bonus_total').val()) > 0) {
                //$totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.bonus_total').val()));
                $totalAmounttocount = parseFloat((parseFloat($totalAmounttocount)) + (parseFloat(convertNumber($('.bonus_total').val()))));
            }
        }
        //console.log($totalAmounttocount)
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));

        usTaxCalculate();
    });

    $('.total_gross_wages, .overtime_total').on('keyup', function (event) {
        if (auto_calculations == 'on') {
            var gross_total = convertNumber($('.total_gross_wages').val());
            var overtime_total = convertNumber($('.overtime_total').val());
            if (isNaN(parseFloat(gross_total)) && isNaN(parseFloat(overtime_total))) {
                $('.total_gross_wages').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
                $('.overtime_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            } else if (isNaN(parseFloat(gross_total))) {
                $('.total_gross_wages').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            } else if (isNaN(parseFloat(overtime_total))) {
                $('.overtime_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber(parseInt(0) * parseInt(0)))));
            }
        }
        //fTaxArr = getFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), (parseFloat(convertNumber($('.total_gross_wages').val())) + parseFloat(convertNumber($('.overtime_total').val()))).toFixed(2));

        var $totalAmounttocount = 0;
        if ($('.total_gross_wages').val()) {
            if (convertNumber($('.total_gross_wages').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
            }
        }
        if ($('.overtime_total').val()) {
            if (convertNumber($('.overtime_total').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.overtime_total').val()));
            }
        }
        //console.log($totalAmounttocount)
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));

        usTaxCalculate();
        update_dataUSA_defaultAndBlue();
    });
    // USA CALCULATION END

    var title_text, country, paystubCountryAjax;
    $('.main-div-wrap, .paystub-top-section').hide();
//    $('#us_infotable').show();
    $('.toggle-paystub').unbind('click');
    $('.toggle-paystub').click(function (e) {
        // e.preventDefault();
        $('.main-div-wrap').hide();
        $('.main-div-wrap').removeClass('active');
        $('.paystub-top-section').show();
        var div_id = $(this).attr('href');
        title_text = 'USA Paystub';
        if (div_id == '#us_infotable') {
            
            title_text = 'US Paystub';
            country = 'USA';
            $('.choose-currency').val('$');
            var CurrentSelectedUsTemplate = $('.us__template__selection').val();

            $(".us__template").each(function (index, element) {
                if ($(element).attr('id') == CurrentSelectedUsTemplate) {
                    $(element).show();
                    showStubPeriods($('.choose-stub-periods').val(), CurrentSelectedUsTemplate)
                } else {
                    $(element).hide();
                }
            });
        } else if (div_id == '#uk_infotable') {
            title_text = 'UK Paystub';
            country = 'UK';
            $('.choose-currency').val('£');
            default_currency = $('.choose-currency').val();
            $(".input_decimal").not('.without_currency').maskMoney({prefix: default_currency + currency_seperator});
            $(".input_decimal").not('.without_currency').maskMoney('mask');
            // $(".without_currency").maskMoney('destroy');
            // $(".without_currency").maskMoney();
        } else if (div_id == '#canada_infotable') {
            title_text = 'Canada Paystub';
            country = 'CANADA';
             $('.choose-currency').val('$');
        } else if (div_id == '#global_infotable') {
            title_text = 'Global Paystub';
            country = 'Global';
             $('.choose-currency').val('$');
        }
        if (paystubCountryAjax) {
            paystubCountryAjax.abort();
        }
        paystubCountryAjax = $.ajax({
            url: base_url + 'paystub/paystubCountry',
            method: 'POST',
            data: {'country': country},
            success: function (result) {
                var data = JSON.parse(result);
                if (data.error == 'true') {

                } else {

                }
            },
            error: function () {
                window.location.reload();
            }
        });
        $('.main-title').text(title_text);
        $(div_id).show();
        $(div_id).addClass('active');
        $('#myCarousel').hide();
    });

    if (paystub_country != '') {
        $('.' + paystub_country + '_paystub').trigger('click');
    }
    /*
     Fullscreen background
     */
//    $.backstretch(base_url+"assets/img/backgrounds/1.jpg");

    /*
     Login form validation
     */
    $("#login_form").validate({
        rules: {
            identity: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            identity: "Please, Enter Username/Email.",
            password: "Please, Enter Password."
        }
    });

    /*
     Registration form validation
     */
    $("#registration-form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                minlength: 5
            },
            password_confirm: {
                equalTo: "#password"
            }
        },
        messages: {
            first_name: "Please, Enter First Name.",
            last_name: "Please, Enter Last Name.",
            email: {
                'required': "Please, Enter Email.",
                'email': "Please, Enter Valid Email."
            },
            password: {
                'minlength': "Password must at least 5 character long."
            },
            password_confirm: {
                equalTo: 'Confirm password doesn\'t match.'
            }
        }
    });

    /*
     US Paystub Form form validation
     */
    $("#us_paystub_form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            company_name: {
                required: true,
            },
            address_line1: {
                required: true,
            },
            employee_name: {
                required: true,
            },
            e_address_line1: {
                required: true,
            },
            ssn: {
                required: true,
            },
            pay_period: {
                required: true,
            },
            pay_date: {
                required: true,
            },
        },
        messages: {
            email: {
                required: 'Email Address Required.',
                email: "Please, Enter Valid Email."
            },
            company_name: 'Company Name Required',
            address_line1: 'Company Address Required',
            employee_name: 'Employee Name Required',
            e_address_line1: 'Employee Address Required',
            ssn: 'SSN Number Required',
            pay_period: 'Select Pay Period',
            pay_date: 'Select Pay Date'
        }
    });
    $("#usa_template_2").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: 'Email Address Required.',
                email: "Please, Enter Valid Email."
            }
        }
    });
    $("#usa_template_3").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: 'Email Address Required.',
                email: "Please, Enter Valid Email."
            }
        }
    });
    $(".contact_form_submit").on("click", function (event) {
        event.preventDefault();
        $("#contact_form").validate({
            rules: {
                contact_name: {
                    required: true
                },
                contact_email: {
                    required: true,
                    email: true
                },
                contact_no: {
                    required: true
                },
                contact_question: {
                    required: true
                }
            },
            messages: {
                contact_name: "Please enter your name.",
                contact_email: {
                    required: 'Please enter your email',
                    email: "Please enter valid email format."
                },
                contact_no: "Please enter your number",
                contact_question: "Please enter your question"
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {

                var placement = $(element).data('error');

                if (placement) {

                    $(placement).append(error);

                } else {
                    error.insertAfter(element);
                }
            }
        });
        if (grecaptcha.getResponse() == "") {
            $(".captchaerror").show();
        } else {
            if ($("#contact_form").valid()) {
                $(".captchaerror").hide();
                $("#contact_form").submit();
            }
        }
    });


    $('.btn-new-subscription').unbind('click');
    $('.btn-new-subscription').click(function (e) {
        e.preventDefault();
        $("#new-subscription-form").validate({
            rules: {
                'subscriptionPlan': "required"
            },
            messages: {
                'subscriptionPlan': "Please select Subscription Plan."
            }
        });
        $('#new-subscription-form').submit();
    });

    $(".submit_form").unbind('click');
    $(".submit_form").click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var formID = $(this).data('formid');
        $(this).attr('disabled', 'disabled');
        $('#paystub_form_data').val($('#' + formID).serialize());
        $.ajax({
            url: base_url + 'paystub/checkUserSubscription',
            method: 'GET',
            success: function (result) {
                var data = JSON.parse(result);
                if (data.error == 'true') {
                    setTimeout(function () {
                        $this.removeAttr('disabled');
                    }, 100);

                    $('#subscription_modal').modal('show');
                    return false;
                } else {
                    $('#' + formID).submit();
                    setTimeout(function () {
                        $this.removeAttr('disabled');
                    }, 100);
                }
            },
            error: function () {
                window.location.reload();
            }
        });

    });

    $(".nosignup_submit_form").unbind('click');
    $(".nosignup_submit_form").click(function (e) {
        e.preventDefault();
        var formID = $(this).data('formid');
        $('#paystub_form_data').val($('#' + formID).serialize());
        $.ajax({
            url: base_url + 'paystub/subscribe_offers',
            method: 'POST',
            data: {'paystub_form_data': $('#' + formID).serialize()},
            success: function (result) {
                var data = JSON.parse(result);
                if (data.error == 'true') {
                    $('.info_message').text('Data Not Submitted. Please, Try Again.');
                    $('#info_message_model').modal('show');
                    return false;
                } else {
                    window.location.href = base_url + 'paystub/subscribe_offers';
                }
            },
            error: function () {
                window.location.reload();
            }
        });
    });

    $(".paypal_pay").unbind('click');
    $(".paypal_pay").click(function (e) {
        e.preventDefault();
        var subscriptionID = $(this).data('id');

        $.ajax({
            url: base_url + 'paystub/paypal_pay',
            method: 'POST',
            data: {'subscriptionID': subscriptionID},
            success: function (result) {
                var data = JSON.parse(result);
                if (data.error == 'true') {
                    return false;
                } else {
                    window.location.href = base_url + 'paypal';
                }
            },
            error: function () {
                window.location.reload();
            }
        });
    });

    $(document).unbind('click', '.track_offer_btn');
    $(document).on('click', '.track_offer_btn', function () {

        var offerID = $(this).data('id');
        $.ajax({
            url: base_url + 'paystub/add_offer_track',
            method: 'POST',
            data: {'offerID': offerID},
            success: function (result) {
                var data = JSON.parse(result);
                if (data.error == 'true') {

                } else {

                }
            },
            error: function () {
                window.location.reload();
            }
        });
    });

    $(".active_deactive_user").unbind('click');
    $(".active_deactive_user").click(function (e) {
        e.preventDefault();
        var txt = $(this).text().toLowerCase();
        var user_id = $(this).data('id');
        $('.yes-deactive').attr('data-id', user_id);
        if (txt == 'active') {
            $('.yes-deactive').attr('data-status', 'active');
            $('.active_deactive_info_msg').text('You want to de-active user?');
        } else {
            $('.yes-deactive').attr('data-status', 'inactive');
            $('.active_deactive_info_msg').text('You want to active user again?');
        }
        $('#active_deactive_user_model').modal('show');
        return false;
    });

    $(".yes-deactive").unbind('click');
    $(".yes-deactive").click(function (e) {
        e.preventDefault();
        var user_id = $(this).data('id');
        var user_status = $(this).data('status');
        var url;
        if (user_status == 'active') {
            url = base_url + 'auth/deactivate_ajax';
        } else {
            url = base_url + 'auth/activate_ajax';
        }
        $.ajax({
            url: url,
            method: 'POST',
            data: {user_id: user_id},
            success: function (result) {
                var data = JSON.parse(result);
                if (data.error == 'true') {
                    $('.info_message').text(data.message);
                    $('#active_deactive_user_model').modal('hide');
                    $('#info_message_model').modal('show');
                    window.location.reload();
                } else {
                    window.location.reload();
                }
            },
            error: function () {
                window.location.reload();
            }
        });
    });

    $(".add_user_subscription").unbind('click');
    $(".add_user_subscription").click(function (e) {
        e.preventDefault();
        $('#add_admin_subscription_modal').modal('show');
        $('.direct_user_id').val($(this).data('id'));
    });

    $(".btn-new-direct-subscription").unbind('click');
    $(".btn-new-direct-subscription").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'admin/addDirectSubscription',
            method: 'POST',
            data: $('#new-direct-subscription-form').serialize(),
            success: function (result) {
                var data = JSON.parse(result);
                $('.info_message').text(data.message);
                $('#add_admin_subscription_modal').modal('hide');
                $('#info_message_model').modal('show');
                if (data.error == 'true') {

                } else {

                }
            },
            error: function () {
                window.location.reload();
            }
        });
    });

    $(".view_user_subscription").unbind('click');
    $(".view_user_subscription").click(function (e) {
        var user_id = $(this).data('id');
        e.preventDefault();
        $.ajax({
            url: base_url + 'admin/listUserSubscription',
            method: 'POST',
            data: {'user_id': user_id},
            success: function (result) {
                var data = JSON.parse(result);
                $('.subscription-lists').empty();
                if (data.error == 'true') {
                    $('.info_message').text(data.message);
                    $('#info_message_model').modal('show');
                } else {
                    $('.subscription-lists').html(data.html);
                    $('#view_subscription_model').modal('show');
                }
            },
            error: function () {
                window.location.reload();
            }
        });
    });

    /*
     Add Offer Form form validation
     */

    $('.active_user_message').on('click', function () {
        $("#active_users").validate({
            rules: {
                user_message: {
                    required: true
                },
                message_subject: {
                    required: true
                }
            },
            messages: {
                message_subject: 'Please enter message subject',
                user_message: 'Please enter your message'
            }
        });
    });

    /*
     Edit Offer Form form validation
     */


    $(".active_deactive_offer").unbind('click');
    $(".active_deactive_offer").click(function (e) {
        e.preventDefault();
        var txt = $(this).text().toLowerCase();
        var offer_id = $(this).data('id');
        $('.yes-deactive-offer').attr('data-id', offer_id);
        if (txt == 'yes') {
            $('.yes-deactive-offer').attr('data-status', 'active');
            $('.active_deactive_offer_info_msg').text('You want to de-active offer?');
        } else {
            $('.yes-deactive-offer').attr('data-status', 'inactive');
            $('.active_deactive_offer_info_msg').text('You want to active offer again?');
        }
        $('#active_deactive_offer_model').modal('show');
        return false;
    });

    $(".yes-deactive-offer").unbind('click');
    $(".yes-deactive-offer").click(function (e) {
        e.preventDefault();
        var offer_id = $(this).data('id');
        var offer_status = $(this).data('status');
        $.ajax({
            url: base_url + 'admin/active_deactive_offer',
            method: 'POST',
            data: {offer_id: offer_id, offer_status: offer_status},
            success: function (result) {
                var data = JSON.parse(result);
                if (data.error == 'true') {
                    $('.info_message').text(data.message);
                    $('#active_deactive_user_model').modal('hide');
                    $('#info_message_model').modal('show');
                    window.location.reload();
                } else {
                    window.location.reload();
                }
            },
            error: function () {
                window.location.reload();
            }
        });
    });
    if (!$("#subscriptions_table").find("tbody>tr.empty_table").length) {
        $('#subscriptions_table').DataTable({
            "order": [[3, "desc"]]
        });
    }
    if ($("#payments_table").find("tbody>tr.empty_table").length) {
        $('#payments_table').DataTable({
            "order": [],
            "columnDefs": [{orderable: false, targets: [0, 1]}]
        });
    }







    setTimeout(function () {
        $('.matchHeight').matchHeight();
        $('.matchHeight_val').val($('.matchHeight').height());
    }, 4000);








    // Ripple
    $('[data-ripple]').on('click', function (e) {
        var rippleDiv = $('<div class="ripple" />'),
                rippleSize = 60,
                rippleOffset = $(this).offset(),
                rippleY = e.pageY - rippleOffset.top,
                rippleX = e.pageX - rippleOffset.left,
                ripple = $('.ripple');

        rippleDiv.css({
            top: rippleY - (rippleSize / 2),
            left: rippleX - (rippleSize / 2),
            background: $(this).attr("data-ripple-color")
        }).appendTo($(this));

        window.setTimeout(function () {
            rippleDiv.remove();
        }, 1900);
    });

    $('#offer_geo_code').select2();

});

function calculateTaxinNEWustemplate($scopeOfTemplate,$data,$calculate_data,cls) {
    
    if($scopeOfTemplate != 'usa_template_3' && $scopeOfTemplate != 'usa_template_4' && $scopeOfTemplate != 'usa_template_5'){
        return false;    
    }
    
    if (auto_calculations == 'on') {
        
       
        /*var FirstMonthOfYear;
        FirstMonthOfYear = new Date();
        FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
        var inputdate = new Date($('.inputdatepicker', $("#" + $scopeOfTemplate)).val());
        var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
        var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);

        var currentWeek = Math.ceil(dayOfYear / 7);*/
        
        var inputdate = new Date($('.inputdatepicker', $("#" + $scopeOfTemplate)).val());
        d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
        d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
        var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
        var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
        var currentWeek =  weekNo;
                

        if (pay_days == '52') {
            current_month = currentWeek;
        } else if (pay_days == '26') {
            current_month = (currentWeek / 2);
        } else if (pay_days == '12') {
            current_month = old_current_month;
        } else if (pay_days == '6') {
            current_month = Math.floor(old_current_month / 2);
        } else if (pay_days == '1') {
            current_month = 1;
        }
        
        $('.'+cls, $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((convertNumber($data.toString()) * current_month.toString()).toFixed(2)))));
    }


}

function calculateTaxinustemplate($scopeOfTemplate) {
    
    if (auto_calculations == 'on') {
        
       // console.log('__debug__');
       // console.log($scopeOfTemplate);
        //usa_template_2
        
       
        /*var FirstMonthOfYear;
        FirstMonthOfYear = new Date();
        FirstMonthOfYear = new Date(FirstMonthOfYear.getFullYear(), 0, 1);
        var inputdate = new Date($('.inputdatepicker', $("#" + $scopeOfTemplate)).val());
        var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
        var dayOfYear = ((today - FirstMonthOfYear + 1) / 86400000);

        var currentWeek = Math.ceil(dayOfYear / 7);*/
        
        var inputdate = new Date($('.inputdatepicker', $("#" + $scopeOfTemplate)).val());
        d = new Date(Date.UTC(inputdate.getFullYear(),inputdate.getMonth(), inputdate.getDate()));
        d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
        var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
        var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
        var currentWeek =  weekNo;

        if (pay_days == '52') {
            current_month = currentWeek;
        } else if (pay_days == '26') {
            current_month = (currentWeek / 2);
        } else if (pay_days == '12') {
            current_month = old_current_month;
        } else if (pay_days == '6') {
            current_month = Math.floor(old_current_month / 2);
        } else if (pay_days == '1') {
            current_month = 1;
        }
        
        

        if ($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).length > 0) {
            if (convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()) > 0) {
                fedaRalTax = nCheck((parseFloat((parseFloat(convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()))).toFixed(2)) - fTaxArr.subtract) * fTaxArr.rate);
            } else {
                fedaRalTax = 0;
            }

        } else {
            fedaRalTax = 0;
        }

        if (is_contractor == true) {
            
             if('usa_template_2' == $scopeOfTemplate){
                 console.log("s1")
                $('.usa__federal__tax__monthly,.usa__federal__tax__ytd,.usa__statetax__monthly,usa__statetax__ytd,.usa__sdi__monthly,.usa__sdi__ytd,.usa__socsec__monthly,.usa__socsec__ytd', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + '0.00');
             }else{
                  console.log("s2")
                $('.usa__federal__tax__monthly,.usa__federal__tax__ytd,.usa__statetax__monthly,usa__statetax__ytd,.usa__sdi__monthly,.usa__sdi__ytd,.usa__socsec__monthly,.usa__socsec__ytd,.usa__hit__monthly,.usa__hit__ytd', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + '0.00');    
             }
            
        } else {
            
            if (convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()) > 0) {
                 console.log("a "+fedaRalTax)
                $(".usa__federal__tax__monthly", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((fedaRalTax).toFixed(2)))));
                $(".usa__statetax__monthly", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((((convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()))) * convertNumber($('.choose-state').val()) / 100).toFixed(2)))));
                $(".usa__socsec__monthly", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((((convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()))) * NewSocialSecurityTax / 100).toFixed(2)))));
                
                if('usa_template_2' != $scopeOfTemplate){
                    $(".usa__hit__monthly", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((((convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()))) * medicare / 100).toFixed(2)))));
                }
                
                if ($('.usa__sdi__monthly', $("#" + $scopeOfTemplate)).length > 0) {
                    $(".usa__sdi__monthly", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()))) * SDI / 100).toFixed(2)))));
                }
                if ($('.usa__ficamed__monthly', $("#" + $scopeOfTemplate)).length > 0) {
                    $('.usa__ficamed__monthly', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()))) * NewMedicareTax / 100).toFixed(2)))));
                }
                $('.usa__currenttotal', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((parseFloat(convertNumber($('.usa__regular__earnings_total', $("#" + $scopeOfTemplate)).val()))).toFixed(2)))));
            } else {
                
                 console.log("s4")
                $(".usa__federal__tax__monthly", $("#" + $scopeOfTemplate)).val('');
                $(".usa__statetax__monthly", $("#" + $scopeOfTemplate)).val('');
                $(".usa__socsec__monthly", $("#" + $scopeOfTemplate)).val('');
                
                if('usa_template_2' != $scopeOfTemplate){
                    $(".usa__hit__monthly", $("#" + $scopeOfTemplate)).val('');    
                }
                
                
                if ($('.usa__sdi__monthly', $("#" + $scopeOfTemplate)).length > 0) {
                    $(".usa__sdi__monthly", $("#" + $scopeOfTemplate)).val('');
                }
                if ($('.usa__ficamed__monthly', $("#" + $scopeOfTemplate)).length > 0) {
                    $('.usa__ficamed__monthly', $("#" + $scopeOfTemplate)).val('');
                }
                $('.usa__currenttotal', $("#" + $scopeOfTemplate)).val('');
            }
            
            if ($('.usa__sdi__monthly', $("#" + $scopeOfTemplate)).length > 0) {
                if (convertNumber($('.usa__federal__tax__monthly', $("#" + $scopeOfTemplate)).val()) > 0) {
                    $(".usa__sdi__ytd", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__sdi__monthly', $("#" + $scopeOfTemplate)).val()))) * current_month).toFixed(2)))));
                } else {
                    $(".usa__sdi__ytd", $("#" + $scopeOfTemplate)).val('');
                }
            }
            
            if (convertNumber($('.usa__federal__tax__monthly', $("#" + $scopeOfTemplate)).val()) > 0) {
                $(".usa__federal__tax__ytd", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__federal__tax__monthly', $("#" + $scopeOfTemplate)).val()))) * current_month).toFixed(2)))));
            } else {
                $(".usa__federal__tax__ytd", $("#" + $scopeOfTemplate)).val('');
            }
            if (convertNumber($('.usa__statetax__monthly', $("#" + $scopeOfTemplate)).val()) > 0) {
                $(".usa__statetax__ytd", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__statetax__monthly', $("#" + $scopeOfTemplate)).val()))) * current_month).toFixed(2)))));
            } else {
                $(".usa__statetax__ytd ", $("#" + $scopeOfTemplate)).val('');
            }
            if (convertNumber($('.usa__socsec__monthly', $("#" + $scopeOfTemplate)).val()) > 0) {
                $(".usa__socsec__ytd", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__socsec__monthly', $("#" + $scopeOfTemplate)).val()))) * current_month).toFixed(2)))));
            } else {
                $(".usa__socsec__ytd", $("#" + $scopeOfTemplate)).val('');
            }
            if (convertNumber($('.usa__hit__monthly', $("#" + $scopeOfTemplate)).val()) > 0 && 'usa_template_2' != $scopeOfTemplate) {
                $(".usa__hit__ytd", $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__hit__monthly', $("#" + $scopeOfTemplate)).val()))) * current_month).toFixed(2)))));
            } else {
                $(".usa__hit__ytd", $("#" + $scopeOfTemplate)).val('');
            }

            if ($('.usa__ficamed__ytd', $("#" + $scopeOfTemplate)).length) {
                if (convertNumber($('.usa__ficamed__monthly', $("#" + $scopeOfTemplate)).val()) > 0) {
                    $('.usa__ficamed__ytd', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((parseFloat(convertNumber($('.usa__ficamed__monthly', $("#" + $scopeOfTemplate)).val()))) * current_month).toFixed(2)))));
                } else {
                    $('.usa__ficamed__ytd', $("#" + $scopeOfTemplate)).val('');
                }
            }
        }

        var TotalDectionoftax = 0;
        if ($(".usa__federal__tax__monthly", $("#" + $scopeOfTemplate)).length > 0) {
            TotalDectionoftax = TotalDectionoftax + parseFloat(convertNumber($(".usa__federal__tax__monthly", $("#" + $scopeOfTemplate)).val()));
        }
        if ($(".usa__statetax__monthly", $("#" + $scopeOfTemplate)).length > 0) {
            TotalDectionoftax = TotalDectionoftax + parseFloat(convertNumber($(".usa__statetax__monthly", $("#" + $scopeOfTemplate)).val()));
        }
        if ($(".usa__sdi__monthly", $("#" + $scopeOfTemplate)).length > 0) {
            TotalDectionoftax = TotalDectionoftax + parseFloat(convertNumber($(".usa__sdi__monthly", $("#" + $scopeOfTemplate)).val()));
        }
        if ($(".usa__socsec__monthly", $("#" + $scopeOfTemplate)).length > 0) {
            TotalDectionoftax = TotalDectionoftax + parseFloat(convertNumber($(".usa__socsec__monthly", $("#" + $scopeOfTemplate)).val()));
        }
        if ($(".usa__hit__monthly", $("#" + $scopeOfTemplate)).length > 0  && 'usa_template_2' != $scopeOfTemplate) {
            TotalDectionoftax = TotalDectionoftax + parseFloat(convertNumber($(".usa__hit__monthly", $("#" + $scopeOfTemplate)).val()));
        }
        if ($(".usa__ficamed__monthly", $("#" + $scopeOfTemplate)).length > 0) {
            TotalDectionoftax = TotalDectionoftax + parseFloat(convertNumber($(".usa__ficamed__monthly", $("#" + $scopeOfTemplate)).val()));
        }
        //   if (TotalDectionoftax > 0) {
        $('.usa__currentdeduction', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(TotalDectionoftax.toFixed(2)))));
//        } else {
//            $('.usa__currentdeduction', $("#" + $scopeOfTemplate)).val('');
//        }

        //    if (convertNumber($('.usa__currenttotal', $("#" + $scopeOfTemplate)).val()) > 0 && convertNumber($('.usa__currentdeduction', $("#" + $scopeOfTemplate)).val()) > 0) {
        $('.usa__netpay', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber(((convertNumber($('.usa__currenttotal', $("#" + $scopeOfTemplate)).val())) - parseFloat(convertNumber($('.usa__currentdeduction', $("#" + $scopeOfTemplate)).val()))).toFixed(2)))));
//        } else {
//            $('.usa__netpay', $("#" + $scopeOfTemplate)).val('');
//        }
        if (convertNumber($('.usa__currenttotal', $("#" + $scopeOfTemplate)).val()) > 0) {
            $('.usa__ytdgrosspay', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber($('.usa__currenttotal', $("#" + $scopeOfTemplate)).val()) * current_month).toFixed(2)))));
        } else {
            $('.usa__ytdgrosspay', $("#" + $scopeOfTemplate)).val('');
        }
        //if (convertNumber($('.usa__currentdeduction', $("#" + $scopeOfTemplate)).val()) > 0) {
        $('.usa__ytddeduction', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber($('.usa__currentdeduction', $("#" + $scopeOfTemplate)).val()) * current_month).toFixed(2)))));
//        } else {
//            $('.usa__ytddeduction', $("#" + $scopeOfTemplate)).val('');
//        }
//        if (convertNumber($('.usa__netpay', $("#" + $scopeOfTemplate)).val()) > 0) {
        $('.usa__ytdnetpay', $("#" + $scopeOfTemplate)).val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber($('.usa__netpay', $("#" + $scopeOfTemplate)).val()) * current_month).toFixed(2)))));
//        } else {
//            $('.usa__ytdnetpay', $("#" + $scopeOfTemplate)).val('');
//        }

    }


}


function usTaxCalculate() {

    if (auto_calculations == 'on') {
        var onejan;
        onejan = new Date();
        onejan = new Date(onejan.getFullYear(), 0, 1);
        var inputdate = new Date($('.inputdatepicker').val());
        var today = new Date(inputdate.getFullYear(), inputdate.getMonth(), inputdate.getDate());
        var dayOfYear = ((today - onejan + 1) / 86400000);

        var currentWeek = Math.ceil(dayOfYear / 7);

        if (pay_days == '52') {
            current_month = currentWeek;
        } else if (pay_days == '26') {
            current_month = (currentWeek / 2);
        } else if (pay_days == '12') {
            current_month = old_current_month;
        } else if (pay_days == '6') {
            current_month = Math.floor(old_current_month / 2);
        } else if (pay_days == '1') {
            current_month = 1;
        }

//        fTax = ((fTaxArr.subtract)*fTaxArr.rate);
        var $totalTaxtopay = 0.00;
        if (convertNumber($('.total_gross_wages').val()) > 0) {
            $totalTaxtopay = $totalTaxtopay + parseFloat(convertNumber($('.total_gross_wages').val()));
        }
        if (convertNumber($('.overtime_total').val()) > 0) {
            $totalTaxtopay = $totalTaxtopay + parseFloat(convertNumber($('.overtime_total').val()));
        }
        if (convertNumber($('.vacation_total').val()) > 0) {
            $totalTaxtopay = $totalTaxtopay + parseFloat(convertNumber($('.vacation_total').val()));
        }
        if (convertNumber($('.bonus_total').val()) > 0) {
            $totalTaxtopay = $totalTaxtopay + parseFloat(convertNumber($('.bonus_total').val()));
        }
        if ($('.total_gross_wages').length > 0) {
            fTax = nCheck((parseFloat($totalTaxtopay - fTaxArr.subtract) * fTaxArr.rate).toFixed(2));
        } else {
            fTax = 0.00;
        }

        if (is_contractor == true) {
            $('.fica_med_c_total, .fica_ss_c_total, .fed_c_total, .st_c_total, .fica_med_y_to_d, .fica_ss_y_to_d, .fed_y_to_d, .st_y_to_d').val(default_currency + currency_seperator + '0.00');
        } else {
            if (fTax > 0) {
                $('.fed_c_total').val(default_currency +currency_seperator+ addCommas(parseFloat(convertNumber(fTax))));
            } else {
                $('.fed_c_total').val('');
            }
            if ($totalTaxtopay > 0) {
                $('.fica_med_c_total').val(default_currency + currency_seperator + addCommas(convertNumber((parseFloat($totalTaxtopay) * medicare / 100).toFixed(2))));
                $('.fica_ss_c_total').val(default_currency + currency_seperator + addCommas(convertNumber((parseFloat($totalTaxtopay) * NewSocialSecurityTax / 100).toFixed(2))));
                //        $('.fed_c_total').val(default_currency+currency_seperator+((parseFloat(convertNumber($('.total_gross_wages').val())) + parseFloat(convertNumber($('.overtime_total').val()))) * federal / 100).toFixed(2));
                // OLD //$('.st_c_total').val(default_currency + currency_seperator + addCommas(parseFloat(convertNumber((parseFloat($totalTaxtopay) * convertNumber($('.choose-state').val()) / 100).toFixed(2)))));
                $('.st_c_total').val(default_currency + currency_seperator + addCommas(convertNumber((parseFloat($totalTaxtopay) * convertNumber($('.choose-state').val()) / 100).toFixed(2))));
            } else {
                $('.fica_med_c_total').val('');
                $('.fica_ss_c_total').val('');
                //        $('.fed_c_total').val('');
                $('.st_c_total').val('');
            }
            if (convertNumber($('.fica_med_c_total').val()) > 0) {
                $('.fica_med_y_to_d').val(default_currency + currency_seperator + addCommas(convertNumber((convertNumber($('.fica_med_c_total').val()) * current_month).toFixed(2))));
            } else {
                $('.fica_med_y_to_d').val('');
            }
            if (convertNumber($('.fica_ss_c_total').val()) > 0) {
                $('.fica_ss_y_to_d').val(default_currency + currency_seperator + addCommas(convertNumber((convertNumber($('.fica_ss_c_total').val()) * current_month).toFixed(2))));
            } else {
                $('.fica_ss_y_to_d').val('');
            }
            if (convertNumber($('.fed_c_total').val()) > 0) {
                $('.fed_y_to_d').val(default_currency + currency_seperator + addCommas(convertNumber((convertNumber($('.fed_c_total').val()) * current_month).toFixed(2))));
            } else {
                $('.fed_y_to_d').val('');
            }
            if (convertNumber($('.st_c_total').val()) > 0) {
                $('.st_y_to_d').val(default_currency + currency_seperator + addCommas(convertNumber((convertNumber($('.st_c_total').val()) * current_month).toFixed(2))));
            } else {
                $('.st_y_to_d').val('');
            }
        }
        var TotalDeduction = 0;
        if (convertNumber($('.fica_med_c_total').val()) > 0) {
            TotalDeduction = TotalDeduction + parseFloat(convertNumber($('.fica_med_c_total').val()));
        }
        if (convertNumber($('.fica_ss_c_total').val()) > 0) {
            TotalDeduction = TotalDeduction + parseFloat(convertNumber($('.fica_ss_c_total').val()));
        }
        if (convertNumber($('.fed_c_total').val()) > 0) {
            TotalDeduction = TotalDeduction + parseFloat(convertNumber($('.fed_c_total').val()));
        }
        if (convertNumber($('.st_c_total').val()) > 0) {
            TotalDeduction = TotalDeduction + parseFloat(convertNumber($('.st_c_total').val()));
        }
        if ($totalTaxtopay > 0) {
            $('.current_total').val(default_currency + currency_seperator + addCommas((convertNumber((parseFloat($totalTaxtopay)).toFixed(2)))));
        } else {
            $('.current_total').val('');
        }
        // if (TotalDeduction > 0) {
        $('.current_deduction').val(default_currency + currency_seperator + addCommas((convertNumber((parseFloat(TotalDeduction)).toFixed(2)))));
//        } else {
//            $('.current_deduction').val('');
//        }
        var CurrentTotal = 0;
        if (convertNumber($('.current_total').val()) > 0) {
            CurrentTotal = CurrentTotal + parseFloat(convertNumber($('.current_total').val()));
        }
        var CurrentDeduction = 0;
        if (convertNumber($('.current_deduction').val()) > 0) {
            CurrentDeduction = CurrentDeduction + parseFloat(convertNumber($('.current_deduction').val()));
        }
        if (CurrentTotal > 0) {
            $('.net_pay').val(default_currency + currency_seperator + addCommas((convertNumber((parseFloat(CurrentTotal) - parseFloat(CurrentDeduction)).toFixed(2)))));
        } else {
            $('.net_pay').val('');
        }
        if (convertNumber($('.current_total').val()) > 0) {
            $('.ytd_gross').val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber($('.current_total').val()) * current_month).toFixed(2)))));
        } else {
            $('.ytd_gross').val('');
        }
        //    if (convertNumber($('.current_deduction').val()) > 0) {
        $('.ytd_deduction').val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber($('.current_deduction').val()) * current_month).toFixed(2)))));
        //  } else {
        //      $('.ytd_deduction').val('');
        //  }
        if (convertNumber($('.net_pay').val()) > 0) {
            $('.ytd_net_pay').val(default_currency + currency_seperator + addCommas((convertNumber((convertNumber($('.net_pay').val()) * current_month).toFixed(2)))));
        } else {
            $('.ytd_net_pay').val('');
        }



    }
}

function calculatePayPeriodDate(date, $scopeofoform) {

    var a = new Array;
    a[52] = 7, a[26] = 14, a[12] = 30, a[6] = 61, a[1] = 365;
    if ((date == '' || date == null) || date == undefined) {
        date = new Date($('.inputdatepicker', $('#' + $scopeofoform)).val());
    }
    var inputdate = date;
    var endMonth = (inputdate.getMonth());
    var endYear = inputdate.getFullYear();
    var days;
    if (pay_days == '30') {
        days = Math.round(((new Date(endYear, endMonth)) - (new Date(endYear, endMonth - 1))) / 86400000);
    } else {
        days = a[pay_days];
    }
    var endDate = (inputdate.setDate(inputdate.getDate() - 1),
            (inputdate.getMonth() + 1 + "/" + inputdate.getDate() + "/" + inputdate.getFullYear()));

    var startDate = (inputdate.setDate(inputdate.getDate() - days + 1),
            (inputdate.getMonth() + 1 + "/" + inputdate.getDate() + "/" + inputdate.getFullYear()));
    if ($scopeofoform == 'usa_template_3') {
        $('input[name="start_date"]', $('#' + $scopeofoform)).datepicker('setDate', new Date(startDate));
        $('input[name="end_date"]', $('#' + $scopeofoform)).datepicker('setDate', new Date(endDate));
    } else {
        $('.inputdaterangepicker', $('#' + $scopeofoform)).daterangepicker({
            startDate: startDate,
            endDate: endDate,
//        minDate: startDate,
            maxDate: endDate
        }, function (start, end, label) {
            $('.inputdatepicker', $('#' + $scopeofoform)).datepicker('setStartDate', new Date(end));
        });
    }
    var newFedaralPayDate, newFedaralStartPayPeriod, newFedaralEndPayPeriod;
    for (var extraFedaralTax = 2; extraFedaralTax <= totalUSPayStub; extraFedaralTax++) {

        if (newFedaralPayDate != '' && newFedaralStartPayPeriod != '' && newFedaralEndPayPeriod != '' && newFedaralPayDate != undefined && newFedaralStartPayPeriod != undefined && newFedaralEndPayPeriod != undefined) {
            var newDate = new Date(newFedaralStartPayPeriod);
            var newEndDate = new Date(newFedaralEndPayPeriod);
        } else {
            var newDate = new Date(startDate);
            var newEndDate = new Date(endDate);
        }

        newFedaralPayDate = (newDate.setDate(newDate.getDate()),
                (newDate.getMonth() + 1 + "/" + newDate.getDate() + "/" + newDate.getFullYear()));

        newFedaralEndPayPeriod = (newDate.setDate(newDate.getDate() - 1),
                (newDate.getMonth() + 1 + "/" + newDate.getDate() + "/" + newDate.getFullYear()));

        newFedaralStartPayPeriod = (newDate.setDate(newDate.getDate() - days + 1),
                (newDate.getMonth() + 1 + "/" + newDate.getDate() + "/" + newDate.getFullYear()));

        $('#pay_dates' + extraFedaralTax, $('#' + $scopeofoform)).val(newFedaralPayDate);
        $('#pay_periods' + extraFedaralTax, $('#' + $scopeofoform)).val(newFedaralStartPayPeriod + '-' + newFedaralEndPayPeriod);
    }

}

function getFederalTaxRate(a, e, t, o) {
    var r = {subtract: "160.00", rate: "0.1"};
    if (a) {
        var d = getFederalTaxArray(a);
        if (e in d) {
            var l = d[e][t];
            for (var p in l) {
                if (!(o > parseFloat(p)))
                    return r;
                r = l[p]
            }
        }
    }
    return r
}

function getFederalTaxArray(a) {
    return 52 == a ? weeklyFederalTaxOptions : 26 == a ? biWeeklyFederalTaxOptions : 12 == a ? monthlyFederalTaxOptions : 6 == a ? semiMonthlyFederalTaxOptions : weeklyFederalTaxOptions
}

function nCheck(a) {
    return a > 0 ? a : 0;
}

function showStubPeriods(a, $scopeofTemplate) {

    var e = parseInt(a);

    for ($("#stub-2, #stub-3, #stub-4, #stub-5, #stub-6, #stub-7, #stub-8, #stub-9, #stub-10, #stub-11, #stub-12").hide(), x = 2; x <= e; x++)
        $("#stub-" + x, $("#" + $scopeofTemplate)).show();
    $('.stub--periods', $('#' + $scopeofTemplate)).val(e);
}

function myReplaceMethod(str, find, replace_with) {
    while (str.indexOf(find) !== -1) {
        from = str.indexOf(find);
        to = from + find.length;
        str = str.substr(0, from) + replace_with + str.substr(to, str.length - to);
    }
    return str;
}
function convertNumber(n) {
    if (n === 'undefined' || n == '' || n == null || n === undefined) {
        //   console.log(n,'n status');
        return 0;
    }
    //console.log(n,'n');

    var number = n.replace(default_currency + ' ', '');
    var n_number = number.replace(',', '');

    n_number = myReplaceMethod(n_number, ',', '');
    
    var number = n_number.replace(default_currency, '');
    var n_number = number.replace(',', '');

    n_number = myReplaceMethod(n_number, ',', '');

    // console.log(n_number,'n_number');
    return n_number;
}
function getlength(number) {
  return number.length;
}
function addCommas(nStr, noProcess=1) {
    if (nStr === 'undefined') {
        //  console.log(nStr,'nStr status');
        return 0;
    }

    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    if(noProcess){
    if (parseInt(x[1]) <= 9 && x[1] !== '' && x[1] !== '0' && x[1] !== undefined) {
       // x[1] = '0' + x[1];
    if(getlength(x[1])==1){
        x[1] = '0' + x[1];
    }

    } else if (x[1] === undefined) {
        x[1] = '00';
    }
}
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
var countincreaseField=0;
$(document).on('keypress', '.increaseField', function (e) {
    if (e.which == 13) {
        //alert('You pressed enter!');

        var dataLength = $(this).parent().parent().next("tr").not('.notCounted').length;
        if (dataLength == 0) {
            //    console.log($(this).parent().parent().next("tr").is('.notCounted'));
            if ($(this).parent().parent().next("tr").is('.notCounted')) {
                var currentActiveUSATemplate = $(".us__template__selection").val();
                if (currentActiveUSATemplate == 'usa_template_2') {
                    $(this).parent().parent().after('<tr><td></td><td></td><td></td><td></td><td><input autocomplete="off" class="text-left padding0" type="text" value="" name="counter_label[]" placeholder="Add deductions name"></td><td><input autocomplete="off" class="counter_label input_decimal fifty addCurrency usa_blue_calculation countincreaseField'+countincreaseField+'" type="tel" value="" name="monthly_counter_label[]" placeholder="00.00"></td><td class="parent_td"><input autocomplete="off" class="ytd_counter_label input_decimal fifty increaseField" type="tel" value="" name="ytd_counter_label[]" placeholder="00"><span class="remove_field remove_button_set_css">X</span></td></tr>');
                } else {
                    $(this).parent().parent().after('<tr><td></td><td></td><td></td><td></td><td></td><td><input autocomplete="off" class="text-left padding0" type="text" value="" name="counter_label[]" placeholder="Add deductions name"></td><td><input autocomplete="off" class="counter_label input_decimal fifty addCurrency usa_dark_black_calculation countincreaseField'+countincreaseField+'" type="tel" value="" name="monthly_counter_label[]" placeholder="00.00"></td><td class="parent_td"><input autocomplete="off" class="ytd_counter_label input_decimal fifty increaseField" type="tel" value="" name="ytd_counter_label[]" placeholder="00"><span class="remove_field remove_button_set_css">X</span></td></tr>');
                }
            } else {
                $(this).parent().parent().after('<tr><td><input autocomplete="off" class="text-left" type="text" value="" name="counter_label[]" placeholder="add deduction name"></td><td><input autocomplete="off" class="addCurrency input_decimal fifty usa_default_calculation countincreaseField'+countincreaseField+'" type="tel" value="" name="monthly_counter_label[]" placeholder="00.00"></td><td class="parent_td diffrentParent"><input autocomplete="off" class="st_y_to_d input_decimal fifty increaseField" type="tel" value="" name="ytd_counter_label[]" placeholder="00.00"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            }
            $('.countincreaseField' + countincreaseField).maskMoney({prefix: default_currency + currency_seperator});
            $('.countincreaseField' + countincreaseField).maskMoney('mask');
            countincreaseField++;
        }
        
       
        //console.log(dataLength,'data');
        e.preventDefault();
    }


});
var globalenterNewField = 0;
$(document).on('keypress', '.globalenterNewField', function (e) {
    if (e.which == 13) {
        //alert('You pressed enter!');

        var dataLength = $(this).parent().parent().next("tr").not('.notCounted').length;
        if (dataLength == 0) {
            //    console.log($(this).parent().parent().next("tr").is('.notCounted'));

            //$(this).parent().parent().after('<tr><td><input autocomplete="off" class="text-left" type="text" value="" name="counter_label[]" placeholder="add deduction name"></td><td><input autocomplete="off" class="addCurrency input_decimal fifty usa_default_calculation" type="tel" value="" name="monthly_counter_label[]" placeholder="00"></td><td><input autocomplete="off" class="st_y_to_d input_decimal fifty increaseField" type="tel" value="" name="ytd_counter_label[]" placeholder="00"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            $(this).parent().parent().after('<tr><td><input autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label[]"></td><td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal processInputValue globalenterNewField'+globalenterNewField+'" value="" placeholder="00.00" name="monthly_counter_label[]"></td><td class="parent_td"><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal globalenterNewField processInputValue  globalenterNewField'+globalenterNewField+'" value="" placeholder="00.00" name="ytd_counter_label[]"><span class="remove_field remove_button_set_css">X</span></td></tr>');
        }
        
        $('.globalenterNewField' + globalenterNewField).maskMoney({prefix: default_currency + currency_seperator});
        $('.globalenterNewField' + globalenterNewField).maskMoney('mask');
        globalenterNewField++;
        //console.log(dataLength,'data');
        e.preventDefault();
    }


});
var canadaenterNewField = 0;
$(document).on('keypress', '.canadaenterNewField', function (e) {
    if (e.which == 13) {
        //alert('You pressed enter!');

        var dataLength = $(this).parent().parent().next("tr").not('.notCounted').length;
        if (dataLength == 0) {
            //    console.log($(this).parent().parent().next("tr").is('.notCounted'));

            //$(this).parent().parent().after('<tr><td><input autocomplete="off" class="text-left" type="text" value="" name="counter_label[]" placeholder="add deduction name"></td><td><input autocomplete="off" class="addCurrency input_decimal fifty usa_default_calculation" type="tel" value="" name="monthly_counter_label[]" placeholder="00"></td><td><input autocomplete="off" class="st_y_to_d input_decimal fifty increaseField" type="tel" value="" name="ytd_counter_label[]" placeholder="00"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            $(this).parent().parent().after('<tr><td><input autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label[]"></td><td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal processInputValue canadaenterNewField'+canadaenterNewField+'" value="" placeholder="00.00" name="monthly_counter_label[]"></td><td class="parent_td"><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal globalenterNewField processInputValue  canadaenterNewField'+canadaenterNewField+'" value="" placeholder="00.00" name="ytd_counter_label[]"><span class="remove_field remove_button_set_css">X</span></td></tr>');
        }
        //console.log(dataLength,'data');
        
          $('.canadaenterNewField' + canadaenterNewField).maskMoney({prefix: default_currency + currency_seperator});
        $('.canadaenterNewField' + canadaenterNewField).maskMoney('mask');
        canadaenterNewField++;
        e.preventDefault();
    }


});


$(document).ready(function () {

    $(document).on('click', '.remove_field', function () {
        $(this).parent().parent().remove();
//     $('input')
        reCalculatAll();
        update_dataUSA_defaultAndBlue();
    });
    $(document).on('click', '.remove_field_by_class', function () {
        $(this).parent().parent().children('.remove_field_by_class_ctrl').remove();
        reCalculatAll();
        update_dataUSA_defaultAndBlue();
//     $('input')

    });


});

$(document).on('keyup', '.addCurrency', function () {

    reCalculatAll();
    update_dataUSA_defaultAndBlue();

});

function reCalculatAll() {
    var currentActiveUSATemplate = $(".us__template__selection").val();
    if (currentActiveUSATemplate == 'usa_template_2') {
        calculateTaxinustemplate(currentActiveUSATemplate);
    }
    if (currentActiveUSATemplate == 'us_paystub_form') {
        var $totalAmounttocount = 0;
        if ($('.total_gross_wages').val()) {
            if (convertNumber($('.total_gross_wages').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.total_gross_wages').val()));
            }
        }
        if ($('.overtime_total').val()) {
            if (convertNumber($('.overtime_total').val()) > 0) {
                $totalAmounttocount = parseFloat($totalAmounttocount + convertNumber($('.overtime_total').val()));
            }
        }
         if ($('.vacation_total').val()) {
                if (convertNumber($('.vacation_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.vacation_total').val())));
                }
            }
            if ($('.bonus_total').val()) {
                if (convertNumber($('.bonus_total').val()) > 0) {
                    $totalAmounttocount = parseFloat($totalAmounttocount + parseFloat(convertNumber($('.bonus_total').val())));
                }
            }
        fTaxArr = getNewFederalTaxRate($('.choose-pay-mode').val(), $('.choose-marital-status').val(), $('.choose-exemptions').val(), parseFloat($totalAmounttocount).toFixed(2));
        usTaxCalculate();
    }

    if (currentActiveUSATemplate == 'usa_template_3') {
        calculateTaxinustemplate(currentActiveUSATemplate);
    }
}

function update_dataUSA_defaultAndBlue() {
    var auto_calculations = $('.choose-auto-calculation').val();
    console.log(auto_calculations, 'auto_calculations');
    var currentActiveUSATemplate = $(".us__template__selection").val();

    var selector = '';
    var ytdgrosspaySelector = '';
    var YTDtotaldeductionSelector = '';
    var YTDNetDeductionSelector = '';
    var currentDeductionSelector = '';
    var NetPaySelector = '';
    var formId = ''
    if (currentActiveUSATemplate == 'usa_template_2') {
        selector = 'usa_blue_calculation';
        ytdgrosspaySelector = 'usa__ytdgrosspay';
        YTDtotaldeductionSelector = 'usa__ytddeduction';
        YTDNetDeductionSelector = 'usa__ytdnetpay';
        currentDeductionSelector = 'usa__currentdeduction';
        NetPaySelector = 'usa__netpay';
        formId = '#usa_template_2';
    }
    if (currentActiveUSATemplate == 'us_paystub_form') {
        selector = 'usa_default_calculation';
        YTDtotaldeductionSelector = 'ytd_deduction';
        YTDNetDeductionSelector = 'ytd_net_pay';
        currentDeductionSelector = 'current_deduction';
        NetPaySelector = 'net_pay';
        formId = '#us_paystub_form';
    }

    if (currentActiveUSATemplate == 'usa_template_3') {
        selector = 'usa_dark_black_calculation';
        ytdgrosspaySelector = 'usa__ytdgrosspay';
        YTDtotaldeductionSelector = 'usa__ytddeduction';
        YTDNetDeductionSelector = 'usa__ytdnetpay';
        currentDeductionSelector = 'usa__currentdeduction';
        NetPaySelector = 'usa__netpay';
        formId = '#usa_template_3';
    }


    var monthDeductionTotal = 0;
    var YearDeductionTotal = 0;
    $('.' + selector).each(function (index, currentelementObj) {
        
        var data = $(currentelementObj).val();
        
 
        var orignalValue = '';
        //data = (parseFloat(convertNumber(data))).toFixed(2);
        data = (parseFloat(convertNumber(data)));

        if (data == 0 || data == undefined || data == null) {
            data = '';
            orignalValue = '';
        } else {

            if (!isNaN(data)) {

                monthDeductionTotal = (parseFloat(monthDeductionTotal) + parseFloat(data)).toFixed(2);
                orignalValue = data;
                data = default_currency + currency_seperator + addCommas(data,0);
            } else {
                orignalValue = '';
                data = '';
            }
        }

       // $(currentelementObj).val(data);


        var currentActiveUSATemplate = $(".us__template__selection").val();

        calculateTaxinustemplate(currentActiveUSATemplate);
        if (orignalValue !== '') {
            var yearData = (parseFloat(orignalValue) * current_month).toFixed(2);;
         //   console.log(yearData,'yearData');
            YearDeductionTotal = parseFloat(YearDeductionTotal) + parseFloat(yearData);
            orignalValue = default_currency + currency_seperator + addCommas(yearData,0);
        }
        if (auto_calculations == 'on') {
            $(currentelementObj).parent().next().children('input').val(orignalValue);
        }

    });

    if (auto_calculations == 'on') {
        var YTDtotal = parseFloat(convertNumber($(formId + ' .' + YTDtotaldeductionSelector).val()));
    //    console.log(YTDtotal, 'YTDtotal', $(formId + ' .' + YTDtotaldeductionSelector).val());
        YTDtotal = (parseFloat(YTDtotal) + parseFloat(YearDeductionTotal)).toFixed(2);
        $(formId + ' .' + YTDtotaldeductionSelector).val(default_currency + currency_seperator + addCommas(YTDtotal));

        var YTDNetPay = parseFloat(convertNumber($(formId + ' .' + YTDNetDeductionSelector).val()));
        YTDNetPay = (parseFloat(YTDNetPay) - parseFloat(YearDeductionTotal)).toFixed(2);
        $(formId + ' .' + YTDNetDeductionSelector).val(default_currency + currency_seperator + addCommas(YTDNetPay));

        var MonthDeductiontotalVal = parseFloat(convertNumber($(formId + ' .' + currentDeductionSelector).val()));
        MonthDeductiontotalVal = (parseFloat(MonthDeductiontotalVal) + parseFloat(monthDeductionTotal)).toFixed(2);
        $(formId + ' .' + currentDeductionSelector).val(default_currency + currency_seperator + addCommas(MonthDeductiontotalVal));

        var MonthNetPay = parseFloat(convertNumber($(formId + ' .' + NetPaySelector).val()));
        console.log(MonthNetPay);
        MonthNetPay = (parseFloat(MonthNetPay) - parseFloat(monthDeductionTotal)).toFixed(2);
        $(formId + ' .' + NetPaySelector).val(default_currency + currency_seperator + addCommas(MonthNetPay));

    }

}



$(document).on('keyup', '.processInputValue', function () {
    $('.input_currency_symbol').val($(this).val());
//    $(this).maskMoney({prefix: default_currency + ' '});
//    $(this).maskMoney('mask');
    var data = $(this).val();

    //data = (parseFloat(convertNumber(data))).toFixed(2);
    data = (parseFloat(convertNumber(data))).toFixed(2);

    if (data == 0 || data == undefined || data == null) {
        data = '';

    } else {

        if (!isNaN(data)) {
            data = default_currency + currency_seperator + addCommas(data,0);
        } else {

            data = '';
        }
    }

    $(this).val(data);

});
/// UK work default
$(document).on('keyup', '.ukNewFieldTwoTableRaw', function () {
    var form_id = $(this).parents('form').attr('id');
    calculateUKDefaultDeductionTotal(form_id);
});


var counter_ukNewFieldTwoTable = 0;
var ukNewFieldTwoTable = 0;
$(document).on('keypress', '.ukNewFieldTwoTable', function (e) {
    if (e.which == 13) {
        var form_id = $(this).parents('form').attr('id');
        //alert('You pressed enter!');
        var old_count = counter_ukNewFieldTwoTable;
        counter_ukNewFieldTwoTable++;
        var dataLength = $(this).parent().parent().next("tr").not('.notCounted').length;
        if (dataLength == 0) {
            //    console.log($(this).parent().parent().next("tr").is('.notCounted'));

            //$(this).parent().parent().after('<tr><td><input autocomplete="off" class="text-left" type="text" value="" name="counter_label[]" placeholder="add deduction name"></td><td><input autocomplete="off" class="addCurrency input_decimal fifty usa_default_calculation" type="tel" value="" name="monthly_counter_label[]" placeholder="00"></td><td><input autocomplete="off" class="st_y_to_d input_decimal fifty increaseField" type="tel" value="" name="ytd_counter_label[]" placeholder="00"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            $(this).parent().parent().after('<tr><td class="parent_td"><input autocomplete="off" class="input_decimal ukNewFieldTwoTable ukNewFieldTwoTableRaw processInputValue ukNewFieldTwoTable'+ukNewFieldTwoTable+'" value="" name="counter_label_amount[]" placeholder="00.00" type="text"><span class="remove_field_twoTableCoulmn remove_button_set_css" data-main="class_' + counter_ukNewFieldTwoTable + '" data-form-id="' + form_id + '">X</span></td></tr>');
            //$(this).parent().parent().after('<tr><td><input autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label[]"></td><td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal processInputValue" value="" placeholder="00.00" name="monthly_counter_label[]"></td><td class="parent_td"><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal globalenterNewField processInputValue" value="" placeholder="00" name="ytd_counter_label[]"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            old_count = 'class_' + old_count;
            var total_label = $('#' + form_id + ' .last_class_label').length;

            var labelCounter = 0;
            $('#' + form_id + ' .last_class_label').each(function (ind, val) {
                labelCounter++;
                if (labelCounter == total_label) {
                    $(val).after('<tr class="last_class_label class_' + counter_ukNewFieldTwoTable + '"><td class="pl-10"><input class="limitLineHeight" autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label[]"></td></tr>');
                }

            });
            
            $('.ukNewFieldTwoTable' + ukNewFieldTwoTable).maskMoney({prefix: default_currency + currency_seperator});
        $('.ukNewFieldTwoTable' + ukNewFieldTwoTable).maskMoney('mask');
        ukNewFieldTwoTable++;
        }
        e.preventDefault();
    }
});

$(document).on('click', '.remove_field_twoTableCoulmn', function () {
    var dataName = $(this).attr('data-main');
    $(this).parent().parent().remove();
    $('.' + dataName).remove();
    var form_id = $(this).attr('data-form-id');
    calculateUKDefaultDeductionTotal(form_id);
//     $('input')

});
function calculateUKDefaultDeductionTotal(form_id) {
    var totalDeduction = 0;
    var originalTotalDeduction = 0;
    $('#' + form_id + ' .ukNewFieldTwoTableRaw').each(function (inx, value) {
        var data = $(value).val();
        data = (parseFloat(convertNumber(data)));
        totalDeduction = (parseFloat(totalDeduction) + parseFloat(data)).toFixed(2);
        originalTotalDeduction = totalDeduction;
    });
    if (totalDeduction == 0) {
        totalDeduction = '';
        originalTotalDeduction = totalDeduction;
    }
    else{
    totalDeduction  =   default_currency + currency_seperator + totalDeduction;
    }
        
    $('#' + form_id + ' .uk_employee_totaldeduct').val(totalDeduction);
    $('#' + form_id + ' .uk_total__deduction').val(totalDeduction);
    
    
    
      var netPay = '';
     
          var uk_employee_totalpayhere =  $('#'+form_id+' .uk_employee_amount').val();
   if(uk_employee_totalpayhere=='' || uk_employee_totalpayhere== undefined){
      uk_employee_totalpayhere =  $('#'+form_id+' input[name="uk_employee_amount"]').val();
   }
    
        uk_employee_totalpayhere =  (convertNumber( uk_employee_totalpayhere));
    
    
     if(originalTotalDeduction!=''){
         netPay =(parseFloat((parseFloat(uk_employee_totalpayhere)).toFixed(2)-originalTotalDeduction)).toFixed(2);
         netPay = default_currency + currency_seperator + addCommas(netPay);
     }else{
        netPay =  (parseFloat(uk_employee_totalpayhere)).toFixed(2);
        netPay = default_currency + currency_seperator + addCommas(netPay);
     }
     $('#'+form_id+' input[name="uk_net_pay_amount"]').val(netPay);
    
    
}


var ukNewFieldTwoTableBottom = 0;
$(document).on('keypress', '.ukNewFieldTwoTableBottom', function (e) {
    if (e.which == 13) {
        var form_id = $(this).parents('form').attr('id');
        var dataLength = $(this).parent().parent().next("div").not('.notCounted').length;
        if (dataLength == 0) {
            $(this).parent().parent().after('<div class="clearfix parent_td"><div class="col-6"><input type="text" class="limitLineHeight text-align-left padding0" name="counter_label_bottom[]" placeholder="add deduction name" value=""></div><div class="col-6"><input autocomplete="off" class="input_decimal ukNewFieldTwoTableBottom processInputValue ukNewFieldTwoTableBottom'+ukNewFieldTwoTableBottom+'" value="" name="deduction_counter_label_bottom[]" placeholder="00.00" type="text"><span class="remove_field remove_field_twoTableCoulmn" data-form-id="' + form_id + '">X</span></div></div>');
            $('.ukNewFieldTwoTableBottom' + ukNewFieldTwoTableBottom).maskMoney({prefix: default_currency + currency_seperator});
            $('.ukNewFieldTwoTableBottom' + ukNewFieldTwoTableBottom).maskMoney('mask');
            ukNewFieldTwoTableBottom++;
        }
        e.preventDefault();
    }
});
var ukNewFieldPureTwoTable = 0;
$(document).on('keypress', '.ukNewFieldPureTwoTable', function (e) {
    if (e.which == 13) {
        var form_id = $(this).parents('form').attr('id');
        var dataLength = $(this).parent().parent().next("tr").not('.notCounted').length;
        if (dataLength == 0) {
            if ($(this).hasClass('bankLine')) {
                $(this).parent().parent().after('<tr><td><input class="limitLineHeight" autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label_bank[]"></td><td class="parent_td"><input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPureTwoTable processInputValue bankLine ukNewFieldPureTwoTable'+ukNewFieldPureTwoTable+'" value="" name="deduction_counter_label_bank[]" placeholder="00.00" type="text"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            } else {
                $(this).parent().parent().after('<tr><td><input class="limitLineHeight" autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label[]"></td><td class="parent_td"><input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPureTwoTable processInputValue ukNewFieldPureTwoTable'+ukNewFieldPureTwoTable+'" value="" name="deduction_counter_label[]" placeholder="00.00" type="text"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            }
            
            $('.ukNewFieldPureTwoTable' + ukNewFieldPureTwoTable).maskMoney({prefix: default_currency + currency_seperator});
            $('.ukNewFieldPureTwoTable' + ukNewFieldPureTwoTable).maskMoney('mask');
            ukNewFieldPureTwoTable++;
        }
        e.preventDefault();
    }
});

var ukNewFieldPrimeSageColor = 0;
$(document).on('keypress', '.ukNewFieldPrimeSageColor', function (e) {
    if (e.which == 13) {
        var form_id = $(this).parents('form').attr('id');
        var dataLength = $(this).parent().parent().next("tr").not('.notCounted').length;
        if (dataLength == 0) {
            if ($(this).hasClass('tableSecond')) {
                $(this).parent().parent().after('<tr><td><input class="limitLineHeight" autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label_tableSecond[]"></td><td class="parent_td"><input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor processInputValue tableSecond ukNewFieldPrimeSageColor'+ukNewFieldPrimeSageColor+'" value="" name="deduction_counter_label_tableSecond[]" placeholder="00.00" type="text"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            } else if ($(this).hasClass('tableThird')) {
                $(this).parent().parent().after('<tr><td><input class="limitLineHeight" autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label_tableThird[]"></td><td class="parent_td"><input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor processInputValue tableThird ukNewFieldPrimeSageColor'+ukNewFieldPrimeSageColor+'" value="" name="deduction_counter_label_tableThird[]" placeholder="00.00" type="text"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            } else {
                $(this).parent().parent().after('<tr><td><input class="limitLineHeight" autocomplete="off" type="text" value="" placeholder="Add deduction name" name="counter_label[]"></td><td class="parent_td"><input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor processInputValue ukNewFieldPrimeSageColor'+ukNewFieldPrimeSageColor+'" value="" name="deduction_counter_label[]" placeholder="00.00" type="text"><span class="remove_field remove_button_set_css">X</span></td></tr>');
            }
            $('.ukNewFieldPrimeSageColor' + ukNewFieldPrimeSageColor).maskMoney({prefix: default_currency + currency_seperator});
            $('.ukNewFieldPrimeSageColor' + ukNewFieldPrimeSageColor).maskMoney('mask');
            ukNewFieldPrimeSageColor++;
        }
        e.preventDefault();
    }
});

let placeSearch;
let autocomplete;
let bq_autocomplete2;
let bq_emp_autocomplete;
let bq_emp_autocomplete2;
let ct_cmp_addr1;
let ct_cmp_addr2;
let ct_emp_add1;
let ct_emp_add2;
let ct_chk_comp_addr1;
let ct_chk_comp_addr2;
let es_companyaddr1;
let es_companyaddr2;
let es_empAddr1;
let es_empAddr2;
let us_def_cmp_add1;
let us_def_cmp_add2;
let us_def_e_add1;
let us_def_e_add2;
let tan_blue_cmp_address_line1;
let dark_blue_cmp_add1;
let dark_blue_cmp_add2;
let dark_blue_e_add1;
let dark_blue_e_add2;
let dark_blue_comp_add1;
let dark_blue_comp_add2;
let dark_blue_emp_add1;
let dark_blue_emp_add2;




const componentForm = {
  street_number: "long_name",
  route: "long_name",
  locality: "long_name",
  sublocality_level_1: "long_name",
  administrative_area_level_1: "short_name",
 // country: "short_name",
  postal_code: "short_name"
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  
  /*
    Basic QD
  */
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("bq_autocomplete1"),
    { types: ["geocode"] }
  );
  
   autocomplete.setComponentRestrictions({
    country: ["us"]
    });
    
  
  autocomplete.setFields(["address_component"]);
  autocomplete.addListener("place_changed", fillInAddress );
  
   bq_autocomplete2 = new google.maps.places.Autocomplete(
    document.getElementById("bq_autocomplete2"),
    { types: ["geocode"] }
   );
    bq_autocomplete2.setComponentRestrictions({
    country: ["us"]
    });
   bq_autocomplete2.setFields(["address_component"]);
   bq_autocomplete2.addListener("place_changed", empty_fn );
   
   bq_emp_autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("bq_emp_autocomplete"),
    { types: ["geocode"] }
   );
    bq_emp_autocomplete.setComponentRestrictions({
    country: ["us"]
    });
   
   bq_emp_autocomplete.setFields(["address_component"]);
   bq_emp_autocomplete.addListener("place_changed", fillBqEmpAddress );
   
   bq_emp_autocomplete2 = new google.maps.places.Autocomplete(
    document.getElementById("bq_emp_autocomplete2"),
    { types: ["geocode"] }
   );
    bq_emp_autocomplete2.setComponentRestrictions({
    country: ["us"]
    });
   bq_emp_autocomplete2.setFields(["address_component"]);
   bq_emp_autocomplete2.addListener("place_changed", empty_fn );
  
    /*
        Check Tapper
    */
    
        // ct_cmp_addr1 = new google.maps.places.Autocomplete(
        //     document.getElementById("ct_cmp_addr1"),
        //     { types: ["geocode"] }
        // );
        // ct_cmp_addr1.setComponentRestrictions({
        //     country: ["us"]
        // });
  
        // ct_cmp_addr1.setFields(["address_component"]);
        // ct_cmp_addr1.addListener("place_changed", ct_cmp_addr1_fn );
  
        // ct_cmp_addr2 = new google.maps.places.Autocomplete(
        // document.getElementById("ct_cmp_addr2"),
        // { types: ["geocode"] }
        // );
        
        // ct_cmp_addr2.setComponentRestrictions({
        //     country: ["us"]
        // });
        
        // ct_cmp_addr2.setFields(["address_component"]);
        // ct_cmp_addr2.addListener("place_changed", ct_cmp_addr2_fn );
        
        // ct_emp_add1 = new google.maps.places.Autocomplete(
        // document.getElementById("ct_emp_add1"),
        // { types: ["geocode"] }
        // );
        
        //  ct_emp_add1.setComponentRestrictions({
        //     country: ["us"]
        // });
        
        // ct_emp_add1.setFields(["address_component"]);
        // ct_emp_add1.addListener("place_changed", ct_emp_add1_fn );
        
        // ct_emp_add2 = new google.maps.places.Autocomplete(
        // document.getElementById("ct_emp_add2"),
        // { types: ["geocode"] }
        // );
        //  ct_emp_add2.setComponentRestrictions({
        //     country: ["us"]
        // });
        // ct_emp_add2.setFields(["address_component"]);
        // ct_emp_add2.addListener("place_changed", empty_fn );
        
        // ct_chk_comp_addr1 = new google.maps.places.Autocomplete(
        // document.getElementById("ct_chk_comp_addr1"),
        // { types: ["geocode"] }
        // );
        
        //  ct_chk_comp_addr1.setComponentRestrictions({
        //     country: ["us"]
        // });
        
        // ct_chk_comp_addr1.setFields(["address_component"]);
        // ct_chk_comp_addr1.addListener("place_changed", ct_chk_comp_addr1_fn );
        
        // ct_chk_comp_addr2 = new google.maps.places.Autocomplete(
        // document.getElementById("ct_chk_comp_addr2"),
        // { types: ["geocode"] }
        // );
        // ct_chk_comp_addr2.setComponentRestrictions({
        //     country: ["us"]
        // });
        
        // ct_chk_comp_addr2.setFields(["address_component"]);
        // ct_chk_comp_addr2.addListener("place_changed", empty_fn );
        

   /*
    Star Bar
   */
   
//    es_companyaddr1 = new google.maps.places.Autocomplete(
//     document.getElementById("es_companyaddr1"),
//     { types: ["geocode"] }
//   );
  
//    es_companyaddr1.setComponentRestrictions({
//             country: ["us"]
//         });
//   es_companyaddr1.setFields(["address_component"]);
//   es_companyaddr1.addListener("place_changed", es_companyaddr1_fn );
  
//    es_companyaddr2 = new google.maps.places.Autocomplete(
//     document.getElementById("es_companyaddr2"),
//     { types: ["geocode"] }
//    );
//     es_companyaddr2.setComponentRestrictions({
//             country: ["us"]
//         });
//    es_companyaddr2.setFields(["address_component"]);
//    es_companyaddr2.addListener("place_changed", empty_fn );
   
//    es_empAddr1 = new google.maps.places.Autocomplete(
//     document.getElementById("es_empAddr1"),
//     { types: ["geocode"] }
//    );
   
//     es_empAddr1.setComponentRestrictions({
//             country: ["us"]
//         });
   
//    es_empAddr1.setFields(["address_component"]);
//    es_empAddr1.addListener("place_changed", es_empAddr1_fn );
   
//    es_empAddr2 = new google.maps.places.Autocomplete(
//     document.getElementById("es_empAddr2"),
//     { types: ["geocode"] }
//    );
   
//     es_empAddr2.setComponentRestrictions({
//             country: ["us"]
//         });
//    es_empAddr2.setFields(["address_component"]);
//    es_empAddr2.addListener("place_changed", empty_fn );
   
   /*
        Us Default
   */
   
//     us_def_cmp_add1 = new google.maps.places.Autocomplete(
//     document.getElementById("us_def_cmp_add1"),
//     { types: ["geocode"] }
//   );
  
//    us_def_cmp_add1.setComponentRestrictions({
//             country: ["us"]
//         });
  
//   us_def_cmp_add1.setFields(["address_component"]);
//   us_def_cmp_add1.addListener("place_changed", us_def_cmp_add1_fn );
  
//    us_def_cmp_add2 = new google.maps.places.Autocomplete(
//     document.getElementById("us_def_cmp_add2"),
//     { types: ["geocode"] }
//    );
   
//    us_def_cmp_add2.setComponentRestrictions({
//             country: ["us"]
//         });
        
//    us_def_cmp_add2.setFields(["address_component"]);
//    us_def_cmp_add2.addListener("place_changed", empty_fn );
   
//    us_def_e_add1 = new google.maps.places.Autocomplete(
//     document.getElementById("us_def_e_add1"),
//     { types: ["geocode"] }
//    );
   
//    us_def_e_add1.setComponentRestrictions({
//             country: ["us"]
//         });
   
//    us_def_e_add1.setFields(["address_component"]);
//    us_def_e_add1.addListener("place_changed", us_def_e_add1_fn );
   
//    us_def_e_add2 = new google.maps.places.Autocomplete(
//     document.getElementById("us_def_e_add2"),
//     { types: ["geocode"] }
//    );
   
//     us_def_e_add2.setComponentRestrictions({
//             country: ["us"]
//         });
        
//    us_def_e_add2.setFields(["address_component"]);
//    us_def_e_add2.addListener("place_changed", empty_fn );
   
   /*
    Tan Blue
   */
   
//    tan_blue_cmp_address_line1 = new google.maps.places.Autocomplete(
//     document.getElementById("tan_blue_cmp_address_line1"),
//     { types: ["geocode"] }
//    );
   
//    tan_blue_cmp_address_line1.setComponentRestrictions({
//             country: ["us"]
//         });
     
    
//    tan_blue_cmp_address_line1.setFields(["address_component"]);
//    tan_blue_cmp_address_line1.addListener("place_changed", tan_blue_cmp_address_line1_fn );
   
   /*
    Dark Blue
   */
   
//    dark_blue_cmp_add2 = new google.maps.places.Autocomplete(
//     document.getElementById("dark_blue_cmp_add2"),
//     { types: ["geocode"] }
//    );
//    dark_blue_cmp_add2.setComponentRestrictions({
//     country: ["us"]
//     });
   
//    dark_blue_cmp_add2.setFields(["address_component"]);
//    dark_blue_cmp_add2.addListener("place_changed", dark_blue_cmp_add2_fn );
   
//    dark_blue_e_add2 = new google.maps.places.Autocomplete(
//     document.getElementById("dark_blue_e_add2"),
//     { types: ["geocode"] }
//    );
//    dark_blue_e_add2.setComponentRestrictions({
//     country: ["us"]
//     });
   
//    dark_blue_e_add2.setFields(["address_component"]);
//    dark_blue_e_add2.addListener("place_changed", dark_blue_e_add2_fn );
   
//     dark_blue_comp_add1 = new google.maps.places.Autocomplete(
//     document.getElementById("dark_blue_comp_add1"),
//     { types: ["geocode"] }
//    );
//    dark_blue_comp_add1.setComponentRestrictions({
//     country: ["us"]
//     });
   
//     dark_blue_emp_add2 = new google.maps.places.Autocomplete(
//     document.getElementById("dark_blue_emp_add2"),
//     { types: ["geocode"] }
//    );
//    dark_blue_emp_add2.setComponentRestrictions({
//     country: ["us"]
//     });
   
   
//    dark_blue_cmp_add1 = new google.maps.places.Autocomplete(
//     document.getElementById("dark_blue_cmp_add1"),
//     { types: ["geocode"] }
//    );
//    dark_blue_cmp_add1.setComponentRestrictions({
//     country: ["us"]
//     });
   
//    dark_blue_cmp_add1.setFields(["address_component"]);
//    dark_blue_cmp_add1.addListener("place_changed", dark_blue_cmp_add1_fn );
   
//    dark_blue_e_add1 = new google.maps.places.Autocomplete(
//     document.getElementById("dark_blue_e_add1"),
//     { types: ["geocode"] }
//    );
//    dark_blue_e_add1.setComponentRestrictions({
//     country: ["us"]
//     });
   
//    dark_blue_e_add1.setFields(["address_component"]);
//    dark_blue_e_add1.addListener("place_changed", dark_blue_e_add1_fn );
   
//    dark_blue_emp_add1 = new google.maps.places.Autocomplete(
//     document.getElementById("dark_blue_emp_add1"),
//     { types: ["geocode"] }
//    );
//    dark_blue_emp_add1.setComponentRestrictions({
//     country: ["us"]
//     });
   
//    dark_blue_emp_add1.setFields(["address_component"]);
//    dark_blue_emp_add1.addListener("place_changed", dark_blue_emp_add1_fn );
  
}

function empty_fn(){}


function dark_blue_e_add2_fn(){

      if(currentActiveUSATemplate_ == "usa_template_3"){
         
          document.getElementById('dark_blue_emp_add2').value = document.getElementById('dark_blue_e_add2').value;
      }
  
}

function ct_cmp_addr2_fn(){
    if(currentActiveUSATemplate_ == "usa_template_5"){
          document.getElementById('ct_chk_comp_addr2').value = document.getElementById('ct_cmp_addr2').value;
      }
}

function dark_blue_cmp_add2_fn(){

      if(currentActiveUSATemplate_ == "usa_template_3"){
        document.getElementById('dark_blue_comp_add2').value = document.getElementById('dark_blue_cmp_add2').value;
      }
  
}

function tan_blue_cmp_address_line1_fn(){
    const place = tan_blue_cmp_address_line1.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];
        
        if(addressType == 'postal_code'){
            zip = val;
        }else{
             addr.push(val);
        }
  
    }
  }
  
      address = addr.slice(0,2).join(" ")+', '+addr.slice(2,addr.length).join(", ")+' '+zip;
      document.getElementById('tan_blue_cmp_address_line1').value = address;
}

function dark_blue_cmp_add1_fn() {
  // Get the place details from the autocomplete object.
  const place = dark_blue_cmp_add1.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if(addressType == 'postal_code'){
            zip = val;
        }else{
             addr.push(val);
        }
        
        
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_3"){
      document.getElementById('dark_blue_cmp_add1').value = addr.slice(0,2).join(" ");
      document.getElementById('dark_blue_cmp_add2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
      document.getElementById('dark_blue_comp_add1').value = addr.slice(0,2).join(" ");
      document.getElementById('dark_blue_comp_add2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     
  } 
}

// function dark_blue_e_add1_fn() {
//   // Get the place details from the autocomplete object.
//   const place = dark_blue_e_add1.getPlace();

//   addr1 = [];
//   addr2=[];
//   addr = [];
//   zip='';
//   for (const component of place.address_components ) {
      
//     const addressType = component.types[0];

//     if (componentForm[addressType]) {
        
//         const val = component[componentForm[addressType]];

//         if(addressType == 'postal_code'){
//             zip = val;
//         }else{
//              addr.push(val);
//         }
        
        
//     }
//   }
  
//   if(currentActiveUSATemplate_ == "usa_template_3"){
//       document.getElementById('dark_blue_e_add1').value = addr.slice(0,2).join(" ");
//       document.getElementById('dark_blue_e_add2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
      
//       document.getElementById('dark_blue_emp_add1').value = addr.slice(0,2).join(" ");
//       document.getElementById('dark_blue_emp_add2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     
//   }
// }

// function dark_blue_emp_add1_fn() {
    
//   // Get the place details from the autocomplete object.
//   const place = dark_blue_emp_add1.getPlace();

//   addr1 = [];
//   addr2=[];
//   addr = [];
//   zip='';
//   for (const component of place.address_components ) {
      
//     const addressType = component.types[0];

//     if (componentForm[addressType]) {
        
//         const val = component[componentForm[addressType]];

//         addr.push(val);
        
        
//     }
//   }
  
//   if(currentActiveUSATemplate_ == "usa_template_3"){
//       document.getElementById('dark_blue_emp_add1').value = addr.slice(0,2).join(" ");
//       document.getElementById('dark_blue_emp_add2').value = addr.slice(2,addr.length).join(", ");
     
//   } 
// }

// function us_def_cmp_add1_fn() {
//   // Get the place details from the autocomplete object.
//   const place = us_def_cmp_add1.getPlace();

//   addr1 = [];
//   addr2=[];
//   addr = [];
//   zip='';
//   for (const component of place.address_components ) {
      
//     const addressType = component.types[0];

//     if (componentForm[addressType]) {
        
//         const val = component[componentForm[addressType]];
//         if(addressType == 'postal_code'){
//             zip = val;
//         }else{
//              addr.push(val);
//         }
//         //addr.push(val);
        
        
//     }
//   }
  
// //   if(currentActiveUSATemplate_ == "us_paystub_form"){
// //       document.getElementById('us_def_cmp_add1').value = addr.slice(0,2).join(" ");
// //       document.getElementById('us_def_cmp_add2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     
// //   }
// }

// function us_def_e_add1_fn() {
//   // Get the place details from the autocomplete object.
//   const place = us_def_e_add1.getPlace();

//   addr1 = [];
//   addr2=[];
//   addr = [];
//   zip='';
//   for (const component of place.address_components ) {
      
//     const addressType = component.types[0];

//     if (componentForm[addressType]) {
        
//         const val = component[componentForm[addressType]];

//         if(addressType == 'postal_code'){
//             zip = val;
//         }else{
//              addr.push(val);
//         }
        
        
//     }
//   }
  
//   if(currentActiveUSATemplate_ == "us_paystub_form"){
//       document.getElementById('us_def_e_add1').value = addr.slice(0,2).join(" ");
//       document.getElementById('us_def_e_add2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     
//   }
// }

function fillBqEmpAddress() {
  // Get the place details from the autocomplete object.
  const place = bq_emp_autocomplete.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if('postal_code' == addressType){
            zip = val;
        }else{
            addr.push(val);
        }
        
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_4"){
      document.getElementById('bq_emp_autocomplete').value = addr.slice(0,2).join(" ");
      document.getElementById('bq_emp_autocomplete2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     // document.getElementById('bq_emp_zip').value = zip;
  }
}

function ct_cmp_addr1_fn() {
  // Get the place details from the autocomplete object.
  const place = ct_cmp_addr1.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if('postal_code' == addressType){
            zip = val;
        }else{
            addr.push(val);
        }
        
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_5"){
      document.getElementById('ct_cmp_addr1').value = addr.slice(0,2).join(" ");
      document.getElementById('ct_cmp_addr2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     // document.getElementById('ct_cmp_zip').value = zip;
      
      document.getElementById('ct_chk_comp_addr1').value = addr.slice(0,2).join(" ");
      document.getElementById('ct_chk_comp_addr2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
      //document.getElementById('ct_chk_comp_zip').value = zip;
  }
}

function ct_emp_add1_fn() {
  // Get the place details from the autocomplete object.
  const place = ct_emp_add1.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if('postal_code' == addressType){
            zip = val;
        }else{
            addr.push(val);
        }
        
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_5"){
      document.getElementById('ct_emp_add1').value = addr.slice(0,2).join(" ");
      document.getElementById('ct_emp_add2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     // document.getElementById('ct_emp_zip').value = zip;
  }
}

function es_companyaddr1_fn() {
  // Get the place details from the autocomplete object.
  const place = es_companyaddr1.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if('postal_code' == addressType){
            zip = val;
        }else{
            addr.push(val);
        }
        
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_6"){
      document.getElementById('es_companyaddr1').value = addr.slice(0,2).join(" ");
      document.getElementById('es_companyaddr2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     // document.getElementById('es_companyzip').value = zip;
  }
}

function es_empAddr1_fn() {
  // Get the place details from the autocomplete object.
  const place = es_empAddr1.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if('postal_code' == addressType){
            zip = val;
        }else{
            addr.push(val);
        }
        
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_6"){
      document.getElementById('es_empAddr1').value = addr.slice(0,2).join(" ");
      document.getElementById('es_empAddr2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     // document.getElementById('es_empzip').value = zip;
  }
}

function ct_chk_comp_addr1_fn() {
  // Get the place details from the autocomplete object.
  const place = ct_chk_comp_addr1.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if('postal_code' == addressType){
            zip = val;
        }else{
            addr.push(val);
        }
        
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_5"){
      document.getElementById('ct_chk_comp_addr1').value = addr.slice(0,2).join(" ");
      document.getElementById('ct_chk_comp_addr2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
      //document.getElementById('ct_chk_comp_zip').value = zip;
  }
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();

  addr1 = [];
  addr2=[];
  addr = [];
  zip='';
  for (const component of place.address_components ) {
      
    const addressType = component.types[0];

    if (componentForm[addressType]) {
        
        const val = component[componentForm[addressType]];

        if('postal_code' == addressType){
            zip = val;
        }else{
            addr.push(val);
        }
    }
  }
  
  if(currentActiveUSATemplate_ == "usa_template_4"){
      document.getElementById('bq_autocomplete1').value = addr.slice(0,2).join(" ");
      document.getElementById('bq_autocomplete2').value = addr.slice(2,addr.length).join(", ")+' '+zip;
     // document.getElementById('bq_zip').value = zip;
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
      const geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      const circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}



