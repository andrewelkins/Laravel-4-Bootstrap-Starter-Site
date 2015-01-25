<?php

return array(
	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => ":attribute должен быть подтверждён.",
	"active_url"       => ":attribute не является сайтом.",
	"after"            => ":attribute должен быть датой сроком позднее :date.",
	"alpha"            => ":attribute может содержать только буквы.",
	"alpha_dash"       => ":attribute может содержать только цифры, буквы и тире.",
	"alpha_num"        => ":attribute может содержать только цифры и буквы.",
	"before"           => ":attribute должен быть дайтой сроком до :date.",
	"between"          => array(
		"numeric" => ":attribute должен быть между :min - :max.",
		"file"    => "Размер :attribute должен быть между :min - :max килобайт.",
		"string"  => "Длина :attribute должна быть между :min - :max символов.",
	),
	"confirmed"        => " подтвреждение :attribute не совпало.",
	"date"             => " :attribute не является датой.",
	"date_format"      => " :attribute не сответстует формату :format.",
	"different"        => " :attribute и :other должны быть различны.",
	"digits"           => " :attribute должен содержать :digits  цифры.",
	"digits_between"   => " :attribute должен содержать более :min и менее :max цифр.",
	"email"            => " Формат :attribute неверен.",
	"exists"           => " Выбранный :attribute неправильный.",
	"image"            => " :attribute дожен быть изображением.",
	"in"               => " Выбранный :attribute не правильный.",
	"integer"          => " :attribute должен быть числом.",
	"ip"               => " :attribute должен быть верным IP адресом.",
	"max"              => array(
		"numeric" => " :attribute не может быть больше :max.",
		"file"    => ":attribute не может быть больше :max килобайт.",
		"string"  => ":attribute не может быть длинее :max символов.",
	),
	"mimes"            => "Тип файла :attribute должен быть один из следующих: :values.",
	"min"              => array(
		"numeric" => ":attribute должен быть как минимум :min.",
		"file"    => ":attribute должен быть более :min килобайт.",
		"string"  => "Минимальная длина :attribute составляет :min символов.",
	),
	"not_in"           => "Выбранный :attribute не верен.",
	"numeric"          => ":attribute должен быть числом.",
	"regex"            => "Формат :attribute не верен.",
	"required"         => "Поле :attribute обязательно для ввода.",
	"required_if"      => "Поле :attribute обязательно для ввода когда :other равно :value.",
	"required_with"    => "Поле :attribute обязательно для ввода когда есть :values.",
	"required_without" => "Поле :attribute обязательно для ввода когда нету :values .",
	"same"             => ":attribute и :other должны совпадать.",
	"size"             => array(
		"numeric" => ":attribute должен быть :size.",
		"file"    => "Размер :attribute должен быть :size килобайт.",
		"string"  => "Длина :attribute должна составлять :size символов.",
	),
	"unique"           => ":attribute уже занят.",
	"url"              => "Формат :attribute не верен.",

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
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
