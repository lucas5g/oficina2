<template>
  <div id="container">
    <Navbar />

    <Header text="Lista de Serviços" />
    <main>
      <div id="input-block">
        <Input type="date" label="Data do Serviço" v-model="date" @input="handleSubmit" />
        <Input label="Cliente" v-model="client" @input="handleSubmit" />
        <Input label="Vendedor" v-model="salesman" @input="handleSubmit" />
      </div>

      <p v-if="loading">Carregando...</p>
      <p v-if="services.length === 0 && date && !loading">Nada Encontrado :(</p>
      <table v-if="services.length > 0 && !loading">
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
            <th title="Clique para mais opções">
              <router-link :to="`/servicos/editar/${service.id}`">{{service.created_at | moment }}</router-link>
            </th>
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
      loading: false, 
    };
  },
  methods: {
    async handleSubmit() {
      const obj = {
        date: this.date,
        client: this.client,
        salesman: this.salesman,
      };

      this.loading = true

      const { data } = await api.get("services", {
        params: obj,
      });
      this.loading = false

      this.services = data;
      // console.log(data);
    },
  },
  // mounted() {
  //   (async () => {
  //     const { data } = await api.get("services");
  //     this.services = data;
  //   })();
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
@media (min-width: 700px) {
  main #input-block {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1rem;
  }
}
</style>