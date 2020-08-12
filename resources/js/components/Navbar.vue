<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <a class="navbar-brand" href="/">Oficina 2.0</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarCollapse"
      aria-controls="navbarCollapse"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link class="nav-link " to="/servicos/listar">Listar</router-link>
          <!-- <a class="nav-link" href="/">Listar</a> -->
        </li>
        <li class="nav-item">
          <router-link class="nav-link"  to="/servicos/cadastrar">Cadastrar</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  
};
</script>

<style>
/* #navbarCollapse > ul > li:nth-child(1) > af */
 .router-link-exact-active{
  color: routewhite;
  font-weight: bold;
  /* background: red; */
}
</style>