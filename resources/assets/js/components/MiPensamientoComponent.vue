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
			this.pensamientos = [...this.pensamietos, pensamiento]// more elegant way! ;)
        		//this.pensamientos.push(pensamiento)
        	},
        	eliminarElPensamiento(index) {
        		this.pensamientos.splice(index,1)// this is nice! but you can user es6
			// sometimes you will have objects instead simple plain text, for example a thought with ids, in 
			//thtat case you can use  aiflter method
			//lets imagine that you have an object as below:
			// const item = {  name: 'name', id: 1}
			/*
				removing the correct item without index variable
				this.pensamientos.filter( p => p.id !== item.id )
			
			+/	
			
        	},
        	updatePensamiento(index, pensamiento) {
        		this.pensamientos[index] = pensamiento
        	}
        },
        mounted () {
	//always use a catch function to handle errors :)
            axios.get('/pensamientos')
            .then((response) => {
                this.pensamientos = response.data
            })
	    .catch(err => console.log(err)) // and even you can use a finally method to do somethig after to finish a http request
	    .finally(() => console.log('do something'))
	    
        }
    }
</script>
