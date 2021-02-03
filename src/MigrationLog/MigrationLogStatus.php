<?php

namespace Give\MigrationLog;

/**
 * Class MigrationStatus
 * @package Give\Migration
 *
 * @since 2.9.7
 */
class MigrationLogStatus {
	const SUCCESS = 'success';
	const FAILED  = 'failed';
	const PENDING = 'pending';

	/**
	 * Get default migration status
	 *
	 * @return string
	 */
	public static function getDefault() {
		return MigrationLogStatus::PENDING;
	}

	/**
	 * Get all migration statuses
	 *
	 * @return array
	 */
	public static function getAll() {
		return [
			MigrationLogStatus::SUCCESS => esc_html__( 'Success', 'give' ),
			MigrationLogStatus::FAILED  => esc_html__( 'Failed', 'give' ),
			MigrationLogStatus::PENDING => esc_html__( 'Pending', 'give' ),
		];
	}
}
