<template>
  <div class="container">
    <p v-if="services.length === 0">
      Carregando ....
    </p>

    <table class="table" v-else>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Cliente</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Descrição</th>
          <th scope="col">Valor</th>
        </tr>
      </thead>
      <tbody  v-for="service in services" :key="service.id">
        <tr >
          <th scope="row">{{service.id }}</th>
          <td>{{service.client }}</td>
          <td>{{service.salesman }}</td>
          <td>{{service.description }}</td>
          <td>{{service.value }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import api from "../services/api";

export default {
  name: "ServiceList",
  data(){
    return {
      services: []
    }
  },
  mounted() {
    (async () => {
      const { data } = await api.get("/api/services");
      this.services = data
      console.log(data);
    })();
  },
};
</script>


<style>
</style>