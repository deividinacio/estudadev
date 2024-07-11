import http from "../ApiEstudadev";

class AlunoDataService {
    getAll(){
        return http.get("/alunos");
    }

    create(data)
    {
        return http.post("/alunos", data);
    }
    // eu que add
    delete (id)
    {
        return http.delete("/alunos", id);
    }

}

export default new AlunoDataService();