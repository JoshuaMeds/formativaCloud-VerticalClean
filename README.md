IA utilizada: Google Gemini
Pronpt Utilizado: Todos os códigos da tela do projeto e a seguinte frase: Aplicar o VERTICAL SLICE e CLEAN ARCHITECTURE e CLEAN CODE nesses codigos


Principais Melhorias Aplicadas De acordo com o Gemini:
Segurança (Clean Code): Remoção de variáveis globais e uso de Password Hashing com Prepared Statements (evita SQL Injection, que era um risco grave no seu código original).

Vertical Slice: Toda a lógica de "Cadastro" está contida ou referenciada em um contexto único, facilitando a manutenção.

Clean Architecture: * Entidade/Repo: Lida com dados.

Service: Lida com a lógica (não sabe que o banco é MySQL ou que a interface é Web).

Controller: Lida com HTTP.

Dry (Don't Repeat Yourself): A função requisitar foi simplificada e o tratamento de erros centralizado no try/catch.
