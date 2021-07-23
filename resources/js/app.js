require('./bootstrap');

/*Una volta installato vue, servirà riscrivere la funzione*/
window.addEventListener("load", function () {
    const deleteDish = document.querySelectorAll(".areUsure");
    deleteDish.forEach(form => {
  
        form.addEventListener("submit", (event) => {
            if (!confirm("Vuoi davvero cancellare questo piatto? Ricorda che puoi sempre nasconderlo dal tuo menù!")) {
            event.preventDefault();
            }
        });
  
    });
});
