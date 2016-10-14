<?php
	$this->assign('title','Htools | RelacaoAcessos');
	$this->assign('nav','relacaoacessos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/relacaoacessos.js").wait(function(){
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
	<i class="icon-th-list"></i> RelacaoAcessos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="relacaoAcessoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Usuario">Usuario<% if (page.orderBy == 'Usuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Hora">Hora<% if (page.orderBy == 'Hora') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mac">Mac<% if (page.orderBy == 'Mac') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IpNas">Ip Nas<% if (page.orderBy == 'IpNas') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_PfAcesso">Pf Acesso<% if (page.orderBy == 'PfAcesso') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('usuario') || '') %></td>
				<td><%= _.escape(item.get('hora') || '') %></td>
				<td><%= _.escape(item.get('mac') || '') %></td>
				<td><%= _.escape(item.get('ipNas') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('pfAcesso') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="relacaoAcessoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="usuarioInputContainer" class="control-group">
					<label class="control-label" for="usuario">Usuario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="usuario" placeholder="Usuario" value="<%= _.escape(item.get('usuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="horaInputContainer" class="control-group">
					<label class="control-label" for="hora">Hora</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hora" placeholder="Hora" value="<%= _.escape(item.get('hora') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="macInputContainer" class="control-group">
					<label class="control-label" for="mac">Mac</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mac" placeholder="Mac" value="<%= _.escape(item.get('mac') || '') %>">
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
				<div id="pfAcessoInputContainer" class="control-group">
					<label class="control-label" for="pfAcesso">Pf Acesso</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="pfAcesso" placeholder="Pf Acesso" value="<%= _.escape(item.get('pfAcesso') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteRelacaoAcessoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteRelacaoAcessoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Remover RelacaoAcesso</button>
						<span id="confirmDeleteRelacaoAcessoContainer" class="hide">
							<button id="cancelDeleteRelacaoAcessoButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteRelacaoAcessoButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="relacaoAcessoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar RelacaoAcesso
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="relacaoAcessoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveRelacaoAcessoButton" class="btn btn-primary">Salvar Altera&ccedil;&otilde;es</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="relacaoAcessoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newRelacaoAcessoButton" class="btn btn-primary">Adicionar RelacaoAcesso</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
