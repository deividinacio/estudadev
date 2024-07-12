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

              <div class="row justify-content-md-center">
              <div class="col-sm-3">
                <p><strong>Nome:</strong></p>
                <span> {{aluno.nome_aluno}}</span>
              </div>
              <div class="col-sm-2">
                <p><strong>R.A:</strong></p>
                <span> {{aluno.nro_registro}}</span>
              </div>
               <div class="col-sm">
                <p><strong>Início:</strong></p>
                <span> {{aluno.dat_inicio}}</span>
              </div>
               <div class="col-sm">
                <p><strong>Conclusão:</strong></p>
                <span> {{aluno.dat_conclusao}}</span>
              </div>
               <div class="col-sm">
                <p><strong>Colação:</strong></p>
                 <span> {{aluno.dat_colacao_grau}}</span>
              </div>
              <div class="col-sm">
                <p><strong>Diploma:</strong></p>
                <span> {{aluno.dat_expedicao_diploma}}</span>
              </div>
               <div class="col-sm">
                  <button class="btn btn-outline-warning  m-1 "><RouterLink :to="{name: 'edit', params:{id: aluno.id}}" class="text-decoration-none btn-outline-warning">Editar</RouterLink> </button>
              </div>
              <div class="col-sm">
                  <button class="btn btn-outline-danger  m-1" @click="deleteAluno(aluno.id)"> Excluir </button>
               </div>
              </div>


            
                 <!-- <a href="#" class="btn btn-outline-success col-1 m-1"> Concluir </a> -->
                 <!-- <button class="btn btn btn-outline-warning col-1 m-1"> Editar </button> -->
                
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

