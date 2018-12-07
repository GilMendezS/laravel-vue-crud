<template>
	 <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <pensamiento-form-component @new="addPensamiento"></pensamiento-form-component>
            
            <pensamiento-component 
            v-for="pensamiento in pensamientos" 
            :key="pensamiento.id" 
            :pensamiento='pensamiento'
            @delete="eliminarElPensamiento(index)"
            @update="updatePensamiento(index,...arguments)"
            >
            
            </pensamiento-component>
        </div>
    </div>
</template>

<script>
	 export default  {
        data () {
        return {
            pensamientos: []
            }
        },
        methods: {
        	addPensamiento (pensamiento) {

        		this.pensamientos.push(pensamiento)
        	},
        	eliminarElPensamiento(index) {
        		this.pensamientos.splice(index,1)
        	},
        	updatePensamiento(index, pensamiento) {
        		this.pensamientos[index] = pensamiento
        	}
        },
        mounted () {
            axios.get('/pensamientos')
            .then((response) => {
                this.pensamientos = response.data
            })
        }
    }
</script>