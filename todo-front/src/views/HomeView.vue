<script setup>
</script>
<template>
  <main>
    <h1 class="text-center mb-5 mt-5"> Alunos Matriculados </h1>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12 mt-3 mb-3" v-for="(aluno, index) in alunos" :key="index"> 
          <div class="card"> 
            <div class="card-body">
              <span> {{aluno.nome_aluno}}

              </span>
                <div class="">
                  <a href="#" class="btn btn btn-outline-success col-1 m-1"> Concluir </a>
                  <a href="#" class="btn btn btn-outline-warning col-1 m-1"> Editar </a>
                  <button class="btn btn btn-outline-danger col-1 m-1" @click="deleteAluno(aluno.id)"> Excluir </button>
                </div>
            </div>
          </div>

        </div>
      </div>
      
    </div>
  </main>
</template>
<script>
import AlunoDataService from '../services/AlunoDataService';

export default{
  name: "alunos-list",
  data(){
    return {
      alunos: [],
    };
  },
  methods: {
    retrieveAlunos() {
      AlunoDataService.getAll()
      .then(response => {
        this.alunos = response.data.data;
        console.log(response.data.data);
      })
      .catch(e => {
        console.log(e);
      });
    },
    deleteAluno(id){
        AlunoDataService.delete(id)
        .then(response => {
          console.log(response.data)
          this.retrieveAlunos()
        })
        .catch(e => {
          console.log(e)
        });
    },
  },

  mounted(){
    this.retrieveAlunos();
  }
}

</script>

