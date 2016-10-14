<?php
	$this->assign('title','Htools | Acessos');
	$this->assign('nav','acessos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/acessos.js").wait(function(){
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
	<i class="icon-th-list"></i> Acessos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="acessoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_PerfilAcesso">Perfil Acesso<% if (page.orderBy == 'PerfilAcesso') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TempoSessao">Tempo Sessao<% if (page.orderBy == 'TempoSessao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_VelocidadeDownload">Velocidade Download<% if (page.orderBy == 'VelocidadeDownload') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_VelocidadeUpload">Velocidade Upload<% if (page.orderBy == 'VelocidadeUpload') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_TrafegoMax">Trafego Max<% if (page.orderBy == 'TrafegoMax') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricao">Descricao<% if (page.orderBy == 'Descricao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('perfilAcesso') || '') %></td>
				<td><%= _.escape(item.get('tempoSessao') || '') %></td>
				<td><%= _.escape(item.get('velocidadeDownload') || '') %></td>
				<td><%= _.escape(item.get('velocidadeUpload') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('trafegoMax') || '') %></td>
				<td><%= _.escape(item.get('descricao') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="acessoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="perfilAcessoInputContainer" class="control-group">
					<label class="control-label" for="perfilAcesso">Perfil Acesso</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="perfilAcesso" placeholder="Perfil Acesso" value="<%= _.escape(item.get('perfilAcesso') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tempoSessaoInputContainer" class="control-group">
					<label class="control-label" for="tempoSessao">Tempo Sessao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tempoSessao" placeholder="Tempo Sessao" value="<%= _.escape(item.get('tempoSessao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="velocidadeDownloadInputContainer" class="control-group">
					<label class="control-label" for="velocidadeDownload">Velocidade Download</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="velocidadeDownload" placeholder="Velocidade Download" value="<%= _.escape(item.get('velocidadeDownload') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="velocidadeUploadInputContainer" class="control-group">
					<label class="control-label" for="velocidadeUpload">Velocidade Upload</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="velocidadeUpload" placeholder="Velocidade Upload" value="<%= _.escape(item.get('velocidadeUpload') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="trafegoMaxInputContainer" class="control-group">
					<label class="control-label" for="trafegoMax">Trafego Max</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="trafegoMax" placeholder="Trafego Max" value="<%= _.escape(item.get('trafegoMax') || '') %>">
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteAcessoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteAcessoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Remover Acesso</button>
						<span id="confirmDeleteAcessoContainer" class="hide">
							<button id="cancelDeleteAcessoButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteAcessoButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="acessoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Acesso
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="acessoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveAcessoButton" class="btn btn-primary">Salvar Altera&ccedil;&otilde;es</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="acessoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newAcessoButton" class="btn btn-primary">Adicionar Acesso</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
