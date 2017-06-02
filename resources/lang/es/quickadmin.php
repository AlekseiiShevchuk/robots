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
	'qa_create' => 'Crear',
	'qa_save' => 'Guardar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Ver',
	'qa_update' => 'Actualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sin valores en la tabla',
	'custom_controller_index' => 'Índice del controlador personalizado (index).',
	'qa_logout' => 'Salir',
	'qa_add_new' => 'Agregar',
	'qa_are_you_sure' => 'Estás seguro?',
	'qa_back_to_list' => 'Regresar a la lista?',
	'qa_dashboard' => 'Tablero',
	'qa_delete' => 'Eliminar',
	'quickadmin_title' => 'Robomaze Admin Panel v2',
];