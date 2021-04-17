<template>

    <button
        class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante()"
        >
        Eliminar
    </button>

</template>
<script>
export default {
    props:['vacanteId'],
    methods: {
        eliminarVacante(){
            // this.$swal('Hola desde SweetAlert');

            this.$swal.fire({
                     title: '¿Deseas eliminar esta vacante?',
                    text: "Una vez eliminada no se puede recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText:'No'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            // Enviar Peticion a axios
                            const params = {
                                id : this.vacanteId,
                                // _method: 'delete'
                            };

                            axios.delete(`/vacantes/${this.vacanteId}`, params)
                                .then(response =>  {

                                        if (result.isConfirmed) {
                                                this.$swal.fire(
                                                'Vacante Eliminado!',
                                                response.data.mensaje,
                                                'success'
                                                )
                                            }
                                            //   console.log(response)

                                            // Eliminar del dom
                                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                                })
                                .catch(error => {
                                    console.log(error)
                                });
                            }

                    })
        }
    }
}
</script>
