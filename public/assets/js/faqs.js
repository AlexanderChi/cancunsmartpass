const faqs = document.querySelectorAll('.faq .faq-container');
faqs.forEach((faq) => {
    faq.addEventListener('click', (e) => {
        e.currentTarget.classList.toggle('activa');

        const respuesta = faq.querySelector('.reply');
        const alturaRealRespuesta = respuesta.scrollHeight;
        console.log(alturaRealRespuesta);
    });
});
