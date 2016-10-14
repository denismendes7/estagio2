<?php
	$this->assign('title','Htools | Concentradores');
	$this->assign('nav','concentradores');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/concentradores.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Concentradores
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="concentradorCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Concentrador">Concentrador<% if (page.orderBy == 'Concentrador') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IpNas">Ip Nas<% if (page.orderBy == 'IpNas') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Secret">Secret<% if (page.orderBy == 'Secret') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_SshPorta">Ssh Porta<% if (page.orderBy == 'SshPorta') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_User">User<% if (page.orderBy == 'User') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricao">Descricao<% if (page.orderBy == 'Descricao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_CodPerfil">Cod Perfil<% if (page.orderBy == 'CodPerfil') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('concentrador') || '') %></td>
				<td><%= _.escape(item.get('ipNas') || '') %></td>
				<td><%= _.escape(item.get('secret') || '') %></td>
				<td><%= _.escape(item.get('sshPorta') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('user') || '') %></td>
				<td><%= _.escape(item.get('descricao') || '') %></td>
				<td><%= _.escape(item.get('codPerfil') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="concentradorModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="concentradorInputContainer" class="control-group">
					<label class="control-label" for="concentrador">Concentrador</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="concentrador" placeholder="Concentrador" value="<%= _.escape(item.get('concentrador') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ipNasInputContainer" class="control-group">
					<label class="control-label" for="ipNas">Ip Nas</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ipNas" placeholder="Ip Nas" value="<%= _.escape(item.get('ipNas') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="secretInputContainer" class="control-group">
					<label class="control-label" for="secret">Secret</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="secret" placeholder="Secret" value="<%= _.escape(item.get('secret') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="sshPortaInputContainer" class="control-group">
					<label class="control-label" for="sshPorta">Ssh Porta</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="sshPorta" placeholder="Ssh Porta" value="<%= _.escape(item.get('sshPorta') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="userInputContainer" class="control-group">
					<label class="control-label" for="user">User</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="user" placeholder="User" value="<%= _.escape(item.get('user') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoInputContainer" class="control-group">
					<label class="control-label" for="descricao">Descricao</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="descricao" rows="3"><%= _.escape(item.get('descricao') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codPerfilInputContainer" class="control-group">
					<label class="control-label" for="codPerfil">Cod Perfil</label>
					<div class="controls inline-inputs">
						<select id="codPerfil" name="codPerfil"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteConcentradorButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteConcentradorButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Remover Concentrador</button>
						<span id="confirmDeleteConcentradorContainer" class="hide">
							<button id="cancelDeleteConcentradorButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteConcentradorButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="concentradorDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Concentrador
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="concentradorModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveConcentradorButton" class="btn btn-primary">Salvar Altera&ccedil;&otilde;es</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="concentradorCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newConcentradorButton" class="btn btn-primary">Adicionar Concentrador</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
