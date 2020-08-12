<template>
  <div class="container d-flex justify-content-center align-items-center">
    <!-- <div class="d-flex justify-content-center aling-itens-center bg-primary h-100"> -->
    <form class="col-md-6" @submit="handleSubmit">
      <div class="form-group">
        <label class="w-100">
          Cliente
          <input
            type="text"
            class="form-control form-control-lg"
            v-model="service.client"
            required
          />
        </label>
      </div>

      <div class="form-group">
        <label class="w-100">
          Vendedor
          <input
            type="text"
            class="form-control form-control-lg"
            v-model="service.salesman"
            required
          />
        </label>
      </div>

      <div class="form-group">
        <label class="w-100">
          Descrição
          <textarea
            class="form-control form-control-lg"
            v-model="service.description"
            required
          />
        </label>
      </div>

      <div class="form-group">
        <label class="w-100">
          Valor
          <input
            type="text"
            class="form-control form-control-lg"
            v-model="service.value"
            required
          />
        </label>
      </div>
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
export default {
  name: "ServiceList",
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