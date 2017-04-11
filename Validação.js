<script language="text/javascript" type"text/javascript">
  function validar() {
    var form = document.forms["formCad"]
    var nome = form.nome.value //pega o nome
    var email = form.email.value // pega o email
    var matricula = form.matricula.value //pega a matrícula
    var senha = form.senha.value // pega a senha
    var repSenha = form.confSenha.value // pega a repSenha

    erro = false

    if(nome == ""){
      alert('Preencha o seu nome')
      erro = true
    }
    if(email == ""){
      alet('Preencha o seu e-mail')
      erro = true
    }
    if(matricula = ""){
      alert('Preencha sua matrícula')
      erro = true
    }
    if(matricula != 9){
      alert('Matricula incorreta')
      erro = true
    }
    if(senha == ""){
      alert('Preencha sua senha')
      erro = true
    }
    if(senha != repSenha){
      alert('Senhas diferentes')
      erro = true
    }
  }


</scrit>
