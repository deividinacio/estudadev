import http from "../ApiEstudadev";

class AlunoDataService {
    getAll(){
        return http.get("/alunos");
    }

    getById(id){
        return http.get(`/alunos/${id}`);
    }

    create(data)
    {
        return http.post("/alunos", data);
    }
    delete (id)
    {
        return http.delete(`/alunos/${id}`);
    }
    update (id, data)
    {
        return http.put(`/alunos/${id}`, data);
    }

}

export default new AlunoDataService();