<template>
  <div id="container">
    <!-- <div class="d-flex justify-content-center aling-itens-center bg-primary h-100"> -->
    <Navbar />
    <Header text="Cadastrar Serviço" />
    <main>
      <form @submit="handleSubmit">
        <Input label="Cliente" v-model="service.client" />

        <Input label="Vendedor" v-model="service.salesman" />

        <TextArea label="Descrição" v-model="service.description" />

        <Input label="Valor" v-model="service.price" v-money="money" />

        <button type="submit" v-bind:disabled="btn.status">{{btn.label}}</button>
        <router-link type="submit" to="/servicos/listar">Cancelar</router-link>
      </form>
    </main>
    <Footer />
    <!-- </div> -->
  </div>
</template>

<script>
import api from "../services/api";
import Input from "../components/Input";
import TextArea from "../components/TextArea";
import Header from "../components/Header";
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import { VMoney } from "v-money";
// import money from "v-money"
export default {
  name: "ServiceList",
  components: {
    Input,
    TextArea,
    Header,
    Navbar,
    Footer
  },
  data() {
    return {
      btn: { status: false, label: "Cadastrar" },
      service: {
        client: "João vinicios",
        salesman: "Rodrigo Junior",
        description: "Troca das pastilhas",
        price: "120.00",
      },
      price: 123.45,
      money: {
        decimal: ",",
        thousands: ".",
        prefix: "R$ ",

        precision: 2,
        masked: false /* doesn't work with directive */,
      },
    };
  },
  methods: {
    async handleSubmit(event) {
      event.preventDefault();
      const price = this.service.price
        .replace("R$", "")
        .toLocaleString("pt-BR");

      this.btn = { status: true, label: "Cadastrando...." };
      try {
        await api.post("services", this.service);
        this.$router.push("/servicos/listar");
      } catch (err) {
        window.alert("Erro ao cadastrar");
        window.location.reload();
      }

      // console.log(this.service.value);
    },
  },
};
</script>
<style scoped>


</style>