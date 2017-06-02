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
	'qa_save' => 'Išsaugoti',
	'qa_update' => 'Atnaujinti',
	'qa_list' => 'Sąrašas',
	'qa_no_entries_in_table' => 'Įrašų nėra.',
	'qa_create' => 'Sukurti',
	'qa_edit' => 'Redaguoti',
	'qa_view' => 'Peržiūrėti',
	'custom_controller_index' => 'Papildomo Controller\'io puslapis.',
	'qa_logout' => 'Atsijungti',
	'qa_add_new' => 'Pridėti naują',
	'qa_are_you_sure' => 'Ar esate tikri?',
	'qa_back_to_list' => 'Grįžti į sąrašą',
	'qa_dashboard' => 'Pagrindinis',
	'qa_delete' => 'Trinti',
	'quickadmin_title' => 'Robomaze Admin Panel v2',
];