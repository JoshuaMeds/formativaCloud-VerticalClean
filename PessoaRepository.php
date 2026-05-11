class PessoaRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function existePorCpfOuEmail($cpf, $email) {
        $stmt = $this->pdo->prepare("SELECT id FROM pessoa WHERE cpf = ? OR email = ?");
        $stmt->execute([$cpf, $email]);
        return $stmt->fetch() !== false;
    }

    public function salvar(array $dados) {
        $sql = "INSERT INTO pessoa (cpf, email, senha, nome, matricula, acesso_nivel) 
                VALUES (:cpf, :email, :senha, :nome, :matricula, :acesso)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($dados);
    }
}