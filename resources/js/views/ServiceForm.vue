<template>
  <div class="container d-flex flex-column justify-content-center align-items-center">
    <!-- <div class="d-flex justify-content-center aling-itens-center bg-primary h-100"> -->
    <h1 class="border-bottom">Cadastro de Serviço</h1>
    <form class="col-md-6" @submit="handleSubmit">
      <Input label="Cliente" v-model="service.client" />

      <Input label="Vendedor" v-model="service.salesman" />

      <TextArea label="Descrição" v-model="service.description" />

      <Input label="Valor" v-model="service.value" />

      <button
        type="submit"
        class="btn btn-primary btn-lg btn-block"
        v-bind:disabled="btn.status"
      >{{btn.label}}</button>
      <router-link
        type="submit"
        class="btn btn-secondary btn-lg btn-block"
        to="/servicos/listar"
      >Cancelar</router-link>
    </form>
    <!-- </div> -->
  </div>
</template>

<script>
import api from "../services/api";
import Input from "../components/Input";
import TextArea from "../components/TextArea";
export default {
  name: "ServiceList",
  components: {
    Input,
    TextArea,
  },
  data() {
    return {
      btn: { status: false, label: "Cadastrar" },
      service: {
        // client: "João vinicios",
        // salesman: "Rodrigo Junior",
        // description: "Troca das pastilhas",
        // value: "120",
      },
    };
  },
  methods: {
    async handleSubmit(event) {
      event.preventDefault();
      // console.log(this.service.client)
      // return
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


<style>
</style>