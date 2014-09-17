<?php
namespace LaravelBook\Ardent;

class Builder extends \Illuminate\Database\Eloquent\Builder {

	/**
	 * Forces the behavior of findOrFail in very find method - throwing a {@link ModelNotFoundException}
	 * when the model is not found.
	 *
	 * @var bool
	 */
	public $throwOnFind = false;

	public function find($id, $columns = array('*')) {
		return $this->maybeFail('find', func_get_args());
	}

	public function first($columns = array('*')) {
		return $this->maybeFail('first', func_get_args());
	}

	/**
	 * Will test if it should run a normal method or its "orFail" version, and behave accordingly.
	 * @param string $method called method
	 * @param array  $args   given arguments
	 * @return mixed
	 */
	protected function maybeFail($method, $args) {
		$debug  = debug_backtrace(false);
		$orFail = $method.'OrFail';
		$func   = ($this->throwOnFind && $debug[2]['function'] != $orFail)? array($this, $orFail) : "parent::$method";
		return call_user_func_array($func, $args);
	}
}