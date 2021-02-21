$(function () {

  function onContatoEditClick() {
    var linha = $(this).closest('.contato-item');
    var cpf = linha.children(".cpf_contato").text();
    var nome = linha.children(".nome_contato").text();
    var email = linha.children(".email").text();
    var cep = linha.children(".cep").text();
    var cidade = linha.children(".cidade").text();
    var numero_residencial = linha.children(".numero_residencial").text();
    var numero_telefone = linha.children(".numero_telefone").text(); 

    $('#cpf_contato').val(cpf).prop('readonly','readonly');

    $('#email').val(email);
    $('#nome_contato').val(nome);
    $('#cep').val(cep);
    $('#cidade').val(cidade);
    $('#numero_residencial').val(numero_residencial);
    $('#numero_telefone').val(numero_telefone);
    
    $('#modo').val(1); 
    $('#novoContato').modal();

  }

  // limpar o modal quando for fechado
    $('#novoContato').on('hidden.bs.modal', function () {
    $('#cpf_contato').val("").removeAttr('readonly');
    $('#email').val("");
    $('#nome_contato').val("");
  });

  $('.contato-edit').click(onContatoEditClick);

});