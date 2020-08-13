<template>
  <div class="container d-flex justify-content-center py-5">
    <p v-if="services.length === 0">Carregando ....</p>

    <div v-else class="">
      <h1 class="border-bottom">Cadastro de Serviço</h1>

      <table class="table ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor</th>
          </tr>
        </thead>
        <tbody v-for="service in services" :key="service.id">
          <tr>
            <th scope="row">{{service.id }}</th>
            <td>{{service.client }}</td>
            <td>{{service.salesman }}</td>
            <td>{{service.description }}</td>
            <td>{{service.value }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import api from "../services/api";

export default {
  name: "ServiceList",
  data() {
    return {
      services: [],
    };
  },
  mounted() {
    (async () => {
      const { data } = await api.get("/services");
      this.services = data;
      console.log(data);
    })();
  },
};
</script>


<style>
</style>