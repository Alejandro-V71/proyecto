document.addEventListener("DOMContentLoaded", function() {
    let formulario = document.getElementById("form");
    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        headerToolbar: { center: "dayGridMonth,timeGridWeek" },

        events: "http://127.0.0.1:8000/dash/tecnico/calendario/mostrar",
        dateClick: function(info) {
            formulario.reset();
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;
            $("#evento").modal("show");
        },

        eventClick: function(info) {
            axios
                .post(
                    "http://127.0.0.1:8000/dash/tecnico/calendario/editar/" +
                        info.event.id
                )

                .then(res => {
                    console.log(info.event);
                    formulario.id.value = res.data.id;
                    formulario.title.value = res.data.title;
                    formulario.horaSolcitudServicio.value = res.data.horaSolcitudServicio;
                    formulario.start.value = res.data.start;
                    formulario.end.value = res.data.end;
                    formulario.descripcionProblema.value = res.data.descripcionProblema;

                    $("#evento").modal("show");
                })
                .catch(err => {
                    console.warn(err);
                });
        }
    });

    calendar.render();
});
