<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="float-left">
                    <h1>Viandas</h1>
                </div>
                <div class="float-right">
                    <div class="btn-group">
                        <a class="btn btn-outline-info" href="/vianda" role="button">Crear Vianda</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-container">
                  <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                       <th>Nombre</th>
                       <th>Descripción</th>
                       <th>Precio</th>
                       <th>Vegetariana</th>
                   </thead>
                   <tbody>
                    <tr v-for="vianda in viandas" v-if="viandas">
                      <td>{{vianda.nombre}}</td>
                      <td>{{vianda.descripcion}}</td>
                      <td>{{vianda.precio}}</td>
                      <td>{{vianda.vegetariana == 0 ? 'No' : 'Si'}}</td>
                  </tr>
                  <tr v-if="!viandas">
                      <td colspan="8">No hay registro !!</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>
</div>
</template>

<script>
export default {

    data() {
        return {
            viandas: [],
            pageCount: 1,
            endpoint: 'api/viandas?page='
        };
    },

    created() {
        this.fetch();
    },

    methods: {
        fetch(page = 1) {
            axios.get(this.endpoint + page)
            .then(({data}) => {
                this.viandas = data.data;
                this.pageCount = data.meta.last_page;
            });
        },

        removeVianda(id) {
            this.viandas = _.remove(this.viandas, function (vianda) {
                return vianda.id !== id;
            });
        }
    }
}
</script>
