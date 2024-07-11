

<template>
    <div class="row justify-content-center">
        <h1 class="text-center mt-5 mb-5">Cadastrar Aluno</h1>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome" class="mb-1 mt-1">Nome do Aluno:</label>
                <input type="text" class="form-control" id="nome" name="nome_aluno"
                v-model="aluno.nome_aluno" required>
                <label for="registro" class="mb-1 mt-1">Número Acadêmico:</label>
                <input type="text" class="form-control" id="registro" name="nro_registro"
                v-model="aluno.nro_registro" required>
                <label for="matricula" class="mb-1 mt-1">Data Matrícula:</label>
                <input type="text" class="form-control" id="matricula" name="dat_matricula"
                v-model=" aluno.dat_inicio" required>
            </div>
            <button class="btn btn btn-outline-success col-4 mt-3 " @click="saveAluno">Criar</button>
        </div>

    </div>
</template>

<script>
import AlunoDataService from '../services/AlunoDataService';

export default {
    name: "Alunos-new",
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
        saveAluno(){
            var data = {
                nome_aluno: this.aluno.nome_aluno, //campo not null
                nro_registro: this.aluno.nro_registro, // campo not null
                dat_inicio: this.aluno.dat_inicio // campo not null
                
            };

            AlunoDataService.create(data)
            .then(response => {
                this.aluno.id = response.data.data.id;
                console.log(response.data);
            })
            .catch(e =>{
                console.log(e);
            });
        }

    }
}
</script>