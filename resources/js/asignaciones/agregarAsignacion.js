window.agregarAsignacion = function() {
    let fecha = document.getElementById("date").value
    let maquina = document.getElementById("maquina").value
    let obra = document.getElementById("obra").value


    if(fecha == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "La fecha obligatoria.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(maquina == 'default'){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor seleccione la maquina que desea asignar.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(obra == 'default'){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor seleccione la obra a la que desea asignar maquinaria.",
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
        title: "¿DESEA REGISTRAR ESTA ASIGNACION?",
        imageWidth: 100,
        imageHeight: 100,
        imageUrl: "/images/warning.png",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "CANCELAR",
        confirmButtonText: "REGISTRAR"
    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire({
                title: "Asignacion registrada",
                text: "La asignacion fue registrada correctamente.",
                position: "center",
                showConfirmButton: false,
                timer: 2500,
                imageWidth: 100,
                imageHeight: 100,
                imageUrl: "/images/obra/agregar.png",
            });

            setTimeout(() => {
                document.getElementById('formulario-maquina').submit()
            }, "2500");

        }
    })
}

