window.onload = function() {
    //let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    //bannerNode.parentNode.removeChild(bannerNode);
    $('.loader').fadeOut();
    $('#loaded').fadeIn();
  }
function prtno(tot){
    document.getElementById("r_next_logo").style.display = "block";
    document.getElementById("how_txt").style.display = "none";
    document.getElementById("prt_no").style.display = "none";

    
    document.getElementById("bp_prt_no").style.display = "block";

    document.getElementById("bp_prt_no").value = tot.value;

    document.getElementById("bp_prt_1").value = document.getElementById("sl_prt_1").value;
    document.getElementById("bp_prt_2").value = document.getElementById("sl_prt_2").value;
    document.getElementById("bp_prt_3").value = document.getElementById("sl_prt_3").value;


  if(tot.value == 1){
    document.getElementById("prt_1").style.display = "block";



    document.getElementById("bp_prt_2").value = "none";
    document.getElementById("bp_prt_3").value = "none";



  }else if(tot.value == 2){
    document.getElementById("prt_1").style.display = "block";
    document.getElementById("prt_2").style.display = "block";
    document.getElementById("bp_prt_3").value = "none";


  }else if(tot.value == 3){
    document.getElementById("prt_1").style.display = "block";
    document.getElementById("prt_2").style.display = "block";
    document.getElementById("prt_3").style.display = "block";



  }
}
function prt1(prt1){document.getElementById("bp_prt_1").value = prt1.value;}
function prt2(prt2){document.getElementById("bp_prt_2").value = prt2.value;}
function prt3(prt3){document.getElementById("bp_prt_3").value = prt3.value;}


function instagram(){  window.location.assign("https://www.instagram.com/campusleague2k23"); }
function eventRule(){
  location.href = "eventRules.html";
}
function eventDetail(){
  location.href = "eventDetails.html";
}
function Register(){
  alert('Coming Soon !');
}



$(document).on('submit', '#checkstudent', function (e) {
  e.preventDefault();
  

  $('#next_logo').attr('src','cl/loading.gif');

  var formData = new FormData(this);
  formData.append("check_student", true);

  $.ajax({
      type: "POST",
      url: "code.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
          
          var res = jQuery.parseJSON(response);
          if(res.status == 'new') {
              
              $('#checkstudent').hide();
              $('#newPendstudent').show();
              $('#newPendreg_no').val(res.reg_no);
              $('#show_reg_no').text(res.reg_no);

          }else if(res.status == 'online_pend'){
              
             $('#checkstudent').hide();
              $('#online_pend').show();
              $('#procces_name').text(res.name);


          }
          else if(res.status == 'offline_pend'){
              
              var form = $('<form action="confirm.srini" method="post">' + '<input type="text" name="pay" value="' + res.reg_no + '" />' +'</form>');
                $('body').append(form);
                form.submit();

  
            }
          else if(res.status == 'reg'){

              $('#checkstudent').hide();
              $('#regstudent').show();
              $('#Regreg_no').val(res.reg_no);
              
          }


      }
  });

});

$(document).on('submit', '#newPendstudent', function (e) {
  e.preventDefault();
  
  if( $('.prt_1').val() == $('.prt_2').val() || $('.prt_2').val() == $('.prt_3').val() || $('.prt_3').val() == $('.prt_1').val()){
    alert('Your Selecting Event is same');

  }
  else{

  $('#r_next_logo').hide();

  var formData = new FormData(this);
  formData.append("addPend_student", true);

  $.ajax({
      type: "POST",
      url: "code.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
          
          var res = jQuery.parseJSON(response);
          if(res.status == 'error') {
              
              $('#r_next_logo').show();
              alert(res.message);

          }else if(res.status == 'suc'){

              $('#registerModal').modal('hide');

              var form = $('<form action="confirm.srini" method="post">' + '<input type="text" name="pay" value="' + res.reg_no + '" />' +'</form>');
              $('body').append(form);
              form.submit();

          }


      }
  });

}

});


$(document).on('click', '.close', function (e) {
      e.preventDefault();

      $('#registerModal').modal('hide');
      window.location.replace("/");

  

});