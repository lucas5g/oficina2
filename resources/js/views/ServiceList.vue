<template>
  <div id="container-service-list">
    <header>
      <h1>Lista de Serviços</h1>
    </header>
    <main>
      <p v-if="!data">Carregando ....</p>
      <table v-else>
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
            <td>{{service.price }}</td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</template>

<script>
import api from "../services/api";
import useSWRV from "swrv";

export default {
  name: "ServiceList",

  setup() {
    const { data, error, mutate } = useSWRV("services", async (url) => {
      const response = await api.get(url);
      return response.data;
    });
    return {
      data,
    };
  },
};
</script>


<style scoped>
#container-service-list {
  /* background: red; */
  height: 80vh;
  /* width: 98%; */
  margin: 0 auto;
  /* display: flex;
  flex-direction: column;
  justify-content: center; */
}
#container-service-list header {
  background-color: #03a9f426;
  height: 5rem;
  display: flex;
  justify-content: center;
  align-items: center;
}

#container-service-list main{
  width: 95%;
  margin: 20px auto;
}

table {
  border-collapse: collapse;
  width: 100%;
}
th,
td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}


@media (min-width: 700px) {
  #container-service-list main{
    width: 60%;
    /* background: red; */
  }
}
</style>