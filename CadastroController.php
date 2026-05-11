header('Content-Type: application/json');
require_once "../../Database/Connection.php"; // Fábrica de PDO
require_once "PessoaRepository.php";
require_once "CadastroService.php";

$input = json_decode(file_get_contents('php://input'), true);

try {
    $pdo = Connection::get();
    $repo = new PessoaRepository($pdo);
    $service = new CadastroService($repo);

    $service->executar($input);
    echo json_encode(["status" => "sucesso"]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["erro" => $e->getMessage()]);
}