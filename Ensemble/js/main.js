jQuery(document).ready(function( $ ) {

  $(window).scroll(function () {
    var height = $(window).height();
    var scroll = $(window).scrollTop();
    if (scroll) {
      $(".header-hide").addClass("scroll-header");
    } else {
      $(".header-hide").removeClass("scroll-header");
    }

  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });

  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  // Smooth scroll for the menu and links with .scrollto classes
  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if( ! $('#header').hasClass('header-fixed') ) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Modal video
  new ModalVideo('.js-modal-btn', {channel: 'youtube'});

  // Init Owl Carousel
  $('.owl-carousel').owlCarousel({
    items: 4,
    autoplay: true,
    loop: true,
    margin: 30,
    dots: true,
    responsiveClass: true,
    responsive: {

      320: { items: 1},
      480: { items: 2},
      600: { items: 2},
      767: { items: 3},
      768: { items: 3},
      992: { items: 4}
    }
  });

// custom code


//here start the quizz

const QUESTIONS = [
  "Votre plat préféré ?",
  "Votre style de musique favori ?",
  "Votre signe astrologique ?",
  "Votre deuxième prénom ?",
  "Votre date d'anniversaire ?",
  "Votre couleur préférée ?",
  "Votre film préféré",
  "Votre acteur/actrice préféré(e) ?",
  "Votre destination de voyage de rêve ?",
  "Votre passe temps favori ?"
]
const RANDOMNUMBER = [];
const RESPONSES = [];
const verifResponse= [];
const questionChoose = [];
let random = Math.floor(Math.random()*10);


//event choix question
 document.getElementById('choose').addEventListener('click',()=>{
  let br = document.createElement('br');

  let numberQuestion = document.getElementsByName('numberQuestion');
  let getStarted = document.getElementById('get-started');
  getStarted.appendChild(br);
  let numberChoose = 0;
  
  for(let i=0;i<numberQuestion.length;i++){
    if(numberQuestion[i].checked){
      numberChoose = numberQuestion[i].value;
    }
  }
  //container for question
  let div = document.createElement('div');
  div.id = "container_question";
  getStarted.appendChild(div);

  for(let i=0; i<numberChoose;i++){

    while(RANDOMNUMBER.includes(random)){
      random = Math.floor(Math.random()*10);
    }
      let label = document.createElement('label');
      label.innerHTML = QUESTIONS[random];
      questionChoose.push(QUESTIONS[random]);
      label.setAttribute('for',`question_${i}`);
      let input = document.createElement('input');
      input.id = `question_${i}`;
      input.setAttribute('class','inputStyle');
      input.setAttribute('type','text');
      let br = document.createElement('br');
      div.appendChild(label);
      div.appendChild(input);
      div.appendChild(br);
      RANDOMNUMBER.push(random);
  }

  let button = document.createElement('input');
  button.setAttribute('type','submit');
  button.setAttribute('value','soumettre');
  button.id="soumettre";
  div.appendChild(button);
  document.getElementById('choose').setAttribute('disabled','disabled');


  // le premier joueur rentre les response

  document.getElementById('soumettre').addEventListener('click',()=>{

    //on cache la div précédente
    
    document.getElementById('container_question').style.display = "none";

    for(let i=0 ; i<numberChoose; i++){
      RESPONSES.push(document.getElementById(`question_${i}`).value);
      document.getElementById(`question_${i}`).value="";
    }

    function newTableau(tab1,tab2){
      let ASSOC=[];
      for(let i=0; i<tab2.length;i++){

        ASSOC[tab1[i]] = tab2[i];
      }
      return ASSOC;
    }
   
    const ASSOCIATIF = newTableau(questionChoose,RESPONSES);
    

    //container response
    let divResponse = document.createElement('div');
    divResponse.id = "container_response";
    getStarted.appendChild(divResponse);
    let h2 = document.createElement('h2');
    h2.innerHTML = "seras-tu trouver toutes les réponses ?";

    divResponse.appendChild(h2);

    let regex = /Votre/gi;

    for(let i=0; i<numberChoose;i++){
      let label = document.createElement('label');
      let string = questionChoose[i].replace(regex,"Son/Sa");
      label.innerHTML = string;
      label.setAttribute('for',`question_0${i}`);
      let input = document.createElement('input');
      input.id = `question_0${i}`;
      input.setAttribute('class','inputStyle');
      input.setAttribute('type','text');
      let br = document.createElement('br');
      divResponse.appendChild(label);
      divResponse.appendChild(input);
      divResponse.appendChild(br);
    }
    let buttonVal = document.createElement('input');
    buttonVal.setAttribute('type','submit');
    buttonVal.setAttribute('value','Valider');
    buttonVal.id="Validate_response";
    divResponse.appendChild(buttonVal);
    
    //event pour la vérification du deuxième joueur

    document.getElementById('Validate_response').addEventListener('click',()=>{

      let goodResponse = 0;
      document.getElementById('container_response').style.display = "none";
      for(let i=0 ; i<numberChoose; i++){

        verifResponse.push(document.getElementById(`question_0${i}`).value);
      }
      let congratulation = document.createElement('div');
      congratulation.id = "congrat";
      let title = document.createElement('h2');
      let paragraphe = document.createElement('p');
      
      for(let i=0; i< RESPONSES.length;i++){
        if(RESPONSES[i].toUpperCase()== verifResponse[i].toUpperCase()){
          goodResponse +=1;
        }
      }

      if(goodResponse < numberChoose/2){
        title.innerHTML = "aie aie aie, c'est pas terrible comme score";
        paragraphe.innerHTML = `ton score est de ${goodResponse}/${numberChoose}`;
      }
      else if(goodResponse == numberChoose/2) {
        title.innerHTML = "pile la moitié! mais tu peux faire mieux j'en suis sur";
        paragraphe.innerHTML = `ton score est de ${goodResponse}/${numberChoose}`;
      }
      else if((goodResponse>numberChoose/2) && goodResponse< numberChoose){
        title.innerHTML = "wooow tu connais bien ta moitié on dirait O_0";
        paragraphe.innerHTML = `ton score est de ${goodResponse}/${numberChoose}`;
      }
      else{
        title.innerHTML = "Score parfait,  incroyable j'en reviens pas !";
        paragraphe.innerHTML = `ton score est de ${goodResponse}/${numberChoose}`;
      }

      getStarted.appendChild(congratulation);
      congratulation.appendChild(title);
      congratulation.appendChild(paragraphe);
    })
})
})


});
