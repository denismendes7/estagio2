<?php
	$this->assign('title','Htools | PerfilSmses');
	$this->assign('nav','perfilsmses');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/perfilsmses.js").wait(function(){
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
	<i class="icon-th-list"></i> PerfilSmses
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="perfilSmsCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Perfil">Perfil<% if (page.orderBy == 'Perfil') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mensagem">Mensagem<% if (page.orderBy == 'Mensagem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_LinkUrl">Link Url<% if (page.orderBy == 'LinkUrl') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_CodAcesso">Cod Acesso<% if (page.orderBy == 'CodAcesso') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('perfil') || '') %></td>
				<td><%= _.escape(item.get('mensagem') || '') %></td>
				<td><%= _.escape(item.get('linkUrl') || '') %></td>
				<td><%= _.escape(item.get('codAcesso') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="perfilSmsModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="perfilInputContainer" class="control-group">
					<label class="control-label" for="perfil">Perfil</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="perfil" placeholder="Perfil" value="<%= _.escape(item.get('perfil') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mensagemInputContainer" class="control-group">
					<label class="control-label" for="mensagem">Mensagem</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mensagem" placeholder="Mensagem" value="<%= _.escape(item.get('mensagem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="linkUrlInputContainer" class="control-group">
					<label class="control-label" for="linkUrl">Link Url</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="linkUrl" placeholder="Link Url" value="<%= _.escape(item.get('linkUrl') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codAcessoInputContainer" class="control-group">
					<label class="control-label" for="codAcesso">Cod Acesso</label>
					<div class="controls inline-inputs">
						<select id="codAcesso" name="codAcesso"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePerfilSmsButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePerfilSmsButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Remover PerfilSms</button>
						<span id="confirmDeletePerfilSmsContainer" class="hide">
							<button id="cancelDeletePerfilSmsButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeletePerfilSmsButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="perfilSmsDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar PerfilSms
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="perfilSmsModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePerfilSmsButton" class="btn btn-primary">Salvar Altera&ccedil;&otilde;es</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="perfilSmsCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPerfilSmsButton" class="btn btn-primary">Adicionar PerfilSms</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
