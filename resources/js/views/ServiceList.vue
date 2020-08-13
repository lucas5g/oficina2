<template>
  <div class="container d-flex justify-content-center py-5">
    <p v-if="!data">Carregando ....</p>

    <div v-else>
      <h1 class="border-bottom">Cadastro de Serviço</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor</th>
          </tr>
        </thead>
        <tbody v-for="service in data" :key="service.id">
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
import useSWRV from "swrv";

export default {
  name: "ServiceList",

  setup() {
    const { data, error, mutate } = useSWRV("services", async url  => {
      const response = await api.get(url)
      return response.data
    });

    return {
      data,
    };
  },
};
</script>


<style>
</style>