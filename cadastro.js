const CadastroForm = {
    form: document.getElementById('form1'),
    
    init() {
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    },

    async handleSubmit(event) {
        event.preventDefault();
        const formData = new FormData(this.form);
        const dados = Object.fromEntries(formData.entries());

        if (!this.validar(dados)) return;

        try {
            await this.enviar(dados);
            alert('Cadastro realizado!');
            window.location.href = '../login/login.html';
        } catch (error) {
            alert(error.message);
        }
    },

    validar(dados) {
        if (dados.txtSenha !== dados.txtConfirmar) {
            alert("Senhas não conferem");
            return false;
        }
        if (dados.txtCPF.length !== 11) {
            alert("CPF Inválido");
            return false;
        }
        return true;
    },

    async enviar(dados) {
        const response = await fetch('CadastroController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dados)
        });

        const result = await response.json();
        if (!response.ok) throw new Error(result.erro || 'Erro no servidor');
        return result;
    }
};

CadastroForm.init();