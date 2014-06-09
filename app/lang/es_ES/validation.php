<?php

return array(
	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| El following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "El campo :attribute debe ser aceptado.",
	"active_url"       => "El campo :attribute no es una URL válida.",
	"after"            => "El campo :attribute debe ser una fecha posterior a :date.",
	"alpha"            => "El campo :attribute sólo puede contener letras.",
	"alpha_dash"       => "El campo :attribute sólo puede contener letras, números y guiones.",
	"alpha_num"        => "El campo :attribute sólo puede contener letras y números.",
	"before"           => "El campo :attribute debe ser una fecha anterior a :date.",
	"between"          => array(
		"numeric" => "El campo :attribute debe estar comprendido entre :min - :max.",
		"file"    => "El campo :attribute debe tener entre :min - :max kilobytes.",
		"string"  => "El campo :attribute debe tener entre :min - :max characters.",
	),
	"confirmed"        => "El campo :attribute confirmación no coincide.",
	"date"             => "El campo :attribute no es una fecha válida.",
	"date_format"      => "El campo :attribute no coincide con el formato :format.",
	"different"        => "El campo :attribute y :other deben ser diferentes.",
	"digits"           => "El campo :attribute debe tener :digits dígitos.",
	"digits_between"   => "El campo :attribute debe tener entre :min and :max digits.",
	"email"            => "El campo :attribute formato no es válido.",
	"exists"           => "El campo :attribute seleccionado es inválido.",
	"image"            => "El campo :attribute debe ser una imágen.",
	"in"               => "El campo :attribute seleccionado es inválido..",
	"integer"          => "El campo :attribute debe ser un entero.",
	"ip"               => "El campo :attribute debe ser una dirección IP válida.",
	"max"              => array(
		"numeric" => "El campo :attribute no debe ser mayor a :max.",
		"file"    => "El campo :attribute no debe ser mayor a :max kilobytes.",
		"string"  => "El campo :attribute no debe ser mayor a :max characters.",
	),
	"mimes"            => "El campo :attribute debe ser un archivo de tipo :values.",
	"min"              => array(
		"numeric" => "El campo :attribute debe ser mínimo de :min.",
		"file"    => "El campo :attribute debe tener al menos :min kilobytes.",
		"string"  => "El campo :attribute debe tener al menos :min characters.",
	),
	"not_in"           => "El campo :attribute es inválido.",
	"numeric"          => "El campo :attribute debe ser numérico.",
	"regex"            => "El formato del campo :attribute es inválido.",
	"required"         => "El campo :attribute es requerido.",
	"required_if"      => "El campo :attribute es requerido cuando :other es :value.",
	"required_with"    => "El campo :attribute es requerido cuando :values está presente.",
	"required_without" => "El campo :attribute es requerido cuando :values no está presente.",
	"same"             => "El campo :attribute y :other no coinciden.",
	"size"             => array(
		"numeric" => "El campo :attribute debe ser :size.",
		"file"    => "El campo :attribute debe ser de :size kilobytes.",
		"string"  => "El campo :attribute debe ser de :size characters.",
	),
	"unique"           => "El campo :attribute ya ha sido tomado.",
	"url"              => "El formato del campo :attribute es inválido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| El following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
