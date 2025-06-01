window.editarAsignacion = function() {
    let maquina = document.getElementById("machine_id").value
    let start_date = document.getElementById("start_date").value
    let end_date = document.getElementById("end_date").value
    let obra = document.getElementById("project_id").value
    console.log(end_date)
    let mensaje = "";

    if(start_date == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "La fecha de inicio es obligatoria.",
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
            text: "Por favor seleccione una obra.",
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
            text: "Por favor seleccione una maquina.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(end_date == ''){
        mensaje = '¡ATENCION! ESTA ASIGNACION NO TIENE FECHA DE FINALIZACION ASIGNADA.'
    }else{
        mensaje = `TIEMPO DE LA ASIGNACION ${start_date} - ${end_date}`  
    }

    Swal.fire({
        title: "¿DESEA EDITAR ESTA ASIGNACION?",
        text: `${mensaje}`,
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
                title: "Asignacion editada",
                text: "La asignacion fue editada correctamente.",
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
