
var controlecampo = 1;
function adicionarcampo() {
    controlecampo++;


    document.getElementById('telefoneform').insertAdjacentHTML('beforeend', ' <div class="formgroup" id="telefoneform' + controlecampo + '"><input type="number" name="telefone" id="telefone" autocomplete="off" maxlenght="12" placeholder="Digite o Numero do seu Telefone"> <button type="button" id=" '+controlecampo+'" onclick="removecampo('+controlecampo+')"> - </button></div>');
}


function removecampo(idcampo){
    document.getElementById('telefoneform' + idcampo + '').remove();
    
}