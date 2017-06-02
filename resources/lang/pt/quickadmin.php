<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'device-id' => 'Device ID',			'language' => 'Language',		],	],
		'languages' => [		'title' => 'Languages',		'created_at' => 'Time',		'fields' => [			'abbreviation' => 'Abbreviation',			'name' => 'Name',			'is-active-for-admin' => 'Is active for admin',			'is-active-for-users' => 'Is active for users',			'flag-image' => 'Flag image',		],	],
		'maps' => [		'title' => 'Maps',		'created_at' => 'Time',		'fields' => [			'settings' => 'Settings',		],	],
		'localized-maps' => [		'title' => 'Localized maps',		'created_at' => 'Time',		'fields' => [			'map' => 'Map',			'language' => 'Language',			'title' => 'Title',			'description' => 'Description',			'sound-description' => 'Sound description',		],	],
		'actions' => [		'title' => 'Actions',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'localized-actions' => [		'title' => 'Localized actions',		'created_at' => 'Time',		'fields' => [			'language' => 'Language',			'action' => 'Action',			'name' => 'Name',			'sound' => 'Sound',		],	],
	'qa_create' => 'Criar',
	'qa_save' => 'Salvar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Visualizar',
	'qa_update' => 'Atualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sem entradas na tabela',
	'custom_controller_index' => 'Índice de Controller personalizado.',
	'qa_logout' => 'Sair',
	'qa_add_new' => 'Novo',
	'qa_are_you_sure' => 'Tem certeza?',
	'qa_back_to_list' => 'Voltar',
	'qa_dashboard' => 'Painel',
	'qa_delete' => 'Excluir',
	'quickadmin_title' => 'Robomaze Admin Panel v2',
];