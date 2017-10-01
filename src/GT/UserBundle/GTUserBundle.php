<?php

namespace GT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GTUserBundle extends Bundle
{
	public function getParent() {
		return 'FOSUserBundle';
	}
}
