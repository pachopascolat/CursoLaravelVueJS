<template>
	<div>
		<div class="alert alert-success" v-if="saved">
			<strong>Success!</strong> Your vianda has been saved successfully.
		</div>

		<div class="well well-sm" id="vianda-form">
			<form class="form-horizontal" method="post" @submit.prevent="onSubmit">
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" v-model="vianda.nombre" class="form-control input-sm" placeholder="Nombre de la vianda">
				</div>
				<div class="form-group">
					<label>Descripción</label>
					<textarea v-model="vianda.descripcion" class="form-control input-sm" placeholder="Descripción"></textarea>
				</div>
				<div class="form-group">
					<label>Precio</label>
					<input type="number" v-model="vianda.precio" class="form-control input-sm" placeholder="Precio de la Vianda">
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" v-model="vianda.vegetariana">
					<label class="form-check-label">
						Vegetariana
					</label>
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</template>

<script>
export default {

	data() {
		return {
			errors: [],
			saved: false,
			vianda: {
				nombre: null,
				descripcion: null,
				precio: 0,
				vegetariana: false
			}
		};
	},

	methods: {
		onSubmit() {
			this.saved = false;

			axios.post('api/viandas', this.vianda)
			.then(({data}) => this.setSuccessMessage())
			.catch(({response}) => this.setErrors(response));
		},

		setErrors(response) {
			this.errors = response.data.errors;
		},

		setSuccessMessage() {
			this.reset();
			this.saved = true;
		},

		reset() {
			this.errors = [];
			this.vianda = {nombre: null, descripcion: null, precio: 0, vegetariana: false};
		}
	}
}
</script>
