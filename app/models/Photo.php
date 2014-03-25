<?php

class Photo extends \Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';

	/**
	 * Should we use soft deletes?
	 *
	 * @var boolean
	 */
	protected $softDelete = true;
}
