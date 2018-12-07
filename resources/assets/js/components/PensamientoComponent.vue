<template>
   <div class="panel panel-default">
        <div class="panel-heading">Publicado en {{pensamiento.created_at}}</div>

            <div class="panel-body">
                <input v-if="editMode" type="text" class="form-control" v-model="pensamiento.description">
                <p v-else>{{pensamiento.description}}</p>
                
            </div>
            <div class="panel-footer">
                <button v-if="editMode" class="btn btn-success" v-on:click="update">Guardar Cambios</button>
                <button v-else class="btn btn-default" v-on:click="edit">Editar</button>
                <button class="btn btn-danger" v-on:click="eliminarPensamiento">Eliminar</button>
            </div>
    </div>
</template>

<script>
    export default  {
        props: {
            pensamiento: {
                type: Object
            }
        },
        data () {
        return {
            editMode : false
        }
        },
        methods: {
            eliminarPensamiento () {
                axios.delete(`/pensamientos/${this.pensamiento.id}`).then((response) => {
                    this.$emit('delete')
                })

            },
            edit () {
                this.editMode = true 
            },
            update () {
                axios.put(`/pensamientos/${this.pensamiento.id}`,this.pensamiento).then((response) => {
                    this.editMode =false

                    const pensamiento = response.data
                    console.log(response)
                    this.$emit('update',pensamiento)
                })
                .catch(function(error){
                    console.log(error)
                })

            }
        }

    }
</script>
