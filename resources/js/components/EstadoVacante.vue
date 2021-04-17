<template>
    <span
        class="px-2 inline-flex text-xs leading-5 cursor-pointer font-semibold rounded-full font-bold"
            :class="claseEstadoVacante()"
            @click="cambiarEstado"
            :key="this.estadoVacanteData"
        >
            {{estadoVacante}}
    </span>
</template>

<script>
export default {
    props: ['estado','vacanteId','pathVacante'],
    data: function(){
        return {
            estadoVacanteData : null
        }
    },
    mounted: function(){
        // console.log(Number(this.vacanteId))
        this.estadoVacanteData = Number(this.estado)
    },
    methods: {
        // Esperan a que suceda el evento

        claseEstadoVacante(){
            return this.estadoVacanteData  == 1 ? 'bg-green-100 text-green-800 ' : 'bg-red-100 text-red-800 '
        },

        cambiarEstado() {
            if(this.estadoVacanteData === 1){
                this.estadoVacanteData = 0;
            }else{
                 this.estadoVacanteData = 1;
            }

            // Enviar Axios
            const params = {
                estado: this.estadoVacanteData
            }

            axios
                .post(this.pathVacante, params)
                .then(response => console.log(response))
                .then(error => console.log(error))
        }
    },
    computed:{
        // Metodos que se ejecuta cuando un valor haya sido cambiado
        // EL compute se ejecuta cuando esta listo el documento

        estadoVacante(){
            return this.estadoVacanteData === 1 ? 'Activa' : 'Inactiva'
        }
    }
}


// Nota: cuando en consola te sale de color negro, son string, para convertirlos a entero usamos Number()
</script>
