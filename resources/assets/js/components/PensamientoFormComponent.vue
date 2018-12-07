<template>
	<div class="panel panel-default">
        <div class="panel-heading">Formulario</div>

        <div class="panel-body">
            <form  v-on:submit.prevent="value">
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" class="form-control" v-model="description">
                </div>
                <button type="submit" class="btn btn-primary">Oprimeme</button>
            </form>
        </div>
    </div>
</template>

<script>
	export default {
		data () {
			return {
				description: ''
			}
		},
		methods: {
			value () {
				const params = {
            description: this.description
				}
          this.description= ''
          axios.post('/pensamientos', params)
          .then((response) => {
              const pensamiento = response.data
              this.$emit('new',pensamiento)
          })
          .catch(function (error) {
              console.log(error);
          });



			
			}
		}
		
	}
	
</script>