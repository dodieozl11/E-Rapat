<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	
	//Rules User
	public $user = [
		'username_user'    => 'required',
		'password_user'    => 'required',
		'email_user'       => 'required',
		'wa_user'          => 'required'
	];
	 
	public $user_errors = [
		'username_user'=> [
			'required'  => 'Username wajib diisi.'
		],
		'password_user'=> [
			'required'  => 'Password wajib diisi.'
		],
		'email_user'=> [
			'required'  => 'Email wajib diisi.'
		],
		'wa_user'=> [
			'required'  => 'Wa wajib diisi.'
		]
	];
	public $user_update = [
		'username_user'=> [
			'required'  => 'Username wajib diisi.'
		],
		'password_user'=> [
			'required'  => 'Password wajib diisi.'
		],
		'email_user'=> [
			'required'  => 'Email wajib diisi.'
		],
		'wa_user'=> [
			'required'  => 'Wa wajib diisi.'
		]
	];


	//Rules Rapat
	public $rapat = [
		'tanggal_rapat'      => 'required',
		'agenda_rapat'       => 'required',
		'status_rapat'       => 'required'
	];
	 
	public $rapat_errors = [
		'tanggal_rapat'=> [
			'required'  => 'Tanggal rapat wajib diisi.'
		],
		'agenda_rapat'=> [
			'required'  => 'Agenda rapat wajib diisi.'
		],
		'status_rapat'=> [
			'required'  => 'Status rapat wajib diisi.'
		]
	];

	//Rules Notulen
	public $notulen = [
		'deskripsi_notulen'    => 'required',
		'status_notulen'       => 'required'
	];
	 
	public $notulen_errors = [
		'deskripsi_notulen'=> [
			'required'  => 'Deskripsi notulen wajib diisi.'
		],
		'status_notulen'=> [
			'required'  => 'Status notulen wajib diisi.'
		]
	];
}
