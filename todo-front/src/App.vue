<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-lg bg-success">
      <div class="container-fluid">
          <RouterLink class="nav-brand" to="/">
          <img src="../img/logo1.png" alt="img-logo" class="img-thumbnail img-fluid">
          </RouterLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <RouterLink class="nav-link badge fs-4 me-2" to="/">Listar</RouterLink>
              </li>
              <li class="nav-item">
                  <RouterLink class="nav-link badge fs-4 me-2" to="/new">Cadastrar</RouterLink>
              </li>
              <!--
              <li class="nav-item">
                  <RouterLink class="nav-link badge fs-4 me-2" to="/edit">Editar</RouterLink>
              </li>
              -->
              <li class="nav-item">
                  <RouterLink class="nav-link badge fs-4 me-5" to="/about">Sobre</RouterLink>
              </li>
            </ul>
        </div>
      </div>
    </nav>
       <div class="container mt-2">
        <RouterView />
      </div>
  </header>
</template>

  
<script>
export default {
  name: "app"
};
</script>

