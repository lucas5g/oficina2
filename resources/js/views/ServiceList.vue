<template>
  <div id="container">
    <Navbar />

    <Header text="Lista de Serviços" />
    <main>
      <Input type="date" label="Data do Serviço" v-model="date" @input="handleSubmit" />
      <Input label="Cliente" v-model="client" @input="handleSubmit" />
      <Input label="Vendedor" v-model="salesman" @input="handleSubmit" />

      <!-- <p v-if="!data">Carregando ....</p> -->

      <table v-if="services.length > 0">
        <thead>
          <tr>
            <!-- <th scope="col">ID</th> -->
            <th scope="col">Data</th>
            <th scope="col">Cliente</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor (R$)</th>
          </tr>
        </thead>
        <tbody v-for="service in services" :key="service.id">
          <tr>
            <th>{{service.created_at | moment }}</th>
            <!-- <th scope="row">{{service.id }}</th> -->
            <td>{{service.client }}</td>
            <td>{{service.salesman }}</td>
            <td>{{service.description }}</td>
            <td>{{ service.price | toCurrency }}</td>
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
import Input from "../components/Input";
import moment from "moment";
import useSWRV from "swrv";

export default {
  name: "ServiceList",
  components: {
    Header,
    Navbar,
    Footer,
    Input,
  },

  data() {
    return {
      date: "",
      client: "",
      salesman: "",
      services: [],
    };
  },
  methods: {
    async handleSubmit() {
      const obj = {
        date: this.date,
        client: this.client,
        salesman: this.salesman,
      };

      const { data } = await api.get("services", {
        params: obj,
      });
      this.services = data
      // console.log(data);
    },
  },
  // setup() {
  //   const { data, error, mutate } = useSWRV("services", async (url) => {
  //     const response = await api.get(url);
  //     return response.data;
  //   });
  //   return {
  //     data,
  //   };
  // },
  filters: {
    toCurrency: function (value) {
      const formatter = new Intl.NumberFormat("pt-BR", {
        style: "currency",
        currency: "BRL",
        minimumFractionDigits: 2,
      });
      const valueFormated = formatter.format(value);
      return valueFormated.replace("R$", "");
    },
    moment(date) {
      return moment(date).format("DD/MM/YY");
    },
  },
};
</script>


<style scoped>
table {
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed;
}
th,
td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  word-wrap: break-word;
}
/* th:first{
  padding: 3px;
} */
</style>