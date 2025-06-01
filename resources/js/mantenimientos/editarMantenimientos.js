window.editarMantenimiento = function() {
    let date = document.getElementById("date").value
    let descripcion = document.getElementById("descripcion").value

    if(date == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "La fecha del mantenimiento es obligatoria.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(descripcion == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor ingrese una descripcion.",
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
        title: "¿DESEA EDITAR ESTE MANTENIMIENTO?",
        imageWidth: 100,
        imageHeight: 100,
        imageUrl: "/images/warning.png",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "CANCELAR",
        confirmButtonText: "EDITAR"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Mantenimiento editado",
                text: "El mantenimiento fue editada correctamente.",
                position: "center",
                showConfirmButton: false,
                timer: 2500,
                imageWidth: 100,
                imageHeight: 100,
                imageUrl: "/images/mantenimiento/agregar-mantenimiento.png",
            });

            setTimeout(() => {
                document.getElementById('formulario-asignacion').submit()
            }, "2500");

        }
    })
}
