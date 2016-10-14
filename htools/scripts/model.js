/**
 * backbone model definitions for Htools
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Role Backbone Model
 */
model.RoleModel = Backbone.Model.extend({
	urlRoot: 'api/role',
	idAttribute: 'id',
	id: '',
	name: '',
	canAdmin: '',
	canEdit: '',
	canWrite: '',
	canRead: '',
	defaults: {
		'id': null,
		'name': '',
		'canAdmin': '',
		'canEdit': '',
		'canWrite': '',
		'canRead': ''
	}
});

/**
 * Role Backbone Collection
 */
model.RoleCollection = model.AbstractCollection.extend({
	url: 'api/roles',
	model: model.RoleModel
});


/**
 * User Backbone Model
 */
model.UserModel = Backbone.Model.extend({
	urlRoot: 'api/user',
	idAttribute: 'id',
	id: '',
	roleId: '',
	username: '',
	password: '',
	firstName: '',
	lastName: '',
	defaults: {
		'id': null,
		'roleId': '',
		'username': '',
		'password': '',
		'firstName': '',
		'lastName': ''
	}
});

/**
 * User Backbone Collection
 */
model.UserCollection = model.AbstractCollection.extend({
	url: 'api/users',
	model: model.UserModel
});

/**
 * Facebook Backbone Model
 */
model.FacebookModel = Backbone.Model.extend({
	urlRoot: 'api/facebook',
	idAttribute: 'id',
	id: '',
	nome: '',
	email: '',
	telefone: '',
	defaults: {
		'id': null,
		'nome': '',
		'email': '',
		'telefone': ''
	}
});

/**
 * Facebook Backbone Collection
 */
model.FacebookCollection = model.AbstractCollection.extend({
	url: 'api/facebooks',
	model: model.FacebookModel
});

/**
 * Usuario Backbone Model
 */
model.UsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/usuario',
	idAttribute: 'id',
	id: '',
	cpf: '',
	nome: '',
	email: '',
	sexo: '',
	dtNascimento: '',
	telefone: '',
	senha: '',
	defaults: {
		'id': null,
		'cpf': '',
		'nome': '',
		'email': '',
		'sexo': '',
		'dtNascimento': new Date(),
		'telefone': '',
		'senha': ''
	}
});

/**
 * Usuario Backbone Collection
 */
model.UsuarioCollection = model.AbstractCollection.extend({
	url: 'api/usuarios',
	model: model.UsuarioModel
});

/**
 * Concentrador Backbone Model
 */
model.ConcentradorModel = Backbone.Model.extend({
	urlRoot: 'api/concentrador',
	idAttribute: 'id',
	id: '',
	concentrador: '',
	ipNas: '',
	secret: '',
	sshPorta: '',
	user: '',
	descricao: '',
	codPerfil: '',
	defaults: {
		'id': null,
		'concentrador': '',
		'ipNas': '',
		'secret': '',
		'sshPorta': '',
		'user': '',
		'descricao': '',
		'codPerfil': ''
	}
});

/**
 * Concentrador Backbone Collection
 */
model.ConcentradorCollection = model.AbstractCollection.extend({
	url: 'api/concentradores',
	model: model.ConcentradorModel
});

/**
 * Empresa Backbone Model
 */
model.EmpresaModel = Backbone.Model.extend({
	urlRoot: 'api/empresa',
	idAttribute: 'id',
	id: '',
	nomeFantasia: '',
	razaoSocial: '',
	cnpj: '',
	endereco: '',
	site: '',
	telefone: '',
	telefone2: '',
	defaults: {
		'id': null,
		'nomeFantasia': '',
		'razaoSocial': '',
		'cnpj': '',
		'endereco': '',
		'site': '',
		'telefone': '',
		'telefone2': ''
	}
});

/**
 * Empresa Backbone Collection
 */
model.EmpresaCollection = model.AbstractCollection.extend({
	url: 'api/empresas',
	model: model.EmpresaModel
});

/**
 * Acesso Backbone Model
 */
model.AcessoModel = Backbone.Model.extend({
	urlRoot: 'api/acesso',
	idAttribute: 'id',
	id: '',
	perfilAcesso: '',
	tempoSessao: '',
	velocidadeDownload: '',
	velocidadeUpload: '',
	trafegoMax: '',
	descricao: '',
	defaults: {
		'id': null,
		'perfilAcesso': '',
		'tempoSessao': '',
		'velocidadeDownload': '',
		'velocidadeUpload': '',
		'trafegoMax': '',
		'descricao': ''
	}
});

/**
 * Acesso Backbone Collection
 */
model.AcessoCollection = model.AbstractCollection.extend({
	url: 'api/acessos',
	model: model.AcessoModel
});

/**
 * PFacebook Backbone Model
 */
model.PFacebookModel = Backbone.Model.extend({
	urlRoot: 'api/pfacebook',
	idAttribute: 'id',
	id: '',
	urlLink: '',
	facebookId: '',
	tokenChave: '',
	defaults: {
		'id': null,
		'urlLink': '',
		'facebookId': '',
		'tokenChave': ''
	}
});

/**
 * PFacebook Backbone Collection
 */
model.PFacebookCollection = model.AbstractCollection.extend({
	url: 'api/pfacebooks',
	model: model.PFacebookModel
});

/**
 * PerfilSms Backbone Model
 */
model.PerfilSmsModel = Backbone.Model.extend({
	urlRoot: 'api/perfilsms',
	idAttribute: 'id',
	id: '',
	perfil: '',
	mensagem: '',
	linkUrl: '',
	codAcesso: '',
	defaults: {
		'id': null,
		'perfil': '',
		'mensagem': '',
		'linkUrl': '',
		'codAcesso': ''
	}
});

/**
 * PerfilSms Backbone Collection
 */
model.PerfilSmsCollection = model.AbstractCollection.extend({
	url: 'api/perfilsmses',
	model: model.PerfilSmsModel
});

/**
 * RelacaoAcesso Backbone Model
 */
model.RelacaoAcessoModel = Backbone.Model.extend({
	urlRoot: 'api/relacaoacesso',
	idAttribute: 'id',
	id: '',
	usuario: '',
	hora: '',
	mac: '',
	ipNas: '',
	pfAcesso: '',
	defaults: {
		'id': null,
		'usuario': '',
		'hora': '',
		'mac': '',
		'ipNas': '',
		'pfAcesso': ''
	}
});

/**
 * RelacaoAcesso Backbone Collection
 */
model.RelacaoAcessoCollection = model.AbstractCollection.extend({
	url: 'api/relacaoacessos',
	model: model.RelacaoAcessoModel
});

