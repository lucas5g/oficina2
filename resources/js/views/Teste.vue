<template>
  <div>
    <div v-if="!data">loading..</div>
    <div v-else> {{data }} </div>
  </div>
</template>

<script>
import useSWRV from "swrv";

export default {
  name: "Teste",

  setup() {
    const { data } = useSWRV(
      "http://localhost:3000/api/services",
      (key) => {
        return fetch(key).then((res) => res.json());
      }
    );

    return {
      data,
    
    };
  },
};
</script>