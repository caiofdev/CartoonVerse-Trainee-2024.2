<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/fonts.css">
  <link rel="stylesheet" href="/public/css/user-list.css">
  <link rel="stylesheet" href="/public/css/criar-user.css">
  <link rel="stylesheet" href="/public/css/excluir-user.css">
  <link rel="stylesheet" href="/public/css/visualizar-user.css">
  <title>CartoonVerse</title>
</head>
<body>
    <!-- Modal de Criar -->
    <div id="modalCriar" class="modal">
      <div class="modal-content">
        <span class="close" id="closeCriar" onclick="fecharModal('modalCriar')"
          >&times;</span
        >
        <div class="modal-body">
          <!-- Campos de Entrada -->
           <div class="modal-form">
            <form action="" method="post" class="modal-form" id="new-user">
              <!-- Imagem do usuário -->
                <label for="input-image" class="user-image" tabindex="0" id="image">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                  </svg>
                </label>
                <input type="file" accept="image/png,image/jpeg, image/jpg" class="input-image" form="new-user" name="input-image" id="input-image" required>
              <div class="input-group" id="first">
                <input type="text" placeholder="Nome" form="new-user" required/>
              </div>
              <div class="input-group">
                <input type="email" placeholder="Email" form="new-user" required/>
              </div>
              <div class="input-group">
                <input type="" placeholder="Senha" form="new-user" required/>
              </div>
              <!-- Botões de Ação -->
              <div class="modal-buttons">
                <button class="cancel" onclick="fecharModal('modalCriar')" form="new-user"  formnovalidate type="button">
                  Cancelar
                </button>
                <button class="confirm" form="new-user" formmethod="post">Confirmar</button>
              </div>
            </form>
           </div>
        </div>
      </div>
    </div>
      <!-- Modal de Visualizar -->
      <div id="modalVisualizar" class="modal">
        <div class="modal-content">
          <span class="close" id="closeCriar" onclick="fecharModal('modalVisualizar')"
            >&times;</span
          >
          <div class="modal-body">
            <!-- Dados do Usuário -->
             <div class="modal-form">
              <form action="" method="post" class="modal-form" id="dados-user">
                <!-- Imagem do usuário -->
                  <label for="dados-image" class="user-image" tabindex="0" id="image">
                    <img src="https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2023/12/13/istock-1331962950-1iemnjv7a6ng6.jpg" alt="">
                  </label>
                  <input type="file" accept="image/png,image/jpeg" class="input-image" form="dados-user" name="input-image" id="input-image">
                <div class="input-group" id="first">
                  <input type="text" placeholder="id" value="6" form="dados-user" readonly/>
                </div>
                <div class="input-group">
                  <input type="text" placeholder="Nome" value="Caio Webson Codinson" form="dados-user" readonly/>
                </div>
                <div class="input-group">
                  <input type="email" placeholder="Email" value="CaioWebsonCodinson@Webson.Codinson" form="dados-user" readonly/>
                </div>
                <div class="button-fechar">
                  <button class="fechar" onclick="fecharModal('modalVisualizar')" form="dados-user" type="button">Fechar</button>
                </div>
              </form>
             </div>
          </div>
        </div>
      </div>
    <!-- Modal de Editar -->
    <div id="modalEditar" class="modal">
      <div class="modal-content">
        <span class="close" id="closeEditar" onclick="fecharModal('modalEditar')"
          >&times;</span
        >
        <div class="modal-body">
          <!-- Campos de Entrada -->
           <div class="modal-form">
            <form action="" method="post" class="modal-form" id="edit-user">
              <!-- Imagem do usuário -->
                <label for="input-image" class="user-image" tabindex="0" id="image">
                  <img src="https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2023/12/13/istock-1331962950-1iemnjv7a6ng6.jpg" alt="">
                </label>
                <input type="file" accept="image/png,image/jpeg, image/jpg" class="input-image" form="edit-user" name="input-image" id="input-image" required>
              <div class="input-group" id="first">
                <input type="text" value="Rafael Webson Choppinson Jr" placeholder="Nome" form="edit-user" required/>
              </div>
              <div class="input-group">
                <input type="email" value="Rafael Pagode da Silva" placeholder="Email" form="edit-user" required/>
              </div>
              <div class="input-group">
                <input type="" value="Rafael Pagode da Silva" placeholder="Senha" form="edit-user" required/>
              </div>
              <!-- Botões de Ação -->
              <div class="modal-buttons">
                <button class="cancel" onclick="fecharModal('modalEditar')" form="edit-user"  formnovalidate type="button">
                  Cancelar
                </button>
                <button class="confirm" form="edit-user" formmethod="post">Confirmar</button>
              </div>
            </form>
           </div>
        </div>
      </div>
    </div>
    <!-- Modal de Excluir -->
    <div id="modalExcluir" class="modal">
      <div class="modal-content">
        <span class="close" id="closeExcluir" onclick="fecharModal('modalExcluir')">&times;</span>
        <p>Tem certeza de que deseja excluir este item?</p>
        <div class="modal-footer">
          <button onclick="confirmarExclusao()" class="btn-confirmar">Confirmar</button>
          <button onclick="fecharModal('modalExcluir')" class="btn-cancelar">Cancelar</button>
        </div>
      </div>
    </div>
  <div class="container">
    <div id="header">
    <!-- Titulo -->
    <h1>LISTA DE USUARIOS</h1>
    <button id="usuario" onclick="abrirModal('modalCriar')">
      <p class="criar">Novo</p>
      <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
      </svg>
    </button>
  </div>
  <div id="main">
    <!-- Tvz um contador de registros -->
    <!-- adicionar botão de criar usuários -->
     <!-- Tabela -->
     <table>
      <tr>
        <th class="id"><p>ID</p></th>
        <th class="nome"><p>NOME</p></th>
        <th class="email"><p>EMAIL</p></th>
        <th class="acoes"><p>AÇÕES</p></th>
      </tr>
      <?php foreach($users as $user): ?>
        <tr>
          <td class="id"><p><?= $user->id ?></p></td>
          <td class="nome"><p><?= $user->name ?></p></td>
          <td class="email">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg> -->
            <p><?= $user->email ?></p>
          </td>
          <td class="acoes">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" onclick="abrirModal('modalVisualizar')">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" onclick="abrirModal('modalEditar')">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" onclick="abrirModal('modalExcluir')">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
          </td>
        </tr>
      <?php endforeach; ?>
     </table>
     <!-- paginação -->
     <div class="paginacao">
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
          </svg>
        </button>
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
          </svg>
        </button>
    </div>
  </div>
  </div>
</body>
<script src="/public/js/modais.js"></script>
</html>