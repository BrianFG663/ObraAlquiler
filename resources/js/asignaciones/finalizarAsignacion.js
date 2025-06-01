window.finalizarAsignacion = function() {
    let motivo = document.getElementById("motivo").value
    let km = document.getElementById("km").value
    let end_date = document.getElementById("end_date").value

    if(end_date == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "La fecha de finalizacion es obligatoria.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(km == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor ingrese el kilometraje recorrido por la maquina.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(motivo == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor ingrese motivo de finalizacion.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    Swal.fire({
        title: "¿DESEA FINALIZAR ESTA ASIGNACION?",
        text: "La maquina volvera a estar disponible",
        imageWidth: 100,
        imageHeight: 100,
        imageUrl: "/images/warning.png",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "CANCELAR",
        confirmButtonText: "FINALIZAR"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Asignacion finalizada",
                text: "Maquina en camino de regreso.",
                position: "center",
                showConfirmButton: false,
                timer: 2500,
                imageWidth: 100,
                imageHeight: 100,
                imageUrl: "/images/obra/agregar.png",
            });

            setTimeout(() => {
                document.getElementById('formulario-asignacion').submit()
            }, "2500");

        }
    })
}
