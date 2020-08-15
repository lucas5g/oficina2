<template>
  <div id="container">
    <Navbar />

    <Header text="Lista de Serviços" />
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
            <td>{{formatter.format(service.price) }}</td>
          </tr>
        </tbody>
      </table>


    
    </main>
    <Footer />
  </div>
</template>

<script>
import api from "../services/api";
import Header from "../components/Header";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import useSWRV from "swrv";

export default {
  name: "ServiceList",
  components: {
    Header,
    Navbar,
    Footer,
  },
  data(){
    return {
      formatter: new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
        minimumFractionDigits: 2
      })
    }
  }, 

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


</style>