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
              <span> {{aluno.nome_aluno}}</span>
                <div class="">
                 <!-- <a href="#" class="btn btn-outline-success col-1 m-1"> Concluir </a> -->
                 <!-- <button class="btn btn btn-outline-warning col-1 m-1"> Editar </button> -->
                  <button class="btn btn-outline-warning col-1 m-1 "><RouterLink class="text-decoration-none btn-outline-warning" :to="{name: 'edit', params:{id: aluno.id}}">Editar</RouterLink> </button>
                  <button class="btn btn-outline-danger col-1 m-1" @click="deleteAluno(aluno.id)"> Excluir </button>
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
        let resposta = confirm('Tem certeza que deseja excluir este aluno ?')
          if(resposta)
          {            
            AlunoDataService.delete(id)
            .then(response => {
              console.log(response.data)
            
              this.retrieveAlunos()
            })
            .catch(e => {
              console.log(e)
            })
          };
      },
       
    updateAluno(id, data){
      AlunoDataService.update(id, data)
      .then(response =>{
        console.log(response.data)
      })
      .catch(e =>{
        console.log(e)
      });
    },
      
  },

  mounted(){
    this.retrieveAlunos();
  }
}

</script>

