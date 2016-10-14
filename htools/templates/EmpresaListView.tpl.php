<?php
	$this->assign('title','Htools | Empresas');
	$this->assign('nav','empresas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/empresas.js").wait(function(){
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
	<i class="icon-th-list"></i> Empresas
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="empresaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NomeFantasia">Nome Fantasia<% if (page.orderBy == 'NomeFantasia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_RazaoSocial">Razao Social<% if (page.orderBy == 'RazaoSocial') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cnpj">Cnpj<% if (page.orderBy == 'Cnpj') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Endereco">Endereco<% if (page.orderBy == 'Endereco') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Site">Site<% if (page.orderBy == 'Site') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Telefone">Telefone<% if (page.orderBy == 'Telefone') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Telefone2">Telefone2<% if (page.orderBy == 'Telefone2') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('nomeFantasia') || '') %></td>
				<td><%= _.escape(item.get('razaoSocial') || '') %></td>
				<td><%= _.escape(item.get('cnpj') || '') %></td>
				<td><%= _.escape(item.get('endereco') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('site') || '') %></td>
				<td><%= _.escape(item.get('telefone') || '') %></td>
				<td><%= _.escape(item.get('telefone2') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="empresaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeFantasiaInputContainer" class="control-group">
					<label class="control-label" for="nomeFantasia">Nome Fantasia</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nomeFantasia" placeholder="Nome Fantasia" value="<%= _.escape(item.get('nomeFantasia') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="razaoSocialInputContainer" class="control-group">
					<label class="control-label" for="razaoSocial">Razao Social</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="razaoSocial" placeholder="Razao Social" value="<%= _.escape(item.get('razaoSocial') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cnpjInputContainer" class="control-group">
					<label class="control-label" for="cnpj">Cnpj</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cnpj" placeholder="Cnpj" value="<%= _.escape(item.get('cnpj') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="enderecoInputContainer" class="control-group">
					<label class="control-label" for="endereco">Endereco</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="endereco" placeholder="Endereco" value="<%= _.escape(item.get('endereco') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="siteInputContainer" class="control-group">
					<label class="control-label" for="site">Site</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="site" placeholder="Site" value="<%= _.escape(item.get('site') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="telefoneInputContainer" class="control-group">
					<label class="control-label" for="telefone">Telefone</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="telefone" placeholder="Telefone" value="<%= _.escape(item.get('telefone') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="telefone2InputContainer" class="control-group">
					<label class="control-label" for="telefone2">Telefone2</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="telefone2" placeholder="Telefone2" value="<%= _.escape(item.get('telefone2') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteEmpresaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteEmpresaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Remover Empresa</button>
						<span id="confirmDeleteEmpresaContainer" class="hide">
							<button id="cancelDeleteEmpresaButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteEmpresaButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="empresaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Empresa
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="empresaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveEmpresaButton" class="btn btn-primary">Salvar Altera&ccedil;&otilde;es</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="empresaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newEmpresaButton" class="btn btn-primary">Adicionar Empresa</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
