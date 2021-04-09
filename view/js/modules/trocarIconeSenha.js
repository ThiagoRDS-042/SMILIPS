function trocarIconeSenha(senhas, index, btn) {
  if (senhas[index].type == "password") {
    senhas[index].type = "text";
    btn.classList.remove("fa-eye");
    btn.classList.add("fa-eye-slash");
  } else {
    senhas[index].type = "password";
    btn.classList.add("fa-eye");
    btn.classList.remove("fa-eye-slash");
  }
  senhas[index].focus();
}

export default trocarIconeSenha;
