<template>
    <div>
  
       <ul class="flex flex-wrap justify-center">
            <li
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class="verificarClaseActiva(skill)"
                v-for="( skill, i )  in this.skills"
                v-bind:key="i"
                v-on:click="activar($event)"
            >{{skill}}</li>
        </ul>

        <input type="hidden" name="skills" id="skills" value="" />
    </div>
</template>    

<script>
export default {
    props: ['skills','oldskills'],
    mounted: function() // se ejecuta 2
    { 
        //  console.log(this.oldskills);
        document.querySelector('#skills').value= this.oldskills;
    },
    created: function()
    { // Ejecuta primero 1
      
      // Debemos llenar el oldskill
        if(this.oldskills){
            // Creamos el arrego separao por coma
            const skillsArray = this.oldskills.split(',');
            skillsArray.forEach(element => {
                this.habilidades.add(element);   
            });

        }

    },
    data: function(){
        return {
            habilidades: new Set()  // Los set no permite tener datos repetidos
        }
    },
    methods:{
        activar(e){
            // console.log('diste clic ' + e.target.textContent);
                if(e.target.classList.contains('bg-red-400'))
                    {   // Las skill esta en activo
                        e.target.classList.remove('bg-red-400'); 
                        e.target.classList.remove('text-white'); 

                        // Eliminar del set habilidades
                        this.habilidades.delete(e.target.textContent);
                    } else {
                        // No esta activo, añadirlo
                        e.target.classList.add('bg-red-400');
                        e.target.classList.add('text-white');

                        // Agregar al set de habilidades
                        this.habilidades.add(e.target.textContent)
                    }  
                    
                    // Agregar las habiliades el input hidden
                    const stringHabilidades = [...this.habilidades]; // convertimos el set
                    document.querySelector('#skills').value = stringHabilidades;
        },
        verificarClaseActiva(skill){
            // console.log(skill);
            
            return this.habilidades.has(skill) ? 'bg-red-400 text-white' : '';

        }
    }
}
</script>