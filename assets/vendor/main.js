
(function ($) {
  // USE STRICT
  "use strict";
  if(!$("#users_table").find("tbody>tr.empty_table").length){
    $('#users_table').DataTable({
      "order": [[ 6, "desc" ]]
    });
  }
  if(!$("#email_users_table").find("tbody>tr.empty_table").length){
    var tables = $('#email_users_table').DataTable({
      //"order": [[ 6, "desc" ]]
    });
  }
  
  $(document).on("click", ".sendemails", function(){
    var options = $('#country_filter option:selected').attr("data_id");
    $.ajax({
        url: base_url+'admin/getUserByCountry',
        method: 'POST',
        data: {countryId: options},
        success: function(result) {
      var result = JSON.parse(result);
      if(result.length > 0){
        var emails = "";
        $(".js-example-basic-multiple").val(null).trigger("change"); 
        $(".js-example-basic-multiple").empty();
        for(var i = 0; i <  result.length; i++ ){
          emails += result[i].email+",";
              $(".js-example-basic-multiple").append('<option selected="true" value="'+ result[i].email+'">'+ result[i].email+'</option>');
        }
        var newEmail = emails.replace(/^,|,$/g,'');
        $("#messageModal1").modal("show");
     //   $("#messageModal1 #recipient").val(newEmail);
      
      
      }
      
    }
    });
  });
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

  $(document).on("click", "#messageModal1 .send__msg", function(e){
    e.preventDefault();
   // var emails = $('#messageModal1 #recipient').val();
 var emails =    $(".js-example-basic-multiple").select2("val");
 emails = emails.join(',');
   
    
    var subject = $('#messageModal1 #subject').val();
    var description = $("#messageModal1").find('#description_email').val();
	var error=0;
	$("#error").html('');
	$("#success").html('');
	$("#error").css('display','none');
	$("#success").css('display','none');
	if(emails.trim() == '')
	{
		$("#error").html('Please enter email address');
		error++;
	}
	if(subject.trim() == '')
	{
		$("#error").append('Please enter subject<br />'); 
		error++;
	}
	if(description.trim() == '')
	{
		$("#error").append('Please enter message');
		error++;
	}
	if(error > 0)
	{
		$("#error").css('display','block');
	}
	else
	{	
		$.ajax({
			url: base_url+'admin/emailmarketingEmails',
			method: 'POST',
			data: {emails: emails,subject:subject,description:description},
			success: function(result) {
			var result = JSON.parse(result);
			var success_len=result.successed.length;
			var error_len=result.failed.length;
			//console.log('Email has been send successfully'+result.successed);
			if(result.successed.length > 0)
			{
				//console.log('A');
				$('#success').html('Email has been send successfully');
				$("#success").css('display','block');
			}	
			if(result.failed.length > 0)
			{
				
				$('#error').html('Some Email has not been send. ' + result.failed);
				$("#error").css('display','block');
			}
			
		  }
		  });
	}	  
    return false;
  });
  
  
  $(document).on("change", "#country_filter", function(){
    var values = $(this).val();
    if(values=='all'){
        values = '';
    }
    tables.column( 5 ).search( values ? '^'+$(this).val()+'$' : values, true, false ).draw();
    } );



    if($("#offer_hasextraparam").is(":checked")){
        $("#offer_postbackparams").parent().hide();
    }else{
        $("#offer_postbackparams").parent().show();
    }
    $(document).on("change","#offer_hasextraparam",function(){
        if($(this).is(":checked")){
            $("#offer_postbackparams").parent().hide();
        }else{
            $("#offer_postbackparams").parent().show();
        }
    });

  if(!$("#offers_table").find("tbody>tr.empty_table").length){
      $('#offers_table').DataTable({
        "order": [[ 0, "desc" ]]
      });
  }

  if(!$("#completedoffers_table").find("tbody>tr.empty_table").length){
      $("#completedoffers_table").DataTable({
          "order": [[ 0, "desc" ]]
      });
  }

  $(".choose-geo-code").select2();
  if(!$("#payments_table").find("tbody>tr.empty_table").length){
    $('#payments_table').DataTable({
     "order": [],
     "columnDefs": [ { orderable: false, targets: [0,1] } ]
    });
  }
  $('#offer_geo_code').select2({
    placeholder: 'Select geo code'
  });
  $('#subscriptions_table').DataTable({
    "order": [[ 3, "desc" ]]
  });
  $('.choose-geo-code').change(function() {
    var geo_code = $(this).val();
    $('.track_offer_chart_geocode').text(geo_code);
    $.ajax({
        url: base_url+'admin/reload_offer_chart',
        method: 'POST',
        data: {geo_code: geo_code},
        success: function(result) {
            var data = JSON.parse(result);
            if(data.error == 'false') {
                var color = Chart.helpers.color;
                var tchart = document.getElementById('track_offer_chart').getContext('2d');
                var tconfig = createConfig('top', 'Track Offers', data.tMonths, 'Months', data.tMonthsRecord, 'Total Track Offers');
                new Chart(tchart, tconfig);
                
                function createConfig(legendPosition, label, xaxis, xaxislabel, yaxis, yaxislabel) {
                    return {
                        type: 'line',
                        data: {
                            labels: xaxis,
                            datasets: [{
                                label: label,
                                data: yaxis,
                                backgroundColor: color('rgb(54, 162, 235)').alpha(0.5).rgbString(),
                                borderColor: 'rgb(54, 162, 235)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: legendPosition,
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                            display: true,
                                            labelString: xaxislabel
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                            display: true,
                                            labelString: yaxislabel
                                    }
                                }]
                            },
                            title: {
                                display: false,
                                text: 'Legend Position: ' + legendPosition
                            }
                        }
                    };
                }
            }
        }
    });
});
  /*
    Add Offer Form form validation
  */
  $("#add_offer").validate({
      rules: {
          offer_name: {
                required: true
          },
           offer_url: {
               required: true
          },
            'offer_geo_code[]': {
                required: true
          }
        },
      messages: {
          offer_name: 'Offer Name Required',
          offer_url: 'Offer URL Required',
          'offer_geo_code[]': 'Select Any One Geo Code'
      },
      errorElement: 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error);
        } else {
          error.insertAfter(element);
        }
      }     
  });
  /*
    edit Offer Form form validation
  */
  $("#edit_offer").validate({
    rules: {
        offer_name: {
            required: true
        },
        offer_url: {
            required: true
        },
        'offer_geo_code[]': {
            required: true
        }
    },
    messages: {
        offer_name: 'Offer Name Required',
        offer_url: 'Offer URL Required',
        'offer_geo_code[]': 'Select Any One Geo Code'
    },
    errorElement: 'div',
    errorPlacement: function(error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error);
      } else {
         error.insertAfter(element);
      }
    }
  });

  $("#active_users").validate({
    rules: {
        user_message: {
            required: true
        },
        message_subject:{
            required: true
        }
    },
    messages: {
        message_subject: 'Please enter message subject',
        user_message: 'Please enter your message'
    }
});

// $(".active_deactive_offer").unbind('click');
$(".active_deactive_offer").on("click",function(e) {
    e.preventDefault();
    var txt = $(this).text().toLowerCase();
    var offer_id = $(this).data('id');
    $('.yes-deactive-offer').attr('data-id', offer_id);
    if(txt == 'yes') {
        $('.yes-deactive-offer').attr('data-status', 'active');
        $('.active_deactive_offer_info_msg').text('You want to de-active offer?');
    } else {
        $('.yes-deactive-offer').attr('data-status', 'inactive');
        $('.active_deactive_offer_info_msg').text('You want to active offer again?');
    }
    $('#active_deactive_offer_model').modal('show');
    return false;
});
$(".yes-deactive-offer").click(function(e) {
  e.preventDefault();
  var offer_id = $(this).data('id');
  var offer_status = $(this).data('status');
  $.ajax({
      url: base_url+'admin/active_deactive_offer',
      method: 'POST',
      data: {offer_id: offer_id, offer_status: offer_status},
      success: function(result) {
          var data = JSON.parse(result);
          if(data.error == 'true') {
              $('.info_message').text(data.message);
              $('#active_deactive_user_model').modal('hide');
              $('#info_message_model').modal('show');
              window.location.reload();
          } else {
              window.location.reload();
          }
      },
      error: function() {
          window.location.reload();
      }
  });
});
// $(".add_user_subscription").unbind('click');
    $(document).on("click", '.add_user_subscription',function(event) {
        event.preventDefault();
        $('#add_admin_subscription_modal').modal('show');
        $('.direct_user_id').val($(this).data('id'));
});

// $(".btn-new-direct-subscription").unbind('click');
    $(".btn-new-direct-subscription").on("click",function(e) {
        e.preventDefault();
        $(".page_custom_loader").show();
        $.ajax({
            url: base_url+'admin/addDirectSubscription',
            method: 'POST',
            data: $('#new-direct-subscription-form').serialize(),
            success: function(result) {
                $(".page_custom_loader").hide();
                var data = JSON.parse(result);
                $('.info_message').text(data.message);
                $('#add_admin_subscription_modal').modal('hide');
                $('#info_message_model').modal('show');
                if(data.error == 'true') {
                    
                } else {
                    
                }
            },
            error: function() {
                $(".page_custom_loader").hide();
                // window.location.reload();
            }
        });
    });

    // $(".view_user_subscription").unbind('click');
    $(document).on("click", '.view_user_subscription',function(event) {
        var user_id = $(this).data('id');
        event.preventDefault();
        $(".page_custom_loader").show();
        $.ajax({
            url: base_url+'admin/listUserSubscription',
            method: 'POST',
            data: {'user_id': user_id},
            success: function(result) {
                $(".page_custom_loader").hide();
                var data = JSON.parse(result);
                $('.subscription-lists').empty();
                if(data.error == 'true') {
                    $('.info_message').text(data.message);
                    $('#info_message_model').modal('show');
                } else {
                    $('.subscription-lists').html(data.html);
                    $('#view_subscription_model').modal('show');
                }
            },
            error: function() {
                $(".page_custom_loader").hide();
                // window.location.reload();
            }
        });
    });

    $(".active_deactive_user").click(function(e) {
      e.preventDefault();
      var txt = $(this).text().toLowerCase();
      var user_id = $(this).data('id');
      $('.yes-deactive').attr('data-id', user_id);
      if(txt == 'active') {
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
    $(".yes-deactive").click(function(e) {
        e.preventDefault();
        var user_id = $(this).data('id');
        var user_status = $(this).data('status');
        var url;
        if(user_status == 'active') {
            url = base_url+'auth/deactivate_ajax';
        } else {
            url = base_url+'auth/activate_ajax';
        }
        $.ajax({
            url: url,
            method: 'POST',
            data: {user_id: user_id},
            success: function(result) {
                var data = JSON.parse(result);
                if(data.error == 'true') {
                    $('.info_message').text(data.message);
                    $('#active_deactive_user_model').modal('hide');
                    $('#info_message_model').modal('show');
                    window.location.reload();
                } else {
                    window.location.reload();
                }
            },
            error: function() {
                window.location.reload();
            }
        });
    });

    $(".delete_offer").on("click",function(){
       return confirm("Are you sure");
    })

    $("#normal_user_msg").validate({
      rules: {
          user_message: {
              required: true
          },
          message_subject:{
              required: true
          }
      },
      messages: {
          message_subject: 'Please enter message subject',
          user_message: 'Please enter your message'
      }
  });
  // message modal open
  $(document).on("click",".send_msg_touser",function(){
    var useremail = $(this).data('email');
    $("#recipient").val(useremail);
    $('#messageModal').modal('show');
    return false;
  });
  
  try {
    //WidgetChart 1
    var ctx = document.getElementById("widgetChart1");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          type: 'line',
          datasets: [{
            data: [78, 81, 80, 45, 34, 12, 40],
            label: 'Dataset',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 2
    var ctx = document.getElementById("widgetChart2");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [1, 18, 9, 17, 34, 22],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 3
    var ctx = document.getElementById("widgetChart3");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [65, 59, 84, 84, 51, 55],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 4
    var ctx = document.getElementById("widgetChart4");
    if (ctx) {
      ctx.height = 115;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [
            {
              label: "My First dataset",
              data: [78, 81, 80, 65, 58, 75, 60, 75, 65, 60, 60, 75],
              borderColor: "transparent",
              borderWidth: "0",
              backgroundColor: "rgba(255,255,255,.3)"
            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              display: false,
              categoryPercentage: 1,
              barPercentage: 0.65
            }],
            yAxes: [{
              display: false
            }]
          }
        }
      });
    }
    } catch (error) {
    console.log(error);
  }



 


 

  


})(jQuery);



(function ($) {
    // USE STRICT
    "use strict";
    $(".animsition").animsition({
      inClass: 'fade-in',
      outClass: 'fade-out',
      inDuration: 900,
      outDuration: 900,
      linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])',
      loading: true,
      loadingParentElement: 'html',
      loadingClass: 'page-loader',
      loadingInner: '<div class="page-loader__spin"></div>',
      timeout: false,
      timeoutCountdown: 5000,
      onLoadEvent: true,
      browser: ['animation-duration', '-webkit-animation-duration'],
      overlay: false,
      overlayClass: 'animsition-overlay-slide',
      overlayParentElement: 'html',
      transition: function (url) {
        window.location.href = url;
      }
    });
  
  
  })(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Map
  try {

    var vmap = $('#vmap');
    if(vmap[0]) {
      vmap.vectorMap( {
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: [ '#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Europe Map
  try {
    
    var vmap1 = $('#vmap1');
    if(vmap1[0]) {
      vmap1.vectorMap( {
        map: 'europe_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // USA Map
  try {
    
    var vmap2 = $('#vmap2');

    if(vmap2[0]) {
      vmap2.vectorMap( {
        map: 'usa_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true,
        selectedColor: null,
        hoverColor: null,
        colors: {
            mo: '#001BFF',
            fl: '#001BFF',
            or: '#001BFF'
        },
        onRegionClick: function ( event, code, region ) {
            event.preventDefault();
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Germany Map
  try {
    
    var vmap3 = $('#vmap3');
    if(vmap3[0]) {
      vmap3.vectorMap( {
        map: 'germany_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();

            alert( message );
        }
      });
    }
    
  } catch (error) {
    console.log(error);
  }
  
  // France Map
  try {
    
    var vmap4 = $('#vmap4');
    if(vmap4[0]) {
      vmap4.vectorMap( {
        map: 'france_fr',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Russia Map
  try {
    var vmap5 = $('#vmap5');
    if(vmap5[0]) {
      vmap5.vectorMap( {
        map: 'russia_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        hoverOpacity: 0.7,
        selectedColor: '#999999',
        enableZoom: true,
        showTooltip: true,
        scaleColors: [ '#C8EEFF', '#006491' ],
        normalizeFunction: 'polynomial'
      });
    }


  } catch (error) {
    console.log(error);
  }
  
  // Brazil Map
  try {
    
    var vmap6 = $('#vmap6');
    if(vmap6[0]) {
      vmap6.vectorMap( {
        map: 'brazil_br',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
            alert( message );
        }
      });
    }

  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // Use Strict
  "use strict";
  try {
    var progressbarSimple = $('.js-progressbar-simple');
    progressbarSimple.each(function () {
      var that = $(this);
      var executed = false;
      $(window).on('load', function () {

        that.waypoint(function () {
          if (!executed) {
            executed = true;
            /*progress bar*/
            that.progressbar({
              update: function (current_percentage, $this) {
                $this.find('.js-value').html(current_percentage + '%');
              }
            });
          }
        }, {
            offset: 'bottom-in-view'
          });

      });
    });
  } catch (err) {
    console.log(err);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Scroll Bar
  try {
    var jscr1 = $('.js-scrollbar1');
    if(jscr1[0]) {
      const ps1 = new PerfectScrollbar('.js-scrollbar1');      
    }

    var jscr2 = $('.js-scrollbar2');
    if (jscr2[0]) {
      const ps2 = new PerfectScrollbar('.js-scrollbar2');

    }

  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Select 2
  try {

    $(".js-select2").each(function () {
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    });

  } catch (error) {
    console.log(error);
  }


})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Dropdown 
  try {
    var menu = $('.js-item-menu');
    var sub_menu_is_showed = -1;

    for (var i = 0; i < menu.length; i++) {
      $(menu[i]).on('click', function (e) {
        e.preventDefault();
        $('.js-right-sidebar').removeClass("show-sidebar");        
        if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = -1;
        }
        else {
          for (var i = 0; i < menu.length; i++) {
            $(menu[i]).removeClass("show-dropdown");
          }
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = jQuery.inArray(this, menu);
        }
      });
    }
    $(".js-item-menu, .js-dropdown").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
    });

  } catch (error) {
    console.log(error);
  }

  var wW = $(window).width();
    // Right Sidebar
    var right_sidebar = $('.js-right-sidebar');
    var sidebar_btn = $('.js-sidebar-btn');

    sidebar_btn.on('click', function (e) {
      e.preventDefault();
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
      right_sidebar.toggleClass("show-sidebar");
    });

    $(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      right_sidebar.removeClass("show-sidebar");

    });
 

  // Sublist Sidebar
  try {
    var arrow = $('.js-arrow');
    arrow.each(function () {
      var that = $(this);
      that.on('click', function (e) {
        e.preventDefault();
        that.find(".arrow").toggleClass("up");
        that.toggleClass("open");
        that.parent().find('.js-sub-list').slideToggle("250");
      });
    });

  } catch (error) {
    console.log(error);
  }


  try {
    // Hamburger Menu
    $('.hamburger').on('click', function () {
      $(this).toggleClass('is-active');
      $('.navbar-mobile').slideToggle('500');
    });
    $('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
      var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
      $(this).toggleClass('active');
      $(dropdown).slideToggle('500');
      return false;
    });
  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Load more
  try {
    var list_load = $('.js-list-load');
    if (list_load[0]) {
      list_load.each(function () {
        var that = $(this);
        that.find('.js-load-item').hide();
        var load_btn = that.find('.js-load-btn');
        load_btn.on('click', function (e) {
          $(this).text("Loading...").delay(1500).queue(function (next) {
            $(this).hide();
            that.find(".js-load-item").fadeToggle("slow", 'swing');
          });
          e.preventDefault();
        });
      })

    }
  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  try {
    
    $('[data-toggle="tooltip"]').tooltip();

  } catch (error) {
    console.log(error);
  }

  // Chatbox
  try {
    var inbox_wrap = $('.js-inbox');
    var message = $('.au-message__item');
    message.each(function(){
      var that = $(this);

      that.on('click', function(){
        $(this).parent().parent().parent().toggleClass('show-chat-box');
      });
    });
    

  } catch (error) {
    console.log(error);
  }

})(jQuery);