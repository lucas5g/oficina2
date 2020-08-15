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

        <Input label="Valor" v-model="service.priceInitial" v-money="money" />

        <div class="input-block">
          <button class="button" type="submit" v-bind:disabled="btn.status">{{btn.label}}</button>
          <router-link class="button" type="submit" to="/servicos/listar">Cancelar</router-link>
        </div>
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
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import { VMoney } from "v-money";
// import money from "v-money"
export default {
  name: "ServiceList",
  components: {
    Input,
    TextArea,
    Header,
    Navbar,
    Footer,
  },
  data() {
    return {
      btn: { status: false, label: "Cadastrar" },
      service: {
        // client: "João vinicios",
        // salesman: "Rodrigo Junior",
        // description: "Troca das pastilhas",
        // priceInitial: "1350.00",
      },
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
      const price = this.service.priceInitial
        .replace("R$", "")
        .replace(".", "")
        .replace(",", ".");
      // .toLocaleString("en-US");

      const newService = {
        client: this.service.client,
        salesman: this.service.salesman,
        description: this.service.description,
        price,
      };

      this.btn = { status: true, label: "Cadastrando...." };
      try {
        await api.post("services", newService);
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
main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
form {
  width: 100%;
}

form .input-block {
  /* background: red; */
  width: 100%;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  column-gap: 2rem;
}

form .input-block button {
  width: 100%;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
  cursor: pointer;
  padding: 0.7rem;
  border-radius: 5px;
  font-weight: 500;
  font-size: 1rem;
  border: 1px solid transparent;
}
form .input-block a {
  width: 100%;
  color: #fff;
  background-color: #545b62;
  border-color: #545b62;
  cursor: pointer;
  padding: 0.7rem;
  border-radius: 5px;
  font-weight: 500;
  text-decoration: none;
  font-size: 1rem;
  border: 1px solid transparent;
  display: block;
  text-align: center;
}
</style>