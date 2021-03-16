<!DOCTYPE html>
<html lang="pt-BR">
<head>
     <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.html');
     ?>
     <link rel="stylesheet" href="/SMILIPS/view/css/home.css">
     <title>Home</title>
</head>
<body>
     <header>
          <?php
               require_once('/xampp/htdocs/SMILIPS/view/nav.html');
          ?>
     </header>

     <main>
          <div id="filter">
               <div class="search">
                    <input type="select" placeholder="Buscar por Endereço">
                    <button>Buscar</button>
               </div>
               <div class="field-input">
                    <select name="selec" id="select">
                         <option value="apartamento">Tipos de Imoveis</option>
                         <option value="apartamento">Apartamento</option>
                         <option value='casa'>Casa</option>
                         <option value='kitnet'>Kitnet</option>
                         <option value='condominio'>Condominio</option>
                    </select>    
                    <select name="selec" id="select">
                    <option value="apartamento">Cidade</option>
                         <option value="apartamento" selected>Icó</option>
                    </select> 
                    <select name="selec" id="select">
                         <option value="apartamento">Bairro</option>
                         <option value="apartamento">Apartamento</option>
                         <option value='casa'>Casa</option>
                         <option value='kitnet'>Kitnet</option>
                         <option value='condominio'>Condominio</option>
                    </select>             
               </div>
               <input type="checkbox" id="check">
               <label for="check"><span><i class="fas fa-search-plus"></i>Mais Opções</span></label>
               <div class="field-input hide">
                    <select name="selec" id="select">
                         <option value="apartamento">Dormitorio</option>
                         <option value="apartamento">Apartamento</option>
                         <option value='casa'>Casa</option>
                         <option value='kitnet'>Kitnet</option>
                         <option value='condominio'>Condominio</option>
                    </select>    
                    <select name="selec" id="select">
                    <option value="apartamento">Suíte</option>
                         <option value="apartamento">Icó</option>
                    </select> 
                    <select name="selec" id="select">
                         <option value="apartamento">Garagem</option>
                         <option value="apartamento">Apartamento</option>
                         <option value='casa'>Casa</option>
                         <option value='kitnet'>Kitnet</option>
                         <option value='condominio'>Condominio</option>
                    </select>             
               </div>
               <div class="field-input hide">
                    <select name="selec" id="select">
                         <option value="apartamento">Valor Inicial</option>
                         <option value="apartamento">Apartamento</option>
                         <option value='casa'>Casa</option>
                         <option value='kitnet'>Kitnet</option>
                         <option value='condominio'>Condominio</option>
                    </select>    
                    <select name="selec" id="select">
                    <option value="apartamento">Valor Final</option>
                         <option value="apartamento">Icó</option>
                    </select> 
                    <select name="selec" id="select">
                         <option value="apartamento">Área (m²)</option>
                         <option value="apartamento">Apartamento</option>
                         <option value='casa'>Casa</option>
                         <option value='kitnet'>Kitnet</option>
                         <option value='condominio'>Condominio</option>
                    </select>             
               </div>
          </div>
     </main>
    
     <?php
           require_once('/xampp/htdocs/SMILIPS/view/footer.html');
     ?>
     <script src="/SMILIPS/view/js/home.js"></script>
</body>
</html>