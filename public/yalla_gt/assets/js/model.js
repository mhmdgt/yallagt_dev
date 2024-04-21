var modal = document.getElementById('login-modal');

var btn = document.getElementById("login-btn");

var span = document.getElementsByClassName("close-login")[0];
if(btn)
{
  btn.onclick = function() {
    modal.style.display = "block";
  }
}

if(span)
{
  span.onclick = function() {
    modal.style.display = "none";
  }

}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



var modal_reg_sell= document.getElementById('reg-sell-modal');



var span_reg_sell = document.getElementsByClassName("close-reg-sell")[0];


if(span_reg_sell)
{
  span_reg_sell.onclick = function() {
    modal_reg_sell.style.display = "none";
  }
  
}

window.onclick = function(event) {
  if (event.target == modal) {
    span_reg_sell.style.display = "none";
  }
}
var modal_reg = document.getElementById('reg-modal');

var btn_reg = document.getElementById("reg-btn");

var span_reg = document.getElementsByClassName("close-reg")[0];
if(btn_reg)
{
  btn_reg.onclick = function() {
    modal_reg.style.display = "block";
  }
}

if(span_reg)
{
  span_reg.onclick = function() {
    modal_reg.style.display = "none";
  }
  
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal_reg.style.display = "none";
  }
}





var modal_sell = document.getElementById('login-sell-modal');

var btn_sell = document.getElementById("login-btn-sell");

var span_sell = document.getElementsByClassName("close-login-sell")[0];
if(btn_sell)
{
  btn_sell.onclick = function() {
    modal_sell.style.display = "block";
  }
  
}
if(span_sell)
{
  span_sell.onclick = function() {
    modal_sell.style.display = "none";
  }
  
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal_sell.style.display = "none";
  }
}
var btn_log_reg=document.getElementById("login-from-reg");
var modal_reg = document.getElementById('reg-modal');
var modal_log1 = document.getElementById('login-modal');
if(btn_log_reg)
{
  btn_log_reg.onclick = function() {
    modal_reg.style.display = "none";
    modal_log1.style.display = "block";
  }
}

var btn_reg_log=document.getElementById("reg-from-login");
var modal_reg = document.getElementById('reg-modal');
var modal_log2 = document.getElementById('login-modal');
if(btn_reg_log)
{
    btn_reg_log.onclick = function() {
    modal_log2.style.display = "none";
    modal_reg.style.display = "block";
   }
}

var btn_log_sell_reg=document.getElementById("reg-from-login-sell");
var modal_reg_sell = document.getElementById('reg-sell-modal');
var modal_log3 = document.getElementById('login-sell-modal');
if(btn_log_sell_reg)
{
  btn_log_sell_reg.onclick = function() {
    modal_log3.style.display = "none";
    modal_reg_sell.style.display = "block";
    
  }
}

var btn_reg_sell_login=document.getElementById("login-from-reg-sell");
var modal_login_sell = document.getElementById('login-sell-modal');
var modal_reg_sell = document.getElementById('reg-sell-modal');
if(btn_reg_sell_login)
{
  btn_reg_sell_login.onclick = function() {
    modal_reg_sell.style.display = "none";
    modal_login_sell.style.display = "block";
    
   
    
  }
  
}

var btn_log_sell_reg=document.getElementById("login-btn-sell-moblie");
// var modal_reg = document.getElementById('reg-sell-modal');
var modal_log4 = document.getElementById('login-sell-modal');
if(btn_log_sell_reg)
{
  btn_log_sell_reg.onclick = function() {
    modal_log4.style.display = "block";
  }
}

    // Function to check if the user is logged in
  //  function checkUserLogin() {
    //     axios.post('/login')
    //         .then(response => {
    //             // User is logged in
    //             const user = response.data.user;
    //             // Your logic to handle the user being logged in goes here

    //         })
    //         .catch(error => {
    //             // User is not logged in
    //             const popup = document.getElementById('login-modal');
    //             popup.style.display = 'block';
    //         });
    // }

    // // Call the function on page load or whenever you need to check the login status
    // checkUserLogin();
    ////////////////////////login_page_mobile////////////////
var modal_page_login = document.getElementById('login-page-modal');

var btn_page_login = document.getElementById("login_form_page");

var span_page_login = document.getElementsByClassName("close-page-login")[0];
if(btn_page_login)
{
  btn_page_login.onclick = function() {
    modal_page_login.style.display = "block";
  }
}

if(span_page_login)
{
  span_page_login.onclick = function() {
    modal_page_login.style.display = "none";
  }

}


window.onclick = function(event) {
  if (event.target == modal_page_login) {
    modal_page_login.style.display = "none";
  }
}

////////////////////////////
var modal_page_reg = document.getElementById('reg-page-modal');

var btn_page_reg = document.getElementById("register_form_page");

var span_page_reg = document.getElementsByClassName("close-page-reg")[0];
if(btn_page_reg)
{
  btn_page_reg.onclick = function() {
    modal_page_reg.style.display = "block";
  }
}

if(span_page_reg)
{
  span_page_reg.onclick = function() {
    modal_page_reg.style.display = "none";
  }
  
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal_page_reg.style.display = "none";
  }
}
/////reg-page-from-login/////
var btn_page_reg_log=document.getElementById("reg-page-from-login");
var modal_page_reg = document.getElementById('reg-page-modal');
var modal_page_log = document.getElementById('login-page-modal');
if(btn_page_reg_log)
{
    btn_page_reg_log.onclick = function() {
    modal_page_log.style.display = "none";
    modal_page_reg.style.display = "block";
   }
}

/////login-page-from-reg///////
var btn_page_loging_reg=document.getElementById("login-page-from-reg");
var modal_page_reg1 = document.getElementById('reg-page-modal');
var modal_page_log1 = document.getElementById('login-page-modal');
if(btn_page_loging_reg)
{
    btn_page_loging_reg.onclick = function() {
      modal_page_reg1.style.display = "none";
      modal_page_log1.style.display = "block";
      
   }
}



