<?php

namespace Give\Framework\Exceptions\Primitives;

use Give\Framework\Exceptions\Traits\Loggable;

class LogicException extends \LogicException {
	use Loggable;
}
