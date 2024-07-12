
<template>
    <div class="row justify-content-center">
        <h1 class="text-center mt-5 mb-5">Atualizar Cadastro</h1>
        <div class="col-md-6">
           <div class="form-group">
                <label for="nome" class="mb-1 mt-1">*Nome do Aluno:</label>
                <input type="text" class="form-control" id="nome" name="nome_aluno"
                v-model="aluno.nome_aluno" required>
                <label for="registro" class="mb-1 mt-1">*Número Acadêmico:</label>
                <input type="number" class="form-control" id="registro" name="nro_registro"
                v-model="aluno.nro_registro" required>
                <label for="matricula" class="mb-1 mt-1">*Data Matrícula:</label>
                <input type="date" class="form-control" id="matricula" name="dat_matricula"
                v-model=" aluno.dat_inicio" required>
                  <label for="matricula" class="mb-1 mt-1">Data Conclusão:</label>
                <input type="date" class="form-control" id="matricula" name="dat_matricula"
                v-model=" aluno.dat_conclusao" required>
                  <label for="matricula" class="mb-1 mt-1">Data Colação Grau:</label>
                <input type="date" class="form-control" id="matricula" name="dat_matricula"
                v-model=" aluno.dat_colacao_grau" required>
                  <label for="matricula" class="mb-1 mt-1">Data Expedição Diploma:</label>
                <input type="date" class="form-control" id="matricula" name="dat_matricula"
                v-model=" aluno.dat_expedicao_diploma" required>
            </div>
            <button class="btn btn btn-outline-success col-4 mt-4 " @click="updateAluno(this.$route.params.id)">Atualizar</button>
        </div>

    </div>
</template>

<script>
import AlunoDataService from '../services/AlunoDataService';
import moment from 'moment'
export default {
    
    name: "Alunos-edit",
    data(){
        return{
            aluno:{
                id: null,
                nome_aluno: "",
                nro_registro: "",
                dat_inicio: "",
                dat_conclusao: "",
                dat_colacao_grau: "",
                dat_expedicao_diploma: ""

            }
        };
    },
    methods:{

         retrieveAlunos() {
      AlunoDataService.getById(this.$route.params.id)
      .then(response => {
        this.aluno = response.data.data;
        console.log(response.data.data);
      })
      .catch(e => {
        console.log(e);
      });
    },

        updateAluno(id){
            var data = {
                nome_aluno: this.aluno.nome_aluno, //campo not null
                nro_registro: this.aluno.nro_registro, // campo not null
                dat_inicio: this.aluno.dat_inicio,
                dat_conclusao: this.aluno.dat_conclusao,
                dat_colacao_grau: this.aluno.dat_colacao_grau,
                dat_expedicao_diploma: this.aluno.dat_expedicao_diploma
            };

            AlunoDataService.update(id, data)
            .then(response => { 
                console.log(response.data);
                window.alert('Aluno atualizado com sucesso'); window.location.href='/';
               
            })
            .catch(e =>{
                console.log(e);
                alert('Erro ao atualizar aluno');
            });
        },
        // para teste 
        alerta(){
            alert(this.$route.params.id);
        }

    },

      mounted(){
    this.retrieveAlunos();
  }

}
</script>