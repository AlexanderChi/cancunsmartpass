// <!-- testimonials carousel -->
$(document).ready(function () {
    $("#owl-demo1").owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: true
            }
        }
    })
});


// <!-- botton más -->
// const plus = document.querySelector(".plus"),
//     menos = document.querySelector(".menos"),
//     num = document.querySelector(".num");

// let a = 1;
// plus.addEventListener("click", () => {
//     a++;
//     a = (a < 10) ? "0" + a : a;
//     num.innerText = a;
//     console.log(a);
// });

// menos.addEventListener("click", ()=>{
//     if(a > 1){
//         a--;
//         a = (a < 10) ? "0" + a : a;
//         num.innerText = a;
//     };
// });

//Preguntas frecuentes
const faqs = document.querySelectorAll('.faq');
const faqcontainer = document.querySelectorAll('.faq-container');
let faqactiva = null;

faqcontainer.forEach((faq) => {
    faq.addEventListener('click', (e) => {
        faqcontainer.forEach((elemento) => {
            elemento.classList.remove('activa')
        });

        e.currentTarget.classList.toggle('activa');
        faqactiva = faq.dataset.faqs;
    });
});

const preguntas = document.querySelectorAll('.faq-accordion .faq-container');
preguntas.forEach((faq) => {
    faq.addEventListener('click', (e) => {
        e.currentTarget.classList.toggle('activa');

        const respuesta = faq.querySelector('.reply');
        const alturaRealRespuesta = respuesta.scrollHeight;

        if(!respuesta.style.maxHeight){
            // Sí esta vacio el maxHeight se garega el valor.
            respuesta.style.maxHeight = alturaRealRespuesta + 'px';
        }else {
            respuesta.style.maxHeight = null;
        }

        //Reiniciar las demas preguntas
        preguntas.forEach((elemento) => {
            if (faq !== elemento) {
                elemento.classList.remove('activa');
                elemento.querySelector('.reply').style.maxHeight = null;
            }
        });
    });
});

// ProgressBar & Step
const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll('.btn-netx');
const progress = document.getElementById('progress');
const formSteps = document.querySelectorAll('.form-step');
const progressSteps = document.querySelectorAll('.progress-step');

let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        formStepsNum++;
        updateFormSteps();
        updateProgressbar();
    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      formStepsNum--;
      updateFormSteps();
      updateProgressbar();
    });
  });

function updateFormSteps(){
    formSteps.forEach((formStep) => {
        formStep.classList.contains('form-step-active') &&
          formStep.classList.remove('form-step-active');
      });

    formSteps[formStepsNum].classList.add('form-step-active');
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
      if (idx < formStepsNum + 1) {
        progressStep.classList.add('progress-step-active');
      } else {
        progressStep.classList.remove('progress-step-active');
      }
    });
    const progressActive = document.querySelectorAll('.progress-step-active');

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
