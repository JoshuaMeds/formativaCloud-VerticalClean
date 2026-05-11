class CadastroService {
    private $repo;

    public function __construct(PessoaRepository $repo) {
        $this->repo = $repo;
    }

    public function executar(array $dados) {
        if ($this->repo->existePorCpfOuEmail($dados['cpf'], $email)) {
            throw new Exception("Usuário já cadastrado.");
        }

        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $dados['acesso'] = 0; // Nível padrão

        return $this->repo->salvar($dados);
    }
}